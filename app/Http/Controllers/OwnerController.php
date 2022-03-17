<?php

namespace App\Http\Controllers;

use App\Models\Home;
use App\Models\HomeImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OwnerController extends Controller
{

    public function index()
    {
        $owner_id = auth()->guard('owner')->user()->id;
        if(!empty($owner_id)){
            $homes = Home::where('owner_id', $owner_id)->whenSearch(Request()->search)->paginate(5);
            return view('front.home.index',compact('homes'));
        }else{
            return redirect()->back()->with(['error'=>'هناك مشكله']);
        }


    }


    public function create()
    {
        return view('front.home.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'country'  => 'required',
            'city'  => 'required',
            'rent_type'  => 'required',
            'cover'  => 'required|image',
            'images'  => 'required|array',
            'address'  => 'required',
            'floor'  => 'required',
            'number_of_bathroom'  => 'required',
            'number_of_bedroom'  => 'required',
            'number_of_beds'  => 'required',
        ]);

        try{
            DB::beginTransaction();


            if (!$request->has('reserved'))
                $request->request->add(['reserved' => 0]);
            else
                $request->request->add(['reserved' => 1]);


            if (!$request->has('garage'))
                $request->request->add(['garage' => 0]);
            else
                $request->request->add(['garage' => 1]);

            $data = $request->except('_token','images');


            if ($request->has('cover')) {
                $data['cover'] = uploadImage('public_uploads', $request->file('cover'));
            }

            $data['owner_id'] = auth()->guard('owner')->user()->id;
            $data['state'] = 0;

            $home = Home::create($data);

            if($home){
                if ($request->has('images')) {
                    foreach ($request->images  as $image){
                        $image_name = uploadImage('public_uploads', $image);
                        HomeImage::create([
                            'image' => $image_name,
                            'home_id' => $home->id
                        ]);
                    }

                }

            }

            DB::commit();
            session()->flash('success', 'تم الاضافه بنجاح');
            return redirect()->route('add_home.index');

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with(['error'=>'هناك مشكله']);
        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $home = Home::find($id);
        return view('front.home.edit',compact('home'));
    }



    public function update(Request $request, $id)
{
    $request->validate([
        'country'  => 'required',
        'city'  => 'required',
        'rent_type'  => 'required',
        'cover'  => 'image',
        'images'  => 'array',
        'address'  => 'required',
        'floor'  => 'required',
        'number_of_bathroom'  => 'required',
        'number_of_bedroom'  => 'required',
        'number_of_beds'  => 'required',
    ]);
    try{

        DB::beginTransaction();

        $home =  Home::find($id);

        if (!$request->has('reserved'))
            $request->request->add(['reserved' => 0]);
        else
            $request->request->add(['reserved' => 1]);

        if (!$request->has('garage'))
            $request->request->add(['garage' => 0]);
        else
            $request->request->add(['garage' => 1]);

        $data = $request->except('_token','images');


        if ($request->has('cover')) {
            remove_previous($home->cover);

            $data['cover'] = uploadImage('public_uploads', $request->file('cover'));
        }

        $home_update = $home->update($data);
        if($home_update){
            if ($request->has('images')) {

                $home_image  = HomeImage::where('home_id', $id)->get();

                if(count($home_image) > 0){
                    HomeImage::where('home_id', $id)->delete();

                    foreach ($home_image as $image){
                        remove_previous($image->image);
                    }
                }

                foreach ($request->images  as $image){
                    $image_name = uploadImage('public_uploads', $image);

                    HomeImage::create([
                        'image' => $image_name,
                        'home_id' => $id
                    ]);
                }

            }

        }


        DB::commit();
        session()->flash('success', 'تم التحديث بنجاح');
        return redirect()->route('add_home.index');

    }catch(\Exception $e){
        DB::rollback();
        return redirect()->back()->with(['error'=>'هناك مشكله']);
    }
}



    public function destroy($id)
    {
        try{
            DB::beginTransaction();
            $home =  Home::find($id);

            if(!$home)
            {
                return redirect()->back()->with(['error'=>'لا يوجد شقق']);
            }

            remove_previous($home->cover);

            $home->delete();

            $home_image  = HomeImage::where('home_id', $id)->get();

            if(count($home_image) > 0){
                foreach ($home_image as $image){
                    remove_previous($image->image);
                }

                HomeImage::where('home_id', $id)->delete();
            }

            DB::commit();

            session()->flash('success', 'تم الحذف بنجاح');
            return redirect()->route('add_home.index.index');

        }catch(\Exception $e){
            DB::rollback();
            return redirect()->back()->with(['error'=>'هناك مشكله']);
        }
    }
}

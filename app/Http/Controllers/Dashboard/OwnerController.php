<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\Owners;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {

        $owners = Owners::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.owners.index',compact('owners'));
    }

    public function create()
    {
        return view('dashboard.owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'  => 'required|unique:owners,email|email',
            'name'   => 'required',
            'mobile' => 'required',
            'age'   => 'required',
            'image'   => 'image',
            'id_image'   => 'required|image',
            'password' => 'required|confirmed|min:6',
        ]);

       try{


           if (!$request->has('statues'))
               $request->request->add(['statues' => 0]);
           else
               $request->request->add(['statues' => 1]);

            $data = $request->except('_token');


            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }


            if ($request->has('image')) {
                $data['image'] = uploadImage('public_uploads', $request->file('image'));
            }

            if ($request->has('id_image')) {
                $data['id_image'] = uploadImage('public_uploads', $request->file('id_image'));
            }

             Owners::create($data);

            session()->flash('success', 'تم الاضافه بنجاح');

            return redirect()->route('owner.index');

       }catch(\Exception $e){
           return redirect()->back()->with(['error'=>'هناك مشكله']);
       }

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $owner = Owners::find($id);

        if($owner){
            return view('dashboard.owners.edite', compact('owner'));
        }else{
            return redirect()->back()->with(['error'=>'لا يوجد ملاك']);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'email'  => 'required|email|unique:owners,email,'.$id,
            'name'   => 'required',
            'mobile' => 'required',
            'age'   => 'required',
            'image'   => 'image',
            'id_image'   => 'image',
            'password' => 'sometimes|confirmed',
        ]);

        try{

            $owner =  Owners::find($id);

            if (!$request->has('statues'))
                $request->request->add(['statues' => 0]);
            else
                $request->request->add(['statues' => 1]);

            $data = $request->except('_token');

            if(!empty($data['password'])){
                $data['password'] = bcrypt($data['password']);
            }else{
                $data['password'] = $owner->password;
            }


            if ($request->has('image')) {
                remove_previous($owner->image);
                $data['image'] = uploadImage('public_uploads', $request->file('image'));
            }

            if ($request->has('id_image')) {



                remove_previous($owner->id_image);
                $data['id_image'] = uploadImage('public_uploads', $request->file('id_image'));
            }


            $owner->update($data);

            session()->flash('success', 'تم التحديث بنجاح');

            return redirect()->route('owner.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'هناك مشكله']);
        }
    }


    public function destroy($id)
    {
        try{
            $owner =  Owners::find($id);

            if(!$owner)
            {
                return redirect()->back()->with(['error'=>'لا يوجد ملاك']);
            }

            remove_previous($owner->image);

            remove_previous($owner->id_image);

            $owner->delete();

            session()->flash('success', 'تم الحذف بنجاح');

            return redirect()->route('owner.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'هناك مشكله']);
        }
    }
}

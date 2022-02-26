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

            session()->flash('success', 'Owner added successfully');

            return redirect()->route('owner.index');

       }catch(\Exception $e){
           return redirect()->back()->with(['error'=>'there is problem please try again']);
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
            return redirect()->back()->with(['error'=>'this owners is not found']);
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

            session()->flash('success', 'Owner Updated successfully');

            return redirect()->route('owner.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }


    public function destroy($id)
    {
        try{
            $owner =  Owners::find($id);

            if(!$owner)
            {
                return redirect()->back()->with(['error'=>'owner not found']);
            }

            remove_previous($owner->image);

            remove_previous($owner->id_image);

            $owner->delete();

            session()->flash('success', 'Owners deleted successfully');

            return redirect()->route('owner.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}

<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Users;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {

        $users = Users::whenSearch(Request()->search)->paginate(5);
        return view('dashboard.users.index',compact('users'));
    }


    public function create()
    {
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'  => 'required|unique:users,email|email',
            'name'   => 'required',
            'mobile' => 'required',
            'age'   => 'required',
            'image'   => 'image',
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

            Users::create($data);

            session()->flash('success', 'User added successfully');

            return redirect()->route('user.index');

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
        $user = Users::find($id);

        if($user){
            return view('dashboard.users.edite', compact('user'));
        }else{
            return redirect()->back()->with(['error'=>'this users is not found']);
        }

    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'email'  => 'required|email|unique:users,email,'.$id,
            'name'   => 'required',
            'mobile' => 'required',
            'age'   => 'required',
            'image'   => 'image',
            'password' => 'sometimes|confirmed',
        ]);

        try{

        $user =  Users::find($id);

        $data = $request->except('_token');

        if(!empty($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }else{
            $data['password'] = $user->password;
        }


        if ($request->has('image')) {
            remove_previous($user->image);
            $data['image'] = uploadImage('public_uploads', $request->file('image'));
        }

        if ($request->has('id_image')) {



            remove_previous($user->id_image);
            $data['id_image'] = uploadImage('public_uploads', $request->file('id_image'));
        }


        $user->update($data);

        session()->flash('success', 'User Updated successfully');

        return redirect()->route('user.index');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }


    public function destroy($id)
    {
        try{
            $user =  Users::find($id);

            if(!$user)
            {
                return redirect()->back()->with(['error'=>'user not found']);
            }

            remove_previous($user->image);

            $user->delete();

            session()->flash('success', 'Users deleted successfully');

            return redirect()->route('user.index');

        }catch(\Exception $e){

            return redirect()->back()->with(['error'=>'there is problem please try again']);
        }
    }
}

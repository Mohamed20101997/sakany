<?php

namespace App\Http\Controllers;

use App\Models\Owners;
use App\Models\Users;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('front.login');
    }

    public function login_post(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);


        if ($request->has('owner')) {
            $guard = auth()->guard('owner');
        } else {
            $guard = auth()->guard('user');
        }

        if ($guard->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], true)) {
            return redirect()->back();
        }


        return redirect()->back()->with(['error' => 'الرقم السري او البرد الالكتروني غير صحيحين']);
    }


    public function register()
    {
        return view('front.register');
    }

    public function register_post(Request $request)
    {

        if ($request->has('owner')) {
            $request->validate([
                'email' => 'required|unique:owners,email|email',
                'name' => 'required',
                'mobile' => 'required',
                'age' => 'required',
                'image' => 'image',
                'id_image' => 'required|image',
                'password' => 'required|confirmed|min:6',
            ],[
                'image.image' => 'يجب ان تكون صوره',
                'id_image.image' => 'يجب ان تكون صوره',
                'id_image.required' => 'يجب ادخال صوره بطاقه',
            ]);
        }else{
            $request->validate([
                'email' => 'required|unique:owners,email|email',
                'name' => 'required',
                'mobile' => 'required',
                'age' => 'required',
                'image' => 'image',
                'password' => 'required|confirmed|min:6',
            ],[
                'image.image' => 'يجب ان تكون صوره'
            ]);

        }

        try{
        $data = $request->except('_token');

        $data['state'] = 1;

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        }


        if ($request->has('image')) {
            $data['image'] = uploadImage('public_uploads', $request->file('image'));
        }

        if ($request->has('owner')) {
            if ($request->has('id_image')) {
                $data['id_image'] = uploadImage('public_uploads', $request->file('id_image'));
            }
        }


        if ($request->has('owner')) {
            Owners::create($data);
        } else {
            Users::create($data);
        }


        session()->flash('success', 'تم إنشاء الحساب بنجاح');

        return redirect()->route('front.login');

        }catch(\Exception $e){
            return redirect()->back()->with(['error'=>'هناك مشكله']);
        }


    }


    public function logout()
    {
        if (\Auth::guard('owner')->check()) {
            $guard = \Auth::guard('owner');
        } else {
            $guard = \Auth::guard('user');
        }

        $guard->logout();
        return redirect()->route('front.login');
    }


}

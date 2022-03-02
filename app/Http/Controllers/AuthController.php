<?php

namespace App\Http\Controllers;

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
            'email'  => 'required',
            'password' => 'required',
        ]);


        if($request->has('owner')){
            $guard = auth()->guard('owner');
        }else{
            $guard = auth()->guard('user');
        }

        if($guard->attempt(['email'=> $request->input("email") ,'password' =>  $request->input("password")] , true))
        {
            return redirect()->route('home');
        }


        return redirect()->back()->with(['error'=>'الرقم السري او البرد الالكتروني غير صحيحين']);
    }


    public function register()
    {
        return view('front.register');
    }



    public function logout()
    {
        if(\Auth::guard('owner')->check()){
            $guard =  \Auth::guard('owner');
        }else{
            $guard =  \Auth::guard('user');
        }

        $guard->logout();
        return redirect()->route('front.login');
    }



}

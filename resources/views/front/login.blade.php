@extends('layouts.front.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('front/login/')}}/css/main.css">
@endsection
@section('contain')


    <div class="limiter" dir="rtl">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
					<span class="login100-form-title-1">
						تسجيل دخول
					</span>
                </div>

                <form class="login100-form validate-form">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">
                        <span class="label-input100">البريد الالكتروني</span>
                        <input class="input100" type="text" name="email" placeholder="إدخال البريد الالكتروني">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">الرقم السري</span>
                        <input class="input100" type="password" name="pass" placeholder="ادخال الرقم السري">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
                        <span class="label-input100">الرقم السري</span>
                        <input class="input100" type="password" name="pass" placeholder="ادخال الرقم السري">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="contact100-form-checkbox mt-4">
                        <span class="label-input100" style="font-size: 20px">المالك</span>
                        <input type="checkbox" id="switch" /><label for="switch"></label>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            تسجيل
                        </button>
                    </div>
                    <div class="flex-sb-m w-full p-b-30 ">
                        <div>
                            <a href="{{route('front.register')}}" class="txt1">
                                ليس لدي حساب
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

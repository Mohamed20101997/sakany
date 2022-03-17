@extends('layouts.front.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('front/login/')}}/css/main.css">
@endsection
@section('contain')


    <div class="limiter" dir="rtl">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url({{asset('front/images/background/6.jpg')}});">
					<span class="login100-form-title-1">
						تسجيل دخول
					</span>
                </div>

                <form class="login100-form validate-form" action="{{route('front.login')}}" method="post">
                    @csrf
                    @method('post')
                    @include('dashboard.partials._errors')
                    <div class="wrap-input100 validate-input m-b-26" data-validate="البريد الالكتروني مطلوب">
                        <span class="label-input100">البريد الالكتروني</span>
                        <input class="input100" type="text" name="email" placeholder="إدخال البريد الالكتروني">
                        <span class="focus-input100"></span>

                        @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "الرقم السري مطلوب">
                        <span class="label-input100">الرقم السري</span>
                        <input class="input100" type="password" name="password" placeholder="ادخال الرقم السري">
                        <span class="focus-input100"></span>
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">مالك الشقه</span>
                        <input type="checkbox" id="switch" name="owner" /><label for="switch"></label>
                    </div>



                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
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


@section('js')
    <script src="{{asset('front/login')}}/js/main.js"></script>
@endsection
@endsection

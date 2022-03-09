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
						 عمل حساب جديد
					</span>
                </div>

                <form class="login100-form validate-form" action="{{route('front.login_post')}}" method="post">
                    @csrf
                    @method('post')
                    @include('dashboard.partials._errors')

                    <div class="wrap-input100 validate-input m-b-26" data-validate=" الاسم مطلوب">
                        <span class="label-input100">الاسم</span>
                        <input class="input100" type="text" name="name" value="{{ old('name') }}" placeholder="اضافة الاسم">
                        <span class="focus-input100"></span>

                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "البريد الالكتروني  مطلوب">
                        <span class="label-input100">البريد الالكتروني </span>
                        <input class="input100" type="email" name="email" placeholder="ادخال البريد الالكتروني ">
                        <span class="focus-input100"></span>
                        @error('email')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "الهاتف  مطلوب">
                        <span class="label-input100">الهاتف </span>
                        <input class="input100" type="tel" name="mobile" placeholder="ادخال الهاتف ">
                        <span class="focus-input100"></span>
                        @error('mobile')
                            <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "الصورة الشخصيه  مطلوب">
                        <span class="label-input100">الصورة الشخصيه </span>
                        <input class="input100" type="tel" name="mobile" placeholder="ادخال الصورة الشخصيه ">
                        <span class="focus-input100"></span>
                        @error('mobile')
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

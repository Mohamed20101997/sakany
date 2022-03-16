@extends('layouts.front.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('front/login/')}}/css/main.css">
@endsection
@section('contain')

    <div class="limiter" dir="rtl">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title"
                     style="background-image: url({{asset('front/images/background/6.jpg')}});">
					<span class="login100-form-title-1">
						 إنشاء حساب جديد
					</span>
                </div>

                <form class="login100-form validate-form" action="{{route('front.register_post')}}" method="post"
                      enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    @include('dashboard.partials._errors')

                    <div class="wrap-input100 validate-input m-b-26" data-validate=" الاسم مطلوب">
                        <span class="label-input100">الاسم</span>
                        <input class="input100" type="text" name="name" value="{{ old('name') }}"
                               placeholder="اضافة الاسم">
                        <span class="focus-input100"></span>

                        @error('name')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="البريد الالكتروني  مطلوب">
                        <span class="label-input100">البريد الالكتروني </span>
                        <input class="input100" type="email" name="email" value="{{ old('email') }}"
                               placeholder="ادخال البريد الالكتروني ">
                        <span class="focus-input100"></span>
                        @error('email')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="الهاتف  مطلوب">
                        <span class="label-input100">الهاتف </span>
                        <input class="input100" type="tel" name="mobile" value="{{ old('mobile') }}"
                               placeholder="ادخال الهاتف ">
                        <span class="focus-input100"></span>
                        @error('mobile')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="الصورة الشخصيه  مطلوب">
                        <span class="label-input100">الصورة الشخصيه </span>
                        <input class="input100" type="file" name="image" placeholder="ادخال الصورة الشخصيه ">
                        <span class="focus-input100"></span>
                        @error('image')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="wrap-input100 m-b-18">
                        <span class="label-input100">البطاقه الشخصيه (خاص للمالك)</span>
                        <input class="input100" type="file" name="id_image" placeholder="ادخال البطاقه الشخصيه ">
                        <span class="focus-input100"></span>

                        @error('id_image')
                            <div class="text-danger">{{$message}}</div>
                        @enderror

                    </div>


                    <div class="wrap-input100 validate-input m-b-18" data-validate="العمر  مطلوب">
                        <span class="label-input100">العمر</span>
                        <input class="input100" min="1" type="number" name="age" value="{{ old('age') }}"
                               placeholder="ادخال العمر">
                        <span class="focus-input100"></span>
                        @error('age')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate="  الرقم السري">
                        <span class="label-input100">الرقم السري</span>
                        <input class="input100" type="password" name="password" value="{{ old('password') }}"
                               placeholder="ادخال الرقم السري">
                        <span class="focus-input100"></span>
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="wrap-input100 validate-input m-b-18" data-validate=" تاكيد الرقم السري">
                        <span class="label-input100"> تاكيد الرقم السري</span>
                        <input class="input100" type="password" name="password_confirmation"
                               value="{{ old('password') }}" placeholder="ادخال الرقم السري">
                        <span class="focus-input100"></span>
                        @error('password')
                        <div class="text-danger">{{$message}}</div>
                        @enderror
                    </div>


                    <div class="wrap-input100 validate-input m-b-18">
                        <span class="label-input100">مالك الشقه</span>
                        <input type="checkbox" id="switch" class="owner_switch" name="owner"/><label for="switch"></label>
                    </div>


                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            إنشاء حساب
                        </button>
                    </div>
                    <div class="flex-sb-m w-full p-b-30 ">
                        <div>
                            <a href="{{route('front.login')}}" class="txt1">
                                تسجيل دخول
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

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard_files/css/main_rtl.css') }}">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{asset('front')}}/css/bootstrap.rtl.full.min.css" rel="stylesheet">
    <title>تسجيل دخول | سكني</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
       <img src="{{asset('front/images/logo5.jpeg')}}" width="100px" height="100px">
    </div>
    <div class="login-box">
        <form class="login-form" method="POST" action="{{route('login')}}">
            @csrf
            @method('POST')
            @if($errors->any())
                <p class="alert alert-danger" style="position: absolute;    top: -25px;">{{$errors->first()}}</p>
            @endif
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>تسجيل دخول</h3>
            <div class="form-group">
                <label class="control-label login_label" >البريد الالكتروني</label>
                <input name="email" class="form-control" type="text" placeholder="البريد الالكتروني" autofocus>
            </div>
            <div class="form-group">
                <label class="control-label login_label" >الرقم السري</label>
                <input class="form-control" name="password" type="password" placeholder="الرقم السري">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember_token"><span class="label-text">تذكرني</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>دخول</button>
            </div>
        </form>

    </div>
</section>
<!-- Essential javascripts for application to work-->
<script src="{{ asset('dashboard_files/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/popper.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('dashboard_files/js/main.js') }}"></script>
</body>
</html>

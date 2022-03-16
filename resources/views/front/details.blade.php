@extends('layouts.front.app')

@section('css')
{{--    <link rel="stylesheet" type="text/css" href="{{asset('front/css')}}/style_zoom.css">--}}
    <style>
        .show {
            width: 100%;
            height: 500px;
        }

        .small-img .icon-left, .small-img .icon-right {
            width: 12px;
            height: 24px;
            cursor: pointer;
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto 0;
        }

        .small-img .icon-left { transform: rotate(180deg) }

        .small-img .icon-right { right: 0; }

        .small-img .icon-left:hover, .small-img .icon-right:hover { opacity: .5; }

        .small-container {
            height: 70px;
            overflow: hidden;
            position: absolute;
            left: 0;
            right: 0;
            margin: 0 auto;
        }

        .small-container div {
            width: 800%;
            position: relative;
        }

        .small-container .show-small-img {
            width: 70px;
            height: 70px;
            margin-right: 6px;
            cursor: pointer;
            float: left;
        }

        .small-container .show-small-img:last-of-type { margin-right: 0; }


        .dd{
            display: flex;
            direction: ltr;
            margin-bottom: 23px;
        }
    </style>
@endsection

@section('contain')
    <!--Page Title-->
    <section class="page-title" style="background-image:url({{image_path($home->cover)}})">
        <div class="auto-container">
            <div class="clearfix">
                <div class="pull-left">
                    <h1>تفاصيل الشقه</h1>
                </div>
                <div class="pull-right">
                    <ul class="page-breadcrumb">
                        <li><a href="{{route('home')}}">الرئيسيه</a></li>
                        <li>/ تفاصيل الشقه</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!--End Page Title-->

    <!--Sidebar Page Container-->
    <div class="sidebar-page-container">
        <div class="auto-container">
            <div class="row clearfix">


                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">
                        <!-- Properties Posts -->
                        <div class="sidebar-widget properties-posts">
                            <div class="sidebar-title">
                                <h3>شقق متشابهه</h3>
                                <div class="separator"></div>
                            </div>

                            @if(count($similar_home) > 0)

                                @foreach($similar_home as $s_home)
                                    <article class="post">
                                        <figure class="post-thumb"><a href="{{route('details', $s_home->id)}}"><img src="{{image_path($s_home->cover)}}" alt=""></a></figure>
                                        <h4><a href="{{route('details', $s_home->id)}}">{{$s_home->country}} / {{$s_home->city}}</a></h4>
                                        <div class="address">U{{$s_home->city}}</div>
                                    </article>
                                @endforeach
                            @endif

                        </div>
                    </aside>
                </div>
                <!--End Sidebar Side-->

                <!--Content Side / Property Detail-->
                <div class="content-side col-lg-8 col-md-8 col-sm-12 col-xs-12">
                    <div class="property-detail">
                        <div class="inner-box">
                            <!--Upper Box-->
                            <div class="upper-box">
                                @php
                                    $maximum_period  = 0;
                                    if($home->rent_type == 'فتره زمنيه'){
                                           $maximum_period = $home->maximum_period;
                                    }
                                @endphp
                                <ul class="post-detail">
                                    <li><span class="fa fa-home"></span> {{$home->rent_type}}</li>
                                    @if($maximum_period !=0)
                                        <li><span class="fa fa-clock-o"></span> اقصي مده  : {{$home->maximum_period}} ايام </li>
                                    @endif
                                    <li><span class="icon fa fa-map-marker"></span>{{$home->address}} / {{$home->country}} / {{$home->city}}</li>
                                </ul>
                            </div>



                            @if(count($home->images) > 0)
                            <div class="dd">
                                <div class="show" href="1.jpg">
                                    <img src="{{image_path($home->images[0]->image)}}" id="show-img">
                                </div>

                                <div class="small-img">
                                    <div class="small-container">
                                        <div id="small-img-roll">
                                            @foreach($home->images as $image)
                                                <img src="{{image_path($image->image)}}" class="show-small-img" alt="">
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @endif


                            @if(!empty($home->description))

                            <h3>تفاصيل</h3>
                            <div class="text">
                                {!! $home->description !!}
                            </div>
                            @endif

                            <h4>معلومات ضرورية</h4>
                            <!--List Columns-->
                            <div class="list-columns">
                                <div class="row clearfix">
                                    <div class="column col-md-6 col-sm-6 col-xs-12">
                                        <ul class="list-style-three">
                                            <li>البلد : {{$home->country}}</li>
                                            <li>نوع الايجار : {{$home->rent_type}}</li>
                                            <li> الدور (الطابق) : {{$home->floor}}</li>
                                            <li> عدد الغرف : {{$home->number_of_bedroom}}</li>
                                            <li>  مساحة الشقه/ بالمتر : {{$home->home_space}}</li>
                                            <li>سعر الغرفه : {{$home->price_for_bedroom}}</li>
                                            <li>سعر اليوم : {{$home->price_for_day}}</li>

                                        </ul>
                                    </div>
                                    <div class="column col-md-6 col-sm-6 col-xs-12">
                                        <ul class="list-style-three">
                                            <li>المدينه : {{$home->city}}</li>
                                            <li>العنوان : {{$home->address}}</li>
                                            <li>عدد الحمامات : {{$home->number_of_bathroom	}}</li>
                                            <li>عدد السراير : {{$home->number_of_beds	}}</li>
                                            <li> سعر الشقه : {{$home->price_for_home}}</li>
                                            <li>  سعر السرير : {{$home->price_for_bed}}</li>
                                            <li> الجراش : {{$home->getGarage($home->garage)}}</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Contact Agent-->
                            <section class="agent-contact-section">
                                <div class="row clearfix">
                                    <!--Content Column-->
                                    <div class="content-column col-md-7 col-sm-7 col-xs-12">
                                        <h2>تواصل مع المالك</h2>
                                        <h3>{{$home->owner->name}}</h3>
                                        <ul class="list-style-two">
                                            <li><span class="icon fa fa-phone" style="margin-left: 10px;"></span>{{$home->owner->mobile}}</li>
                                            <li><span class="icon fa fa-envelope"style="margin-left: 10px;"></span>{{$home->owner->email}}</li>
                                        </ul>

                                    </div>
                                    <!--Image Column-->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        @if(auth()->guard('user')->check())
                                            <a href="{{route('front.reserve')}}" class="btn btn-success" style="font-size:20px"> <i class="fa fa-check-square-o" aria-hidden="true"> </i>طلب حجز</a>
                                        @else
                                            <a href="{{route('front.login')}}" class="btn btn-success" style="font-size:20px"> <i class="fa fa-check-square-o" aria-hidden="true"> </i>طلب حجز</a>
                                        @endif

                                    </div>
                                </div>
                            </section>
                            <!--Contact Agent-->

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->

@endsection

@section('js')
    <!-- Product Image Gallery Js -->
    <script src="{{asset('front/js')}}/zoom-image.js"></script>
    <script src="{{asset('front/js')}}/main.js"></script>
@endsection

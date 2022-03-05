@extends('layouts.front.app')

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

                            <!--Carousel Box-->
                            <div class="carousel-box">
                                <div class="property-single-carousel owl-carousel owl-theme">
                                    @if(count($home->images) > 0)
                                        @foreach($home->images as $image)
                                            <div class="slide">
                                                <div class="image">
                                                    <img src="{{image_path($home->cover)}}" alt="" />
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif

                                </div>
                            </div>

                            <h3>Property Detail</h3>
                            <div class="text">
                                <p>Fantastic One Bedroom Facing East In This Amazing Trump Place Doorman Building. There Is A Large Kitchen, Washer And Dryer, Great Light And Plenty Of Closet Space. In Addition, There Are Amazing Custom Made ‘Built Ins’ In The Living Room Providing Plenty Of Storage. The Building Has A Gym, Pool, Children’s Room, Valet Services, Full Time Concierge And Doorman.</p>
                                <blockquote>Main bath has been remodeled including a large shower with a tiled sitting bench. Back yard patio includes no-maintenance cover with built in lights. extra storage inside and out.</blockquote>
                                <p>Short sale approved at $440,000!! home with remodeled kitchen, upgraded cabinets and countertops, open floorplan with spacious layout including a huge separate family room. New windows and newer roof, new airconditioning, fully permitted additonal square footage to the original home. This is a beauty. Huge master with separate sitting/dressing area that would make a perfect nursery.Bonus walk in storage closet in family room.</p>
                            </div>

                            <h4>Essential Information</h4>
                            <!--List Columns-->
                            <div class="list-columns">
                                <div class="row clearfix">
                                    <div class="column col-md-6 col-sm-6 col-xs-12">
                                        <ul class="list-style-three">
                                            <li>Price: $500,000,0</li>
                                            <li>Property Types: Resident</li>
                                            <li>Country: USA</li>
                                            <li>Garages: 3</li>
                                            <li>Bathrooms: 4</li>
                                        </ul>
                                    </div>
                                    <div class="column col-md-6 col-sm-6 col-xs-12">
                                        <ul class="list-style-three">
                                            <li>For: Sale</li>
                                            <li>Area: 1000SQFT</li>
                                            <li>City: Sterling</li>
                                            <li>Bedrooms: 6</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!--Contact Agent-->
                            <section class="agent-contact-section">
                                <div class="row clearfix">
                                    <!--Content Column-->
                                    <div class="content-column col-md-7 col-sm-7 col-xs-12">
                                        <h2>Contact with Owner</h2>
                                        <h3>Jone Michal</h3>
                                        <ul class="list-style-two">
                                            <li><span class="icon fa fa-phone"></span>Call us +49 1234 5678 9</li>
                                            <li><span class="icon fa fa-envelope"></span>info@shinarealestate.com</li>
                                        </ul>

                                    </div>
                                    <!--Image Column-->
                                    <div class="col-md-5 col-sm-5 col-xs-12">
                                        <button class="btn btn-success" style="font-size:20px"><i class="fa fa-check-square-o" aria-hidden="true"></i> Reservation request</button>
                                    </div>
                                </div>
                            </section>
                            <!--Contact Agent-->

                        </div>
                    </div>
                </div>

                <!--Sidebar Side-->
                <div class="sidebar-side col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <aside class="sidebar">
                        <!-- Properties Posts -->
                        <div class="sidebar-widget properties-posts">
                            <div class="sidebar-title">
                                <h3>Similar Properties</h3>
                                <div class="separator"></div>
                            </div>

                            <article class="post">
                                <figure class="post-thumb"><a href="#"><img src="{{asset('front')}}/images/resource/post-thumb-3.jpg" alt=""></a></figure>
                                <h4><a href="#">401 Biscayne Boulevard</a></h4>
                                <div class="address">Unit 4/Street 14 Indus Street </div>
                                <div class="post-info">Price: 11,412</div>
                            </article>

                            <article class="post">
                                <figure class="post-thumb"><a href="#"><img src="{{asset('front')}}/images/resource/post-thumb-4.jpg" alt=""></a></figure>
                                <h4><a href="#">10 Romain St, Twin Peaks</a></h4>
                                <div class="address">Unit 4/Street 14 Indus Street </div>
                                <div class="post-info">Price: 11,412</div>
                            </article>

                            <article class="post">
                                <figure class="post-thumb"><a href="#"><img src="{{asset('front')}}/images/resource/post-thumb-5.jpg" alt=""></a></figure>
                                <h4><a href="#">Gorgeous Farm in Myrtle</a></h4>
                                <div class="address">Unit 4/Street 14 Indus Street </div>
                                <div class="post-info">Price: 11,412</div>
                            </article>

                        </div>
                    </aside>
                </div>
                <!--End Sidebar Side-->

            </div>
        </div>
    </div>
    <!--End Sidebar Page Container-->

@endsection

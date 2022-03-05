@extends('layouts.front.app')

@section('contain')
    <!--Property Info Tabs-->
    <section class="property-tabs-section">
        <div class="auto-container">
            <div class="inner-section">
                <!--Property Info Tabs-->
                <div class="property-search-tab">

                    <!--Property Tabs-->
                    <div class="property-tabs tabs-box">
                        <ul class="tab-btns tab-buttons clearfix">
                            <li data-tab="#rent" class="tab-btn">إيجار</li>
                        </ul>

                        <!--Tabs Container-->
                        <div class="tabs-content mt-5">
                            <div class="tab active-tab" id="rent">
                                <div class="content">

                                    <!-- Property Search Form -->
                                    <div class="property-search-form">
                                        <!--Comment Form-->
                                        <form method="post"
                                              action="https://html.efforttech.com/html/shina-realstate/blog.html">

                                            <div class="row clearfix">

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">city</label>
                                                    <select class="custom-select-box">
                                                        <option>Any</option>
                                                        <option>New York</option>
                                                        <option>California</option>
                                                        <option>Chicago</option>
                                                        <option>Melborne</option>
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">search by property id</label>
                                                    <select class="custom-select-box">
                                                        <option>Search ID</option>
                                                        <option>Id One</option>
                                                        <option>Id Two</option>
                                                        <option>Id Three</option>
                                                        <option>Id Four</option>
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">search by Address</label>
                                                    <select class="custom-select-box">
                                                        <option>Search ID</option>
                                                        <option>Id One</option>
                                                        <option>Id Two</option>
                                                        <option>Id Three</option>
                                                        <option>Id Four</option>
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">Location</label>
                                                    <select class="custom-select-box">
                                                        <option>Any</option>
                                                        <option>New York</option>
                                                        <option>California</option>
                                                        <option>Chicago</option>
                                                        <option>Melborne</option>
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">Country</label>
                                                    <select class="custom-select-box">
                                                        <option>Any</option>
                                                        <option>New York</option>
                                                        <option>California</option>
                                                        <option>Chicago</option>
                                                        <option>Melborne</option>
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">Price from</label>
                                                    <select class="custom-select-box">
                                                        <option>Any</option>
                                                        <option>10 - 50</option>
                                                        <option>50 - 100</option>
                                                        <option>150 - 200</option>
                                                        <option>250 - 250</option>
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">Price to</label>
                                                    <select class="custom-select-box">
                                                        <option>Any</option>
                                                        <option>10 - 50</option>
                                                        <option>50 - 100</option>
                                                        <option>150 - 200</option>
                                                        <option>250 - 250</option>
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">&ensp;</label>
                                                    <button class="theme-btn search-btn" type="submit"
                                                            name="submit-form">Search
                                                    </button>
                                                </div>

                                            </div>

                                        </form>

                                    </div>
                                    <!--End Property Form -->

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--End Product Info Tabs-->

            </div>
        </div>
    </section>
    <!--End Property Tab Form-->

    <!--Property Section-->
    <section class="property-section">
        <div class="auto-container">
            <!--Sec Title-->
            <div class="sec-title centered">
                <div class="title">عقاراتنا المميزة للإيجار</div>
                <h2>عقارات للإيجار</h2>
                <div class="separator"></div>
            </div>
            <div class="row clearfix">

                @if(count($howes) > 0)
                    @foreach($howes as $home)
                        <div class="property-block col-md-4 col-sm-6 col-xs-12">
                            <div class="inner-box">
                                <div class="image">
                                    <a href="{{route('details', $home->id)}}">
                                        <img src="{{image_path($home->cover)}}" alt=""/></a>
                                    @php
                                        $price = 0;
                                        $maximum_period  = 0;
                                        if($home->rent_type == 'شقه'){
                                           $price = $home->price_for_home;
                                        }elseif ($home->rent_type == 'سرير'){
                                               $price = $home->price_for_bed;
                                        }elseif($home->rent_type == 'فتره زمنيه'){
                                               $price = $home->price_for_day;
                                               $maximum_period = $home->maximum_period;
                                        }
                                    @endphp
                                    <div class="price">{{$price}}</div>

                                </div>
                                <div class="lower-content">
                                    <div class="upper-box">
                                        <h3><a href="{{route('details', $home->id)}}">نوع الإيجار : {{$home->rent_type}}</a></h3>
                                        @if($maximum_period != 0)
                                            <h3>اقصي مده  : {{$home->maximum_period}} يوم </h3>
                                        @endif
                                        <div class="location">{{$home->country}} -> {{$home->city}}</div>
                                        <div class="text">
                                            {{$home->address}}
                                        </div>
                                    </div>
                                    <div class="lower-box clearfix">
                                        <div class="pull-left">
                                            <ul>
                                                <li><span class="icon flaticon-bed-1"></span>{{$home->number_of_beds}}
                                                </li>
                                                <li><span
                                                        class="icon flaticon-bathtube-with-shower"></span>{{$home->number_of_bathroom}}
                                                </li>

                                                @if($home->garage == 1)
                                                    <li> متاح جراش <span class="icon flaticon-garage"></span></li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="pull-right">
                                            <ul>
                                                <li>{{$home->home_space }} : متر <span
                                                        class="icon flaticon-squares"></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!--End Property Section-->
@endsection

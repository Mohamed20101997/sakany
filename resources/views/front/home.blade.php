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
                                        <form method="get" action="{{route('home')}}">
                                            @csrf
                                            @method('get')

                                            <div class="row clearfix">

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">البلد</label>
                                                    <select class="custom-select-box" name="country">
                                                        <option value=""  {{request('country') == '' ? 'selected' : ''}}>اختر</option>
                                                        @if(count(getDistaincat('country')) > 0)
                                                            @foreach( getDistaincat('country') as $country)
                                                                <option value="{{$country}}" {{request('country') == $country ? 'selected' : ''}} >{{$country}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">المدينه</label>
                                                    <select class="custom-select-box" name="city">
                                                        <option value="" {{request('city') == '' ? 'selected' : ''}}>اختر</option>
                                                        @if(count(getDistaincat('city')) > 0)
                                                            @foreach( getDistaincat('city') as $city)
                                                                <option value="{{$city}}" {{request('city') == $city ? 'selected' : ''}}>{{$city}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">نوع الايجار</label>
                                                    <select class="custom-select-box" name="rent_type">
                                                        <option value="">اختر</option>
                                                        <option value="home" {{request('rent_type') == 'home' ? 'selected' : ''}}>شقه</option>
                                                        <option value="bed" {{request('rent_type') == 'bed' ? 'selected' : ''}}>سرير</option>
                                                        <option value="period_of_time" {{request('rent_type') == 'period_of_time' ? 'selected' : ''}}>فتره زمنيه</option>
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">الجراش</label>
                                                        <select class="custom-select-box" name="garage">
                                                        <option value=""  {{request('garage') == '' ? 'selected' : ''}}>اختر</option>
                                                        <option value="1"  {{request('garage') == '1' ? 'selected' : ''}}>متاح</option>
                                                        <option value="0" {{request('garage') == '0' ? 'selected' : ''}}>غير متاح </option>
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">الدور</label>
                                                    <select class="custom-select-box" name="floor">
                                                        <option value="">Any</option>
                                                        @if(count(getDistaincat('floor')) > 0)
                                                            @foreach( getDistaincat('floor') as $floor)
                                                                <option value="{{$floor}}" {{request('floor') == $floor ? 'selected' : ''}}>{{$floor}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>

                                                <!--Form Group-->
                                                <div class="form-group col-md-3 col-sm-4 col-xs-12">
                                                    <label class="field-label">&ensp;</label>
                                                    <button class="theme-btn search-btn" type="submit"
                                                            name="submit-form">بحث
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
                                    <div class="price">{{$price}}  جنيه </div>

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

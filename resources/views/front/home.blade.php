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
                            <li data-tab="#rent" class="tab-btn">Rent</li>
                        </ul>

                        <!--Tabs Container-->
                        <div class="tabs-content">
                            <div class="tab active-tab"  id="rent">
                                <div class="content">

                                    <!-- Property Search Form -->
                                    <div class="property-search-form">
                                        <!--Comment Form-->
                                        <form method="post" action="https://html.efforttech.com/html/shina-realstate/blog.html">

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
                                                    <button class="theme-btn search-btn" type="submit" name="submit-form">Search</button>
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
                <div class="title">Our Featured Properties For Rent</div>
                <h2>Properties For  Rent</h2>
                <div class="separator"></div>
            </div>
            <div class="row clearfix">

                <!--Property Block-->
                <div class="property-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route('details')}}"><img src="{{asset('front')}}/images/resource/property-1.jpg" alt="" /></a>
                            <div class="price">$11,412</div>
                        </div>
                        <div class="lower-content">
                            <div class="upper-box">
                                <h3><a href="{{route('details')}}">Lovelace Road Greenfield</a></h3>
                                <div class="location">New Yark</div>
                                <div class="text">Citizens of distant epochs. Jean-François Champollion explorations? Brain is the seed of intelligence from which we</div>
                            </div>
                            <div class="lower-box clearfix">
                                <div class="pull-left">
                                    <ul>
                                        <li><span class="icon flaticon-bed-1"></span>03</li>
                                        <li><span class="icon flaticon-bathtube-with-shower"></span>03</li>
                                        <li><span class="icon flaticon-garage"></span>02</li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <ul>
                                        <li><span class="icon flaticon-squares"></span>1040 square</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Property Block-->
                <div class="property-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route('details')}}"><img src="{{asset('front')}}/images/resource/property-2.jpg" alt="" /></a>
                            <div class="price">$11,512</div>
                        </div>
                        <div class="lower-content">
                            <div class="upper-box">
                                <h3><a href="{{route('details')}}">Gorgeous Farm in Myrtle</a></h3>
                                <div class="location">New Yark</div>
                                <div class="text">Citizens of distant epochs. Jean-François Champollion explorations? Brain is the seed of intelligence from which we</div>
                            </div>
                            <div class="lower-box clearfix">
                                <div class="pull-left">
                                    <ul>
                                        <li><span class="icon flaticon-bed-1"></span>03</li>
                                        <li><span class="icon flaticon-bathtube-with-shower"></span>03</li>
                                        <li><span class="icon flaticon-garage"></span>02</li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <ul>
                                        <li><span class="icon flaticon-squares"></span>1040 square</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Property Block-->
                <div class="property-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route('details')}}"><img src="{{asset('front')}}/images/resource/property-3.jpg" alt="" /></a>
                            <div class="price">$12,412</div>
                        </div>
                        <div class="lower-content">
                            <div class="upper-box">
                                <h3><a href="{{route('details')}}">1200 Anastasia Avenue</a></h3>
                                <div class="location">New Yark</div>
                                <div class="text">Citizens of distant epochs. Jean-François Champollion explorations? Brain is the seed of intelligence from which we</div>
                            </div>
                            <div class="lower-box clearfix">
                                <div class="pull-left">
                                    <ul>
                                        <li><span class="icon flaticon-bed-1"></span>03</li>
                                        <li><span class="icon flaticon-bathtube-with-shower"></span>03</li>
                                        <li><span class="icon flaticon-garage"></span>02</li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <ul>
                                        <li><span class="icon flaticon-squares"></span>1040 square</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Property Block-->
                <div class="property-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route('details')}}"><img src="{{asset('front')}}/images/resource/property-4.jpg" alt="" /></a>
                            <div class="price">$21,412</div>
                        </div>
                        <div class="lower-content">
                            <div class="upper-box">
                                <h3><a href="{{route('details')}}">10 Romain St, Twin Peaks</a></h3>
                                <div class="location">New Yark</div>
                                <div class="text">Citizens of distant epochs. Jean-François Champollion explorations? Brain is the seed of intelligence from which we</div>
                            </div>
                            <div class="lower-box clearfix">
                                <div class="pull-left">
                                    <ul>
                                        <li><span class="icon flaticon-bed-1"></span>03</li>
                                        <li><span class="icon flaticon-bathtube-with-shower"></span>03</li>
                                        <li><span class="icon flaticon-garage"></span>02</li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <ul>
                                        <li><span class="icon flaticon-squares"></span>1040 square</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Property Block-->
                <div class="property-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route('details')}}"><img src="{{asset('front')}}/images/resource/property-5.jpg" alt="" /></a>
                            <div class="price">$25,412</div>
                        </div>
                        <div class="lower-content">
                            <div class="upper-box">
                                <h3><a href="{{route('details')}}">Luxury Villa In Rego Park</a></h3>
                                <div class="location">New Yark</div>
                                <div class="text">Citizens of distant epochs. Jean-François Champollion explorations? Brain is the seed of intelligence from which we</div>
                            </div>
                            <div class="lower-box clearfix">
                                <div class="pull-left">
                                    <ul>
                                        <li><span class="icon flaticon-bed-1"></span>03</li>
                                        <li><span class="icon flaticon-bathtube-with-shower"></span>03</li>
                                        <li><span class="icon flaticon-garage"></span>02</li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <ul>
                                        <li><span class="icon flaticon-squares"></span>1040 square</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Property Block-->
                <div class="property-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="image">
                            <a href="{{route('details')}}"><img src="{{asset('front')}}/images/resource/property-6.jpg" alt="" /></a>
                            <div class="price">$10,412</div>
                        </div>
                        <div class="lower-content">
                            <div class="upper-box">
                                <h3><a href="{{route('details')}}">Biscayne Boulevard</a></h3>
                                <div class="location">New Yark</div>
                                <div class="text">Citizens of distant epochs. Jean-François Champollion explorations? Brain is the seed of intelligence from which we</div>
                            </div>
                            <div class="lower-box clearfix">
                                <div class="pull-left">
                                    <ul>
                                        <li><span class="icon flaticon-bed-1"></span>03</li>
                                        <li><span class="icon flaticon-bathtube-with-shower"></span>03</li>
                                        <li><span class="icon flaticon-garage"></span>02</li>
                                    </ul>
                                </div>
                                <div class="pull-right">
                                    <ul>
                                        <li><span class="icon flaticon-squares"></span>1040 square</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!--End Property Section-->
@endsection

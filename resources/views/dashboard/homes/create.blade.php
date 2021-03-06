@extends('layouts.dashboard.app')

@section('content')
    <h1>الشقق</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الصفحه الرئيسيه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('home.index') }}">الشقق</a></li>
        <li class="breadcrumb-item" active>إضافه</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form method="POST" action="{{ route('home.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')

                    <div class="row mt-4 ">
                        <div class="col-md-4">
                            {{-- country --}}
                            <div class="form-group">
                                <label>البلد</label>
                                <input type="text" name="country" placeholder="اضافة البلد" class="form-control" required
                                    value="{{ old('country') }}">
                                @error('country')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col country --}}


                        <div class="col-md-4">
                            {{-- city --}}
                            <div class="form-group">
                                <label>المدينه</label>
                                <input type="text" name="city" placeholder="اضافة المدينه" class="form-control" required
                                    value="{{ old('city') }}">
                                @error('city')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col city --}}

                        <div class="col-md-2">
                            {{-- rent_type --}}
                            <div class="form-group">
                                <label>نوع الايجار</label>
                                <select class="form-control select2" name="rent_type" id="rent_type" required>
                                    <option value="home" {{ old('rent_type') == 'home' ? 'selected' : '' }}>شقه</option>
                                    <option value="bed" {{ old('rent_type') == 'bed' ? 'selected' : '' }}>سرير</option>
                                    <option value="period_of_time"
                                        {{ old('rent_type') == 'period_of_time' ? 'selected' : '' }}>فتره زمنيه</option>
                                </select>

                                @error('rent_type')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col rent_type --}}

                        <div class="col-md-2">
                            {{-- floor --}}
                            <div class="form-group">
                                <label>الدور (الطابق)</label>
                                <input type="number" min="1" placeholder="اضافه الدور (الطابق)" name="floor"
                                    class="form-control" required value="{{ old('floor') }}">
                                @error('floor')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col floor --}}

                    </div> {{-- end of row --}}

                    <hr class="mt-4 mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>صورة الغلاف</label><br>
                                <label class="file center-block">
                                    <input type="file" name="cover" required>
                                    <span class="file-custom"></span>
                                </label>
                                <br>
                                @error('cover')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>{{-- end of col cover --}}

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>صورة الشقه / اضافة العديد من الصور</label><br>
                                <label class="file center-block">
                                    <input type="file" name="images[]" multiple required>
                                    <span class="file-custom"></span>
                                </label>
                                <br>
                                @error('images')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>{{-- end of col images --}}


                        <div class="col-md-4">
                            {{-- address --}}
                            <div class="form-group">
                                <label>العنوان</label>
                                <input type="text" name="address" placeholder="عنوان الشقه " class="form-control" required
                                    value="{{ old('address') }}">
                                @error('address')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col address --}}

                    </div>{{-- end of col row --}}
                    <hr class="mt-4 mb-4">

                    <div class="row">
                        <div class="col-md">
                            {{-- number_of_bathroom --}}
                            <div class="form-group">
                                <label>عدد الحمامات</label>
                                <input type="number" min="1" placeholder="عدد الحمامات" name="number_of_bathroom"
                                    class="form-control" required value="{{ old('number_of_bathroom') }}">
                                @error('number_of_bathroom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col number_of_bathroom --}}

                        <div class="col-md">
                            {{-- number_of_bedroom --}}
                            <div class="form-group">
                                <label>عدد الغرف</label>
                                <input type="number" min="1" placeholder="عدد الغرف" name="number_of_bedroom"
                                    class="form-control" required value="{{ old('number_of_bedroom') }}">
                                @error('number_of_bedroom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col number_of_bedroom --}}


                        <div class="col-md">
                            {{-- number_of_beds --}}
                            <div class="form-group">
                                <label>عدد السراير</label>
                                <input type="number" min="1" placeholder="عدد السراير" name="number_of_beds"
                                    class="form-control" required value="{{ old('number_of_beds') }}">
                                @error('number_of_beds')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col number_of_beds --}}

                        <div class="col-md">
                            {{-- home_space --}}
                            <div class="form-group">
                                <label>مساحة الشقه/ بالمتر</label>
                                <input type="number" min="1" placeholder="مساحة الشقه بالمتر" name="home_space"
                                    class="form-control" value="{{ old('home_space') }}">
                                @error('home_space')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col home_space --}}

                        <div class="col-md">
                            {{-- maximum_period --}}
                            <div class="form-group">
                                <label>اقصي فتره زمنيه / بالايام</label>
                                <input type="number" min="1" placeholder="قصي فتره زمنيه" name="maximum_period"
                                    class="form-control" value="{{ old('maximum_period') }}">
                                @error('maximum_period')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col maximum_period --}}

                    </div> {{-- end of col row --}}

                    <hr class="mt-4 mb-4">
                    <div class="row">

                        <div class="col-md">
                            {{-- price_for_home --}}
                            <div class="form-group">
                                <label>سعر الشقه</label>
                                <input type="number" min="1" placeholder="سعر الشقه" name="price_for_home"
                                    class="form-control" id="price_for_home" value="{{ old('price_for_home') }}">
                                @error('price_for_home')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col price_for_home --}}

                        <div class="col-md">
                            {{-- price_for_bedroom --}}
                            <div class="form-group">
                                <label>سعر الغرفه</label>
                                <input type="number" min="1" placeholder="سعر الغرفه" name="price_for_bedroom"
                                    class="form-control" id="price_for_bedroom" value="{{ old('price_for_bedroom') }}">
                                @error('price_for_bedroom')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col price_for_bedroom --}}

                        <div class="col-md">
                            {{-- price_for_bed --}}
                            <div class="form-group">
                                <label>سعر السرير</label>
                                <input type="number" min="1" placeholder="سعر السرير" name="price_for_bed"
                                    class="form-control" id="price_for_bed" value="{{ old('price_for_bed') }}">
                                @error('price_for_bed')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col price_for_bed --}}

                        <div class="col-md">
                            {{-- price_for_bed --}}
                            <div class="form-group">
                                <label>سعر اليوم</label>
                                <input type="number" min="1" placeholder="سعر اليوم" name="price_for_day"
                                    class="form-control" id="price_for_day" value="{{ old('price_for_day') }}">
                                @error('price_for_day')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col price_for_bed --}}

                        <div class="col-md-2">
                            {{-- owner_id --}}
                            <div class="form-group">
                                <label>اختر مالك</label>
                                <select class="form-control select2" name="owner_id" required>
                                    <option value="">اختر مالك</option>
                                    @if (count($owners) > 0)
                                        @foreach ($owners as $owner)
                                            <option value="{{ $owner->id }}"
                                                {{ old('owner_id') == $owner->id ? 'selected' : '' }}>
                                                {{ $owner->name }}
                                            </option>
                                        @endforeach
                                    @endif
                                </select>

                                @error('owner_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col rent_type --}}

                    </div> {{-- end of col row --}}

                    <hr class="mt-4 mb-4">
                    <div class="row">
                        <div class="col-md-4">
                            {{-- state --}}
                            <div class="form-group">
                                <div class="toggle-flip">
                                    <label>حالة الشقه</label> <br>
                                    <label><input type="checkbox" value="1" name="state" data-color="success" checked>
                                        <span class="flip-indecator" data-toggle-on="مفعله"
                                            data-toggle-off="غير مفعله"></span>
                                    </label>
                                </div>
                            </div>
                        </div>{{-- end of col state --}}


                        <div class="col-md-4">
                            {{-- reserved --}}
                            <div class="form-group">
                                <div class="toggle-flip">
                                    <label>حجز الشقه</label> <br>
                                    <label><input type="checkbox" value="1" name="reserved" data-color="success">
                                        <span class="flip-indecator" data-toggle-on="محجوزه"
                                            data-toggle-off="غير محجوزه"></span>
                                    </label>
                                </div>
                            </div>
                        </div>{{-- end of col reserved --}}

                        <div class="col-md-4">
                            {{-- garage --}}
                            <div class="form-group">
                                <div class="toggle-flip">
                                    <label>جراش</label> <br>
                                    <label><input type="checkbox" value="1" name="garage" data-color="success">
                                        <span class="flip-indecator" data-toggle-on="متاح"
                                            data-toggle-off="غير متاح"></span>
                                    </label>
                                </div>
                            </div>
                        </div>{{-- end of col garage --}}
                    </div> {{-- end of col row --}}
                    <hr class="mt-4 mb-4">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>وصف</label>

                                <textarea name="description" rows="4" cols="50" id="summernote"
                                    class="form-control">{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of description --}}
                    </div>

                    <hr class="mt-4 mb-4">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>إضافه</button>
                    </div>
                </form>

            </div> {{-- end of tile --}}

        </div> {{-- end of col --}}
    </div> {{-- end of row --}}


@endsection

@section('script')
    <script>
        $(document).ready(function() {
            var rent_type = $('#rent_type  option:selected').val()
            var price_for_home = $('#price_for_home')
            var price_for_day = $('#price_for_day')
            var price_for_bed = $('#price_for_bed')


            if(rent_type == 'home'){
                price_for_home.prop('required',true)
            }else if(rent_type == 'bed'){
                price_for_bed.prop('required',true);
            }else if(rent_type == 'period_of_time'){
                price_for_day.prop('required',true);
            }

            $('#rent_type').on('change', function() {

                if (this.value == 'home') {
                    var att = price_for_home.attr('required')
                    if (typeof att === 'undefined') {
                        price_for_home.prop('required',true)
                        price_for_day.removeAttr('required');
                        price_for_bed.removeAttr('required');
                    }
                }else if(this.value == 'bed'){
                    var att = price_for_bed.attr('required')

                    if (typeof att === 'undefined') {
                        price_for_bed.prop('required',true);
                        price_for_day.removeAttr('required');
                        price_for_home.removeAttr('required')
                    }
                }else if(this.value == 'period_of_time'){
                    var att = price_for_day.attr('required')

                    if (typeof att === 'undefined') {
                        price_for_day.prop('required',true);
                        price_for_bed.removeAttr('required');
                        price_for_home.removeAttr('required')
                    }
                }

            });

        });
    </script>
@endsection

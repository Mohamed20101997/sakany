@extends('layouts.dashboard.app')

@section('content')
    <h1>الملاك</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الصفحه الرئيسيه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('owner.index') }}">الملاك</a></li>
        <li class="breadcrumb-item" active>تعديل</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form method="POST" action="{{ route('owner.update', $owner->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-4">
                            {{-- Name --}}
                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" name="name" placeholder="اضافة الاسم" class="form-control" required value="{{ old('name',$owner->name) }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col name --}}

                        <div class="col-md-4">
                            {{-- Email --}}
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input type="email" placeholder="اضافة البريد الالكتروني" name="email" class="form-control"
                                    required value="{{ old('email',$owner->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Email --}}

                        <div class="col-md-4">
                            {{-- phone --}}
                            <div class="form-group">
                                <label>الهاتف</label>
                                <input type="tel" placeholder="اضافة رقم الهاتف" name="mobile" class="form-control"
                                    required value="{{ old('mobile' , $owner->mobile) }}">
                                @error('mobile')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col mobile --}}


                    </div> {{-- end of row --}}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>الصورة الشخصيه</label><br>
                                <label class="file center-block">
                                    <input type="file" name="image">
                                    <span class="file-custom"></span>
                                </label>
                                <br>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> البطاقه الشخصيه </label> <br>
                                <label class="file center-block">
                                    <input type="file" name="id_image">
                                    <span class="file-custom"></span>
                                </label>
                                <br>
                                @error('id_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            {{-- age --}}
                            <div class="form-group">
                                <label>العمر</label>
                                <input type="number" placeholder="اضافة العمر" min="16" name="age" class="form-control"
                                    required value="{{ old('age', $owner->age) }}">
                                @error('age')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col age --}}


                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            {{-- Password --}}
                            <div class="form-group">
                                <label>الرقم السري</label>
                                <input type="password" placeholder="اضافة الرقم السري"  name="password"
                                    class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password --}}

                        <div class="col-md-4">
                            {{-- Password confirmation --}}
                            <div class="form-group">
                                <label>تاكيد الرقم السري</label>
                                <input type="password" name="password_confirmation" placeholder="اضافة الرقم السري"
                                     class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password confirmation --}}

                        <div class="col-md-4">
                            {{-- state --}}
                            <div class="form-group">
                                <div class="toggle-flip">
                                    <label>حالة المالك</label> <br>
                                    <label><input type="checkbox" value="1" name="state" data-color="success" {{$owner->state == 1 ? 'checked' : ''}}>
                                        <span class="flip-indecator" data-toggle-on="مفعله" data-toggle-off="غير مفعله"></span>
                                    </label>
                                </div>
                            </div>
                        </div>{{-- end of col state --}}

                    </div>{{-- end of row --}}



                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>تحديث</button>
                    </div>
                </form>

            </div> {{-- end of tile --}}

        </div> {{-- end of col --}}
    </div> {{-- end of row --}}
@endsection

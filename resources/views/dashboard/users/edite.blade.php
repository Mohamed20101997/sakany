@extends('layouts.dashboard.app')

@section('content')
    <h1>المستخدمين</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الصفحة الرئيسيه</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">المستخدمين</a></li>
        <li class="breadcrumb-item" active>تعديل</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form method="POST" action="{{ route('user.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-md-4">
                            {{-- Name --}}
                            <div class="form-group">
                                <label>الاسم</label>
                                <input type="text" name="name" placeholder="Enter the name" class="form-control" required value="{{ old('name',$user->name) }}">
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col name --}}

                        <div class="col-md-4">
                            {{-- Email --}}
                            <div class="form-group">
                                <label>البريد الالكتروني</label>
                                <input type="email" placeholder="ادخال البريد الالكتروني" name="email" class="form-control"
                                    required value="{{ old('email',$user->email) }}">
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Email --}}

                        <div class="col-md-4">
                            {{-- phone --}}
                            <div class="form-group">
                                <label>الهاتف</label>
                                <input type="tel" placeholder="ادخال رقم الهاتف" name="mobile" class="form-control"
                                    required value="{{ old('mobile' , $user->mobile) }}">
                                @error('mobile')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col mobile --}}


                    </div> {{-- end of row --}}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>الصوره الشخصيه</label><br>
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
                            {{-- age --}}
                            <div class="form-group">
                                <label>العمر</label>
                                <input type="number" placeholder="ادخال العمر" min="16" name="age" class="form-control"
                                    required value="{{ old('age', $user->age) }}">
                                @error('age')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col age --}}

                        <div class="col-md-4">
                            {{-- state --}}
                            <div class="form-group">
                                <div class="toggle-flip">
                                    <label>حالة المستخدم</label> <br>
                                    <label><input type="checkbox" value="1" name="state" data-color="success" {{$user->state == 1 ? 'checked' : ''}}>
                                        <span class="flip-indecator" data-toggle-on="مفعله" data-toggle-off="غير مفعله"></span>
                                    </label>
                                </div>
                            </div>
                        </div>{{-- end of col state --}}

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{-- Password --}}
                            <div class="form-group">
                                <label>الرقم السري</label>
                                <input type="password" placeholder="ادخال الرقم السري"  name="password"
                                    class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password --}}

                        <div class="col-md-6">
                            {{-- Password confirmation --}}
                            <div class="form-group">
                                <label>تاكيد الرقم السري</label>
                                <input type="password" name="password_confirmation" placeholder="ادخال الرقم السري"
                                     class="form-control">
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password confirmation --}}

                    </div>{{-- end of row --}}


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i>تحديث</button>
                    </div>
                </form>

            </div> {{-- end of tile --}}

        </div> {{-- end of col --}}
    </div> {{-- end of row --}}
@endsection

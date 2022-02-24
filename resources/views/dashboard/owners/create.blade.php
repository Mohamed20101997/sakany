@extends('layouts.dashboard.app')

@section('content')
    <h1>Owners</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('owner.index') }}">Owners</a></li>
        <li class="breadcrumb-item" active>Add</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb4">
                <form method="POST" action="{{ route('owner.store') }}" enctype="multipart/form-data">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-md-4">
                            {{-- Name --}}
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" placeholder="Enter the name" class="form-control"
                                       required value="{{ old('name') }}">
                                @error('name')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col name --}}

                        <div class="col-md-4">
                            {{-- Email --}}
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" placeholder="Enter the email" name="email" class="form-control"
                                       required value="{{ old('email') }}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Email --}}

                        <div class="col-md-4">
                            {{-- phone --}}
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="tel" placeholder="Enter the phone number" name="mobile"
                                       class="form-control" required value="{{ old('mobile') }}">
                                @error('email')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Email --}}


                    </div> {{-- end of row --}}

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>photo</label><br>
                                <label class="file center-block">
                                    <input type="file"  name="image">
                                    <span class="file-custom"></span>
                                </label>
                                <br>
                                @error('image')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label> personal ID Photo</label> <br>
                                <label class="file center-block">
                                    <input type="file" name="id_image">
                                    <span class="file-custom"></span>
                                </label>
                                <br>
                                @error('id_image')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            {{-- age --}}
                            <div class="form-group">
                                <label>Age</label>
                                <input type="number" placeholder="Enter the age number" name="age"
                                       class="form-control" required value="{{ old('age') }}">
                                @error('age')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col age --}}


                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {{-- Password --}}
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" placeholder="Enter your complexity password" required
                                       name="password" class="form-control">
                                @error('password')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password --}}

                        <div class="col-md-6">
                            {{-- Password confirmation --}}
                            <div class="form-group">
                                <label>Password confirmation</label>
                                <input type="password" name="password_confirmation" placeholder="Re-enter your password"
                                       required class="form-control">
                                @error('password')
                                <div class="text-danger">{{$message}}</div>
                                @enderror
                            </div>
                        </div>{{-- end of col Password confirmation --}}

                    </div>{{-- end of row --}}


                    <div class="form-group">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i>Add</button>
                    </div>
                </form>

            </div> {{-- end of tile  --}}

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}


@endsection

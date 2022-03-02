@extends('layouts.dashboard.app')

@section('content')

    <h1>الملاك</h1>

    <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('welcome') }}">الصفحه الرئيسيه </a></li>
        <li class="breadcrumb-item" active>الملاك</li>
    </ul>


    <div class="row">
        <div class="col-md-12">

            <div class="tile mb-4">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" autofocus name="search" placeholder="بحث" class="form-control" value="{{ request()->search }}">
                            </div>
                        </div><!-- end of col 4 -->

                        <div class="col-md-8">
                            <button type="submit" class="btn btn-success"><i class="fa fa-search"></i></button>
                            <a href="{{ route('owner.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        </div> <!-- end of col 12 -->

                    </div> <!-- end of row -->
                </form> <!-- end of form -->
                <div class="row">
                    <div class="col-md-12">
                        @if ($owners->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>البريد الالكتروني</th>
                                        <th>الهاتف</th>
                                        <th>العمر</th>
                                        <th>الصورة الشخصيه</th>
                                        <th>الحاله</th>
                                        <th>الاعدادات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($owners as $index=>$owner)
                                        <tr>
                                            <td>{{ $index+1 }}</td>
                                            <td>{{ $owner->name }}</td>
                                            <td>{{ $owner->email }}</td>
                                            <td>{{ $owner->mobile }}</td>
                                            <td>{{ $owner->age }}</td>
                                            <td>
                                                @if(!empty($owner->image))
                                                    <img src="{{image_path($owner->image)}}" width="60px" class="img-thumbnail">
                                                @else
                                                    <img src="{{image_path('user.png')}}" width="60px" class="img-thumbnail">
                                                @endif
                                            </td>
                                            <td>
                                                <h5 style="display: inline-block"><span class="badge badge-primary p-2">{{ $owner->getActive($owner->statues)}}</span></h5>
                                            </td>
                                            <td>
                                                <a href="{{ route('owner.edit', $owner->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <form method="post" action={{ route('owner.destroy', $owner->id)}} style="display:inline-block">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger btn-sm delete"><i class="fa fa-trash"></i></button>
                                                </form> <!-- end of form -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $owners->appends(request()->query())->links() }}

                        @else
                            <h3 class="alert alert-info text-center d-flex justify-content-center" style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i> لا يوجد اي بيانات للعرض</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}
@endsection

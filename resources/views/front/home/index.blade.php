@extends('layouts.front.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front.css') }}">
@endsection
@section('contain')

    <main class="app-content">
    <h1>الشقق</h1>

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
                            <a href="{{ route('add_home.create') }}" class="btn btn-primary"><i class="fa fa-plus"></i></a>
                        </div> <!-- end of col 12 -->

                    </div> <!-- end of row -->
                </form> <!-- end of form -->
                <div class="row">
                    <div class="col-md-12">
                        @if ($homes->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>صورة</th>
                                        <th>البلد</th>
                                        <th>المدينه</th>
                                        <th>الدور (الطابق)</th>
                                        <th>العنوان</th>
                                        <th>عدد الغرف</th>
                                        <th>عدد الحمامات</th>
                                        <th>عدد السراير</th>
                                        <th>نوع الايجار</th>
                                        <th>حالة الحجز</th>
                                        <th>حالة الشقه</th>
                                        <th>الاعدادات</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($homes as $index=>$home)
                                        <tr>
                                            <td>{{ $index+1 }}</td>

                                            <td><img src="{{image_path($home->cover)}}" width="60px" class="img-thumbnail"> </td>
                                            <td>{{$home->country}}</td>
                                            <td>{{$home->city}}</td>
                                            <td><span class="badge badge-danger p-2">{{$home->floor}}</span> </td>
                                            <td>{{$home->address}}</td>
                                            <td>{{$home->number_of_bedroom}}</td>
                                            <td>{{$home->number_of_bathroom}}</td>
                                            <td>{{$home->number_of_beds}}</td>
                                            <td>{{$home->rent_type}}</td>

                                            <td>
                                                <h5 style="display: inline-block"><span class="badge badge-primary p-2">{{ $home->getReserved($home->reserved)}}</span></h5>
                                            </td>

                                            <td>
                                                <h5 style="display: inline-block"><span class="badge badge-primary p-2">{{ $home->getActive($home->state)}}</span></h5>
                                            </td>

                                            <td>
                                                <a href="{{ route('add_home.edit', $home->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('details', $home->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                <form method="post" action={{ route('add_home.destroy', $home->id)}} style="display:inline-block">
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
                            {{ $homes->appends(request()->query())->links() }}
                        @else
                            <h3 class="alert alert-info text-center d-flex justify-content-center" style="margin: 0 auto; font-weight: 400"><i class="fa fa-exclamation-triangle"></i> لا يوجد اي بيانات للعرض</h3>
                        @endif
                    </div> <!-- end of col-md-12 -->
                </div> <!-- end of row -->

            </div> <!-- end of tile -->

        </div> {{-- end of col  --}}
    </div> {{-- end of row  --}}

    </main>
@endsection
@section('js')
    <script>
        $(document).ready(function(){
            $(document).on('click','.delete',function(e){
                e.preventDefault();
                var that = $(this);
                var n = new Noty({
                    text : 'تأكيد حذف السجل',
                    killer : true,
                    themes: 'relax',
                    buttons:[
                        Noty.button('نعم', 'btn btn-success mr-2', function(){
                            that.closest('form').submit();
                        }),

                        Noty.button('لا', 'btn btn-danger', function(){
                            n.close();
                        }),
                    ]
                });
                n.show();

            });

        });
    </script>

@endsection



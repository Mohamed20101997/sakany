@extends('layouts.front.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/front.css') }}">
@endsection
@section('contain')

    <main class="app-content">
    <h1>طلبات الحجز </h1>

    <div class="row">
        <div class="col-md-12">

            <div class="tile mb-4">
                <div class="row">
                    <div class="col-md-12">
                        @if ($homeReserved->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>صورة الشقه</th>
                                        <th>البلد</th>
                                        <th>المدينه</th>
                                        <th>الدور(الطابق)</th>
                                        <th>الاسم</th>
                                        <th>الهاتف</th>
                                        <th>البريد الالكتروني</th>
                                        <th>الصورة الشخصيه</th>
                                        <th>العمر</th>
                                        <th>الاعدادات</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    @foreach ($homeReserved as $index=>$reserve)
                                        <tr>
                                            <td>{{ $index+1 }}</td>

                                            <td><img src="{{image_path($reserve->home->cover)}}" width="60px" class="img-thumbnail"> </td>
                                            <td>{{$reserve->home->country}}</td>
                                            <td>{{$reserve->home->city}}</td>
                                            <td><span class="badge badge-danger p-2">{{$reserve->home->floor}}</span> </td>
                                            <td><span class="badge badge-danger p-2">{{$reserve->user->name}}</span> </td>
                                            <td><span class="badge badge-danger p-2">{{$reserve->user->mobile }}</span> </td>
                                            <td><span class="badge badge-danger p-2">{{$reserve->user->email}}</span> </td>
                                            <td><img src="{{image_path($reserve->user->image)}}" width="60px" class="img-thumbnail"> </td>
                                            <td><span class="badge badge-danger p-2">{{$reserve->user->age}}</span> </td>
                                            <td>
                                                <form method="post" action={{ route('delete_reserved', $reserve->id)}} style="display:inline-block">
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
                            {{ $homeReserved->appends(request()->query())->links() }}
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



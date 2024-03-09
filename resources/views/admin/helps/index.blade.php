    @extends('admin.layout.master')
    @section('title', 'المساعدة')
    @section('content')



        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">المساعدة</h4>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    {{--                 @include('admin.layout.message') --}}

                    {{--                <h4 class="header-title">المساعدة</h4> --}}
                    {{--                <p class="sub-header"> --}}
                    {{--                    <a href="{{route('helps.create')}}"> --}}
                    {{--                        <button class="btn btn-success"> --}}
                    {{--                            إنشاء جديد --}}
                    {{--                        </button> --}}
                    {{--                    </a> --}}
                    {{--                </p> --}}

                    <table id="datatable" class="table table-bordered dt-responsive nowrap"
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr style="font-size: large ; font-family: cairo">
                                <th>#</th>
                                <th>البريد الألكتروني</th>
                                <th>العنوان</th>
                                <th>الماركة</th>
                                <th>الكود</th>
                                <th>التحكم</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            ?>
                            @foreach ($rows as $row)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->address }}</td>
                                    <td>{{ $row->brand }}</td>
                                    <td>{{ $row->coupon }}</td>

                                    <td>
                                        <button type="button" class="btn btn-info waves-effect waves-light" data-toggle="modal"
                                            data-target="#showMesages{{ $row->id }}">عرض الرساله
                                        </button>
                                        <button type="button" class="btn btn-danger waves-effect waves-light"
                                            data-toggle="modal" data-target="#myModal{{ $row->id }}">حذف
                                        </button>

                                        {{--                                <a href="{{route('helps.edit',$row->id)}}"> --}}
                                        {{--                                    <button type="button" --}}
                                        {{--                                            class="btn btn-info waves-effect waves-light">تعديل --}}
                                        {{--                                    </button> --}}
                                        {{--                                </a> --}}
                                    </td>
                                </tr>
                                <?php
                                $i++;
                                ?>
                                <div id="myModal{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">حذف العنصر</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="font-16">هل تريد الحذف ؟</h5>

                                            </div>
                                            <div class="modal-footer">

                                                <form method="post" enctype="multipart/form-data"
                                                    action="{{ route('helps.destroy', $row->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn btn-light waves-effect"
                                                        data-dismiss="modal">إلغاء
                                                    </button>
                                                    <button type="submit" class="btn btn-danger waves-effect waves-light">حذف
                                                    </button>
                                                </form>


                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->


                                <div id="showMesages{{ $row->id }}" class="modal fade" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="myModalLabel">
                                                    عرض الرساله
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <h5 class="font-16">
                                                    {{ $row->message }}
                                                </h5>

                                            </div>
                                            <div class="modal-footer">


                                                <button type="button" class="btn btn-light waves-effect"
                                                    data-dismiss="modal">إلغاء
                                                </button>

                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->



    @stop

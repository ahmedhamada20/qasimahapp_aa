@extends('admin.layout.master')
@section('title', 'التحكم بالإشعارات من داخل التطبيق')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">التحكم بالإشعارات من داخل التطبيق</h4>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <h4 class="header-title">التحكم بالإشعارات من داخل التطبيق</h4>


                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr style="font-size: large ; font-family: cairo">
                        <th>#</th>
                        <th>عنوان الاشعار</th>
                        <th>محتوي الاشعار</th>
                        <th>اسم المستخدم</th>

                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($data as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->body['ar']}}</td>
                            <td>{{$row->title['ar']}}</td>
                            <td>{{$row->user->email ?? null}}</td>



                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-light"
                                        data-toggle="modal" data-target="#myModal{{$row->id}}">حذف
                                </button>
                            </td>
                        </tr>
                            <?php
                            $i++;
                            ?>
                        <div id="myModal{{$row->id}}" class="modal fade" tabindex="-1" role="dialog"
                             aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"
                                            id="myModalLabel">حذف العنصر</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                                aria-hidden="true">×
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="font-16">هل تريد الحذف ؟</h5>

                                    </div>
                                    <div class="modal-footer">

                                        <form method="post" enctype="multipart/form-data"
                                              action="{{route('deletedspecial-notifications')}}">
                                            @csrf
                                            <input type="hidden" value="{{$row->id}}" name="id">
                                            <button type="button" class="btn btn-light waves-effect"
                                                    data-dismiss="modal">إلغاء
                                            </button>
                                            <button type="submit"
                                                    class="btn btn-danger waves-effect waves-light">حذف
                                            </button>
                                        </form>


                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->

                    @endforeach

                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $data->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection

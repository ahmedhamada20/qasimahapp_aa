@extends('admin.layout.master')
@section('title', "البانرات")
@section('content')



    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">البانرات</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                {{--                 @include('admin.layout.message')--}}

                <h4 class="header-title">البانرات</h4>
                <p class="sub-header">
                    <a href="{{route('banners.create')}}">
                        <button class="btn btn-success">
                            إنشاء جديد
                        </button>
                    </a>
                </p>

                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr style="font-size: large ; font-family: cairo">
                        <th>#</th>
                  
                        <th>
                           نوع البانر
                        </th>
                  
                        <th>
                            رابط البانر
                        </th>
                        <th>حاله البانر</th>
                        <th>اسم الكوبون</th>
                        <th>الصورة</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($rows as $row)
                       <tr class="{{$row->type == 'popup' ? 'bg-primary' : ''}}">
                            <td>{{$i}}</td>
                            <td>{{$row->type()}}</td>
                            <td>{{$row->url ?? 'لا يوجد'}}</td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input"
                                           {{$row->status == "active" ? "checked" : null}} type="checkbox"
                                           role="switch" id="flexSwitchCheckDefault{{$row->id}}"
                                           onchange="updateStatus(this.checked, {{$row->id}})">
                                </div>
                            </td>
                            <td>{{ $row->item->title['ar'] ?? 'لا يوجد' }}</td>

                            <td><img src="{{$row->image}}" style="width: 50px"></td>
                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-light"
                                        data-toggle="modal" data-target="#myModal{{$row->id}}">حذف
                                </button>

                                <a href="{{route('banners.edit',$row->id)}}">
                                    <button type="button"
                                            class="btn btn-info waves-effect waves-light">تعديل
                                    </button>
                                </a>
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
                                              action="{{route('banners.destroy',$row->id)}}">
                                            @csrf
                                            @method('DELETE')
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
            </div>
        </div>
    </div> <!-- end row -->

    <script>
        function updateStatus(checked, id) {
            var status = checked ? "active" : "noActive";

            // إرسال طلب AJAX
            $.ajax({
                url: "{{route('status_banner')}}",
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                data: {
                    status: status,
                    id: id
                },
                success: function (response) {
                    alert("تم تغير الحاله بنجاح");
                },
                error: function () {
                    alert("حدث خطأ أثناء تحديث الحالة");
                }
            });
        }


    </script>

@stop

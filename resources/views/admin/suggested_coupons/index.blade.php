@extends('admin.layout.master')
@section('title', "اقترحات الكوبونات")
@section('content')



    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">اقترحات الكوبونات</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <form action="{{route('searchSuggested_coupons')}}" class="form" method="post">
                    @csrf

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="show">صاحب المتجر او سوق</label>
                            <select class="form-control" name="show">
                                <option value="" disabled selected>الكل</option>
                                <option value="مسوق بالعمولة" {{request()->show == 'مسوق بالعمولة' ? 'selected' : ''}}>مسوق بالعمولة </option>
                                <option value="صاحب متجر" {{request()->show == 'صاحب متجر' ? 'selected' : ''}}>صاحب متجر </option>
                                {{--                                <option value="3" {{request()->show == '3' ? 'selected' : ''}}>كوبنات متعدده</option>--}}
                            </select>

                        </div>

                    </div>
                    <div class="form-group col-sm-3">
                        <button type="submit" value="بحث" class="btn btn-info pull-left">بحث</button>
                    </div>
                </form>


                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr style="font-size: large ; font-family: cairo">
                        <th>#</th>
                        <th>الإسم</th>
                        <th>هل انت صاحب المتجر او مسوق بالعمولة؟</th>
                        <th>البريد الألكتروني</th>
                        <th>الوتساب</th>
                        <th>العنوان</th>
                        <th>نسبة الخصم</th>
                        <th>القسم</th>
                        <th>الكود</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $i = 1;
                    ?>
                    @foreach($rows as $row)
                        <tr>
                            <td>{{$i}}</td>
                            <td>{{$row->full_name}}</td>
                            <td>{{$row->store_affiliate ?? ''}}</td>
                            <td>{{$row->email}}</td>
                            <td>{{$row->whatsapp}}</td>
                            <td>{{$row->address}}</td>
                            <td>{{$row->discount_percent}}</td>
                            <td>{{$row->category_id ? $row->category->name['ar'] : ''}}</td>
                            <td>{{$row->coupon_code}}</td>

                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-light"
                                        data-toggle="modal" data-target="#myModal{{$row->id}}">حذف
                                </button>

{{--                                <a href="{{route('suggested_coupons.edit',$row->id)}}">--}}
{{--                                    <button type="button"--}}
{{--                                            class="btn btn-info waves-effect waves-light">تعديل--}}
{{--                                    </button>--}}
{{--                                </a>--}}
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
                                              action="{{route('suggested_coupons.destroy',$row->id)}}">
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



@stop

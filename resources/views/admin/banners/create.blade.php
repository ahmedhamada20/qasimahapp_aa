@extends('admin.layout.master')
@section('title', 'البانرات')
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

                <h4 class="header-title mb-4">إنشاء جديد</h4>

                <div class="row">
                    <div class="col-xl-12">
                        <form method="post" action="{{route('banners.store')}}" enctype="multipart/form-data">
                            @csrf


                           


                            <div class="row">
                                <div class="form-group col-sm-6 col-lg-4">
                                    <label for="url_type">نوع الرابط</label>
                                    <select name="type" id="type" class="form-control" required>
                                        <option value="" disabled selected>اختر نوع</option>
                                        <option value="advertisement">
                                            اعلان عن كوبون
                                            </option>
                                        <option value="external">
                                           
                                            رابط خارجي</option>
                                        <option value="no">لا يوجد</option>
                                        <option value="popup">
                                            اعلان بوب اب
                                        </option>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6 col-lg-4">
                                    <label for="external_url_value">الرابط الخارجي</label>
                                    <input type="url" name="url" id="external_url_value" class="form-control">
                                </div>

                                <div class="form-group col-sm-6 col-lg-4">
                                    <label for="internal_url_value">الرابط الداخلي</label>
                                    <select name="item_id" id="internal_url_value" class="form-control select2">
                                        <option value="">اختر اعلان</option>
                                        @foreach($ads as $ad)
                                            <option value="{{$ad->id}}">{{json_decode($ad->title)->ar}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h4 class="header-title mb-4">صورة</h4>
                                        <input type="file" name="image" class="dropify"
                                         required      data-height="300"/>
                                    </div>
                                </div><!-- end col -->
                                @if ($errors->has('image'))
                                    <small class="text-danger">{{ $errors->first('image') }}</small>
                                @endif
                            </div>


                            <button type="submit" class="btn btn-primary">حفظ</button>
                        </form>
                    </div><!-- end col -->


                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
    
   
<script>
    $(document).ready(function(){
        // يخفي العنصر الخارجي عند التحميل الأولي
        $('#external_url_value').closest('.form-group').hide();
        
        // يخفي العنصر الداخلي عند التحميل الأولي
        $('#internal_url_value').closest('.form-group').hide();

        // عند تغيير نوع الرابط
        $('#type').change(function(){
            var selectedType = $(this).val();

            // إخفاء العنصرين أولاً
            $('#external_url_value').closest('.form-group').hide();
            $('#internal_url_value').closest('.form-group').hide();

            // إذا كان النوع اعلان
            if(selectedType === 'advertisement') {
                // يخفي العنصر الخارجي ويظهر العنصر الداخلي
                $('#external_url_value').closest('.form-group').hide();
                $('#internal_url_value').closest('.form-group').show();
            }
            // إذا كان النوع رابط خارجي
            else if(selectedType === 'external') {
                // يخفي العنصر الداخلي ويظهر العنصر الخارجي
                $('#internal_url_value').closest('.form-group').hide();
                $('#external_url_value').closest('.form-group').show();
            }
            // إذا كان النوع اعلان بوب اب
            else if(selectedType === 'popup') {
                // يظهر العنصرين ويسمح للمستخدم بالاختيار
                $('#external_url_value').closest('.form-group').show();
                $('#internal_url_value').closest('.form-group').show();
            }
            // في حالة أخرى
            else {
                // يخفي كلا العنصرين
                $('#external_url_value').closest('.form-group').hide();
                $('#internal_url_value').closest('.form-group').hide();
            }
        });
    });
</script>



@stop


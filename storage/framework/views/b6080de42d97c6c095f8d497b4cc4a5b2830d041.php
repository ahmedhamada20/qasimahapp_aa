<?php $__env->startSection('title', 'الكوبونات'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">الكوبونات</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <h4 class="header-title mb-4">تعديل البيانات</h4>

                <div class="row">
                    <div class="col-xl-12">
                        <form method="post" action="<?php echo e(route('items.update',$row->id)); ?>"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('PATCH'); ?>




                            <div class="form-group">
                                <label for="exampleInputEmail1">عنوان الكوبون باللغه العربية</label>
                                <input type="text" class="form-control" required value="<?php echo e($row->title ? $row->title['ar'] : ''); ?>"
                                       name="title_ar"
                                       id="exampleInputEmail1"
                                       placeholder="عنوان الكوبون باللغه العربية">
                                <?php if($errors->has('title_ar')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('title_ar')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">عنوان الكوبون باللغه الأنجليزية</label>
                                <input type="text" class="form-control"  value="<?php echo e($row->title ? $row->title['en'] : ''); ?>"
                                       name="title_en"
                                       id="exampleInputEmail1"
                                       placeholder="عنوان الكوبون باللغه الأنجليزية">
                                <?php if($errors->has('title_en')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('title_en')); ?></small>
                                <?php endif; ?>
                            </div>




                            <div class="form-group">
                                <label for="exampleInputEmail1">الكود</label>
                                <input type="text" class="form-control" required value="<?php echo e($row->discount_code); ?>"
                                       name="discount_code"
                                       id="exampleInputEmail1"
                                       placeholder="الكود">
                                <?php if($errors->has('discount_code')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('discount_code')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">نسبة الخصم</label>
                                <input type="text" class="form-control" required value="<?php echo e($row->discount_percent); ?>"
                                       name="discount_percent"
                                       id="exampleInputEmail1"
                                       placeholder="نسبة الخصم">
                                <?php if($errors->has('discount_percent')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('discount_percent')); ?></small>
                                <?php endif; ?>
                            </div>














                            <div class="form-group">
                                <label for="exampleInputEmail1">الرابط</label>
                                <input type="text" class="form-control" required value="<?php echo e($row->url); ?>"
                                       name="url"
                                       id="exampleInputEmail1"
                                       placeholder="الرابط">
                                <?php if($errors->has('url')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('url')); ?></small>
                                <?php endif; ?>
                            </div>





                            <div class="form-group">
                                <label for="exampleSelect1">الكلمات المفتاحية</label>
                                <input type="text" name="keyword_input" class="form-control js-example-tokenizer" id="keyword_input">
                            </div>
                            <button onclick="checkKeywords()">تحقق من الكلمات المفتاحية</button>
                            <p id="result"></p>


                            <div class="form-group">
                                <label for="exampleSelect1">الماركات</label>
                                <select name="brand_id" id="internal_url_value" class="form-control select2">
                                    <option value="" disabled selected>اختر الماركة</option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($brand->id == $row->brand_id ? 'selected' : ''); ?>  value="<?php echo e($brand->id); ?>"><?php echo e($brand->name['ar']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleSelect1">التصنيفات</label>
                                <select name="category_id" class="form-control" id="exampleSelect1">
                                    <option disabled>اختر التصنيف</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php echo e($category->id == $row->category_id ? 'selected' : ''); ?> value="<?php echo e($category->id); ?>"><?php echo e($category->name['ar']); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <?php if($errors->has('category_id')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('category_id')); ?></small>
                                <?php endif; ?>
                            </div>

                             <div class="form-group">
                                <label for="sort_orderInput">الترتيب</label>
                                <input type="text" class="form-control" required value="<?php echo e($row->sort_order); ?>"
                                       name="sort_order"
                                       id="sort_orderInput"
                                       placeholder="الترتيب">
                                <?php if($errors->has('sort_order')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('sort_order')); ?></small>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">الوصف بالعربية</label>
                                <textarea class="form-control"
                                          required
                                          name="description_ar"> <?php echo e($row->description ? $row->description['ar'] : ''); ?> </textarea>
                                <?php if($errors->has('description_ar')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('description_ar')); ?></small>
                                <?php endif; ?>
                            </div>


                            <div class="form-group">
                                <label for="exampleInputEmail1">الوصف بالانجليزية</label>
                                <textarea class="form-control"
                                          required
                                          name="description_en"> <?php echo e($row->description ? $row->description['en'] : ''); ?> </textarea>
                                <?php if($errors->has('description_en')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('description_en')); ?></small>
                                <?php endif; ?>
                            </div>





                            <div class="form-group">
                                <label for="exampleInputEmail1">نصيحه  بالعربية</label>
                                <textarea class="form-control"

                                          name="advice_ar"><?php echo e($row->advice ? $row->advice['en'] : ''); ?> </textarea>
                                <?php if($errors->has('advice_en')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('advice_en')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">نصيحه  بالانجليزية</label>
                                <textarea class="form-control"

                                          name="advice_en"> <?php echo e($row->advice ? $row->advice['ar'] : ''); ?> </textarea>
                                <?php if($errors->has('advice_ar')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('advice_ar')); ?></small>
                                <?php endif; ?>
                            </div>




                            <div class="form-group">
                                <label for="exampleInputEmail1"> تنببه  بالعربية</label>
                                <textarea class="form-control"

                                          name="alert_ar"><?php echo e($row->alert ? $row->alert['en'] : ''); ?> </textarea>
                                <?php if($errors->has('alert_ar')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('alert_ar')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">تنببه  بالانجليزية</label>
                                <textarea class="form-control"

                                          name="alert_en">  <?php echo e($row->alert ? $row->alert['ar'] : ''); ?></textarea>
                                <?php if($errors->has('alert_en')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('alert_en')); ?></small>
                                <?php endif; ?>
                            </div>







                            <div class="form-group">
                                <label for="exampleInputEmail1"> هاي لابت  بالعربية</label>
                                <textarea class="form-control"

                                          name="high_light_ar"><?php echo e($row->high_light ? $row->high_light['ar'] : ''); ?> </textarea>
                                <?php if($errors->has('high_light_ar')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('high_light_ar')); ?></small>
                                <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">هاي لابت  بالانجليزية</label>
                                <textarea class="form-control"

                                          name="alert_en">  <?php echo e($row->high_light ? $row->high_light['en'] : ''); ?></textarea>
                                <?php if($errors->has('high_light')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('high_light')); ?></small>
                                <?php endif; ?>
                            </div>


                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box">
                                        <h4 class="header-title mb-4">صورة </h4>
                                        <input type="file" name="image" class="dropify"
                                               data-default-file="<?php echo e($row->image); ?>" data-height="300"/>
                                    </div>
                                </div><!-- end col -->
                                <?php if($errors->has('image')): ?>
                                    <small class="text-danger"><?php echo e($errors->first('image')); ?></small>
                                <?php endif; ?>
                            </div>


                            <button type="submit" class="btn btn-primary">تعديل</button>
                        </form>
                    </div><!-- end col -->


                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>

<?php $__env->stopSection(); ?>






<?php $__env->startSection('scripts'); ?>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <!-- تضمين مكتبة Select2 -->
    <script>
        function checkKeywords() {
            var userInput = document.getElementById('keyword_input').value;

            // فحص وجود كلمات المفتاحية
            if (userInput.toLowerCase().includes('blade') && userInput.toLowerCase().includes('laravel')) {
                document.getElementById('result').innerHTML = "تم العثور على كلمتي المفتاحية 'blade' و 'laravel' في المدخل.";
            } else {
                document.getElementById('result').innerHTML = "لم يتم العثور على الكلمتين المفتاحيتين.";
            }
        }
    </script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\work qasimahapp\ahmedhamada22\ahmedhamada\resources\views/admin/items/edit.blade.php ENDPATH**/ ?>
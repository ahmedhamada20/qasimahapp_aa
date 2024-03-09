<?php $__env->startSection('title', 'رساله الخطأ'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">رساله الخطأ</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <h4 class="header-title mb-4">رساله الخطأ</h4>
                <?php echo $__env->make('admin.layout.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row">
                    <div class="col-xl-12">
                        <form method="post" action="<?php echo e(route('errorApi.store')); ?>"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>


                            <input type="hidden" value="<?php echo e($data->id ?? null); ?>" name="id">

                            <!--<div class="row">-->

                            <!--    <div class="form-group col-md-6">-->
                            <!--        <label for="exampleInputEmail1">العنوان باللغه العربية</label>-->
                            <!--        <input type="text" name="notes_ar" required value="<?php echo e(old('notes_ar') ?? ($data ? ($data->notes['ar'] ?? '') : '')); ?>"-->
                            <!--               class="form-control">-->
                            <!--        <?php if($errors->has('notes_ar')): ?>-->
                            <!--            <small class="text-danger"><?php echo e($errors->first('notes_ar')); ?></small>-->
                            <!--        <?php endif; ?>-->
                            <!--    </div>-->
                            <!--    <div class="form-group col-md-6">-->
                            <!--        <label for="exampleInputEmail1">العنوان باللغه الإنجليزية</label>-->
                            <!--        <input type="text" name="notes_en" required value="<?php echo e(old('notes_en') ?? ($data ? ($data->notes['en'] ?? '') : '')); ?>"-->
                            <!--               class="form-control">-->
                            <!--        <?php if($errors->has('notes_en')): ?>-->
                            <!--            <small class="text-danger"><?php echo e($errors->first('notes_en')); ?></small>-->
                            <!--        <?php endif; ?>-->
                            <!--    </div>-->

                            <!--</div>-->
                            
                            
                            <br>
                            
                          <div class="row">
    <div class="form-group col-md-6">
        <label>رقم الاصدار</label>
        <input type="text" name="version" required value="<?php echo e(old('version') ?? ($data ? $data->version : '')); ?>" class="form-control">
    </div>
    <div class="form-group col-md-6">
        <label>الخطأ الخاص برقم الاصدار</label>
        <input type="text" name="error_version" required value="<?php echo e(old('error_version') ?? ($data ? $data->error_version : '')); ?>" class="form-control">
    </div>
</div>

                            <br>
                            
                            <div class="row">
                                <button type="submit" class="btn btn-primary">إرسال</button>
                            </div>
                        </form>
                    </div><!-- end col -->


                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedhamada/public_html/ahmedhamada/resources/views/admin/errorApi/index.blade.php ENDPATH**/ ?>
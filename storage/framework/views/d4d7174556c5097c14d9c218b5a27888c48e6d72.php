<?php $__env->startSection('title', "اقترحات الكوبونات"); ?>
<?php $__env->startSection('content'); ?>



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
                <form action="<?php echo e(route('searchSuggested_coupons')); ?>" class="form" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="show">صاحب المتجر او سوق</label>
                            <select class="form-control" name="show">
                                <option value="" disabled selected>الكل</option>
                                <option value="مسوق بالعمولة" <?php echo e(request()->show == 'مسوق بالعمولة' ? 'selected' : ''); ?>>مسوق بالعمولة </option>
                                <option value="صاحب متجر" <?php echo e(request()->show == 'صاحب متجر' ? 'selected' : ''); ?>>صاحب متجر </option>
                                
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
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($i); ?></td>
                            <td><?php echo e($row->full_name); ?></td>
                            <td><?php echo e($row->store_affiliate ?? ''); ?></td>
                            <td><?php echo e($row->email); ?></td>
                            <td><?php echo e($row->whatsapp); ?></td>
                            <td><?php echo e($row->address); ?></td>
                            <td><?php echo e($row->discount_percent); ?></td>
                            <td><?php echo e($row->category_id ? $row->category->name['ar'] : ''); ?></td>
                            <td><?php echo e($row->coupon_code); ?></td>

                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-light"
                                        data-toggle="modal" data-target="#myModal<?php echo e($row->id); ?>">حذف
                                </button>






                            </td>
                        </tr>
                        <?php
                        $i++;
                        ?>
                        <div id="myModal<?php echo e($row->id); ?>" class="modal fade" tabindex="-1" role="dialog"
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
                                              action="<?php echo e(route('suggested_coupons.destroy',$row->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
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

                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->



<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedhamada/public_html/ahmedhamada/resources/views/admin/suggested_coupons/index.blade.php ENDPATH**/ ?>
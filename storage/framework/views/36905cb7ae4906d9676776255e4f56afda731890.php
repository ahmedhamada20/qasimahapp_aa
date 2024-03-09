<?php $__env->startSection('title', "الصفقات"); ?>
<?php $__env->startSection('content'); ?>



    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">الصفقات</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                

                <h4 class="header-title">الصفقات</h4>
                <p class="sub-header">
                    <a href="<?php echo e(route('offers.create')); ?>">
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
                        <th>الماركة</th>
                        <th>التصنيف</th>
                        <th>الكود</th>
                        <th>نسبة الخصم</th>
                        <th>الرابط</th>
                        <th>عدد الاستخدام</th>
                        <th>اخر استخدام</th>
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
                            <td><?php echo e($row->brand ? $row->brand->name['ar'] : "تم حذف الماركة"); ?></td>
                            <td><?php echo e($row->category ? $row->category->name['en'] : "تم حذف التصنيف"); ?></td>
                            <td><?php echo e($row->discount_code); ?></td>
                            <td><?php echo e($row->discount_percent); ?></td>
                            <td><?php echo e($row->url); ?></td>
                            <td><?php echo e($row->used_count); ?></td>
                            <td><?php echo e($row->last_used); ?></td>


                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-light"
                                        data-toggle="modal" data-target="#myModal<?php echo e($row->id); ?>">حذف
                                </button>

                                <a href="<?php echo e(route('offers.edit',$row->id)); ?>">
                                    <button type="button"
                                            class="btn btn-info waves-effect waves-light">تعديل
                                    </button>
                                </a>
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
                                              action="<?php echo e(route('offers.destroy',$row->id)); ?>">
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

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedhamada/public_html/ahmedhamada/resources/views/admin/offers/index.blade.php ENDPATH**/ ?>
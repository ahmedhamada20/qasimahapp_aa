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
                

                <h4 class="page-title">الكوبونات</h4>
                <p class="sub-header">
                    <a href="<?php echo e(route('items.create')); ?>">
                        <button class="btn btn-success">
                            إنشاء جديد
                        </button>
                    </a>
                </p>


                <form action="<?php echo e(route('changeShowPost')); ?>" class="form" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="show">الحاله</label>
                            <select class="form-control" name="show">
                                <option value="">الكل</option>
                                <option value="1" <?php echo e(request()->show == '1' ? 'selected' : ''); ?>>مفعل</option>
                                <option value="0" <?php echo e(request()->show == '0' ? 'selected' : ''); ?>>غير مفعل</option>
                                
                            </select>

                        </div>

                        <div class="form-group col-sm-4">
                            <label for="show">كوبونات متعدده</label>
                            <select class="form-control" name="SubItems">
                                <option value="">الكل</option>
                                <option value="3" <?php echo e(request()->SubItems == '3' ? 'selected' : ''); ?>>كوبنات متعدده</option>
                            </select>

                        </div>

                    </div>
                    <div class="form-group col-sm-3">
                        <button type="submit" value="بحث" class="btn btn-info pull-left">بحث</button>
                    </div>
                </form>

                <table id="datatable" class="table table-bordered dt-responsive nowrap _datatable"
                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr style="font-size: large ; font-family: cairo">
                        <th>#</th>
                        <th>عنوان الكوبون</th>
                        
                        <th>الماركة</th>
                        <th>التصنيف</th>
                        <th>الترتيب</th>
                        <th>الكود</th>
                        <th>نسبة الخصم</th>
                        <th>الرابط</th>
                        <th>عدد الاستخدام</th>
                        <th>اخر استخدام</th>
                        <th>عدد نقرات الرابط</th>
                        <th>عدد نسخ الكوبون</th>
                        <th>فعال</th>
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
                            <td style="color: <?php echo e(checkSubItems($row->id) == true ? 'blue' : 'inherit'); ?>">
                                <?php echo e($row->title ? $row->title['ar'] : ''); ?>

                            </td>
                            
                            <td><?php echo e($row->brand ? $row->brand->name['ar'] : 'تم حذف الماركة'); ?></td>
                            <td><?php echo e($row->category ? $row->category->name['en'] : 'تم حذف القسم'); ?></td>
                            <td><?php echo e($row->sort_order); ?></td>
                            <td><?php echo e($row->discount_code); ?></td>
                            <td><?php echo e($row->discount_percent); ?></td>
                            <td>
                                <a href="<?php echo e($row->url); ?>">
                                    <?php echo e(\Str::limit($row->url,100)); ?>

                                </a>
                            </td>
                            <td><?php echo e($row->used_count); ?></td>
                            <td><?php echo e($row->last_used); ?></td>
                            <td><?php echo e($row->click_count); ?></td>
                            <td><?php echo e($row->copy_count); ?></td>
                            <td>
                                <input type="checkbox"
                                       onclick="showBtnClick(event,'<?php echo e($row->id); ?>')" <?php echo e($row->show == 1 ? 'checked' : ''); ?>>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger waves-effect waves-light"
                                        data-toggle="modal" data-target="#myModal<?php echo e($row->id); ?>">حذف
                                </button>

                                <a href="<?php echo e(route('items.edit', $row->id)); ?>">
                                    <button type="button" class="btn btn-info waves-effect waves-light">تعديل
                                    </button>
                                </a>

                                <a href="<?php echo e(route('items.show', $row->id)); ?>">
                                    <button type="button" class="btn btn-success waves-effect waves-light">
                                        اضافه كوبونات
                                    </button>
                                </a>

                                <a href="<?php echo e(route('getSubItems',$row->id)); ?>">
                                    <button type="button" class="btn btn-info waves-effect waves-light">
                                        جميع الكوبونات الاخري
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
                                        <h5 class="modal-title" id="myModalLabel">حذف العنصر</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="font-16">هل تريد الحذف ؟</h5>

                                    </div>
                                    <div class="modal-footer">

                                        <form method="post" enctype="multipart/form-data"
                                              action="<?php echo e(route('items.destroy', $row->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('DELETE'); ?>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->

    <script>
        function showBtnClick(event, id) {
            var checed = event.target.checked == true ? 1 : 0;

            $.ajax({
                url: '/admin/change-item-show/' + id,
                method: 'post',
                data: {
                    _token: '<?php echo e(csrf_token()); ?>',
                    show: checed
                },
            });
        }
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedhamada/public_html/ahmedhamada/resources/views/admin/items/index.blade.php ENDPATH**/ ?>
<?php $__env->startSection('title', "حاله الكوبونات"); ?>
<?php $__env->startSection('content'); ?>



    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">حاله الكوبونات</h4>
                
                
                 
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                

                <h4 class="page-title">حاله الكوبونات</h4>
                
                
                <form action="<?php echo e(route('changeShowPostCoup')); ?>" class="form" method="post">
                    <?php echo csrf_field(); ?>

                    <div class="row">
                        <div class="form-group col-sm-4">
                            <label for="show">الحاله</label>
                            <select class="form-control" name="show">
                                <option value="1"  selected <?php echo e(request()->show == '1' ? 'selected' : ''); ?> >غير مخفي</option>
                                <option value="0" <?php echo e(request()->show == '0' ? 'selected' : ''); ?>>مخفي</option>
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
                        <th>
                            حذف
                            <input type="checkbox" onclick="deleteAllRecords(event)" id="delete_all">
                        </th>
                        <th>عنوان الكوبون</th>
                        <th>الكود</th>
                        <th>اخر استخدام عير فعال</th>
                        <th>عدد الاستخدامات الغير فعاله</th>
                        <th>عدد الاستخدامات  الفعاله</th>
                        <th>مشاهده</th>
                        <th>اخفاء الكوبون </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $rows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(++$key); ?></td>
                            <td>
                                <input type="checkbox"  class="delete_this" data-id="<?php echo e($row->id); ?>">
                            </td>
                            <td><?php echo e($row->title ? $row->title['ar'] : ''); ?></td>
                            <td><?php echo e($row->discount_code); ?></td>
                            <td style="direction:ltr!important"><?php echo e(optional($row->thumbs->where('down',1)->last())->created_at ?? 'لا يوجد'); ?></td>
                            <td> <?php echo e($row->thumbs->where('down',1)->count()); ?> </td>
                            <td> <?php echo e($row->thumbs->where('up',1)->count()); ?> </td>
                            <td>
                                <button type="button" class="btn btn-info waves-effect waves-light"
                                        data-toggle="modal" onclick="fetchData('<?php echo e($row->id); ?>')" data-target="#thumModal">مشاهده
                                </button>
                            </td>
                           <td>
                                <input type="checkbox"
                                       onclick="showBtnClick(event,'<?php echo e($row->id); ?>')" <?php echo e($row->show == 1 ? '' : 'checked'); ?>>
                            </td>

                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->

    <button class="btn btn-danger" onclick="deleteSelectedRecords()" >حذف كل المحدد</button>

    <div id="thumModal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog modal-lg">
           <div class="modal-content">
               <div class="modal-header">
                   <h5 class="modal-title"
                       id="myModalLabel">مشاهده العناصر الفعاله والغير فعاله</h5>
                   <button type="button" class="close" data-dismiss="modal"
                           aria-hidden="true">×
                   </button>
               </div>
               <div class="modal-body">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>الكود</th>
                                <th>المستخدم</th>
                                <th>الحاله</th>
                                <th>التاريخ</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody class="table-body">
                        </tbody>
                    </table>
               </div>
               <div class="modal-footer">

               </div>
           </div><!-- /.modal-content -->
       </div><!-- /.modal-dialog -->
   </div><!-- /.modal -->
   <script>
        function fetchData(id) {
            $.ajax({
                url : `/admin/get-item/${id}`,
                success : data => {
                    var modal = $('#thumModal');

                    var modalBodyHtml = data.thumbs.map(item=>{
                        return `
                            <tr class="record">
                                <td>${data.discount_code}</td>
                                <td>${item?.user?.email ?? item.ip ?? 'غير موجود'}</td>
                                <td>${item.up == 1 ? 'فعال' : 'غير فعال'}</td>
                                <td style="direction:ltr!important">${item.date}</td>
                                <td>
                                    <a href="javascript:" onclick="deleteThis('/admin/delete-item-thumb/${item.id}')" class="btn btn-danger">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                    }).join('');
                    modal.find('.modal-body .table-body').html(modalBodyHtml);

                    var modalFooterHtml = `
                        <a href="javascript:" onclick="deleteAll('/admin/delete-item-thumb/${data.id}/all')" class="btn btn-danger">
                            حذف الكل
                        </a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                    `;

                    modal.find('.modal-footer').html(modalFooterHtml);
                }
            });

        }


        function deleteThis(url) {
            $.ajax({
                url,
                method:'get',
                success:function(data){
                    fetchData(data.id);
                    // window.location.reload();
                }
            });
        }

        function deleteAll(url) {
            $.ajax({
                url,
                method:'get',
                success:function(data){
                    fetchData(data.id);
                    window.location.reload();
                }
            });
        }

        function deleteAllRecords(event) {
            $('.delete_this').prop('checked', event.target.checked);
        }

        function deleteSelectedRecords() {
            // delete selected checkbox
            var checked = $('.delete_this:checked');


            if(checked.length == 0){
                alert('لم يتم تحديد اي عنصر');
                return;
            }

            if(confirm('هل انت متاكد من حذف العناصر المحدده')){
                var ids = [];

                checked.each((index, item) => ids.push($(item).data('id')));

                if(ids.length > 0){
                    $.ajax({
                        url : '<?php echo e(route('deleteSelected')); ?>',
                        method : 'post',
                        data : {
                            _token : '<?php echo e(csrf_token()); ?>',
                            ids
                        },
                        success : data => {
                            window.location.reload();
                        }
                    });
                }
            }

        }

   </script>
   
   
   
   <script>
    function showBtnClick(event, id) {
        var checed = event.target.checked == true ? 0 : 1;

        $.ajax({
            url: '<?php echo e(route("ItemschangeShow", ["id" => ":id"])); ?>'.replace(':id', id),
            method: 'post',
            data: {
                _token: '<?php echo e(csrf_token()); ?>',
                show: checed
            },
        });
    }
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedhamada/public_html/ahmedhamada/resources/views/admin/items/index2.blade.php ENDPATH**/ ?>
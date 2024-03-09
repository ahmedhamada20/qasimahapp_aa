<?php $__env->startSection('title', 'الإشعارات'); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">الإشعارات</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">

                <h4 class="header-title mb-4">الإشعارات</h4>
                <?php echo $__env->make('admin.layout.message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="row">
                    <div class="col-xl-12">
                        <form method="post" action="<?php echo e(route('notifications.store')); ?>" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>

                            <div class="row">
                                <div class="form-group col-md-12">
                                    <lable>نوع الاشعار</lable>
                                    
                                     <select class="form-control" name="type_notifications" required>
                                        <option value="" disabled selected>-- اختر من القائمه --</option>
                                        <option value="general">اشعار عام</option>
                                        <option value="special">
                                            <!--داخل التطبيق) اشعار خاص () -->
                                            <!--() اشعار خاص () -->
                                            <!--(داخل التطبيق) اشعار خاص () -->
                                            اشعار خاص (داخل التطبيق)

                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">

                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">العنوان باللغه العربية</label>
                                    <input type="text" name="title_ar" required value="<?php echo e(old('title_ar')); ?>"
                                        class="form-control">
                                    <?php if($errors->has('title_ar')): ?>
                                        <small class="text-danger"><?php echo e($errors->first('title_ar')); ?></small>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">العنوان باللغه الإنجليزية</label>
                                    <input type="text" name="title_en" value="<?php echo e(old('title_en')); ?>"
                                        class="form-control">
                                    <?php if($errors->has('title_en')): ?>
                                        <small class="text-danger"><?php echo e($errors->first('title_en')); ?></small>
                                    <?php endif; ?>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">المحتوي باللغه العربية</label>
                                    <textarea name="body_ar" class="form-control" required placeholder="المحتوي باللغه العربية"><?php echo e(old('body_ar')); ?></textarea>
                                    <?php if($errors->has('body_ar')): ?>
                                        <small class="text-danger"><?php echo e($errors->first('body_ar')); ?></small>
                                    <?php endif; ?>
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">المحتوي باللغه الإنجليزية</label>
                                    <textarea name="body_en" class="form-control" placeholder="المحتوي باللغه الإنجليزية"><?php echo e(old('body_en')); ?></textarea>
                                    <?php if($errors->has('body_en')): ?>
                                        <small class="text-danger"><?php echo e($errors->first('body_en')); ?></small>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group col-sm-6">
    <label for="url_type">نوع الرابط</label>
    <select name="url_type" id="url_type" class="form-control">
        <option value="">اختر نوع</option>
        <option value="internal">اعلان عن كوبون</option>
        <option value="external">اعلان عن رابط خارجي</option>
    </select>
</div>

<div id="internal_url_container" class="form-group col-sm-6">
                                     <label for="internal_url_value">اسم الكوبون</label>

    <select name="internal_url_value" id="internal_url_value" class="form-control select2">
        <option value="">اختر اعلان</option>
        <?php $__currentLoopData = $ads; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($ad->id); ?>"><?php echo e(json_decode($ad->title)->ar); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>

<div id="external_url_container" class="form-group col-sm-6">
    <label for="external_url_value">الرابط الخارجي</label>
    <input type="url" name="external_url_value" id="external_url_value" class="form-control">
</div>
                                <div class="form-group col-sm-6">
                                    <label for="image">الصورة</label>
                                    <input type="file" name="image" id="image" class="form-control">
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="user_id">المستخدم</label>
                                    <input type="text" class="form-control search" data-users="<?php echo e($users); ?>" />
                                    <select id="user_id" class="form-control"  multiple>
                                        <option value="all" onclick="userIdElemClick(event)">الكل</option>
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($user->id); ?>" onclick="userIdElemClickن (event)">
                                                <?php echo e($user->email); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                        <br><br><br>
                                        <div id="selected_user_inputs"></div>
                                        <select id="selected_users" class="form-control" multiple>
                                        </select>
                                    </div>


                            </div>

                            <div class="row">


                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#exampleModal">
                                    إرسال
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">ارسال الاشعار</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                هل انت متاكد من عمليه ارسال الاشعار
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">إرسال</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                            </div>
                        </form>
                    </div><!-- end col -->


                </div><!-- end row -->
            </div>
        </div><!-- end col -->
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });

        var selectedUsersElem = $('#selected_users');
        var userIdElem = $('#user_id');
        var selectedUserInputs = $('#selected_user_inputs');
        var selectedUsers = [];

        $('.search').on('keyup', function() {
            var users = $(this).data('users');

            var value = $(this).val().toLowerCase();

            userIdElem.empty();

            var filteredUsers = users.map(user => {
                var exists = (user.name || "").toLowerCase().indexOf(value) > -1;

                if (exists) {
                    userIdElem.append(
                        `<option onclick="userIdElemClick(event)" value="${user.id}">${user.name}</option>`
                    );
                }
            });


        });

        // userIdElem.find('option').click(function(){

        // });

        function userIdElemClick(event) {

            var elem = $(event.currentTarget);

            var user = {
                name: elem.text(),
                id: elem.val()
            };

            selectedUsers.push(user);

            elem.remove();

            selectedUserInputs.empty();
            selectedUsersElem.empty();


            selectedUsers.map(function(user) {
                selectedUsersElem.append(
                    `<option onclick="selectedUsersElemClick(event)" value="${user.id}">${user.name}</option>`);
                selectedUserInputs.append(`<input type="hidden" name="user_id[]" value="${user.id}" />`);
            });
        }

        function selectedUsersElemClick(event) {

            var elem = $(event.currentTarget);

            // Remove From selectedUsers
            var _user = {
                name: elem.text(),
                id: elem.val()
            };


            selectedUsers = selectedUsers.filter(user => {
                return user.id != _user.id
            });

            elem.remove();

            selectedUserInputs.empty();
            selectedUsersElem.empty();

            userIdElem.append(`<option onclick="userIdElemClick(event)" value="${_user.id}">${_user.name}</option>`);

            selectedUsers.map(function(user) {
                selectedUsersElem.append(
                    `<option onclick="selectedUsersElemClick(event)" value="${user.id}">${user.name}</option>`);
                selectedUserInputs.append(`<input type="hidden" name="user_id[]" value="${user.id}" />`);
            });
        }

        // selectedUsersElem.find('option').click(function(){



        // });
    </script>
    
    
    
<script>
    document.getElementById("url_type").addEventListener("change", function () {
        var selectedValue = this.value;
        if (selectedValue === "internal") {
            document.getElementById("internal_url_container").style.display = "block";
            document.getElementById("external_url_container").style.display = "none";
        } else if (selectedValue === "external") {
            document.getElementById("internal_url_container").style.display = "none";
            document.getElementById("external_url_container").style.display = "block";
        } else {
            document.getElementById("internal_url_container").style.display = "none";
            document.getElementById("external_url_container").style.display = "none";
        }
    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/ahmedhamada/public_html/ahmedhamada/resources/views/admin/notifications/index.blade.php ENDPATH**/ ?>
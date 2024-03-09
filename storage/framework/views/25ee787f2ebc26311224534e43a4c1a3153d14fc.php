<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <title>تسجيل الدخول</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('logo.png')); ?>">

    <!-- App css -->
    <link href="<?php echo e(asset('assets/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet"/>
    <link href="<?php echo e(asset('assets/css/icons.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo e(asset('assets/css/app-rtl.min.css')); ?>" rel="stylesheet" type="text/css" id="app-stylesheet"/>

</head>

<body class="authentication-bg">
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="account-pages pt-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="account-card-box">
                    <div class="card mb-0">
                        <div class="card-body p-4">

                            <div class="text-center">
                                <div class="my-3">
                                    <a href="#">
                                        <span><img src="<?php echo e(asset('logo.png')); ?>" alt=""  style="height: 104px;"></span>
                                    </a>
                                </div>
                                <h5 class="text-muted text-uppercase py-3 font-16">تسجيل الدخول</h5>
                            </div>

                            <form action="<?php echo e(route('authenticate')); ?>" method="post" class="mt-2">
                                <?php echo csrf_field(); ?>
                                <?php if(Session::has('error')): ?>
                                    <p class="alert alert-danger" style="text-align: center"><b><?php echo e(Session::get('error')); ?></b></p>
                                <?php endif; ?>
                                <div class="form-group mb-3">
                                    <input class="form-control" name="email" value="<?php echo e(old('email')); ?>" type="email"
                                           required
                                           placeholder="البريد الألكتروني">
                                </div>

                                <div class="form-group mb-3">
                                    <input class="form-control" name="password" type="password" required id="password"
                                           placeholder="الرقم السري">
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin"
                                               checked>
                                        <label class="custom-control-label" for="checkbox-signin">تذكرنى</label>
                                    </div>
                                </div>

                                <div class="form-group text-center">
                                    <button class="btn btn-success btn-block waves-effect waves-light" type="submit">
                                        تسجيل الدخول
                                    </button>
                                </div>


                            </form>


                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div>


                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
</div>
<!-- end page -->

<!-- Vendor js -->
<script src="<?php echo e(asset('assets/js/vendor.min.js')); ?>"></script>

<!-- App js -->
<script src="<?php echo e(asset('assets/js/app.min.js')); ?>"></script>

</body>
</html>
<?php /**PATH /home/ahmedhamada/public_html/ahmedhamada/resources/views/admin/auth/login.blade.php ENDPATH**/ ?>
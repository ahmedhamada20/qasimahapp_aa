<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?php echo e($page->title[App::getLocale() ?? 'ar'] ?? ''); ?></title>

    <?php echo $__env->make('site_v2.layouts.tags', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->make('site_v2.layouts.styles', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>

    <style>
        html{scroll-behavior:smooth}::-webkit-scrollbar{width:7px;border-radius:10px}::-webkit-scrollbar-track{background:#f1f1f1}::-webkit-scrollbar-thumb{background:#2fb2a2}::-webkit-scrollbar-thumb:hover{background:#555}

        .mt-7 {
            margin-top: 7.5rem;
        }
    </style>

</head>

<body>
    <?php echo $__env->yieldPushContent('stiky-navbar'); ?>
    <div class="container">
        <?php echo $__env->make('site_v2.layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>

    <div class="container bg-white">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

    <?php echo $__env->make('site_v2.layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('site_v2.layouts.scripts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH E:\work qasimahapp\ahmedhamada22\ahmedhamada\resources\views/site_v2/layouts/index.blade.php ENDPATH**/ ?>
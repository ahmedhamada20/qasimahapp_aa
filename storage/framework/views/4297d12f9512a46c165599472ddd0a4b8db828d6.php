<meta name="description" content="<?php echo e($page->description[App::getLocale() ?? 'ar'] ?? ''); ?>"/>

    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>

    <meta property="og:locale" content="ar_AR" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo e($page->title[App::getLocale() ?? 'ar'] ?? ''); ?>" />
    <meta property="og:description" content="<?php echo e($page->description[App::getLocale() ?? 'ar'] ?? ''); ?>" />

    <meta property="og:url" content="<?php echo e($page->uri ?? '/'); ?>" />

    <meta property="og:site_name" content="قسيمة" />

    <meta property="article:section" content="القسم" />
    
    <meta property="og:image" content="<?php echo e($page->model->brand->image ?? $page->model->image ?? asset('logo.png')); ?>" />

    <meta property="og:image:width" content="1119" />
    <meta property="og:image:height" content="502" />
    <meta property="og:image:alt" content="<?php echo e($page->title[App::getLocale() ?? 'ar'] ?? ''); ?>" />

    <meta property="og:image:type" content="image/png" />


    <meta name="twitter:card" content="<?php echo e($page->model->brand->image ?? asset('logo.png')); ?>" />

    <meta name="twitter:title" content="<?php echo e($page->title[App::getLocale() ?? 'ar'] ?? ''); ?>" />
    <meta name="twitter:description" content="<?php echo e($page->description[App::getLocale() ?? 'ar'] ?? ''); ?>" />
    <meta name="twitter:site" content="@Qasimah_" />
    <meta name="twitter:creator" content="@Qasimah_" />

    <meta name="twitter:label1" content="Written by" />
    <meta name="twitter:data1" content="قسيمة " />

    <link rel="icon" href="https://qasimahapp.com/site/site/img/qasima-logo.png" type="image/x-icon" />

    <link rel="shortcut icon" href="https://qasimahapp.com/site/site/img/qasima-logo.png" />
<?php /**PATH E:\work qasimahapp\ahmedhamada22\ahmedhamada\resources\views/site_v2/layouts/tags.blade.php ENDPATH**/ ?>
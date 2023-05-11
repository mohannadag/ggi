<!DOCTYPE html>

<html dir="<?php echo e(App::isLocale('ar') ? 'rtl' : 'ltr'); ?>" lang="en-US">


<?php

$languages = \Illuminate\Support\Facades\DB::table('languages')

->select('id','name','locale')

// ->where('default','=',0)

->where('locale','!=',\Illuminate\Support\Facades\Session::get('currentLocal'))

->orderBy('name','ASC')

->get();

\Illuminate\Support\Facades\App::setLocale(\Illuminate\Support\Facades\Session::get('currentLocal'));

?>

<head>

    <!-- Metas -->

    <meta charset="UTF-8" />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <script src="<?php echo e(asset('js/tinymce/tinymce.min.js')); ?>" referrerpolicy="origin"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="author" content="Desinabl" />

    <!-- Links -->

    <?php if(isset($siteInfo->favicon)): ?>
    <?php if(file_exists( public_path() . '/images/images/'.$siteInfo->favicon)): ?>
    <link rel="icon" type="image/png" href="<?php echo e(URL::asset('/images/images/'.$siteInfo->favicon)); ?>" />

    <?php else: ?>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>" />
    <?php endif; ?>
    <?php else: ?>
    <link rel="icon" type="image/png" href="<?php echo e(asset('images/favicon.png')); ?>" />
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Plugins CSS -->

    <link href="<?php echo e(asset('css/plugin.css')); ?>" rel="stylesheet" />

    <!-- Perfect scrollbar CSS-->

    <link rel="preload" href="<?php echo e(asset('css/perfect-scrollbar.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link href="<?php echo e(asset('css/perfect-scrollbar.css')); ?>" rel="stylesheet">
    </noscript>

    <!-- style CSS -->

    <link rel="preload" href="<?php echo e(asset('css/style.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    </noscript>

    <!-- Dashboard CSS -->

    <link href="<?php echo e(asset('css/dashboard.css')); ?>" rel="stylesheet" />

    <link rel="preload" href="<?php echo e(asset('css/bootstrap4-toggle.min.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo e(asset('css/bootstrap4-toggle.min.css')); ?>" rel="stylesheet">
    </noscript>

    <link rel="preload" href="<?php echo e(asset('datatable/dataTables.bootstrap4.min.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo e(asset('datatable/dataTables.bootstrap4.min.css')); ?>" rel="stylesheet">
    </noscript>

    <link rel="preload" href="<?php echo e(asset('datatable/datatable.responsive.boostrap.min.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo e(asset('datatable/dataTables.responsive.boostrap.min.css')); ?>" rel="stylesheet">
    </noscript>

    <link rel="preload" href="<?php echo e(asset('datatable/datatables.flexheader.boostrap.min.css')); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link href="<?php echo e(asset('datatable/datatables.flexheader.boostrap.min.css')); ?>" rel="stylesheet">
    </noscript>



    <!-- google fonts-->

    <link rel="preload" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    </noscript>

    <link rel="preload" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" as="style" onload="this.onload=null;this.rel='stylesheet'">

    <noscript>
        <link href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" rel="stylesheet">
    </noscript>

    <style>
        :root {

            --theme-color: {
                    {
                    isset($siteInfo->color) ? $siteInfo->color : '#000000'
                }
            }

            ;

        }
    </style>

    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo notifyCss(); ?>

    <!-- Document Title -->

    <title>GGI Turkey</title>

</head>



<body>

    <div class="page-wrapper">


        <!--Sidebar Menu Starts-->

        <?php echo $__env->make('admin.includes.left-sidear', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <!--Sidebar Menu ends-->

        <!--Dashboard content Wrapper starts-->

        <div class="dash-content-wrap">

            <!-- Top header starts-->

            <?php echo $__env->make('admin.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Top header ends-->

            <?php if(session()->has('migration')): ?>

            <div class="alert alert-success">

                <?php echo e(session()->get('migration')); ?>


            </div>

            <?php endif; ?>

            <?php echo $__env->yieldContent('content'); ?>

            <!--Dashboard footer starts-->

            <?php echo $__env->make('admin.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!--Dashboard footer ends-->

        </div>

        <!--Dashboard content Wrapper ends-->

    </div>

    <!-- Plugin JS-->

    <script src="<?php echo e(asset('js/plugin.js')); ?>"></script>

    <!--Perfect Scrollbar JS-->

    <script src="<?php echo e(asset('js/perfect-scrollbar.min.js')); ?>"></script>

    <!-- Chart JS -->

    <script src='<?php echo e(asset('js/chart.js')); ?>'></script>

    <!-- Main JS-->

    <script src="<?php echo e(asset('js/main.js')); ?>"></script>

    <!-- Dashboard JS-->

    <script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>

    <script src="<?php echo e(asset('js/bootstrap4-toggle.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('datatable/vfs_fonts.js')); ?>"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script type="text/javascript" src="<?php echo e(asset('datatable/dataTables.bootstrap4.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('datatable/datatable.fixedheader.min.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(asset('datatable/datatable.responsive.min.js')); ?>"></script>

    <script src="<?php echo e(asset('/vendor/translation/js/app.js')); ?>"></script>

    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html><?php /**PATH /Users/viperflux/Documents/GitHub/ggi-website/resources/views/admin/main.blade.php ENDPATH**/ ?>
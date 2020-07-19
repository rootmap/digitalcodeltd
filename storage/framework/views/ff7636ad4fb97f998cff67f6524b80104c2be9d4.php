<?php 
    $objSTD=new MenuPageController();
    $customerSupport=$objSTD->CustomerSupport();
    $ContactDetail=$objSTD->ContactDetail();
    $Seo=$objSTD->Seo();
    
    $AcceptPayment = $objSTD->AcceptPayment();
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php echo $__env->yieldContent('title'); ?>  <?php echo e($Seo->site_title); ?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <meta name=viewport content="width=device-width, initial-scale=1">
        <meta name="robots" content="index" />
        <?php echo $__env->yieldContent('seo'); ?> 
        
        <meta name="author" content="">

        <!--Favicon start-->
        <link rel="apple-touch-icon" sizes="57x57" href="<?php echo e(url('favicon/apple-icon-57x57.png')); ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?php echo e(url('favicon/apple-icon-60x60.png')); ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo e(url('favicon/apple-icon-72x72.png')); ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?php echo e(url('favicon/apple-icon-76x76.png')); ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo e(url('favicon/apple-icon-114x114.png')); ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?php echo e(url('favicon/apple-icon-120x120.png')); ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?php echo e(url('favicon/apple-icon-144x144.png')); ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?php echo e(url('favicon/apple-icon-152x152.png')); ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?php echo e(url('favicon/apple-icon-180x180.png')); ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo e(url('favicon/android-icon-192x192.png')); ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?php echo e(url('favicon/favicon-32x32.png')); ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(url('favicon/favicon-96x96.png')); ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(url('favicon/favicon-16x16.png')); ?>">
        <link rel="manifest" href="<?php echo e(url('favicon/manifest.json')); ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?php echo e(url('favicon/ms-icon-144x144.png')); ?>">
        <meta name="theme-color" content="#ffffff">
        <!--Favicon end-->
        <!-- Mobile Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <?php if(Auth::check()): ?>
            <?php if(Auth::user()->user_type=='Admin'): ?>
                <script type="text/javascript">
                    window.location = "<?php echo e(url('admin-ecom/dashboard')); ?>";//here double curly bracket
                </script>
                <?php exit(); ?>
            <?php endif; ?>
        <?php endif; ?>
        <!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
        <?php echo $__env->make('frontend.extra.header-css', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie.css">
        <script type="text/javascript" src="js/html5.js"></script>
    <![endif]-->

    	<?php echo $__env->yieldContent('css'); ?>

        
    </head>
    <body>

        <!-- site preloader start -->
        <div class="page-loader">
            <div class="loader-in"></div>
        </div>
        <!-- site preloader end -->

        <div class="pageWrapper">
            <!-- login box start -->
            <?php //include_once './include/login.php'; ?>
            <!-- login box End -->

            <!-- Header Start -->
            <div id="headWrapper" class="clearfix">

                <!-- top bar start -->
                <?php echo $__env->make('frontend.extra.top_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- top bar end -->

                <?php echo $__env->make('frontend.extra.logo_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

      

            </div>
            <!-- Header End -->

            <!-- Content Start -->
            <?php echo $__env->yieldContent('content'); ?>
            <!-- Content End -->
            <!-- Footer start -->
            <?php echo $__env->make('frontend.extra.fotter', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Footer end -->
        </div> 
        <?php echo $__env->make('frontend.extra.fotter-script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->yieldContent('js'); ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $(".close-messagelbl-area").click(function(){
                    $(".lbl-box-message-area").fadeOut('slow');
                });

                $(".logoutFront").click(function(){
                    $("#logoutFront").submit();
                });
                
            });
        </script>
    </body>
</html>
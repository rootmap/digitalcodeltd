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
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo $__env->yieldContent('title'); ?> | <?php echo e($Seo->name); ?></title>
        <meta name="description" content="<?php echo e($Seo->description); ?>">
        <meta name="keywords" content="<?php echo e($Seo->meta); ?>">
        <meta name="author" content="Md. Mahamudur Zaman Bhuyian">

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
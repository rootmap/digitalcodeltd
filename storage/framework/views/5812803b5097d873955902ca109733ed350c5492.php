<?php
$objSTD=new MenuPageController();
$Seo=$objSTD->Seo();
?>

<?php $__env->startSection('title','Gallery | '); ?>
<?php $__env->startSection('seo'); ?>
    <meta name="description" content="<?php echo e($Seo->gallery_description); ?>">
    <meta name="keywords" content="<?php echo e($Seo->meta); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft"><span>Gallery</span></h1>

                 <!--  <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span> Gallery Photos</span>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sectionWrapper">
        <div class="container">
            <div class="portfolio-filterable">
                <div class="row">
                    
                    <div class="portfolio-items" id="container">
                        <?php if(isset($gallery)): ?>
                        <?php $__currentLoopData = $gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="cell-3 develop" data-category="develop">
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link">
                                            
                                        </a>
                                        <a href="<?php echo e(URL::asset('upload/gallery-photo/'.$data->photo)); ?>" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title=""><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" style="max-height: 150px;" src="<?php echo e(URL::asset('upload/gallery-photo/'.$data->photo)); ?>">
                                </div>
                                
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>	





<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('front-theme/css/prettyPhoto.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('front-theme/css/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('front-theme/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('front-theme/css/radio-button/style.css')); ?>">
    <style type="text/css">
        .display-none-sec
        {
            display: none !important;
        }

        .discount-space
        {
            display: none;
        }

        .cart-item-highlight
        {
            font-weight: 600;
        }

        .cart-data-mini-box
        {
            width: 100%;
            display: block; 
        }

        .cart-price-mini-box
        {
            display:inline-grid;
            font-weight: 600;
        }
        .cart-price-mini-box > span::before 
        {
            content:"$";
            display:inline-grid;
            font-weight: 600;
        }
        .cart-extra-mini-box
        {
            width: 150px;
            display:inline-grid;
            overflow: hidden;
            font-weight: bold;
        }
    </style>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('slider-js'); ?>
    <!-- slick slider carousel -->
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/slick.min.js')); ?>"></script>
    <!-- isotope plugin -->
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/isotope.pkgd.min.js')); ?>"></script>
    <!-- PrettyPhoto script -->
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.prettyPhoto.js')); ?>"></script>

    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.animateNumber.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.easypiechart.min.js')); ?>"></script>

    <script src="<?php echo e(url('front-theme/js/sweetalert.min.js')); ?>"></script>
    <?php echo $__env->make('frontend.extra.cart-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
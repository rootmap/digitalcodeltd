<?php $__env->startSection('title','Order Your Menu'); ?>
<?php $__env->startSection('content'); ?>	
   <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx proban" data-animate="fadeInLeft">Polo T-Shirt For Men And Women</h1>
                    <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><a href="#">Shop </a><span class="line-separate">/</span><span>Polo T-Shirt For Men</span>
                        
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                <div class="box success-box center hidden">Your item was added succesfully.</div>
                <div class="clearfix"></div>
                <aside class="cell-3 left-shop">
                    <?php echo $__env->make('frontend.extra.product_left_bar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </aside>
                <!-- cell6  class="proButton modal-trigger" data-modal="modal-name" -->
                <div class="cell-6">
                    <div class="button-group">
                        <a class="btn btn-primary modal-trigger online-smart-way model-restaurant-btn fx animated fadeInUp" href="#" data-animate="fadeInUp" data-animation-delay="600" data-modal="delivery_time_detail" style="animation-delay: 600ms;">
                            <span><i class="fa fa-bus selectedI"></i>Delivery Time</span> </a>

                        <a class="btn btn-primary modal-trigger online-smart-way model-restaurant-btn fx animated fadeInUp" href="#" data-animate="fadeInUp" data-modal="alergy_alert" data-animation-delay="600" style="animation-delay: 600ms;">
                            <span><i class="fa fa-bus selectedI"></i>Allergy Alert</span> </a>

                        <a class="btn btn-primary modal-trigger online-smart-way model-restaurant-btn  fx animated fadeInUp" href="#" data-modal="delivery_detail_info" data-animate="fadeInUp" data-animation-delay="600" style="animation-delay: 600ms;">
                            <span><i class="fa fa-bus selectedI"></i>Delivery Info</span> </a>
                    </div>
                    
                    <?php if(isset($orderINfoText)): ?>
                        <div class="modal" id="delivery_time_detail" style="z-index: 9999;">
                            <div class="modal-sandbox"></div>
                            <div class="modal-box">
                                <div class="modal-header">
                                    <div class="close-modal">✖</div> 
                                    <h4><i class="fa fa-info-circle"></i> Opening information</h4>
                                </div>
                                <div class="modal-body" style="padding:20px 10px 10px 10px;">       
                                    <div class="cell-12">
                                       <?php echo html_entity_decode($orderINfoText->delivery_time); ?> 
                                    </div>               
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="alergy_alert" style="z-index: 9999;">
                            <div class="modal-sandbox"></div>
                            <div class="modal-box">
                                <div class="modal-header">
                                    <div class="close-modal">✖</div> 
                                    <h4><i class="fa fa-info-circle"></i> Allergy & dietary information</h4>
                                </div>
                                <div class="modal-body" style="padding:20px 10px 10px 10px;">       
                                    <div class="cell-12">
                                       <?php echo html_entity_decode($orderINfoText->allergy_alert); ?> 
                                    </div>               
                                </div>
                            </div>
                        </div>

                        <div class="modal" id="delivery_detail_info" style="z-index: 9999;">
                            <div class="modal-sandbox"></div>
                            <div class="modal-box">
                                <div class="modal-header">
                                    <div class="close-modal">✖</div> 
                                    <h4><i class="fa fa-info-circle"></i> Delivery Info</h4>
                                </div>
                                <div class="modal-body" style="padding:20px 10px 10px 10px;">       
                                    <div class="cell-12">
                                       <?php echo html_entity_decode($orderINfoText->delivery_info); ?> 
                                    </div>               
                                </div>
                            </div>
                        </div>

                    

                    <!-- button -->
                    <div class="clearfix"></div>
                    <div class="padd-top-20"></div>
                    <div class="cell-12">
                        <blockquote>
                            <?php echo html_entity_decode($orderINfoText->description); ?> 
                        </blockquote>
                    </div>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <div class="padd-top-20"></div>
                    <!-- NOTE -->
                    
                    <?php echo $__env->make('frontend.extra.ros_menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    

                </div>


                <?php echo $__env->make('frontend.extra.cart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>



            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>	





<?php $__env->startSection('css'); ?>
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
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.animateNumber.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.easypiechart.min.js')); ?>"></script>

    <script src="<?php echo e(url('front-theme/js/sweetalert.min.js')); ?>"></script>
	<?php echo $__env->make('frontend.extra.cart-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <script type="text/javascript">

        
        $(document).ready(function(){
            $("#mobileCartMenuShort").click(function(){
                $('html, body').animate({
                    scrollTop: $("#mobileCartWeb").offset().top - ($('#mobileCartWeb')[0].scrollHeight-250)
                }, 1000);

                console.log('Position Get : ',$("#mobileCartWeb").offset().top);

            });
        });

        
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
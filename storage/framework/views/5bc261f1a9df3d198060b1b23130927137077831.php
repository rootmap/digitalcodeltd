<?php $__env->startSection('title','Contact Us - Please send your query.'); ?>
<?php $__env->startSection('content'); ?>	
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft">Contact <span>us</span></h1>
                    <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span>Contact us</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        $objSTD=new MenuPageController();
        $Seo=$objSTD->Seo();
        $AppsSetting=$objSTD->AppsSetting();
        
    ?>

    <div class="padd-top-50">
        <?php echo $__env->make('frontend.extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container">
            <div class="row">
                <div class="cell-6 contact-detalis fx" data-animate="fadeInLeft" id="contact">
                    
                    <div class="clearfix"></div>
                    <div class="padding-vertical">
                        <div class="cell-10 fx" data-animate="fadeInRight">
                            <?php if(isset($contact)): ?>
                            <h3 class="block-head"><?php echo e($contact->contact_title); ?></h3>
                            <h5 class="footer-contact"><i class="fa fa-home"></i> <span> <b>Address:</b> <?php echo e($contact->contact_address); ?> </span></h5>
                            
                            <h5 class="footer-contact font-weight"><i class="fa fa-envelope"></i><span> Email:  <a href="mailto:<?php echo e($contact->contact_email); ?>"><?php echo e($contact->contact_email); ?></a> </span></h5>
                            <h5 class="footer-contact font-weight"> <i class="fa fa-phone"></i><span>Phone: <a href="skype:<?php echo e($contact->contact_phone); ?>"><?php echo e($contact->contact_phone); ?></a></span></h5>
                         
                            
                            <?php endif; ?>
                        </div>
                        
                        
                    </div>
                    <div class="clearfix"></div>
                <?php if($AppsSetting->count() > 0): ?>
                
                <div class="cell-12 contact-detalis fx" data-animate="fadeInLeft" id="contact" style="margin-top: 20px">
                    <h3 class="block-head">Download Our Apps</h3>
                    
                    <div class="contactimg">
                    <?php if(!empty($AppsSetting)): ?>
                    <?php $__currentLoopData = $AppsSetting; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $apps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a target="_blank" href="<?= $apps->link ?>">
                        <img src="<?php echo e(url('upload/AppsSetting')); ?>/<?= $apps->images ?>" alt="Android-app-store" />
                    </a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     <?php endif; ?> 
                    </div>
                </div>
                
               
                <?php endif; ?> 
                </div>
                <div class="cell-6 contact-form">
                    
                    <h3 class="block-head">Get in Touch</h3>
                    <mark id="message"></mark>
                    <form class="form-signin cform" method="post" action="<?php echo e(url('contact-request')); ?>" id="cform" autocomplete="on">
                        <?php echo csrf_field(); ?>

                        <div class="form-input">
                            <label>First name<span class="red">*</span></label>
                            <input type="text" name="name" id="name" required="required">
                        </div>
                        <div class="form-input">
                            <label>Email<span class="red">*</span></label>
                            <input name="email" type="email" id="email" required="required">
                        </div>
                        <div class="form-input">
                            <label>Phone</label>
                            <input name="phone" type="text" id="phone">                                     
                        </div>
                        <div class="form-input">
                            <label>Message<span class="red">*</span></label>
                            <textarea name="message" cols="40" rows="7" id="messageTxt" spellcheck="true" required="required"></textarea>
                        </div>
                        <div  class="form-input">
                            <div class="row">
                                <div style="padding-left: 20px;">
                                    <div class="g-recaptcha" data-sitekey="6LeHEVsUAAAAAFTRoVtdU7hSsfTFZxJbu4tSulfL"></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-input">
                            <input id="submit" name="submit" type="submit" class="btn btn-large main-bg" value="Submit">&nbsp;&nbsp;<input type="reset" class="btn btn-large" value="Reset" id="reset">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="padd-vertical-45">
        <div class="container">
            <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
            
            
                <?php 
                    echo html_entity_decode($Seo->google_maps);
                ?>
                
               
                
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>	





<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('front-theme/css/custom/slick_ffs.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('front-theme/css/custom.css')); ?>">
    <script src='https://www.google.com/recaptcha/api.js'></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('slider-js'); ?>
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.animateNumber.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.easypiechart.min.js')); ?>"></script>

    <script src="<?php echo e(url('front-theme/js/sweetalert.min.js')); ?>"></script>
    <?php echo $__env->make('frontend.extra.cart-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
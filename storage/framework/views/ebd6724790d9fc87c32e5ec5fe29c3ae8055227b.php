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


    <div class="padd-top-50">
        <?php echo $__env->make('frontend.extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container">
            <div class="row">
                <div class="cell-6 contact-detalis fx" data-animate="fadeInLeft" id="contact">
                    <hr class="hr-style4">
                    <div class="clearfix"></div>
                    <div class="padding-vertical">
                        <div class="cell-10 fx" data-animate="fadeInRight">
                            <?php if(isset($contact)): ?>
                            <h4 class="main-color bold"><?php echo e($contact->contact_title); ?></h4>
                            <h5 >Address:</h5>
                            <p><?php echo e($contact->contact_address); ?></p>
                            <h5 >Email:</h5>
                            <p><?php echo e($contact->contact_email); ?></p>
                            <h5 >Phone:</h5>
                            <p><?php echo e($contact->contact_phone); ?></p>
                            
                            <?php endif; ?>
                        </div>
                        <div class="cell-2"><br></div>
                        
                    </div>
                    <h3 class="block-head">Download Our Apps</h3>
                    <!-- <p class="fx" data-animate="fadeInRight">Lorem ipsum dolor sit amet, onsectetuer dipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat dipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat dipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, onsectetuer dipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p> -->
                    <div class="contactimg">
                    <img src="<?php echo e(url('front-theme/images/apps/Android-app-store.png')); ?>" alt="Android-app-store" />
                    <img src="<?php echo e(url('front-theme/images/apps/Available-on-the-app-store-badge.png')); ?>" alt="ios-app-store" style="margin-top: 10px;" />
                </div>
                    
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
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3sTtUWQc2-EbWu-xD9vFw2w_W2VOFuPk&callback=initMap" type="text/javascript"></script>
            <div id="map_canvas" style="height: 450px; width: 100%;">
                <script type="text/javascript">
                    function init_map() {
                        var myOptions = {zoom: 14, center: new google.maps.LatLng(52.652964,-0.485109),
                            mapTypeId: google.maps.MapTypeId.ROADMAP};
                        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                        marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(52.652964,-0.485109)});
                        infowindow = new google.maps.InfoWindow({content: "<div class='noScroll'><b>Bombay Cottage</b><br/> Indian dining in a <br/> wood-beamed property</div>"});
                        google.maps.event.addListener(marker, "click", function () {
                            infowindow.open(map, marker);
                        });
                        infowindow.open(map, marker);
                    }
                    google.maps.event.addDomListener(window, 'load', init_map);
                </script>
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
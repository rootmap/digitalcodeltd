<?php
$objSTD=new MenuPageController();
$Seo=$objSTD->Seo();
?>

<?php $__env->startSection('title','Review - Please leave a feedback | '); ?>
<?php $__env->startSection('seo'); ?>
    <meta name="description" content="<?php echo e($Seo->reviews_description); ?>">
    <meta name="keywords" content="<?php echo e($Seo->meta); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>	
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft">We love  <span>feedback</span></h1>

                    <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span>Feedback</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                <?php echo $__env->make('frontend.extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <div class="cell-3"></div>
                <div class="cell-7">
                    <section id="slick">

                        <!-- Feedback form -->
                        <div class="feedback-form">
                            <!-- Title -->
                            <div class="title">We love feedback</div> 
                            <!-- Intro text -->
                            <p class="intro"><b>Good support is the king.</b> Please send us your feedback or suggestions, so we can make better experience for you.</p>
                            <form action="<?php echo e(url('/Review-Request')); ?>" id="feedback" method="post">
                                <!-- Name input -->
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <div class="field">
                                    <input name="name" placeholder="Your name" type="text" id="name" required="">
                                    <span class="entypo-user icon"></span>
                                    <span class="slick-tip left">Enter your name</span>
                                </div>
                                <!-- Email input -->
                                <div class="field">
                                    <input name="email" placeholder="modelrestaurant@gmail.com" type="email" id="email" required="">
                                    <span class="entypo-mail icon"></span>
                                    <span class="slick-tip left">Enter your email</span>    
                                </div>
                                <!-- Subject input -->
                                <div class="field">
                                    <select name="subject" id="subject" class="" onclick="this.className = this.options[this.selectedIndex].className">
                                        <option value="" disabled="disabled" selected="selected" class="disabled">Subject</option>
                                        <option value="Positive feedback">1. Positive feedback</option>
                                        <option value="Negative feedback">2. Negative feedback</option>
                                        <option value="Suggestions">3. Suggestions</option>
                                    </select>
                                    <div id="arrow-select"></div>
                                    <svg id="arrow-select-svg"></svg>
                                    <span class="entypo-book icon"></span>
                                    <span class="slick-tip left">Choose subject</span>
                                </div>
                                <!-- Message input -->
                                <div class="field">
                                    <textarea name="feedback" placeholder="Feedback" id="message" required=""></textarea>
                                    <span class="entypo-comment icon"></span>
                                    <span class="slick-tip left">Your feedback</span>
                                </div>
                                <!-- Block checboxes -->
                                <div class="field">
                                    <p class="ratings"><span class="entypo-info-circled"></span>Please provide us your age</p>
                                    <fieldset class="blocks" id="age">
                                        <!-- 18 - 25 -->
                                        <input type="radio" id="age-1" name="age" value="18 - 25">
                                        <label for="age-1">18 - 25</label>
                                        <!-- 25 - 35 -->
                                        <input type="radio" id="age-2" name="age" value="25 - 35">
                                        <label for="age-2">25 - 35</label>
                                        <!-- 35 - 45 -->
                                        <input type="radio" id="age-3" name="age" value="35 - 45">
                                        <label for="age-3">35 - 45</label>
                                        <!-- 45 - 60 -->
                                        <input type="radio" id="age-4" name="age" value="45 - 60">
                                        <label for="age-4">45 - 60</label>
                                        <!-- 65 - 75 -->
                                        <input type="radio" id="age-5" name="age" value="60 - 75">
                                        <label for="age-5">60 - 75</label>
                                        <!-- 75 - 90 -->
                                        <input type="radio" id="age-6" name="age" value="75 - 90">
                                        <label for="age-6">75 - 90</label>
                                    </fieldset>
                                </div>
                                <div class="clrfx mt-10 mb-20 bt"></div>
                                <!-- Stars rating 1 -->
                                <div class="field">
                                    <p class="ratings"><span class="entypo-briefcase"></span>Our services &amp; customer care</p>
                                    <fieldset class="stars" id="service-rating">
                                        <!-- 5 stars -->
                                        <input type="radio" id="service-5" name="services" value="5">
                                        <label for="service-5"><span class="slick-tip rate">Awesome</span></label>
                                        <!-- 4 stars -->
                                        <input type="radio" id="service-4" name="services" value="4">
                                        <label for="service-4"><span class="slick-tip rate">Pretty satisfied</span></label>
                                        <!-- 3 stars -->
                                        <input type="radio" id="service-3" name="services" value="3" checked="checked">
                                        <label for="service-3"><span class="slick-tip rate">Not best, not worst</span></label>
                                        <!-- 2 stars -->
                                        <input type="radio" id="service-2" name="services" value="2">
                                        <label for="service-2"><span class="slick-tip rate">Room for improvement</span></label>
                                        <!-- 1 star -->
                                        <input type="radio" id="service-1" name="services" value="1">
                                        <label for="service-1"><span class="slick-tip rate">Not so good</span></label>
                                    </fieldset>
                                </div>
                                <div class="clrfx mt-10"></div>
                                <!-- Stars rating 2 -->
                                <div class="field">
                                    <p class="ratings"><span class="entypo-chat"></span>After sale's support &amp; help</p>
                                    <fieldset class="stars" id="support-rating">
                                        <!-- 5 stars -->
                                        <input type="radio" id="support-5" name="support" value="5">
                                        <label for="support-5"><span class="slick-tip rate">Awesome</span></label>
                                        <!-- 4 stars -->
                                        <input type="radio" id="support-4" name="support" value="4">
                                        <label for="support-4"><span class="slick-tip rate">Pretty satisfied</span></label>
                                        <!-- 3 stars -->
                                        <input type="radio" id="support-3" name="support" value="3" checked="checked">
                                        <label for="support-3"><span class="slick-tip rate">Not best, not worst</span></label>
                                        <!-- 2 stars -->
                                        <input type="radio" id="support-2" name="support" value="2">
                                        <label for="support-2"><span class="slick-tip rate">Room for improvement</span></label>
                                        <!-- 1 star -->
                                        <input type="radio" id="support-1" name="support" value="1">
                                        <label for="support-1"><span class="slick-tip rate">Not so good</span></label>
                                    </fieldset>
                                </div>
                                <div class="clrfx mt-10"></div>
                                <!-- Stars rating 3 -->
                                <div class="field">
                                    <p class="ratings"><span class="entypo-users"></span>Our team &amp; staff valuation</p>
                                    <fieldset class="stars" id="team-rating">
                                        <!-- 5 stars -->
                                        <input type="radio" id="team-5" name="team" value="5">
                                        <label for="team-5"><span class="slick-tip rate">Awesome</span></label>
                                        <!-- 4 stars -->
                                        <input type="radio" id="team-4" name="team" value="4">
                                        <label for="team-4"><span class="slick-tip rate">Pretty satisfied</span></label>
                                        <!-- 3 stars -->
                                        <input type="radio" id="team-3" name="team" value="3" checked="checked">
                                        <label for="team-3"><span class="slick-tip rate">Not best, not worst</span></label>
                                        <!-- 2 stars -->
                                        <input type="radio" id="team-2" name="team" value="2">
                                        <label for="team-2"><span class="slick-tip rate">Room for improvement</span></label>
                                        <!-- 1 star -->
                                        <input type="radio" id="team-1" name="team" value="1">
                                        <label for="team-1"><span class="slick-tip rate">Not so good</span></label>
                                    </fieldset>
                                </div>
                                <div class="clrfx mt-10 mb-20 bt"></div>
                                <!-- Tick checboxes -->
                                <div class="field">
                                    <p class="ratings"><span class="entypo-link"></span>How can we improve your satisfaction?</p>
                                    <div class="clrfx mt-20"></div>
                                    <!-- Option 1 -->
                                    <?php if(isset($data)): ?>
                                        <?php $i=1; ?>
                                        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php 
                                            $divclass ='';
                                                if($i==1){
                                                    $class =' class="w-30 mr-5" ';
                                                }elseif ($i==2) {
                                                    $class =' class="w-30 mr-5" ';
                                                }elseif($i==3){
                                                     $class =' class="w-30" ';
                                                     $divclass ='<div class="clrfx mt-10"></div>';
                                                }elseif($i==4){
                                                    $class =' class="w-30 mr-5" ';
                                                }elseif ($i==5) {
                                                    $class =' class="w-30 mr-5" ';
                                                }
                                                elseif($i==6){
                                                     $class =' class="w-30" ';
                                                     $divclass ='<div class="clrfx mt-10"></div>';
                                                }
                                            ?>
                                            <div <?= $class; ?> >
                                                <input type="checkbox" id="satisfaction<?=$i;?>" value="<?php echo e($row->name); ?>" name="satisfaction[]">
                                                <label for="satisfaction<?=$i;?>" class="tick"><span><?php echo e($row->name); ?></span></label>
                                            </div>
                                            <?= $divclass; ?>
                                            <?php $i++;?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                    
                                </div>
                                <div class="clrfx mt-20"></div>
                                <!-- Terms and Conditions link -->
                                <div class="terms w-47"> ***Your information won’t be disclosed. <br><a href="#terms-popup"></a>.</div>                           <input type="hidden" name="confirm_reservation" value="confirm_reservation">
                                <input type="submit" value="Send" class="send" form="feedback" name="send">
                            </form>
                            <!-- / Form fields -->
                        </div>
                        <!-- / Feedback form -->
                        <!-- Terms and conditions -->
                        <div id="terms-popup" class="terms-window">
                            <a href="#close" class="close-overlay"></a>
                            <div>
                                <a href="#close" class="close entypo-cancel-circled"></a>
                                <div class="title">Terms &amp; Conditions</div>
                                <p class="intro"><b>1. Lorem ipsum</b><br>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.<br>
                                    Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                <p class="intro"><b>2. Dolor commodo</b><br>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                <p class="intro"><b>3. Sit amet</b><br>
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.<br>
                                    Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                            </div>
                        </div>
                        <!-- / Terms and conditions -->
                    </section>
                </div>



            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>	





<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('front-theme/css/custom/slick_ffs.css')); ?>">
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
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
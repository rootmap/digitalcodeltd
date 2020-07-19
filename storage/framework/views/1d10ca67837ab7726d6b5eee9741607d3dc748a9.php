<?php
$mainmenu=$objSTD->mainMenu();
?>
<style type="text/css">
@media (min-width: 1281px) {
    header.top-head .logo a 
    {
        background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;
        width: 100%;
        height: 74px;
        display: table;
        margin-top: -16px;
    }

    .mobileHide span {
        display: none;
    }
}
/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
    header.top-head .logo a 
    {
        background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;
        width: 100%;
        height: 74px;
        display: table;
        margin-top: -16px;
    }

    .mobileHide span {
        display: none;
    }
}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {
   header.top-head .logo a 
    {
        background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat center;
        width: 100%;
        height: 66px;
        display: block;
    }

    .mobileHide span {
        display: block;
        text-align: center;
        margin-left: 0px !important;
    }

    .cell-5 {
        width: 41.66666667%;
    }
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
    header.top-head .logo a 
    {
        background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat center;
        width: 100%;
        height: 66px;
        display: block;
    }

    .mobileHide span {
        display: block;
        text-align: center;
        margin-left: 0px !important;
    }

    .cell-5 {
        width: 41.66666667%;
    }
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
    header.top-head .logo a 
    {
        background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;
        height: 56px;
        width: 280px;
        margin-top: -7px;
    }

    .mobileHide span {
        display: block;
        text-align: center;
        margin-left: 0px !important;
    }

    .cell-5 {
        width: 41.66666667%;
    }
}

/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {
    header.top-head .logo a 
    {
        background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;
        height: 56px;
        width: 280px;
            margin-top: -7px;
    }

    .mobileHide span {
        display: block;
        text-align: center;
        margin-left: 0px !important;
    }

    .cell-5 {
        width: 41.66666667%;
    }
}

@media (min-width: 0px) and (max-width: 319px) {
    header.top-head .logo a 
    {
        background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;
        height: 42px;
        width: 240px;
            margin-top: -7px;
            margin-left: 35px;
    }

    .mobileHide span {
        display: block !important;
        text-align: center;
        margin-left: 0px !important;
    }

    .menuBtn
    {
        margin-top: 14px;
    }

    .cell-5 {
        width: 41.66666667%;
    }
}
</style>

<header class="top-head" data-sticky="true">
    <div class="container">
        <div class="row">
            <div class="logo cell-3">
                <a style="" href="<?php echo e(url('home')); ?>"></a>
                <div class="mobileHide"> <span><i class="fa fa-phone"></i> Call Us: <?php echo e($ContactDetail->contact_phone); ?></span> </div>
            </div>
            <div class="cell-9 top-menu">

                <!-- top navigation menu start -->
                <nav class="top-nav mega-menu">
                    <ul>
                        <li class="selected"><a href="<?php echo e(url('home')); ?>"><i class="fa fa-home"></i><span>Home</span></a> </li>
                        <li><a href="<?php echo e(url('order-item')); ?>"><i class="fa fa-gift"></i><span>Online Order</span></a>
                            <?php if(isset($mainmenu)): ?>
                            <ul>
                                <?php $__currentLoopData = $mainmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a class="pagetitle" id="product<?php echo e($menu->id); ?>" href="<?php echo e(url('/order-item')); ?>#pro<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <li><a href="<?php echo e(url('our-offer')); ?>"><i class="fa fa-gift"></i><span>Offer</span></a></li>
                        <li><a href="<?php echo e(url('table-booking')); ?>"><i class="fa fa-gift"></i><span>Table Booking</span></a></li>
                        <li><a href="<?php echo e(url('gallery')); ?>"><i class="fa fa-gift"></i><span>Gallery</span></a></li>
                        <li><a href="<?php echo e(url('reviews')); ?>"><i class="fa fa-gift"></i><span>Reviews</span></a></li>
                        <li><a href="<?php echo e(url('contact-us')); ?>"><i class="fa fa-gift"></i><span>Contact US</span></a></li>
                    </ul>
                </nav>
                <!-- top navigation menu end -->

                <!-- top search start -->
                <div class="top-search">
                    <a href="#"><span class="fa fa-search"></span></a>
                    <div class="search-box">
                        <div class="input-box left">
                            <input type="text" name="t" id="t-search" class="txt-box" placeHolder="Enter search keyword here..." />
                        </div>
                        <div class="left">
                            <input type="submit" id="b-search" class="btn main-bg" value="GO" />
                        </div>
                    </div>
                </div>
                <!-- top search end -->
            </div>
        </div>
    </div>
</header>
<div class="my-sticky-element mobileloginmenu" data-sticky="true">
    <?php echo $__env->make('frontend.extra.mobileloginmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
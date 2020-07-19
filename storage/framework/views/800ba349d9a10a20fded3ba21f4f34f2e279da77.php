<?php
$mainmenu=$objSTD->mainMenu();
?>
<style type="text/css">
.btn-orange.btn-outlined{
        border-color: #e57b63 !important;
}

@media (min-width: 1281px) {
    header.top-head .logo a 
    {
        /*background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;*/
        width: 100%;
        height: 74px;
        display: table;
        margin-top: -16px;
    }
    .logo img{
        width: 100%;
        height: 92px;
        top: -20px;
        position: absolute;
    }
    .mobileHide a {
        display: none !important;
    }

}
/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
    header.top-head .logo a 
    {
        /*background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;*/
        width: 100%;
        height: 74px;
        display: table;
        margin-top: -16px;
    }
    .logo img{
        width: 100%;
        height: 92px;
        top: -20px;
        position: absolute;
    }
    .sticky img{
        height: 61px;
         top: -3px;
    }
    .mobileHide a {
        display: none !important;
    }
}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {
   header.top-head .logo a 
    {
        /*background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;*/
        width: 100%;
        height: 66px;
        display: block;
    }
    .logo img{
        width: 280px;
        height: 92px;
        margin-left: 30%;
        display: block;
    }
    .mobileHide a {
        display: block;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo{
        display: block;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
        margin-left: 0px;
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
        /*background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;*/
        width: 100%;
        height: 66px;
        display: block;
    }
    .logo img{
        width: 280px;
        height: 66px;
        top: -20px;
        position: absolute;
    }
    .mobileHide a {
        display: block;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo{
        display: block;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
        margin-left: 0px;
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
        /*background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;*/
        height: 56px;
        width: 280px;
        margin-top: -7px;
    }
    .logo img{
        width: 280px;
        height: 56px;
        /*top: -20px;*/
        position: absolute;
    }
    .mobileHide a {
        display: block;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo{
        display: block;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
        margin-left: 0px;
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
        /*background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;*/
        height: 56px;
        width: 280px;
        margin-top: -7px;
    }
    .logo img{
        width: 250px;
        height: 56;
        margin-top: -7px;
        margin-left: 30px;
        /*top: -20px;*/
        /*position: absolute;*/
    }
    .mobileHide a {
        display: block;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo{
        display: block;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
        margin-left: 0px;
    }

    .cell-5 {
        width: 41.66666667%;
    }
}

@media (min-width: 0px) and (max-width: 319px) {
    header.top-head .logo a 
    {
        /*background: transparent url('<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>') no-repeat 50% 50%;*/
        height: 42px;
        width: 240px;
        margin-top: -7px;
        margin-left: 35px;
    }
    .logo img{
        width: 240px;
        height: 62px;
    }
    .mobileHide a {
        display: block !important;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo{
        display: block;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
        margin-left: 0px;
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
                
                <a href="<?php echo e(url('home')); ?>">
                    <img src="<?php echo e(url('upload/logo/'.$Seo->site_logo)); ?>" >
                </a>
                <div class="mobileHide"> 
                    <a href="skype:<?php echo e($ContactDetail->contact_phone); ?>?call"><i class="fa fa-phone"></i> Call Us: <b><?php echo e($ContactDetail->contact_phone); ?></b></a> 
                    <?php if(Request::path() == 'home'): ?>
                    <div class="buttonlogo">
                        <a class="btn btn-md btn-orange btn-outlined fx animated fadeInDown" href="<?php echo e(url('order-item')); ?>" data-animate="fadeInDown" data-animation-delay="700" style="animation-delay: 700ms;"> <span><i class="fa fa-shopping-cart"></i>Order Your Food Online</span> </a>
                    </div>
                    <?php endif; ?>    
                    
                </div>
            </div>
            <div class="cell-9 top-menu">

                <!-- top navigation menu start -->
                <nav class="top-nav mega-menu">
                    <ul>
                        <li class="<?php echo e(Request::path() == 'home' ? 'selected' : ''); ?>"><a href="<?php echo e(url('home')); ?>"><i class="fa fa-home"></i><span>Home</span></a> </li>
                        <li class="<?php echo e(Request::path() == 'order-item' ? 'selected' : ''); ?>"><a href="<?php echo e(url('order-item')); ?>"><i class="fa fa-cart-plus"></i><span>Online Order</span></a>
                            <?php if(isset($mainmenu)): ?>
                            <ul>
                                <?php $__currentLoopData = $mainmenu; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><a class="pagetitle" id="product<?php echo e($menu->id); ?>" href="<?php echo e(url('/order-item')); ?>#pro<?php echo e($menu->id); ?>"><?php echo e($menu->name); ?></a></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <?php endif; ?>
                        </li>
                        <li class="<?php echo e(Request::path() == 'our-offer' ? 'selected' : ''); ?>"><a href="<?php echo e(url('our-offer')); ?>"><i class="fa fa-gift"></i><span>Offer</span></a></li>
                        <li class="<?php echo e(Request::path() == 'gallery' ? 'selected' : ''); ?>"><a href="<?php echo e(url('gallery')); ?>"><i class="fa fa-picture-o"></i><span>Gallery</span></a></li>
                        <li class="<?php echo e(Request::path() == 'reviews' ? 'selected' : ''); ?>"><a href="<?php echo e(url('reviews')); ?>"><i class="fa fa-comments"></i><span>Reviews</span></a></li>
                        <li class="<?php echo e(Request::path() == 'contact-us' ? 'selected' : ''); ?>"><a href="<?php echo e(url('contact-us')); ?>"><i class="fa fa-phone"></i><span>Contact US</span></a></li>
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
        <?php if(Request::path() == 'order-item'): ?>
           <?php echo $__env->make('frontend.extra.mobileloginmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
        
        
    </div>
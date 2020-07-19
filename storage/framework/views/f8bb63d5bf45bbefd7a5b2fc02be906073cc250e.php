<div class="cusButonRight">
    <?php if(Auth::check()): ?>
        <a class="btn btn-md btn-square main-bg fx animated fadeInUp" href="<?php echo e(url('user/dashboard')); ?>" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms; margin-top: 14px; ">
        <span><i class="fa fa-crop selectedI"></i> Logged <?php echo e(Auth::user()->name); ?></span>
        </a>

        <a class="btn btn-md btn-square main-bg fx animated fadeInUp logoutFront" href="javascript:void(0);"  data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms; margin-top: 14px; margin-left: 0px;">
            <span><i class="fa fa-lock selectedI"></i> Logout</span>
        </a>
    <?php else: ?>
        <a class="btn btn-md btn-square main-bg fx animated fadeInUp" href="<?php echo e(url('user-login')); ?>" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;  margin-top: 14px; ">
        <span><i class="fa fa-crop selectedI"></i>login</span>
        </a>
        <a class="btn btn-md btn-square main-bg fx animated fadeInUp" href="<?php echo e(url('new-account')); ?>" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;  margin-top: 14px; ">
            <span><i class="fa fa-crop selectedI"></i>REGISTER</span>
        </a>
    <?php endif; ?>
    
</div>
<div class="cart-icon fx" id="mobileCartMenuShort" data-animate="fadeInRight" style="margin-top: 23px; margin-right: 20px;">
    <div class="cart-heading">
        <i class="fa fa-shopping-cart"></i><span id="cart-count" class="mobileCartMenuShortCartData"><b>0</b> item(s)</span>
    </div>
</div>
<div class="cusButonRight">
    <?php if(Auth::check()): ?>
        <a class="btn btn-md btn-square main-bg fx animated fadeInUp" href="<?php echo e(url('user/dashboard')); ?>" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms; margin-top: 14px; ">
        <span><i class="fa fa-user"></i> Profile <?php echo e(Auth::user()->name); ?></span>
        </a>

        <a class="btn btn-md btn-square main-bg fx animated fadeInUp logoutFront" href="javascript:void(0);"  data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms; margin-top: 14px; margin-left: 0px;">
            <span><i class="fa fa-lock selectedI"></i> Logout</span>
        </a>
    <?php else: ?>
    <style type="text/css">
        .user-login-info {
            padding: 25px 0px 0px 10px;
        }
        .user-login-info li a {
                color: #000;
                font-size: 14px;
                font-weight: 700;
                padding-right: 10px;
            }
            .user-login-info li i{
                color: #e7512f;
                font-size: 16px;
            }
    </style>
        <div class="user-login-info text-right" style="display: none;">
            <ul class="list-unstyled list-inline">
            <!-- cfologin-orderpage -->
                <li class="fx animated fadeInUp" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;  "><a href="<?php echo e(url('user-login')); ?>"><i class="fa fa-user"></i> Sign in</a> <a href="<?php echo e(url('new-account')); ?>"><i class="fa fa-user-plus"></i> Sign up</a></li>
            </ul>
        </div>
        
    <?php endif; ?>
    
</div>

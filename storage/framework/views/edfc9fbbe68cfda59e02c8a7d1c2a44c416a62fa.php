      

<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>
            <?php if(isset($SliderData)): ?>
                <?php $__currentLoopData = $SliderData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sld): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li data-transition="fade" data-slotamount="7">
                    <img alt="<?php echo e($sld->name); ?>" src="<?php echo e(url('front-theme/images/slider/dummy.png')); ?>" data-lazyload="<?php echo e(url('upload/slider/'.$sld->sliderimage)); ?>" data-duration="1000" data-ease="Linear.easeNone">
                </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>            
        </ul>
    </div>
</div>


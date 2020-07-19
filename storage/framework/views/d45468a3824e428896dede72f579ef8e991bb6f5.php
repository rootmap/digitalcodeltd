<?php $__env->startSection('title','Proced To Payment'); ?>
<?php $__env->startSection('content'); ?>
<div id="contentWrapper">
	<div class="page-title title-1">
		<div class="container">
			<div class="row">
				<div class="cell-12">
					<h1 class="fx" data-animate="fadeInLeft">Check <span>out</span></h1>
					<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
						<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Shop </a><span class="line-separate">/</span><span>Check out</span>
					</div>
					
				</div>
			</div>
		</div>
	</div>
	
	<div class="sectionWrapper">
		<div class="container">
			<div class="steps">
				<ul>
					<li><span>1 - Shopping cart</span></li>
					<li><span>2 - Delivery Address</span></li>
					<li class="selected"><span>3 - Payment Method</span></li>
					<li><span>4 - Confirm Payment</span></li>
				</ul>
			</div>
			<div class="row">
				
					<div class="cell-3"></div>
					<div class="cell-4">
						<div class="panel panel-default contactus">
	                        <div class="panel-heading clearfix">
	                            <h3 class="panel-title uppercase" >Select your payment method below</h3>
	                        </div>
	                        <form method="post" action="<?php echo e(url('make-payment')); ?>">
	                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
	                            <ul class="form-style-1">
	                                <li style="padding-bottom: 20px;">
	                                    <label>Select Payment Method <span class="required">*</span></label>
	                                    <select name="payment_method" class="field-long">
	                                    		<option value="">Select Payment Method</option>
	                                    		<option value="Paypal">Paypal</option>
	                                    		<option value="Cash">Cash</option>
	                                    </select>
	                                </li>
	                                
	                                <li>
	                                    
	                                    
	                                </li>
	                                <li>
	                                    <a href="<?php echo e(url('order-item')); ?>" class="btn">Back to shopping</a>&nbsp;&nbsp;
	                            		<button name="submit" class="btn main-bg" type="submit" > Submit </button>
	                       
	                                </li>
	                            </ul>
	                        </form>
	                    </div>
	                </div>


				
			</div>
			<div class="clearfix"></div>
			<div class="continue-btn">
				
				<a class="btn btn-medium left" href="<?php echo e(url('shopping-cart')); ?>">Back</a>
			</div>
		</div>
	</div>
	
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(url('front-theme/css/custom.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('front-theme/calendar/css/pikaday.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('front-theme/calendar/timepicker.min.css')); ?>">
    <script src='https://www.google.com/recaptcha/api.js'></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('slider-js'); ?>
    <script src="<?php echo e(url('front-theme/calendar/pikaday.js')); ?>"></script>

    <script>

        var picker = new Pikaday(
                {
                    field: document.getElementById('datepicker'),
                    firstDay: 1,
                    minDate: new Date(),
                    maxDate: new Date(2020, 12, 31),
                    yearRange: [2000, 2020]
                });

    </script>
    <script src="<?php echo e(url('front-theme/calendar/timepicker.min.js')); ?>"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function (event)
        {
            timepicker.load({
                interval: 15,
                defaultHour: 8
            });
        });
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
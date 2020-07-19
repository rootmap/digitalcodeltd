<?php $__env->startSection('title','Our Offer'); ?>
<?php $__env->startSection('content'); ?>	
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft">Table <span>Booking</span></h1>


                    <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span> Online Table Reservation</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sectionWrapper">
        <?php echo $__env->make('frontend.extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="container">
            <div class="row">
                <div class="cell-3"></div>
                <div class="cell-7">
                    <div class="panel panel-default contactus">
                        <div class="panel-heading clearfix">
                            <h3 class="panel-title uppercase" > Online Table Reservation</h3>
                        </div>
                        <form method="post" action="<?php echo e(url('reservation-request')); ?>">
                            <?php echo csrf_field(); ?>

                            <ul class="form-style-1">
                                <li>
                                    <label>Full Name <span class="required">*</span></label>
                                    <input type="text" name="fullname" class="field-long" placeholder="Name" />
                                </li>
                                <li>
                                    <label>Email <span class="required">*</span></label>
                                    <input type="email" name="email" class="field-long" />
                                </li>
                                <li>
                                    <label>Phone <span class="required">*</span></label>
                                    <input type="text" name="phone" class="field-long" />
                                </li>
                                <li>
                                    <label>Number Of Person <span class="required">*</span></label>
                                    <input type="text" name="number_of_person" class="field-long" />
                                </li>
                                <li>
                                    <label>Reservation Date <span class="required">*</span></label>
                                    <input type="text" id="datepicker" name="reservation_date" >
                                </li>
                                <li>
                                    <label>Reservation Time <span class="required">*</span></label>
                                    <!--<input type="text" name="phone" id="dateapicker" class="field-long" />-->
                                    <input type="text" name="reservation_time" data-toggle="timepicker">
                                </li>
                                <li>
                                    <label>Your Message</label>
                                    <textarea name="description" id="field5" class="field-long field-textarea"></textarea>
                                </li>
                                <li>
                                    
                                    
                                </li>
                                <li>
                                    
                            <button name="submit" type="submit" > Submit </button>&nbsp;&nbsp;<input type="reset" value="Reset" id="reset">
                       
                                </li>
                            </ul>
                        </form>
                    </div>
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


    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.animateNumber.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.easypiechart.min.js')); ?>"></script>

    <script src="<?php echo e(url('front-theme/js/sweetalert.min.js')); ?>"></script>
    <?php echo $__env->make('frontend.extra.cart-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
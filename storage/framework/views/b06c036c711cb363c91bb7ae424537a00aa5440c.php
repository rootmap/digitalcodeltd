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
					<li class="selected"><span>2 - Delivery Address</span></li>
					<li><span>3 - Payment Method</span></li>
					<li><span>4 - Confirm Payment</span></li>
				</ul>
			</div>
			<div class="row">
				<form action="javascript:void(0);" id="reg_form" class="contact-form">
					<div class="cell-6">
    					<div class="form-input">
    						<label>Full Name<span class="red">*</span></label>
    						<input name="name" value="<?php echo e(Auth::user()->name); ?>" type="text" required>
    					</div>
    					
    					<div class="form-input">
	    					<label>Address <span class="red">*</span></label>
	    					<input name="address" type="text" required>
	    				</div>

	    				<div class="form-input">
	    					<label>Zip Code <span class="red">*</span></label>
	    					<input name="zipcode" type="text" required>
	    				</div>

	    				<div class="form-input">
    						<label>Phone<span class="red">*</span></label>
    						<input name="phone" type="text" required>
    					</div>

						<div class="form-input">
    						<label>Email<span class="red">*</span></label>
    						<input name="email" value="<?php echo e(Auth::user()->email); ?>" type="email" required>
    					</div>

					</div>
					<div class="cell-6">
						

						<div class="panel panel-default contactus" style="margin-top: 22px;">
	                            <ul class="form-style-1">
	                                <li>
	                                    <h3 style="color: #777;">Delivery Time</h3>
	                                </li>
	                                
	                                <li>
	                                    <label>Minimum time for delivery is 45 minute &amp; 20 min for collection</label>
	                                    <label>
	                                    	<i class="fa fa-calendar" aria-hidden="true"></i> 
	                                    	<input type="text" id="datepicker" value="<?php echo e(date('D d M Y')); ?>" name="booking_date" size="12" style="display: inline; width: auto; float: none;"> 
	                                    	<i class="fa fa-clock-o" aria-hidden="true" style="margin-left: 20px;"></i> 
	                                    	<select id="booking_time" name="booking_time" style="display: inline; width: auto; float: none;">
	                                    		<option value="00:00">Select Time</option>
	                                    		<?php
	                                    	    $start=strtotime('00:00');
											    $end=strtotime('23:30');

											    for ($i=$start;$i<=$end;$i = $i + 15*60)
											    {
											     	echo date('g:i A',$i).'<br>';
											     	?>
											     	<option value="<?php echo e(date('g:i A',$i)); ?>"><?php echo e(date('g:i A',$i)); ?></option>
											     	<?php
											    }
											    ?>
	                                    	</select>
	                                    </label>
	                                </li>

	                                <li>
	                                	<label><input type="checkbox" id="asap" checked="checked" name="asap"  style="display: inline; width: auto; float: none;"> ASAP (As soon as possible) </label>
	                                </li>

	                                <li>
	                                    <h3 style="color: #777; margin-top: 30px;">Addition Information</h3>
	                                </li>

	                                <li>

	                                    <label>Order Notes</label>
	                                    <label>
	                                    	<textarea id="booking_note" name="booking_note" style="display: inline;  float: none; height: 60px; "></textarea>
	                                    </label>
	                                </li>

	                                <li>
	                                    
	                                </li>
	                                
	                            </ul>
	                    </div>

					</div>

				</form>
				
			</div>
			<div class="clearfix"></div>
			<div class="continue-btn">
				<a class="btn btn-medium main-bg right save-delivery-info" href="javascript:void(0);">			Continue
				</a>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('slider-js'); ?>
	<script type="text/javascript">
		$(document).ready(function(){

			//------------------------Ajax Customer Start-------------------------//
		         var AddDeliveryUrl="<?php echo e(url('order-item/add-to-cart/json')); ?>";
		         var data={'_token':"<?php echo e(csrf_token()); ?>"};
		         $.ajax({
		            'async': true,
		            'type': "GET",
		            'global': false,
		            'dataType': 'json',
		            'url': AddDeliveryUrl,
		            'data': data,
		            'success': function (data) {
		                console.log("Delivery JSON Address : "+data);
		                if(data.deliveryDetail)
		                {
		                	var obj=data.deliveryDetail;
		                	console.log(obj);
		                	$("input[name=name]").val(obj.name);
							$("input[name=phone]").val(obj.phone);
							$("input[name=address]").val(obj.address);
							$("input[name=email]").val(obj.email);
							$("input[name=zipcode]").val(obj.zipcode);
							if(obj.delivery_date!=null)
							{
								$("input[name=booking_date]").val(obj.delivery_date);
							}

							if(obj.delivery_note!=null)
							{
								$("#booking_note").val(obj.delivery_note);
							}
							
		                }
		                
		            }
		        });
		        //------------------------Ajax Customer End---------------------------//
		        


			$(".save-delivery-info").click(function(){
				var name=$("input[name=name]").val();
				var phone=$("input[name=phone]").val();
				var address=$("input[name=address]").val();
				var email=$("input[name=email]").val();
				var zipcode=$("input[name=zipcode]").val();

				var booking_date=$("input[name=booking_date]").val();
				var booking_time=$("select[name=booking_time]").val();
				var booking_note=$("textarea[name=booking_note]").val();
				
				if(name.length==0){ alert("Name should not be empty."); return false; }
				if(phone.length==0){ alert("Phone should not be empty."); return false; }
				if(address.length==0){ alert("Address should not be empty."); return false; }
				if(email.length==0){ alert("Email address should not be empty."); return false; }
				if(zipcode.length==0){ alert("Zipcode should not be empty."); return false; }


				
				var asap=0;
				if(document.getElementById('asap').checked==true)
				{
					asap=1;
				}

				console.log('asap',asap);

				if(asap==0)
				{
					if(booking_date.length==0)
					{
						alert("Please select booking date"); return false;
					}
					
					if(booking_time=='00:00')
					{
						alert("Please select booking time"); return false;
					}
				}

				//return false;

		        //------------------------Ajax Customer Start-------------------------//
		         var payment_method="<?php echo e(url('payment-method')); ?>";
		         var AddHowMowKhaoUrl="<?php echo e(url('add-to-cart/delivery-address')); ?>";
		         var data={'_token':"<?php echo e(csrf_token()); ?>",
		         'name':name,
		         'phone':phone,
		         'address':address,
		         'email':email,
		         'zipcode':zipcode,
		         'asap':asap,
		         'booking_date':booking_date,
		         'booking_time':booking_time,
		         'booking_note':booking_note
		     	};


		         $.ajax({
		            'async': true,
		            'type': "POST",
		            'global': false,
		            'dataType': 'json',
		            'url': AddHowMowKhaoUrl,
		            'data': data,
		            'success': function (data) {
		                console.log("Delivery Address : "+data);
		                if(data==1)
		                {
		                	window.location.href=payment_method;
		                }
		            }
		        });
		        //------------------------Ajax Customer End---------------------------//

			});
		});
	</script>

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
   


    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.animateNumber.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.easypiechart.min.js')); ?>"></script>

    <script src="<?php echo e(url('front-theme/js/sweetalert.min.js')); ?>"></script>
    <?php echo $__env->make('frontend.extra.cart-js', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php
$objSTD=new MenuPageController();
$Seo=$objSTD->Seo();
?>
@extends('frontend.layout.master')
@section('title','Proceed To Payment | ')
@section('seo')
    <meta name="description" content="{{$Seo->online_order_description}}">
    <meta name="keywords" content="{{$Seo->meta}}">
@endsection
@section('content')
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
						@if($rec=="Delivery")
	    					<div class="form-input">
	    						<label>Full Name<span class="red">*</span></label>
	    						<input name="name" value="{{Auth::user()->name}}" type="text" required>
	    					</div>
	    					
	    					<div class="form-input">
		    					<label>Address <span class="red">*</span></label>
		    					<input name="address" @if(!empty($delivery_info)) value="{{$delivery_info->address}}" @endif type="text" required>
		    				</div>

		    				<div class="form-input">
		    					<label>Zip Code <span class="red">*</span></label>
		    						<input name="zipcode" @if(!empty($delivery_info)) value="{{$delivery_info->zip_code}}" @endif  type="text" required>
		    						{{-- <code id="zipcodeMSG" style="background: #ccc; display: block; padding-left:5px; "> + Delivery Cost Will Be Differnt Based On Your Area Code / Zip Code</code> --}}
		    				</div>

		    				<div class="form-input">
	    						<label>Phone<span class="red">*</span></label>
	    						<input name="phone" @if(!empty($delivery_info)) value="{{$delivery_info->mobile_phone}}" @endif  type="text" required>
	    					</div>

							<div class="form-input">
	    						<label>Email<span class="red">*</span></label>
	    						<input name="email" value="{{Auth::user()->email}}" type="email" required>
	    					</div>
    					@else
    						<div class="form-input">
	    						<label>Full Name<span class="red">*</span></label>
	    						<input name="name" value="{{Auth::user()->name}}" type="text" required>
	    					</div>
	    					
	    					<div class="form-input">
	    						<label>Phone<span class="red">*</span></label>
	    						<input name="phone" @if(!empty($delivery_info)) value="{{$delivery_info->mobile_phone}}" @endif  type="text" required>
	    					</div>
		    				<input name="address" @if(!empty($delivery_info)) value="{{$delivery_info->address}}" @endif type="hidden">
		    				<input name="zipcode" @if(!empty($delivery_info)) value="{{$delivery_info->zip_code}}" @endif  type="hidden">
		    				<input name="email" value="{{Auth::user()->email}}" type="hidden">

		    				

	    					
    					@endif

					</div>
					<div class="cell-6">
						

						<div class="panel panel-default contactus" style="margin-top: 22px;">
	                            <ul class="form-style-1">
	                                <li>
	                                    <h3 style="color: #777;">
	                                    	@if($rec=="Delivery")
	                                    		Delivery Time
	                                    	@else
	                                    		Collection Time
	                                    	@endif
	                                    	{{-- Delivery/Collection Time --}}
	                                	</h3>
	                                </li>
	                                
	                                <li>

	                                	<label><input type="radio" checked="checked" name="timeopt" onclick="defineTimeinDelnCol()" id="timeopt_1" value="asap"> ASAP (As soon as possible)</label>
	                                	<label><input type="radio" name="timeopt" onclick="defineTimeinDelnCol()" id="timeopt_0" value="chooseTime"> Choose Your Time</label>
	                                	

	                                	<div style="display: none;" id="chooseTime">
		                                    <label>Minimum time for 
		                                    @if($rec=="Delivery")
	                                    		delivery is 45 minutes
	                                    	@else
	                                    		collection is 20 mins
	                                    	@endif
		                                    . It might takes more time on Friday & Saturday Nights </label>
		                                    <label>
		                                    	<i class="fa fa-calendar" aria-hidden="true"></i> 
		                                    	<input type="text" id="datepicker" value="{{date('D d M Y')}}" name="booking_date" size="12" style="display: inline; width: auto; float: none;"> 
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
												     	<option value="{{date('g:i A',$i)}}">{{date('g:i A',$i)}}</option>
												     	<?php
												    }
												    ?>
		                                    	</select>
		                                    </label>
	                                	</div>
	                                </li>

	                                <li>
	                                	<hr />
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
				<a class="btn btn-medium left" href="{{url('shopping-cart')}}">Back</a>
			</div>
		</div>
	</div>
	
</div>
@endsection
@section('css')
    <link rel="stylesheet" href="{{url('front-theme/css/custom.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/calendar/css/pikaday.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/calendar/timepicker.min.css')}}">
@endsection
@section('slider-js')
	<script type="text/javascript">
		function defineTimeinDelnCol(){
			$("#chooseTime").hide();
			var delncolTime=0;
			if($('#timeopt_0').is(':checked')) { delncolTime=1; }
			else if($('#timeopt_1').is(':checked')) { delncolTime=2; }

			if(delncolTime==1){ $("#chooseTime").show(); }
			else if(delncolTime==0){ $("#chooseTime").hide(); }
		}

		$(document).ready(function(){

			/*$("input").keyup(function(){
				 $("#zipcodeMSG").html(" + Loading Your Delivery Charge, Please Wait...!!!");
		         var AddDeliveryUrlZIP="{'order-item/zip-code-cart')}}";
		         var dataZIP={'_token':"csrf_token()}}",'zip_code':$(this).val()};
		         $.ajax({
		            'async': true,
		            'type': "POST",
		            'global': false,
		            'dataType': 'json',
		            'url': AddDeliveryUrlZIP,
		            'data': dataZIP,
		            'success': function (data) {
		                console.log("Delivery JSON Address : "+data);
		                var delivery_costHtml=" + Area Code Not Found.";
		                if(data.delivery_cost)
		                {
		                	delivery_costHtml=" + Your Delivery Charge = &#163;"+data.delivery_cost;
		                }
		                console.log(delivery_costHtml);
		                $("#zipcodeMSG").html(delivery_costHtml);

		            }
		        });
		        
			});*/

			//------------------------Ajax Customer Start-------------------------//
	         var AddDeliveryUrl="{{url('order-item/add-to-cart/json')}}";
	         var data={'_token':"{{csrf_token()}}"};
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
	                	var deliveryLEngth=obj.length;
	                	if(deliveryLEngth>0)
	                	{
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

				var asap=0;
				if($('#timeopt_0').is(':checked')) { asap=2; }
				else if($('#timeopt_1').is(':checked')) { asap=1; }
				
				if(name.length==0){ alert("Name should not be empty."); return false; }
				if(phone.length==0){ alert("Phone should not be empty."); return false; }
				if(address.length==0){ alert("Address should not be empty."); return false; }
				if(email.length==0){ alert("Email address should not be empty."); return false; }
				if(zipcode.length==0){ alert("Zipcode should not be empty."); return false; }
				if(asap==0){ alert("Please select {{$rec}} time."); return false; }

				if(asap==2){ 
					if(booking_date.length==0){ alert("Please select booking date"); return false; }
					if(booking_time=='00:00'){ alert("Please select booking time"); return false; }
				}

				//console.log(asap); return false;
				
				

				//return false;

		        //------------------------Ajax Customer Start-------------------------//
		         var payment_method="{{url('payment-method')}}";
		         var AddHowMowKhaoUrl="{{url('add-to-cart/delivery-address')}}";
		         var data={'_token':"{{csrf_token()}}",
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

    <script src="{{url('front-theme/calendar/pikaday.js')}}"></script>

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
   


    <script type="text/javascript" src="{{url('front-theme/js/jquery.animateNumber.min.js')}}"></script>
    <script type="text/javascript" src="{{url('front-theme/js/jquery.easypiechart.min.js')}}"></script>

    <script src="{{url('front-theme/js/sweetalert.min.js')}}"></script>
    @include('frontend.extra.cart-js')
@endsection


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
					<li><span>2 - Delivery Address</span></li>
					<li><span>3 - Payment Method</span></li>
					<li class="selected"><span>4 - Complete Payment</span></li>
				</ul>
			</div>
			<style type="text/css">
				.success {
				border: 1px solid;
				margin: 10px 0px;
				padding:15px 10px 15px 50px;
				background-repeat: no-repeat;
				background-position: 10px center;
				}
				.success {
				color: #4F8A10;
				background-color: #DFF2BF;
				background-image:url({{url('image-message/success.png')}});
				}
			</style>
			<div class="row">
				
					<div class="cell-4"></div>
					<div class="cell-4">
			
	                        
							@if (session('status'))
							<div class="success">{{ session('status') }}</div>
							@endif


							<div class="row" style="text-align: center;">
								<a href="{{url('order-item')}}" class="btn btn-info">Continue Order</a>
								<a href="{{url('user/order/all')}}" class="btn btn-success">My Order</a>
								<a href="{{url('user/dashboard')}}" class="btn btn-danger">Dashboard</a>
							</div>

	                </div>



				
			</div>
			<div class="clearfix"></div>

		</div>
	</div>
	
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="{{url('front-theme/css/custom.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/calendar/css/pikaday.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/calendar/timepicker.min.css')}}">
    <script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('slider-js')
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
    <script src="{{url('front-theme/calendar/timepicker.min.js')}}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function (event)
        {
            timepicker.load({
                interval: 15,
                defaultHour: 8
            });
        });
    </script>
@endsection


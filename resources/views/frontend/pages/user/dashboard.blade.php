@extends('frontend.layout.master')
@section('title','User Dashboard | ')
@section('content')
<div id="contentWrapper">

	<?php 
	$objSTD=new MenuPageController();
	$Seo=$objSTD->Seo();

	?>
	<div class="sectionWrapper img-pattern">
		<div class="container">
			<div class="row">
				    		<aside class="cell-3 right-sidebar">
								@include('frontend.extra.user-menu')
							</aside>
				    		<div class="cell-9">
								 <div class="blog-posts">
			                		<div class="post-item fx" data-animate="fadeInLeft">
									    <article class="post-content">
											<blockquote style="border: 2px #e7512f solid;">
												<span>Welcome to {{$Seo->name}}</span> 
												<span style="float: right;"><a href="{{url('user/edit/profile')}}"><i class="fa fa-user"></i> Edit Profile</a></span>
											</blockquote>
												<div class="row" style="padding-top: 20px;">
													<div class="cell-3 service-box-2 fx animated fadeInDown" data-animate="fadeInDown">
														<div class="box-2-cont">
															<i class="fa fa-shopping-cart"></i>
															<h4>All Order</h4>
															<span class="main-color">Total {{$totalorder}} </span>
															<a class="r-more main-color" href="{{url('user/order/all')}}">View Order </a>
														</div>
													</div>
													<div class="cell-3 service-box-2 fx animated fadeInDown" data-animate="fadeInDown" data-animation-delay="200" style="animation-delay: 200ms;">
														<div class="box-2-cont">
															<i class="fa fa-credit-card"></i>
															<h4>Paid Order</h4>
															<span class="main-color">Total {{$paidtotalorder}} </span>
															<a class="r-more main-color" href="{{url('user/order/paid')}}">View Order </a>
														</div>
													</div>
													<div class="cell-3 service-box-2 fx animated fadeInDown" data-animate="fadeInDown" data-animation-delay="400" style="animation-delay: 400ms;">
														<div class="box-2-cont">
															<i class="fa fa-clone"></i>
															<h4>Pending Order</h4>
															<span class="main-color">Total {{$pendingtotalorder}} </span>
															<a class="r-more main-color" href="{{url('user/order/pending')}}">View Order </a>
														</div>
													</div>
													<div class="cell-3 service-box-2 fx animated fadeInDown" data-animate="fadeInDown" data-animation-delay="600" style="animation-delay: 600ms;">
														<div class="box-2-cont">
															<i class="fa fa-briefcase"></i>
															<h4>Rejected Order</h4>
															<span class="main-color">Total {{$rejecttotalorder}} </span>
															<a class="r-more main-color" href="{{url('user/order/rejected')}}">View Order </a>
														</div>
													</div>
												</div>
											
									    </article>
									</div><!-- .post-item end -->
									
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

    <link href="https://fonts.googleapis.com/css?family=PT+Sans:700" rel="stylesheet">
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


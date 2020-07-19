<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>EXCEPTION – Responsive Business HTML Template</title>
		<meta name="description" content="EXCEPTION – Responsive Business HTML Template">
		<meta name="author" content="EXCEPTION">
		
		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		
		<!-- Put favicon.ico and apple-touch-icon(s).png in the images folder -->
	    <link rel="shortcut icon" href="images/favicon.ico">
		    	
		<!-- CSS StyleSheets -->
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,700,800&amp;amp;subset=latin,latin-ext">
		<link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/animate.css">
		<link rel="stylesheet" href="css/prettyPhoto.css">
		<link rel="stylesheet" href="css/slick.css">
		<link rel="stylesheet" href="rs-plugin/css/settings.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/responsive.css">
		<!--[if lt IE 9]>
	    	<link rel="stylesheet" href="css/ie.css">
	    	<script type="text/javascript" src="js/html5.js"></script>
	    <![endif]-->

		
		<!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
		<link rel="stylesheet" href="css/skins/default.css">
	
	</head>
	<body>
	    
	    <!-- site preloader start -->
	    <div class="page-loader">
	    	<div class="loader-in"></div>
	    </div>
	    <!-- site preloader end -->
	    
	    <div class="pageWrapper">
		    
		    <!-- login box start -->
            <?php include_once './include/login.php';?>
            <!-- login box End -->

            <!-- Header Start -->
            <div id="headWrapper" class="clearfix">

                <!-- top bar start -->
                <?php include('include/top_bar.php'); ?>
                <!-- top bar end -->

                <?php include('include/logo_menu.php'); ?>
            </div>
            <!-- Header End -->
			
			<!-- Content Start -->
			<div id="contentWrapper">
				<div class="page-title title-1">
					<div class="container">
						<div class="row">
							<div class="cell-12">
								<h1 class="fx" data-animate="fadeInLeft">Check <span>out</span></h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Shop </a><span class="line-separate">/</span><span>Check out</span>
								</div>
								<div class="cart-icon fx" data-animate="fadeInRight">
									<div class="cart-heading">
										<i class="fa fa-shopping-cart"></i><span id="cart-count"><b>0</b> item(s)</span>
									</div>
									<div class="cart-popup">
										<div class="empty">Your shopping cart is empty!</div>
										<div class="mini-cart">
											<ul class="mini-cart-list">
												<li>
													<a class="cart-mini-lft" href="product.php"><img src="images/shop/pro-1.jpg" alt=""></a>
													<div class="cart-body">
														<a href="product.php">Ultimate Fashion Wear White</a>
														<div class="price">$150</div>
													</div>
													<a class="remove" href="#"><i class="fa fa-times" title="Remove"></i></a>
												</li>
												<li>
													<a class="cart-mini-lft" href="product.php"><img src="images/shop/pro-2.jpg" alt=""></a>
													<div class="cart-body">
														<a href="product.php">Fashion Wear White</a>
														<div class="price">$50</div>
													</div>
													<a class="remove" href="#"><i class="fa fa-times" title="Remove"></i></a>
												</li>
												<li>
													<a class="cart-mini-lft" href="product.php"><img src="images/shop/pro-3.jpg" alt=""></a>
													<div class="cart-body">
														<a href="product.php">Ultimate Fashion</a>
														<div class="price">$220</div>
													</div>
													<a class="remove" href="#"><i class="fa fa-times" title="Remove"></i></a>
												</li>
											</ul>
											<div class="mini-cart-total">
												<div class="clearfix">
													<div class="left">Sub-Total:</div>
													<div class="right">$230.00</div>
												</div>
												<div class="clearfix">
													<div class="left">Tax (-10.00):</div>
													<div class="right">$12.05</div>
												</div>
												<div class="clearfix">
												</div>
												<div class="clearfix">
													<div class="left">Total:</div>
													<div class="right">$200.20</div>
												</div>
											</div>
											<div class="checkout">
												<a class="btn" href="cart.php">View Cart</a><a class="btn" href="check-out.php">Checkout</a>
											</div>
										</div>
									</div>
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
								<li><span>2 - Shipping Address</span></li>
								<li class="selected"><span>3 - Payment Method</span></li>
								<li><span>4 - Confirm Payment</span></li>
							</ul>
						</div>
						<div class="padd-vertical-20">
							<h2 class="block-head">Credit Card</h2>
				    		<p class="hint hintMargin">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget lacus sit amet neque posuere aliquet consectetur adipiscing elit. Phasellus eget lacus sit amet neque posuere aliquet consectetur adipiscing elit. Phasellus eget lacus sit amet neque posuere aliquet consectetur adipiscing elit. Phasellus eget lacus sit amet neque posuere aliquet. </p>
							<p class="bold">Please fill the form below:</p>
							<div class="cell-6">
								<div class="row">
									<form action="#" id="reg_form" class="contact-form">
				    					<div class="form-input">
				    						<label>First name<span class="red">*</span></label><input type="text" required>
				    					</div>
				    					<div class="form-input">
				    						<label>Last name<span class="red">*</span></label><input type="text" required>
				    					</div>
				    					<div class="form-input">
				    						<label>Card Number<span class="red">*</span></label><span class="left small-txt-box marginRight"><input type="text" required></span><span class="left small-txt-box marginRight"><input type="text" required></span><span class="left small-txt-box marginRight"><input type="text" required></span>
				    					</div>
				    					<div class="form-input">
				    						<label>Expiration date<span class="red">*</span></label><span class="left small-txt-box marginRight"><input type="text" placeholder="MM" required></span><span class="left small-txt-box marginRight"><input type="text" placeholder="YY" required></span>
				    					</div>
				    					<div class="form-input">
				    						<label>CSV<span class="red">*</span></label><span class="left small-txt-box"><input type="text" required></span>
				    					</div>
				    				</form>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="padd-vertical-20">
							<h2 class="block-head">Via PayPal</h2>
				    		<p class="hint">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget lacus sit amet neque posuere aliquet. </p>
				    		
						</div>
						<div class="clearfix"></div>
						<div class="continue-btn">
							<a class="btn btn-medium main-bg right" href="check-out-step4.php">Continue</a>
							<a class="btn btn-medium left" href="check-out-step2.php">Back</a>
						</div>
					</div>
				</div>
				
			</div>
			<!-- Content End -->
			
			<!-- Footer start -->
		     <?php include_once('include/footer.php');?>
		    <!-- Footer end -->
		    
		    <!-- Back to top Link -->
	    	<div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
	    	
	    </div>


	    <!-- Load JS siles -->	
		<script type="text/javascript" src="js/jquery.min.js"></script>
	    
	    <!-- Waypoints script -->
		<script type="text/javascript" src="js/waypoints.min.js"></script>
		
		<!-- SLIDER REVOLUTION SCRIPTS  -->
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		
		<!-- Animate numbers increment -->
		<script type="text/javascript" src="js/jquery.animateNumber.min.js"></script>
		
		<!-- slick slider carousel -->
		<script type="text/javascript" src="js/slick.min.js"></script>
		
		<!-- Animate numbers increment -->
		<script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
		
		<!-- PrettyPhoto script -->
		<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
		
		<!-- Share post plugin script -->
		<script type="text/javascript" src="js/jquery.sharrre.min.js"></script>
		
		<!-- Product images zoom plugin -->
		<script type="text/javascript" src="js/jquery.elevateZoom-3.0.8.min.js"></script>
		
		<!-- Input placeholder plugin -->
		<script type="text/javascript" src="js/jquery.placeholder.js"></script>
		
		<!-- Tweeter API plugin -->
		<script type="text/javascript" src="js/twitterfeed.js"></script>
		
		<!-- Flickr API plugin -->
		<script type="text/javascript" src="js/jflickrfeed.min.js"></script>

		<!-- MailChimp plugin -->
		<script type="text/javascript" src="js/mailChimp.js"></script>
		
		<!-- NiceScroll plugin -->
		<script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
		
		<!-- general script file -->
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>
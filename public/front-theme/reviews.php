﻿<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Review | Bombay Cottage</title>
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
        <link rel="stylesheet" href="css/custom/slick_ffs.css">
        <!--<link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">-->
    </head>
    <body>

        <!-- site preloader start -->
        <div class="page-loader">
            <div class="loader-in"></div>
        </div>
        <!-- site preloader end -->

        <div class="pageWrapper">

            <!-- login box start -->
            <?php include_once './include/login.php'; ?>
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
                                <h1 class="fx" data-animate="fadeInLeft">We love  <span>feedback</span></h1>
                                <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                    <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><span>feedback</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="cell-3"></div>
                            <div class="cell-7">
                                <section id="slick">
                                    <!-- Feedback form -->
                                    <div class="feedback-form">
                                        <!-- Title -->
                                        <div class="title">We love feedback</div> 
                                        <!-- Intro text -->
                                        <p class="intro"><b>Good support is the king.</b> Please send us your feedback or suggestions, so we can make better experience for you.</p>
                                        <form action="" name="feedback" id="feedback" method="post">
                                            <!-- Name input -->
                                            <div class="field">
                                                <input name="name" placeholder="Your name" type="text" id="name" required="">
                                                <span class="entypo-user icon"></span>
                                                <span class="slick-tip left">Enter your name</span>
                                            </div>
                                            <!-- Email input -->
                                            <div class="field">
                                                <input name="email" placeholder="modelrestaurant@gmail.com" type="email" id="email" required="">
                                                <span class="entypo-mail icon"></span>
                                                <span class="slick-tip left">Enter your email</span>	
                                            </div>
                                            <!-- Subject input -->
                                            <div class="field">
                                                <select name="subject" id="subject" class="" onclick="this.className = this.options[this.selectedIndex].className">
                                                    <option value="" disabled="disabled" selected="selected" class="disabled">Subject</option>
                                                    <option value="Positive feedback">1. Positive feedback</option>
                                                    <option value="Negative feedback">2. Negative feedback</option>
                                                    <option value="Suggestions">3. Suggestions</option>
                                                </select>
                                                <div id="arrow-select"></div>
                                                <svg id="arrow-select-svg"></svg>
                                                <span class="entypo-book icon"></span>
                                                <span class="slick-tip left">Choose subject</span>
                                            </div>
                                            <!-- Message input -->
                                            <div class="field">
                                                <textarea name="message" placeholder="Feedback" id="message" required=""></textarea>
                                                <span class="entypo-comment icon"></span>
                                                <span class="slick-tip left">Your feedback</span>
                                            </div>
                                            <!-- Block checboxes -->
                                            <div class="field">
                                                <p class="ratings"><span class="entypo-info-circled"></span>Please provide us your age</p>
                                                <fieldset class="blocks" id="age">
                                                    <!-- 18 - 25 -->
                                                    <input type="radio" id="age-1" name="age" value="18 - 25">
                                                    <label for="age-1">18 - 25</label>
                                                    <!-- 25 - 35 -->
                                                    <input type="radio" id="age-2" name="age" value="25 - 35">
                                                    <label for="age-2">25 - 35</label>
                                                    <!-- 35 - 45 -->
                                                    <input type="radio" id="age-3" name="age" value="35 - 45">
                                                    <label for="age-3">35 - 45</label>
                                                    <!-- 45 - 60 -->
                                                    <input type="radio" id="age-4" name="age" value="45 - 60">
                                                    <label for="age-4">45 - 60</label>
                                                    <!-- 65 - 75 -->
                                                    <input type="radio" id="age-5" name="age" value="60 - 75">
                                                    <label for="age-5">60 - 75</label>
                                                    <!-- 75 - 90 -->
                                                    <input type="radio" id="age-6" name="age" value="75 - 90">
                                                    <label for="age-6">75 - 90</label>
                                                </fieldset>
                                            </div>
                                            <div class="clrfx mt-10 mb-20 bt"></div>
                                            <!-- Stars rating 1 -->
                                            <div class="field">
                                                <p class="ratings"><span class="entypo-briefcase"></span>Our services &amp; customer care</p>
                                                <fieldset class="stars" id="service-rating">
                                                    <!-- 5 stars -->
                                                    <input type="radio" id="service-5" name="service-rating" value="5">
                                                    <label for="service-5"><span class="slick-tip rate">Awesome</span></label>
                                                    <!-- 4 stars -->
                                                    <input type="radio" id="service-4" name="service-rating" value="4">
                                                    <label for="service-4"><span class="slick-tip rate">Pretty satisfied</span></label>
                                                    <!-- 3 stars -->
                                                    <input type="radio" id="service-3" name="service-rating" value="3" checked="checked">
                                                    <label for="service-3"><span class="slick-tip rate">Not best, not worst</span></label>
                                                    <!-- 2 stars -->
                                                    <input type="radio" id="service-2" name="service-rating" value="2">
                                                    <label for="service-2"><span class="slick-tip rate">Room for improvement</span></label>
                                                    <!-- 1 star -->
                                                    <input type="radio" id="service-1" name="service-rating" value="1">
                                                    <label for="service-1"><span class="slick-tip rate">Not so good</span></label>
                                                </fieldset>
                                            </div>
                                            <div class="clrfx mt-10"></div>
                                            <!-- Stars rating 2 -->
                                            <div class="field">
                                                <p class="ratings"><span class="entypo-chat"></span>After sale's support &amp; help</p>
                                                <fieldset class="stars" id="support-rating">
                                                    <!-- 5 stars -->
                                                    <input type="radio" id="support-5" name="support-rating" value="5">
                                                    <label for="support-5"><span class="slick-tip rate">Awesome</span></label>
                                                    <!-- 4 stars -->
                                                    <input type="radio" id="support-4" name="support-rating" value="4">
                                                    <label for="support-4"><span class="slick-tip rate">Pretty satisfied</span></label>
                                                    <!-- 3 stars -->
                                                    <input type="radio" id="support-3" name="support-rating" value="3" checked="checked">
                                                    <label for="support-3"><span class="slick-tip rate">Not best, not worst</span></label>
                                                    <!-- 2 stars -->
                                                    <input type="radio" id="support-2" name="support-rating" value="2">
                                                    <label for="support-2"><span class="slick-tip rate">Room for improvement</span></label>
                                                    <!-- 1 star -->
                                                    <input type="radio" id="support-1" name="support-rating" value="1">
                                                    <label for="support-1"><span class="slick-tip rate">Not so good</span></label>
                                                </fieldset>
                                            </div>
                                            <div class="clrfx mt-10"></div>
                                            <!-- Stars rating 3 -->
                                            <div class="field">
                                                <p class="ratings"><span class="entypo-users"></span>Our team &amp; staff valuation</p>
                                                <fieldset class="stars" id="team-rating">
                                                    <!-- 5 stars -->
                                                    <input type="radio" id="team-5" name="team-rating" value="5">
                                                    <label for="team-5"><span class="slick-tip rate">Awesome</span></label>
                                                    <!-- 4 stars -->
                                                    <input type="radio" id="team-4" name="team-rating" value="4">
                                                    <label for="team-4"><span class="slick-tip rate">Pretty satisfied</span></label>
                                                    <!-- 3 stars -->
                                                    <input type="radio" id="team-3" name="team-rating" value="3" checked="checked">
                                                    <label for="team-3"><span class="slick-tip rate">Not best, not worst</span></label>
                                                    <!-- 2 stars -->
                                                    <input type="radio" id="team-2" name="team-rating" value="2">
                                                    <label for="team-2"><span class="slick-tip rate">Room for improvement</span></label>
                                                    <!-- 1 star -->
                                                    <input type="radio" id="team-1" name="team-rating" value="1">
                                                    <label for="team-1"><span class="slick-tip rate">Not so good</span></label>
                                                </fieldset>
                                            </div>
                                            <div class="clrfx mt-10 mb-20 bt"></div>
                                            <!-- Tick checboxes -->
                                            <div class="field">
                                                <p class="ratings"><span class="entypo-link"></span>How can we improve your satisfaction?</p>
                                                <div class="clrfx mt-20"></div>
                                                <!-- Option 1 -->
                                                <div class="w-30 mr-5">
                                                    <input type="checkbox" id="new-services" name="new-services">
                                                    <label for="new-services" class="tick"><span>New services</span></label>
                                                </div>
                                                <!-- Option 2 -->
                                                <div class="w-30 mr-5">
                                                    <input type="checkbox" id="better-support" name="better-support">
                                                    <label for="better-support" class="tick"><span>Better support</span></label>
                                                </div>
                                                <!-- Option 3 -->
                                                <div class="w-30">
                                                    <input type="checkbox" id="faster-response" name="faster-response">
                                                    <label for="faster-response" class="tick"><span>Faster response</span></label>
                                                </div>
                                                <div class="clrfx mt-10"></div>
                                                <!-- Option 4 -->
                                                <div class="w-30 mr-5">
                                                    <input type="checkbox" id="performance" name="performance">
                                                    <label for="performance" class="tick"><span>Performance</span></label>
                                                </div>
                                                <!-- Option 5 -->
                                                <div class="w-30 mr-5">
                                                    <input type="checkbox" id="new-products" name="new-products">
                                                    <label for="new-products" class="tick"><span>New products</span></label>
                                                </div>
                                                <!-- Option 6 -->
                                                <div class="w-30">
                                                    <input type="checkbox" id="more-updates" name="more-updates">
                                                    <label for="more-updates" class="tick"><span>More updates</span></label>
                                                </div>
                                            </div>
                                            <div class="clrfx mt-20"></div>
                                            <!-- Terms and Conditions link -->
                                            <div class="terms w-47"> ***Your information won’t be disclosed. <br><a href="#terms-popup"></a>.</div>                           <input type="hidden" name="confirm_reservation" value="confirm_reservation">
                                            <input type="submit" value="Send" class="send" form="feedback" name="send">
                                        </form>
                                        <!-- / Form fields -->
                                    </div>
                                    <!-- / Feedback form -->
                                    <!-- Terms and conditions -->
                                    <div id="terms-popup" class="terms-window">
                                        <a href="#close" class="close-overlay"></a>
                                        <div>
                                            <a href="#close" class="close entypo-cancel-circled"></a>
                                            <div class="title">Terms &amp; Conditions</div>
                                            <p class="intro"><b>1. Lorem ipsum</b><br>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.<br>
                                                Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.	Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                            <p class="intro"><b>2. Dolor commodo</b><br>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.	Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                            <p class="intro"><b>3. Sit amet</b><br>
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.<br>
                                                Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
                                        </div>
                                    </div>
                                    <!-- / Terms and conditions -->
                                </section>
                            </div>



                        </div>
                    </div>
                </div>

            </div>
            <!-- Content End -->

            <!-- Footer start -->
            <?php include_once './include/footer.php'; ?>
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
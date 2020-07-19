<?php
session_start();
include("php/captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>
﻿<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Table Booking | Bombay Cottage</title>
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
        <link rel="stylesheet" href="css/custom.css">	
        <link rel="stylesheet" href="calendar/css/pikaday.css">
        <link rel="stylesheet" href="calendar/timepicker.min.css">
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
                                <h1 class="fx" data-animate="fadeInLeft">Table <span>Booking</span></h1>
                                <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                    <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><span>Reservation</span>
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
                                <div class="panel panel-default contactus">
                                    <div class="panel-heading clearfix">
                                        <h3 class="panel-title uppercase" >Reservation</h3>
                                    </div>
                                    <form>
                                        <ul class="form-style-1">
                                            <li>
                                                <label>Full Name <span class="required">*</span></label>
                                                <input type="text" name="fname" class="field-divided" placeholder="First" />&nbsp;<input type="text" name="lname" class="field-divided" placeholder="Last" />
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
                                                <input type="text" name="Number_of_person" class="field-long" />
                                            </li>
                                            <li>
                                                <label>Reservation Date <span class="required">*</span></label>
    <!--                                            <input type="text" name="phone" id="departing" class="field-long" />-->
                                                <input type="text" id="datepicker" >
                                            </li>
                                            <li>
                                                <label>Reservation Time <span class="required">*</span></label>
                                                <!--<input type="text" name="phone" id="dateapicker" class="field-long" />-->
                                                <input type="text" name="timepicker" data-toggle="timepicker">
                                            </li>
                                            <li>
                                                <label>Your Message <span class="required">*</span></label>
                                                <textarea name="field5" id="field5" class="field-long field-textarea"></textarea>
                                            </li>
                                            <li>
                                                <img alt="captcha image" src="<?php echo $_SESSION['captcha']['image_src']; ?>" id='captchaimg'height="200" >
                                                <input type="hidden" id="hidCap" value="<?php echo $_SESSION['captcha']['code']; ?>" data-error="The captcha code does not match!" />
                                                <input id="captcha_input" name="captcha_input" type="text" required="required">
                                                
                                            </li>
                                            <li>
                                                <input type="submit" value="Submit" />
                                            </li>
                                        </ul>
                                    </form>
                                </div>
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

        
        
        <script src="calendar/pikaday.js"></script>

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
        <script src="calendar/timepicker.min.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function (event)
            {
                timepicker.load({
                    interval: 15,
                    defaultHour: 8
                });
            });
        </script>
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
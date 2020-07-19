<?php
session_start();
include("php/captcha.php");
$_SESSION['captcha'] = simple_php_captcha();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Contact Us | Bombay Cottage</title>
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
        <link rel="stylesheet" id="MainStyle" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">
        <!--[if lt IE 9]>
        <link rel="stylesheet" href="css/ie.css">
        <script type="text/javascript" src="js/html5.js"></script>
    <![endif]-->


        <!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
        <link rel="stylesheet" id="skinCSS" href="css/skins/default.css">
        <link rel="stylesheet" id="skinCSS" href="css/custom.css">

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
                                <h1 class="fx" data-animate="fadeInLeft">Contact <span>us</span></h1>
                                <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                    <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><span>Contact us</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="padd-top-50">
                    <div class="container">
                        <div class="row">
                            <div class="cell-6 contact-detalis fx" data-animate="fadeInLeft" id="contact">
                                <hr class="hr-style4">
                                <div class="clearfix"></div>
                                <div class="padding-vertical">
                                    <div class="cell-5 fx" data-animate="fadeInRight">
                                        <h4 class="main-color bold">Office: USA</h4>
                                        <h5 >Address:</h5>
                                        <p>123, Second Sunrise Avenue New York,USA</p>
                                        <h5 >Email:</h5>
                                        <p>info@it-rays.com</p>
                                        <h5 >Phone:</h5>
                                        <p>+2 012 000 0000</p>
                                        <h5 >FAX:</h5>
                                        <p>+2 012 000 0001</p>
                                    </div>
                                    <div class="cell-2"><br></div>
                                    <div class="cell-5 fx" data-animate="fadeInRight">
                                        <h4 class="main-color bold">Office: Australia</h4>
                                        <h5 >Address:</h5>
                                        <p>123, Second Sunrise Avenue New York,USA</p>
                                        <h5 >Email:</h5>
                                        <p>info@it-rays.com</p>
                                        <h5 >Phone:</h5>
                                        <p>+2 012 000 0000</p>
                                        <h5 >FAX:</h5>
                                        <p>+2 012 000 0001</p>
                                    </div>
                                </div>
                                <h3 class="block-head">Download Our Apps</h3>
                                <!-- <p class="fx" data-animate="fadeInRight">Lorem ipsum dolor sit amet, onsectetuer dipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat dipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat dipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat.Lorem ipsum dolor sit amet, onsectetuer dipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet.</p> -->
                                <div class="contactimg">
                                <img src="images/apps/Android-app-store.png" alt="Android-app-store" />
                                <img src="images/apps/Available-on-the-app-store-badge.png" alt="ios-app-store" style="margin-top: 10px;" />
                            </div>
                                
                            </div>
                            <div class="cell-6 contact-form">
                                
                                <h3 class="block-head">Get in Touch</h3>
                                <mark id="message"></mark>
                                <form class="form-signin cform" method="post" action="php/contact.php" id="cform" autocomplete="on">
                                    <div class="form-input">
                                        <label>First name<span class="red">*</span></label>
                                        <input type="text" name="name" id="name" required="required">
                                    </div>
                                    <div class="form-input">
                                        <label>Email<span class="red">*</span></label>
                                        <input name="email" type="email" id="email" required="required">
                                    </div>
                                    <div class="form-input">
                                        <label>Phone</label>
                                        <input name="phone" type="text" id="phone">                                     
                                    </div>
                                    <div class="form-input">
                                        <label>Message<span class="red">*</span></label>
                                        <textarea name="message" cols="40" rows="7" id="messageTxt" spellcheck="true" required="required"></textarea>
                                    </div>
                                    <div  class="form-input">
                                        <div class="row">
                                            <div class="cell-12 margin-bottom-20"><img alt="" src="<?php echo $_SESSION['captcha']['image_src']; ?>" id='captchaimg' ></div>
                                            <input type="hidden" id="hidCap" value="<?php echo $_SESSION['captcha']['code']; ?>" data-error="The captcha code does not match!" />
                                            <div class="cell-3"><input id="captcha_input" name="captcha_input" type="text" required="required"></div>
                                            <div class="cell-6"><label for='message'>Enter the code above :</label></div>
                                        </div>
                                    </div>
                                    <div class="form-input">
                                        <input id="submit" name="submit" type="submit" class="btn btn-large main-bg" value="Submit">&nbsp;&nbsp;<input type="reset" class="btn btn-large" value="Reset" id="reset">
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="padd-vertical-45">
                    <div class="container">
                        <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
                        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3sTtUWQc2-EbWu-xD9vFw2w_W2VOFuPk&callback=initMap" type="text/javascript"></script>
                        <div id="map_canvas" style="height: 450px; width: 100%;">
                            <script type="text/javascript">
                                function init_map() {
                                    var myOptions = {zoom: 14, center: new google.maps.LatLng(52.652964,-0.485109),
                                        mapTypeId: google.maps.MapTypeId.ROADMAP};
                                    map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                                    marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(52.652964,-0.485109)});
                                    infowindow = new google.maps.InfoWindow({content: "<div class='noScroll'><b>Bombay Cottage</b><br/> Indian dining in a <br/> wood-beamed property</div>"});
                                    google.maps.event.addListener(marker, "click", function () {
                                        infowindow.open(map, marker);
                                    });
                                    infowindow.open(map, marker);
                                }
                                google.maps.event.addDomListener(window, 'load', init_map);
                            </script>
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

            <div class="ModalPopUp">
                <div class="ModalContainer">
                    <div class="Modalheader">
                        <h3></h3>
                        <a href="#" class="closePopup"><span class="fa fa-times"></span></a>
                    </div>
                    <div class="ModalContent">
                    </div>
                </div>
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

            <!-- Contact us js file -->
            <script type="text/javascript" src="js/contact.js"></script>

            <!-- Tweeter API plugin -->
            <script type="text/javascript" src="js/twitterfeed.js"></script>

            <!-- Tweeter API plugin -->
            <script type="text/javascript" src="js/jflickrfeed.min.js"></script>

            <!-- NiceScroll plugin -->
            <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>

            <!-- MailChimp plugin -->
            <script type="text/javascript" src="js/mailChimp.js"></script>

            <!-- general script file -->
            <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Login | Bombay Cottage</title>
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
        <link rel="stylesheet" href="css/custom/main.css">
        <link rel="stylesheet" href="css/custom/util.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
            
            <div class="limiter">
        <div class="container-login100 p-t-70 p-b-50" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form">
                    <span class="login100-form-title p-b-49">
                        Login
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <div class="flex-c-m">
                            <div class="socialicon">
                                <div class="cell-6">
                                    <a class="btn btn-social btn-facebook">
                                        <i class="fa fa-facebook"></i> Facebook Login
                                      </a>
                                </div>
                                <div class="cell-6">
                                    <a class="btn right btn-social btn-google-plus">
                                    <i class="fa fa-google-plus"></i> Google Login
                                  </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Username</span>
                        <input class="input100" type="text" name="username" placeholder="Type your username">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="pass" placeholder="Type your password">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="#">
                            Forgot password?
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-30 p-b-20">
                        <span>
                            Or Sign Up Using
                        </span>
                    </div>

                    

                    <div class="flex-col-c p-t-30">
                        <span class="txt1 p-b-17">
                            Or Sign Up Using
                        </span>

                        <a class="btn btn-md btn-skew" href="#">
                            <span><i class="fa fa-bicycle selectedI"></i>Sign Up</span>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

            <!-- Content End -->

            <!-- Footer start -->
            <?php include_once './include/footer.php'; ?>
            <!-- Footer end -->
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
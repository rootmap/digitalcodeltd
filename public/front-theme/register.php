﻿<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Register | Bombay Cottage</title>
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
                                <h1 class="fx" data-animate="fadeInLeft">Create <span>Account</span></h1>
                                <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                    <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><span>Create account</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="cell-7 contact-form fx" data-animate="fadeInLeft">
                                <h3 class="block-head">Registration Form</h3>
                                <form action="#" id="reg_form">
                                    <div class="form-input">
                                        <label>First name<span class="red">*</span></label><input type="text" required>
                                    </div>
                                    <div class="form-input">
                                        <label>Last name<span class="red">*</span></label><input type="text" required>
                                    </div>
                                    <div class="form-input">
                                        <label>Password<span class="red">*</span></label><input type="password" required>
                                    </div>
                                    <div class="form-input">
                                        <label>Confirm Password<span class="red">*</span></label><input type="password" required>
                                    </div>
                                    <div class="form-input">
                                        <label>Email<span class="red">*</span></label><input type="email" required>
                                    </div>
                                    <div class="form-input">
                                        <label>Confirm Email<span class="red">*</span></label><input type="email" required>
                                    </div>
                                    <div class="form-input">
                                        <label>Country<span class="red">*</span></label>
                                        <select required>
                                            <option selected="" value="">Please select a country</option>  
                                            <option value="AF">Australia</option>  
                                            <option value="AL">Canada</option>
                                            <option value="EG">Egypt</option>
                                            <option value="AS">Russia</option>
                                            <option value="AD">USA</option>
                                        </select>
                                    </div>
                                    <div class="form-input">
                                        <label>Birth date<span class="red">*</span></label>
                                        <select name="birthday_day" required class="small-select">
                                            <option value="-1">Day</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                            <option value="9">9</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                            <option value="13">13</option>
                                            <option value="14">14</option>
                                            <option value="15">15</option>
                                            <option value="16">16</option>
                                            <option value="17">17</option>
                                            <option value="18">18</option>
                                            <option value="19">19</option>
                                            <option value="20">20</option>
                                            <option value="21">21</option>
                                            <option value="22">22</option>
                                            <option value="23">23</option>
                                            <option value="24">24</option>
                                            <option value="25">25</option>
                                            <option value="26">26</option>
                                            <option value="27">27</option>
                                            <option value="28">28</option>
                                            <option value="29">29</option>
                                            <option value="30">30</option>
                                            <option value="31">31</option>
                                        </select>

                                        <select id="birthday_month" required class="small-select">
                                            <option value="-1">Month</option>
                                            <option value="January">Jan</option>
                                            <option value="February">Feb</option>
                                            <option value="March">Mar</option>
                                            <option value="April">Apr</option>
                                            <option value="May">May</option>
                                            <option value="June">Jun</option>
                                            <option value="July">Jul</option>
                                            <option value="August">Aug</option>
                                            <option value="September">Sep</option>
                                            <option value="October">Oct</option>
                                            <option value="November">Nov</option>
                                            <option value="December">Dec</option>
                                        </select>

                                        <select name="birthday_year" required class="small-select">
                                            <option value="-1">Year</option>
                                            <option value="2012">2012</option>
                                            <option value="2011">2011</option>
                                            <option value="2010">2010</option>
                                            <option value="2009">2009</option>
                                            <option value="2008">2008</option>
                                            <option value="2007">2007</option>
                                            <option value="2006">2006</option>
                                            <option value="2005">2005</option>
                                            <option value="2004">2004</option>
                                            <option value="2003">2003</option>
                                            <option value="2002">2002</option>
                                            <option value="2001">2001</option>
                                            <option value="2000">2000</option>
                                            <option value="1999">1999</option>
                                            <option value="1998">1998</option>
                                            <option value="1997">1997</option>
                                            <option value="1996">1996</option>
                                            <option value="1995">1995</option>
                                            <option value="1994">1994</option>
                                            <option value="1993">1993</option>
                                            <option value="1992">1992</option>
                                            <option value="1991">1991</option>
                                            <option value="1990">1990</option>
                                            <option value="1989">1989</option>
                                            <option value="1988">1988</option>
                                            <option value="1987">1987</option>
                                            <option value="1986">1986</option>
                                            <option value="1985">1985</option>
                                            <option value="1984">1984</option>
                                            <option value="1983">1983</option>
                                            <option value="1982">1982</option>
                                            <option value="1981">1981</option>
                                            <option value="1980">1980</option>
                                        </select>
                                    </div>
                                    <div class="form-input">
                                        <label>Gender</label>
                                        <div class="form-box">
                                            <input type="radio" name="Gender" value="Male" /> <span>Male</span>
                                            <input type="radio" name="Gender" value="Female" /> <span>Female</span>
                                        </div>
                                    </div>
                                    <div class="form-input">
                                        <label>Skills</label>
                                        <div class="form-box">
                                            <div>
                                                <input type="checkbox" name="Hobby_Drawing" value="Drawing" /> <span>Design</span>
                                                <input type="checkbox" name="Hobby_Singing" value="Singing" /> <span>Development</span>
                                                <input type="checkbox" name="Hobby_Dancing" value="Dancing" /> <span>Analysis</span>
                                                <input type="checkbox" name="Hobby_Cooking" value="Cooking" /> <span>Sales</span>
                                                <input type="checkbox" name="Hobby_Other" value="Other"> <span>Engineering</span>
                                            </div>
                                            <div>
                                                <input type="checkbox" name="Hobby_Drawing" value="Drawing" /> <span>SEO managment</span>
                                                <input type="checkbox" name="Hobby_Singing" value="Singing" /> <span>Internet</span>
                                                <input type="checkbox" name="Hobby_Dancing" value="Dancing" /> <span>Sharepoint</span>
                                                <input type="checkbox" name="Hobby_Cooking" value="Cooking" /> <span>Software</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-input">
                                        <label>Description</label><textarea></textarea>
                                    </div>
                                    <div class="form-input">
                                        <input type="checkbox"> I have read and accept the terms of use!
                                    </div>
                                    <div class="form-input">
                                        <input type="submit" class="btn btn-large main-bg" value="Submit">&nbsp;&nbsp;<input type="reset" class="btn btn-large" value="Reset">
                                    </div>
                                </form>
                            </div>

                            <div class="cell-5 fx padd-top-35" data-animate="fadeInRight">
                                <div class="notices">
                                    <div class="box warning-box fx" data-animate="fadeInRight">
                                        <h3>You need to know:</h3>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.</p>
                                    </div>
                                    <p class="fx" data-animate="fadeInLeft">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.</p>
                                    <p class="fx" data-animate="fadeInRight">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.</p>
                                </div>
                                <ul id="accordion" class="accordion">
                                    <li>
                                        <h3 class="skew-25"><a href="#"><span class="skew25">How Can i register in the site ?</span></a></h3>
                                        <div class="accordion-panel active">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus eget lacus sit amet neque posuere aliquet. In interdum nisl sapien, vel dignissim nulla porta at. Sed accumsan nunc vitae mollis consequat. Morbi velit risus, ultrices vitae sodales ac, aliquam id eros.
                                            Vivamus sit amet odio pellentesque odio faucibus tristique. Morbi amet dapibus dolor diam viverra mi. Aenean porttitor.
                                            Vivamus sit amet odio pellentesque odio faucibus tristique. Morbi amet dapibus dolor diam viverra mi. Aenean porttitor, lectus at dapibus egestas.
                                        </div>
                                    </li>
                                    <li>
                                        <h3 class="skew-25"><a href="#"><span class="skew25">Can i change my profile ?</span></a></h3>
                                        <div class="accordion-panel">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.
                                            Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </li>
                                    <li>
                                        <h3 class="skew-25"><a href="#"><span class="skew25">How can i change my details ?</span></a></h3>
                                        <div class="accordion-panel">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui.
                                            Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </li>
                                    <li>
                                        <h3 class="skew-25"><a href="#"><span class="skew25">What is Exception policy ?</span></a></h3>
                                        <div class="accordion-panel">
                                            Pellentesque imperdiet purus quis metus imperdiet dui. Lorem ipsum dolor sit amet, consectetur adipiscing Pellentesque imperdiet purus quis metus imperdiet dui. Lorem ipsum dolor sit amet, consectetur adipiscing Pellentesque imperdiet purus quis metus imperdiet dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </li>
                                    <li>
                                        <h3 class="skew-25"><a href="#"><span class="skew25">What are the paymeny methods can i use ?</span></a></h3>
                                        <div class="accordion-panel">
                                            Pellentesque imperdiet purus quis metus imperdiet dui. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                        </div>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
            <!-- Content End -->

            <!-- Footer start -->
            <?php include_once './include/footer.php';?>
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
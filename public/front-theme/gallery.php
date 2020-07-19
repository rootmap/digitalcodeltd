<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Gallery | | Bombay Cottage</title>
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
                                <h1 class="fx" data-animate="fadeInLeft">BombayCottage <span>Gallery</span></h1>
                                <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                                    <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Page </a><span class="line-separate">/</span><span>Gallery</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sectionWrapper">
                    <div class="container">
                        <div class="portfolio-filterable">
                            <div class="row">
                                <div class="gry-bg skew-25">
                                    <span class="skew25 left filter-by">Filter by:</span>
                                    <ul id="filters">
                                        <li class="active"><a href="#" class="skew25 filter" data-filter="*">All</a></li>
                                        <li><a href="#" class="skew25 filter" data-filter=".design">Web Design</a></li>
                                        <li><a href="#" class="skew25 filter" data-filter=".develop">Web Development</a></li>
                                        <li><a href="#" class="skew25 filter" data-filter=".seo">SEO Management</a></li>
                                    </ul>
                                </div>
                                <div class="portfolio-items" id="container">
                                    <div class="cell-3 develop" data-category="develop">
                                        <div class="portfolio-item">
                                            <div class="img-holder">
                                                <div class="img-over">
                                                    <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                                    <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                                </div>
                                                <img alt="" src="images/portfolio/1.jpg">
                                            </div>
                                            <div class="name-holder">
                                                <a href="#" class="project-name">Project Title</a>
                                                <span class="project-options">Project Category</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell-3 develop seo" data-category="develop">
                                        <div class="portfolio-item">
                                            <div class="img-holder">
                                                <div class="gallery portfolio-img-slick">
                                                    <div>
                                                        <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                            <img src="images/portfolio/1.jpg" alt=""></a>
                                                    </div>
                                                    <div>
                                                        <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                            <img src="images/portfolio/1.jpg" alt=""></a>
                                                    </div>
                                                    <div>
                                                        <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                            <img src="images/portfolio/1.jpg" alt=""></a>
                                                    </div>
                                                    <div>
                                                        <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                            <img src="images/portfolio/1.jpg" alt=""></a>
                                                    </div>
                                                    <div>
                                                        <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                            <img src="images/portfolio/1.jpg" alt=""></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="name-holder">
                                                <a href="#" class="project-name">Project Title</a>
                                                <span class="project-options">Project Category</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell-3 design" data-category="design">
                                        <div class="portfolio-item">
                                            <div class="img-holder">
                                                <div class="img-over">
                                                    <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                                    <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                                </div>
                                                <img alt="" src="images/portfolio/1.jpg">
                                            </div>
                                            <div class="name-holder">
                                                <a href="#" class="project-name">Project Title</a>
                                                <span class="project-options">Project Category</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell-3 seo" data-category="seo">
                                        <div class="portfolio-item">
                                            <div class="img-holder">
                                                <div class="img-over">
                                                    <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                                    <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                                </div>
                                                <img alt="" src="images/portfolio/1.jpg">
                                            </div>
                                            <div class="name-holder">
                                                <a href="#" class="project-name">Project Title</a>
                                                <span class="project-options">Project Category</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell-3 design" data-category="design">
                                        <div class="portfolio-item">
                                            <div class="img-holder">
                                                <div class="img-over">
                                                    <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                                    <a href="#videoDiv" class="fx zoom" title="Project Title" data-gal="prettyPhoto[pp_gal]"><b class="fa fa-search-plus"></b></a>
                                                </div>
                                                <iframe src='http://player.vimeo.com/video/94502406?title=0&byline=0&portrait=0;api=1' width='100%' height='173'></iframe>
                                                <div id="videoDiv" style="display:none">
                                                    <iframe src='http://player.vimeo.com/video/94502406?title=0&byline=0&portrait=0;api=1' width='100%' height='300'></iframe>
                                                </div>
                                            </div>
                                            <div class="name-holder">
                                                <a href="#" class="project-name">Project Title</a>
                                                <span class="project-options">Project Category</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell-3 develop" data-category="develop">
                                        <div class="portfolio-item">
                                            <div class="img-holder">
                                                <div class="img-over">
                                                    <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                                    <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                                </div>
                                                <img alt="" src="images/portfolio/1.jpg">
                                            </div>
                                            <div class="name-holder">
                                                <a href="#" class="project-name">Project Title</a>
                                                <span class="project-options">Project Category</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell-3 design" data-category="design">
                                        <div class="portfolio-item">
                                            <div class="img-holder">
                                                <div class="img-over">
                                                    <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                                    <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                                </div>
                                                <img alt="" src="images/portfolio/1.jpg">
                                            </div>
                                            <div class="name-holder">
                                                <a href="#" class="project-name">Project Title</a>
                                                <span class="project-options">Project Category</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell-3 develop" data-category="develop">
                                        <div class="portfolio-item">
                                            <div class="img-holder">
                                                <div class="img-over full-hover">
                                                    <a href="images/portfolio/1.jpg" class="fx zoom" title="Project Title" data-gal="prettyPhoto[pp_gal]"><b class="fa fa-search-plus"></b></a>
                                                </div>
                                                <img alt="" src="images/portfolio/1.jpg">
                                            </div>
                                            <div class="name-holder">
                                                <a href="#" class="project-name">Project Title</a>
                                                <span class="project-options">Project Category</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cell-3 design" data-category="design">
                                        <div class="portfolio-item">
                                            <div class="img-holder">
                                                <div class="img-over">
                                                    <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                                    <a href="images/portfolio/1.jpg" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                                </div>
                                                <img alt="" src="images/portfolio/1.jpg">
                                            </div>
                                            <div class="name-holder">
                                                <a href="#" class="project-name">Project Title</a>
                                                <span class="project-options">Project Category</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

        <!-- isotope plugin -->
        <script type="text/javascript" src="js/isotope.pkgd.min.js"></script>

        <!-- general script file -->
        <script type="text/javascript" src="js/script.js"></script>
    </body>
</html>
<!DOCTYPE HTML>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en-us"><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8 ie7" lang="en-us"><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9 ie8" lang="en-us"><![endif]-->
<!--[if gt IE 8]><html class="no-js ie9" lang="en-us"><![endif]-->
<html lang="en-us">

    <head>
        <meta charset="utf-8" />
        @yield('title')
        <meta name="generator" content="Laravel Admin - Fahad.systems" />
        <meta name="robots" content="index,follow" />
        <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <link rel="icon" type="image/vnd.microsoft.icon" href="image/favicon.ico?1478574343" />
        <link rel="shortcut icon" type="image/x-icon" href="image/favicon.ico?1478574343" />
        @if(Auth::check())
            @if(Auth::user()->user_type=='Admin')
                <script type="text/javascript">
                    window.location = "{{url('admin-ecom/dashboard')}}";//here double curly bracket
                </script>
                <?php exit(); ?>
            @endif
        @endif
        @yield('css')
        <!--[if IE 8]> 
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> 
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> <![endif]-->
    </head>

    <body id="index" class="index hide-left-column hide-right-column lang_en fullwidth">

        <div id="page">
            <div class="header-container">
                <header id="header">
                    @include('front-include.header')
                </header>
            </div>
            <div id="header_mobile_menu" class="navbar-inactive visible-sm visible-xs">
                <div class="container">
                    <div class="fieldmm-nav col-sm-12 col-xs-12"> <span class="brand">Menu list</span> <span id="fieldmm-button"><i class="icon-reorder"></i></span>
                        @include('front-include.mblnav')
                    </div>
                </div>
            </div>
            <div class="columns-container">
                @yield('slider')
                <div id="columns" class="container">
                    <div id="slider_row" class="row"></div>
                    <div class="row">

                        <div class="container"></div>
                        @yield('content')
                    </div>
                </div>
            </div>

            
            <style type="text/css">
                .footer-container {
                    background: #00a9ec;
                    color: #fff;
                }
                
            </style>    
            <div class="footer-container">
                <div id="footer" style="color: #fff !important;">
                    @include('front-include.footer')

                </div>
            </div>
        </div>
        <div id="back-top"><a href="#" class="mypresta_scrollup hidden-phone"><i class="icon-chevron-up"></i></a></div>
        <div id="layer_compare" class="layer_box">
            <div class="layer_inner_box">
                <div class="layer_product clearfix">
                    <div class="product-image-container layer_compare_img"></div>
                    <div class="layer_product_info"> <span id="layer_compare_product_title" class="product-name"></span></div>
                </div>
                <div id="compare_add_success" class="success">Product successfully added to the product comparison!</div>
                <div id="compare_remove_success" class="success hidden">Product successfully removed from the product comparison!</div>
                <div class="button-container clearfix"> <a class="continue pull-left btn btn-default" rel="nofollow" href="javascript:;">Continue shopping</a> <a class="pull-right btn btn-default layer_compare_btn" rel="nofollow" title="Go to Compare" href="products-comparison">Go to Compare</a></div>
            </div>
        </div>
        @yield('js')

    </body>

</html>
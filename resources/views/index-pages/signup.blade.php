@extends('front-layout.master')


@section('content')

<div id="page">


    <div class="columns-container" style="padding-top: 20px;">
        <div id="columns" class="container">
            <div id="slider_row" class="row"></div>
            <div class="row">
                <div class="container">
                    <div class="breadcrumb title_font clearfix"> <a class="home title_font" href="http://demo.fieldthemes.com/ps_monaco/home1/" title="Return to Home"><span class="title">Home</span></a> <span class="navigation-pipe"><i class="icon-chevron-right"></i></span> Authentication</div>
                </div>
                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 class="page-heading">Customer Registration</h1>
                    @include('front-include.msg')
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 authentication-left">
                            <form action="{{ url('/user-registration') }}" method="post" id="create-account_form" class="box">
                                <h3 class="page-subheading">Create an account</h3>
                                <div class="form_content clearfix">
                                    {{ csrf_field() }}
                                    <div class="alert alert-danger" id="create_account_error" style="display:none"></div>
                                    <div class="required text form-group first-group">
                                        <label for="email">Email <sup>*</sup></label>
                                        <input type="email" class="text form-control validate" id="email" name="email" data-validate="isEmail" value="" />
                                    </div>
                                    <div class="required password form-group">
                                        <label for="passwd">Password <sup>*</sup></label>
                                        <input type="password" class="text form-control validate" name="passwd" id="passwd" data-validate="isPasswd" />
                                        <p class="required opc-required pull-right"> (five characters min.)</p>
                                    </div>
                                    <div class="required form-group">
                                        <label for="firstname">Full name <sup>*</sup></label>
                                        <input type="text" class="text form-control validate" id="customer_firstname" name="name" onblur="$('#firstname').val($(this).val());" data-validate="isName" value="" />
                                    </div>

                                    <div class="submit">
                                        <button class="btn btn-default button button-medium exclusive" type="submit" id="SubmitCreate" name="SubmitCreate"> <span> <i class="icon-user left"></i> Create an account </span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-12 col-sm-6 authentication-right">
                            <form action="{{ url('/login') }}" method="post" id="login_form" class="box">
                                {{ csrf_field() }}
                                <h3 class="page-subheading">Already registered?</h3>
                                <div class="form_content clearfix">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input class="is_required validate account_input form-control" data-validate="isEmail" type="email" id="email" name="email"  value="{{ old('email') }}" />
                                    </div>
                                    <div  class="form-group">
                                        <label for="passwd">Password</label>
                                        <input class="is_required validate account_input form-control" type="password" data-validate="isPasswd" id="passwd" name="password" value="" />
                                    </div>
                                    <div class="form-group">

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <p class="lost_password form-group"><a href="#" title="Recover your forgotten password" rel="nofollow">Forgot your password?</a></p>
                                    <p class="submit">

                                        <button type="submit" class="button btn btn-default button-medium"> <span> <i class="icon-lock left"></i> Sign in </span> </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                        

                    </div>
                </div>
                <!--shop login-->
                <!--                    <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                                        <h1 class="page-heading">Shop Login</h1>
                                        <div class="row">
                                            
                                            <div class="col-xs-12 col-sm-6 authentication-left">
                                                <form action="account-shop.php" method="post" id="create-account_form" class="box">
                                                    <h3 class="page-subheading">Create an account</h3>
                                                    <div class="form_content clearfix">
                                                        <p>Please enter your email address to create an account.</p>
                                                        <div class="alert alert-danger" id="create_account_error" style="display:none"></div>
                                                        <div class="form-group">
                                                            <label for="email_create">Email address</label>
                                                            <input type="email" class="is_required validate account_input form-control" data-validate="isEmail" id="email_create" name="email_create" value="" />
                                                        </div>
                                                        <div class="submit">
                                                            <button class="btn btn-default button button-medium exclusive" type="submit" id="SubmitCreate" name="SubmitShop"> <span> <i class="icon-user left"></i> Create an account </span> </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 authentication-right">
                                                <form action="" method="post" id="login_form" class="box">
                <?php //echo $plugin->ShowMsg(); ?>
                                                    <h3 class="page-subheading">Already registered?</h3>
                                                    <div class="form_content clearfix">
                                                        <div class="form-group">
                                                            <label for="email">Email address</label>
                                                            <input class="is_required validate account_input form-control" data-validate="isEmail" type="email" id="email" name="email" value="" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="passwd">Password</label>
                                                            <input class="is_required validate account_input form-control" type="password" data-validate="isPasswd" id="passwd" name="password" value="" />
                                                        </div>
                                                        <p class="lost_password form-group"><a href="#" title="Recover your forgotten password" rel="nofollow">Forgot your password?</a></p>
                                                        <p class="submit">
                                                            
                                                            <button type="submit"  name="shoplogin" class="button btn btn-default button-medium"> <span> <i class="icon-lock left"></i> Sign in </span> </button>
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>-->
                <!--shop login end-->
            </div>
        </div>
    </div>
</div>

@endsection
@include('front-include.titleseo')
@section('css')

<link rel="stylesheet" href="{{url('site-pub/css/v_8949_055d2884ba02eaca499b3d6c05c65baa_all.css')}}" type="text/css" media="all" />
@endsection

@section('js')

<script type="text/javascript">
    /* <![CDATA[ */;
    var CUSTOMIZE_TEXTFIELD = 1;
    var FIELD_enableCountdownTimer = true;
    var FIELD_mainLayout = 'fullwidth';
    var FIELD_stickyCart = true;
    var FIELD_stickyMenu = true;
    var FIELD_stickySearch = true;
    var FancyboxI18nClose = 'Close';
    var FancyboxI18nNext = 'Next';
    var FancyboxI18nPrev = 'Previous';
    var LANG_RTL = '0';
    var added_to_wishlist = 'The product was successfully added to your wishlist.';
    var ajax_allowed = true;
    var ajaxsearch = true;
    var baseDir = '<?=url('home')?>';
    var baseUri = '<?=url('home')?>';
    var comparator_max_item = 3;
    var compare_add_text = 'Add to Compare';
    var compare_remove_text = 'Remove from Compare';
    var comparedProductsIds = [];
    var contentOnly = false;
    var countdownDay = 'Day';
    var countdownDays = 'Days';
    var countdownHour = 'Hour';
    var countdownHours = 'Hours';
    var countdownMinute = 'Min';
    var countdownMinutes = 'Mins';
    var countdownSecond = 'Sec';
    var countdownSeconds = 'Secs';
    var countries = {
        "21": {
            "id_country": "21",
            "id_lang": "1",
            "name": "United States",
            "id_zone": "2",
            "id_currency": "0",
            "iso_code": "US",
            "call_prefix": "1",
            "active": "1",
            "contains_states": "1",
            "need_identification_number": "0",
            "need_zip_code": "1",
            "zip_code_format": "NNNNN",
            "display_tax_label": "0",
            "country": "United States",
            "zone": "North America",
            "states": [{
                    "id_state": "1",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Alabama",
                    "iso_code": "AL",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "2",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Alaska",
                    "iso_code": "AK",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "3",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Arizona",
                    "iso_code": "AZ",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "4",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Arkansas",
                    "iso_code": "AR",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "5",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "California",
                    "iso_code": "CA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "6",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Colorado",
                    "iso_code": "CO",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "7",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Connecticut",
                    "iso_code": "CT",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "8",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Delaware",
                    "iso_code": "DE",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "53",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "District of Columbia",
                    "iso_code": "DC",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "9",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Florida",
                    "iso_code": "FL",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "10",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Georgia",
                    "iso_code": "GA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "11",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Hawaii",
                    "iso_code": "HI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "12",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Idaho",
                    "iso_code": "ID",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "13",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Illinois",
                    "iso_code": "IL",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "14",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Indiana",
                    "iso_code": "IN",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "15",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Iowa",
                    "iso_code": "IA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "16",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Kansas",
                    "iso_code": "KS",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "17",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Kentucky",
                    "iso_code": "KY",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "18",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Louisiana",
                    "iso_code": "LA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "19",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Maine",
                    "iso_code": "ME",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "20",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Maryland",
                    "iso_code": "MD",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "21",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Massachusetts",
                    "iso_code": "MA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "22",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Michigan",
                    "iso_code": "MI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "23",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Minnesota",
                    "iso_code": "MN",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "24",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Mississippi",
                    "iso_code": "MS",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "25",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Missouri",
                    "iso_code": "MO",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "26",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Montana",
                    "iso_code": "MT",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "27",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Nebraska",
                    "iso_code": "NE",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "28",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Nevada",
                    "iso_code": "NV",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "29",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "New Hampshire",
                    "iso_code": "NH",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "30",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "New Jersey",
                    "iso_code": "NJ",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "31",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "New Mexico",
                    "iso_code": "NM",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "32",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "New York",
                    "iso_code": "NY",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "33",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "North Carolina",
                    "iso_code": "NC",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "34",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "North Dakota",
                    "iso_code": "ND",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "35",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Ohio",
                    "iso_code": "OH",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "36",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Oklahoma",
                    "iso_code": "OK",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "37",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Oregon",
                    "iso_code": "OR",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "38",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Pennsylvania",
                    "iso_code": "PA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "51",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Puerto Rico",
                    "iso_code": "PR",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "39",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Rhode Island",
                    "iso_code": "RI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "40",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "South Carolina",
                    "iso_code": "SC",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "41",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "South Dakota",
                    "iso_code": "SD",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "42",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Tennessee",
                    "iso_code": "TN",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "43",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Texas",
                    "iso_code": "TX",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "52",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "US Virgin Islands",
                    "iso_code": "VI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "44",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Utah",
                    "iso_code": "UT",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "45",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Vermont",
                    "iso_code": "VT",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "46",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Virginia",
                    "iso_code": "VA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "47",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Washington",
                    "iso_code": "WA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "48",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "West Virginia",
                    "iso_code": "WV",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "49",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Wisconsin",
                    "iso_code": "WI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "50",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Wyoming",
                    "iso_code": "WY",
                    "tax_behavior": "0",
                    "active": "1"
                }]
        }
    };
    var currency = {
        "id": 1,
        "name": "Dollar",
        "iso_code": "USD",
        "iso_code_num": "840",
        "sign": "$",
        "blank": "0",
        "conversion_rate": "1.000000",
        "deleted": "0",
        "format": "1",
        "decimals": "1",
        "active": "1",
        "prefix": "$ ",
        "suffix": "",
        "id_shop_list": null,
        "force_id": false
    };
    var currencyBlank = 0;
    var currencyFormat = 1;
    var currencyRate = 1;
    var currencySign = '$';
    var customizationIdMessage = 'Customization #';
    var delete_txt = 'Delete';
    var displayList = false;
    var email_create = false;
    var fieldblocksearch_type = 'top';
    var fieldbs_autoscroll = '5000';
    var fieldbs_maxitem = '5';
    var fieldbs_minitem = '2';
    var fieldbs_navigation = false;
    var fieldbs_pagination = false;
    var fieldbs_pauseonhover = false;
    var freeProductTranslation = 'Free!';
    var freeShippingTranslation = 'Free shipping!';
    var generated_date = 1480704054;
    var hasDeliveryAddress = false;
    var highDPI = false;
    var idSelectedCountry = false;
    var idSelectedCountryInvoice = false;
    var idSelectedState = false;
    var idSelectedStateInvoice = false;
    var id_lang = 1;
    var img_dir = '<?=url('home')?>';
    var instantsearch = false;
    var isGuest = 0;
    var isLogged = 0;
    var isMobile = false;
    var langIso = 'en-us';
    var loggin_required = 'You must be logged in to manage your wishlist.';
    var max_item = 'You cannot add more than 3 product(s) to the product Comparison';
    var min_item = 'Please select at least one product';
    var mywishlist_url = '<?=url('home')?>';
    var page_name = 'authentication';
    var placeholder_blocknewsletter = 'Your e-mail';
    var priceDisplayMethod = 1;
    var priceDisplayPrecision = 2;
    var quickView = true;
    var removingLinkText = 'remove this product from my cart';
    var roundMode = 2;
    var search_url = '/search';
    var static_token = 'cf034011c60a29a745742ca00eb50882';
    var toBeDetermined = 'To be determined';
    var token = '1781ddff19ab1fd7c75d1f91a7f58d3f';
    var usingSecureMode = false;
    var wishlistProductsIds = false; /* ]]> */
</script>
<script type="text/javascript" src="{{url('site-pub/js/v_4_e7928e80154366e778fbeb3f3e4ac066.js')}}"></script>
<script type="text/javascript" src="{{url('site-pub/js/jquery.elevatezoom.min.js')}}"></script>
<script type="text/javascript">
    /* <![CDATA[ */;
    var zoom_type = 'window';
    var zoom_fade_in = 400;
    var zoom_fade_out = 550;
    var zoom_cursor_type = 'default';
    var zoom_window_pos = 1;
    var zoom_scroll = true;
    var zoom_easing = true;
    var zoom_tint = true;
    var zoom_tint_color = '#333';
    var zoom_tint_opacity = 0.4;
    var zoom_lens_shape = 'round';
    var zoom_lens_size = 420;
    ;

    function applyElevateZoom() {
        var src = $('.thickbox.shown').attr('href');
        var bigimage = $('.fancybox.shown').attr('href');
        $('#bigpic').elevateZoom({
            zoomType: zoom_type,
            cursor: zoom_cursor_type,
            zoomWindowFadeIn: zoom_fade_in,
            zoomWindowFadeOut: zoom_fade_out,
            zoomWindowPosition: zoom_window_pos,
            scrollZoom: zoom_scroll,
            easing: zoom_easing,
            tint: zoom_tint,
            tintColour: zoom_tint_color,
            tintOpacity: zoom_tint_opacity,
            lensShape: zoom_lens_shape,
            lensSize: zoom_lens_size,
            zoomImage: bigimage,
            borderSize: 1,
            borderColour: '#d4d4d4',
            zoomWindowWidth: 535,
            zoomWindowHeight: 535,
            zoomLevel: 0.5,
            lensBorderSize: 0
        });
    }
    $(document).ready(function () {
        applyElevateZoom();
        $('#color_to_pick_list').click(function () {
            restartElevateZoom();
        });
        $('#color_to_pick_list').hover(function () {
            restartElevateZoom();
        });
        $('#views_block li a').hover(function () {
            restartElevateZoom();
        });
    });

    function restartElevateZoom() {
        $(".zoomContainer").remove();
        applyElevateZoom();
    }
    ;
    ;
    var input = $("#search_query_top");
    $('document').ready(function () {
        var width_ac_results = input.outerWidth();
        Input_focus()
        $("#search_query_top").autocomplete('/search', {
            minChars: 3,
            max: 10,
            width: (width_ac_results > 0 ? width_ac_results : 500),
            selectFirst: false,
            scroll: true,
            dataType: "json",
            formatItem: function (data, i, max, value, term) {
                return value;
            },
            parse: function (data) {
                var mytab = new Array();
                for (var i = 0; i < data.length; i++)
                    mytab[mytab.length] = {
                        data: data[i],
                        value: '<img alt="' + data[i].pname + '" src="' + data[i].image + '"><div class="right-search"><h5>' + data[i].pname + '</h5><span class="price">' + data[i].dprice + '</span></div> '
                    };
                return mytab;
            },
            extraParams: {
                ajaxSearch: 1,
                id_lang: 1,
                category_filter: $("#category_filter").val()
            }
        }).result(function (event, data, formatted) {
            $('#search_query_top').val(data.pname);
            document.location.href = data.product_link;
        });
        $("#category_filter").change(function () {
            $(".ac_results").remove();
            $("#search_query_top").trigger('unautocomplete');
            Input_focus()
            $("#search_query_top").autocomplete('/search', {
                minChars: 3,
                max: 10,
                width: (width_ac_results > 0 ? width_ac_results : 500),
                selectFirst: false,
                scroll: true,
                dataType: "json",
                formatItem: function (data, i, max, value, term) {
                    return value;
                },
                parse: function (data) {
                    var mytab = new Array();
                    for (var i = 0; i < data.length; i++)
                        mytab[mytab.length] = {
                            data: data[i],
                            value: '<img alt="' + data[i].pname + '" src="' + data[i].image + '"><div class="right-search"><h5>' + data[i].pname + '</h5><span class="price">' + data[i].dprice + '</span></div> '
                        };
                    return mytab;
                },
                extraParams: {
                    ajaxSearch: 1,
                    id_lang: 1,
                    category_filter: $("#category_filter").val()
                }
            }).result(function (event, data, formatted) {
                $('#search_query_top').val(data.pname);
                document.location.href = data.product_link;
            });
        });
    });

    function Input_focus() {
        $('#search_query_top').on('focus', function () {
            var width_ac_results = input.outerWidth();
            var $this = $(this);
            if ($this.val() == 'Enter your keyword ...') {
                $this.val('');
                $('.btn.button-search').addClass('active');
            }
        }).on('blur', function () {
            var $this = $(this);
            if ($this.val() == '') {
                $this.val('Enter your keyword ...');
                $('.btn.button-search').removeClass('active');
            }
        });
    }
    ; /* ]]> */
</script>
@endsection
@extends('front-layout.master')
@section('content')
<div id="page">
    <div class="columns-container">
        <div id="columns" class="container">
            <div class="row" style="padding-top: 20px;">

                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 id="cart_title" class="page-heading"> Dashboard <span class="heading-counter">

                            <style>
                                /* Style The Dropdown Button */
                                .dropbtn {
                                    background-color: #00CDCD;
                                    color: white;
                                    padding: 16px;
                                    font-size: 16px;
                                    border: none;
                                    cursor: pointer;
                                    margin-top: -20px;
                                }

                                /* The container <div> - needed to position the dropdown content */
                                .dropdown {
                                    position: relative;
                                    display: inline-block;
                                }

                                /* Dropdown Content (Hidden by Default) */
                                .dropdown-content {
                                    display: none;
                                    position: absolute;
                                    min-width: 160px;
                                    background-color: #f9f9f9;
                                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                    z-index: 1;
                                }

                                /* Links inside the dropdown */
                                .dropdown-content a {
                                    color: black;
                                    padding: 12px 16px;
                                    text-decoration: none;
                                    display: block;
                                }

                                /* Change color of dropdown links on hover */
                                .dropdown-content a:hover {background-color: #f2f2f2}

                                /* Show the dropdown menu on hover */
                                .dropdown:hover .dropdown-content {
                                    display: block;
                                }

                                /* Change the background color of the dropdown button when the dropdown content is shown */
                                .dropdown:hover .dropbtn {
                                    background-color: #3e8e41;
                                }
                            </style>

                            <div class="dropdown">
                                <button class="dropbtn">Profile <i class="fa fa-arrow-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="#">View Profile</a>
                                    <a href="#">Edit Profile</a>
                                </div>
                            </div>





                            Welcome Mr.  : <span id="summary_products_quantity">{{Auth::user()->name}}</span>

                        </span></h1>
                    <p id="emptyCartWarning" class="alert alert-warning unvisible">Your shopping cart is empty.</p>



                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-bag fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{count($orderspending)}}</div>
                                            <div>Pending Orders</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('user-order')}}/{{Auth::user()->name}}/pending-orders">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{count($orderscancel)}}</div>
                                            <div>Cancel Orders!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('user-order')}}/{{Auth::user()->name}}/cancel-orders">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-cart-arrow-down fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{count($orderspaid)}}</div>
                                            <div>Paid Orders!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('user-order')}}/{{Auth::user()->name}}/paid-orders">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12 text-center">
                        <p class="cart_navigation">
                            <a href="{{url('home')}}" class="button-exclusive btn btn-default" title="Continue shopping"> <i class="icon-chevron-left"></i>Continue shopping </a>
                        </p>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@include('front-include.titleseo')
@section('css')

<link rel="stylesheet" href="{{url('site-pub/css/v_9185_4824619e3d18795329f630a46fec20cf_all.css')}}" type="text/css" media="all" />
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
    var addressMultishippingUrl = '';
    var addressUrl = '';
    var addressUrlAdd = '=';
    var addresses = [];
    var ajax_allowed = true;
    var ajaxsearch = true;
    var authenticationUrl = 'login';
    var baseDir = '';
    var baseUri = '';
    var checkedCarrier = 1200;
    var comparator_max_item = 3;
    var compare_add_text = 'Add to Compare';
    var compare_remove_text = 'Remove from Compare';
    var comparedProductsIds = [];
    var conditionEnabled = 1;
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
    var deliveryAddress = 0;
    var displayList = false;
    var displayPrice = 1;
    var errorCarrier = 'You must choose a carrier.';
    var errorTOS = 'You must accept the Terms of Service.';
    var fieldblocksearch_type = 'top';
    var fieldbs_autoscroll = '5000';
    var fieldbs_maxitem = '5';
    var fieldbs_minitem = '2';
    var fieldbs_navigation = false;
    var fieldbs_pagination = false;
    var fieldbs_pauseonhover = false;
    var freeProductTranslation = 'Free!';
    var freeShippingTranslation = 'Free shipping!';
    var generated_date = 1480753465;
    var guestCheckoutEnabled = 0;
    var guestTrackingUrl = 'guest-tracking';
    var hasDeliveryAddress = false;
    var highDPI = false;
    var historyUrl = 'order-history';
    var idSelectedCountry = false;
    var idSelectedCountryInvoice = false;
    var idSelectedState = false;
    var idSelectedStateInvoice = false;
    var id_lang = 1;
    var imgDir = 'themes/monaco/img/';
    var img_dir = 'themes/monaco/img/';
    var instantsearch = false;
    var isGuest = 0;
    var isLogged = 0;
    var isMobile = false;
    var isPaymentStep = 0;
    var isVirtualCart = 0;
    var langIso = 'en-us';
    var liUpdate = '<a class="button button-small btn btn-default" href="address?back=order-opc.php%3Fstep%3D1&id_address=" title="Update"><span>Update<i class="icon-chevron-right right"></i></span></a>';
    var loggin_required = 'You must be logged in to manage your wishlist.';
    var max_item = 'You cannot add more than 3 product(s) to the product Comparison';
    var min_item = 'Please select at least one product';
    var msg_order_carrier = 'You must agree to the terms of service before continuing.';
    var mywishlist_url = '';
    var opc = true;
    var orderOpcUrl = 'quick-order';
    var orderProcess = 'order-opc';
    var page_name = 'order-opc';
    var placeholder_blocknewsletter = 'Your e-mail';
    var priceDisplayMethod = 1;
    var priceDisplayPrecision = 2;
    var quickView = true;
    var removingLinkText = 'remove this product from my cart';
    var roundMode = 2;
    var search_url = 'search';
    var static_token = '';
    var taxEnabled = 1;
    var titleDelivery = '<h3 class="page-subheading">Your delivery address</h3>';
    var titleInvoice = '<h3 class="page-subheading">Your billing address</h3>';
    var toBeDetermined = 'To be determined';
    var token = '1781ddff19ab1fd7c75d1f91a7f58d3f';
    var txtConditionsIsNotNeeded = 'You do not need to accept the Terms of Service for this order.';
    var txtDeliveryAddress = 'Delivery address';
    var txtErrors = 'Error(s)';
    var txtFree = 'Free';
    var txtHasBeenSelected = 'has been selected';
    var txtInstantCheckout = 'Instant checkout';
    var txtInvoiceAddress = 'Invoice address';
    var txtModifyMyAddress = 'Modify my address';
    var txtNoCarrierIsNeeded = 'No carrier is needed for this order';
    var txtNoCarrierIsSelected = 'No carrier has been selected';
    var txtProduct = 'product';
    var txtProducts = 'products';
    var txtSelectAnAddressFirst = 'Please start by selecting an address.';
    var txtTOSIsAccepted = 'The service terms have been accepted';
    var txtTOSIsNotAccepted = 'The service terms have not been accepted';
    var txtThereis = 'There is';
    var txtWithTax = '(tax incl.)';
    var txtWithoutTax = '(tax excl.)';
    var usingSecureMode = false;
    var vat_management = 0;
    var wishlistProductsIds = false; /* ]]> */
</script>
<script type="text/javascript" src="{{url('site-pub/js/v_4_80e5688408874d37a60e2366c1d6d2c5.js')}}"></script>
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


        $("#inv_add").click(function () {
            alert(1);
            //$('.inv_add').toggleClass();
        });

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
        $("#search_query_top").autocomplete('search', {
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
            $("#search_query_top").autocomplete('search', {
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
<script>
    $(document).ready(function () {

    });

</script>    
@endsection
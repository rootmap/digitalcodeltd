<script type="text/javascript">
    /* <![CDATA[ */;
    var CUSTOMIZE_TEXTFIELD = 1;
    var Enable_productVerticalThumb = false;
    var FIELD_enableCountdownTimer = true;
    var FIELD_mainLayout = 'fullwidth';
    var FIELD_stickyCart = true;
    var FIELD_stickyMenu = true;
    var FIELD_stickySearch = true;
    var FancyboxI18nClose = 'Close';
    var FancyboxI18nNext = 'Next';
    var FancyboxI18nPrev = 'Previous';
    var LANG_RTL = '0';
    var PS_CATALOG_MODE = false;
    var added_to_wishlist = 'The product was successfully added to your wishlist.';
    var ajax_allowed = true;
    var ajaxsearch = true;
    var allowBuyWhenOutOfStock = false;
    var attribute_anchor_separator = '-';
    var attributesCombinations = [{
            "id_attribute": "1",
            "id_attribute_group": "1",
            "attribute": "s",
            "group": "size"
        }, {
            "id_attribute": "13",
            "id_attribute_group": "3",
            "attribute": "orange",
            "group": "color"
        }, {
            "id_attribute": "14",
            "id_attribute_group": "3",
            "attribute": "blue",
            "group": "color"
        }, {
            "id_attribute": "2",
            "id_attribute_group": "1",
            "attribute": "m",
            "group": "size"
        }, {
            "id_attribute": "3",
            "id_attribute_group": "1",
            "attribute": "l",
            "group": "size"
        }];
    var availableLaterValue = '';
    var availableNowValue = 'In stock';
    var baseDir = '';
    var baseUri = '';
    var combinations = {
        "2": {
            "attributes_values": {
                "1": "S",
                "3": "Blue"
            },
            "attributes": [1, 14],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'1','14'"
        },
        "1": {
            "attributes_values": {
                "1": "S",
                "3": "Orange"
            },
            "attributes": [1, 13],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 299,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'1','13'"
        },
        "4": {
            "attributes_values": {
                "1": "M",
                "3": "Blue"
            },
            "attributes": [2, 14],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'2','14'"
        },
        "3": {
            "attributes_values": {
                "1": "M",
                "3": "Orange"
            },
            "attributes": [2, 13],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'2','13'"
        },
        "6": {
            "attributes_values": {
                "1": "L",
                "3": "Blue"
            },
            "attributes": [3, 14],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'3','14'"
        },
        "5": {
            "attributes_values": {
                "1": "L",
                "3": "Orange"
            },
            "attributes": [3, 13],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'3','13'"
        }
    };
    var combinationsFromController = {
        "2": {
            "attributes_values": {
                "1": "S",
                "3": "Blue"
            },
            "attributes": [1, 14],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'1','14'"
        },
        "1": {
            "attributes_values": {
                "1": "S",
                "3": "Orange"
            },
            "attributes": [1, 13],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 299,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'1','13'"
        },
        "4": {
            "attributes_values": {
                "1": "M",
                "3": "Blue"
            },
            "attributes": [2, 14],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'2','14'"
        },
        "3": {
            "attributes_values": {
                "1": "M",
                "3": "Orange"
            },
            "attributes": [2, 13],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'2','13'"
        },
        "6": {
            "attributes_values": {
                "1": "L",
                "3": "Blue"
            },
            "attributes": [3, 14],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'3','14'"
        },
        "5": {
            "attributes_values": {
                "1": "L",
                "3": "Orange"
            },
            "attributes": [3, 13],
            "price": 0,
            "specific_price": false,
            "ecotax": 0,
            "weight": 0,
            "quantity": 300,
            "reference": null,
            "unit_impact": 0,
            "minimal_quantity": "1",
            "date_formatted": "",
            "available_date": "",
            "id_image": -1,
            "list": "'3','13'"
        }
    };
    var comparator_max_item = 3;
    var compare_add_text = 'Add to Compare';
    var compare_remove_text = 'Remove from Compare';
    var comparedProductsIds = [];
    var confirm_report_message = 'Are you sure that you want to report this comment?';
    var contentOnly = false;
    var countdownDay = 'Day';
    var countdownDays = 'Days';
    var countdownHour = 'Hour';
    var countdownHours = 'Hours';
    var countdownMinute = 'Min';
    var countdownMinutes = 'Mins';
    var countdownSecond = 'Sec';
    var countdownSeconds = 'Secs';
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
    var currentDate = '2017-03-26 16:18:39';
    var customerGroupWithoutTax = true;
    var customizationFields = false;
    var customizationId = null;
    var customizationIdMessage = 'Customization #';
    var default_eco_tax = 0;
    var delete_txt = 'Delete';
    var displayDiscountPrice = '0';
    var displayList = false;
    var displayPrice = 1;
    var doesntExist = 'This combination does not exist for this product. Please select another combination.';
    var doesntExistNoMore = 'This product is no longer in stock';
    var doesntExistNoMoreBut = 'with those attributes but is available with others.';
    var ecotaxTax_rate = 0;
    var fieldRequired = 'Please fill in all the required fields before saving your customization.';
    var fieldbestsellers_autoscroll = false;
    var fieldbestsellers_items = '1';
    var fieldbestsellers_mediumitems = '1';
    var fieldbestsellers_navigation = false;
    var fieldbestsellers_pagination = false;
    var fieldbestsellers_pauseonhover = false;
    var fieldblocksearch_type = 'top';
    var fieldbs_autoscroll = '5000';
    var fieldbs_maxitem = '5';
    var fieldbs_minitem = '2';
    var fieldbs_navigation = false;
    var fieldbs_pagination = false;
    var fieldbs_pauseonhover = false;
    var freeProductTranslation = 'Free!';
    var freeShippingTranslation = 'Free shipping!';
    var generated_date = 1490519915;
    var groupReduction = 0;
    var hasDeliveryAddress = false;
    var highDPI = false;
    var idDefaultImage = 225;
    var id_lang = 1;
    var id_product = 1;
    var img_dir = '';
    var img_prod_dir = '';
    var img_ps_dir = '';
    var instantsearch = false;
    var isGuest = 0;
    var isLogged = 0;
    var isMobile = false;
    var jqZoomEnabled = false;
    var langIso = 'en-us';
    var loggin_required = 'You must be logged in to manage your wishlist.';
    var maxQuantityToAllowDisplayOfLastQuantityMessage = 3;
    var max_item = 'You cannot add more than 3 product(s) to the product Comparison';
    var min_item = 'Please select at least one product';
    var minimalQuantity = 1;
    var moderation_active = false;
    var mywishlist_url = '';
    var noTaxForThisProduct = true;
    var oosHookJsCodeFunctions = [];
    var page_name = 'product';
    var placeholder_blocknewsletter = 'Your e-mail';
    var priceDisplayMethod = 1;
    var priceDisplayPrecision = 2;
    var productAvailableForOrder = true;
    var productBasePriceTaxExcl = 16.51;
    var productBasePriceTaxExcluded = 16.51;
    var productBasePriceTaxIncl = 16.51;
    var productHasAttributes = true;
    var productPrice = 16.51;
    var productPriceTaxExcluded = 16.51;
    var productPriceTaxIncluded = 16.51;
    var productPriceWithoutReduction = 16.51;
    var productReference = 'demo_1';
    var productShowPrice = true;
    var productUnitPriceRatio = 0;
    var product_fileButtonHtml = 'Choose File';
    var product_fileDefaultHtml = 'No file selected';
    var product_specific_price = [];
    var productcomment_added = 'Your comment has been added!';
    var productcomment_added_moderation = 'Your comment has been added and will be available once approved by a moderator.';
    var productcomment_ok = 'OK';
    var productcomment_title = 'New comment';
    var productcomments_controller_url = '';
    var productcomments_url_rewrite = true;
    var quantitiesDisplayAllowed = true;
    var quantityAvailable = 1799;
    var quickView = true;
    var reduction_percent = 0;
    var reduction_price = 0;
    var removingLinkText = 'remove this product from my cart';
    var roundMode = 2;
    var search_url = '';
    var secure_key = '1f63bab93ea4f5dedc2e42d233713063';
    var sharing_img = '';
    var sharing_name = 'Cras ornare tristique elit.';
    var sharing_url = '';
    var specific_currency = false;
    var specific_price = 0;
    var static_token = 'cf034011c60a29a745742ca00eb50882';
    var stf_msg_error = 'Your e-mail could not be sent. Please check the e-mail address and try again.';
    var stf_msg_required = 'You did not fill required fields';
    var stf_msg_success = 'Your e-mail has been sent successfully';
    var stf_msg_title = 'Send to a friend';
    var stf_secure_key = 'ccc73423d38e13602d488f58460c1178';
    var stock_management = 1;
    var taxRate = 0;
    var toBeDetermined = 'To be determined';
    var token = 'cf034011c60a29a745742ca00eb50882';
    var upToTxt = 'Up to';
    var uploading_in_progress = 'Uploading in progress, please be patient.';
    var usingSecureMode = false;
    var wishlistProductsIds = false; /* ]]> */
</script>
<script type="text/javascript" src="{{url('site-pub/js/v_4_5447625c11f65c7d461f4ecdbae6e412.js')}}"></script>
<script type="text/javascript" src="{{url('site-pub/js/jquery.elevatezoom.min.js')}}"></script>
@include('front-include.cartadd')
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
        $("#search_query_top").autocomplete('<?=url('home')?>', {
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
            $("#search_query_top").autocomplete('<?=url('home')?>', {
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
    ;
    ;
    $('#productCates').owlCarousel({
        itemsCustom: [
            [0, 1],
            [320, 1],
            [480, 2],
            [568, 3],
            [992, 4],
            [1200, 4]
        ],
        responsiveRefreshRate: 50,
        slideSpeed: 200,
        paginationSpeed: 500,
        rewindSpeed: 600,
        autoPlay: 5000,
        stopOnHover: true,
        rewindNav: true,
        pagination: false,
        navigation: false,
        navigationText: ['<div class="carousel-previous disable-select"><span class="icon-angle-left"></span></div>', '<div class="carousel-next disable-select"><span class="icon-angle-right"></span></div>']
    }); /* ]]> */
</script>
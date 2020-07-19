@extends('front-layout.master')


@section('content')
<div id="page">
        
        <div class="columns-container">
            <div id="columns" class="container">
                <div id="slider_row" class="row"></div>
                <div class="row" style="padding-top: 15px;">
                    
                    <div id="left_column" class="column col-xs-12 col-sm-12 col-md-3">
                        <div id="categories_block_left" class="block">
                            <h2 class="title_block">Categories</h2>
                            <div class="block_content">
                                <ul class="tree dhtml">
                                    <li> <a href="#" class="selected" title=""> {{$cat_info->name}} </a>
                                        @if(isset($cat_info->subcat))
                                        <ul>
                                            @foreach($cat_info->subcat as $cc)
                                                <li><a href="{{url('category')}}/{{$cc->id}}/{{$cc->name}}" title="{{$cc->name}}"> {{$cc->name}} </a></li>
                                            @endforeach
                                        </ul>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div id="layered_block_left" class="block">
                            <p class="title_block">Category</p>
                            <div class="block_content">
                                <form action="#" id="layered_form">
                                    <div>
                                        <div class="layered_filter">
                                            <div class="layered_subtitle_heading"> <span class="layered_subtitle">Availability</span></div>
                                            <ul id="ul_layered_quantity_0" class="col-lg-12 layered_filter_ul">
                                                <li class="nomargin hiddable col-lg-12">
                                                    <input type="checkbox" class="checkbox" name="layered_quantity_0" id="layered_quantity_0" value="0" />
                                                    <label for="layered_quantity_0"> <a href="12-shop#availability-not_available" data-rel="nofollow">Not available<span> (2)</span></a> </label>
                                                </li>
                                                <li class="nomargin hiddable col-lg-12">
                                                    <input type="checkbox" class="checkbox" name="layered_quantity_1" id="layered_quantity_1" value="1" />
                                                    <label for="layered_quantity_1"> <a href="12-shop#availability-in_stock" data-rel="nofollow">In stock<span> (11)</span></a> </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="layered_filter">
                                            <div class="layered_subtitle_heading"> <span class="layered_subtitle">Condition</span></div>
                                            <ul id="ul_layered_condition_0" class="col-lg-12 layered_filter_ul">
                                                <li class="nomargin hiddable col-lg-12">
                                                    <input type="checkbox" class="checkbox" name="layered_condition_new" id="layered_condition_new" value="new" />
                                                    <label for="layered_condition_new"> <a href="12-shop#condition-new" data-rel="nofollow">New<span> (6)</span></a> </label>
                                                </li>
                                                <li class="nomargin hiddable col-lg-12">
                                                    <input type="checkbox" class="checkbox" name="layered_condition_used" id="layered_condition_used" value="used" />
                                                    <label for="layered_condition_used"> <a href="12-shop#condition-used" data-rel="nofollow">Used<span> (7)</span></a> </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="layered_filter">
                                            <div class="layered_subtitle_heading"> <span class="layered_subtitle">Manufacturer</span></div>
                                            <ul id="ul_layered_manufacturer_0" class="col-lg-12 layered_filter_ul">
                                                <li class="nomargin hiddable col-lg-12">
                                                    <input type="checkbox" class="checkbox" name="layered_manufacturer_1" id="layered_manufacturer_1" value="1" />
                                                    <label for="layered_manufacturer_1"> <a href="12-shop#manufacturer-fashion_manufacturer" data-rel="nofollow">Demo Text<span> (1)</span></a> </label>
                                                </li>
                                                <li class="nomargin hiddable col-lg-12">
                                                    <input type="checkbox" class="checkbox" name="layered_manufacturer_2" id="layered_manufacturer_2" value="2" />
                                                    <label for="layered_manufacturer_2"> <a href="12-shop#manufacturer-manufacture_1" data-rel="nofollow">Demo Text <span> (12)</span></a> </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="layered_price" style="display: none;">
                                            <div class="layered_subtitle_heading"> <span class="layered_subtitle">Price</span></div>
                                            <ul id="ul_layered_price_0" class="col-lg-12 layered_filter_ul">
                                                <label for="price"> Range: </label> <span id="layered_price_range"></span>
                                                <div class="layered_slider_container">
                                                    <div class="layered_slider" id="layered_price_slider" data-type="price" data-format="1" data-unit="$"></div>
                                                </div>
                                            </ul>
                                        </div>
                                        <div class="layered_filter">
                                            <div class="layered_subtitle_heading"> <span class="layered_subtitle">Size</span></div>
                                            <ul id="ul_layered_id_attribute_group_1" class="col-lg-12 layered_filter_ul">
                                                <li class="nomargin hiddable col-lg-12">
                                                    <input type="checkbox" class="checkbox" name="layered_id_attribute_group_1" id="layered_id_attribute_group_1" value="1_1" />
                                                    <label for="layered_id_attribute_group_1"> <a href="12-shop#size-s">S<span> (12)</span></a> </label>
                                                </li>
                                                <li class="nomargin hiddable col-lg-12">
                                                    <input type="checkbox" class="checkbox" name="layered_id_attribute_group_2" id="layered_id_attribute_group_2" value="2_1" />
                                                    <label for="layered_id_attribute_group_2"> <a href="12-shop#size-m">M<span> (12)</span></a> </label>
                                                </li>
                                                <li class="nomargin hiddable col-lg-12">
                                                    <input type="checkbox" class="checkbox" name="layered_id_attribute_group_3" id="layered_id_attribute_group_3" value="3_1" />
                                                    <label for="layered_id_attribute_group_3"> <a href="12-shop#size-l">L<span> (12)</span></a> </label>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                    <input type="hidden" name="id_category_layered" value="12" />
                                </form>
                            </div>
                            <div id="layered_ajax_loader" style="display: none;">
                                <p> <img src="images/loader.gif" alt="" />
                                    <br />Loading...</p>
                            </div>
                        </div>
                        
                        
                        
                        @if(isset($topseller))
                        <div id="best-sellers_block_right" class="block vertical_mode">
                            <h4 class="title_block title_font"> <a href="best-sales" title=""> Top sellers </a></h4>
                            <div id="field_bestsellers" class="grid carousel-grid owl-carousel block_content">
                                <div class="item">
                                    
                                    @foreach($topseller as $topse)
                                    <div class="item-content clearfix">
                                        <div class="left-content">
                                            <a href="{{url('product')}}/{{$topse->id}}/{{$topse->name}}" title="{{$topse->name}}"> 
                                                <img style="width: 100px;" src="{{url('upload/product')}}/{{$topse->photo}}" height="140" width="110" alt="{{$topse->name}}" /> </a>
                                        </div>
                                        <div class="right-content">
                                            <h3 class="sub_title_font product-name"> <a href="{{url('product')}}/{{$topse->id}}/{{$topse->name}}" title="{{$topse->name}}"> {{$topse->name}} </a></h3>
                                            <div class="content_price"> <span class="price product-price"> ${{$topse->price}} </span></div>
                                            <div class="comments_note" itemtype="" itemscope="">
                                                <div class="star_content clearfix" itemtype="" itemscope="" itemprop="aggregateRating">
                                                    <div class="star star_on"></div>
                                                    <div class="star star_on"></div>
                                                    <div class="star star_on"></div>
                                                    <div class="star star_on"></div>
                                                    <div class="star"></div>
                                                    <meta itemprop="worstRating" content="0" />
                                                    <meta itemprop="ratingValue" content="4" />
                                                    <meta itemprop="bestRating" content="5" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    
                                    
                                    
                                </div>
                                
                            </div>
                        </div>
                        @endif
                        
                    </div>
                    <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-9">
                        <div class="content_scene_cat">
                            <div class="content_scene_cat_bg" style="background:url('{{url()}}/upload/category/{{$cat_info->banner}}') right center no-repeat; background-size:cover; min-height:270px;">
                                <div class="cat_desc"> 
                                    <span class="category-name title_font"> Font of House </span>
                                    <div class="rte">
                                        <p>{{$cat_info->description}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h1 class="page-heading product-listing title_font"><span class="cat-name">Shop&nbsp;</span><span class="heading-counter">There are 13 products.</span></h1>
                        <div class="content_sortPagiBar container clearfix">
                            <div class="top-pagination-content sortPagiBar clearfix">
                                <ul class="display hidden-xs">
                                    <li class="display-title">View as:</li>
                                    <li id="grid"><a rel="nofollow" href="#" title="Grid"><i class="icon-th-large"></i></a></li>
                                    <li id="list"><a rel="nofollow" href="#" title="List"><i class="icon-th-list"></i></a></li>
                                </ul>
                                <form id="productsSortForm" action="12-shop" class="productsSortForm">
                                    <div class="select selector1">
                                        <label for="selectProductSort">Sort by</label>
                                        <select id="selectProductSort" class="selectProductSort form-control">
                                            <option value="position:asc" selected="selected">Position</option>
                                            <option value="price:asc">Price: Lowest first</option>
                                            <option value="price:desc">Price: Highest first</option>
                                            <option value="name:asc">Product Name: A to Z</option>
                                            <option value="name:desc">Product Name: Z to A</option>
                                            <option value="quantity:desc">In stock</option>
                                            <option value="reference:asc">Reference: Lowest first</option>
                                            <option value="reference:desc">Reference: Highest first</option>
                                        </select>
                                    </div>
                                </form>
                                <form action="12-shop" method="get" class="nbrItemPage">
                                    <div class="clearfix selector1">
                                        <label for="nb_item"> Show </label>
                                        <input type="hidden" name="id_category" value="12" />
                                        <select name="n" id="nb_item" class="form-control">
                                            <option value="9" selected="selected">9</option>
                                            <option value="18">18</option>
                                        </select> <span>per page</span></div>
                                </form>
                                <div id="pagination" class="pagination clearfix"> <span class="ft_page"> Page: </span>
                                    <ul class="pagination">
                                        <li id="pagination_previous" class="disabled pagination_previous"> <span> <i class="icon-chevron-left"></i> </span></li>
                                        <li class="active current"> <span> <span>1</span> </span>
                                        </li>
                                        <li>
                                            <a href=""> <span>2</span> </a>
                                        </li>
                                        <li id="pagination_next" class="pagination_next">
                                            <a href="" rel="next"> <i class="icon-chevron-right"></i> </a>
                                        </li>
                                    </ul>
                                    <form class="showall" action="12-shop" method="get">
                                        <div>
                                            <button type="submit" class="btn btn-default button exclusive-medium"> <span>Show all</span> </button>
                                            <input type="hidden" name="id_category" value="12" />
                                            <input name="n" id="nb_item" class="hidden" value="13" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @if(!isset($product_info))
                        <div class=" hide-color-options hide-stock-info">
                            <h3>No Product Found</h3>
                        </div>
                        @endif
                        <div class=" hide-color-options hide-stock-info">
                            <ul class="product_list grid row">
                                
                                @if(isset($product_info))
                                    @foreach($product_info as $pro)
                                    <li class="ajax_block_product col-xs-12 col-sm-6 col-lg-4 first-in-line first-item-of-tablet-line first-item-of-mobile-line">
                                        <div class="product-container" itemscope itemtype="">
                                            <div class="item-inner">
                                                <div class="left-block">
                                                    <div class="product-image-container">
                                                        <a class="product_img_link product_img" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" title="{{$pro->name}}" itemprop="url"> 
                                                            <span class="hover-image"><img class="replace-2x" src="{{url('upload/product')}}/{{$pro->photo}}" alt="{{$pro->name}}" title="{{$pro->name}}" height="344" width="270"/></span> 
                                                            <span class="img_root"> <img src="{{url('upload/product')}}/{{$pro->photo}}" height="344" width="270" alt="{{$pro->name}}" /> </span> 
                                                        </a>
                                                    </div>
                                                    <div class="conditions-box"></div>
                                                    <div class="product-flags"></div>
                                                </div>
                                                <div class="right-block">
                                                    <h5 itemprop="name"> 
                                                        <a class="product-name" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" title="{{$pro->name}}" itemprop="url"  style="overflow: hidden; line-height: 40px; height: 40px;"> {{$pro->name}} </a></h5>
                                                    <p class="product-desc" itemprop="description">{{$pro->description}}</p>
                                                    <p class="learn-more" itemprop="url"> <a href="" title="See more in the product page">Learn more...</a></p>
                                                    <div class="price-rating">

                                                        <div class="content_price" itemprop="offers" itemscope itemtype=""> 
                                                            <span itemprop="price" class="price product-price"> ${{$pro->price}} </span>
                                                            <meta itemprop="priceCurrency" content="USD" /> 
    <!--                                                        <span class="old-price product-price"> $20.50 </span> 
                                                            <span class="price-percent-reduction">-20%</span> 
                                                            <span class="unvisible">
                                                                <link itemprop="availability" href="https://schema.org/OutOfStock" />
                                                                Out of stock 
                                                            </span>-->
                                                        </div>

                                                        <div class="hook-reviews">
                                                            <div class="comments_note" itemtype="" itemscope="">
                                                                <div class="star_content clearfix" itemtype="" itemscope="" itemprop="aggregateRating">
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star star_on"></div>
                                                                    <div class="star"></div>
                                                                    <meta itemprop="worstRating" content="0" />
                                                                    <meta itemprop="ratingValue" content="4" />
                                                                    <meta itemprop="bestRating" content="5" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="color-list-container"></div> <span class="availability"> <span class=" label-success"> In stock </span> </span>
                                                    <div class="button-container">
                                                        <div class="tab_button">
                                                            <a class=" title_font" href="{{url('product/$pro->id/$pro->name')}}" rel=""> 
                                                                <span><i class="icon-eye"></i></span> 
                                                            </a> 
                                                            <a class="add_to_compare title_font" href="" data-id-product="1" data-tooltip="Add to Compare" data-product-cover="images/h3.jpg" data-product-name="Demo text">
                                                                <span><i class="icon-plus"></i></span>
                                                            </a>
                                                            <a class="addToWishlist title_font wishlistProd_1" href="#" data-tooltip="Add to Wishlist" rel="nofollow" onclick="WishlistCart('wishlist_block_list', 'add', '1', false, 1); return false;"> 
                                                                <span><i class="icon-heart"></i></span> 
                                                            </a>
                                                            <a class="title_font button_cart button ajax_add_to_cart_button btn btn-default" href="{{ route('product.addToCart',['id'=>$pro->id,'reur'=>base64_encode('category/'.$cat_info->id.'/'.$cat_info->name)]) }}" rel="nofollow" title="Add to cart" data-id-product="1" data-minimal_quantity="1"> 
                                                                <i class="icon-shopping-cart"></i> 
                                                                <span>Add to cart</span> 
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                @else
                                <li>
                                    <div class="col-md-12">
                                        <h3>No Product Found</h3>
                                    </div>
                                    
                                </li>
                                @endif
                                
                            </ul>
                        </div>
                        <div class="content_sortPagiBar block">
                            <div class="bottom-pagination-content sortPagiBar clearfix">
                                <ul class="display hidden-xs">
                                    <li class="display-title">View as:</li>
                                    <li id="grid"><a rel="nofollow" href="#" title="Grid"><i class="icon-th-large"></i></a></li>
                                    <li id="list"><a rel="nofollow" href="#" title="List"><i class="icon-th-list"></i></a></li>
                                </ul>
                                <form id="productsSortForm" action="12-shop" class="productsSortForm">
                                    <div class="select selector1">
                                        <label for="selectProductSort">Sort by</label>
                                        <select id="selectProductSort" class="selectProductSort form-control">
                                            <option value="position:asc" selected="selected">Position</option>
                                            <option value="price:asc">Price: Lowest first</option>
                                            <option value="price:desc">Price: Highest first</option>
                                            <option value="name:asc">Product Name: A to Z</option>
                                            <option value="name:desc">Product Name: Z to A</option>
                                            <option value="quantity:desc">In stock</option>
                                            <option value="reference:asc">Reference: Lowest first</option>
                                            <option value="reference:desc">Reference: Highest first</option>
                                        </select>
                                    </div>
                                </form>
                                <form action="12-shop" method="get" class="nbrItemPage">
                                    <div class="clearfix selector1">
                                        <label for="nb_item"> Show </label>
                                        <input type="hidden" name="id_category" value="12" />
                                        <select name="n" id="nb_item" class="form-control">
                                            <option value="9" selected="selected">9</option>
                                            <option value="18">18</option>
                                        </select> <span>per page</span></div>
                                </form>
                                <div id="pagination_bottom" class="pagination clearfix"> <span class="ft_page"> Page: </span>
                                    <ul class="pagination">
                                        <li id="pagination_previous_bottom" class="disabled pagination_previous"> <span> <i class="icon-chevron-left"></i> </span></li>
                                        <li class="active current"> <span> <span>1</span> </span>
                                        </li>
                                        <li>
                                            <a href=""> <span>2</span> </a>
                                        </li>
                                        <li id="pagination_next_bottom" class="pagination_next">
                                            <a href="" rel="next"> <i class="icon-chevron-right"></i> </a>
                                        </li>
                                    </ul>
                                    <form class="showall" action="12-shop" method="get">
                                        <div>
                                            <button type="submit" class="btn btn-default button exclusive-medium"> <span>Show all</span> </button>
                                            <input type="hidden" name="id_category" value="12" />
                                            <input name="n" id="nb_item" class="hidden" value="13" />
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection
@include('front-include.titleseo')
@section('css')
<link rel="stylesheet" href="{{url('site-pub/css/v_9131_c26e9ea48d14b55ad2c9ee04e38f30bd_all.css')}}" type="text/css" media="all" />
@endsection

@section('js')

<script type="text/javascript">
        /* <![CDATA[ */ ;
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
        var baseDir = 'index.php';
        var baseUri = 'index.php';
        var blocklayeredSliderName = {
            "price": "price",
            "weight": "weight"
        };
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
        var filters = [{
            "type_lite": "quantity",
            "type": "quantity",
            "id_key": 0,
            "name": "Availability",
            "values": [{
                "name": "Not available",
                "nbr": 2,
                "link": "",
                "rel": "nofollow"
            }, {
                "name": "In stock",
                "nbr": 11,
                "link": "",
                "rel": "nofollow"
            }],
            "filter_show_limit": "0",
            "filter_type": "0"
        }, {
            "type_lite": "condition",
            "type": "condition",
            "id_key": 0,
            "name": "Condition",
            "values": {
                "new": {
                    "name": "New",
                    "nbr": 6,
                    "link": "",
                    "rel": "nofollow"
                },
                "used": {
                    "name": "Used",
                    "nbr": 7,
                    "link": "#condition-used",
                    "rel": "nofollow"
                },
                "refurbished": {
                    "name": "Refurbished",
                    "nbr": 0,
                    "link": "#condition-refurbished",
                    "rel": "nofollow"
                }
            },
            "filter_show_limit": "0",
            "filter_type": "0"
        }, {
            "type_lite": "manufacturer",
            "type": "manufacturer",
            "id_key": 0,
            "name": "Manufacturer",
            "values": {
                "1": {
                    "name": "Fashion Manufacturer",
                    "nbr": "1",
                    "link": "#manufacturer-fashion_manufacturer",
                    "rel": "nofollow"
                },
                "2": {
                    "name": "Manufacture 1",
                    "nbr": "12",
                    "link": "#manufacturer-manufacture_1",
                    "rel": "nofollow"
                }
            },
            "filter_show_limit": "0",
            "filter_type": "0"
        }, {
            "type_lite": "price",
            "type": "price",
            "id_key": 0,
            "name": "Price",
            "slider": true,
            "max": "53",
            "min": "16",
            "values": {
                "1": "53",
                "0": "16"
            },
            "unit": "$",
            "format": "1",
            "filter_show_limit": "0",
            "filter_type": "0"
        }, {
            "type_lite": "id_attribute_group",
            "type": "id_attribute_group",
            "id_key": 1,
            "name": "Size",
            "is_color_group": false,
            "values": {
                "1": {
                    "color": null,
                    "name": "S",
                    "nbr": 12,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#size-s",
                    "rel": ""
                },
                "2": {
                    "color": null,
                    "name": "M",
                    "nbr": 12,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#size-m",
                    "rel": ""
                },
                "3": {
                    "color": null,
                    "name": "L",
                    "nbr": 12,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#size-l",
                    "rel": ""
                }
            },
            "url_name": "size",
            "meta_title": null,
            "filter_show_limit": "0",
            "filter_type": "0"
        }, {
            "type_lite": "id_attribute_group",
            "type": "id_attribute_group",
            "id_key": 3,
            "name": "Color",
            "is_color_group": false,
            "values": {
                "7": {
                    "color": "#f5f5dc",
                    "name": "Beige",
                    "nbr": 1,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#color-beige",
                    "rel": ""
                },
                "8": {
                    "color": "#ffffff",
                    "name": "White",
                    "nbr": 3,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#color-white",
                    "rel": ""
                },
                "11": {
                    "color": "#434A54",
                    "name": "Black",
                    "nbr": 6,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#color-black",
                    "rel": ""
                },
                "13": {
                    "color": "#F39C11",
                    "name": "Orange",
                    "nbr": 6,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#color-orange",
                    "rel": ""
                },
                "14": {
                    "color": "#5D9CEC",
                    "name": "Blue",
                    "nbr": 5,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#color-blue",
                    "rel": ""
                },
                "15": {
                    "color": "#A0D468",
                    "name": "Green",
                    "nbr": 2,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#color-green",
                    "rel": ""
                },
                "16": {
                    "color": "#F1C40F",
                    "name": "Yellow",
                    "nbr": 7,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#color-yellow",
                    "rel": ""
                },
                "24": {
                    "color": "#FCCACD",
                    "name": "Pink",
                    "nbr": 1,
                    "url_name": null,
                    "meta_title": null,
                    "link": "#color-pink",
                    "rel": ""
                }
            },
            "url_name": "color",
            "meta_title": null,
            "filter_show_limit": "0",
            "filter_type": "0"
        }, {
            "type_lite": "id_feature",
            "type": "id_feature",
            "id_key": 5,
            "values": {
                "5": {
                    "nbr": 5,
                    "name": "Cotton",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#compositions-cotton",
                    "rel": ""
                },
                "1": {
                    "nbr": 3,
                    "name": "Polyester",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#compositions-polyester",
                    "rel": ""
                },
                "3": {
                    "nbr": 5,
                    "name": "Viscose",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#compositions-viscose",
                    "rel": ""
                }
            },
            "name": "Compositions",
            "url_name": null,
            "meta_title": null,
            "filter_show_limit": "0",
            "filter_type": "0"
        }, {
            "type_lite": "id_feature",
            "type": "id_feature",
            "id_key": 6,
            "values": {
                "11": {
                    "nbr": 7,
                    "name": "Casual",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#styles-casual",
                    "rel": ""
                },
                "16": {
                    "nbr": 1,
                    "name": "Dressy",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#styles-dressy",
                    "rel": ""
                },
                "13": {
                    "nbr": 5,
                    "name": "Girly",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#styles-girly",
                    "rel": ""
                }
            },
            "name": "Styles",
            "url_name": null,
            "meta_title": null,
            "filter_show_limit": "0",
            "filter_type": "0"
        }, {
            "type_lite": "id_feature",
            "type": "id_feature",
            "id_key": 7,
            "values": {
                "18": {
                    "nbr": 2,
                    "name": "Colorful Dress",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#properties-colorful_dress",
                    "rel": ""
                },
                "21": {
                    "nbr": 4,
                    "name": "Maxi Dress",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#properties-maxi_dress",
                    "rel": ""
                },
                "20": {
                    "nbr": 2,
                    "name": "Midi Dress",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#properties-midi_dress",
                    "rel": ""
                },
                "19": {
                    "nbr": 2,
                    "name": "Short Dress",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#properties-short_dress",
                    "rel": ""
                },
                "17": {
                    "nbr": 3,
                    "name": "Short Sleeve",
                    "url_name": null,
                    "meta_title": null,
                    "link": "#properties-short_sleeve",
                    "rel": ""
                }
            },
            "name": "Properties",
            "url_name": null,
            "meta_title": null,
            "filter_show_limit": "0",
            "filter_type": "0"
        }];
        var freeProductTranslation = 'Free!';
        var freeShippingTranslation = 'Free shipping!';
        var generated_date = 1480748048;
        var hasDeliveryAddress = false;
        var highDPI = false;
        var id_lang = 1;
        var img_dir = 'images/';
        var instantsearch = false;
        var isGuest = 0;
        var isLogged = 0;
        var isMobile = false;
        var langIso = 'en-us';
        var loggin_required = 'You must be logged in to manage your wishlist.';
        var max_item = 'You cannot add more than 3 product(s) to the product Comparison';
        var min_item = 'Please select at least one product';
        var mywishlist_url = '';
        var page_name = 'category';
        var param_product_url = '#';
        var placeholder_blocknewsletter = 'Your e-mail';
        var priceDisplayMethod = 1;
        var priceDisplayPrecision = 2;
        var quickView = true;
        var removingLinkText = 'remove this product from my cart';
        var request = '12-shop';
        var roundMode = 2;
        var search_url = 'search';
        var static_token = 'cf034011c60a29a745742ca00eb50882';
        var toBeDetermined = 'To be determined';
        var token = '1781ddff19ab1fd7c75d1f91a7f58d3f';
        var usingSecureMode = false;
        var wishlistProductsIds = false; /* ]]> */
    </script>
    <script type="text/javascript" src="{{url('site-pub/js/v_4_88b46a65e7da4beebc125a31b0cb58ec.js')}}"></script>
    <script type="text/javascript" src="{{url('site-pub/js/jquery.elevatezoom.min.js')}}"></script>
    <script type="text/javascript">
        /* <![CDATA[ */ ;
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
        var zoom_lens_size = 420;;

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
        $(document).ready(function() {
            applyElevateZoom();
            $('#color_to_pick_list').click(function() {
                restartElevateZoom();
            });
            $('#color_to_pick_list').hover(function() {
                restartElevateZoom();
            });
            $('#views_block li a').hover(function() {
                restartElevateZoom();
            });
        });

        function restartElevateZoom() {
            $(".zoomContainer").remove();
            applyElevateZoom();
        };;
        var input = $("#search_query_top");
        $('document').ready(function() {
            var width_ac_results = input.outerWidth();
            Input_focus()
            $("#search_query_top").autocomplete('search', {
                minChars: 3,
                max: 10,
                width: (width_ac_results > 0 ? width_ac_results : 500),
                selectFirst: false,
                scroll: true,
                dataType: "json",
                formatItem: function(data, i, max, value, term) {
                    return value;
                },
                parse: function(data) {
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
            }).result(function(event, data, formatted) {
                $('#search_query_top').val(data.pname);
                document.location.href = data.product_link;
            });
            $("#category_filter").change(function() {
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
                    formatItem: function(data, i, max, value, term) {
                        return value;
                    },
                    parse: function(data) {
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
                }).result(function(event, data, formatted) {
                    $('#search_query_top').val(data.pname);
                    document.location.href = data.product_link;
                });
            });
        });

        function Input_focus() {
            $('#search_query_top').on('focus', function() {
                var width_ac_results = input.outerWidth();
                var $this = $(this);
                if ($this.val() == 'Enter your keyword ...') {
                    $this.val('');
                    $('.btn.button-search').addClass('active');
                }
            }).on('blur', function() {
                var $this = $(this);
                if ($this.val() == '') {
                    $this.val('Enter your keyword ...');
                    $('.btn.button-search').removeClass('active');
                }
            });
        }; /* ]]> */
    </script>
       
@endsection
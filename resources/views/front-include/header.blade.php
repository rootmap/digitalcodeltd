<?php 
$arrayDD=MenuPageController::siteBasic();
$arrayCurrency=MenuPageController::CurrencyDetail();
//echo "<pre>";
$categoryAll=$arrayDD['cats'];
$brandAll=$arrayDD['brn'];
//exit();
?>
<div class="nav">
    <div class="container">
        <div class="row">
            <nav>
                <div id="mobile_links">
                    <div class="current"><span class="cur-label">My account</span></div>
                    <ul id="header_links">
                        <li> <a class="link-myaccount" href="{{url('user-dashboard')}}" title="Account"><i class="icon-user"></i> Account</a></li>
                        <li> <a class="link-wishlist wishlist_block" href="{{url('wish-list')}}" title="My wishlist"><i class="icon-heart"></i> Wishlist</a></li>
                        <li> <a class="link-mycart" href="{{url('shopping-cart')}}" title="My cart"><i class="icon-shopping-cart"></i> Checkout</a></li>
                        @if(Auth::check())
                        <li>
                            <a class="link-mycart" href="{{url('user-dashboard')}}" title="My cart"><i class="icon-shopping-cart"></i> 
                                Logged - {{Auth::user()->name}}
                            </a>
                        </li>
                        <li class="last"> 
                            <form method="post" action="{{url('logout')}}" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button style="background: none; color: #fff; border: none;" class="link-login btn" href="{{url('logout')}}" title="logout" rel="nofollow"><i class="icon-unlock"></i> Logout</button>
                            </form>
                        </li>
                        @else
                        <li class="last"> <a class="link-login" href="{{url('user-login')}}" title="Login" rel="nofollow"><i class="icon-lock"></i> Login</a></li>
                        @endif
                    </ul>
                </div>
                @if(isset($currency))
                <div id="currencies-block-top">
                    <form id="setCurrency" action="" method="post">
                        <div class="current">
                            <span class="cur-label"></span> <strong>{{$arrayCurrency->short_code}}  {{$arrayCurrency->icon}}</strong></div>
                        <ul id="first-currencies" class="currencies_ul toogle_content">
                            @foreach($currency as $curr)
                            <li @if($curr->isactive==1)
                                 selected="selected"
                                 @endif
                                 > <!-- class="selected"-->
                                 <a href="javascript:setCurrency({{$curr->id}});" rel="nofollow" title="{{$curr->name}}"> {{$curr->name}} </a>
                            </li>
                            @endforeach
                        </ul>
                    </form>
                </div>
                @endif

                @if(isset($language))
                <div id="languages-block-top" class="languages-block">
                    <div class="current"> 
                        <img src="{{url('upload/language')}}/{{$language[0]->languageimage}}" alt="en" width="16" height="11" /> 
                        <span>{{$language[0]->name}}</span>
                    </div>
                    <ul id="first-languages" class="languages-block_ul toogle_content">
                        @foreach($language as $lan)
                        <li>
                            <a href="" title="{{$lan->short_code}}" rel="alternate" hreflang="{{$lan->short_code}}"> 
                                <img src="{{url('upload/language')}}/{{$lan->languageimage}}" alt="{{$lan->short_code}}" width="16" height="11" /> 
                                <span>{{$lan->name}}</span> 
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="welcome-text">
                    <p>Welcome to {{$seo[0]->name}} !</p>
                </div>
            </nav>
        </div>
    </div>
</div>
<div class="header_bottom">
    <div class="container">
        <div id="header_logo">
            <a href="{{url('home')}}" title="home page 1"> <img class="logo img-responsive" src="{{url('upload/logo')}}/{{$seo[0]->site_logo}}" alt=" home page 1" width="173" height="35" style="margin-top: -30px;" /> </a>
        </div>
        <div id="header_menu" class="visible-lg visible-md">
            <div class="container">
                <div class="row">
                    <nav id="fieldmegamenu-main" class="fieldmegamenu inactive">
                        <ul>
                            <li class="root root-1 ">
                                <div class="root-item no-description">
                                    <a href="{{url('home')}}">
                                        <div class="title title_font"><span class="title-text">Home</span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                            </li>
                            @if(isset($cat))
                            @foreach($cat as $ct)
                            <li class="root root-7">
                                <div class="root-item no-description">
                                    <a href="{{url('category')}}/{{$ct->id}}/{{$ct->name}}">
                                        <div class="title title_font"><span class="title-text">{{$ct->name}}<?php
                                                // print_r($cat->subcate());
                                                ?></span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                            </li>
                            @endforeach
                            @endif






                            <li class="root root-10 demo_custom_link_cms">
                                <div class="root-item no-description">
                                    <a href="#">
                                        <div class="title title_font"><span class="title-text">more</span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                                <ul class="menu-items col-md-3 col-xs-12">
                                    @foreach($cats as $cs)
                                    <li class="menu-item menu-item-90 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('category')}}/{{$cs->id}}/{{$cs->name}}"> {{$cs->name}} </a></div>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="root root-7">
                                <div class="root-item no-description">
                                    <a href="{{url('brand')}}">
                                        <div class="title title_font"><span class="title-text">Brand</span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                            </li>
                            <li class="root root-10 demo_custom_link_cms">
                                <div class="root-item no-description">
                                    <a href="{{url('contact-us')}}">
                                        <div class="title title_font"><span class="title-text">contacts</span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                                <ul class="menu-items col-md-2 col-xs-12">
                                    <li class="menu-item menu-item-90 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/About-us')}}"> About us </a></div>
                                    </li>
                                    <li class="menu-item menu-item-88 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/Delivery')}}"> Delivery </a></div>
                                    </li>
                                    <li class="menu-item menu-item-89 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/Secure-payment')}}"> Secure payment </a></div>
                                    </li>
                                    <li class="menu-item menu-item-91 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/Legal-Notice')}}"> Legal Notice </a></div>
                                    </li>
                                    <li class="menu-item menu-item-92 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/Terms-of-use')}}"> Terms of use </a></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div id="sticky_top">
            <div class="shopping_cart_menu">
                <div id="cart_block_top" class="shopping_cart">
                    <a href="{{ Session::has('cart') ? route('site.shopping-cart') : '#'}}" title="View my shopping cart" rel="nofollow"> <span class="qtt_cart"><span class="ajax_cart_quantity unvisible">{{Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</span> <span class="ajax_cart_product_txt unvisible">item - </span> <span class="ajax_cart_product_txt_s unvisible">items - </span> <span class="ajax_cart_total unvisible"> </span> <span class="ajax_cart_no_product"><b id="totalQtyTop">{{Session::has('cart') ? Session::get('cart')->totalQty : '0'}}</b> item - <span id="totalPriceTop">{{$arrayCurrency->icon}}{{Session::has('cart') ? Session::get('cart')->totalPrice : '0'}}</span></span>
                        </span>
                    </a>

                    <div class="cart_block block exclusive">
                        <div class="block_content">
                            <div class="cart_block_list" id="shopping_cart_mini_detail">
                                
                                <dl class="products" id="cartProductsMini">
                                    
                                    @if(isset(MenuPageController::shoppingCart()['products']))
                                        <?php $incre=0; ?>
                                        @foreach(MenuPageController::shoppingCart()['products'] as $pro)
                                        <dt class="first_item last_item" data-id="cart_block_product_2_7_0" style="display: block;">
                                            <a class="cart-images" href="{{url('product/'.$pro['item']->id.'/'.$pro['item']->name)}}" title="{{$pro['item']->name}}">
                                                <img src="{{url('upload/product/'.$pro['item']->photo)}}" style="height:60px !important;" alt="{{$pro['item']->name}}">
                                            </a>
                                            <div class="cart-info" style="padding-top:3px;">
                                                <div class="product-name">
                                                    <span class="quantity-formated">
                                                        <span class="quantity">{{$pro['qty']}}</span>
                                                        &nbsp;x&nbsp;

                                                    </span>
                                                    <a href="{{url('product/'.$pro['item']->id.'/'.$pro['item']->name)}}" title="{{$pro['item']->name}}" class="cart_block_product_name">{{$pro['item']->price}}</a>
                                                </div>
                                                <div class="product-atributes">
                                                    <a href="{{url('product/'.$pro['item']->id.'/'.$pro['item']->name)}}" title="{{$pro['item']->name}}"><?=substr($pro['item']->name,0,20).'..'?></a>
                                                </div>
                                                <span class="price">{{$arrayCurrency->icon}}{{$pro['price']}}</span>
                                            </div>
                                            <span class="remove_link">
                                                <a rel="nofollow" data-rid="{{$pro['item']->id}}" data-reur="<?=base64_encode(Request::path())?>" data-url="{{url('')}}" data-remove="{{url('cart/'.$pro['item']->id.'/11')}}" class="remove_cart_item" href="javascript:void(0);"> </a>
                                            </span>
                                        </dt>
                                        <?php 
                                        $incre++; 
                                        if($incre==3)
                                        {
                                            break;
                                        }
                                        ?>
                                        @endforeach
                                    @endif
                                    
                                    <dd data-id="cart_block_combination_of_2_7_0" class="" style="display: block;"></dd>
                                </dl>
                                
                                <p class="cart_block_no_products" style="display: none;"> No products</p>
                                <div class="cart-prices">
                                    <div class="cart-prices-line first-line"> 
                                        <span class="price cart_block_shipping_cost ajax_cart_shipping_cost unvisible" style="display: inline;" id="totalQty">{{MenuPageController::shoppingCart()['totalQty']}}</span> 
                                        <span class="unvisible" style="display: inline;"> Total Quantity </span>
                                    </div>
                                    <div class="cart-prices-line last-line"> 
                                        <span class="price cart_block_total ajax_block_cart_total">{{$arrayCurrency->icon}}<b id="totalPrice">{{MenuPageController::shoppingCart()['totalPrice']}}</b></span> 
                                        <span>Total</span>
                                    </div>
                                </div>
                                <p class="cart-buttons"> 
                                    <a id="button_order_cart" class="btn btn-default button button-small" href="{{route('site.shopping-cart')}}" title="Check out" rel="nofollow"> 
                                        <span> Check out<i class="icon-chevron-right right"></i> </span> 
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!--                    <div class="cart_block block exclusive">
                                            <div class="block_content">
                                                <div class="cart_block_list">
                                                    <p class="cart_block_no_products"> No products</p>
                                                    <div class="cart-prices">
                                                        <div class="cart-prices-line first-line"> <span class="price cart_block_shipping_cost ajax_cart_shipping_cost unvisible"> To be determined </span> <span class="unvisible"> Shipping </span></div>
                                                        <div class="cart-prices-line last-line"> <span class="price cart_block_total ajax_block_cart_total"></span> <span>Total</span></div>
                                                    </div>
                                                    <p class="cart-buttons">
                                                        <a id="button_order_cart" class="btn btn-default button button-small" href="" title="Check out" rel="nofollow"> <span> Check out<i class="icon-chevron-right right"></i> </span> </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>-->
                </div>
            </div>
            <div id="layer_cart">
                <div class="clearfix">
                    <div class="layer_cart_product col-xs-12 col-md-6"> <span class="cross" title="Close window"></span> <span class="title"> <span><i class="icon-check"></i>Product successfully added to your shopping cart</span> </span>
                        <div class="product-image-container layer_cart_img"></div>
                        <div class="layer_cart_product_info"> <span id="layer_cart_product_title" class="product-name"></span> <span id="layer_cart_product_attributes"></span>
                            <div> <strong class="dark">Quantity</strong> <span id="layer_cart_product_quantity"></span></div>
                            <div> <strong class="dark">Total</strong> <span id="layer_cart_product_price"></span></div>
                        </div>
                    </div>
                    <div class="layer_cart_cart col-xs-12 col-md-6"> <span class="title"> <span class="ajax_cart_product_txt_s unvisible"> There are <span class="ajax_cart_quantity">0</span> items in your cart. </span> <span class="ajax_cart_product_txt "> There is 1 item in your cart. </span> </span>
                        <div class="layer_cart_row"> <strong class="dark"> Total products </strong> <span class="ajax_block_products_total"> </span></div>
                        <div class="layer_cart_row"> <strong class="dark unvisible"> Total shipping&nbsp; </strong> <span class="ajax_cart_shipping_cost unvisible"> To be determined </span></div>
                        <div class="layer_cart_row"> <strong class="dark"> Total </strong> <span class="ajax_block_cart_total"> </span></div>
                        <div class="button-container"> 
                            <span class="continue btn btn-default button exclusive-medium" title="Continue shopping"> 
                                <span><a href="{{url('home')}}"> <i class="icon-chevron-left left"></i>Continue shopping </a></span> 
                            </span>
                            <a class="btn btn-default button button-medium" href="quick-order.php" title="Proceed to checkout" rel="nofollow"> <span> Proceed to checkout<i class="icon-chevron-right right"></i> </span> </a>
                        </div>
                    </div>
                </div>
                <div class="crossseling"></div>
            </div>
            <div class="layer_cart_overlay"></div>
            <div id="search_block_top">
                <div class="field-search">
                    <form method="post" action="{{url('search')}}" id="searchbox">
                        <div class="input-group-btn search_filter form-group">
                            <select onchange="CategoryWiseRedirect(this.value)" name="category_filter" id="category_filter" class="form-control">
                                <option value="0" selected="selected">Select A Category</option>
                                @foreach($cats as $ct)
                                <option value="C{{$ct->id}}">{{$ct->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{csrf_field()}}
                        <input class="search_query form-control" type="text" id="search_query_top" name="search_query" placeholder="Enter your keyword ..." />
                        <button type="submit" name="submit_search" class="btn button-search"> <span class="icon-search"></span> </button>
                    </form>
                </div>
            </div>
            <div class="content-static-top">
                <div class="left-content">
                    <div class="fa fa-phone"></div>
                    <p>Customer Support</p>
                    @if(isset($cussup))
                    <p>{{$cussup[0]->contact_number}}</p>
                    @endif
                </div>
                <div class="right-content"><a href="#" class="fa fa-user">user</a></div>
            </div>
        </div>
    </div>
</div>
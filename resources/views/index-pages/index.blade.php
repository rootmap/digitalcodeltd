@extends('front-layout.master')
<?php $arrayCurrency=MenuPageController::CurrencyDetail(); ?>
@if(isset($slider))
@section('slider')
<div id="field_slideshow">
    <div class="field-main-slider block" style="overflow: hidden;">
        <div id="insideslider_mod" class="outer-slide" style="width: 1920px; height: 600px">
            <div class="loading">
                <div class="bg-loading"></div>
                <div class="icon-loading"></div>
            </div>
            <div data-u="slides" style="width: 1920px; height: 600px">
                @foreach($slider as $sli)
                <div class="field-main-slider_1">
                    <a href="#"> 
                        <img class="img-slider" src="{{url('upload/slider')}}/{{$sli->sliderimage}}" alt="" data-u="image"> 
                    </a>
                    <?php /*<div class="box-slider">
                        <div class="large-slide-title title_font" data-u="caption" data-t="T-*IB" data-t2="ZML|TR" data-d="-300">New Food </div>
                        <div class="big-slide-title title_font" data-u="caption" data-t="ZM*WVR|LB" data-t2="WVC|R" data-d="-300"> up to</div>
                        <div class="small-slide-title title_font" data-u="caption" data-t="TORTUOUS|HL" data-t2="JDN|B" data-d="-300">
                            <p class="custom_location" style="width: 360px; text-align: center; right: 375px; left: auto;">50% off</p>
                        </div>
                        <div class="div-slide-button shop_now" data-u="caption" data-t="B-R*"> <a class="slide-button title_font" href="{{url('product')}}/{{$sli->product_id}}/{{$sli->name}}"> Order now</a></div>
                    </div>*/ ?>
                </div>
                @endforeach
            </div>
            <?php /*
            <div data-u="navigator">
                <div data-u="prototype"></div>
            </div> <span data-u="arrowleft"><i class="icon-angle-left"></i></span> <span data-u="arrowright"><i class="icon-angle-right"></i></span> */ ?></div>
    </div>
</div>
@endsection
@endif
@section('content')
<div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
    <div class="clearfix">
        <div class="block title_center horizontal_mode clearfix">
            <h4 class="title_block title_font"> <a class="title_text" href="" title="Category"> Category <span class="bd_title"></span> </a></h4>
            <div class="row">
                @foreach($cats as $ctt)
                <div class="col-md-3">
                    <div class="left-block box">
                        <a href="{{url('category')}}/{{$ctt->id}}/{{$ctt->name}}" style="color: #ffffff; text-decoration: none;">
                            <img src="{{url('upload/category')}}/{{$ctt->thumb}}" width="100%">
                            <div style="padding: 10px; background-color: #00a9ec; text-align: center;"> View {{$ctt->name}}</div>
                        </a>
                    </div>

                </div>
                @endforeach

            </div>
        </div>

    </div>
    <div class="clearfix">
        
        <div class="Brands-block-slider">
                <div class="container">
                    @include('front-include.brand')
                </div>
        </div>

        <div id="featured_products_block" class="block title_center horizontal_mode clearfix">
            <h4 class="title_block title_font"> <span class="title_text"> LATEST PRODUCTS <span class="bd_title"></span> </span></h4>
            <div class="row">
                <div id="featured_products" class="carousel-grid owl-carousel">
                    @if(isset($product))
                    @foreach($product as $pro)
                    <div class="item first">
                        <div class="item-inner">
                            <div class="left-block">
                                <a class="product_img" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" title=""> 
                                    <span class="hover-image"><img class="replace-2x" style="height: 300px !important;" src="{{url('upload/product')}}/{{$pro->photo}}" alt="{{$pro->name}}" title="{{$pro->name}}" height="344" width="270"/></span> 
                                    <span class="img_root"> <img style="height: 300px !important;" src="{{url('upload/product')}}/{{$pro->photo}}" height="344" width="270" alt="" /> </span> </a>
                                <div class="conditions-box"></div>
                            </div>
                            <div class="right-block">
                                <h5 class="sub_title_font"> 
                                    <a class="product-name" style="height: 53px;" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" title="{{$pro->name}}"> {{$pro->name}} </a>
                                </h5>
                                <div class="price-rating">
                                    <div class="content_price"> 
                                        @if(empty($pro->unit))
                                            <span class="price product-price"> {{$arrayCurrency->icon}}{{$pro->price}} </span>
                                        @endif
                                    </div>
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
                                <div class="button-container">
                                    <div class="tab_button">
                                        <a class="title_font" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" rel="" title="Quick view"> <span><i class="icon-eye"></i></span> </a>
                                        <a class="addToWishlist title_font wishlistProd_1" href="{{url('product-wishlist')}}/{{$pro->id}}/{{$pro->name}}" data-tooltip="Add to Wishlist" rel="nofollow" onclick="WishlistCart('wishlist_block_list', 'add', '{{$pro->id}}', false, 1);
                                                return false;"> <span><i class="icon-heart"></i></span> </a>
                                             @if(!empty($pro->unit))
                                    
                                    <a class="title_font button_cart button ajax_add_to_cart_button btn btn-default" 
                                        href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" 
                                        title="Choose Product"> 
                                        <i class="icon-shopping-cart"></i> 
                                        <span>Choose Product</span> 
                                    </a>
                                    @elseif(!empty($pro->iscolor))
                                    <?php $color=count($pro->iscolor); ?>
                                    <a class="title_font button_cart button ajax_add_to_cart_button btn btn-default" 
                                        href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" 
                                        title="Choose Product"> 
                                        <i class="icon-shopping-cart"></i> 
                                        <span>Choose Product</span> 
                                    </a>
                                    @else           
                                        <a class="button cart_add ajax_add_to_cart_button btn btn-default caption-add-to-cart title_font" rel="nofollow" 
                                                           href="javascript:void(0);" 
                                                           data-base="<?=url('/')?>" 
                                                           title="Add to cart" data-minimal_quantity="1"  
                                                           data-token="<?=csrf_token()?>" 
                                                           data-cart="{{route('product.addToCartajax',['id'=>$pro->id,'reur'=>base64_encode('home')])}}"> <i class="icon-shopping-cart"></i> <span>Add to cart</span> </a>
                                     @endif
                                                           
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @endif

                </div>
            </div>
        </div>
        
        
        
        <div class="block block_testimonials title_center fieldFullWidth" style="background:url({{url('site-pub/images')}}/back.jpg ) center center no-repeat; background-attachment: fixed; background-blend-mode: screen; background-clip: border-box; background-color: rgba(0, 0, 0, 0); background-size:cover; background-origin: padding-box; background-repeat: no-repeat;">
            <div class="overlay_testimonials">
                <div class="container">
                    <div class="row">
                        <div id="testimonials_block_right">
                            <div class="title">
                                <h2 class="title_font"> <span class="title_text"> what clients say <span class="bd_title"></span> </span></h2></div>
                            <div id="wrapper" class="block_content">
                                <div id="slide-panel">
                                    <div id="slide">
                                        <div class="main-block">
                                            <div class="content_test_top">
                                                <p class="des_testimonial">Demo Text</p>
                                            </div>
                                            <div class="media">
                                                <div class="media-content">
                                                    <a class="fancybox-media" href="{{url('site-pub/images')}}/630-client-3.png"> <img src="{{url('site-pub/images')}}/630-client-3.png" alt="Image Testimonial" /> </a>
                                                </div>
                                                <div class="content_test">
                                                    <p class="des_namepost">Jane Doe</p>
                                                    <p class="des_company">Online Marketer</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main-block">
                                            <div class="content_test_top">
                                                <p class="des_testimonial">Demo Text</p>
                                            </div>
                                            <div class="media">
                                                <div class="media-content">
                                                    <a class="fancybox-media" href="{{url('site-pub/images')}}/993-client-6.png"> <img src="{{url('site-pub/images')}}/993-client-6.png" alt="Image Testimonial" /> </a>
                                                </div>
                                                <div class="content_test">
                                                    <p class="des_namepost">Cornelius Reeves</p>
                                                    <p class="des_company">Project Manager</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="main-block">
                                            <div class="content_test_top">
                                                <p class="des_testimonial">Demo Text</p>
                                            </div>
                                            <div class="media">
                                                <div class="media-content">
                                                    <a class="fancybox-media" href="{{url('site-pub/images')}}/58-client-8.png"> <img src="{{url('site-pub/images')}}/58-client-8.png" alt="Image Testimonial" /> </a>
                                                </div>
                                                <div class="content_test">
                                                    <p class="des_namepost">Jochen Rechsteiner</p>
                                                    <p class="des_company">Stylish Manager</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div id="pagination_cycle"></div>
        </div>
    </div>
    
</div>

@endsection
@include('front-include.titleseo')
@include('front-include.subscribe')
@include('front-include.index_js')

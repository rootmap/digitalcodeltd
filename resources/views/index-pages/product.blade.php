@extends('front-layout.master')

<?php $arrayCurrency=MenuPageController::CurrencyDetail(); ?>
@section('content')
<?php MenuPageController::recentProductView($product->id); ?>
<div class="columns-container">
    <div id="columns" class="container">
        <div id="slider_row" class="row"></div>
        <div class="row">
            <div class="container" style="padding-top: 27px;">
                <div class="breadcrumb title_font clearfix"> 
                    <a class="home title_font" href="{{url('home')}}" title="Return to Home">
                        <span class="title">Home</span>
                    </a>
                    
                    @if($productCategoryInfo->layout==1 || $productCategoryInfo->layout==3)
                        <span style="font-weight:bolder; font-size: 14px; color: #001a35;">&GT;</span>
                        <span class="navigation_page title_font">
                            <span itemscope itemtype="{{url('category')}}/{{$product->cid}}/{{$product->cat_name}}">
                                <a itemprop="url" href="{{url('category')}}/{{$product->cid}}/{{$product->cat_name}}" title="{{$product->cat_name}}" >
                                    <span class="title" itemprop="title">{{$product->cat_name}}</span>
                                </a>
                            </span>
                            <span style="font-weight:bolder; font-size: 14px; color: #001a35;">&GT;</span>
                            <span itemscope itemtype="{{url('category/brand/'.$brandProInfo->id.'/'.$product->cid.'/'.$brandProInfo->name)}}">
                                <a itemprop="url" href="{{url('category/brand/'.$brandProInfo->id.'/'.$product->cid.'/'.$brandProInfo->name)}}" title="{{$brandProInfo->name}}" >
                                    <span class="title" itemprop="title">{{$brandProInfo->name}}</span>
                                </a>
                            </span>
                            <span style="font-weight:bolder; font-size: 14px; color: #001a35;">&GT;</span>
                            <span itemscope itemtype="{{url('category/'.$product->cid.'/brand/'.$brandProInfo->id.'/sub/'.$product->scid.'/'.$product->scat_name)}}">
                                <a itemprop="url" href="{{url('category/'.$product->cid.'/brand/'.$brandProInfo->id.'/sub/'.$product->scid.'/'.$product->scat_name)}}" title="{{$product->scat_name}}" >
                                    <span class="title" itemprop="title">{{$product->scat_name}}</span>
                                </a>
                            </span>
                            <span style="font-weight:bolder; font-size: 14px; color: #001a35;">&GT;</span>
                            {{$product->name}}
                        </span>
                    @elseif($productCategoryInfo->layout==2)
                        <span style="font-weight:bolder; font-size: 14px; color: #001a35;">&GT;</span>
                        <span class="navigation_page title_font">
                            <span itemscope itemtype="{{url('category')}}/{{$product->cid}}/{{$product->cat_name}}">
                                <a itemprop="url" href="{{url('category')}}/{{$product->cid}}/{{$product->cat_name}}" title="{{$product->cat_name}}" >
                                    <span class="title" itemprop="title">{{$product->cat_name}}</span>
                                </a>
                            </span>
                            <span style="font-weight:bolder; font-size: 14px; color: #001a35;">&GT;</span>
                            <span itemscope itemtype="{{url('product/sub/'.$product->cid.'/'.$product->scid.'/'.$product->scat_name)}}">
                                <a itemprop="url" href="{{url('product/sub/'.$product->cid.'/'.$product->scid.'/'.$product->scat_name)}}" title="{{$product->scat_name}}" >
                                    <span class="title" itemprop="title">{{$product->scat_name}}</span>
                                </a>
                            </span>
                            <span style="font-weight:bolder; font-size: 14px; color: #001a35;">&GT;</span>
                            {{$product->name}}
                        </span>
                    @else
                    
                    @endif
                    
                </div>
            </div>
            @if(!empty($multi_product))
                @include('front-include.product_view_multiple')
            @else
                @include('front-include.product_view_single')
            @endif
            
            
            
            
            
            
            
            
            
            
            
            

            @include('front-include.productsidecategorylist')

        </div>
    </div>
</div>

















































































@if(isset($related))
<div class="container">
    <div id="field_productcates" class="block horizontal_mode title_center">
        <h4 class="title_block title_font"> <span class="title_text"> {{count($related)}} other products in the same category <span class="bd_title"></span> </span></h4>
        <div class="row">
            <div id="productCates" class="carousel-grid owl-carousel">
                @foreach($related as $rel)
                <div class="item first">
                    <div class="item-inner">
                        <div class="left-block">
                            <a class="product_img" href="{{url('product')}}/{{$rel->id}}/{{$rel->name}}" title="{{$rel->name}}"> 
                                <span class="hover-image"><img class="replace-2x"  style="height:274px !important;" src="{{url('upload/product')}}/{{$rel->photo}}" alt="{{$rel->name}}" title="{{$rel->name}}" height="344" width="270"/></span>
                                <span class="img_root"> <img src="{{url('upload/product')}}/{{$rel->photo}}" style="height:274px !important;" height="344"  alt="{{$rel->name}}" /> </span> </a>
                            <div class="conditions-box"></div>
                        </div>
                        <div class="right-block has_ratings">
                            <h5 class="sub_title_font"> <a class="product-name" href="{{url('product')}}/{{$rel->id}}/{{$rel->name}}" title="{{$rel->name}}"> {{$rel->name}} </a></h5>
                            <div class="price-rating">
                                <div class="content_price"> <span class="price product-price"> {{$arrayCurrency->icon}}{{$rel->price}} </span></div>
                                <div class="comments_note" itemtype="" itemscope="">
                                    <div class="star_content clearfix" itemtype="" itemscope="" itemprop="aggregateRating">
                                        <div class="star star_on"></div>
                                        <div class="star star_on"></div>
                                        <div class="star star_on"></div>
                                        <div class="star star_on"></div>
                                        <div class="star star_on"></div>
                                        <meta itemprop="worstRating" content="0" />
                                        <meta itemprop="ratingValue" content="5" />
                                        <meta itemprop="bestRating" content="5" />
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@include('front-include.titleseo')
@section('css')
<link rel="stylesheet" href="{{url('site-pub/css/v_16652_b7f17606eef15a0368fa0c2517da2464_all.css')}}" type="text/css" media="all" />
<link rel="stylesheet" href="{{url('site-pub/css/v_16652_e665a4f91cd0a139be43f187a5d71365_print.css')}}" type="text/css" media="all" />
<link rel="stylesheet" href="{{url('site-pub/sass/responsivedivtable.css')}}" type="text/css" media="all" />
@endsection

@section('js')
@include('front-include.productjs') 
@endsection








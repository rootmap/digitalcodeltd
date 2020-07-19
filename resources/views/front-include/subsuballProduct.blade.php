<div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-9">
    <div class="content_scene_cat">
        <h1 class="page-heading title_font">{{$scatname}}</h1>
    </div>
    <h1 class="page-heading product-listing title_font"><span class="cat-name">Shop&nbsp;</span><span class="heading-counter">There are <?php count($product_info)?> products..</span></h1>
    @include('front-include.pagination')
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
                                    <span class="hover-image">
                                        <img style="height:244px;" class="replace-2x" src="{{url('upload/product')}}/{{$pro->photo}}" alt="{{$pro->name}}" title="{{$pro->name}}" height="344" width="270"/>
                                    </span> 
                                    <span class="img_root"> 
                                        <img style="height:244px;" src="{{url('upload/product')}}/{{$pro->photo}}" height="344" width="270" alt="{{$pro->name}}" /> 
                                    </span> 
                                </a>
                            </div>
                            <div class="conditions-box"></div>
                            <div class="product-flags"></div>
                        </div>
                        
                        @if(!empty($pro->unit))
                            <?php 
                            $unitArray= explode(",", $pro->unit);
                            $unit=count($unitArray); ?>
                            <span style="border: 5px #808080 solid; background:#454545; opacity: 0.5; font-weight: bolder; font-size:18px; color: #fff; border-radius: 50px; bottom:80px; right: 0; padding-top:10px; padding-bottom:10px; padding-left:12px; padding-right:12px; position: absolute; z-index: 999;"><?=$unit?></span>
                         @elseif(!empty($pro->iscolor))
                            <?php $color=count($pro->iscolor); ?>
                            <span style="border: 5px #808080 solid; background:#454545; opacity: 0.5; font-weight: bolder; font-size:18px; color: #fff; border-radius: 50px; bottom:80px; right: 0; padding-top:10px; padding-bottom:10px; padding-left:12px; padding-right:12px; position: absolute; z-index: 999;"><?=$color?></span>
                        @endif            
                        <div class="right-block">
                            <h5 itemprop="name"> 
                                <a class="product-name" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" title="{{$pro->name}}" itemprop="url"  style="overflow: hidden; line-height: 40px; height: 40px;"> {{$pro->name}} </a></h5>
                            <p class="product-desc" itemprop="description">{{$pro->description}}</p>
                            <p class="learn-more" itemprop="url"> <a href="" title="See more in the product page">Learn more...</a></p>
                            <div class="price-rating">
                                 @if(empty($pro->unit))
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
                                 @endif
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
                                    <a class="title_font" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" rel="" title="Quick view"> <span><i class="icon-eye"></i></span> </a>
                                        <a class="addToWishlist title_font wishlistProd_1" href="{{url('product-wishlist')}}/{{$pro->id}}/{{$pro->name}}" data-tooltip="Add to Wishlist" rel="nofollow" onclick="WishlistCart('wishlist_block_list', 'add', '{{$pro->id}}', false, 1);
                                                return false;"> <span><i class="icon-heart"></i></span>
                                         </a>
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
                                    <a class="title_font cart_add button_cart button ajax_add_to_cart_button btn btn-default" 
                                        href="javascript:void(0);" 
                                        data-base="<?=url('/')?>" 
                                        title="Add to cart" data-minimal_quantity="1"  
                                        data-token="<?=csrf_token()?>" 
                                        data-cart="{{route('product.addToCartajax',['id'=>$pro->id,'reur'=>base64_encode('home')])}}"> 
                                        <i class="icon-shopping-cart"></i> 
                                        <span>Add to cart</span> 
                                    </a>
                                    @endif
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
    @include('front-include.pagination')
</div>
<div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-9">
    
    <h1 class="page-heading title_font"><span class="cat-name">Search Result &nbsp;</span><span class="heading-counter">Match Found with <code><?=$product?></code> products.</span></h1>
    @include('front-include.pagination')
    @if(!isset($product_info_fetch))
    <div class=" hide-color-options hide-stock-info">
        <h3>No Product Found</h3>
    </div>
    @endif
    <div class=" hide-color-options hide-stock-info">
        <ul class="product_list grid row">

            @if(isset($product_info_fetch))
            @foreach($product_info_fetch as $pro)
            <li class="ajax_block_product col-xs-12 col-sm-6 col-lg-4 first-in-line first-item-of-tablet-line first-item-of-mobile-line">
                <div class="product-container" itemscope itemtype="">
                    <div class="item-inner">
                        <div class="left-block">
                            <div class="product-image-container">
                                <a class="product_img_link product_img" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" title="{{$pro->name}}" itemprop="url"> 
                                    <span class="hover-image"><img class="replace-2x" src="{{url('upload/product')}}/{{$pro->photo}}" alt="{{$pro->name}}" title="{{$pro->name}}" height="344" width="270" style="height: 250px;" /></span> 
                                    <span class="img_root"> <img src="{{url('upload/product')}}/{{$pro->photo}}" height="344" width="270" style="height: 250px;" alt="{{$pro->name}}" /> </span> 
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
                                    <!-- <a class=" title_font" href="{{url('product/$pro->id/$pro->name')}}" rel=""> 
                                        <span><i class="icon-eye"></i></span> 
                                    </a> 
                                    <a class="add_to_compare title_font" href="" data-id-product="1" data-tooltip="Add to Compare" data-product-cover="images/h3.jpg" data-product-name="Demo text">
                                        <span><i class="icon-plus"></i></span>
                                    </a>
                                    <a class="addToWishlist title_font wishlistProd_1" href="#" data-tooltip="Add to Wishlist" rel="nofollow" onclick="WishlistCart('wishlist_block_list', 'add', '1', false, 1); return false;"> 
                                        <span><i class="icon-heart"></i></span> 
                                    </a> -->
                                    <a class="title_font" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" rel="" title="Quick view"> <span><i class="icon-eye"></i></span> </a>
                                        <a class="addToWishlist title_font wishlistProd_1" href="{{url('product-wishlist')}}/{{$pro->id}}/{{$pro->name}}" data-tooltip="Add to Wishlist" rel="nofollow" onclick="WishlistCart('wishlist_block_list', 'add', '{{$pro->id}}', false, 1);
                                                return false;"> <span><i class="icon-heart"></i></span> </a>
                                    <a class="title_font button_cart button ajax_add_to_cart_button btn btn-default" href="{{ route('product.addToCart',['id'=>$pro->id,'reur'=>base64_encode($urlst)]) }}" rel="nofollow" title="Add to cart" data-id-product="1" data-minimal_quantity="1"> 
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
    @include('front-include.pagination')
</div>


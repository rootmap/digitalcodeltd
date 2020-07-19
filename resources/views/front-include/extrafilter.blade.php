<div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-9">
    <div class="content_scene_cat">
        <div class="content_scene_cat_bg" style="background:url('<?=url('/upload/category/'.$cat_info->banner)?>') right center no-repeat; background-size:cover; min-height:270px;">
            <div class="cat_desc"> 
                <span class="category-name title_font"> {{$cat_info->name}} </span>
                <div class="rte">
                    <p>{{$cat_info->description}}</p>
                </div>
            </div>
        </div>
    </div>
    <h1 class="page-heading product-listing title_font"><span class="cat-name">Shop&nbsp;</span><span class="heading-counter">There are <?=count($product_info)?> products.</span></h1>
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
                                    <span class="hover-image">
                                        <img class="replace-2x" style="height:344px !important;" src="{{url('upload/product')}}/{{$pro->photo}}" alt="{{$pro->name}}" title="{{$pro->name}}" height="344"/>
                                    </span> 
                                    <span class="img_root"> <img style="height:344px !important;" src="{{url('upload/product')}}/{{$pro->photo}}" height="344"  alt="{{$pro->name}}" /> </span> 
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
                                    <a class="title_font" href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}" rel="" title="Quick view"> <span><i class="icon-eye"></i></span> </a>
                                        <a class="addToWishlist title_font wishlistProd_1" href="{{url('product-wishlist')}}/{{$pro->id}}/{{$pro->name}}" data-tooltip="Add to Wishlist" rel="nofollow" onclick="WishlistCart('wishlist_block_list', 'add', '{{$pro->id}}', false, 1);
                                                return false;"> <span><i class="icon-heart"></i></span>
                                         </a>
                                    <a class="title_font cart_add button_cart button ajax_add_to_cart_button btn btn-default" 
                                        href="javascript:void(0);" 
                                        data-base="<?=url('/')?>" 
                                        title="Add to cart" data-minimal_quantity="1"  
                                        data-token="<?=csrf_token()?>" 
                                        data-cart="{{route('product.addToCartajax',['id'=>$pro->id,'reur'=>base64_encode('home')])}}"> 
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
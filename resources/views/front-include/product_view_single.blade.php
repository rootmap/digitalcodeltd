<?php $arrayCurrency=MenuPageController::CurrencyDetail(); ?>
<div  id="center_column" class="center_column col-xs-12 col-sm-12 col-md-9">
    <div itemscope itemtype="https://schema.org/Product" class="product-detail">
        <meta itemprop="url" content="#">
        <div class="primary_block row">
            <div class="container">
                <div class="top-hr"></div>
            </div>
            <div class="pb-left-column col-xs-12 col-sm-6" style="max-width:450px">
                <div id="image-block" class="clearfix">

                    <span id="view_full_size"> 
                        <img id="bigpic" itemprop="image" src="{{url('upload/product')}}/{{$product->photo}}" title="Cras ornare tristique elit." alt="Cras ornare tristique elit." width="420" height="535"/> 
                        <span class="span_link no-print">View larger</span> 
                    </span>
                </div>
                <div id="views_block" class="clearfix"> <span class="view_scroll_spacer"> <a id="view_scroll_left" class="" title="Other views" href="javascript:{}"> Previous </a> </span>
                    <div id="thumbs_list">
                        <ul id="thumbs_list_frame">
                            @for($i=224; $i<=224; $i++)
                            <li 
                                @if($i==224)
                                class="last" 
                                @endif
                                id="thumbnail_{{$i}}">
                                <a href="{{url('upload/product')}}/{{$product->photo}}" data-fancybox-group="other-views" class="fancybox shown" title="Cras ornare tristique elit."> 
                                    <img class="img-responsive" id="thumb_225" src="{{url('upload/product')}}/{{$product->photo}}"  alt="Cras ornare tristique elit." title="Cras ornare tristique elit."  height="130" width="102" itemprop="image" /> 
                                </a>
                            </li>
                            @endfor
                            {{--<li id="thumbnail_224">
                                <a href="{{url('upload/product')}}/{{$product->photo}}" data-fancybox-group="other-views" class="fancybox" title="Cras ornare tristique elit."> <img class="img-responsive" id="thumb_224" src="{{url('upload/product')}}/{{$product->photo}}" style="width: 102px !important; height: 130px !important;" alt="Cras ornare tristique elit." title="Cras ornare tristique elit." height="130" width="102" itemprop="image" /> </a>
                            </li>
                            <li id="thumbnail_226">
                                <a href="{{url('upload/product')}}/{{$product->photo}}" data-fancybox-group="other-views" class="fancybox" title="Cras ornare tristique elit."> <img class="img-responsive" id="thumb_226" src="{{url('upload/product')}}/{{$product->photo}}" style="width: 102px !important; height: 130px !important;" alt="Cras ornare tristique elit." title="Cras ornare tristique elit." height="130" width="102" itemprop="image" /> </a>
                            </li>
                            <li id="thumbnail_227" class="last">
                                <a href="{{url('upload/product')}}/{{$product->photo}}" data-fancybox-group="other-views" class="fancybox" title="Cras ornare tristique elit."> <img class="img-responsive" id="thumb_227" src="{{url('upload/product')}}/{{$product->photo}}" style="width: 102px !important; height: 130px !important;" alt="Cras ornare tristique elit." title="Cras ornare tristique elit." height="130" width="102" itemprop="image" /> </a>
                            </li>--}}
                        </ul>
                    </div> <span class="view_scroll_spacer right"> <a id="view_scroll_right" title="Other views" href="javascript:{}"> Next </a> </span>
                </div>
                <p class="resetimg clear no-print"> <span id="wrapResetImages" style="display: none;"> <a href="#" data-id="resetImages"> <i class="icon-repeat"></i> Display all pictures </a> </span>
                </p>
            </div>
            <div class="pb-center-column col-xs-12 col-sm-6">
                <h1 itemprop="name">{{$product->name}}</h1>

                <p id="product_condition">
                    <label>Code: </label>
                    <span class="editable">{{$product->pcode}}</span>
                </p>

<!-- <p id="pQuantityAvailable"> 
<span id="quantityAvailablef">100</span> 
<span >Items</span>
</p> -->

                <p class="warning_inline" id="last_quantities" style="display: none">Warning: Last items in stock!</p>
                <p id="availability_date" style="display: none;"> <span id="availability_date_label">Availability date:</span> <span id="availability_date_value"></span>
                </p>
                <div id="oosHook" style="display: none;"></div>
                <form id="buy_block" action="#" method="post">
                    <p class="hidden">
                        <input type="hidden" name="_token" value="<?= csrf_token() ?>" />
                        <input type="hidden" name="id_product" value="{{$product->id}}" id="product_page_product_id" />
                        <input type="hidden" name="add" value="1" />
                        <input type="hidden" name="reur" value="{{url('product')}}/{{$product->id}}/{{$product->name}}" />
                        <input type="hidden" name="id_product_attribute" id="idCombination" value="" />
                    </p>
                    <div class="box-info-product">
                        <div class="content_prices clearfix">
                            <div>
                                <p class="our_price_display" itemprop="offers" itemscope>
                                    <span  class="price" itemprop="price" content="{{$product->price}}">{{$arrayCurrency->icon}}{{$product->price}}</span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                </p>
                                <p id="old_price" class="hidden"><span id="old_price_display"><span class="price"></span></span>
                                </p>
                                <p id="reduction_percent" style="display:none;"><span id="reduction_percent_display"></span>
                                </p>
                                <p id="reduction_amount" style="display:none"><span id="reduction_amount_display"></span>
                                </p>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="product_attributes clearfix">
                            <p id="minimal_quantity_wanted_p" style="display: none;"> The minimum purchase order quantity for the product is <b id="minimal_quantity_label">1</b>
                            </p>
                            <div id="attributes">
                                <div class="clearfix"></div>
                                @if($product->isunit==1)
                                <fieldset class="attribute_fieldset">
                                    <label class="attribute_label" for="group_1">Available Unit :&nbsp;</label>
                                    <div class="attribute_list">
                                        <select name="unit" id="unit" class="form-control">
                                            <option value="" title="">Select Unit</option>
                                            @foreach($product_unit as $unit)
                                            <option value="{{$unit}}" title="{{$unit}}">{{$unit}} {{--$product->put_name--}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                @endif    

                                @if($product->iscolor==1)
                                <fieldset class="attribute_fieldset">
                                    <label class="attribute_label" for="group_3">Color :&nbsp;</label>
                                    <div class="attribute_list">
                                        <select name="color" id="color" class="form-control">
                                            <option value="" title="">Select Color</option>
                                            @foreach($color as $col)
                                            <option value="{{$col->name}}" title="{{$col->name}}">{{$col->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </fieldset>
                                @endif 
                            </div>
                            <div id="attributes">
                                <p id="quantity_wanted_p">
                                    <input type="number" min="1" name="qty" id="quantity_wanted" class="text" value="1" />
                                    <a href="#" data-field-qty="qty" class="btn btn-default button-minus product_quantity_down"> <span><i class="icon-minus"></i></span> </a>
                                    <a href="#" data-field-qty="qty" class="btn btn-default button-plus product_quantity_up"> <span><i class="icon-plus"></i></span> </a> <span class="clearfix"></span>
                                </p>
                            </div>

                            <div class="box-cart-bottom">
                                <div>
                                    <p class="buttons_bottom_block no-print">
                                        <button 
                                            href="javascript:void(0);" 
                                            data-base="<?= url('/') ?>" 
                                            title="Add to cart" data-minimal_quantity="1"  
                                            data-token="<?= csrf_token() ?>" 
                                            data-cart="{{url('cart-new-add')}}/{{$product->id}}"    
                                            type="button" name="Submit" class="exclusive title_font cart_add_product"> <span>Add to cart</span> </button>
                                    </p>
                                </div>
                            </div>

                        </div>
                        <div id="short_description_block">
                            <div id="short_description_content" class="rte align_justify" itemprop="description">
                                @if(!empty($product->description))
                                <h4 style="border-bottom:1px #ccc dashed; font-weight: bold; line-height: 40px;">
                                    Description </h4>
                                @endif
                                <blockquote><p><?= nl2br($product->description) ?></p></blockquote>
                            </div>
                            <p class="buttons_bottom_block"> <a href="javascript:{}" class="button"> More details </a>
                            </p>
                        </div>
                    </div>
                    <div id="usefull_link_block" class="clearfix no-print">
                        <div class="buttons_bottom_block no-print"> <a id="wishlist_button_nopop" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '1', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;" rel="nofollow" title="Add to my wishlist"> Add to wishlist </a>
                        </div>
                        <div class="print"> <a href="javascript:print();"> Print </a>
                        </div>
                        <div class="sendtofriend"> <a id="send_friend_button" href="#send_friend_form"> Send to a friend </a>

                            @include('front-include.productsend')

                        </div>
                        <p class="socialsharing_product list-inline no-print">
                            <button data-type="twitter" type="button" class="btn btn-default btn-twitter social-sharing"> <i class="icon-twitter"></i> Tweet </button>
                            <button data-type="facebook" type="button" class="btn btn-default btn-facebook social-sharing"> <i class="icon-facebook"></i> Share </button>
                            <button data-type="google-plus" type="button" class="btn btn-default btn-google-plus social-sharing"> <i class="icon-google-plus"></i> Google+ </button>
                            <button data-type="pinterest" type="button" class="btn btn-default btn-pinterest social-sharing"> <i class="icon-pinterest"></i> Pinterest </button>
                        </p>

                    </div>
                </form>
            </div>
        </div>

        <div id="idTab5">
            <div id="product_comments_block_tab">


                @if(isset($productreview))
                @foreach($productreview as $prv)
                <div class="comment row" itemprop="review" itemscope itemtype="https://schema.org/Review">
                    <div class="comment_author col-sm-2"> <span>Grade&nbsp;</span>
                        <div class="star_content clearfix" itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating">
                            <div class="star star_on"></div>
                            <div class="star star_on"></div>
                            <div class="star star_on"></div>
                            <div class="star star_on"></div>
                            <div class="star"></div>
                            <meta itemprop="worstRating" content="0" />
                            <meta itemprop="ratingValue" content="4" />
                            <meta itemprop="bestRating" content="5" />
                        </div>
                        <div class="comment_author_infos"> <strong itemprop="author">{{$prv->customer_name}}</strong>
                            <meta itemprop="datePublished" content="2016-06-23" /> <em>06/23/2016</em>
                        </div>
                    </div>
                    <div class="comment_details col-sm-10">
                        <p itemprop="name" class="title_block"> <strong>{{$prv->title}}</strong>
                        </p>
                        <p itemprop="reviewBody">{{$prv->comment}}</p>
                        <ul></ul>
                    </div>
                </div>
                @endforeach
                @endif


<!--                            <p class="align_center">
                                <a id="new_comment_tab_btn" class="btn btn-default button button-small open-comment-form" href="#new_comment_form"> <span>Write your review!</span> </a>
                            </p>-->
            </div>
        </div>
        @include('front-include.prductreview')


    </div>
</div>
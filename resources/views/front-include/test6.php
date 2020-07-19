


<div class="columns-container">
    <div id="columns" class="container">
        <div id="slider_row" class="row"></div>
        <div class="row" style="padding-top: 40px;">

            <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-9">
                <div itemscope itemtype="" class="product-detail">
                    <meta itemprop="url" content="">
                    <div class="primary_block row">
                        <div class="container">
                            <div class="top-hr"></div>
                        </div>
                        <div class="pb-left-column col-xs-12 col-sm-6" style="max-width:450px">
                            <div id="image-block" class="clearfix">
                                <div class="conditions-box">
                                    <p class="new"><span>New</span></p>
                                </div> <span id="view_full_size"> <img id="bigpic" itemprop="image" src="{{url('upload/product')}}/{{$product->photo}}" title="Demo Text" alt="Demo Text" width="420" height="535"/> <span class="span_link no-print">View larger</span> </span>
                            </div>
                            <div id="views_block" class="clearfix"> <span class="view_scroll_spacer"> <a id="view_scroll_left" class="" title="Other views" href="javascript:{}"> Previous </a> </span>
                                <div id="thumbs_list">
                                    <ul id="thumbs_list_frame">
                                        <li id="thumbnail_175">
                                            <a href="{{url('upload/product')}}/{{$product->photo}}" data-fancybox-group="other-views" class="fancybox shown" title="Demo Text"> <img class="img-responsive" id="thumb_175" src="{{url('upload/product')}}/{{$product->photo}}" alt="Demo Text" title="Demo Text" height="130" width="102" itemprop="image" /> </a>
                                        </li>
                                        <li id="thumbnail_176">
                                            <a href="images/n3.jpg" data-fancybox-group="other-views" class="fancybox" title="Demo Text"> <img class="img-responsive" id="thumb_176" src="images/n3.jpg" alt="Demo Text" title="Demo Text" height="130" width="102" itemprop="image" /> </a>
                                        </li>
                                        <li id="thumbnail_177">
                                            <a href="images/n4.jpg" data-fancybox-group="other-views" class="fancybox" title="Demo Text"> <img class="img-responsive" id="thumb_177" src="images/n4.jpg" alt="Demo Text" title="Demo Text" height="130" width="102" itemprop="image" /> </a>
                                        </li>
                                        <li id="thumbnail_178" class="last">
                                            <a href="images/n5.jpg" data-fancybox-group="other-views" class="fancybox" title="Demo Text"> <img class="img-responsive" id="thumb_178" src="images/n5.jpg" alt="Demo Text" title="Demo Text" height="130" width="102" itemprop="image" /> </a>
                                        </li>
                                    </ul>
                                </div> <span class="view_scroll_spacer right"> <a id="view_scroll_right" title="Other views" href="javascript:{}"> Next </a> </span></div>
                            <p class="resetimg clear no-print"> <span id="wrapResetImages" style="display: none;"> <a href="" data-id="resetImages"> <i class="icon-repeat"></i> Display all pictures </a> </span></p>
                        </div>
                        <div class="pb-center-column col-xs-12 col-sm-6">
                            <h1 itemprop="name">{{$product->name}}</h1>
                            <div id="product_comments_block_extra" class="no-print" itemprop="aggregateRating" itemscope itemtype="">
                                <div class="comments_note clearfix">
                                    <div class="star_content clearfix">
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
                                <ul class="comments_advices">
                                    <li> <a href="#idTab5" class="reviews"> Based on (<span itemprop="reviewCount">1</span>) ratings </a></li>
                                    <li> <a class="open-comment-form" href="#new_comment_form"> Write a review </a></li>
                                </ul>
                            </div>
                            <p id="product_condition">
                                <label>Condition: </label>
                                <link itemprop="itemCondition" href="" /> <span class="editable">New product</span></p>
                            <div id="short_description_block">
                                <div id="short_description_content" class="rte align_justify" itemprop="description">
                                    <p>Product Short Description</p>
                                </div>
                                <p class="buttons_bottom_block"> <a href="javascript:{}" class="button"> More details </a></p>
                            </div>
                            <p id="pQuantityAvailable" style="display: none;"> <span id="quantityAvailable">0</span> <span id="quantityAvailableTxt">Item</span> <span id="quantityAvailableTxtMultiple">Items</span></p>
                            <div class="content_prices clearfix">
                                <p class="our_price_display" itemprop="offers" itemscope itemtype="">
                                    <span id="our_price_display" class="price" itemprop="price" style="font-size: 0.7cm;" content="{{$product->price}}">${{$product->price}}</span>
                                    <meta itemprop="priceCurrency" content="USD" />
                                </p>
                                <div class="clear"></div>
                            </div>
                            <p id="availability_statut"> 
<!--                                <a class="button ajax_add_to_cart_button btn btn-default caption-add-to-cart title_font" rel="nofollow" href="{{ route('product.addToCart',['id'=>$product->id]) }}" title="Add to carts" data-id-product="#" data-minimal_quantity="1" data-token="#" data-cart="">  <span><i class="icon-shopping-cart"></i> Add to cart</span> </a>-->
                                <a href="{{ route('product.addToCart',['id'=>$product->id,'reur'=>base64_encode('product/'.$product->id.'/'.$product->name)]) }}" class="btn btn-success btn-large" style="padding-top: 10px;">
                                    <span><i class="icon-shopping-cart"></i> Add to cart</span>
                                </a>
                            </p>


<!--                                        <span id="availability_value" class="label label-danger">This product is no longer in stock</span></p>-->
                            <p class="warning_inline" id="last_quantities" style="display: none">Warning: Last items in stock!</p>
                            <p id="availability_date" style="display: none;"> <span id="availability_date_label">Availability date:</span> <span id="availability_date_value"></span></p>
                            <div id="oosHook"></div>
                            <form id="buy_block" action="en/cart" method="post">

                                <div class="box-info-product">

                                    <div class="product_attributes clearfix">
                                        <p id="minimal_quantity_wanted_p"> The minimum purchase order quantity for the product is <b id="minimal_quantity_label">1</b></p>
                                        <div id="attributes">
                                            <div class="clearfix"></div>
                                            <fieldset class="attribute_fieldset">
                                                <label class="attribute_label" for="group_1">Size :&nbsp;</label>
                                                <div class="attribute_list">
                                                    <select name="group_1" id="group_1" class="form-control attribute_select no-print">
                                                        <option value="1" selected="selected" title="S">S</option>
                                                        <option value="2" title="M">M</option>
                                                        <option value="3" title="L">L</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                            <fieldset class="attribute_fieldset">
                                                <label class="attribute_label" for="group_3">Color :&nbsp;</label>
                                                <div class="attribute_list">
                                                    <select name="group_3" id="group_3" class="form-control attribute_select no-print">
                                                        <option value="11" title="Black">Black</option>
                                                        <option value="13" title="Orange">Orange</option>
                                                        <option value="14" title="Blue">Blue</option>
                                                        <option value="16" selected="selected" title="Yellow">Yellow</option>
                                                    </select>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <p id="quantity_wanted_p">
                                            <input type="number" min="1" name="qty" id="quantity_wanted" class="text" value="1" />
                                            <a href="#" data-field-qty="qty" class="btn btn-default button-minus product_quantity_down"> <span><i class="icon-minus"></i></span> </a>
                                            <a href="#" data-field-qty="qty" class="btn btn-default button-plus product_quantity_up"> <span><i class="icon-plus"></i></span> </a> <span class="clearfix"></span></p>

                                    </div>
                                </div>
                                <div id="usefull_link_block" class="clearfix no-print">
                                    <div class="buttons_bottom_block no-print"> <a id="wishlist_button_nopop" href="#" onclick="WishlistCart('wishlist_block_list', 'add', '11', $('#idCombination').val(), document.getElementById('quantity_wanted').value); return false;" rel="nofollow" title="Add to my wishlist"> Add to wishlist </a></div>
                                    <div class="print"> <a href="javascript:print();"> Print </a></div>
                                    <div class="sendtofriend"> <a id="send_friend_button" href="#send_friend_form"> Send to a friend </a>
                                        <div style="display: none;">
                                            <div id="send_friend_form">
                                                <h2 class="page-subheading"> Send to a friend</h2>
                                                <div class="row">
                                                    <div class="product clearfix col-xs-12 col-sm-6"> 
                                                        <img src="{{url('upload/product')}}/{{$product->photo}}" height="344" width="270" alt="{{$product->name}}" />
                                                        <div class="product_desc">
                                                            <p class="product_name"> <strong>{{$product->name}}</strong></p>
                                                            <p>{{$product->description}}</p>
                                                        </div>
                                                    </div>
                                                    <div class="send_friend_form_content col-xs-12 col-sm-6" id="send_friend_form_content">
                                                        <div id="send_friend_form_error"></div>
                                                        <div id="send_friend_form_success"></div>
                                                        <div class="form_container">
                                                            <p class="intro_form"> Recipient :</p>
                                                            <p class="text">
                                                                <label for="friend_name"> Name of your friend <sup class="required">*</sup> : </label>
                                                                <input id="friend_name" name="friend_name" type="text" value="" />
                                                            </p>
                                                            <p class="text">
                                                                <label for="friend_email"> E-mail address of your friend <sup class="required">*</sup> : </label>
                                                                <input id="friend_email" name="friend_email" type="text" value="" />
                                                            </p>
                                                            <p class="txt_required"> <sup class="required">*</sup> Required fields</p>
                                                        </div>
                                                        <p class="submit">
                                                            <button id="sendEmail" class="btn button button-small" name="sendEmail" type="submit"> <span>Send</span> </button>&nbsp; or&nbsp; <a class="closefb" href="#"> Cancel </a></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="socialsharing_product list-inline no-print">
                                        <button data-type="twitter" type="button" class="btn btn-default btn-twitter social-sharing"> <i class="icon-twitter"></i> Tweet </button>
                                        <button data-type="facebook" type="button" class="btn btn-default btn-facebook social-sharing"> <i class="icon-facebook"></i> Share </button>
                                        <button data-type="google-plus" type="button" class="btn btn-default btn-google-plus social-sharing"> <i class="icon-google-plus"></i> Google+ </button>
                                        <button data-type="pinterest" type="button" class="btn btn-default btn-pinterest social-sharing"> <i class="icon-pinterest"></i> Pinterest </button>
                                    </p>
                                    <div id="fieldsizechart-show" class="buttons_bottom_block additional_button">Size Chart</div>
                                    <div id="fieldsizechart"> <span class="cross" title="Close window"></span>
                                        <div class="fieldsizechart-content"> <span class="page-heading">Size Chart</span>
                                            <div class="tab-content">
                                                <div id="fieldsizechart-global" class="tab-pane rte fade active in">
                                                    <div class="row">
                                                        <div class="left-content-size">
                                                            <div class="hover_banner_img">
                                                                <a href="#"><img width="300" src="{{url('upload/product')}}/{{$product->photo}}" alt="{{$product->name}}" /></a>
                                                            </div>
                                                        </div>
                                                        <div class="right-content-size">
                                                            <h2 class="title-measure"> {{$product->name}}</h2>
                                                            <ul class="text-measure">
<!--                                                                <li><span>Brand   <em>1</em>Size</span></li>-->
                                                                <li><span>Product in Stock </span></li>
                                                            </ul>
                                                            <h2 class="title-measure a2">size guide visible to all products</h2>
                                                            <table class="table table-sizegudie">
                                                                <thead>
                                                                    <tr>
                                                                        <th></th>
                                                                        <th>UK</th>
                                                                        <th>USA</th>
                                                                        <th class="border-right">EU</th>
                                                                        <th>BUST</th>
                                                                        <th>Waist</th>
                                                                        <th>Hips</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr class="backgroundc">
                                                                        <td>XS</td>
                                                                        <td>8</td>
                                                                        <td>4</td>
                                                                        <td class="border-right">34</td>
                                                                        <td>31/32</td>
                                                                        <td>23/24</td>
                                                                        <td>33/34</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>S</td>
                                                                        <td>10</td>
                                                                        <td>6</td>
                                                                        <td class="border-right">36</td>
                                                                        <td>33/34</td>
                                                                        <td>25/26</td>
                                                                        <td>35/36</td>
                                                                    </tr>
                                                                    <tr class="backgroundc">
                                                                        <td>M</td>
                                                                        <td>12</td>
                                                                        <td>8</td>
                                                                        <td class="border-right">38</td>
                                                                        <td>35/36</td>
                                                                        <td>27/28</td>
                                                                        <td>37/38</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>L</td>
                                                                        <td>12</td>
                                                                        <td>8</td>
                                                                        <td class="border-right">38</td>
                                                                        <td>35/36</td>
                                                                        <td>27/28</td>
                                                                        <td>37/38</td>
                                                                    </tr>
                                                                    <tr class="backgroundc">
                                                                        <td>XL</td>
                                                                        <td>10</td>
                                                                        <td>6</td>
                                                                        <td class="border-right">36</td>
                                                                        <td>33/34</td>
                                                                        <td>25/26</td>
                                                                        <td>35/36</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="fieldsizechart-overlay"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <ul id="more_info_tabs" class="idTabs idTabsShort clearfix">
                        <li><a href="#idTab1"><span>More info</span></a></li>
                        <li><a id="more_info_tab_data_sheet" href="#idTab2">Data sheet</a></li>
                        <li><a href="#idTab5">Reviews</a></li>
                    </ul>
                    <section id="idTab1" class="page-product-box">
                        <div class="rte">
                            <p>{{$product->description}}</p>
                        </div>
                    </section>
                    <section id="idTab2" class="page-product-box">
                        <table class="table-data-sheet">
                            <tr class="odd">
                                <td>Demo Compositions</td>
                                <td>Demo Viscose</td>
                            </tr>
                            <tr class="even">
                                <td>Demo Styles</td>
                                <td>Demo Casual</td>
                            </tr>
                            <tr class="odd">
                                <td>Demo Properties</td>
                                <td>Demo Maxi Dress</td>
                            </tr>
                        </table>
                    </section>
                    <div id="idTab5">
                        <div id="product_comments_block_tab">
                            <div class="comment row" itemprop="review" itemscope itemtype="">
                                <div class="comment_author col-sm-2"> <span>Grade&nbsp;</span>
                                    <div class="star_content clearfix" itemprop="reviewRating" itemscope itemtype="">
                                        <div class="star star_on"></div>
                                        <div class="star star_on"></div>
                                        <div class="star star_on"></div>
                                        <div class="star star_on"></div>
                                        <div class="star"></div>
                                        <meta itemprop="worstRating" content="0" />
                                        <meta itemprop="ratingValue" content="4" />
                                        <meta itemprop="bestRating" content="5" />
                                    </div>
                                    <div class="comment_author_infos"> <strong itemprop="author">product name</strong>
                                        <meta itemprop="datePublished" content="2016-10-15" /> <em>10/15/2016</em></div>
                                </div>
                                <div class="comment_details col-sm-10">
                                    <p itemprop="name" class="title_block"> <strong>good</strong></p>
                                    <p itemprop="reviewBody">good</p>
                                    <ul>
                                        <li> This comment useful to you?
                                            <button class="usefulness_btn btn btn-default button button-small" data-is-usefull="1" data-id-product-comment="8"> <span>Yes</span> </button>
                                            <button class="usefulness_btn btn btn-default button button-small" data-is-usefull="0" data-id-product-comment="8"> <span>No</span> </button>
                                        </li>
                                        <li> <span class="report_btn" data-id-product-comment="8"> Report abuse </span></li>
                                    </ul>
                                </div>
                            </div>
                            <p class="align_center">
                                <a id="new_comment_tab_btn" class="btn btn-default button button-small open-comment-form" href="#new_comment_form"> <span>Write your review!</span> </a>
                            </p>
                        </div>
                    </div>
                    <div style="display: none;">
                        <div id="new_comment_form">
                            <form id="id_new_comment_form" action="#">
                                <h2 class="page-subheading"> Write a review</h2>
                                <div class="row">
                                    <div class="product clearfix col-xs-12 col-sm-6"> <img src="{{url('upload/product')}}/{{$product->photo}}" height="159" width="125" alt="{{$product->name}}" />
                                        <div class="product_desc">
                                            <p class="product_name"> <strong>{{$product->name}}</strong></p>
                                            <p>{{$product->description}}</p>
                                        </div>
                                    </div>
                                    <div class="new_comment_form_content col-xs-12 col-sm-6">
                                        <div id="new_comment_form_error" class="error" style="display: none; padding: 15px 25px">
                                            <ul></ul>
                                        </div>
                                        <ul id="criterions_list">
                                            <li>
                                                <label>Quality:</label>
                                                <div class="star_content">
                                                    <input class="star not_uniform" type="radio" name="criterion[1]" value="1" />
                                                    <input class="star not_uniform" type="radio" name="criterion[1]" value="2" />
                                                    <input class="star not_uniform" type="radio" name="criterion[1]" value="3" />
                                                    <input class="star not_uniform" type="radio" name="criterion[1]" value="4" checked="checked" />
                                                    <input class="star not_uniform" type="radio" name="criterion[1]" value="5" />
                                                </div>
                                                <div class="clearfix"></div>
                                            </li>
                                        </ul>
                                        <label for="comment_title"> Title: <sup class="required">*</sup> </label>
                                        <input id="comment_title" name="title" type="text" value="" />
                                        <label for="content"> Comment: <sup class="required">*</sup> </label>
                                        <textarea id="content" name="content"></textarea>
                                        <div id="new_comment_form_footer">
                                            <input id="id_product_comment_send" name="id_product" type="hidden" value='11' />
                                            <p class="fl required"><sup>*</sup> Required fields</p>
                                            <p class="fr">
                                                <button id="submitNewMessage" name="submitMessage" type="submit" class="btn button button-small"> <span>Submit</span> </button>&nbsp; or&nbsp; <a class="closefb" href="#"> Cancel </a></p>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="left_column" class="column col-xs-12 col-sm-12 col-md-3">
                <div id="categories_block_left" class="block">
                    @if(isset($cat_info))
                    <h2 class="title_block">Categories</h2>
                    <div class="block_content">
                        <ul class="tree dhtml">

                            <li> <a href="{{url('category')}}/{{$cat_info->id}}/{{$cat_info->name}}" title="{{$cat_info->name}}"> {{$cat_info->name}} </a>
                                @if(isset($cat_info->subcat))
                                <ul>
                                    @foreach($cat_info->subcat as $sc)
                                    <li> <a href="{{url('sub-category')}}/{{$sc->id}}/{{$sc->name}}" title="{{$sc->name}}"> {{$sc->name}} </a></li>
                                    @endforeach
                                </ul>
                                @endif
                            </li>

                        </ul>
                    </div>
                    @endif

                </div>
                
                
                @if(isset($topseller))
                <div id="best-sellers_block_right" class="block vertical_mode">
                    <h4 class="title_block title_font"> <a href="best-sales" title="View a top sellers products"> Top sellers </a></h4>
                    <div id="field_bestsellers" class="grid carousel-grid owl-carousel block_content">
                        
                        @foreach($topseller as $topse)
                        <div class="item">
                            <div class="item-content clearfix">
                                <div class="left-content">
                                    <a href="{{url('product')}}/{{$topse->id}}/{{$topse->name}}" title="{{$topse->name}}"> 
                                        <img src="{{url('upload/product')}}/{{$topse->photo}}" style="width: 80px;" height="10" width="10" alt="{{$topse->name}}" /> 
                                    </a>
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
        </div>
    </div>
</div>
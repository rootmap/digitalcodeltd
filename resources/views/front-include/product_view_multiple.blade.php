<?php $arrayCurrency=MenuPageController::CurrencyDetail(); ?>
<div  id="center_column" class="center_column col-xs-12 col-sm-12 col-md-9">
    <div itemscope itemtype="https://schema.org/Product" class="product-detail">
        <meta itemprop="url" content="#">
        <div class="primary_block row">
            <div class="container">
                <div class="top-hr"></div>
            </div>



            <div class="pb-center-column col-xs-12 col-sm-12">
                <h1 itemprop="name">{{$product->name}}</h1>



                <div id="views_block" class="clearfix"> 
                    <div id="thumbs_list">
                        <ul id="thumbs_list_frame">
                            @for($i=224; $i<=224; $i++)
                            <li 
                                @if($i==224)
                                class="last" 
                                @endif
                                id="thumbnail_{{$i}}">
                                <a href="{{url('upload/product')}}/{{$product->photo}}" data-fancybox-group="other-views" class="fancybox shown" title="{{$product->name}}"> 
                                    <img class="img-responsive" id="thumb_225" src="{{url('upload/product')}}/{{$product->photo}}"  alt="{{$product->name}}" title="{{$product->name}}"  height="130" width="102" itemprop="image" /> 
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
                    </div> 
                </div>


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

                        <!--responsive table code-->
                        <style type="text/css">

                        </style>    
                        <!--responsive table code-->

                        <div class="wrappers">





                            <div class="table">

                                <div class="row_table header blue">
                                    <div class="cell">
                                        Code
                                    </div>
                                    <div class="cell">
                                        Product
                                    </div>
                                    <div class="cell">
                                        Price
                                    </div>
                                    @if($product->iscolor==1)
                                    <div class="cell">
                                        Color
                                    </div>
                                    @endif 
                                    <div class="cell">
                                        QTY
                                    </div>
                                    <div class="cell">
                                        &nbsp;
                                    </div>
                                </div>
                                @if(isset($proRelatedUnitProduct))
                                @foreach($proRelatedUnitProduct as $rp)
                                <div class="row_table">
                                    <div class="cell">
                                        {{$rp->pcode}}
                                    </div>
                                    <div class="cell">
                                        {{$rp->name}}
                                    </div>
                                    <div class="cell">
                                        {{$arrayCurrency->icon}}{{$rp->price}}
                                    </div>
                                    @if($product->iscolor==1)
                                    <div class="cell">
                                        <select style="width: 100px;" name="color" id="color" class="form-control">
                                            <option value="" title="">Select Color</option>
                                            @foreach($color as $col)
                                            <option value="{{$col->name}}" title="{{$col->name}}">{{$col->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @endif 
                                    <div class="cell staticParent" style="line-height: 100%;">
                                        <input class="form-control child" style="width: 100px; margin-bottom:-15px; font-size: 15px; padding-bottom: 0px; font-weight: bold;" value="1" name="qty_child_{{$rp->id}}" type="number">
                                    </div>
                                    <div class="cell">
                                        <button style="margin-top: 5px;"
                                                href="javascript:void(0);" 
                                                data-base="<?= url('/') ?>" 
                                                title="Add to cart" data-base-quantity="qty_child_{{$rp->id}}"  
                                                data-token="<?= csrf_token() ?>" 
                                                data-cart="{{url('cart-new-Color-add')}}/{{$rp->id}}"    
                                                type="button" name="Submit" class="title_font cart_add_product_multi btn btn-primary"><i class="fa fa-cart-arrow-down"></i> <span>Add to cart</span> </button>
                                    </div>
                                </div>
                                @endforeach
                                @endif


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
                    </div>

                </form>
            </div>
        </div>




    </div>
</div>
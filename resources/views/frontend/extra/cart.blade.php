                <style type="text/css">
                    .cart-data-logo
                    {
                        height: 25px !important;
                    }
                    .item-display{ margin: 5px 10px;  }
                    .tab_right_header .cart_item{  margin: 4px 10px !important; }
                    .tab_right_header{ height: 46px !important;  }  
                    .mini-cart-total{ padding: 0 10px 6px 10px !important;  }
                    .mini-cart .checkout{ padding-top: 6px !important; }
                    .tab_right_sidebar{ padding-bottom: 6px !important;  }


                    /* width */
                    .mini-cart-list::-webkit-scrollbar {
                        width: 5px;
                    }

                    /* Track */
                    .mini-cart-list::-webkit-scrollbar-track {
                        background: #f1f1f1; 
                    }
                     
                    /* Handle */
                    .mini-cart-list::-webkit-scrollbar-thumb {
                        background: #888; 
                    }

                    /* Handle on hover */
                    .mini-cart-list::-webkit-scrollbar-thumb:hover {
                        background: #e7512f; 
                    }

                    .mini-cart .checkout a
                    {
                        padding: 0 10px;
                    }
                </style>


                <!-- cell9 -->
                <div class="cell-3" id="mobileCartWeb">
                    <div class="tab_right_sidebar" id="mini_page_shopping_cart">
                        <div class="tab_right_header">
                            <div class="pull-left cart-logo-pure">
                                <img  class="cart-data-logo" src="{{url('front-theme/images/cart-icon.png')}}">
                            </div>
                            <div class="pull-left cart">
                                <span class="pull-left item-display">Your Selected items</span>
                                <span class="cart_item mini_shopping-cart-quantity pull-left text-center" style="display: inline; border-radius: 5px;">0</span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="padd-top-10"></div>
                        <div class="mini-cart">
                            <style type="text/css">
                                
                            </style>
                            <ul class="mini-cart-list">
                                                           
                            </ul>
                            <div class="mini-cart-totalss clearfix rec_place" style="padding-bottom: 5px !important;">
                                
                                @if($tab->collection_only==1)
                                    <input style="display: none;"  type="radio" value="Delivery" name="rec" id="rec_1"> 
                                    <label class="cell-8 btn btn-danger" style="margin-right: 20px; margin-left: 10px;  text-transform: capitalize; ">
                                        <input  checked="checked" readonly="readonly" style="position: absolute; margin-top:8px; margin-left: -78px;" type="radio" value="Collect" name="rec" id="rec_0"> 
                                        <span> Only Collection</span>
                                    </label>

                                @else

                                    <label class="cell-5 btn btn-danger" style="margin-right: 20px; margin-left: 10px; text-transform: capitalize;">
                                        <input checked="checked" style="position: absolute; margin-top:8px; margin-left: -17px; "  type="radio" value="Delivery" name="rec" id="rec_1"> 
                                        Delivery
                                    </label>
                                    <label class="cell-5 btn btn-danger" style=" text-transform: capitalize; padding-left: 25px;">
                                        <input style="position: absolute; margin-top:8px; margin-left: -48px;" type="radio" value="Collect" name="rec" id="rec_0"> 
                                        <span>Collection</span>
                                    </label>

                                @endif
                                
                                
                            </div>
                            <div class="mini-cart-total">
                                <div class="clearfix">
                                    <div class="left">Sub-Total:</div>
                                    <div class="right mini_cart-subtotal">£<span>230.00</span></div>
                                </div>
                                @if(isset($common))
                                    <div  data-disamount-type="{{$common->discount_option}}"  class="clearfix spend-discount" data-disamount-limit="{{$common->minimum_amount}}" data-discount="{{$common->discount_amount}}">
                                        @if(!empty($common->message))
                                            <div class="restaurantOffers">
                                                <p>{{$common->message}}</p>
                                            </div>
                                        @endif
                                    </div>
                                @elseif(isset($colndel))
                                    @foreach($colndel as $cnd)

                                        <div data-disamount-type="{{$cnd->discount_option}}" class="clearfix spend-discount-colndel spx-{{$cnd->discount_option}}" data-disamount-limit="{{$cnd->minimum_amount}}" data-discount="{{$cnd->discount_amount}}">
                                            @if(!empty($cnd->message))
                                            <div class="restaurantOffers">
                                                <p>{{$cnd->message}}</p>
                                            </div>
                                            @endif
                                        </div>
                                    @endforeach
                                @endif

                                @if(isset($tax))
                                    <div class="clearfix tax-space">
                                        <div class="left">Tax (<span data-type="1">{{$tax->tax_amount}}</span>):</div>
                                        <div class="right">£<span>0.00</span></div>
                                    </div>
                                @endif

                                <div class="clearfix discount-space">
                                    <div class="left">Discount <span></span>:</div>
                                    <div class="right">£<span>0.00</span></div>
                                </div>
                                <div class="clearfix">
                                </div>
                                <div class="clearfix">
                                    <div class="left">Total:</div>
                                    <div class="right total-cart-check-price">£<span>200.20</span></div>
                                </div>
                            </div>
                            @if ($orderINfoText->isoffline==0)
                            <div class="checkout">
                                <a class="btn empty-cart" href="javascript:void(0);">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                    Empty Cart</a>
                                <a class="btn checkout-page" href="javascript:void(0);">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                                    Checkout 
                                </a>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>  
                <!-- cell3 -->



               
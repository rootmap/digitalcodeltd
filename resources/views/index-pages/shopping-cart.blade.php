@extends('front-layout.master')
<?php $arrayCurrency=MenuPageController::CurrencyDetail(); ?>
@section('content')
<div id="page">
    <div class="columns-container">
        <div id="columns" class="container">
            <div class="row" style="padding-top: 10px;">

                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 id="cart_title" class="page-heading">Shopping-cart summary <span class="heading-counter">Your shopping cart contains: <span id="summary_products_quantity">{{$totalQty}} product</span> </span></h1>
                    <p id="emptyCartWarning" class="alert alert-warning unvisible">Your shopping cart is empty.</p>
                    <div class="cart_last_product">
                        <div class="cart_last_product_header">
                            <div class="left">Last product added</div>
                        </div>
                        <a class="cart_last_product_img" href="#"> <img src="images/printed-dress.jpg" alt="Demo Text" /> </a>
                        <div class="cart_last_product_content">
                            <p class="product-name"> <a href=""> Product Name </a></p> <small> <a href=""> Description </a> </small></div>
                    </div>
                    <div id="order-detail-content" class="table_block table-responsive">
                        <table id="cart_summary" class="table table-bordered stock-management-on">
                            <thead>
                                <tr>
                                    <th class="cart_product first_item">Product</th>
                                    <th class="cart_description item">Description</th>
                                    <th class="cart_avail item text-center">Availability</th>
                                    <th class="cart_unit item text-right">Unit price</th>
                                    <th class="cart_quantity item text-center">Qty</th>
                                    <th class="cart_delete last_item">&nbsp;</th>
                                    <th class="cart_total item text-right">Total</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr class="cart_total_price">
                                    <td rowspan="6" colspan="3" id="cart_voucher" class="cart_voucher">
                                        <p class="cart_navigation">
                                            <a href="{{url('home')}}" class="button-exclusive btn btn-default" title="Continue shopping"> <i class="icon-chevron-left"></i>Continue shopping </a>
                                        </p>
                                    </td>
                                    <td colspan="3" class="text-right">Total products</td>
                                    <td colspan="2" class="price" id="total_product" style="color: #000;">{{$arrayCurrency->icon}}<span id="shoppingCartRawTotal"><?=number_format($totalPrice,2)?></span></td>
                                </tr>
                                <tr style="display: none;">
                                    <td colspan="3" class="text-right"> Total gift-wrapping cost</td>
                                    <td colspan="2" class="price-discount price" id="total_wrapping" style="color: #000;"> {{$arrayCurrency->icon}}0.00</td>
                                </tr>

                               

                                
                                    <tr class="cart_total_delivery" id="underTotalcost_delivery">
                                        <td colspan="3" class="text-right">Extra Shipping Charge</td>
                                        <td colspan="2" class="price" id="total_shipping" style="color: #000;">
                                            {{$arrayCurrency->icon}}<span id="extraShippingCharge"><?php 
                                            if($totalPrice<150)
                                            {
                                                echo 9.95;
                                                $totalPrice+=9.95; 
                                            }
                                            else
                                            {
                                                echo 0;
                                            }
                                            
                                            ?></span>
                                            
                                    </td>
                                    </tr>

                                <?php 
                                $vat=number_format((($totalPrice*20)/100),2);
                                ?>

                                <?php $totalPrice+=$vat; ?>



                                <tr class="cart_total_delivery">
                                    <td colspan="3" class="text-right">Total Vat</td>
                                    <td colspan="2" class="price" id="total_shipping" style="color: #000;">{{$arrayCurrency->icon}}<span id="shoppingVatTotal">{{$vat}}</span></td>
                                </tr>

                                <tr class="cart_total_voucher unvisible">
                                    <td colspan="3" class="text-right"> Total vouchers</td>
                                    <td colspan="2" class="price-discount price" id="total_discount" style="color: #000;"> {{$arrayCurrency->icon}}0.00</td>
                                </tr>
                                <tr class="cart_total_price">
                                    <td colspan="3" class="total_price_container text-right"> <span>Total</span>
                                        <div class="hookDisplayProductPriceBlock-price"></div>
                                    </td>
                                    <td colspan="2" class="price" id="total_price_container" style="color: #000;"> <span id="total_price">{{$arrayCurrency->icon}}<span id="cartTotalShop"><?=number_format($totalPrice,2)?></span></span></td>
                                </tr>
                            </tfoot>
                            <tbody>
                                @if(isset($product))
                                @foreach($product as $pro)
                                <tr id="product_3_13_0_0_{{$pro['item']->id}}" class="cart_item last_item first_item address_0 odd">
                                    <td class="cart_product">
                                        <a href=""><img src="{{url('upload/product')}}/{{$pro['item']->photo}}" alt="{{$pro['item']->name}}" width="110" height="140" /></a>
                                    </td>
                                    <td class="cart_description">
                                        <p class="product-name"><a href="">{{$pro['item']->name}}<?php
                                                //echo "<pre>";
                                                //print_r($pro);
                                                ?></a></p> <small class="cart_ref"><?=html_entity_decode($pro['item']->description)?></small></td>
                                    <td class="cart_avail">
                                        
                                        <span class="label label-success">In stock</span>
                                        @if(!empty($pro['item']->unit))
                                            @if(isset($pro['unit']))
                                            <span class="text-success" style="color: #09f; font-weight: bolder; margin-top: 10px; clear: both; display:block;">Unit</span>
                                            <select name="unit" id="unit_name_{{$pro['item']->id}}">
                                                <option value="">Select Unit</option>
                                                @foreach(explode(',',$pro['item']->unit) as $ut)
                                                    <option 

                                                        @if($ut==$pro['unit'])
                                                            selected="selected" 
                                                        @endif

                                                        value="{{$ut}}">{{$ut}} {{$pro['unit_name']}}</option>
                                                @endforeach
                                            </select>
                                            @endif
                                        @endif
                                        @if(!empty($productcolor))
                                        @if(isset($pro['color']))
                                        <span class="text-success" style="color: #09f; font-weight: bolder; margin-top: 10px; clear: both; display:block;">Color</span>
                                        <select name="color" id="color_name_{{$pro['item']->id}}">
                                            <option value="">Select Color</option>
                                            @foreach($productcolor as $col)
                                            <option 
                                                
                                                @if($col->name==$pro['color'])
                                                    selected="selected" 
                                                @endif
                                               
                                                value="{{$col->id}}">{{$col->name}}</option>
                                            @endforeach
                                        </select>
                                         @endif
                                        @endif
                                    </td>
                                    <td id="unit_price_{{$pro['item']->id}}" class="cart_unit" data-title="Unit price" data-price="{{$pro['item']->price}}" style="color: #000;">
                                        <ul class="price text-right" id="product_price_3_13_0">
                                            <li class="price" style="color: #000;">{{$arrayCurrency->icon}}{{$pro['item']->price}}</li>
                                        </ul>
                                    </td>
                                    <td class="cart_quantity text-center" data-title="Quantity">
                                        <input type="hidden" value="{{$pro['qty']}}" name="quantity_3_13_0_0_hidden" />
                                        <input size="2" type="text" autocomplete="off" class="cart_quantity_input form-control grey" value="{{$pro['qty']}}" name="quantity_3_13_0_0_{{$pro['item']->id}}" />
                                        <div class="cart_quantity_button clearfix">
                                            <a rel="nofollow" class="btn btn-default button-minus" href="javascript:cart_min_shopping_cart({{$pro['item']->id}});" data-href="{{ route('product.delToCart',['id'=>$pro['item']->id]) }}" title="Subtract"> <span><i class="icon-minus"></i></span> </a> 
                                            <a rel="nofollow" class="btn btn-default button-plus" href="javascript:cart_plus_shopping_cart({{$pro['item']->id}});"  data-href="{{ route('product.addToCart',['id'=>$pro['item']->id,'reur'=>base64_encode('shopping-cart')]) }}" title="Add"><span><i class="icon-plus"></i></span></a></div>
                                    </td>
                                    <td class="cart_delete text-center" data-title="Delete">
                                        <div> <a rel="nofollow" title="Delete"  href="{{route('product.delRowCart',['id'=>$pro['item']->id])}}"><i class="icon-trash"></i></a></div>
                                    </td>
                                    <td class="cart_total cart_row_line_total" data-title="Total" data-row-total="{{$pro['price']}}"  id="total_product_price_linee_3_13_0_{{$pro['item']->id}}"> <span class="price" id="total_product_price_3_13_0" style="color: #000;"> {{$arrayCurrency->icon}}<span id="total_product_price_3_13_0_{{$pro['item']->id}}">{{$pro['price']}}</span> </span></td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    
                    <div id="HOOK_SHOPPING_CART"></div>
                    <div class="clear"></div>
                    <div class="cart_navigation_extra">
                        <div id="HOOK_SHOPPING_CART_EXTRA"></div>
                    </div>
                    
                    @include('front-include.shopping-cart-customer')
                    







                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@include('front-include.titleseo')
@section('css')

<link rel="stylesheet" href="{{url('site-pub/css/v_9185_4824619e3d18795329f630a46fec20cf_all.css')}}" type="text/css" media="all" />
@endsection

@section('js')
<script type="text/javascript" src="{{url('js/sweetalert.min.js')}}"></script>

<script>

    function cart_plus_shopping_cart(id)
    {
        var htmlStringPrice=$("#unit_price_"+id).attr('data-price');
        var htmlStringqtn=$("input[name=quantity_3_13_0_0_"+id+"]").val();
        
        var htmlStringcolor='';
        var htmlStringcolorStatus=false;
        if ($("#color_name_"+id).length)
        {
            htmlStringcolorStatus=true;
            var htmlStringcolor=$("#color_name_"+id).val();

            if(htmlStringcolor=='')
            {
                swal("Warning !!!", "Please select a color.", "error");
                return true;
            }

        }

        var htmlStringunitStatus=false;
        var htmlStringunit='';
        if ($("#unit_name_"+id).length)
        {
            htmlStringunitStatus=true;
            var htmlStringunit=$("#unit_name_"+id).val();
            if(htmlStringunit=='')
            {
                swal("Warning !!!", "Please select a unit.", "error");
                return true;
            }
        }

        
        
        if(htmlStringcolorStatus==true && htmlStringunitStatus==true)
        {
            var baseUrl="<?=url('cart-new-add')?>";
            $.get(baseUrl+'/'+id+'/1/'+htmlStringunit+'/'+htmlStringcolor,function(data){
                console.log(htmlStringunit,htmlStringcolor,data);
            });
        }
        else if(htmlStringcolorStatus==false && htmlStringunitStatus==true)
        {
            if(htmlStringunit=='')
            {
                swal("Warning !!!", "Please select a unit.", "error");
                return true;
            }
            
            var baseUrl="<?=url('cart-new-unit-add')?>";
            $.get(baseUrl+'/'+id+'/1/'+htmlStringunit,function(data){
                console.log(htmlStringunit,data);
            });
        }
        else if(htmlStringcolorStatus==true && htmlStringunitStatus==false)
        {
            if(htmlStringcolor=='')
            {
                swal("Warning !!!", "Please select a color.", "error");
                return true;
            }
            
            var baseUrl="<?=url('cart-new-Color-add')?>";
            $.get(baseUrl+'/'+id+'/1/'+htmlStringcolor,function(data){
                console.log(htmlStringcolor,data);
            });
        }
        else if(htmlStringcolorStatus==false && htmlStringunitStatus==false)
        {
            var baseUrl="<?=url('cart-new-add')?>";
            $.get(baseUrl+'/'+id+'/1',function(data){
                console.log(htmlStringcolor,data);
            });
        }

        var newQTN=(htmlStringqtn-0)+(1-0);
        var newQTNPrice=(newQTN*htmlStringPrice).toFixed(2);



        $("input[name=quantity_3_13_0_0_"+id+"]").val(newQTN);
        $("#total_product_price_3_13_0_"+id).html(newQTNPrice);
        $("#total_product_price_linee_3_13_0_"+id).attr('data-row-total',newQTNPrice);
        //console.log(newQTN);
        //console.log(newQTNPrice);

        var CartTableTotal=0;
        $('td.cart_row_line_total').each(function(i)
        {
           //console.log('Ami in Loop',$(this).attr('data-row-total'));
           CartTableTotal+=($(this).attr('data-row-total')-0);
        });



        var rTotal=CartTableTotal.toFixed(2);
        $("#shoppingCartRawTotal").html(rTotal);
        shoppingCartFinishTrans(rTotal);
    }

    function cart_min_shopping_cart(id)
    {
        var htmlStringPrice=$("#unit_price_"+id).attr('data-price');
        var htmlStringqtn=$("input[name=quantity_3_13_0_0_"+id+"]").val();
                
        if(htmlStringqtn>1)
        {
            var baseUrl="<?=url('cart-new-del')?>";
            $.get(baseUrl+'/'+id+'/1',function(data){
                console.log(htmlStringcolor,data);
            });
        }       

        var newQTN=htmlStringqtn-1;
        if(newQTN<=1)
        {
            newQTN=1;
        }
        var newQTNPrice=(newQTN*htmlStringPrice).toFixed(2);

        $("input[name=quantity_3_13_0_0_"+id+"]").val(newQTN);
        $("#total_product_price_3_13_0_"+id).html(newQTNPrice);
        $("#total_product_price_linee_3_13_0_"+id).attr('data-row-total',newQTNPrice);
        console.log(newQTN);
        console.log(newQTNPrice);

        var CartTableTotal=0;
        $('td.cart_row_line_total').each(function(i)
        {
           console.log('Ami in Loop',$(this).attr('data-row-total'));
           CartTableTotal+=($(this).attr('data-row-total')-0);
        });

        var rTotal=CartTableTotal.toFixed(2);
        $("#shoppingCartRawTotal").html(rTotal);
        shoppingCartFinishTrans(rTotal);

    }


    function shoppingCartFinishTrans(totalS)
    {
        var DeliveryExtra=0;

        var deliverychargeLimit=150;

        if(deliverychargeLimit>totalS)
        {
            var DeliveryExtra=9.95; 
            $("#extraShippingCharge").html(DeliveryExtra); 
        }
        else
        {
            var DeliveryExtra=0;   
            $("#extraShippingCharge").html("0.00");
        }

        var totalwithVat=((totalS-0)+(DeliveryExtra-0)).toFixed(2);

         var vat=eval(eval(totalwithVat*20)/100).toFixed(2);
         $("#shoppingVatTotal").html(vat);

        var cartTotalShop=((totalS-0)+(vat-0)+(DeliveryExtra-0)).toFixed(2);
        $("#cartTotalShop").html(cartTotalShop);

    }
</script>
<script type="text/javascript">
    /* <![CDATA[ */;
    var CUSTOMIZE_TEXTFIELD = 1;
    var FIELD_enableCountdownTimer = true;
    var FIELD_mainLayout = 'fullwidth';
    var FIELD_stickyCart = true;
    var FIELD_stickyMenu = true;
    var FIELD_stickySearch = true;
    var FancyboxI18nClose = 'Close';
    var FancyboxI18nNext = 'Next';
    var FancyboxI18nPrev = 'Previous';
    var LANG_RTL = '0';
    var added_to_wishlist = 'The product was successfully added to your wishlist.';
    var addressMultishippingUrl = '';
    var addressUrl = '';
    var addressUrlAdd = '=';
    var addresses = [];
    var ajax_allowed = true;
    var ajaxsearch = true;
    var authenticationUrl = 'login';
    var baseDir = '';
    var baseUri = '';
    var checkedCarrier = 1200;
    var comparator_max_item = 3;
    var compare_add_text = 'Add to Compare';
    var compare_remove_text = 'Remove from Compare';
    var comparedProductsIds = [];
    var conditionEnabled = 1;
    var contentOnly = false;
    var countdownDay = 'Day';
    var countdownDays = 'Days';
    var countdownHour = 'Hour';
    var countdownHours = 'Hours';
    var countdownMinute = 'Min';
    var countdownMinutes = 'Mins';
    var countdownSecond = 'Sec';
    var countdownSeconds = 'Secs';
    var countries = {
        "21": {
            "id_country": "21",
            "id_lang": "1",
            "name": "United States",
            "id_zone": "2",
            "id_currency": "0",
            "iso_code": "US",
            "call_prefix": "1",
            "active": "1",
            "contains_states": "1",
            "need_identification_number": "0",
            "need_zip_code": "1",
            "zip_code_format": "NNNNN",
            "display_tax_label": "0",
            "country": "United States",
            "zone": "North America",
            "states": [{
                    "id_state": "1",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Alabama",
                    "iso_code": "AL",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "2",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Alaska",
                    "iso_code": "AK",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "3",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Arizona",
                    "iso_code": "AZ",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "4",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Arkansas",
                    "iso_code": "AR",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "5",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "California",
                    "iso_code": "CA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "6",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Colorado",
                    "iso_code": "CO",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "7",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Connecticut",
                    "iso_code": "CT",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "8",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Delaware",
                    "iso_code": "DE",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "53",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "District of Columbia",
                    "iso_code": "DC",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "9",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Florida",
                    "iso_code": "FL",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "10",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Georgia",
                    "iso_code": "GA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "11",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Hawaii",
                    "iso_code": "HI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "12",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Idaho",
                    "iso_code": "ID",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "13",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Illinois",
                    "iso_code": "IL",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "14",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Indiana",
                    "iso_code": "IN",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "15",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Iowa",
                    "iso_code": "IA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "16",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Kansas",
                    "iso_code": "KS",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "17",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Kentucky",
                    "iso_code": "KY",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "18",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Louisiana",
                    "iso_code": "LA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "19",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Maine",
                    "iso_code": "ME",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "20",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Maryland",
                    "iso_code": "MD",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "21",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Massachusetts",
                    "iso_code": "MA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "22",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Michigan",
                    "iso_code": "MI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "23",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Minnesota",
                    "iso_code": "MN",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "24",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Mississippi",
                    "iso_code": "MS",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "25",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Missouri",
                    "iso_code": "MO",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "26",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Montana",
                    "iso_code": "MT",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "27",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Nebraska",
                    "iso_code": "NE",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "28",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Nevada",
                    "iso_code": "NV",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "29",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "New Hampshire",
                    "iso_code": "NH",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "30",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "New Jersey",
                    "iso_code": "NJ",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "31",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "New Mexico",
                    "iso_code": "NM",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "32",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "New York",
                    "iso_code": "NY",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "33",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "North Carolina",
                    "iso_code": "NC",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "34",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "North Dakota",
                    "iso_code": "ND",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "35",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Ohio",
                    "iso_code": "OH",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "36",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Oklahoma",
                    "iso_code": "OK",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "37",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Oregon",
                    "iso_code": "OR",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "38",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Pennsylvania",
                    "iso_code": "PA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "51",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Puerto Rico",
                    "iso_code": "PR",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "39",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Rhode Island",
                    "iso_code": "RI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "40",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "South Carolina",
                    "iso_code": "SC",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "41",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "South Dakota",
                    "iso_code": "SD",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "42",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Tennessee",
                    "iso_code": "TN",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "43",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Texas",
                    "iso_code": "TX",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "52",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "US Virgin Islands",
                    "iso_code": "VI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "44",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Utah",
                    "iso_code": "UT",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "45",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Vermont",
                    "iso_code": "VT",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "46",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Virginia",
                    "iso_code": "VA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "47",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Washington",
                    "iso_code": "WA",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "48",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "West Virginia",
                    "iso_code": "WV",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "49",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Wisconsin",
                    "iso_code": "WI",
                    "tax_behavior": "0",
                    "active": "1"
                }, {
                    "id_state": "50",
                    "id_country": "21",
                    "id_zone": "2",
                    "name": "Wyoming",
                    "iso_code": "WY",
                    "tax_behavior": "0",
                    "active": "1"
                }]
        }
    };
    var currency = {
        "id": 1,
        "name": "Dollar",
        "iso_code": "USD",
        "iso_code_num": "840",
        "sign": "$",
        "blank": "0",
        "conversion_rate": "1.000000",
        "deleted": "0",
        "format": "1",
        "decimals": "1",
        "active": "1",
        "prefix": "$ ",
        "suffix": "",
        "id_shop_list": null,
        "force_id": false
    };
    var currencyBlank = 0;
    var currencyFormat = 1;
    var currencyRate = 1;
    var currencySign = '$';
    var customizationIdMessage = 'Customization #';
    var delete_txt = 'Delete';
    var deliveryAddress = 0;
    var displayList = false;
    var displayPrice = 1;
    var errorCarrier = 'You must choose a carrier.';
    var errorTOS = 'You must accept the Terms of Service.';
    var fieldblocksearch_type = 'top';
    var fieldbs_autoscroll = '5000';
    var fieldbs_maxitem = '5';
    var fieldbs_minitem = '2';
    var fieldbs_navigation = false;
    var fieldbs_pagination = false;
    var fieldbs_pauseonhover = false;
    var freeProductTranslation = 'Free!';
    var freeShippingTranslation = 'Free shipping!';
    var generated_date = 1480753465;
    var guestCheckoutEnabled = 0;
    var guestTrackingUrl = 'guest-tracking';
    var hasDeliveryAddress = false;
    var highDPI = false;
    var historyUrl = 'order-history';
    var idSelectedCountry = false;
    var idSelectedCountryInvoice = false;
    var idSelectedState = false;
    var idSelectedStateInvoice = false;
    var id_lang = 1;
    var imgDir = 'themes/monaco/img/';
    var img_dir = 'themes/monaco/img/';
    var instantsearch = false;
    var isGuest = 0;
    var isLogged = 0;
    var isMobile = false;
    var isPaymentStep = 0;
    var isVirtualCart = 0;
    var langIso = 'en-us';
    var liUpdate = '<a class="button button-small btn btn-default" href="address?back=order-opc.php%3Fstep%3D1&id_address=" title="Update"><span>Update<i class="icon-chevron-right right"></i></span></a>';
    var loggin_required = 'You must be logged in to manage your wishlist.';
    var max_item = 'You cannot add more than 3 product(s) to the product Comparison';
    var min_item = 'Please select at least one product';
    var msg_order_carrier = 'You must agree to the terms of service before continuing.';
    var mywishlist_url = '';
    var opc = true;
    var orderOpcUrl = 'quick-order';
    var orderProcess = 'order-opc';
    var page_name = 'order-opc';
    var placeholder_blocknewsletter = 'Your e-mail';
    var priceDisplayMethod = 1;
    var priceDisplayPrecision = 2;
    var quickView = true;
    var removingLinkText = 'remove this product from my cart';
    var roundMode = 2;
    var search_url = 'search';
    var static_token = '';
    var taxEnabled = 1;
    var titleDelivery = '<h3 class="page-subheading">Your delivery address</h3>';
    var titleInvoice = '<h3 class="page-subheading">Your billing address</h3>';
    var toBeDetermined = 'To be determined';
    var token = '1781ddff19ab1fd7c75d1f91a7f58d3f';
    var txtConditionsIsNotNeeded = 'You do not need to accept the Terms of Service for this order.';
    var txtDeliveryAddress = 'Delivery address';
    var txtErrors = 'Error(s)';
    var txtFree = 'Free';
    var txtHasBeenSelected = 'has been selected';
    var txtInstantCheckout = 'Instant checkout';
    var txtInvoiceAddress = 'Invoice address';
    var txtModifyMyAddress = 'Modify my address';
    var txtNoCarrierIsNeeded = 'No carrier is needed for this order';
    var txtNoCarrierIsSelected = 'No carrier has been selected';
    var txtProduct = 'product';
    var txtProducts = 'products';
    var txtSelectAnAddressFirst = 'Please start by selecting an address.';
    var txtTOSIsAccepted = 'The service terms have been accepted';
    var txtTOSIsNotAccepted = 'The service terms have not been accepted';
    var txtThereis = 'There is';
    var txtWithTax = '(tax incl.)';
    var txtWithoutTax = '(tax excl.)';
    var usingSecureMode = false;
    var vat_management = 0;
    var wishlistProductsIds = false; /* ]]> */
</script>
<script type="text/javascript" src="{{url('site-pub/js/v_4_80e5688408874d37a60e2366c1d6d2c5.js')}}"></script>
<script type="text/javascript" src="{{url('site-pub/js/jquery.elevatezoom.min.js')}}"></script>

<script type="text/javascript">
    /* <![CDATA[ */;
    var zoom_type = 'window';
    var zoom_fade_in = 400;
    var zoom_fade_out = 550;
    var zoom_cursor_type = 'default';
    var zoom_window_pos = 1;
    var zoom_scroll = true;
    var zoom_easing = true;
    var zoom_tint = true;
    var zoom_tint_color = '#333';
    var zoom_tint_opacity = 0.4;
    var zoom_lens_shape = 'round';
    var zoom_lens_size = 420;
    ;

    function applyElevateZoom() {
        var src = $('.thickbox.shown').attr('href');
        var bigimage = $('.fancybox.shown').attr('href');
        $('#bigpic').elevateZoom({
            zoomType: zoom_type,
            cursor: zoom_cursor_type,
            zoomWindowFadeIn: zoom_fade_in,
            zoomWindowFadeOut: zoom_fade_out,
            zoomWindowPosition: zoom_window_pos,
            scrollZoom: zoom_scroll,
            easing: zoom_easing,
            tint: zoom_tint,
            tintColour: zoom_tint_color,
            tintOpacity: zoom_tint_opacity,
            lensShape: zoom_lens_shape,
            lensSize: zoom_lens_size,
            zoomImage: bigimage,
            borderSize: 1,
            borderColour: '#d4d4d4',
            zoomWindowWidth: 535,
            zoomWindowHeight: 535,
            zoomLevel: 0.5,
            lensBorderSize: 0
        });
    }
    $(document).ready(function () {
        
        
        $("#inv_add").click(function () {
            alert(1);
            //$('.inv_add').toggleClass();
        });

        applyElevateZoom();
        $('#color_to_pick_list').click(function () {
            restartElevateZoom();
        });
        $('#color_to_pick_list').hover(function () {
            restartElevateZoom();
        });
        $('#views_block li a').hover(function () {
            restartElevateZoom();
        });
    });

    function restartElevateZoom() {
        $(".zoomContainer").remove();
        applyElevateZoom();
    }
    
    var input = $("#search_query_top");
    $('document').ready(function () {
        var width_ac_results = input.outerWidth();
        Input_focus()
        $("#search_query_top").autocomplete('search', {
            minChars: 3,
            max: 10,
            width: (width_ac_results > 0 ? width_ac_results : 500),
            selectFirst: false,
            scroll: true,
            dataType: "json",
            formatItem: function (data, i, max, value, term) {
                return value;
            },
            parse: function (data) {
                var mytab = new Array();
                for (var i = 0; i < data.length; i++)
                    mytab[mytab.length] = {
                        data: data[i],
                        value: '<img alt="' + data[i].pname + '" src="' + data[i].image + '"><div class="right-search"><h5>' + data[i].pname + '</h5><span class="price">' + data[i].dprice + '</span></div> '
                    };
                return mytab;
            },
            extraParams: {
                ajaxSearch: 1,
                id_lang: 1,
                category_filter: $("#category_filter").val()
            }
        }).result(function (event, data, formatted) {
            $('#search_query_top').val(data.pname);
            document.location.href = data.product_link;
        });
        $("#category_filter").change(function () {
            $(".ac_results").remove();
            $("#search_query_top").trigger('unautocomplete');
            Input_focus()
            $("#search_query_top").autocomplete('search', {
                minChars: 3,
                max: 10,
                width: (width_ac_results > 0 ? width_ac_results : 500),
                selectFirst: false,
                scroll: true,
                dataType: "json",
                formatItem: function (data, i, max, value, term) {
                    return value;
                },
                parse: function (data) {
                    var mytab = new Array();
                    for (var i = 0; i < data.length; i++)
                        mytab[mytab.length] = {
                            data: data[i],
                            value: '<img alt="' + data[i].pname + '" src="' + data[i].image + '"><div class="right-search"><h5>' + data[i].pname + '</h5><span class="price">' + data[i].dprice + '</span></div> '
                        };
                    return mytab;
                },
                extraParams: {
                    ajaxSearch: 1,
                    id_lang: 1,
                    category_filter: $("#category_filter").val()
                }
            }).result(function (event, data, formatted) {
                $('#search_query_top').val(data.pname);
                document.location.href = data.product_link;
            });
        });
    });

    function Input_focus() {
        $('#search_query_top').on('focus', function () {
            var width_ac_results = input.outerWidth();
            var $this = $(this);
            if ($this.val() == 'Enter your keyword ...') {
                $this.val('');
                $('.btn.button-search').addClass('active');
            }
        }).on('blur', function () {
            var $this = $(this);
            if ($this.val() == '') {
                $this.val('Enter your keyword ...');
                $('.btn.button-search').removeClass('active');
            }
        });
    }
    ; /* ]]> */
</script>
<script>
    $(document).ready(function () {
        
    });
</script>    
@endsection
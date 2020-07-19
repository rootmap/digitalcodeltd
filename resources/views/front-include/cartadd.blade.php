<?php 
$arrayDD=MenuPageController::siteBasic();
$arrayCurrency=MenuPageController::CurrencyDetail();
?>
<script type="text/javascript" src="{{url('js/sweetalert.min.js')}}"></script>
<script>

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
    var baseDir = '';
    var baseUri = '';

    var compare_add_text = 'Add to Compare';
    var compare_remove_text = 'Remove from Compare';
    var comparedProductsIds = [];
    var customizationIdMessage = 'Customization #';
    var delete_txt = 'Delete';

    var fieldblocksearch_type = 'top';
    var fieldbs_autoscroll = '5000';
    var fieldbs_maxitem = '5';
    var fieldbs_minitem = '2';
    var fieldbs_navigation = false;
    var fieldbs_pagination = false;
    var fieldbs_pauseonhover = false;



    var max_item = 'You cannot add more than 3 product(s) to the product Comparison';
    var min_item = 'Please select at least one product';


    var search_url = 'search';
    var static_token = '<?= csrf_token() ?>';
    var toBeDetermined = 'To be determined';
    var token = '<?= csrf_token() ?>';
    var usingSecureMode = false;
    var wishlistProductsIds = false; /* ]]> */

    var Base64 = {_keyStr: "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=", encode: function (e) {
            var t = "";
            var n, r, i, s, o, u, a;
            var f = 0;
            e = Base64._utf8_encode(e);
            while (f < e.length) {
                n = e.charCodeAt(f++);
                r = e.charCodeAt(f++);
                i = e.charCodeAt(f++);
                s = n >> 2;
                o = (n & 3) << 4 | r >> 4;
                u = (r & 15) << 2 | i >> 6;
                a = i & 63;
                if (isNaN(r)) {
                    u = a = 64
                } else if (isNaN(i)) {
                    a = 64
                }
                t = t + this._keyStr.charAt(s) + this._keyStr.charAt(o) + this._keyStr.charAt(u) + this._keyStr.charAt(a)
            }
            return t
        }, decode: function (e) {
            var t = "";
            var n, r, i;
            var s, o, u, a;
            var f = 0;
            e = e.replace(/[^A-Za-z0-9+/=]/g, "");
            while (f < e.length) {
                s = this._keyStr.indexOf(e.charAt(f++));
                o = this._keyStr.indexOf(e.charAt(f++));
                u = this._keyStr.indexOf(e.charAt(f++));
                a = this._keyStr.indexOf(e.charAt(f++));
                n = s << 2 | o >> 4;
                r = (o & 15) << 4 | u >> 2;
                i = (u & 3) << 6 | a;
                t = t + String.fromCharCode(n);
                if (u != 64) {
                    t = t + String.fromCharCode(r)
                }
                if (a != 64) {
                    t = t + String.fromCharCode(i)
                }
            }
            t = Base64._utf8_decode(t);
            return t
        }, _utf8_encode: function (e) {
            e = e.replace(/rn/g, "n");
            var t = "";
            for (var n = 0; n < e.length; n++) {
                var r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r)
                } else if (r > 127 && r < 2048) {
                    t += String.fromCharCode(r >> 6 | 192);
                    t += String.fromCharCode(r & 63 | 128)
                } else {
                    t += String.fromCharCode(r >> 12 | 224);
                    t += String.fromCharCode(r >> 6 & 63 | 128);
                    t += String.fromCharCode(r & 63 | 128)
                }
            }
            return t
        }, _utf8_decode: function (e) {
            var t = "";
            var n = 0;
            var r = c1 = c2 = 0;
            while (n < e.length) {
                r = e.charCodeAt(n);
                if (r < 128) {
                    t += String.fromCharCode(r);
                    n++
                } else if (r > 191 && r < 224) {
                    c2 = e.charCodeAt(n + 1);
                    t += String.fromCharCode((r & 31) << 6 | c2 & 63);
                    n += 2
                } else {
                    c2 = e.charCodeAt(n + 1);
                    c3 = e.charCodeAt(n + 2);
                    t += String.fromCharCode((r & 15) << 12 | (c2 & 63) << 6 | c3 & 63);
                    n += 3
                }
            }
            return t
        }}



    $(document).ready(function () {
    
        $('.staticParent').on('keydown', '.child', function(e){-1!==$.inArray(e.keyCode,[46,8,9,27,13,110,190])||/65|67|86|88/.test(e.keyCode)&&(!0===e.ctrlKey||!0===e.metaKey)||35<=e.keyCode&&40>=e.keyCode||(e.shiftKey||48>e.keyCode||57<e.keyCode)&&(96>e.keyCode||105<e.keyCode)&&e.preventDefault()});
       
        $('.cart_add').click(function () {
            var url = $(this).attr('data-cart');
            var token = $(this).attr('data-token');
            var base = $(this).attr('data-base');
            var returnurl = Base64.encode(window.location.href);
            $.ajax({
                method: "GET",
                url: url,
                cache: false
            })
                    .done(function (data) {
                        //alert("Success");
                        console.log(data);
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function (data) {
                        //alert( "complete" );
                        //load cart start
                        //console.log(data);

                        $.each(data, function (index, value) {
                            if (index == "totalQty")
                            {
                                $("#totalQty").html(value);
                                $("#totalQtyTop").html(value);
                                $(".ajax_cart_quantity").html(value);

                            } else if (index == "totalPrice")
                            {
                                $("#totalPrice").html(value);
                                $("#totalPriceTop").html(value);
                            } else if (index == "items")
                            {
                                var cart_html = '';
                                var iplus = 0;
                                $.each(value, function (index, val) {
                                    //console.log(val);
                                    var proqty = val.qty;
                                    var proname = val.item.name;
                                    var proname_limit = proname.substring(0, 15);
                                    cart_html += '<dt class="first_item last_item" data-id="cart_block_product_2_7_0" style="display: block;">';
                                    cart_html += '<img src="' + base + '/upload/product/' + val.item.photo + '" style="height:60px !important; margin-top:-40px !important;" alt="' + val.item.name + '">';
                                    cart_html += '</a>';
                                    cart_html += '<div class="cart-info" style="padding-left:5px;">';
                                    cart_html += '<div class="product-name">';
                                    cart_html += '<span class="quantity-formated">';
                                    cart_html += '<span class="quantity">' + val.qty + '</span>';
                                    cart_html += '&nbsp;x&nbsp;';
                                    cart_html += '</span>';
                                    cart_html += '<a href="' + base + '/' + val.item.id + '/' + val.item.name + '" title="' + val.item.price + '" class="cart_block_product_name">' + val.item.price + '</a>';
                                    cart_html += '</div>';
                                    cart_html += '<div class="product-atributes">';
                                    cart_html += '<a href="' + base + '/' + val.item.id + '/' + val.item.name + '" title="' + val.item.name + '">' + proname_limit + '</a>';
                                    cart_html += '</div>';
                                    cart_html += '<span class="price">{{$arrayCurrency->icon}}' + val.item.price + '</span>';
                                    cart_html += '</div>';
                                    cart_html += '<span class="remove_link">';
                                    cart_html += '<a rel="nofollow" data-rid="' + val.item.id + '"  data-reur="' + returnurl + '"  data-remove="' + base + '/cartrow/' + val.item.id + '/' + val.item.id + '"   data-url="' + base + '" class="remove_cart_item" href="' + base + '/cartrow/' + val.item.id + '/' + returnurl + '"> </a>';
                                    cart_html += '</span>';
                                    cart_html += '</dt>';

                                    iplus += 1;

                                    if (iplus == 5)
                                    {
                                        return false;
                                    }

                                });

                                $("#cartProductsMini").html(cart_html);
                                $(".cart_block").fadeIn();
                                setTimeout(function () {
                                    $(".cart_block").fadeOut();
                                }, 3000);
                            }



                            //alert( index + ": " + value );
                        });


                    });
        });

        $('.cart_add_product').click(function () {

            var unit_length = $("select[name='unit']").length;
            var unit;
            if (unit_length != null)
            {
                unit = $("select[name='unit']").val();
            }

            var color_length = $("select[name='color']").length;
            var color = '';
            if (color_length != null)
            {
                color = $("select[name='color']").val();
            }

            if (color == '')
            {
                swal("Warning !!!", "Please select a color.", "error");
                return true;
            }
            
            if (color === undefined)
            {
                color=0;
            }

            if (unit == '')
            {
                swal("Warning !!!", "Please select a unit.", "error");
                return true;
            }

            if (unit === undefined) {
                unit=0;
            }


            //console.log(unit,color);
            var postUrl;
            var url = $(this).attr('data-cart');
            var token = $(this).attr('data-token');
            var base = $(this).attr('data-base');
            var qty = $("input[name='qty']").val();
            if(unit==0 && color==0)
            {
                postUrl=url + '/' + qty;
            }
            else
            {
                postUrl=url + '/' + qty + '/' + unit + '/' + color;
            }
            var returnurl = Base64.encode(window.location.href);
            $.ajax({
                method: "GET",
                url: postUrl,
                cache: false
            })
                    .done(function (data)
                    {
                        //alert("Success");
                        console.log(data);
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function (data) {
                        //alert( "complete" );
                        //load cart start
                        //console.log(data);

                        $.each(data, function (index, value) {
                            if (index == "totalQty")
                            {
                                $("#totalQty").html(value);
                                $("#totalQtyTop").html(value);
                                $(".ajax_cart_quantity").html(value);

                            } else if (index == "totalPrice")
                            {
                                $("#totalPrice").html(value);
                                $("#totalPriceTop").html(value);
                            } else if (index == "items")
                            {
                                var cart_html = '';
                                var iplus = 0;
                                $.each(value, function (index, val) {
                                    //console.log(val);
                                    var proqty = val.qty;
                                    var proname = val.item.name;
                                    var proname_limit = proname.substring(0, 15);
                                    cart_html += '<dt class="first_item last_item" data-id="cart_block_product_2_7_0" style="display: block;">';
                                    cart_html += '<img src="' + base + '/upload/product/' + val.item.photo + '" style="height:60px !important; margin-top:-40px !important;" alt="' + val.item.name + '">';
                                    cart_html += '</a>';
                                    cart_html += '<div class="cart-info" style="padding-left:5px; padding-top:3px;">';
                                    cart_html += '<div class="product-name">';
                                    cart_html += '<span class="quantity-formated">';
                                    cart_html += '<span class="quantity">' + val.qty + '</span>';
                                    cart_html += '&nbsp;x&nbsp;';
                                    cart_html += '</span>';
                                    cart_html += '<a href="' + base + '/' + val.item.id + '/' + val.item.name + '" title="' + val.item.price + '" class="cart_block_product_name">' + val.item.price + '</a>';
                                    cart_html += '</div>';
                                    cart_html += '<div class="product-atributes">';
                                    cart_html += '<a href="' + base + '/' + val.item.id + '/' + val.item.name + '" title="' + val.item.name + '">' + proname_limit + '</a>';
                                    cart_html += '</div>';
                                    cart_html += '<span class="price">{{$arrayCurrency->icon}}' + val.item.price + '</span>';
                                    cart_html += '</div>';
                                    cart_html += '<span class="remove_link">';
                                    cart_html += '<a rel="nofollow" data-rid="' + val.item.id + '"  data-reur="' + returnurl + '"  data-remove="' + base + '/cartrow/' + val.item.id + '/' + val.item.id + '"   data-url="' + base + '" class="remove_cart_item" href="' + base + '/cartrow/' + val.item.id + '/' + returnurl + '"> </a>';
                                    cart_html += '</span>';
                                    cart_html += '</dt>';

                                    iplus += 1;

                                    if (iplus == 5)
                                    {
                                        return false;
                                    }

                                });

                                $("#cartProductsMini").html(cart_html);
                                $(".cart_block").fadeIn();
                                setTimeout(function () {
                                    $(".cart_block").fadeOut();
                                }, 3000);

                            }



                            //alert( index + ": " + value );
                        });


                    });
        });

        $('.cart_add_product_multi').click(function () {

            var color_length = $("select[name='color']").length;
            var color = '';
            if (color_length != null)
            {
                color = $("select[name='color']").val();
            }

            if (color == '')
            {
                swal("Warning !!!", "Please select a color.", "error");
                return true;
            }
            
            if (color === undefined)
            {
                color=0;
            }


            //console.log(unit,color);
            var postUrl;
            var url = $(this).attr('data-cart');
            var token = $(this).attr('data-token');
            var base = $(this).attr('data-base');
            var baseqty = $(this).attr('data-base-quantity');
            var qty = $("input[name='"+baseqty+"']").val();
            
            if(qty==0)
            {
                swal("Warning !!!", "Please type a quantity.", "error");
                return true;
            }
            
            if(color==0)
            {
                postUrl=url + '/' + qty;
            }
            else
            {
                postUrl=url + '/' + qty + '/' + color;
            }
            var returnurl = Base64.encode(window.location.href);
            $.ajax({
                method: "GET",
                url: postUrl,
                cache: false
            })
                    .done(function (data)
                    {
                        //alert("Success");
                        console.log(data);
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function (data) {
                        //alert( "complete" );
                        //load cart start
                        //console.log(data);

                        $.each(data, function (index, value) {
                            if (index == "totalQty")
                            {
                                $("#totalQty").html(value);
                                $("#totalQtyTop").html(value);
                                $(".ajax_cart_quantity").html(value);

                            } else if (index == "totalPrice")
                            {
                                $("#totalPrice").html(value);
                                $("#totalPriceTop").html(value);
                            } else if (index == "items")
                            {
                                var cart_html = '';
                                var iplus = 0;
                                $.each(value, function (index, val) {
                                    //console.log(val);
                                    var proqty = val.qty;
                                    var proname = val.item.name;
                                    var proname_limit = proname.substring(0, 15);
                                    cart_html += '<dt class="first_item last_item" data-id="cart_block_product_2_7_0" style="display: block;">';
                                    cart_html += '<img src="' + base + '/upload/product/' + val.item.photo + '" style="height:60px !important; margin-top:-40px !important;" alt="' + val.item.name + '">';
                                    cart_html += '</a>';
                                    cart_html += '<div class="cart-info" style="padding-left:5px; padding-top:3px;">';
                                    cart_html += '<div class="product-name">';
                                    cart_html += '<span class="quantity-formated">';
                                    cart_html += '<span class="quantity">' + val.qty + '</span>';
                                    cart_html += '&nbsp;x&nbsp;';
                                    cart_html += '</span>';
                                    cart_html += '<a href="' + base + '/' + val.item.id + '/' + val.item.name + '" title="' + val.item.price + '" class="cart_block_product_name">' + val.item.price + '</a>';
                                    cart_html += '</div>';
                                    cart_html += '<div class="product-atributes">';
                                    cart_html += '<a href="' + base + '/' + val.item.id + '/' + val.item.name + '" title="' + val.item.name + '">' + proname_limit + '</a>';
                                    cart_html += '</div>';
                                    cart_html += '<span class="price">{{$arrayCurrency->icon}}' + val.item.price + '</span>';
                                    cart_html += '</div>';
                                    cart_html += '<span class="remove_link">';
                                    cart_html += '<a rel="nofollow" data-rid="' + val.item.id + '"  data-reur="' + returnurl + '"  data-remove="' + base + '/cartrow/' + val.item.id + '/' + val.item.id + '"   data-url="' + base + '" class="remove_cart_item" href="' + base + '/cartrow/' + val.item.id + '/' + returnurl + '"> </a>';
                                    cart_html += '</span>';
                                    cart_html += '</dt>';

                                    iplus += 1;

                                    if (iplus == 5)
                                    {
                                        return false;
                                    }

                                });

                                $("#cartProductsMini").html(cart_html);
                                $(".cart_block").fadeIn();
                                setTimeout(function () {
                                    $(".cart_block").fadeOut();
                                }, 3000);

                            }



                            //alert( index + ": " + value );
                        });


                    });
        });

        $(".remove_cart_item").click(function () {
            var rid = $(this).attr('data-rid');
            var url = $(this).attr('data-remove');
            var base = $(this).attr('data-url');
            var returnurl = Base64.encode(window.location.href);
            //alert(url);
            $.ajax({
                method: "GET",
                url: url,
                cache: false
            })
                    .done(function (data) {
                        console.log("Success");
                    })
                    .fail(function () {
                        console.log("error");
                    })
                    .always(function (data) {
                        $.each(data, function (index, value) {
                            if (index == "totalQty")
                            {
                                $("#totalQty").html(value);
                                $("#totalQtyTop").html(value);
                                $(".ajax_cart_quantity").html(value);

                            } else if (index == "totalPrice")
                            {
                                $("#totalPrice").html(value);
                                $("#totalPriceTop").html(value);
                            } else if (index == "items")
                            {
                                var cart_html = '';
                                $.each(value, function (index, val) {
                                    //console.log(val);
                                    var proqty = val.qty;
                                    var proname = val.item.name;
                                    var proname_limit = proname.substring(0, 15);
                                    cart_html += '<dt class="first_item last_item" data-id="cart_block_product_2_7_0" style="display: block;">';
                                    cart_html += '<img src="' + base + '/upload/product/' + val.item.photo + '" style="height:60px !important; margin-top:-40px !important;" alt="' + val.item.name + '">';
                                    cart_html += '</a>';
                                    cart_html += '<div class="cart-info" style="padding-left:5px; padding-top:3px;">';
                                    cart_html += '<div class="product-name">';
                                    cart_html += '<span class="quantity-formated">';
                                    cart_html += '<span class="quantity">' + val.qty + '</span>';
                                    cart_html += '&nbsp;x&nbsp;';
                                    cart_html += '</span>';
                                    cart_html += '<a href="' + base + '/' + val.item.id + '/' + val.item.name + '" class="cart_block_product_name">' + val.item.price + '</a>';
                                    cart_html += '</div>';
                                    cart_html += '<div class="product-atributes">';
                                    cart_html += '<a href="' + base + '/' + val.item.id + '/' + val.item.name + '" title="' + val.item.name + '">' + proname_limit + '</a>';
                                    cart_html += '</div>';
                                    cart_html += '<span class="price">{{$arrayCurrency->icon}}' + val.item.price + '</span>';
                                    cart_html += '</div>';
                                    cart_html += '<span class="remove_link">';
                                    cart_html += '<a rel="nofollow" data-rid="' + val.item.id + '"  data-reur="' + returnurl + '"  data-remove="' + url + '"  data-url="' + base + '"  class="remove_cart_item" href="' + base + '/cartrow/' + val.item.id + '/' + returnurl + '"> </a>';
                                    cart_html += '</span>';
                                    cart_html += '</dt>';
                                });

                                $("#cartProductsMini").html(cart_html);

                            }

                        });
                    });
        });



        $("#quantity_wanted_p").fadeIn();

    });

</script>
<?php
//route('product.addToCart',['id'=>$pro->id,'reur'=>base64_encode('home')]) 
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


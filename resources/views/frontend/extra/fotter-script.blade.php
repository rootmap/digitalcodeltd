<!-- Load JS siles -->	
        <script type="text/javascript" src="{{url('front-theme/js/jquery.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script type="text/javascript">
                $(document).ready(function(){
                   
                    //swal("HEY", "Message", "warning")
                     @if (session('status'))
                        Swal.fire({
                            icon: 'success',
                            title: '<h3 class="text-success">Thank You</h3>',
                            html: '<h5>{{session('status')}}</h5>'
                        });
                        <?php 
                        Session::forget('status');
                        ?>
                    @endif
                    
                    @if (session('error'))
                        Swal.fire({
                            icon: 'error',
                            title: '<h3 class="text-danger">Warning</h3>',
                            html: '<h5>{{session('error')}}!!!</h5>'
                        });
                        <?php 
                        Session::forget('error');
                        ?>
                    @endif
                    var SHoppingCartJsonURL="{{url('shoppingCart')}}";
                    //------------------------Ajax POS Start-------------------------//
                    $.ajax({
                        'async': false,
                        'type': "GET",
                        'global': false,
                        'dataType': 'json',
                        'url': SHoppingCartJsonURL,
                        'data': 
                        {
                            '_token':"{{csrf_token()}}"
                        },
                        'success': function (data) {
                            //tmp = data;
                            //console.log('return url',data);
                            loadMinTopCart(data);
                        }
                    });
                    //------------------------Ajax POS End---------------------------//
                });


        function loadMinTopCart(data)
        {
                var obj=data;


                var specialItemPrice=0;
                

                console.log('Special Item Price =',specialItemPrice);



                console.log('cart',obj);
                console.log(obj.rec);
                var tax_rate=$(".top-shopping-cart-short").attr('data-tax-amount');
                var tax=0;
                if(tax_rate)
                {

                        var tax_type = tax_rate.match(/%/g);
                        if(tax_type=='%')
                        {
                                var actual_rate = parseFloat(tax_rate.replace("%", "")).toFixed(2);
                                tax             = parseFloat((obj.totalPrice*actual_rate)/100).toFixed(2);
                        }
                        else
                        {
                                tax             = parseFloat(tax_rate).toFixed(2);
                        }
                }

                var discount=0;
                var discount_rate=0;
                var limit_check=0;
                //alert(obj.rec);
                var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
                var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
                if(obj.rec=="Collect")
                {
                    var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
                    var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
                }
                else if(obj.rec=="Delivery")
                {
                    var limit_check=$(".top-shopping-cart-short").attr("data-delivery-disamount-limit");
                    var discount_rate=$(".top-shopping-cart-short").attr("data-delivery-discount");
                }

                var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
		        var discType=$(".top-shopping-cart-short").attr("data-disamount-type");

                if(discType.trim()=="Common")
                {
                    var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
                    var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
                }

                if(discount_rate)
                {
                        var discount_type = discount_rate.match(/%/g);
                        if(discount_type=='%')
                        {
                                

                                if(limit_check>0 && (obj.totalPrice-specialItemPrice)<limit_check)
                                {
                                        var amount_to_get_discount=limit_check-(obj.totalPrice-specialItemPrice);
                                        discount='0.00';
                                }
                                else 
                                {
                        var actual_discount_rate = parseFloat(discount_rate.replace("%", "")).toFixed(2);
                        discount        = parseFloat(((obj.totalPrice-specialItemPrice)*actual_discount_rate)/100).toFixed(2);
                                }
                        }
                        else
                        {
                                if(limit_check>0 && (obj.totalPrice-specialItemPrice)<limit_check)
                                {
                                        var amount_to_get_discount=limit_check-(obj.totalPrice-specialItemPrice);
                                        discount='0.00';
                                }
                                else
                                {
                                        discount        = parseFloat(discount_rate).toFixed(2);
                                }
                        }

                }

                //alert($(".top-shopping-cart-short").html());

                
            
                var extraDeliveryCharge=0.00;
                if(obj.rec=="Delivery")
                {
                    if(parseFloat(obj.totalPrice)>14.99)
                    {
                        extraDeliveryCharge=0.00;
                        console.log('extraDeliveryCharge=',extraDeliveryCharge);
                    }
                    else
                    {
                        if(parseFloat(obj.totalPrice)>0)
                        {
                            extraDeliveryCharge=2.00;
                            console.log('extraDeliveryCharge=',extraDeliveryCharge);
                        }
                        else
                        {
                            extraDeliveryCharge=0.00;
                            console.log('extraDeliveryCharge=',extraDeliveryCharge);
                        }
                        
                    }
                }
                console.log('Foo 5',obj.totalPrice);
                console.log('Foo 5',extraDeliveryCharge);
                console.log('Foo 5',tax);
                console.log('Foo 5',discount);

                var totalSubPrice=((obj.totalPrice-0)+(extraDeliveryCharge-0)-tax)-discount;
                if(parseFloat(totalSubPrice)<0)
                {
                    totalSubPrice=0;
                }

                var totalQty=obj.totalQty;

                if(parseFloat(totalQty)<0)
                {
                    totalQty=0;
                }

                console.log(totalQty,totalSubPrice);




                $(".top-shopping-cart-short").children("a").html(totalQty+" item(s) - £"+parseFloat(totalSubPrice).toFixed(2));

                if($(".mobileCartMenuShortCartData"))
                {
                    $(".mobileCartMenuShortCartData").html(totalQty+" item(s) - £"+parseFloat(totalSubPrice).toFixed(2));
                }
        }

        </script>
        <!-- Waypoints script -->
        <script type="text/javascript" src="{{url('front-theme/js/waypoints.min.js')}}"></script>
        @yield('slider-js')
        <!-- Input placeholder plugin -->
        <script type="text/javascript" src="{{url('front-theme/js/jquery.placeholder.js')}}"></script>


        <!-- Tweeter API plugin -->
        <script type="text/javascript" src="{{url('front-theme/js/jflickrfeed.min.js')}}"></script>

        
        <!-- NiceScroll plugin -->
        <script type="text/javascript" src="{{url('front-theme/js/jquery.nicescroll.min.js')}}"></script>

        <!-- general script file -->
        <script type="text/javascript" src="{{url('front-theme/js/script.js')}}"></script>
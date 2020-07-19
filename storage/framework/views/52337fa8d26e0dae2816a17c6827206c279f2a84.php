<!-- Load JS siles -->	
        <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.min.js')); ?>"></script>
        <script type="text/javascript">
                $(document).ready(function(){
                    var SHoppingCartJsonURL="<?php echo e(url('shoppingCart')); ?>";
                    //------------------------Ajax POS Start-------------------------//
                    $.ajax({
                        'async': false,
                        'type': "GET",
                        'global': false,
                        'dataType': 'json',
                        'url': SHoppingCartJsonURL,
                        'data': 
                        {
                            '_token':"<?php echo e(csrf_token()); ?>"
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

                //alert($(".top-shopping-cart-short").html());

                console.log(limit_check,discount_rate);
                
                if(discount_rate)
                {
                        var discount_type = tax_rate.match(/%/g);
                        if(discount_type=='%')
                        {
                                

                                if(limit_check>0 && obj.totalPrice<limit_check)
                                {
                                        var amount_to_get_discount=limit_check-obj.totalPrice;
                                        discount='0.00';
                                }
                                else 
                                {
                        var actual_discount_rate = parseFloat(discount_rate.replace("%", "")).toFixed(2);
                        discount        = parseFloat((obj.totalPrice*actual_discount_rate)/100).toFixed(2);
                                }
                        }
                        else
                        {
                                if(limit_check>0 && obj.totalPrice<limit_check)
                                {
                                        var amount_to_get_discount=limit_check-obj.totalPrice;
                                        discount='0.00';
                                }
                                else
                                {
                                        discount        = parseFloat(discount_rate).toFixed(2);
                                }
                        }

                }
            
                var totalSubPrice=(obj.totalPrice-tax)-discount;
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
        <script type="text/javascript" src="<?php echo e(url('front-theme/js/waypoints.min.js')); ?>"></script>
        <?php echo $__env->yieldContent('slider-js'); ?>
        <!-- Input placeholder plugin -->
        <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.placeholder.js')); ?>"></script>


        <!-- Tweeter API plugin -->
        <script type="text/javascript" src="<?php echo e(url('front-theme/js/jflickrfeed.min.js')); ?>"></script>

        
        <!-- NiceScroll plugin -->
        <script type="text/javascript" src="<?php echo e(url('front-theme/js/jquery.nicescroll.min.js')); ?>"></script>

        <!-- general script file -->
        <script type="text/javascript" src="<?php echo e(url('front-theme/js/script.js')); ?>"></script>
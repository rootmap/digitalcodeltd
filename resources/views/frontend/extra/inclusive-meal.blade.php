<style type="text/css">
    .bgbor {
        background-color: #F9F9F9;
        border-bottom: 1px dashed #dddddd;
        padding: 0px 0px 0px 0px !important;
        margin-bottom:0px !important; 
    }
</style>

<script>
        $('.extradeliverycharge-space').hide();
        function loadCart(data)
        {
            var obj=data;
            var specialItemPrice=0;
            console.log('Special Item Price =',specialItemPrice);
            if(obj.rec=='Collect')
            {
                $(".spx-Collection").show();
                $(".spx-Delivery").hide();
                $("#rec_0").attr('checked','checked');
            }
            else if(obj.rec=='Delivery')
            {
                $(".spx-Collection").hide();
                $(".spx-Delivery").show();
                $("#rec_1").attr('checked','checked');
            }
            //console.log(obj.totalQty);
            $(".mini_shopping-cart-quantity").html(obj.totalQty);
            if(obj.totalPrice){ var totalPrice=obj.totalPrice; }
            else{ var totalPrice=0; }

            //totalPrice=totalPrice-specialItemPrice;

            //console.log('sssss-',totalPrice);
            console.log('Total Price =',totalPrice);
            console.log('Total Price without Special Price =',(totalPrice-specialItemPrice));
            $(".mini_cart-subtotal").children("span:eq(0)").html(parseFloat(totalPrice).toFixed(2));

            var tax_rate=$(".tax-space").children("div:eq(0)").children("span:eq(0)").html();

            var tax=0;

            if(tax_rate)

            {



            	var tax_type = tax_rate.match(/%/g);

            	if(tax_type=='%')

            	{

            		var actual_rate = parseFloat(tax_rate.replace("%", "")).toFixed(2);

            			tax     	= parseFloat((totalPrice*actual_rate)/100).toFixed(2);

            		//console.log(tax_rate,actual_rate,tax);

            		$(".tax-space").children("div:eq(1)").children("span:eq(0)").html(tax);

            	}

            	else

            	{

            		tax     	= parseFloat(tax_rate).toFixed(2);

            		$(".tax-space").children("div:eq(1)").children("span:eq(0)").html(tax);

            	}

            	

            	//var tax_rate=

            }

            else{ $(".tax-space").children("div:eq(1)").children("span:eq(0)").html('0.00'); }







        var discount=0;



        //spend-discount



        var discount_rate=$(".spend-discount").attr("data-discount");

        if(discount_rate)

        {
        	var discount_type = discount_rate.match(/%/g);
            //console.log('Discount Type ',discount_type);
        	if(discount_type)
        	{
        		var limit_check=$(".spend-discount").attr("data-disamount-limit");
                if(limit_check>0 && (totalPrice-specialItemPrice)<limit_check)
        		{

        			$(".discount-space").fadeOut();
                    var amount_to_get_discount=limit_check-(totalPrice-specialItemPrice);
        			discount='0.00';
                    var discountTextString='Spend Another £'+parseFloat(amount_to_get_discount).toFixed(2)+' get '+discount_rate+' discount';
        			$(".spend-discount").children("div:eq(0)").children("p:eq(0)").html(discountTextString);
        		}
        		else 
        		{
        			$(".discount-space").fadeIn();
        			var actual_discount_rate = parseFloat(discount_rate.replace("%", "")).toFixed(2);
                    discount        = parseFloat(((totalPrice-specialItemPrice)*actual_discount_rate)/100).toFixed(2);
                    $(".discount-space").children("div:eq(0)").children("span").html("("+parseFloat(discount_rate)+"%)");
        			$(".spend-discount").fadeOut();
        		}

        		$(".discount-space").children("div:eq(1)").children("span:eq(0)").html(parseFloat(discount).toFixed(2));
        	}
        	else
        	{

               // console.log('Total Preice -',totalPrice);
        		var limit_check=$(".spend-discount").attr("data-disamount-limit");
                if(limit_check>0 && (totalPrice-specialItemPrice)<limit_check)
        		{
        			$(".discount-space").fadeOut();
                    var amount_to_get_discount=limit_check-(totalPrice-specialItemPrice);
        			discount='0.00';
        			var discountTextString='Spend Another £'+parseFloat(amount_to_get_discount).toFixed(2)+' get '+discount_rate+' discount';
                    $(".spend-discount").children("div:eq(0)").children("p:eq(0)").html(discountTextString);
        		}
        		else
        		{
        			$(".discount-space").fadeIn();
        				discount     	= parseFloat(discount_rate).toFixed(2);
        			$(".spend-discount").fadeOut();
        		}

        		$(".discount-space").children("div:eq(1)").children("span:eq(0)").html(discount);

        	}

        }
        else{ $(".discount-space").children("div:eq(1)").children("span:eq(0)").html('0.00'); }

        console.log('Current Discount',discount);

        if(obj.rec!==null)
        {

            var discType=$(".top-shopping-cart-short").attr("data-disamount-type");
            var discDelType=$(".top-shopping-cart-short").attr("data-delivery-disamount-type");


            


            if(obj.rec=="Delivery")
            {
                var discount_rate=$(".top-shopping-cart-short").attr("data-delivery-discount");
            }
            else
            {
                var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
            }

                var allowDiscount=false;

                if(discType=="Collection" && obj.rec=="Collect")
                {
                    allowDiscount=true;
                }
                else if(discDelType=="Delivery" && obj.rec=="Delivery")
                {
                    allowDiscount=true;
                }
                else if(discType==obj.rec)
                {
                    allowDiscount=true;
                }

            
                if(discount_rate && allowDiscount)
                {
                    var discount_type = discount_rate.match(/%/g);
                    //console.log(discount_type);
                    if(discount_type)
                    {
                        //alert(obj.rec);
                        if(obj.rec=="Delivery")
                        {
                            var limit_check=$(".top-shopping-cart-short").attr("data-delivery-disamount-limit");
                        }
                        else
                        {
                            var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
                        }

                        
                        //alert(limit_check);

 
                        if(limit_check>0 && (totalPrice-specialItemPrice)<limit_check)
                        {
                            $(".discount-space").fadeOut();

                            var amount_to_get_discount=limit_check-(totalPrice-specialItemPrice);

                            discount='0.00';

                            var discountTextString='Spend Another £'+parseFloat(amount_to_get_discount).toFixed(2)+' get '+discount_rate+' discount';

                            if(obj.rec=="Delivery")
                            {
                                $(".spx-Delivery").children("div:eq(0)").children("p:eq(0)").html(discountTextString);
                            }
                            else
                            {
                                $(".spx-Collection").children("div:eq(0)").children("p:eq(0)").html(discountTextString);
                            }

                        }

                        else 

                        {

                            $(".discount-space").fadeIn();

                            var actual_discount_rate = parseFloat(discount_rate.replace("%", "")).toFixed(2);

                            discount        = parseFloat(((totalPrice-specialItemPrice)*actual_discount_rate)/100).toFixed(2);

                            $(".discount-space").children("div:eq(0)").children("span").html("("+parseFloat(discount_rate)+"%)");



                            $(".spend-discount-colndel").fadeOut();

                        }

                        



                        $(".discount-space").children("div:eq(1)").children("span:eq(0)").html(parseFloat(discount).toFixed(2));

                    }

                    else

                    {

                       // console.log('Total Preice -',totalPrice);

                        if(obj.rec=="Delivery")
                        {
                            var limit_check=$(".top-shopping-cart-short").attr("data-delivery-disamount-limit");
                        }
                        else
                        {
                            var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
                        }

                        

                        if(limit_check>0 && (totalPrice-specialItemPrice)<limit_check)

                        {

                            $(".discount-space").fadeOut();

                            var amount_to_get_discount=limit_check-(totalPrice-specialItemPrice);

                            discount='0.00';

                            var discountTextString='Spend Another £'+parseFloat(amount_to_get_discount).toFixed(2)+' get '+discount_rate+' discount';

                                if(obj.rec=="Delivery")
                                {
                                    $(".spx-Delivery").children("div:eq(0)").children("p:eq(0)").html(discountTextString);
                                }
                                else
                                {
                                     $(".spx-Collection").children("div:eq(0)").children("p:eq(0)").html(discountTextString);
                                }

                           

                        }

                        else

                        {

                            $(".discount-space").fadeIn();

                                discount        = parseFloat(discount_rate).toFixed(2);

                            $(".spend-discount-colndel").fadeOut();

                        }

                        $(".discount-space").children("div:eq(1)").children("span:eq(0)").html(discount);

                    }



                }

                else{ 

                    if(discount<1)

                    {

                        $(".discount-space").children("div:eq(1)").children("span:eq(0)").html('0.00');

                    }

                 }



            }

            var extraDeliveryCharge=0.00;
            if(obj.rec=="Delivery")
            {
                if(parseFloat(totalPrice)>14.99)
                {
                    $('.extradeliverycharge-space').children('div:eq(1)').children('span').html(extraDeliveryCharge);
                    $('.extradeliverycharge-space').hide();
                    extraDeliveryCharge=0.00;
                    console.log('extraDeliveryCharge=',extraDeliveryCharge);
                }
                else
                {
                    if(parseFloat(totalPrice)>0)
                    {
                        $('.extradeliverycharge-space').show();
                        extraDeliveryCharge='2.00';
                        $('.extradeliverycharge-space').children('div:eq(1)').children('span').html(extraDeliveryCharge);
                        console.log('extraDeliveryCharge=',extraDeliveryCharge);
                    }
                    else
                    {
                        $('.extradeliverycharge-space').children('div:eq(1)').children('span').html(extraDeliveryCharge);
                        $('.extradeliverycharge-space').hide();
                        extraDeliveryCharge=0.00;
                        console.log('extraDeliveryCharge=',extraDeliveryCharge);
                    }
                    
                }
            }

            var totalSubPrice=((totalPrice-0)+(tax-0)+(extraDeliveryCharge-0))-discount;

            //console.log('Total :',totalSubPrice);

            $(".total-cart-check-price").children("span").html(parseFloat(totalSubPrice).toFixed(2));



            //var totalSubPrice=(obj.totalPrice-tax)-discount;

            if(parseFloat(totalSubPrice)<0)

            {

                totalSubPrice=0;

            }



            var totalQty=obj.totalQty;



            if(parseFloat(totalQty)<0)

            {

                totalQty=0;

            }



            if (typeof totalQty == 'undefined')

            {

                totalQty=0;

            }



            if (totalSubPrice)

            {

                totalSubPrice=totalSubPrice;

            }

            else

            {

                totalSubPrice=0;

            }



            //console.log("DDD : ",totalQty,totalSubPrice);



            $(".top-shopping-cart-short").children("a").html(totalQty+" item(s) - £"+parseFloat(totalSubPrice).toFixed(2));

            $("#mobileCartMenuShort").children("div").children("span").html(totalQty+" item(s) - £"+parseFloat(totalSubPrice).toFixed(2));



            /*$(".top-shopping-cart-short").children("a").html(obj.totalQty+" item(s) - $"+parseFloat(totalSubPrice).toFixed(2));*/

            

            if(obj.items)

            {

                var nobj=obj.items;

                $.each(nobj,function(index,row){
                        //console.log(index);
                        console.log(index,row);
                    	var parseObj=row.item;
                       // console.log(parseObj.id);

                        if(row.inclusiveMeal==1)
                        {
                            //if($('#cart-row-'+index))
                            if($(".mini-cart-list").children('#cart-row-'+index).length>0)
                            {
                                console.log('Found');
                                $(".mini-cart-list").children('#cart-row-'+index).children('div').children('a').children('.cartQUANIT').html(row.qty);
                                $(".mini-cart-list").children('#cart-row-'+index).children('div').children('a').children('.cartItemPricePR').html(parseFloat(row.price).toFixed(2));
                            }
                            else
                            {
                                console.log('Not Found');
                                var dataSTR ='';
                                var dataSTRExtras ='';
                                dataSTR+='<li id="cart-row-'+index+'" data-id="'+row.raw_flavour+'">';
                                dataSTR+='   <div class="cart-body">';
                                dataSTR+='      <a class="cart-item-highlight" href="javascript:void(0);"><span class="cartQUANIT" style="color:#777;">'+row.qty+'</span> X '+row.item;
                                    dataSTRExtras+='        <div class="cart-data-mini-box">';
                                    dataSTRExtras+='            <div  class="price cart-extra-mini-box" style="width:100%;">';
                                    $.each(row.flavour,function(k,r){
                                        dataSTRExtras+='                <div class="price" style="font-size:11px;">+ '+$.trim(r)+'</div>';
                                    });
                                    dataSTRExtras+='            </div>';
                                    dataSTRExtras+='        </div>';
                                dataSTR+='      <span style="color:#777;"> £</span><span class="cartItemPricePR" style="color:#777;">'+parseFloat(row.price).toFixed(2)+'</span></a>';
                                dataSTR+=dataSTRExtras;
                                dataSTR+='   </div>';
                                dataSTR+='   <a class="remove" href="javascript:delRowLi('+index+')"><i class="fa fa-times" title="Remove"></i></a>';
                                dataSTR+='</li>';
                                //return dataSTR;
                                $(".mini-cart-list").append(dataSTR);
                            }
                                
                            
                        }
                        else
                        {
                            var rowID="cart-row-"+parseObj.id;
                            var subCatPushName=null;
                            if(row.sub_cat_name)
                            {
                                subCatPushName=row.sub_cat_name;
                            }
                        // console.log(rowID);
                            if($("#"+rowID).length)
                            {
                                updateLayoutOne(row);
                            }
                            else
                            {
                                var strHTML='';
                                strHTML=minilayoutOne(row);
                                $(".mini-cart-list").append(strHTML);
                            }
                        }
                        

                });

            }



            fixCartScroll();

        }



        function updateLayoutOne(obj)

        {

            var subCatPushName='';

            if(obj.sub_cat_name)

            {

               // console.log(obj.sub_cat_name);

                subCatPushName='['+obj.sub_cat_name+'] ';

            }



             var parseObj=obj.item;

             var rowID="cart-row-"+parseObj.id;

             //console.log(rowID);

             //console.log($("#"+rowID).html());

             //console.log('EX-Quantity-',obj.qty);

             //$("#"+rowID).find("div").find("a:eq(0)").find("span:eq(0)").html(obj.qty);

             //console.log($(".mini-cart-list").children("#"+rowID).children("div").children("a").children("b").html());

             $(".mini-cart-list").children("#"+rowID).children("div").children("a").children(".cartQUANIT").html(obj.qty);
             //parseFloat(totalPriceGen).toFixed(2)
             $(".mini-cart-list").children("#"+rowID).children("div").children("a").children(".cartItemPricePR").html(parseFloat(obj.price).toFixed(2));



            if(parseObj.product_level_type==2)

            {

                var dataSTRExtras='';

                $.each(obj.snd_item,function(index,row){

                    var productItem=row.item;

                    dataSTRExtras+='<div class="price">+ '+$.trim(productItem.name)+' ( '+row.qty+' X £'+productItem.price+' )</div>';

                });

                

                $(".mini-cart-list").children("#"+rowID).children("div").children("div").children(".cart-extra-mini-box").html(dataSTRExtras);

            }

            else if(parseObj.product_level_type==3)

            {

                var dataSTRExtras='';

                $.each(obj.snd_item,function(index,row){

                    var productItem=row.item;

                    dataSTRExtras+='<div class="price">+ '+$.trim(productItem.name)+' ( '+row.qty+' X £'+productItem.price+' )</div>';

                });

                

                $(".mini-cart-list").children("#"+rowID).children("div").children("div").children(".cart-extra-mini-box").html(dataSTRExtras);

            }



        }



        function minilayoutOne(obj)
        {
            var subCatPushName='';
            if(obj.sub_cat_name)
            {
               // console.log(obj.sub_cat_name);
                subCatPushName='['+obj.sub_cat_name+'] ';
            }

            var parseObj=obj.item;
            var dataSTR ='';
        	var dataSTRExtras ='';
        	    dataSTR+='<li id="cart-row-'+parseObj.id+'">';
                dataSTR+='   <div class="cart-body">';
                if(parseObj.product_level_type==2)
                {
                    dataSTR+='   <a class="cart-item-highlight" href="javascript:void(0);"><span class="cartQUANIT" style="color:#777;">'+obj.qty+'</span> X '+subCatPushName;
                }
                else
                {

                    dataSTR+='   <a class="cart-item-highlight" href="javascript:void(0);"><span class="cartQUANIT" style="color:#777;">'+obj.qty+'</span> X '+subCatPushName+''+parseObj.name;

                }



                

                



                dataSTRExtras+='        <div class="cart-data-mini-box">';

                dataSTRExtras+='            <div  class="price cart-extra-mini-box">';

                var extraPrice=0;

                if(parseObj.product_level_type==3)

                {

                    $.each(obj.snd_item,function(index,row){

                        var productItem=row.item;

                        dataSTRExtras+='<div class="price">+ '+$.trim(productItem.name)+' ( '+row.qty+' X £'+productItem.price+' )</div>';

                    });

                }

                else if(parseObj.product_level_type==2)

                {

                    $.each(obj.snd_item,function(index,row){

                        var productItem=row.item;

                        dataSTRExtras+='<div class="price">+ '+$.trim(productItem.name)+' ( '+row.qty+' X £'+productItem.price+' )</div>';

                    });

                    

                }

                else if(obj.exec_menu==1)

                {

                    var execObj=obj.execArrayData;

                    //console.log(execObj);

                    $.each(execObj,function(inx,kr){

                        dataSTRExtras+='            <div class="price">+'+$.trim(execObj[inx])+'</div>';

                    });

                    //dataSTR+='            <div class="price">+'+sndObj.name+'</div>';

                }

                else if(obj.pizza_menu==1)

                {

                    var execObj=obj.size;

                    dataSTRExtras+='            <div class="price">+'+$.trim(execObj.name)+'</div>';

                    var flabour=obj.flabour;

                    dataSTRExtras+='            <div class="price">+'+$.trim(flabour.name)+'</div>';

                    //console.log(execObj);

                    var extra=obj.extra;



                    $.each(extra,function(inx,kr){

                        dataSTRExtras+='            <div class="price">+'+$.trim(kr.extra_name)+'</div>';

                        dataSTRExtras+=(kr.extra_price-0);

                    });

                    //dataSTR+='            <div class="price">+'+sndObj.name+'</div>';

                }

                dataSTRExtras+='         </div>';

                var totalPriceGen=parseFloat((obj.price-0)+(extraPrice-0)).toFixed(2);

                dataSTRExtras+='        </div>';



                dataSTR+='<span style="color:#777;"> £</span><span class="cartItemPricePR" style="color:#777;">'+parseFloat(totalPriceGen).toFixed(2)+'</span></a>';

                dataSTR+=dataSTRExtras;



                dataSTR+='   </div>';

                dataSTR+='   <a class="remove" href="javascript:delRowLi('+parseObj.id+')"><i class="fa fa-times" title="Remove"></i></a>';

                dataSTR+='</li>';



                return dataSTR;

        }



        function delRowLi(rowID)

        {

            var liID="cart-row-"+rowID;

            //$(row).parent('li').fadeOut('slow');

            $("#"+liID).remove();

            var addtoCartURL="{{url('order-item/delete-to-cart')}}";

            //------------------------Ajax POS Start-------------------------//

            $.ajax({

                'async': false,

                'type': "POST",

                'global': false,

                'dataType': 'json',

                'url': addtoCartURL,

                'data': 

                {

                    'lid':rowID,

                    '_token':"{{csrf_token()}}"

                },

                'success': function (data) {

                    //tmp = data;

                   // console.log("Processing : "+data);

                    loadCart(data);

                }

            });

            //------------------------Ajax POS End---------------------------//

            swal('Item Removed','Your shopping cart item is removed successfully.','success');

            $("#"+liID).remove();

        }



        function loadDefault()

        {

            var addtoCartURL="{{url('order-item/add-to-cart/json')}}";

            //------------------------Ajax POS Start-------------------------//

            $.ajax({

                'async': false,

                'type': "GET",

                'global': false,

                'dataType': 'json',

                'url': addtoCartURL,

                'data': 

                {

                    '_token':"{{csrf_token()}}"

                },

                'success': function (data) {

                    //tmp = data;

                   // console.log("Default : "+data);

                    loadCart(data);

                }

            });

            //------------------------Ajax POS End---------------------------//

        }





        function fixCartScroll()

        {

                /*max-height: 180px !important;

                overflow: scroll !important;*/

                var winH=$(window).height();

                var showCart=parseInt(winH-340);

             //   console.log(showCart,winH);



                if(showCart>380)

                {

                    showCart=350;

                }

                else if(showCart>280 && showCart<380)

                {

                    showCart=250;

                }



                $(".mini-cart-list").attr("style","max-height: "+showCart+"px !important;           overflow-y: scroll !important;");



        }

            

            $(document).ready(function(){

                loadDefault();



               

                //fixCartScroll();



                $("input[name=rec]").click(function(){

                    var selecVal='';

                    if(document.getElementById('rec_0').checked==true)

                    {

                        selecVal='Collect';

                    }

                    else if(document.getElementById('rec_1').checked==true)

                    {

                        selecVal='Delivery';

                    }



                    if(selecVal!='')

                    {

                        var item_id=selecVal;

                        var addtoCartURL="{{url('order-item/add-to-cart')}}";

                        //------------------------Ajax POS Start-------------------------//

                        $.ajax({

                            'async': false,

                            'type': "POST",

                            'global': false,

                            'dataType': 'json',

                            'url': addtoCartURL,

                            'data': {'rec':item_id,'_token':"{{csrf_token()}}"},

                            'success': function (data) {

                                //tmp = data;

                              //  console.log("Processing : "+data);

                                loadCart(data);

                            }

                        });

                        //------------------------Ajax POS End---------------------------//

                    }



                });



                $(".checkout-page").click(function(){

                    var addtoCartURL="{{url('order-item/add-to-cart/typeofdelivery')}}";

                    //------------------------Ajax POS Start-------------------------//

                    $.ajax({

                        'async': true,

                        'type': "GET",

                        'global': false,

                        'dataType': 'json',

                        'url': addtoCartURL,

                        'success': function (data) {

                          //  console.log(data);

                            if(data=='Collect')

                            {

                                window.location.href="{{url('shopping-cart')}}";

                            }

                            else if(data=='Delivery')

                            {

                                window.location.href="{{url('shopping-cart')}}";

                            }

                            else

                            {

                                swal('Select Delivery Type','Please select a delivery type / Collection.','info');

                            }

                        },

                        error: function(){

                            swal('Requested page not found','Please reload page & try again.','warning');

                        }

                    });

                    //------------------------Ajax POS End---------------------------//

                });



                $(".empty-cart").click(function(){

                    var addtoCartURL="{{url('order-item/cart/clear')}}";

                    //------------------------Ajax POS Start-------------------------//

                    $.ajax({

                        'async': true,

                        'type': "GET",

                        'global': false,

                        'dataType': 'json',

                        'url': addtoCartURL,

                        'success': function (data) {

                            //tmp = data;

                          //  console.log("clearing cart : "+data);

                            swal('All Item Removed','Shopping cart empty complete.','success');

                            window.location.reload();

                            loadCart(data);

                        }

                    });

                    //------------------------Ajax POS End---------------------------//

                });



                $('.add-cart').click(function(){

                    //alert('now');

                    var item_sub_cat_name=$(this).attr('data-sub-name');

                    var item_id=$(this).attr('data-id');

                    var addtoCartURL="{{url('order-item/add-to-cart')}}";

                    //------------------------Ajax POS Start-------------------------//

                    $.ajax({

                        'async': false,

                        'type': "POST",

                        'global': false,

                        'dataType': 'json',

                        'url': addtoCartURL,

                        'data': {'item_id':item_id,'item_sub_cat_name':item_sub_cat_name,'_token':"{{csrf_token()}}"},

                        'success': function (data) {

                            //tmp = data;

                         //   console.log("Processing : "+data);

                            loadCart(data);

                        }

                    });

                    //------------------------Ajax POS End---------------------------//

                });



                $('.add-snd-cart').click(function(){

                    var item_id=$(this).attr('data-id');

                    var snd_item_id=$(this).attr('snd-data-id');

                    var addtoCartURL="{{url('order-item/add-to-cart')}}";

                    //------------------------Ajax POS Start-------------------------//

                    $.ajax({

                        'async': false,

                        'type': "POST",

                        'global': false,

                        'dataType': 'json',

                        'url': addtoCartURL,

                        'data': 

                        {

                            'item_id':item_id,

                            'snd_item_id':snd_item_id,

                            '_token':"{{csrf_token()}}"

                        },

                        'success': function (data) {

                            //tmp = data;

                          //  console.log("Processing : "+data);

                            loadCart(data);

                        }

                    });

                    //------------------------Ajax POS End---------------------------//

                    $(this).parent().parent().parent().parent().find('.close-modal').click();

                });



                $('.add-subcat-cart').click(function(){

                    //alert('now');

                    var item_id=$(this).attr('data-id');

                    var item_sub_cat_name=$(this).attr('data-sub-name');

                    var snd_item_id=$(this).attr('data-extra-id');

                    var addtoCartURL="{{url('order-item/add-to-cart')}}";

                    //------------------------Ajax POS Start-------------------------//

                    $.ajax({

                        'async': true,

                        'type': "POST",

                        'global': false,

                        'dataType': 'json',

                        'url': addtoCartURL,

                        'data': 

                        {

                            'item_id':item_id,

                            'item_sub_cat_name':item_sub_cat_name,

                            'snd_item_id':snd_item_id,

                            '_token':"{{csrf_token()}}"

                        },

                        'success': function (data) {

                            //tmp = data;

                           // console.log("Processing : "+data);

                            loadCart(data);

                        }

                    });

                    //------------------------Ajax POS End---------------------------//

                    $(this).parent().parent().parent().parent().find('.close-modal').click();

                });



                $('.add-snd-subcat-cart').click(function(){

                    var item_id=$(this).attr('data-id');

                    var snd_item_id=$(this).attr('snd-data-id');

                    var addtoCartURL="{{url('order-item/add-to-cart')}}";

                    //------------------------Ajax POS Start-------------------------//

                    $.ajax({

                        'async': false,

                        'type': "POST",

                        'global': false,

                        'dataType': 'json',

                        'url': addtoCartURL,

                        'data': 

                        {

                            'item_id':item_id,

                            'snd_item_id':snd_item_id,

                            '_token':"{{csrf_token()}}"

                        },

                        'success': function (data) {

                            //tmp = data;

                          //  console.log("Processing : "+data);

                            loadCart(data);

                        }

                    });

                    //------------------------Ajax POS End---------------------------//

                    //$(this).parent().parent().parent().parent().find('.close-modal').click();

                });





                $('.executive-set-menu').click(function(){

                    var item_id=$(this).attr('data-id');

                    var exec_menu=1;

                    var execArray=$(this).parent().parent().find("select");

                    var execArrayData=[];

                    $.each(execArray,function(index,row){

                        var rowData=[];

                            var stn=$(row).val();

                                stn.replace('&','&amp;');

                            var stv=$(row).attr('title');

                                stv.replace('&','&amp;');



                            var d = new Date();

                            var n = d.getTime();

                            if (stn in execArrayData)

                            {

                                stv=stv+'_'+n;

                             //   console.log(stv);

                            }



                            rowData['value']=stn;

                            rowData['name']=stv;

                        execArrayData.push(rowData);

                    });



                    //$(obj).serialize();



                    var postParam={

                            'item_id':item_id,

                            'exec_menu':exec_menu,

                            'execArrayData':$.param(execArrayData),

                            '_token':"{{csrf_token()}}"

                        };



                    //console.log(execArrayData); return false;

                    var addtoCartURL="{{url('order-item/add-to-cart')}}";

                    $.post(addtoCartURL,postParam,function(data){

                     //   console.log("Processing : "+data);

                        loadCart(data);

                    })

                    //------------------------Ajax POS Start-------------------------//

                   /* $.ajax({

                        'async': false,

                        'type': "POST",

                        'global': false,

                        'dataType': 'json',

                        'url': addtoCartURL,

                        'data':postParam,

                        'success': function (data) {

                            //tmp = data;

                            console.log("Processing : "+data)

                        }

                    });*/

                    //------------------------Ajax POS End---------------------------//





                    $(this).parent().parent().parent().parent().find('.close-modal').click();

                });



                

                $('.menu_page_category').click(function(){

                    if($(this).attr('href')=="#pro1")

                    {

                        //addClass

                        //console.log($(this).parent().html());

                        //console.log($(this).parent().parent().children('li').html());

                        $.each($(this).parent().parent().children('li'),function(index,row){

                            $(row).removeClass('active');

                        });

                        $(this).parent().addClass('active')

                        $('html, body').animate({

                            scrollTop: $($(this).attr('href')).offset().top - 300

                        }, 500);

                    }

                    else

                    {

                        $.each($(this).parent().parent().children('li'),function(index,row){

                            $(row).removeClass('active');

                        });

                        $(this).parent().addClass('active')

                        $('html, body').animate({

                            scrollTop: $($(this).attr('href')).offset().top - 150

                        }, 500);

                    }

                    

                });



                var isMobile = false; //initiate as false

                // device detection

                if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|ipad|iris|kindle|Android|Silk|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(navigator.userAgent) 

                    || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(navigator.userAgent.substr(0,4))) isMobile = true;



                //console.log(isMobile);

                if(isMobile==false)

                {

                    $(document).scroll(function () {
                        var scrollBottom = $(window).scrollTop() + $(window).height();
                        var y = $(this).scrollTop();
                        var totalVisibleposition=($(document).height()-5);

                        if (y>172) {
                            if(totalVisibleposition<scrollBottom)
                            { 
                                $("#menu_page_category").removeClass("category_fix_menu"); 
                                $("#menu_page_category_full").removeClass("category_fix_menu_all"); 
                                $("#mini_page_shopping_cart").removeClass("mini_fix_shopping_cart"); 
                            }
                            else
                            {
                                $("#menu_page_category").addClass("category_fix_menu");
                                $("#menu_page_category_full").addClass("category_fix_menu_all");
                                $("#mini_page_shopping_cart").addClass("mini_fix_shopping_cart");
                            }
                        }
                        else
                        { 
                            $("#menu_page_category").removeClass("category_fix_menu"); 
                            $("#menu_page_category_full").removeClass("category_fix_menu_all"); 
                            $("#mini_page_shopping_cart").removeClass("mini_fix_shopping_cart"); 
                        }

                    });

                }

                



                /*$(".remove").click(function(){

                    

                    $(this).parent('li').fadeOut('slow');

                    swal('Item Removed','Your shopping cart item is removed successfully.','success');

                });*/







                /* Genarating Pizza Menu Activity*/

                $('.pizza-check-category').click(function(){

                    var cat_id=$(this).val();

                    var cat_name=$(this).parent('div').children('label').children('p').html();

                    var strHtml='<div class="custom-radio-input-group-two" data-id="'+cat_id+'" data-text="'+cat_name+'"><label for="capasino_'+cat_id+'" class="custom-radio-input-group-border-bottom"><p style="margin: 0px !important;">'+cat_name+'</p></label></div>';

                    $(this).parent().parent().parent().children("section:eq(0)").append(strHtml);

                    $(this).parent().parent().parent().children(".sub-category").fadeIn('fast');

                    $(this).parent('div').parent('section').addClass('display-none-sec');





                    var modalID=$(this).attr("data-modal-id");



                    //var checkPizzaArray=$("#"+modalID).attr("data-array");

                    

                    var pizzaObj={};

                    var pizzaArray={};

                        pizzaArray['name']=cat_name;

                        pizzaArray['size_id']=cat_id;

                    pizzaObj['size_info']=pizzaArray;

                    $("#"+modalID).children('.modal-sandbox').html(JSON.stringify(pizzaObj));

                });



                $('.pizza-check-subcat').click(function(){

                    var cat_id=$(this).val();

                    var cat_name=$(this).parent('div').children('label').children('p').html();

                    

                    var strHtml='<div class="custom-radio-input-group-two" data-id="'+cat_id+'" data-text="'+cat_name+'"><label for="capasino_'+cat_id+'" class="custom-radio-input-group-border-bottom"><p style="margin: 0px !important;">'+cat_name+'</p></label></div>';

                    $(this).parent().parent().parent().children("section:eq(0)").append(strHtml);

                    //$("#data-select-place").append(strHtml);

                    $(this).parent('div').parent('section').addClass('display-none-sec');

                    //$(".menu_options-header").hide();

                    $(this).parent(".menu_options-header").hide();

                    var modalID=$(this).attr("data-modal-id");

                    $("#"+modalID).find(".cat-extra-table").show();



                    var pizzaObj={};

                    var pizzaArray={};

                        pizzaArray['name']=cat_name;

                        pizzaArray['flabour_id']=cat_id;

                        pizzaObj['flabour_info']=pizzaArray;



                   // console.log(pizzaObj);

                    var dataExArray=$("#"+modalID).children('.modal-sandbox').html();

                    if(dataExArray.length<1)

                    {

                       $("#"+modalID).children('.modal-sandbox').html(JSON.stringify(pizzaObj));

                    }

                    else

                    {

                        var obj = JSON.parse(dataExArray);

                      //  console.log('Else : ',obj);

                        obj['flabour']=pizzaArray;

                       // console.log('Full : ',obj);

                        $("#"+modalID).children('.modal-sandbox').html(JSON.stringify(obj));

                    }

                    

                });



                $(".cat-extra-table").hide();

                $(".add-to-extras").click(function(){



                    var extra_id=$(this).attr('data-id');

                  //  console.log('Product ID :',extra_id);

                    var extra_price=$(this).attr('data-price');

                 //   console.log('Product Price :',extra_price);

                    var extra_name=$(this).parent().parent().parent().parent().find(".proName").html();

                 //   console.log('Product Name :',extra_name);



                    $(this).parent().parent().parent().parent().find('.classExtraCalculate').show();

                 //   console.log($(this).parent().parent().parent().parent().parent().parent().parent().parent().find('.modal-footer').find('.totlabsk').html()); //:nth-child(2)

                    var rwPrT=$(this).parent().parent().parent().parent().find('.classExtraCalculate').children('span:eq(1)').html();

                    var exQT=$(this).parent().parent().parent().parent().find('.classExtraCalculate').children('span:eq(0)').html();

                    var newQT=(exQT-0)+(1-0);

                    var newTotPr=parseFloat(newQT*rwPrT).toFixed(2);



                    var extotalPR=$(this).parent().parent().parent().parent().parent().parent().parent().parent().find('.modal-footer').find('.totlabsk').html();



                    var newTotalPR=parseFloat((extotalPR-0)+(rwPrT-0)).toFixed(2);



                    $(this).parent().parent().parent().parent().find('.classExtraCalculate').children('span:eq(0)').html(newQT);

                    $(this).parent().parent().parent().parent().find('.classExtraCalculate').children('span:eq(2)').html(newTotPr);

                    $(this).parent().parent().parent().parent().parent().parent().parent().parent().find('.modal-footer').find('.totlabsk').html(newTotalPR);

                    $(this).parent().parent().parent().parent().parent().parent().parent().parent().find('button').children('b').html('Add to basket');



                    var pizzaArray={};

                        pizzaArray['extra_name']=extra_name;

                        pizzaArray['extra_id']=extra_id;

                        pizzaArray['extra_price']=extra_price;

                        pizzaArray['extra_quantity']=1;



                    //console.log(pizzaObj);

                    var modalID=$(this).attr("data-modal-id");

                    var dataExArray=$("#"+modalID).children('.modal-sandbox').html();

                    if(dataExArray.length<1)

                    {

                       $("#"+modalID).children('.modal-sandbox').html(JSON.stringify(pizzaArray));

                    }

                    else

                    {

                        var obj = JSON.parse(dataExArray);

                        //console.log('Else : ',obj);

                        if(obj['extra'])

                        {

                            var exExtra=obj['extra'];

                            if(exExtra[extra_id])

                            {

                                if(exExtra[extra_id]['extra_quantity'])

                                {

                                    var exQtyPZ=exExtra[extra_id]['extra_quantity'];

                                    exExtra[extra_id]['extra_quantity']=(exQtyPZ-0)+(1-0);

                                 //   console.log(exQtyPZ);

                                }

                                else

                                {

                                    exExtra[extra_id]=pizzaArray;

                                }

                            }

                            else

                            {

                                exExtra[extra_id]=pizzaArray;

                            }

                            

                        }

                        else

                        {

                            obj['extra']=[];

                            var exExtra=obj['extra'];

                            exExtra[extra_id]=pizzaArray;

                        }

                        

                        //exExtra.push(pizzaArray);

                     //   console.log('Full : ',obj);

                        $("#"+modalID).children('.modal-sandbox').html(JSON.stringify(obj));

                    }



                    //classExtraCalculate

                });



                $(".deductQTYPizza").click(function(){

                //    console.log('submission pen');

                    //console.log($(this).parent().html());

                        if($(this).parent().children('span:eq(0)').html()==1)

                        {

                            var extotalPR=$(this).parent().parent().parent().parent().parent().parent().parent().find('.modal-footer').find('.totlabsk').html();

                            var curPRSin=$(this).parent().children('span:eq(1)').html();

                            var neWtotalPR=parseFloat(extotalPR-curPRSin).toFixed(2);

                            $(this).parent().children('span:eq(0)').html(0);

                            $(this).parent().parent().parent().parent().parent().parent().parent().find('.modal-footer').find('.totlabsk').html(neWtotalPR);

                            $(this).parent().parent().find('.classExtraCalculate').fadeOut();

                        }

                        else

                        {

                            var extotalPR=$(this).parent().parent().parent().parent().parent().parent().parent().find('.modal-footer').find('.totlabsk').html();

                            var curPRSin=$(this).parent().children('span:eq(1)').html();

                            var neWtotalPR=parseFloat(extotalPR-curPRSin).toFixed(2);

                            var exQTY=$(this).parent().children('span:eq(0)').html();

                            var newQTY=exQTY-1;

                            var newRQTYPR=parseFloat(newQTY*curPRSin).toFixed(2);



                            $(this).parent().children('span:eq(0)').html(newQTY);

                            $(this).parent().children('span:eq(2)').html(newRQTYPR);





                            $(this).parent().parent().parent().parent().parent().parent().parent().find('.modal-footer').find('.totlabsk').html(neWtotalPR);

    

                        }

                        

                });



                $(".add-total-pizza-basket").click(function(){

                    var fullModal=$(this).attr('data-take');

                    //console.log($("#"+fullModal).find("#data-select-place").html());

                    var totalCartPrice=$("#"+fullModal).find(".totlabsk").html();

                    var main_product_name=$("#"+fullModal).attr("data-main-product");

                    

                    var newTextAllExtra='<b>'+main_product_name+'</b>';

                    $.each($("#"+fullModal).find("#data-select-place").find('.custom-radio-input-group-two'),function(index,row){

                        var nExtraText=$(row).attr('data-text');

                        var nExtraID=$(row).attr('data-id');

                        newTextAllExtra+='<div>+'+nExtraText+'</div>';

                    });



                    $.each($("#"+fullModal).find(".proDesc"),function(index,row){

                        //console.log(row);

                        if($(row).children('span:eq(0)').html()!=0)

                        {

                            newTextAllExtra+='+'+$(row).attr('data-extra-name')+'<br>';

                        }

                    });



                    var strHTML='<li><a class="cart-mini-lft" href="product.html"><img src="images/shop/pro-2.jpg" alt=""></a><div class="cart-body"><a href="product.html">'+newTextAllExtra+'</a><div class="price">£'+totalCartPrice+'</div></div><a class="remove" href="#"><i class="fa fa-times" title="Remove"></i></a></li>';



                    //$(".mini-cart-list").append(strHTML);

                    $(".close-modal").click();









                    var cartData=$("#"+fullModal).children('.modal-sandbox').html();

                    var item_id=$(this).attr('data-id');

                    var addtoCartURL="{{url('order-item/add-to-cart')}}";

                    //------------------------Ajax POS Start-------------------------//

                    $.ajax({

                        'async': false,

                        'type': "POST",

                        'global': false,

                        'dataType': 'json',

                        'url': addtoCartURL,

                        'data': 

                        {

                            'item_id':item_id,

                            'pizza_menu':1,

                            'cartData':cartData,

                            '_token':"{{csrf_token()}}"

                        },

                        'success': function (data) {

                            //tmp = data;

                         //   console.log("Pizza Menu Processing : "+data);

                            loadCart(data);

                        }

                    });

                    //------------------------Ajax POS End---------------------------//



                });



                /* Ending Pizza Menu Activity*/

                

            });

        </script>

        <script>

           

            var $cache = $('.my-sticky-element');



           

            var vTop = $cache.offset().top - parseFloat($cache.css('margin-top').replace(/auto/, 0));

              $(window).scroll(function (event) {

                // what the y position of the scroll is

                var y = $(this).scrollTop();



                // whether that's below the form

                if (y >= vTop) {

                  // if so, ad the fixed class

                  $cache.addClass('stuck');

                } else {

                  // otherwise remove it

                  $cache.removeClass('stuck');

                }

              });

        </script>

        <script>

            $(".modal-trigger").click(function(e){

              e.preventDefault();

              dataModal = $(this).attr("data-modal");

              $("#" + dataModal).css({"display":"block"});

            });



            $(".close-modal").click(function(){

              $(".modal").css({"display":"none"});

            });

        </script>

        <script>

           

        </script>
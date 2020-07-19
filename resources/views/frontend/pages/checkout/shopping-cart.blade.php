<?php
$objSTD=new MenuPageController();
$Seo=$objSTD->Seo();
?>
@extends('frontend.layout.master')
@section('title','Shopping Cart | ')
@section('seo')
    <meta name="description" content="{{$Seo->online_order_description}}">
    <meta name="keywords" content="{{$Seo->meta}}">
@endsection
@section('content')
<div id="contentWrapper">
				<div class="page-title title-1">
					<div class="container">
						<div class="row">
							<div class="cell-12">
								<h1 class="fx" data-animate="fadeInLeft">Shoping <span>cart</span></h1>
								<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
									<span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><a href="#">Pages </a><span class="line-separate">/</span><a href="#">Shop </a><span class="line-separate">/</span><span>Shoping cart</span>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<style type="text/css">
					.table-style2 th {
					    border-right-color: #fff;
					    border-bottom-color: #5c5c5c;
					}
					table {
					    width: 100%;
					    border: 1px solid #e2e2e2!important;
					    border-spacing: 0;
					    border-collapse: collapse;
					}
					th, td, caption {
					    padding: 10px;
					}
					td, caption {
					    border-right: 1px solid #e2e2e2;
					    border-bottom: 1px solid #e2e2e2;
					}
					tfoot {
					    background: #e9e9e9;
					    font-weight: bold;
					}
					th {
				    text-transform: uppercase;
				    border-right: 1px solid #e2e2e2;
				    background: #f5f5f5;
				    border-bottom: 2px #777 solid;
				}
				tr:nth-child(even) {
				    background: #f3f3f3;
				}
				</style>
				<div class="sectionWrapper">
					<div class="container">
						<table class="table-style2">
							<thead>
								<tr>
									<th class="left-text" colspan="2">Item in Shopping Cart</th>
									<th class="width-10">Price</th>
									<th class="width-50" style="width: 130px;">Qty</th>
									<th class="width-10">Subtotal</th>
								</tr>
							</thead>
							<tbody id="scTab">
								 								
								@if(isset($product))
									<?php $kkk=1; ?>
									@foreach($product as $index=>$pro)
										
										@if(isset($pro['inclusiveMeal']))
										<tr id="sc-{{$index}}" data-cid="{{$index}}">
											<td class="width-10"><a class="remove-item" href="#"><i class="fa fa-times-circle"></i></a></td>
											<td>
												<b>{{$pro['item']}} </b><br />
												@if(count($pro['flavour'])>0)
													@foreach($pro['flavour'] as $rr)
														<span>+{{$rr}}</span><br />
													@endforeach
												@endif
											</td>
											<td class="width-50 center">£<span>{{number_format(($pro['price']/$pro['qty']),2)}}</span></td>
											<td class="qty-txt-box">
												<input type="text" class="qtyyx" readonly="readonly" style="width: 60px !important;" value="{{$pro['qty']}}">
												<i style="font-size: large; color: #e7512f;" class="fa fa-plus-circle fa-2x"></i>
												<i style="font-size: large; color: #e7512f;" class="fa fa-minus-circle fa-2x"></i>
											</td>
											<td class="width-50 center">£<span>{{number_format($pro['price'],2)}}</span></td>
										</tr>
										@else
										<tr id="sc-{{$pro['item']->id}}" data-cid="{{$pro['item']->cid}}">
											<td class="width-10"><a class="remove-item" href="#"><i class="fa fa-times-circle"></i></a></td>
											<td>
												<b>
												@if(isset($pro['sub_cat_name']))
													[{{$pro['sub_cat_name']}}]

												@endif
												</b>
												@if(isset($pro['snd_item']) && isset($pro['item']))
													[<b>{{$pro['item']->name}}</b>]
													@if(count($pro['snd_item'])>0)
														@foreach($pro['snd_item'] as $row)
															<br /> + {{$row['item']->name}} ({{$row['qty']}} X £{{$row['item']->price}})
															
														@endforeach
													@endif
												@elseif(isset($pro['snd_item']) && !isset($pro['item']))
													@if(count($pro['snd_item'])>0)
														@foreach($pro['snd_item'] as $row)
															<br /> + {{$row['item']->name}} ({{$row['qty']}} X £{{$row['item']->price}})
															
														@endforeach
													@endif
												
												@elseif(isset($pro['execArrayData'])) 
													<b>{{$pro['item']->name}} </b>
													@if(count($pro['execArrayData'])>0)
														@foreach($pro['execArrayData'] as $row)
															<br /> + {{$row}}
														@endforeach
													@endif
												@else
												<b>{{$pro['item']->name}} </b>
												@endif
											</td>
											<td class="width-50 center">£<span>{{number_format(($pro['price']/$pro['qty']),2)}}</span></td>
											<td class="qty-txt-box">
												<input type="text" class="qtyyx" readonly="readonly" style="width: 60px !important;" value="{{$pro['qty']}}">
												<i style="font-size: large; color: #e7512f;" class="fa fa-plus-circle fa-2x"></i>
												<i style="font-size: large; color: #e7512f;" class="fa fa-minus-circle fa-2x"></i>
											</td>
											<td class="width-50 center">£<span>{{number_format($pro['price'],2)}}</span></td>
										</tr>
										@endif
										<?php $kkk++; ?>
									@endforeach
								@endif
							</tbody>
							
							<tfoot id="scFoot">
								<tr>
									<td colspan="4">Sub-Total</td>
									<td>£<span>1700</span></td>
								</tr>
								<tr class="tax_fid">
									<td colspan="4">Tax <span class="page_tax_rate"></span></td>
									<td>£<span>10.00</span></td>
								</tr>
								<tr>
									<td colspan="4">Discount <span class="discount_per_page"></span><span class="discount_message_page"></span></td>
									<td>£<span>1700</span></td>
								</tr>
								<tr style="display: none;">
									<td colspan="4">Extra Charge </td>
									<td>£<span>0</span></td>
								</tr>
								<tr>
									<td colspan="4">Net Payable</td>
									<td>£<span>1700</span></td>
								</tr>
							</tfoot>
						</table>
						<div class="block shop-bottom-btns">
							<a class="btn btn-large left" href="{{url('order-item')}}">Continue Shopping</a>
							<a class="btn btn-large main-bg right" href="{{url('proced-to-payment')}}">Proceed to Checkout</a>
						</div>
					</div>
				</div>
				
			</div>
@endsection
@section('slider-js')
	<script type="text/javascript">
		var specialItemID="{{env('SPECIALSETMENUID')}}";
		function upgradeCart(opt,itemID)
		{

                    var item_id=itemID;
                    var addtoCartURL="{{url('addtocart/adjust')}}";
                    //------------------------Ajax POS Start-------------------------//
                    $.ajax({
                        'async': true,
                        'type': "POST",
                        'global': true,
                        'dataType': 'json',
                        'url': addtoCartURL,
                        'data': 
                        {
                            'opt':opt,
                            'item_id':item_id,
                            '_token':"{{csrf_token()}}"
                        },
                        'success': function (data) {
                            //tmp = data;
                            console.log("Processing : "+data);
                        }

                    });

                    //------------------------Ajax POS End---------------------------//

                    //$(this).parent().parent().parent().parent().find('.close-modal').click();

        }

		$(document).ready(function(){

			$("#scFoot").children("tr:eq(1)").fadeOut('fast');
			$("#scFoot").children("tr:eq(2)").fadeOut('fast');

			calculateShoppingCartSummary();
			$(".fa-plus-circle").click(function(){
				var RowID=$(this).parent().parent().attr("id");
				var QTY=$("#"+RowID).find("input").val();
				var newQTY=(QTY-0)+(1-0);
				if(newQTY<0)
				{
					newQTY=0;
				}

				$("#"+RowID).find("input").val(newQTY);
				calculateShoppingCart(newQTY,RowID);

				upgradeCart('+',RowID);
			});

			$(".fa-minus-circle").click(function(){
				var RowID=$(this).parent().parent().attr("id");
				var QTY=$("#"+RowID).find("input").val();
				var newQTY=(QTY-1);
				if(newQTY<0)
				{
					newQTY=0;
				}

				$("#"+RowID).find("input").val(newQTY);
				calculateShoppingCart(newQTY,RowID);
				upgradeCart('-',RowID);
			});
		});

		function calculateShoppingCart(newQTY,RowID)
		{
			var pr=$("#"+RowID).children("td:eq(2)").children("span").html();
			var prTotal=parseFloat(pr*newQTY).toFixed(2);
			$("#"+RowID).children("td:eq(4)").children("span").html(prTotal);
			calculateShoppingCartSummary();
		}

		function calculateShoppingCartSummary()
		{
			var pr=$("#scTab").find("tr");
			var total=0;
			var specialItemPrice=0;
			var totalQT=0;
			$.each(pr,function(key,row){
				console.log("data-cid",$(row).attr("data-cid"));
				var ptr=$(row).children("td:eq(4)").children("span").html();
				var ptrQT=$(row).children("td:eq(3)").children("input").val();
				total+=(ptr-0);
				totalQT+=(ptrQT-0);
			});

			$.each(pr,function(key,row){
				
				var cid=$(row).attr("data-cid");
				if(specialItemID==cid){
						var ptr=$(row).children("td:eq(4)").children("span").html();
						specialItemPrice+=(ptr-0);
				}
				
			});


			$("#scFoot").children("tr:eq(0)").children("td:eq(1)").children("span").html(parseFloat(total).toFixed(2));




			var tax_rate=$(".top-shopping-cart-short").attr('data-tax-amount');
            var tax=0;
            if(tax_rate)
            {

                    var tax_type = tax_rate.match(/%/g);
                    if(tax_type=='%')
                    {
                            var actual_rate = parseFloat(tax_rate.replace("%", "")).toFixed(2);
                            tax             = parseFloat((total*actual_rate)/100).toFixed(2);
                            $(".page_tax_rate").html(tax_rate);
                    }
                    else
                    {
                            tax             = parseFloat(tax_rate).toFixed(2);
                            $(".page_tax_rate").html(tax_rate);
                    }
            }

            if(tax_rate>0)
            {
            	$("#scFoot").children("tr:eq(1)").fadeIn('slow');
            	$("#scFoot").children("tr:eq(1)").children("td:eq(1)").children("span").html(parseFloat(tax).toFixed(2));
            }
            else
            {
            	$("#scFoot").children("tr:eq(1)").fadeOut('slow');
            }

		
		var discount=0;
		var discount_rate=0;
		var limit_check=0;
		//alert(obj.rec);
		var rec="<?php echo $rec; ?>";
		var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
		var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
		var discType=$(".top-shopping-cart-short").attr("data-disamount-type");
		if(rec=="Collect")
		{
			var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
			var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
		}
		else if(rec=="Delivery")
		{
			var limit_check=$(".top-shopping-cart-short").attr("data-delivery-disamount-limit");
			var discount_rate=$(".top-shopping-cart-short").attr("data-delivery-discount");
		}
		
		if(discType.trim()=="Common")
		{
			var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
			var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
		}

		//alert($(".top-shopping-cart-short").html());

		console.log('Discount Rate',discType);
		
		if(discount_rate)
		{
				var discount_type = discount_rate.match(/%/g);
				if(discount_type=='%')
				{
						

						if(limit_check>0 && (total-specialItemPrice)<limit_check)
						{
								var amount_to_get_discount=limit_check-(total-specialItemPrice);
								discount='0.00';
						}
						else 
						{
				var actual_discount_rate = parseFloat(discount_rate.replace("%", "")).toFixed(2);
				discount        = parseFloat(((total-specialItemPrice)*actual_discount_rate)/100).toFixed(2);
						}
				}
				else
				{
						if(limit_check>0 && (total-specialItemPrice)<limit_check)
						{
								var amount_to_get_discount=limit_check-(total-specialItemPrice);
								discount='0.00';
						}
						else
						{
								discount        = parseFloat(discount_rate).toFixed(2);
						}
				}

		}

        //var discount=0;

        var discType=$(".top-shopping-cart-short").attr("data-disamount-type");
        var discDelType=$(".top-shopping-cart-short").attr("data-delivery-disamount-type");
        var rec="<?php echo $rec; ?>";
        //obj.rec

        //alert(rec);


         var allowDiscount=false;
        if(discType=="Collection" && rec=="Collect")
        {
            allowDiscount=true;
        }
        else if(discType==rec)
        {
            allowDiscount=true;
        }
        else if(discType=="Common" && (rec=="Collect" || rec=="Delivery"))
        {
            allowDiscount=true;
        }
        else if(discType && discDelType && rec=="Collect")
        {
            allowDiscount=true;
        }
        else if(discType && discDelType && rec=="Delivery")
        {
            allowDiscount=true;
        }

		console.log('D Pre Discount Rate =',discount_rate);

        var discount_rate=$(".top-shopping-cart-short").attr("data-discount");

        if(discType && discDelType && rec=="Collect")
        {
        	var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
        }
        else if(discType && discDelType && rec=="Delivery")
        {
        	var discount_rate=$(".top-shopping-cart-short").attr("data-delivery-discount");
        }
		/*
        //alert(allowDiscount);

        //spend-discount
        //var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
        if(discount_rate && allowDiscount)
        {

        	var discount_type = discount_rate.match(/%/g);
            console.log(discount_type);
        	if(discount_type)
        	{
                
        		var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");

        		if(limit_check>0 && (total-specialItemPrice)<limit_check)
        		{
        			var amount_to_get_discount=limit_check-total;
        			discount='0.00';
                    var discountTextString='Spend Another £'+parseFloat(amount_to_get_discount).toFixed(2)+' get '+discount_rate+' discount';
                    $(".discount_message_page").html(discountTextString);
        		}
        		else 
        		{
        			var actual_discount_rate = parseFloat(discount_rate.replace("%", "")).toFixed(2);
        			discount     	= parseFloat(((total-specialItemPrice)*actual_discount_rate)/100).toFixed(2);
        			$(".discount_per_page").html(discount_rate);
        		}

        		
        	}
        	else
        	{

                console.log('Total Preice -',(total-specialItemPrice));
        		var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
        		if(limit_check>0 && (total-specialItemPrice)<limit_check)
        		{
        			var amount_to_get_discount=limit_check-(total-specialItemPrice);
        			discount='0.00';
        			var discountTextString='Spend Another £'+parseFloat(amount_to_get_discount).toFixed(2)+' get '+discount_rate+' discount';
                    $(".discount_per_page").html(discountTextString);
        		}
        		else
        		{
        				discount     	= parseFloat(discount_rate).toFixed(2);
        				$(".discount_per_page").html(discount_rate);

        		}
        		
        	}

        } */

        console.log('D Getting Discount',discType);
        console.log('D Getting Discount Allow',allowDiscount);
        console.log(discount_rate,rec);
        console.log('Discount =',discount);

        	if(discount>0)
        	{
        		$("#scFoot").children("tr:eq(2)").fadeIn('slow');
        		$("#scFoot").children("tr:eq(2)").children("td:eq(1)").children("span").html(parseFloat(discount).toFixed(2));
        	}
        	else
        	{
        		$("#scFoot").children("tr:eq(2)").fadeOut('slow');
        	}
            

            var extraDeliveryCharge=0.00;
            if(rec=="Delivery")
            {
                if(parseFloat(total-specialItemPrice)>14.99)
                {
                    $("#scFoot").children("tr:eq(3)").children('td:eq(1)').children('span').html(extraDeliveryCharge);
                    $("#scFoot").children("tr:eq(3)").hide();
                    extraDeliveryCharge=0.00;
                    console.log('extraDeliveryCharge=',extraDeliveryCharge);
                }
                else
                {
                	if(parseFloat(total-specialItemPrice)>0)
                	{
                		$("#scFoot").children("tr:eq(3)").show();
	                    extraDeliveryCharge='2.00';
	                    $("#scFoot").children("tr:eq(3)").children('td:eq(1)').children('span').html(extraDeliveryCharge);
	                    console.log('extraDeliveryCharge=',extraDeliveryCharge);
                	}
                	else
                	{
                		$("#scFoot").children("tr:eq(3)").children('td:eq(1)').children('span').html(extraDeliveryCharge);
	                    $("#scFoot").children("tr:eq(3)").hide();
	                    extraDeliveryCharge=0.00;
	                    console.log('extraDeliveryCharge=',extraDeliveryCharge);
                	}
                    
                }
            }

			console.log(total,discount,tax,discount_rate,tax_rate,specialItemPrice);
			var netPayable=((total-0)+(extraDeliveryCharge-0)+(tax-0)-discount);
			$("#scFoot").children("tr:eq(4)").children("td:eq(1)").children("span").html(parseFloat(netPayable).toFixed(2));

			$(".top-shopping-cart-short").children("a").html(totalQT+" item(s) - £"+parseFloat(netPayable).toFixed(2));
			//$(".top-shopping-cart-short").html("");
		}
	</script>
@endsection
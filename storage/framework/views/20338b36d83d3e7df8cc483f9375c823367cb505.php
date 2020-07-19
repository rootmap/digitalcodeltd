<?php $__env->startSection('title','Shopping Cart'); ?>
<?php $__env->startSection('content'); ?>
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

								<?php if(isset($product)): ?>
									<?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pro): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr id="sc-<?php echo e($pro['item']->id); ?>">
											<td class="width-10"><a class="remove-item" href="#"><i class="fa fa-times-circle"></i></a></td>
											<td>
												<?php if(isset($pro['sub_cat_name'])): ?>
													[<?php echo e($pro['sub_cat_name']); ?>]
												<?php endif; ?>
												<?php echo e($pro['item']->name); ?></td>
											<td class="width-50 center">£<span><?php echo e(number_format(($pro['price']/$pro['qty']),2)); ?></span></td>
											<td class="qty-txt-box">
												<input type="text" style="width: 60px !important;" value="<?php echo e($pro['qty']); ?>">
												<i style="font-size: large; color: #e7512f;" class="fa fa-plus-circle fa-2x"></i>
												<i style="font-size: large; color: #e7512f;" class="fa fa-minus-circle fa-2x"></i>
											</td>
											<td class="width-50 center">£<span><?php echo e(number_format($pro['price'],2)); ?></span></td>
										</tr>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<?php endif; ?>
							</tbody>
							
							<tfoot id="scFoot">
								<tr>
									<td colspan="4">Sub-Total</td>
									<td>£<span>1700</span></td>
								</tr>
								<tr>
									<td colspan="4">Tax <span class="page_tax_rate"></span></td>
									<td>£<span>10.00</span></td>
								</tr>
								<tr>
									<td colspan="4">Discount <span class="discount_per_page"></span><span class="discount_message_page"></span></td>
									<td>£<span>1700</span></td>
								</tr>
								<tr>
									<td colspan="4">Net Payable</td>
									<td>£<span>1700</span></td>
								</tr>
							</tfoot>
						</table>
						<div class="block shop-bottom-btns">
							<a class="btn btn-large left" href="<?php echo e(url('order-item')); ?>">Continue Shopping</a>
							<a class="btn btn-large main-bg right" href="<?php echo e(url('proced-to-payment')); ?>">Proceed to Checkout</a>
						</div>
					</div>
				</div>
				
			</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('slider-js'); ?>
	<script type="text/javascript">
		$(document).ready(function(){
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
			});
		});

		function calculateShoppingCart(newQTY,RowID)
		{
			var pr=$("#"+RowID).children("td:eq(2)").children("span").html();
			var prTotal=pr*newQTY;
			$("#"+RowID).children("td:eq(4)").children("span").html(prTotal);
			calculateShoppingCartSummary();
		}

		function calculateShoppingCartSummary()
		{
			var pr=$("#scTab").find("tr");
			var total=0;
			var totalQT=0;
			$.each(pr,function(key,row){
				//console.log(key,row);
				var ptr=$(row).children("td:eq(4)").children("span").html();
				var ptrQT=$(row).children("td:eq(3)").children("input").val();
				total+=(ptr-0);
				totalQT+=(ptrQT-0);
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

            $("#scFoot").children("tr:eq(1)").children("td:eq(1)").children("span").html(parseFloat(tax).toFixed(2));

            

            var discount=0;

        //spend-discount
        var discount_rate=$(".top-shopping-cart-short").attr("data-discount");
        if(discount_rate)
        {

        	var discount_type = discount_rate.match(/%/g);
            console.log(discount_type);
        	if(discount_type)
        	{
                
        		var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");

        		if(limit_check>0 && total<limit_check)
        		{

        			var amount_to_get_discount=limit_check-total;
        			discount='0.00';
                    var discountTextString='Spend Another £'+parseFloat(amount_to_get_discount).toFixed(2)+' get '+discount_rate+' discount';
                    $(".discount_message_page").html(discountTextString);
        		}
        		else 
        		{
        			var actual_discount_rate = parseFloat(discount_rate.replace("%", "")).toFixed(2);
        			discount     	= parseFloat((total*actual_discount_rate)/100).toFixed(2);
        			$(".discount_per_page").html(discount_rate);
        		}

        		
        	}
        	else
        	{
                console.log('Total Preice -',total);
        		var limit_check=$(".top-shopping-cart-short").attr("data-disamount-limit");
        		if(limit_check>0 && total<limit_check)
        		{
        			var amount_to_get_discount=limit_check-total;
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

        }



            $("#scFoot").children("tr:eq(2)").children("td:eq(1)").children("span").html(parseFloat(discount).toFixed(2));

			console.log(total,discount,tax,discount_rate,tax_rate);
			var netPayable=((total-0)+(tax-0)-discount);
			$("#scFoot").children("tr:eq(3)").children("td:eq(1)").children("span").html(parseFloat(netPayable).toFixed(2));

			$(".top-shopping-cart-short").children("a").html(totalQT+" item(s) - £"+parseFloat(netPayable).toFixed(2));
			//$(".top-shopping-cart-short").html("");
		}
	</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
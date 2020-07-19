<?php $__env->startSection('title','View Order'); ?>
<?php $__env->startSection('content'); ?>
<div id="contentWrapper">

	<?php 
	$objSTD=new MenuPageController();
	$Seo=$objSTD->Seo();

	?>
	<div class="sectionWrapper img-pattern">
		<div class="container">
			<div class="row">
				    		<aside class="cell-3 right-sidebar">
								<?php echo $__env->make('frontend.extra.user-menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
							</aside>
				    		<div class="cell-9">
								 <div class="blog-posts">
			                		<div class="post-item fx" data-animate="fadeInLeft">
									    <article class="post-content">
	
												<div class="row">
													<div  class="cell-12 service-box-10 fx animated fadeInDown" data-animate="fadeInDown">
														<h3 class="block-head  fx style2 animated fadeInUp" data-animate="fadeInUp" data-animation-delay="400" style="animation-delay: 400ms;">
															<span>View Order [ <?php echo e($order_id); ?> ] </span>
														</h3>
														<div class="row" style="margin-top: -20px;">
															<div class="cell-5">
																<table>
																	<thead>
																		<tr>
																			<th colspan="2">Invoice Info</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>Invoice No</td>
																			<td><?php echo e($order_detail->id); ?></td>
																		</tr>
																		<tr class="even">
																			<td>Invoice Date</td>
																			<td><?php echo e(date("d/m/Y",strtotime($order_detail->invoice_date))); ?></td>
																		</tr>
																		<tr>
																			<td>Invoice Status</td>
																			<td><?php echo e($order_detail->order_status); ?></td>
																		</tr>
																		<tr>
																			<td>Delivery Time</td>
																			<td>
																				<?php if($order_detail->delivery_asap==1): ?>
																					ASAP
																				<?php else: ?>
																					<?php echo e($order_detail->delivery_date); ?> - <?php echo e($order_detail->delivery_time); ?>

																				<?php endif; ?>
																			</td>
																		</tr>
																		<tr class="even">
																			<td>Created</td>
																			<td><?php echo e($order_detail->created_at); ?></td>
																		</tr>
																		<?php if(!empty($order_detail->delivery_note)): ?>
																			<tr class="even">
																				<td>Delivery Note</td>
																				<td><?php echo e($order_detail->delivery_note); ?></td>
																			</tr>
																		<?php endif; ?>
																	</tbody>
																</table>
															</div>
															<div class="cell-2">
															</div>
															<div class="cell-5">
																<table>
																	<thead>
																		<tr>
																			<th colspan="2">Customer Info</th>
																		</tr>
																	</thead>
																	<tbody>
																		<tr>
																			<td>Name</td>
																			<td><?php echo e($customerInfo->first_name); ?></td>
																		</tr>
																		<tr class="even">
																			<td>Phone</td>
																			<td><?php echo e($customerInfo->mobile_phone); ?></td>
																		</tr>
																		<tr>
																			<td>Email</td>
																			<td><?php echo e($customerInfo->email); ?></td>
																		</tr>
																		<tr class="even">
																			<td>Address</td>
																			<td><?php echo e($customerInfo->address); ?></td>
																		</tr>
																		<tr class="even">
																			<td>Zip Code</td>
																			<td><?php echo e($customerInfo->zip_code); ?></td>
																		</tr>
																		
																	</tbody>
																</table>
															</div>
															<div class="cell-12" style="margin-top: 20px;">
																<table>
																	<thead>
																		<tr>
																			<th colspan="5">Invoice Order Detail</th>
																		</tr>
																		<tr>
																			<th style="text-align: left;">SL</th>
																			<th style="text-align: left;">Product</th>
																			<th style="text-align: left;" style="text-align: left;">Quantity</th>
																			<th style="text-align: left;">Unit Price</th>
																			<th style="text-align: left;">Row Total</th>
																		</tr>
																	</thead>
																	<tbody>
																		<?php if(isset($orderItem)): ?>
																			<?php $sl=1; ?>
																			<?php $__currentLoopData = $orderItem; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $itm): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																				<tr>
																					<td><?php echo e($sl); ?></td>
																					<td><?php echo e($itm->pname); ?></td>
																					<td style="text-align: left;"><?php echo e($itm->quantity); ?></td>
																					<td>£<?php echo e($itm->unit_price); ?></td>
																					<td>£<?php echo e($itm->row_total); ?></td>
																				</tr>
																				<?php $sl++; ?>
																			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																		<?php endif; ?>
																	</tbody>
																</table>
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

													


													</div>
													
												</div>
											
									    </article>
									</div><!-- .post-item end -->
									
			                	</div>
					    	</div>
			    		</div>
			<div class="clearfix"></div>
		</div>
	</div>
	
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
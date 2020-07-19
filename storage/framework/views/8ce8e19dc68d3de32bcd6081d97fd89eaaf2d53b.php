<?php $__env->startSection('title','Paid Order | '); ?>
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
														<h3 class="widget-head">
															<span  style="color: #09f; font-weight: bolder;">
																Paid Order [ <?php echo e(count($data)); ?> ]
															</span>
														</h3>
														<div class="table-responsive" style="background: #fff;">
															<table class="table-style2">
																<thead>
																	<tr>
																		<th>SL</th>
																		<th>Order ID</th>
																		<th>Invoice Date</th>
																		<th>Order Status</th>
																		<th>Action</th>
																	</tr>
																</thead>
																<tbody>
																	<?php if(isset($data)): ?>
																		<?php $s=1; ?>
																		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
																			<tr>
																				<td><?php echo e($s); ?></td>
																				<td style="text-align: center;">
																					<?php echo e($row->id); ?>

																				</td>
																				<td style="text-align: center;">
																					<?php echo e(date("d/m/Y",strtotime($row->invoice_date))); ?>

																				</td>
																				<td style="text-align: center;">
																					<?php echo e(strtoupper($row->order_status)); ?>

																				</td>
																				<td style="text-align: center;">
																					<a class="btn btn-danger" href="<?php echo e(url('user/order/view/'.$row->id)); ?>">
																						<i class="fa fa-plus"></i> View Order
																					</a>
																				</td>
																			</tr>
																			<?php $s++; ?>
																		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
																	<?php endif; ?>
																</tbody>
															</table>
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
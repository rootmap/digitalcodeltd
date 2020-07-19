
<?php $__env->startSection('title','View Profile'); ?>
<?php $__env->startSection('content'); ?>
<div id="contentWrapper">

	<?php 
	$objSTD=new MenuPageController();
	$Seo=$objSTD->Seo();

	?>
	<div class="sectionWrapper img-pattern">
		<div class="container">
			<?php echo $__env->make('frontend.extra.msg', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
														<div class="row">
															<div class="cell-7">
																<form action="<?php echo e(url('update/user')); ?>" method="POST">
																	<?php echo e(csrf_field()); ?>

																	<table>
																		<thead>
																			<tr>
																				<th colspan="2">Update Your Profile</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>Name </td>
																				<td>
																					<div class="input-box">
																						<input style="width: 100%;" type="text" name="name" class="txt-box" value="<?php echo e(Auth::user()->name); ?>">
																					</div>
																				</td>
																			</tr>
																			<tr class="even">
																				<td>Email</td>
																				<td>
																					<div class="input-box">
																						<input style="width: 100%;" type="text" name="email" class="txt-box" value="<?php echo e(Auth::user()->email); ?>">
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>Phone Number</td>
																				<td>
																					
																					<div class="input-box">
																						<input style="width: 100%;" type="text" name="phone" class="txt-box" value="<?php echo e($customerInfo->mobile_phone); ?>">
																					</div>
																				</td>
																			</tr>
																			<tr class="even">
																				<td>Address</td>
																				<td>
																					
																					<div class="input-box">
																						<textarea style="width: 100%; min-height: 60px;" type="text" name="address" class="txt-box"><?php echo e($customerInfo->address); ?></textarea>
																					</div>
																				</td>
																			</tr>
																			
																		</tbody>
																		<tfoot>
																			<tr>
																				<th colspan="2">
																					<button type="submit" class="btn btn-success">Update Profile</button> 
																				
																				</th>
																			</tr>
																		</tfoot>
																	</table>
																</form>
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
@extends('frontend.layout.master')
@section('title','View Profile | ')
@section('content')
<div id="contentWrapper">

	<?php 
	$objSTD=new MenuPageController();
	$Seo=$objSTD->Seo();

	?>
	<div class="sectionWrapper img-pattern">
		<div class="container">
			@include('frontend.extra.msg')
			<div class="row">
				    		<aside class="cell-3 right-sidebar">
								@include('frontend.extra.user-menu')
							</aside>
				    		<div class="cell-9">
								 <div class="blog-posts">
			                		<div class="post-item fx" data-animate="fadeInLeft">
									    <article class="post-content">
	
												<div class="row">
													<div  class="cell-12 service-box-10 fx animated fadeInDown" data-animate="fadeInDown">
														<div class="row">
															<div class="cell-7">
																<form action="{{url('update/password')}}" method="POST">
																	{{csrf_field()}}
																	<table>
																		<thead>
																			<tr>
																				<th colspan="2">Update Your Password</th>
																			</tr>
																		</thead>
																		<tbody>
																			<tr>
																				<td>Old Password </td>
																				<td>
																					<div class="input-box">
																						<input style="width: 100%;" type="password" name="old_password" class="txt-box">
																					</div>
																				</td>
																			</tr>
																			<tr class="even">
																				<td>New Password</td>
																				<td>
																					<div class="input-box">
																						<input style="width: 100%;" type="password" name="password" class="txt-box">
																					</div>
																				</td>
																			</tr>
																			<tr>
																				<td>Re-Type Password</td>
																				<td>
																					
																					<div class="input-box">
																						<input style="width: 100%;" type="password" name="retype_password" class="txt-box">
																					</div>
																				</td>
																			</tr>
																			
																			
																		</tbody>
																		<tfoot>
																			<tr>
																				<th colspan="2">
																					<button type="submit" class="btn btn-success">Update Password</button> 
																				
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
@endsection

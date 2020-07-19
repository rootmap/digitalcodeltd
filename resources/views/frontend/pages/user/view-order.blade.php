@extends('frontend.layout.master')
@section('title','View Order | ')
@section('content')
<div id="contentWrapper">

	<?php 
	$objSTD=new MenuPageController();
	$Seo=$objSTD->Seo();

	?>
	<div class="sectionWrapper img-pattern">
		<div class="container">
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
														<h3 class="block-head  fx style2 animated fadeInUp" data-animate="fadeInUp" data-animation-delay="400" style="animation-delay: 400ms;">
															<span>View Order [ {{$order_id}} ] </span>
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
																			<td>{{$order_detail->id}}</td>
																		</tr>
																		<tr class="even">
																			<td>Invoice Date</td>
																			<td>{{date("d/m/Y",strtotime($order_detail->invoice_date))}}</td>
																		</tr>
																		<tr>
																			<td>Invoice Status</td>
																			<td>
																				@if($order_detail->payment_method=="Cash" && $order_detail->order_status=="Pending")
																					Paid in Cash
																				@else
																				{{strtoupper($order_detail->order_status)}}
																				@endif
																			</td>
																		</tr>
																		<tr>
																			<td>Delivery Time</td>
																			<td>
																				@if($order_detail->delivery_asap==1)
																					ASAP
																				@else
																					{{$order_detail->delivery_date}} - {{$order_detail->delivery_time}}
																				@endif
																			</td>
																		</tr>
																		<tr class="even">
																			<td>Created</td>
																			<td>{{$order_detail->created_at}}</td>
																		</tr>
																		@if(!empty($order_detail->delivery_note))
																			<tr class="even">
																				<td>Delivery Note</td>
																				<td>{{$order_detail->delivery_note}}</td>
																			</tr>
																		@endif
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
																			<td>{{$customerInfo->first_name}}</td>
																		</tr>
																		<tr class="even">
																			<td>Phone</td>
																			<td>{{$customerInfo->mobile_phone}}</td>
																		</tr>
																		<tr>
																			<td>Email</td>
																			<td>{{$customerInfo->email}}</td>
																		</tr>
																		<tr class="even">
																			<td>Address</td>
																			<td>{{$customerInfo->address}}</td>
																		</tr>
																		<tr class="even">
																			<td>Zip Code</td>
																			<td>{{$customerInfo->zip_code}}</td>
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


																		
																		@if(isset($orderItem))
																			<?php $sl=1; ?>
																			@foreach($orderItem as $itm)
																				<tr>
																					<td>{{$sl}}</td>
																					<td>
																							<?php $pro=unserialize($itm->cart_json); 
																							?>

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
																					<td style="text-align: left;">{{$itm->quantity}}</td>
																					<td>
																						@if(isset($pro['snd_item']) && isset($pro['item']))
																							@if(count($pro['snd_item'])>0)
																								<?php 
																								$ik=0; 
																								?>
																								@foreach($pro['snd_item'] as $row)
																									<?php 
																									if($ik>0)
																									{
																										echo "<br />";
																									}
																									?>
																									{{$row['qty']}} X £{{$row['item']->price}}
																									<?php $ik++; ?>
																								@endforeach
																							@endif
																						@elseif(isset($pro['snd_item']) && !isset($pro['item']))
																							@if(count($pro['snd_item'])>0)
																								<?php $ik=0; ?>
																								@foreach($pro['snd_item'] as $row)
																									<?php 
																									if($ik>0)
																									{
																										echo "<br />";
																									}
																									?>
																									{{$row['qty']}} X £{{$row['item']->price}}
																									<?php $ik++; ?>
																								@endforeach
																							@endif
																						@else
																						<b>£{{$itm->unit_price}}</b>
																						@endif
																					</td>
																					<td>£{{$itm->row_total}}</td>
																				</tr>
																				<?php $sl++; ?>
																			@endforeach
																		@endif
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
@endsection

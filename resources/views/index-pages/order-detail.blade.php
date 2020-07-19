@extends('front-layout.master')

@section('content')

<div id="page">

    <div class="columns-container">

        <div id="columns" class="container">

            <div class="row" style="padding-top: 20px;">



                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12 myDivToPrint">

                    <h1 id="cart_title" class="page-heading"> Order Detail : {{$tracking}} <span class="heading-counter">Welcome Mr.  : <span id="summary_products_quantity">{{Auth::user()->name}}</span> </span></h1>

                    <p id="emptyCartWarning" class="alert alert-warning unvisible">Your shopping cart is empty.</p>







                    <div class="row">

                        <div class="col-md-12">

                            <div class="table-responsive">

                                <table class="table table-bordered table-hover">

                                    <tbody>

                                        <tr>

                                            <td valign="top">

                                                <h3>{{$seo[0]->name}}</h3>

                                                <div>{{$contactdetail[0]->contact_address}}</div>

                                                <div>{{$contactdetail[0]->contact_email}}</div>

                                                <div>{{$contactdetail[0]->contact_phone}}</div>

                                            </td>

                                            <td valign="top">

                                                <h3>{{$custo[0]->name}}</h3>

                                                <div>Customer ID : {{$custo[0]->email}}</div>

                                                <div>Email : {{$custo[0]->email}}</div>

                                                <div>Phone : {{$custo[0]->phone}}</div>





                                            </td>

                                        </tr>

                                    </tbody>

                                </table>

                                <table class="table table-bordered table-hover">

                                    <thead>

                                        <tr>

                                            <th>ORDER ID</th>

                                            <th>Item</th>

                                            <th>Quantity</th>

                                            <th>Single Price</th>

                                            <th>Total Price</th>

                                            <th>Order Date</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <?php $order_total = 0; ?>

                                        @if(isset($orderdetail))

                                        @foreach($orderdetail as $ord)

                                        <tr>

                                            <td>{{$ord->id}}</td>

                                            <td>{{$ord->product_name}}</td>

                                            <td>

                                                {{$ord->quantity}}

                                                

                                            @if(!empty($ord->unit))

                                             [<b>Unit : </b> {{$ord->unit}} ]

                                            @endif 

                                            @if(!empty($ord->color))

                                             [<b>Color : </b> {{$ord->color}} ]

                                            @endif

                                           

                                            </td>

                                            <td>{{$ord->unit_price?$ord->unit_price:$ord->row_total}}</td>

                                            <td>{{$ord->row_total}}</td>

                                            <td><?= date('d/m/Y', strtotime($ord->created_at)) ?>

                                                <?php $order_total += $ord->row_total; ?>

                                            </td>

                                        </tr>

                                        @endforeach

                                        @else

                                        <tr>

                                            <td colspan="5"><h3 class="text-primary">No Order Found</h3></td>



                                        </tr>

                                        @endif

                                    </tbody>

                                </table>

                            </div>

                        </div>

                        <div class="col-md-6 col-sm-12 pull-right">

                            <div class="table-responsive">

                                <table class="table table-bordered table-hover">

                                    <thead>

                                        <tr>

                                            <th style="text-align: center !important;" align="center" colspan="2">Summary</th>

                                        </tr>

                                    </thead>

                                    <tbody>

                                        <tr>

                                            <td align="right" style="text-align: right !important; font-weight: bolder;">Invoice ID</td>

                                            <td>{{$orders[0]->id}}</td>

                                        </tr>

                                        <tr>

                                            <td align="right" style="text-align: right !important; font-weight: bolder;">Invoice Status</td>

                                            <td> {{$orders[0]->order_status}}</td>

                                        </tr>

                                        <tr>

                                            <td align="right" style="text-align: right !important; font-weight: bolder;">Invoice Created</td>

                                            <td><?php echo date('d/m/Y', strtotime($orders[0]->invoice_date)); ?></td>

                                        </tr>

                                        <tr>

                                            <td align="right" style="text-align: right !important; font-weight: bolder;">Total</td>

                                            <td>{{$order_total}}</td>

                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>





                    </div>







                    <div class="col-md-12 text-center notprintdisplay">

                        <p class="cart_navigation">

                            <a href="{{url('user-dashboard')}}" class="button-exclusive btn btn-default" title="Dashboard"> <i class="icon-chevron-left"></i> Back to Dashboard </a>

                            <a href="javascript:PrintElem('center_column')" class="button-exclusive btn btn-default" title="Print"> <i class="icon-print"></i> Print </a>

                        </p>



                    </div>







                </div>

            </div>

        </div>

    </div>

</div>



@endsection

@include('front-include.titleseo')

@include('front-include.index_js')


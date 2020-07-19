@extends('front-layout.master')
@section('content')
<div id="page">
    <div class="columns-container">
        <div id="columns" class="container">
            <div class="row" style="padding-top: 20px;">

                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 id="cart_title" class="page-heading"> Total Pending Orders : {{count($orders)}} <span class="heading-counter">
                            <style>
                                /* Style The Dropdown Button */
                                .dropbtn {
                                    background-color: #00CDCD;
                                    color: white;
                                    padding: 16px;
                                    font-size: 16px;
                                    border: none;
                                    cursor: pointer;
                                    margin-top: -20px;
                                }

                                /* The container <div> - needed to position the dropdown content */
                                .dropdown {
                                    position: relative;
                                    display: inline-block;
                                }

                                /* Dropdown Content (Hidden by Default) */
                                .dropdown-content {
                                    display: none;
                                    position: absolute;
                                    min-width: 160px;
                                    background-color: #f9f9f9;
                                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                    z-index: 1;
                                }

                                /* Links inside the dropdown */
                                .dropdown-content a {
                                    color: black;
                                    padding: 12px 16px;
                                    text-decoration: none;
                                    display: block;
                                }

                                /* Change color of dropdown links on hover */
                                .dropdown-content a:hover {background-color: #f2f2f2}

                                /* Show the dropdown menu on hover */
                                .dropdown:hover .dropdown-content {
                                    display: block;
                                }

                                /* Change the background color of the dropdown button when the dropdown content is shown */
                                .dropdown:hover .dropbtn {
                                    background-color: #3e8e41;
                                }
                            </style>

                            <div class="dropdown">
                                <button class="dropbtn">Profile <i class="fa fa-arrow-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="#">View Profile</a>
                                    <a href="#">Edit Profile</a>
                                </div>
                            </div>
                            Welcome Mr.  : <span id="summary_products_quantity">{{Auth::user()->name}}</span> </span></h1>
                    <p id="emptyCartWarning" class="alert alert-warning unvisible">Your shopping cart is empty.</p>



                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>ORDER ID</th>
                                            <th>Order Item</th>
                                            <th>Order Amount</th>
                                            <th>Order Status</th>
                                            <th>Order Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($orders))
                                            @foreach($orders as $ord)
                                            <tr>
                                                <td>{{$ord->id}}</td>
                                                <td>
                                                <?php
                                                $quantity=0;
                                                $rowtotal=0;
                                                foreach($ord->orderItem as $rd):
                                                    $quantity+=$rd->quantity;
                                                    $rowtotal+=$rd->row_total;
                                                endforeach;
                                                echo $quantity;    
                                                ?></td>
                                                <td><?=$rowtotal?></td>
                                                <td>
                                                    @if($ord->order_status=="Pending")
                                                        <span class="btn btn-warning">{{$ord->order_status}}</span>
                                                    @elseif($ord->order_status=="Cancel")
                                                        <span class="btn btn-danger">{{$ord->order_status}}</span>
                                                    @else
                                                        <span class="btn btn-success">{{$ord->order_status}}</span>
                                                    @endif
                                                </td>
                                                <td><?=date('d/m/Y', strtotime($ord->invoice_date))?></td>
                                                <td>
                                                    <a href="{{url('order-detail/'.$ord->tracking)}}" class="btn btn-success">Order Detail</a>
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


                    </div>



                    <div class="col-md-12 text-center">
                        <p class="cart_navigation">
                            <a href="{{url('user-dashboard')}}" class="button-exclusive btn btn-default" title="Dashboard"> <i class="icon-chevron-left"></i> Back to Dashboard </a>
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

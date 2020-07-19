@extends('front-layout.master')
@section('content')
<div id="page">
    <div class="columns-container">
        <div id="columns" class="container">
            <div class="row" style="padding-top: 20px;">

                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 id="cart_title" class="page-heading"> Dashboard <span class="heading-counter">

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

                            





                            Welcome  : <span id="summary_products_quantity" style="padding-right: 20px;">{{Auth::user()->name}}</span>
                            
                            <div class="dropdown">
                                <button class="dropbtn">Profile <i class="fa fa-arrow-down"></i></button>
                                <div class="dropdown-content">
                                    <a href="{{url('customer-profile/view')}}">View Profile</a>
                                    <a href="{{url('customer-profile/edit')}}">Edit Profile</a>
                                </div>
                            </div>

                        </span></h1>
                    <p id="emptyCartWarning" class="alert alert-warning unvisible">Your shopping cart is empty.</p>



                    <div class="row">
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-basket fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{count($orders)}}</div>
                                            <div>Total Order!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('user-order')}}/{{Auth::user()->name}}/total-orders">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-bag fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{count($orderspending)}}</div>
                                            <div>Pending Orders</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('user-order')}}/{{Auth::user()->name}}/pending-orders">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-danger">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-shopping-cart fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{count($orderscancel)}}</div>
                                            <div>Cancel Orders!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('user-order')}}/{{Auth::user()->name}}/cancel-orders">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="fa fa-cart-arrow-down fa-5x"></i>
                                        </div>
                                        <div class="col-xs-9 text-right">
                                            <div class="huge">{{count($orderspaid)}}</div>
                                            <div>Paid Orders!</div>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{url('user-order')}}/{{Auth::user()->name}}/paid-orders">
                                    <div class="panel-footer">
                                        <span class="pull-left">View Details</span>
                                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                        <div class="clearfix"></div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>



                    <div class="col-md-12 text-center">
                        <p class="cart_navigation">
                            <a href="{{url('home')}}" class="button-exclusive btn btn-default" title="Continue shopping"> <i class="icon-chevron-left"></i>Continue shopping </a>
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

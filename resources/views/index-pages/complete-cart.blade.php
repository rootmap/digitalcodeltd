@extends('front-layout.master')
@section('content')
<div id="page">
    <div class="columns-container">
        <div id="columns" class="container">
            <div class="row" style="padding-top: 20px;">

                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 id="cart_title" class="page-heading">{{$messsum}}  <span class="heading-counter">Your order-id was : <span id="summary_products_quantity">{{$oid}}</span> </span></h1>
                    <p id="emptyCartWarning" class="alert alert-warning unvisible">Your shopping cart is empty.</p>




                    <?= $message ?>


                    <div class="col-md-12 text-center">
                        <p class="cart_navigation">
                            <a href="{{url('home')}}" class="button-exclusive btn btn-default" title="Continue shopping"> <i class="icon-chevron-left"></i>Continue shopping </a>
                            <a href="{{url('user-dashboard')}}" class="button-exclusive btn btn-default" title="Dashboard"> <i class="icon-dashboard"></i> Dashboard </a>
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

<?php
$objSTD=new MenuPageController();
$Seo=$objSTD->Seo();
?>
@extends('frontend.layout.master')
@section('title',$page_name.' | ')
@section('seo')
    <meta name="description" content="{{$page_name}}">
    <meta name="keywords" content="{{$page_name}}">
@endsection
@section('content')	
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft">{{$page_name}}</h1>
                    <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="#">Home</a> <span class="line-separate">/</span><span> Other Page</span> <span class="line-separate">/</span><span> {{$page_name}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                 <p>{!!html_entity_decode($extrapageData->description)!!}</p>
            </div>
        </div>
    </div>
@endsection	




@section('css')
    <link rel="stylesheet" href="{{url('front-theme/css/custom.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/css/radio-button/style.css')}}">
    <style type="text/css">
        .display-none-sec
        {
            display: none !important;
        }

        .discount-space
        {
            display: none;
        }

        .cart-item-highlight
        {
            font-weight: 600;
        }

        .cart-data-mini-box
        {
            width: 100%;
            display: block; 
        }

        .cart-price-mini-box
        {
            display:inline-grid;
            font-weight: 600;
        }
        .cart-price-mini-box > span::before 
        {
            content:"$";
            display:inline-grid;
            font-weight: 600;
        }
        .cart-extra-mini-box
        {
            width: 150px;
            display:inline-grid;
            overflow: hidden;
            font-weight: bold;
        }
    </style>
@endsection

@section('slider-js')
    <script type="text/javascript" src="{{url('front-theme/js/jquery.animateNumber.min.js')}}"></script>
    <script type="text/javascript" src="{{url('front-theme/js/jquery.easypiechart.min.js')}}"></script>

    <script src="{{url('front-theme/js/sweetalert.min.js')}}"></script>
    @include('frontend.extra.cart-js')
@endsection

<?php
$objSTD=new MenuPageController();
$Seo=$objSTD->Seo();
?>
@extends('frontend.layout.master')
@section('title','Our Offer | ')
@section('seo')
    <meta name="description" content="{{$Seo->offer_description}}">
    <meta name="keywords" content="{{$Seo->meta}}">
@endsection
@section('content')	
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft">Our  <span>Offers</span></h1>
                   <!-- <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span> Current Offer</span>-->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                @if(isset($offer))
                @foreach($offer as $off)
                <div class="cell-6">
                    <div class="material-card-content" style="border-top-color: rgb(246, 187, 66);">

                        <h4 class="material-card-title">{{$off->title}}</h4>
                        <p class="material-card-summary">({{$off->name}})</p>
                        <hr>                                    
                        <p class="material-card-summary"><?= html_entity_decode($off->description);?></p>
                        <img class="cover" alt="" src="{{ URL::asset('upload/today-offer/'.$off->offerimage) }}">
                    </div>
                </div>
                @endforeach
                @endif
                {{-- <div class="cell-3">
                    <div class="material-card-content" style="border-top-color: rgb(246, 187, 66);">

                        <h4 class="material-card-title">SUNDAY SPECIAL BUFFET LUNCH</h4>
                        <p class="material-card-summary">(Dine in Only)</p>
                        <hr>                                    
                        <p class="material-card-summary">Help yourself to a wonderful selections of starters, selections of main dishes, side vegetables, rice &amp; bread</p>
                        <img class="cover" alt="" src="{{url('front-theme/images/sunday-buffet-offer.jpg')}}">
                    </div>
                </div>
                <div class="cell-3">
                    <div class="material-card-content" style="border-top-color: rgb(246, 187, 66);">

                        <h4 class="material-card-title">SUNDAY SPECIAL BUFFET LUNCH</h4>
                        <p class="material-card-summary">(Dine in Only)</p>
                        <hr>                                    
                        <p class="material-card-summary">Help yourself to a wonderful selections of starters, selections of main dishes, side vegetables, rice &amp; bread</p>
                        <img class="cover" alt="" src="{{url('front-theme/images/sunday-buffet-offer.jpg')}}">
                    </div>
                </div>
                <div class="cell-3">
                    <div class="material-card-content" style="border-top-color: rgb(246, 187, 66);">

                        <h4 class="material-card-title">SUNDAY SPECIAL BUFFET LUNCH</h4>
                        <p class="material-card-summary">(Dine in Only)</p>
                        <hr>                                    
                        <p class="material-card-summary">Help yourself to a wonderful selections of starters, selections of main dishes, side vegetables, rice &amp; bread</p>
                        <img class="cover" alt="" src="{{url('front-theme/images/sunday-buffet-offer.jpg')}}">
                    </div>
                </div> --}}
                



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

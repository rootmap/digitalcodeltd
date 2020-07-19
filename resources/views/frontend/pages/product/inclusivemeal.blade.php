<?php
$objSTD=new MenuPageController();
$Seo=$objSTD->Seo();
?>
@extends('frontend.layout.master')
@section('title','Order Your Menu | ')
@section('seo')
    <meta name="description" content="{{$Seo->online_order_description}}">
    <meta name="keywords" content="{{$Seo->meta}}">
@endsection
@section('content')	
   <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx proban" data-animate="fadeInLeft">Inclusive Meal</h1>
                    
                        
                    </div>

                </div>
            </div>
        </div>
    </div>



    <div class="sectionWrapper">
        <div class="container">
            <div class="row">
                <div class="box success-box center hidden">Your item was added succesfully.</div>
                <div class="clearfix"></div>
                <!-- cell6  class="proButton modal-trigger" data-modal="modal-name" -->
                <div class="cell-9">
                    

                    @if(session('error'))
                        <div class="clearfix"></div>
                            <div class="padd-top-20"></div>
                            <div class="cell-12">
                                <blockquote>
                                    <h3 style="text-align: center; color: #f00;">{{session('error')}} </h3>
                                </blockquote>
                        </div>
                    @endif

                    

                    <div class="clearfix"></div>
                    <div class="padd-top-20"></div>
                    <!-- NOTE -->
                    <div class="productdes">
                        @include('frontend.extra.inclusive_menu')
                    </div>
                    <div class="productmbl">
                        @include('frontend.extra.inclusive-mobile')
                    </div>
                    
                     
                </div>

                
                @include('frontend.extra.cart')



            </div>
        </div>
    </div>
@endsection	





@section('css')
    <link rel="stylesheet" href="{{url('front-theme/css/custom.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/css/radio-button/style.css')}}">
    <style type="text/css">
        .category_fix_menu {
	    position: fixed;
	    z-index: 1;
	    top: 120px;
	}
	.category_fix_menu div ul li {
		width: 241px !important;
	}

	.category_fix_menu_all {
	    position: fixed;
	    z-index: 1;
	    top: 158px;
	}
	.category_fix_menu_all div ul li {
		width: 241px !important;
	}

	.mini_fix_shopping_cart {
	    position: fixed;
	    z-index: 1;
	    top: 120px;
	    width: 260px !important;
	}

	.mini_fix_shopping_cart .mini-cart {
		
	}

	.blog-cat-w > div > ul > li:hover:after{
		content: ".";
		color: red;
		background: #f00;
		position: absolute;
		right: 0px;
		padding: 10px 0px;
		margin-top: -10px !important;
	}

	.blog-cat-w > div > ul > li.active:after{
		content: ".";
		color: red;
		background: #f00;
		position: absolute;
		right: 0px;
		padding: 10px 0px;
		margin-top: -10px !important;
	}

	/* width */
    .mini-category-list::-webkit-scrollbar {
        width: 5px;
    }

    /* Track */
    .mini-category-list::-webkit-scrollbar-track {
        background: #f1f1f1; 
    }
     
    /* Handle */
    .mini-category-list::-webkit-scrollbar-thumb {
        background: #888; 
    }

    /* Handle on hover */
    .mini-category-list::-webkit-scrollbar-thumb:hover {
        background: #e7512f; 
    }

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
    @include('frontend.extra.inclusive-meal')
    <script type="text/javascript">     
    var inmJson=<?=json_encode($inclusiveMeal)?>;  
        $(document).ready(function(){
            $('.inmPrice').change(function(){
                var tagID=$(this).attr('data-tag');
                var getOptPrice=0;
                $.each($('.imj'+tagID),function(k,r){
                    var getOptVal=$(r).val();
                    if(getOptVal!=0)
                    {
                        var optnName=$(r).attr('name');
                        var optPrice=$('select[name='+optnName+'] option:selected').attr('data-price');
                        getOptPrice+=(optPrice-0);
                    }
                });

                var defualtMeal=0;
                $.each(inmJson,function(key,row){
                     if(row.id==tagID){  defualtMeal=row.price; }
                 });

                totalPriceLine=parseFloat((defualtMeal-0)+(getOptPrice-0)).toFixed(2);
                $('#imp'+tagID).html(parseFloat(totalPriceLine));

            });

            //mobile price
            $('.inmPriceMobile').change(function(){
                var tagID=$(this).attr('data-tag');
                var getOptPrice=0;
                $.each($('.imjMobile'+tagID),function(k,r){
                    var getOptVal=$(r).val();
                    if(getOptVal!=0)
                    {
                        var optnName=$(r).attr('name');
                        var optPrice=$('select[name='+optnName+'] option:selected').attr('data-price');
                        getOptPrice+=(optPrice-0);
                    }
                });

                var defualtMeal=0;
                $.each(inmJson,function(key,row){
                     if(row.id==tagID){  defualtMeal=row.price; }
                 });

                totalPriceLine=parseFloat((defualtMeal-0)+(getOptPrice-0)).toFixed(2);
                $('#micm_'+tagID).html(parseFloat(totalPriceLine));

            });

            $('.addtocartim').click(function(){
                var tagID=$(this).attr('data-pull');
                var proName=$('#proName'+tagID).children('div').children().html();
                //var proNameSingle=$('#proName'+tagID).children('div').children().html();
                //console.log('Product Name = ',proName);
                var getOptPrice=0;
                var getOptNameParam='';

                $.each($('.imj'+tagID),function(k,r){
                    var getOptVal=$(r).val();
                    if(getOptVal!=0)
                    {
                        if(getOptNameParam.length>0)
                        {
                            getOptNameParam+=',';
                        }
                        getOptNameParam+=$(r).attr('data-opt-cond')+':'+$(r).val();
                        var optnName=$(r).attr('name');
                        var optPrice=$('select[name='+optnName+'] option:selected').attr('data-price');
                        getOptPrice+=(optPrice-0);
                    }
                });

                //console.log('Product Name Param',getOptNameParam);

                var defualtMeal=0;
                $.each(inmJson,function(key,row){
                     if(row.id==tagID){  defualtMeal=row.price; }
                 });

                 totalPriceLine=parseFloat((defualtMeal-0)+(getOptPrice-0)).toFixed(2);
                 //console.log('totalPriceLine',totalPriceLine);

                 /* if(getOptNameParam.length>0)
                 {
                    proName+='['+getOptNameParam+']';
                 } */

                 var prodRow=proName+'-'+getOptNameParam;

                 $.each($(".mini-cart-list").children('li'),function(k,r){
                    //console.log('Cart Roe',$(r).attr('data-id'));
                    if($(r).attr('data-id'))
                    {
                        if($(r).attr('data-id')==prodRow)
                        {
                            var exQuantity=$(r).children('div').children('a').children('.cartQUANIT').html();
                            var newQuantity=(exQuantity-0)+(1-0);
                            $(r).children('div').children('a').children('.cartQUANIT').html(newQuantity);

                            var exPrice=$(r).children('div').children('a').children('.cartItemPricePR').html();
                            var NewPrice=parseFloat((exPrice-0)+(totalPriceLine-0)).toFixed(2);
                            $(r).children('div').children('a').children('.cartItemPricePR').html(NewPrice);
                            //alert('ALready Found');
                            //return false;
                        }
                    }
                 });

                 //console.log(proName);
                 //console.log(totalPriceLine);

                 var addtoCartURL="{{url('order-item/add-to-cart')}}";
                //------------------------Ajax POS Start-------------------------//
                $.ajax({
                    'async': true,
                    'type': "POST",
                    'global': false,
                    'dataType': 'json',
                    'url': addtoCartURL,
                    'data': {'item_id':tagID,'price':totalPriceLine,'proName':proName,'inMealDetail':getOptNameParam,'inclusiveMeal':1,'_token':"{{csrf_token()}}"},
                    'success': function (data) {
                        //tmp = data;
                    //   console.log("Processing : "+data);
                        loadCart(data);
                    }
                });
            });

            $('.addtocartimMobile').click(function(){
                var tagID=$(this).attr('data-pull');
                var proName=$('#proMobileName'+tagID).children('span:eq(0)').html();
                var getOptPrice=0;
                var getOptNameParam='';

                $.each($('.imjMobile'+tagID),function(k,r){
                    var getOptVal=$(r).val();
                    if(getOptVal!=0)
                    {
                        if(getOptNameParam.length>0)
                        {
                            getOptNameParam+=',';
                        }
                        getOptNameParam+=$(r).attr('data-opt-cond')+':'+$(r).val();
                        var optnName=$(r).attr('name');
                        var optPrice=$('select[name='+optnName+'] option:selected').attr('data-price');
                        getOptPrice+=(optPrice-0);
                    }
                });

                //console.log('Product Name Param',getOptNameParam);

                var defualtMeal=0;
                $.each(inmJson,function(key,row){
                     if(row.id==tagID){  defualtMeal=row.price; }
                 });

                 totalPriceLine=parseFloat((defualtMeal-0)+(getOptPrice-0)).toFixed(2);
                 //console.log('totalPriceLine',totalPriceLine);

                 /* if(getOptNameParam.length>0)
                 {
                    proName+='['+getOptNameParam+']';
                 } */

                 var prodRow=proName+'-'+getOptNameParam;

                 $.each($(".mini-cart-list").children('li'),function(k,r){
                    //console.log('Cart Roe',$(r).attr('data-id'));
                    if($(r).attr('data-id'))
                    {
                        if($(r).attr('data-id')==prodRow)
                        {
                            var exQuantity=$(r).children('div').children('a').children('.cartQUANIT').html();
                            var newQuantity=(exQuantity-0)+(1-0);
                            $(r).children('div').children('a').children('.cartQUANIT').html(newQuantity);

                            var exPrice=$(r).children('div').children('a').children('.cartItemPricePR').html();
                            var NewPrice=parseFloat((exPrice-0)+(totalPriceLine-0)).toFixed(2);
                            $(r).children('div').children('a').children('.cartItemPricePR').html(NewPrice);
                            //alert('ALready Found');
                            //return false;
                        }
                    }
                 });

                 //console.log(proName);
                 //console.log(totalPriceLine);

                 var addtoCartURL="{{url('order-item/add-to-cart')}}";
                //------------------------Ajax POS Start-------------------------//
                $.ajax({
                    'async': true,
                    'type': "POST",
                    'global': false,
                    'dataType': 'json',
                    'url': addtoCartURL,
                    'data': {'item_id':tagID,'price':totalPriceLine,'proName':proName,'inMealDetail':getOptNameParam,'inclusiveMeal':1,'_token':"{{csrf_token()}}"},
                    'success': function (data) {
                        //tmp = data;
                    //   console.log("Processing : "+data);
                        loadCart(data);
                    }
                });
            });

            

            $("#mobileCartMenuShort").click(function(){
                $('html, body').animate({
                    scrollTop: $("#mobileCartWeb").offset().top - ($('#mobileCartWeb')[0].scrollHeight-250)
                }, 1000);
            });
        });

        
    </script>
@endsection

<?php
$mainmenu=$objSTD->mainMenu();
$otherExtraPage=$objSTD->otherExtraPage();
?>
<style type="text/css">
.btn-orange.btn-outlined{
        border-color: #e57b63 !important;
}

@media (min-width: 1281px) {
    .del-info-card{
        margin-top: 0px;
    }
    .sticky .logo a img {
        /*margin-top: 18px !important;*/
        height: 60px;
        width: 75%;
        /* margin-left: 55PX; */
    }
    .mbtext{
        display: none;
        background-color: #fff;
        color: #b57c00;
        font-weight: bold;
        font-size: 24px;
        margin-top: 15px;
        margin-left: 45px;
        width: 75px;
    }
    header.top-head .logo a 
    {
        width: 100%;
        height: 74px;
        display: table;
        margin-top: -16px;
    }
    .logo img{
        width: 100%;
        height: 92px;
        top: 0px;
        position: absolute;
    }
    .mobileHide a {
        display: none !important;
    }

    .btn-custom-top{
        animation-delay: 1700ms;
        background: #b71c1c !important;
        -webkit-box-shadow: 0 5px 0 #CBA574;
        box-shadow: 0 5px 0 #CBA574;
        font-size: 13px;
        margin: 5px;
        width: 150px !important;
        height: 55px !important;
        display:inline-block !important;
    }

    .btn-custom-top span{
        line-height: 2;
    }

    .btn-custom-top .line-two{
        line-height: 2;
        color: #FFC700 !important;
        font-weight: bold !important;
    }

    .cart-icon{
        position: absolute;
        right: 0;
        top: -23px;
    }
    .def-home-cart-btn{
        display: none;
    }

    .hide_mobile{
        display: block;
    }
    .no_top_border_mobile{
        border-top: 0 none !important;
        border-bottom: 0 none !important;
    }
}
/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
    .del-info-card{
        margin-top: 0px;
    }
    .mbtext{
        display: none;
        background-color: #fff;
        color: #b57c00;
        font-weight: bold;
        font-size: 24px;
        margin-top: 15px;
        margin-left: 45px;
        width: 75px;
    }
    header.top-head .logo a 
    {
        
        width: 100%;
        height: 74px;
        display: table;
        margin-top: -16px;
    }
    .logo img{
        width: 100%;
        height: 92px;
        top: -20px;
        position: absolute;
    }
    .sticky img{
        height: 61px;
         top: -3px;
    }
    .mobileHide a {
        display: none !important;
    }
    .btn-custom-top{
        animation-delay: 1700ms;
        background: #b71c1c !important;
        -webkit-box-shadow: 0 5px 0 #CBA574;
        box-shadow: 0 5px 0 #CBA574;
        font-size: 13px;
        margin: 5px;
        width: 150px !important;
        height: 55px !important;
        display:inline-block !important;
    }

    .btn-custom-top span{
        line-height: 2;
    }

    .btn-custom-top .line-two{
        line-height: 2;
        color: #FFC700 !important;
        font-weight: bold !important;
    }
    
    .cart-icon{
        position: absolute;
        right: 0;
        top: -23px;
    }
    .def-home-cart-btn{
        display: none;
    }

    .hide_mobile{
        display: block;
    }
    .no_top_border_mobile{
        border-top: 0 none !important;
        border-bottom: 0 none !important;
    }
}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {
    .del-info-card{
        margin-top: 0px;
    }
    .mbtext{
        display: none;
        background-color: #fff;
        color: #b57c00;
        font-weight: bold;
        font-size: 24px;
        margin-top: 15px;
        margin-left: 45px;
        width: 75px;
    }
   header.top-head .logo a 
    {
        
        width: 100%;
        height: 66px;
        display: block;
    }
    .logo img{
        width: 280px;
        height: 92px;
        margin-left: 30%;
        display: block;
    }
    .mobileHide a {
        display: block;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo{
        display: none !important;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
        margin-left: 0px;
    }

    .cell-5 {
        width: 41.66666667%;
    }
    .btn-custom-top{
        animation-delay: 1700ms;
        background: #b71c1c !important;
        -webkit-box-shadow: 0 5px 0 #CBA574;
        box-shadow: 0 5px 0 #CBA574;
        font-size: 13px;
        margin: 5px;
        width: 150px !important;
        height: 55px !important;
        display:inline-block !important;
    }

    .btn-custom-top span{
        line-height: 2;
    }

    .btn-custom-top .line-two{
        line-height: 2;
        color: #FFC700 !important;
        font-weight: bold !important;
    }
    
    .cart-icon{
        position: absolute;
        right: 0;
        top: -23px;
    }
    .def-home-cart-btn{
        display: none;
    }

    .hide_mobile{
        display: block;
    }
    .no_top_border_mobile{
        border-top: 0 none !important;
        border-bottom: 0 none !important;
    }
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
    .del-info-card{
        margin-top: 0px;
    }
    .mbtext{
        display: none;
        background-color: #fff;
        color: #b57c00;
        font-weight: bold;
        font-size: 24px;
        margin-top: 15px;
        margin-left: 45px;
        width: 75px;
    }
    header.top-head .logo a 
    {
        width: 100%;
        height: 66px;
        display: block;
    }
    .logo img{
        width: 280px;
        height: 66px;
        top: -20px;
        position: absolute;
    }
    .mobileHide a {
        display: block;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo{
        display: none !important;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
        margin-left: 0px;
    }

    .cell-5 {
        width: 41.66666667%;
    }
    .btn-custom-top{
        animation-delay: 1700ms;
        background: #b71c1c !important;
        -webkit-box-shadow: 0 5px 0 #CBA574;
        box-shadow: 0 5px 0 #CBA574;
        font-size: 13px;
        margin: 5px;
        width: 150px !important;
        height: 55px !important;
        display:inline-block !important;
    }

    .btn-custom-top span{
        line-height: 2;
    }

    .btn-custom-top .line-two{
        line-height: 2;
        color: #FFC700 !important;
        font-weight: bold !important;
    }
    
    .cart-icon{
        position: absolute;
        right: 0;
        top: -23px;
    }
    .def-home-cart-btn{
        display: none;
    }

    .hide_mobile{
        display: block;
    }
    .no_top_border_mobile{
        border-top: 0 none !important;
        border-bottom: 0 none !important;
    }
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
    .del-info-card{
        margin-top: 0px;
    }
    .mbtext{
        display: none;
        background-color: #fff;
        color: #b57c00;
        font-weight: bold;
        font-size: 24px;
        margin-top: 15px;
        margin-left: 45px;
        width: 75px;
    }
    /*header.top-head .logo a */
    /*{*/
        /*height: 56px;*/
        /*width: 280px;*/
        /*margin-top: -7px;*/
    /*}*/
    header.top-head .logo a {
        /* height: 56px; */
        width: 100%;
        margin-top: -7px;
        /* text-align: center; */
    }
    .logo img{
        /* width: 140px; */
        /* height: 56px; */
        /* top: -20px; */
        /* position: absolute; */
        width: 140px;
        height: 56px;
        top: 7px;
        position: absolute;
        left: 72px;
    }
    .sticky .logo img {
        /* width: 140px; */
        /* height: 56px; */
        /* top: -20px; */
        /* position: absolute; */
        width: 140px;
        height: 56px;
        top: 2px;
        position: absolute;
        left: 72px;
    }


    .mobileHide a {
        display: block;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo {
        display: block;
        text-align: center;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
        margin-left: 0px;
    }
    .cell-5 {
        width: 41.66666667%;
    }
    .btn-custom-top{
        animation-delay: 1700ms;
        background: #b71c1c !important;
        -webkit-box-shadow: 0 5px 0 #CBA574;
        box-shadow: 0 5px 0 #CBA574;
        font-size: 13px;
        margin: 5px;
        width: 150px !important;
        height: 55px !important;
        display:inline-block !important;
    }

    .btn-custom-top span{
        line-height: 2;
    }

    .btn-custom-top .line-two{
        line-height: 2;
        color: #FFC700 !important;
        font-weight: bold !important;
    }

    /*.cart-icon{*/
        /*position: absolute;*/
        /*right: 0;*/
        /*top: -23px;*/
    /*}*/
    .cart-icon {
        background: #FF1A00 !important;
        position: absolute !important;
        right: 0 !important;
        top: 7px !important;
    }

    .sticky .cart-icon{
        background: #FF1A00 !important;
        display: block;
        top: 2px !important;
    }

    .def-home-cart-btn{
        display: none;
    }

    .hide_mobile{
        display: block;
    }
    .no_top_border_mobile{
        border-top: 0 none !important;
        border-bottom: 0 none !important;
    }

    .home-buttons {
        text-align: center !important;
        margin-top: 15px !important;
        margin-bottom: 30px !important;
    }

    .right {
        float: none !important;
        text-align: center;
    }

    .hb-first-row {
        display: none !important;
    }
}

/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/
@if (Request::path() == 'order-item')
@media (min-width: 320px) and (max-width: 480px) {
    .right {
        float: none !important;
        text-align: center;
    }
    .del-info-card{
        margin-top: 15px;
    }

    .sticky .logo a img{
        margin-top: 22px !important;
        /* height: 50px; */
        margin-left: 55PX;
        position: absolute;
        left: -3px;
    }
    .mbtext{
        display: none !important;
        background-color: #fff;
        color: #b57c00;
        font-weight: bold;
        font-size: 24px;
        margin-left: 45px;
        width: 75px !important;
    }
    /*header.top-head .logo a {*/
    /*height: 15px;*/
    /*width: 280px;*/
    /*margin-top: -7px;*/
    /*}*/

    .cart-icon{
        position: absolute;
        right: 0;
        top: -23px;
    }

    header.top-head .logo a
    {
        height: 30px;
        width: 280px;
        margin-top: -7px;
    }

    header.top-head.sticky .logo a {
        height: 27px;
        width: 280px;
        margin-top: -7px;
    }
    /*.logo img{*/
    /*width: 120px;*/
    /*height: 56;*/
    /*margin-top:2px;*/
    /*margin-left: 30px;*/
    /*top: -20px;*/
    /*position: absolute;*/
    /*}*/
    .logo img {
        width: 150px;
        top: -20px;

        margin-top: 27px !important;
        /* height: 50px; */
        margin-left: 55PX;
        position: absolute;
        left: -3px;
    }
    .mobileHide a {
        display: block;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo{
        display: block;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
         margin-left: 0px;
     }

    .cell-5 {
        width: 41.66666667%;
    }
    .btn-custom-top{
        animation-delay: 1700ms;
        background: #b71c1c !important;
        -webkit-box-shadow: 0 5px 0 #CBA574;
        box-shadow: 0 5px 0 #CBA574;
        font-size: 13px;
        margin: 5px;
        width: 150px !important;
        height: 55px !important;
        display:inline-block !important;
    }

    .btn-custom-top span{
        line-height: 2;
    }

    .btn-custom-top .line-two{
        line-height: 2;
        color: #FFC700 !important;
        font-weight: bold !important;
    }

    .def-home-cart-btn{
        background: #FF1A00 !important;
        display: none !important;
        color: #fff !important;
        font-size: 13px !important;
        width: 155px;
        margin: 10px auto;
        text-align: center;
    }
    .def-home-cart-btn .mobileCartMenuShortCartData{
        color: #fff !important;
        font-size: 13px !important;
        margin-left: 0 !important;
    }

    .sticky .def-home-cart-btn{
        display: none;
    }
    .responsive_mobile_no{
        margin: 5px auto !important;
    }

    .cart-icon{
        background: #FF1A00 !important;
        display: block;
        top: -7px !important;
    }

    .sticky .cart-icon{
        background: #FF1A00 !important;
        display: block;
    }
    .hide_mobile{
        display: none;
    }
    .no_top_border_mobile{
        border-top: 0 none !important;
        border-bottom: 0 none !important;
    }
}
@else
@media (min-width: 320px) and (max-width: 480px) {
    .right {
        float: none !important;
        text-align: center;
    }
    .del-info-card{
        margin-top: 15px;
    }

    .sticky .logo a img{
        margin-top: 27px !important;
        /* height: 50px; */
        margin-left: 55PX;
        position: absolute;
        left: -3px;
    }
    .mbtext{
        display: block;
        background-color: #fff;
        color: #b57c00;
        font-weight: bold;
        font-size: 24px;
        margin-left: 45px;
        width: 75px !important;
    }
    /*header.top-head .logo a {*/
    /*height: 15px;*/
    /*width: 280px;*/
    /*margin-top: -7px;*/
    /*}*/

    .cart-icon{
        position: absolute;
        right: 0;
        top: -23px;
    }

    header.top-head .logo a
    {
        height: 0px;
        width: 280px;
        margin-top: -7px;
    }

    header.top-head.sticky .logo a {
        height: 27px;
        width: 280px;
        margin-top: -7px;
    }
    /*.logo img{*/
    /*width: 120px;*/
    /*height: 56;*/
    /*margin-top:2px;*/
    /*margin-left: 30px;*/
    /*top: -20px;*/
    /*position: absolute;*/
    /*}*/
    .logo img {
        width: 150px;
        margin-left: 15px;
        top: -27px;
        right: 0px;
        position: absolute;
    }
    .mobileHide a {
        display: block;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo {
        display: block;
        text-align: center;
    }
    .buttonlogo a {
        padding: 0px;
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
         margin-left: 0px;
     }

    .cell-5 {
        width: 41.66666667%;
    }
    .btn-custom-top{
        animation-delay: 1700ms;
        background: #b71c1c !important;
        -webkit-box-shadow: 0 5px 0 #CBA574;
        box-shadow: 0 5px 0 #CBA574;
        font-size: 13px;
        margin: 5px;
        width: 150px !important;
        height: 55px !important;
        display:inline-block !important;
    }

    .btn-custom-top span{
        line-height: 2;
    }

    .btn-custom-top .line-two{
        line-height: 2;
        color: #FFC700 !important;
        font-weight: bold !important;
    }

    .def-home-cart-btn{
        background: #FF1A00 !important;
        display: block;
        color: #fff !important;
        font-size: 13px !important;
        width: 155px;
        margin: 10px auto;
        text-align: center;
    }
    .def-home-cart-btn .mobileCartMenuShortCartData{
        color: #fff !important;
        font-size: 13px !important;
        margin-left: 0 !important;
    }

    .sticky .def-home-cart-btn{
        display: none;
    }
    .responsive_mobile_no{
        margin: 5px auto !important;
    }

    .cart-icon{
        display: none;
    }

    .sticky .cart-icon{
        background: #FF1A00 !important;
        display: block;
        top: -7px !important;
    }
    .hide_mobile{
        display: none;
    }
    .no_top_border_mobile{
        border-top: 0 none !important;
        border-bottom: 0 none !important;
    }
}
@endif

@media (min-width: 0px) and (max-width: 319px) {
    .mbtext{
        display: block;
        background-color: #fff;
        color: #b57c00;
        font-weight: bold;
        font-size: 24px;
        margin-left: 45px;
        width: 75px;
    }
    header.top-head .logo a 
    {
        height: 42px;
        width: 240px;
        margin-top: -7px;
        margin-left: 35px;
    }
    .logo img{
        width: 120px;
        height: 62px;
        right: 0px;
    }
    .mobileHide a {
        display: block !important;
        text-align: center;
        background: none !important;
        padding: 2.5vh 0vh 0vh 0vh;
    }

    .buttonlogo{
        display: block;
    }
    .buttonlogo a {
        padding: 0px;
        /* height: 36px !important;
        margin-bottom: 5px !important; */
    }
    .buttonlogo a span{
        margin-left: 0px;
        font-size: 23px;
        font-weight: 500;
    }

    .menuBtn
    {
        margin-top: 14px;
    }

    .cell-5 {
        width: 41.66666667%;
    }
    .btn-custom-top{
        animation-delay: 1700ms;
        background: #b71c1c !important;
        -webkit-box-shadow: 0 5px 0 #CBA574;
        box-shadow: 0 5px 0 #CBA574;
        font-size: 13px;
        margin: 5px;
        width: 150px !important;
        height: 55px !important;
        display:inline-block !important;
    }

    .btn-custom-top span{
        line-height: 2;
    }

    .btn-custom-top .line-two{
        line-height: 2;
        color: #FFC700 !important;
        font-weight: bold !important;
    }
    
    /*.cart-icon{*/
        /*position: absolute;*/
        /*right: 0;*/
        /*top: -23px;*/
    /*}*/

    .def-home-cart-btn{
        background: #b71c1c !important;
        display: block;
        color: #fff !important;
        font-size: 13px !important;
    }
    .def-home-cart-btn .mobileCartMenuShortCartData{
        color: #fff !important;
        font-size: 13px !important;
        margin-left: 0 !important;
    }

    .hide_mobile{
        display: none;
    }
    .no_top_border_mobile{
        border-top: 0 none !important;
        border-bottom: 0 none !important;
    }
}

</style>

<header class="top-head" data-sticky="true">
    <div class="container">
        <div class="row">
            <div class="logo cell-3">
                {{-- <a style="" href="{{url('home')}}"></a> --}}
                <a href="{{url('home')}}">
{{--                    <img src="{{url('upload/logo/'.$Seo->site_logo)}}" >--}}
                    <img src="{{url('/')}}/images/logo.jpg">
                </a>
                <div class="mobileHide">
                    <a href="skype:{{$ContactDetail->contact_phone}}?call" class="responsive_mobile_no"><i class="fa fa-phone"></i> Call Us: <b> {{$ContactDetail->contact_phone}} </b></a>
                    {{--<a href="#"><span style="margin-left:0 !important" id="cart-count" class="mobileCartMenuShortCartData"><b>0</b> item(s)</span> <b style="margin-left:5px;">View Basket</b></a>--}}
                    <div class="def-home-cart-btn" id="hh" data-animate="fadeInRight">
                        <div class="cart-heading">
                            <i class="fa fa-shopping-cart"></i><span id="cart-count" class="mobileCartMenuShortCartData"><b>0</b> item(s)</span>
                        </div>
                    </div>
                    @if (Request::path() == 'home')
                    <div class="buttonlogo">
                        {{--<a class="btn btn-md btn-orange btn-outlined fx animated fadeInDown" href="{{url('order-item')}}" data-animate="fadeInDown" data-animation-delay="700" style="animation-delay: 700ms;"> <span><i class="fa fa-shopping-cart"></i>Order Your Food Online</span> </a>--}}
                        <a class="btn btn-md btn-custom-top" href="{{url('order-item')}}" style="background: #b71c1c !important; -webkit-box-shadow: 0 5px 0 #CBA574; box-shadow: 0 5px 0 #CBA574; font-size: 13px; margin: 5px; width: 150px !important; height: 55px !important;">
                            <span class="line-one" style="color:#fff;">Order Online</span>
                            <span class="line-two">(10% Discount)</span>
                        </a>

                        <a class="btn btn-md btn-custom-top" href="{{url('order-item')}}" style="background: #b71c1c !important; -webkit-box-shadow: 0 5px 0 #CBA574; box-shadow: 0 5px 0 #CBA574; font-size: 13px; margin: 5px; width: 150px !important; height: 55px !important;">
                            <span class="line-one" style="color:#fff;">Table</span>
                            <span class="line-two">Reservation</span>
                        </a>
                    </div>
                    @endif    
                    
                </div>
                <div class="cart-icon fx mobileloginmenu" id="mobileCartMenuShort" data-animate="fadeInRight" style="position: absolute; right: 0; top: -23px;">
                    <div class="cart-heading">
                        <i class="fa fa-shopping-cart"></i><span id="cart-count" class="mobileCartMenuShortCartData"><b>0</b> item(s)</span>
                    </div>
                </div>
            </div>
            <div class="cell-9 top-menu">

                <!-- top navigation menu start -->
                <nav class="top-nav mega-menu">
                    <ul>
                        <li class="{{ Request::path() == 'home' ? 'selected' : '' }}">
                            <a href="{{url('home')}}">
{{--                                <i class="fa fa-home"></i>--}}
                                <span>Home</span>
                            </a>
                        </li>
                        <li class="{{ Request::path() == 'order-item' ? 'selected' : '' }}">
                            <a href="{{url('order-item')}}">
{{--                                <i class="fa fa-cart-plus"></i>--}}
                                <span>Online Orders</span>
                            </a>
                            @if(isset($mainmenu))
                            <ul>
                                <li>
                                    <a class="pagetitle" id="productinclusive_meal" href="{{url('/order-item')}}#pro_inclusive_meal">
                                        ALL INCLUSIVE MEAL
                                    </a>
                                </li>
                                @foreach($mainmenu as $menu)
                                    <li><a class="pagetitle" id="product{{$menu->id}}" href="{{url('/order-item')}}#pro{{$menu->id}}">{{$menu->name}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        <li class="{{ Request::path() == 'our-offer' ? 'selected' : '' }}">
                            <a href="{{url('our-offer')}}">
{{--                                <i class="fa fa-gift"></i>--}}
                                <span>Taj Offers</span>
                            </a>
                        </li>
                        <li class="{{ Request::path() == 'table-booking' ? 'selected' : '' }}">
                            <a href="{{url('table-booking')}}">
{{--                                <i class="fa fa-cutlery"></i>--}}
                                <span>Table Booking</span>
                            </a>
                        </li>
                        <li class="{{ Request::path() == 'gallery' ? 'selected' : '' }}">
                            <a href="{{url('gallery')}}">
{{--                                <i class="fa fa-picture-o"></i>--}}
                                <span>Taj Gallery</span>
                            </a>
                        </li>
                        <li class="gallery">
                            <a href="{{url('gallery')}}">
{{--                                <i class="fa fa-picture-o"></i>--}}
                                <span>info</span>
                            </a>
                        </li>
                        
                     {{--@if(count($otherExtraPage)>0)
                            <li class="{{ Request::path() == 'order-item' ? 'selected' : '' }}"><a href="javascript:void(0);"><i class="fa fa-info"></i><span>INFO</span></a>
                            @if(isset($otherExtraPage))
                            <ul>
                                @foreach($otherExtraPage as $menu)
                                    <li><a class="pagetitle" id="extrapage{{$menu->id}}" href="{{url('/pages/'.$menu->id.'/'.$menu->name)}}">{{$menu->name}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        </li>
                        @endif--}}
                        
                         <li class="{{ Request::path() == 'reviews' ? 'selected' : '' }}">
                             <a href="{{url('reviews')}}">
{{--                                 <i class="fa fa-comments"></i>--}}
                                 <span>Feedback</span>
                             </a>
                         </li>
                        <li class="{{ Request::path() == 'contact-us' ? 'selected' : '' }}">
                            <a href="{{url('contact-us')}}">
{{--                                <i class="fa fa-phone"></i>--}}
                                <span>Contact</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- top navigation menu end -->

                <!-- top search start -->
                <div class="top-search">
                    <a href="#"><span class="fa fa-search"></span></a>
                    <div class="search-box">
                        <div class="input-box left">
                            <input type="text" name="t" id="t-search" class="txt-box" placeHolder="Enter search keyword here..." />
                        </div>
                        <div class="left">
                            <input type="submit" id="b-search" class="btn main-bg" value="GO" />
                        </div>
                    </div>
                </div>
                <!-- top search end -->

            </div>
        </div>
    </div>
</header>
    <div class="my-sticky-element mobileloginmenu" data-sticky="true">
        @if (Request::path() == 'order-item')
           @include('frontend.extra.mobileloginmenu')
        @endif
        
        
    </div>
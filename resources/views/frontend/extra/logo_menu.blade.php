<?php
$mainmenu=$objSTD->mainMenu();
$otherExtraPage=$objSTD->otherExtraPage();
?>
<style type="text/css">
.btn-orange.btn-outlined{
        border-color: #e57b63 !important;
}

@media (min-width: 1281px) {
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
    .mobileHide a {
        display: none !important;
    }

}
/* 
  ##Device = Laptops, Desktops
  ##Screen = B/w 1025px to 1280px
*/

@media (min-width: 1025px) and (max-width: 1280px) {
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
}

/* 
  ##Device = Tablets, Ipads (portrait)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) {
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
}

/* 
  ##Device = Tablets, Ipads (landscape)
  ##Screen = B/w 768px to 1024px
*/

@media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {
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
}

/* 
  ##Device = Low Resolution Tablets, Mobiles (Landscape)
  ##Screen = B/w 481px to 767px
*/

@media (min-width: 481px) and (max-width: 767px) {
    header.top-head .logo a 
    {
        height: 56px;
        width: 280px;
        margin-top: -7px;
    }
    .logo img{
        width: 140px;
        height: 56px;
        /*top: -20px;*/
        position: absolute;
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


}

/* 
  ##Device = Most of the Smartphones Mobiles (Portrait)
  ##Screen = B/w 320px to 479px
*/

@media (min-width: 320px) and (max-width: 480px) {
    header.top-head .logo a 
    {
        height: 56px;
        width: 280px;
        margin-top: -7px;
    }
    .logo img{
        width: 120px;
        height: 56;
        margin-top:2px;
        margin-left: 30px;
        /*top: -20px;*/
        /*position: absolute;*/
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
}

@media (min-width: 0px) and (max-width: 319px) {
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
        height: 36px !important;
        margin-bottom: 5px !important;
    }.buttonlogo span{
        margin-left: 0px;
    }

    .menuBtn
    {
        margin-top: 14px;
    }

    .cell-5 {
        width: 41.66666667%;
    }
}

</style>

<header class="top-head" data-sticky="true">
    <div class="container">
        <div class="row">
            <div class="logo cell-3">
                {{-- <a style="" href="{{url('home')}}"></a> --}}
                <a href="{{url('home')}}">
                    <img src="{{url('upload/logo/'.$Seo->site_logo)}}" >
                </a>
                <div class="mobileHide"> 
                    <a href="skype:{{$ContactDetail->contact_phone}}?call"><i class="fa fa-phone"></i> Call Us: <b>{{$ContactDetail->contact_phone}}</b></a> 
                    @if (Request::path() == 'home')
                    <div class="buttonlogo">
                        <a class="btn btn-md btn-orange btn-outlined fx animated fadeInDown" href="{{url('order-item')}}" data-animate="fadeInDown" data-animation-delay="700" style="animation-delay: 700ms;"> <span><i class="fa fa-shopping-cart"></i>Order Your Food Online</span> </a>
                    </div>
                    @endif    
                    
                </div>
                <div class="cart-icon fx mobileloginmenu" id="mobileCartMenuShort" data-animate="fadeInRight" style="position: absolute;
    right: 0;
    top: -8px;">
                    <div class="cart-heading">
                        <i class="fa fa-shopping-cart"></i><span id="cart-count" class="mobileCartMenuShortCartData"><b>0</b> item(s)</span>
                    </div>
                </div>
            </div>
            <div class="cell-9 top-menu">

                <!-- top navigation menu start -->
                <nav class="top-nav mega-menu">
                    <ul>
                        <li class="{{ Request::path() == 'home' ? 'selected' : '' }}"><a href="{{url('home')}}"><i class="fa fa-home"></i><span>Home</span></a> </li>
                        <li class="{{ Request::path() == 'order-item' ? 'selected' : '' }}"><a href="{{url('order-item')}}"><i class="fa fa-cart-plus"></i><span>Online Order</span></a>
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
                        <li class="{{ Request::path() == 'our-offer' ? 'selected' : '' }}"><a href="{{url('our-offer')}}"><i class="fa fa-gift"></i><span>Our Offers</span></a></li>
                        <li class="{{ Request::path() == 'table-booking' ? 'selected' : '' }}"><a href="{{url('table-booking')}}"><i class="fa fa-cutlery"></i><span>Table Booking</span></a></li>
                        <li class="{{ Request::path() == 'gallery' ? 'selected' : '' }}"><a href="{{url('gallery')}}"><i class="fa fa-picture-o"></i><span>Gallery</span></a></li>
                        
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
                        
                         <li class="{{ Request::path() == 'reviews' ? 'selected' : '' }}"><a href="{{url('reviews')}}"><i class="fa fa-comments"></i><span>Review</span></a></li>
                        

                        <li class="{{ Request::path() == 'contact-us' ? 'selected' : '' }}"><a href="{{url('contact-us')}}"><i class="fa fa-phone"></i><span>Contact US</span></a></li>
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
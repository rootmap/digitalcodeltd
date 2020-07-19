<?php
$objSTD=new MenuPageController();
$Seo=$objSTD->Seo();
?>
@extends('frontend.layout.master')
@section('title','Contact Us - Please send your query | ')
@section('seo')
    <meta name="description" content="{{$Seo->contact_description}}">
    <meta name="keywords" content="{{$Seo->meta}}">
@endsection
@section('content')	
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft">Contact <span>us</span></h1>
                <!--<div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span>Contact us</span>
                    </div-->
                </div>
            </div>
        </div>
    </div>
    <?php 
        $objSTD=new MenuPageController();
        $Seo=$objSTD->Seo();
        $AppsSetting=$objSTD->AppsSetting();
        
    ?>

    <div class="padd-top-50">
        @include('frontend.extra.msg')
        <div class="container">
            <div class="row">
                <div class="cell-6 contact-detalis fx" data-animate="fadeInLeft" id="contact">
                    {{-- <hr class="hr-style4"> --}}
                    <div class="clearfix"></div>
                    <div class="padding-vertical">
                        <div class="cell-10 fx" data-animate="fadeInRight">
                            @if(isset($contact))
                            <h3 class="block-head">{{ $contact->contact_title }}</h3>
                            <h5 class="footer-contact"><i class="fa fa-home"></i> <span> <b>Address:</b> {{ $contact->contact_address }} </span></h5>
                            
                            <h5 class="footer-contact font-weight"><i class="fa fa-envelope"></i><span> Email:  <a href="mailto:{{ $contact->contact_email }}">{{ $contact->contact_email }}</a> </span></h5>
                            <h5 class="footer-contact font-weight"> <i class="fa fa-phone"></i><span>Phone: <a href="skype:{{ $contact->contact_phone }}">{{ $contact->contact_phone }}</a></span></h5>
                         
                            
                            @endif
                        </div>
                        {{-- <div class="cell-2"><br></div> --}}
                        {{-- <div class="cell-5 fx" data-animate="fadeInRight">&nbsp;
                            <h4 class="main-color bold">Office: Australia</h4>
                            <h5 >Address:</h5>
                            <p>123, Second Sunrise Avenue New York,USA</p>
                            <h5 >Email:</h5>
                            <p>info@it-rays.com</p>
                            <h5 >Phone:</h5>
                            <p>+2 012 000 0000</p>
                            <h5 >FAX:</h5>
                            <p>+2 012 000 0001</p>
                        </div> --}}
                    </div>
                    <div class="clearfix"></div>
                @if($AppsSetting->count() > 0)
                
                <div class="cell-12 contact-detalis fx" data-animate="fadeInLeft" id="contact" style="margin-top: 20px">
                    <h3 class="block-head">Download Our Apps</h3>
                    
                    <div class="contactimg">
                    @if(!empty($AppsSetting))
                    @foreach($AppsSetting as $apps)
                    <a target="_blank" href="<?= $apps->link ?>">
                        <img src="{{url('upload/AppsSetting')}}/<?= $apps->images ?>" alt="Android-app-store" />
                    </a>
                    @endforeach
                     @endif 
                    </div>
                </div>
                
               
                @endif 
                </div>
                <div class="cell-6 contact-form">
                    
                    <h3 class="block-head">Get in Touch</h3>
                    <mark id="message"></mark>
                    <form class="form-signin cform" method="post" action="{{url('contact-request')}}" id="contact__form" autocomplete="on">
                        {!! csrf_field() !!}
                        <div class="form-input">
                            <label>First name<span class="red">*</span></label>
                            <input type="text" name="name" id="name" required="required">
                        </div>
                        <div class="form-input">
                            <label>Email<span class="red">*</span></label>
                            <input name="email" type="email" id="email" required="required">
                        </div>
                        <div class="form-input">
                            <label>Phone</label>
                            <input name="phone" type="text" id="phone">                                     
                        </div>
                        <div class="form-input">
                            <label>Message<span class="red">*</span></label>
                            <textarea name="message" cols="40" rows="7" id="messageTxt" spellcheck="true" required="required"></textarea>
                        </div>
                        <div  class="form-input">
                            <div class="row">
                                <div style="padding-left: 20px;">
                                    {{-- <div class="g-recaptcha" data-sitekey="6LfojMQUAAAAAACESRMTMpWaw-qsUPK2eeHOit4b"></div> --}}
                                    <div id="html_element" style="clear: both;"></div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-input">
                            <input id="submit" name="submit" type="submit" class="btn btn-large main-bg" value="Submit">&nbsp;&nbsp;<input type="reset" class="btn btn-large" value="Reset" id="reset">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="padd-vertical-45">
        <div class="container">
            <!--<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>-->
            {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3sTtUWQc2-EbWu-xD9vFw2w_W2VOFuPk&callback=initMap" type="text/javascript"></script> --}}
            {{-- <div id="map_canvas" style="height: 450px; width: 100%;"> --}}
                <?php 
                    echo html_entity_decode($Seo->google_maps);
                ?>
                
               
                {{-- <script type="text/javascript">
                    function init_map() {
                        var myOptions = {zoom: 14, center: new google.maps.LatLng(52.652964,-0.485109),
                            mapTypeId: google.maps.MapTypeId.ROADMAP};
                        map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
                        marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(52.652964,-0.485109)});
                        infowindow = new google.maps.InfoWindow({content: "<div class='noScroll'><b>Bombay Cottage</b><br/> Indian dining in a <br/> wood-beamed property</div>"});
                        google.maps.event.addListener(marker, "click", function () {
                            infowindow.open(map, marker);
                        });
                        infowindow.open(map, marker);
                    }
                    google.maps.event.addDomListener(window, 'load', init_map);
                </script> --}}
            </div>
        </div>

    </div>
@endsection	





@section('css')
    <link rel="stylesheet" href="{{url('front-theme/css/custom/slick_ffs.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/css/custom.css')}}">
    <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
    </script>


@endsection

@section('slider-js')
    <script type="text/javascript" src="{{url('front-theme/js/jquery.animateNumber.min.js')}}"></script>
    <script type="text/javascript" src="{{url('front-theme/js/jquery.easypiechart.min.js')}}"></script>

    <script src="{{url('front-theme/js/sweetalert.min.js')}}"></script>
    @include('frontend.extra.cart-js')
    
    
    <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6LfSvsQUAAAAACXr7p_jL6fjp5SQcKwkZ3Hgr-AU'
        });
      };
    </script>
    <script type="text/javascript">
        document.getElementById("contact__form").addEventListener("submit",function(evt)
          {
          
          var response = grecaptcha.getResponse();
          if(response.length == 0) 
          { 
            //reCaptcha not verified
            alert("please verify you are human!"); 
            evt.preventDefault();
            return false;
          }
          //captcha verified
          //do the rest of your validations here
          
        });
    </script>
    
</script>
@endsection

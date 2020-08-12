<?php
$objSTD=new MenuPageController();
$SliderData=$objSTD->SliderData();
$Seo=$objSTD->Seo();
?>
@extends('frontend.layout.master')
@section('title','')
@section('seo')
    <meta name="description" content="{{$Seo->description}}">
    <meta name="keywords" content="{{$Seo->meta}}">
@endsection
@section('content')	

 
	<!-- Revolution slider start -->
                @include('frontend.extra.slider')
                <!-- Revolution slider end -->
                <?php 
                    $objSTD=new MenuPageController();
                    $WelcomeContent = $objSTD->WelcomeContent();
                ?>
                <!-- Welcome Box start -->
                <div class="welcome">
                    <div class="container">
                        <div class="row">
                            <div class="cell-9">
                                <h3 class="center block-head">
                                    <span class="main-intro">
                                        <!-- {{$WelcomeContent->title}} -->
                                        Welcome to the Taj Indian Restaurant & Take-away
                                    </span>
                                    <span class="sub-intro">Serving Indian Cusine to the people of Guernsey since 1989</span>
                                </h3>
                                <div class="cell-12">
                                    <div class="cell-4 open-timing">
                                        <span>Open: 12 till 2pm</span>
                                    </div>
                                    <div class="cell-4 open-timing">
                                        <span>5.30pm till late</span>
                                    </div>
                                    <div class="cell-4 open-timing">
                                        <span>7 days-a-week</span>
                                    </div>
                                    <div class="cell-12 reserve-headline">
                                        <P>Reserve your table online for a memorable night out at the Taj</P>
                                    </div>
                                    <div class="cell-12 instruction">
                                        <P>Thank you for choosing a Taj take-away meal<br>If your order is not for a specific time or date, please allow 30 minutes<br> for your pick-up from our Restaurant.</P>
                                    </div>
                                    <div class="cell-12 instruction">
                                        <P>We aim to honour our 30 minute delivery of orders. An order for three or more people, or during our busy periods Friday & Saturday evenings 6 till 8 - allow 45 minutes for your food order pick-up</P>
                                        <P class="red-text">We're sorry that we no longer offer home delivery service</P>
                                    </div>
                                    <div class="cell-12 home-buttons hb-first-row">
                                        <a class="btn btn-md btn-3d btn-custom-one fx animated fadeInUp" href="#" data-animate="fadeInUp" data-animation-delay="1700" style="animation-delay: 1700ms;">
                                            <span class="line-one">TAKE-AWAY MENU</span>  
                                            <span class="line-two">PLACE YOUR ORDER</span>                                              
                                        </a>
                                        <a class="btn btn-md btn-3d btn-custom-two fx animated fadeInUp" href="#" data-animate="fadeInUp" data-animation-delay="1700" style="animation-delay: 1700ms;">
                                            <span class="line-one">BOOK YOUR TABLE</span>  
                                            <span class="line-two">AT THE TAJ</span> 
                                        </a>
                                    </div>
                                    <div class="cell-12 home-buttons">
                                        <a class="btn btn-md btn-3d btn-custom-three fx animated fadeInUp" href="#" data-animate="fadeInUp" data-animation-delay="1700" style="animation-delay: 1700ms;">
                                            <span class="line-one">VIEW + PRINT</span>  
                                            <span class="line-two">TAKE-AWAY MENU</span>
                                        </a>
                                        <a class="btn btn-md btn-3d btn-custom-three fx animated fadeInUp" href="#" data-animate="fadeInUp" data-animation-delay="1700" style="animation-delay: 1700ms;">
                                            <span class="line-one">VIEW + PRINT</span>  
                                            <span class="line-two">RESTAURANT MENU</span>
                                        </a>
                                    </div>
                                    <!-- <p class="margin-bottom-0">
                                        {{-- The Bombay Cottage was established in 1993, situated in heart of Stamford, England’s finest stone built Town, The Restaurant is in a grade 2 listed building with exposed beams and stones.
                                        <br><br>
                                        The Bombay Cottage can seat up to 65 people in comfort, we cater for parties and group bookings for up to 40 people at one time.<br><br>
                                        <strong> OUR FOOD-</strong> All our food is freshly prepared on site, we use local grown products.<br>
                                        <strong> OUR SERVICE-</strong> All our staffs  are  fully trained to satisfy  your needs, we always give 100 percent. --}}
                                        <?php
                                            //echo html_entity_decode($WelcomeContent->description)
                                        ?>
                                    </p> -->
                                </div>
                                {{-- <div class="cell-6">
                                    <p class="margin-bottom-0">  OUR MOTO- Our taste is simple,  We like the Best.!!                                                <br> <br>
                                        <img src="{{url('front-theme/images/signature.jpg')}}" alt="signature of the manager"> <br>
                                        ………………………… <br> (Manager) <br>
                                    <bold>The Bombay Cottage Indian Restaurant,</bold>
                                    <br> STAMFORD
                                    </p>
                                </div> --}}
                            </div>
                            <div class="cell-3">
                                <div class="material-card-content del-info-card" style="border-top-color: rgb(246, 187, 66);">

                                    <h4 class="material-card-title">FREE HOME DELIVERY</h4>
                                    <p class="material-card-summary">Within 5 Miles Radius </p>
                                    <p class="material-card-summary">Minimum Order 15 pounds</p>
                                    <p class="material-card-summary">*Further distance can be arranged</p>
                                    <hr>                                    

                                    <p class="material-card-summary">Monday-Saturday</p>
                                    <p class="material-card-summary">LUNCH: 12.00PM - 02.00PM &amp;</p>
                                    <p class="material-card-summary">DINNER: 06.00PM - 11.30PM</p>
                                    <hr>
                                    <p class="material-card-summary">Sunday Buffet Lunch</p>
                                    <p class="material-card-summary">LUNCH: 12.00PM - 03.00PM &amp;</p>
                                    <p class="material-card-summary">DINNER: 06.00PM - 11.30PM</p>

                                    <?php 
                                        echo html_entity_decode($WelcomeContent->free_home_delivery)
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Welcome Box end -->


                <!-- Services boxes style 1 start -->
                <!-- FUN Staff start -->
                <div class="block-bg-1 sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <div class="cell-4 fx animated fadeInUp" data-animate="fadeInUp" data-animation-delay="200" style="animation-delay: 200ms;">
                                <div class="grid3column uppercase cus_image">
                                    <h3>PARTY MENUS</h3>
                                    <img alt="" src="{{url('front-theme/images/spices.jpg')}}">
                                    <a class="btn btn-md btn-3d btn-custom-small fx animated fadeInUp" href="{{url('static-object')}}" data-animate="fadeInUp" data-animation-delay="1700" style="animation-delay: 1700ms;">
                                        Find Out More
                                    </a>
                                </div>
                            </div>
                            <div class="cell-4 fx animated fadeInUp" data-animate="fadeInUp" data-animation-delay="200" style="animation-delay: 200ms;">
                                <div class="grid3column uppercase cus_image">
                                    <h3>GREAT VALUE LUNCH</h3>
                                    <img alt="" src="{{url('front-theme/images/offers.jpg')}}">
                                    <a class="btn btn-md btn-3d btn-custom-small fx animated fadeInUp" href="{{url('order-item#pro21')}}" data-animate="fadeInUp" data-animation-delay="1700" style="animation-delay: 1700ms;">
                                        View Full Menu
                                    </a>
                                </div>
                            </div>
                            <div class="cell-4 fx animated fadeInUp" data-animate="fadeInUp" data-animation-delay="200" style="animation-delay: 200ms;">
                                <div class="grid3column uppercase cus_image">
                                    <h3>Reserve A Table</h3>
                                    <img alt="" src="{{url('front-theme/images/table_booking.jpg')}}">
                                    <a class="btn btn-md btn-3d btn-custom-small fx animated fadeInUp" href="{{url('table-booking')}}" data-animate="fadeInUp" data-animation-delay="1700" style="animation-delay: 1700ms;">
                                        Book Your Table
                                    </a>
                                </div>
                            </div>
                        </div>    

                    </div><!-- .container end -->
                </div><!-- .funn-staff end -->
                <!-- FUN Staff end -->

                <!-- our clients block start -->
                {{-- <div class="sectionWrapper gry-bg">
                    <div class="container">
                        <div class="row">
                            <div class="cell-6 animated fadeInLeft" data-animate="fadeInLeft">
                            <h3 class="block-head">On-line Order is easy! </h3>

                                <p>You can conveniently use the following services we offer when it is suitable for you
                                    24 hours a day 7 days a week in a quick and efficient way. Our on-line ordering
                                    system enables you to view our menus and organise your takeaway orders <br> <br>
                                    You can place your order by telephone, on-line or in person from our Restaurant. 
                                     If your favourite Indian dish is not shown on our
                                menu then please ask we may be able to cook it for you! <br><br>
                                You can pay by debit and credit cards, cash in person , or on-line by paypal or over
                                the phone using your credit or debit card.
                                </p>
                                

                                <div class="cell-6 grid3btn">
                                    <!-- <a class="btn btn-md btn-round btn-orange fx animated fadeInDown" href="product.php" data-animate="fadeInDown" data-animation-delay="500" style="animation-delay: 500ms;">
                                        <span><i class="fa fa-cart-plus fa-lg selectedI"></i>Order Online Smart Way</span>
                                    </a> -->
                                    <a class="btn btn-primary online-smart-way model-restaurant-btn" href="#"><i class="fa fa-shopping-cart"></i></i> Order Online Smart Way</a>
                                </div>
                            </div>   
                            <div class="cell-6 animated fadeInRight" data-animate="fadeInRight">
                                <div class="cus_pad_top">
                                    <img class="" src="{{url('front-theme/images/devices_1.png')}}" alt="free delivery offer">
                                </div>
                            </div>

                        </div>
                    </div>
                </div> --}}
                <!-- our clients block end -->

                <!-- About us and Features container start -->
                {{-- <div class="sectionWrapper">
                    <div class="container">
                        <div class="row">
                            <!-- about us left block -->
                            <div class="cell-12">
                                <!-- testimonials start -->
                                <div class="fx" data-animate="fadeInLeft">
                                    <h3 class="block-head">Customers Testimonials</h3>

                                    <div class="testimonials-2">
                                    
                                        <!-- testimonials item start -->
                                        <div>
                                            <div class="testimonials-bg">
                                                <img alt="" src="{{url('front-theme/images/people/1.jpg')}}" class="testimonials-img">
                                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit pellentesqueLorem ipsum dolor sit amet, consectetur.</span>
                                                <div class="rating">
                                                    <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
                                                </div>
                                            </div>
                                            <div class="testimonials-name"><strong>John Smith:</strong> ThemeForest</div>
                                        </div>
                                        <!-- testimonials item end -->
                                        
                                        <!-- testimonials item start -->
                                        <div>
                                            <div class="testimonials-bg">
                                                <img alt="" src="{{url('front-theme/images/people/1.jpg')}}" class="testimonials-img">
                                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit pellentesqueLorem ipsum dolor sit amet, consectetur.</span>
                                                <div class="rating">
                                                    <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
                                                </div>
                                            </div>
                                            <div class="testimonials-name"><strong>Ellina Willaims: </strong>Envato Market</div>
                                        </div>
                                        <!-- testimonials item end -->
                                        
                                        <!-- testimonials item start -->
                                        <div>
                                            <div class="testimonials-bg">
                                                <img alt="" src="{{url('front-theme/images/people/1.jpg')}}" class="testimonials-img">
                                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit pellentesqueLorem ipsum dolor sit amet, consectetur.</span>
                                                <div class="rating">
                                                    <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span>
                                                </div>
                                            </div>
                                            <div class="testimonials-name"><strong>Joanne Alexander: </strong>Vodafone</div>
                                        </div>
                                        <!-- testimonials item end -->
                                        
                                        <!-- testimonials item start -->
                                        <div>
                                            <div class="testimonials-bg">
                                                <img alt="" src="{{url('front-theme/images/people/1.jpg')}}" class="testimonials-img">
                                                <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit pellentesqueLorem ipsum dolor sit amet, consectetur.</span>
                                                <div class="rating">
                                                    <span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span><span class="fa fa-star"></span>
                                                </div>
                                            </div>
                                            <div class="testimonials-name"><strong>Danny Willaims: </strong>HSBC Bank</div>
                                        </div>
                                        <!-- testimonials item end -->
                                    </div>
                                    <p class="padd-top-20">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, dapibus ac augue ut, porttitor viverra dui. Pellentesque imperdiet purus quis metus imperdiet fermentum. Suspendisse hendrerit id lacus id lobortis. Vestibulum quam elit, apibus ac augue ut, porttitor viverra dui. Lorem ipsum dolor sit.</p>
                                </div>


                                <!-- testimonials end -->

                            </div>
                            <!-- about us left block end -->

                            <!-- our skills right block -->
                            <div class="cell-5 fx" data-animate="fadeInRight">
                                <h3 class="block-head">Our Performance</h3>
                                <ul class="levels">
                                    <li>
                                        <div class="level-name">Service</div>
                                        <div class="level-out"><span></span>
                                            <div class="level-in" data-percent="100"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="level-name">Food</div>
                                        <div class="level-out"><span></span>
                                            <div class="level-in" data-percent="95"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="level-name">Value</div>
                                        <div class="level-out"><span></span>
                                            <div class="level-in" data-percent="90"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="level-name">Atmosphere</div>
                                        <div class="level-out"><span></span>
                                            <div class="level-in" data-percent="90"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <!-- our skills right block end -->							
                        </div>
                    </div>
                </div> --}}
                <!-- About us and Features container end -->

                <!-- our clients block start -->
                {{-- <div class="sectionWrapper gry-bg">
                    <div class="container">
                        <h3 class="block-head">Options Available</h3>
                        <div class="clients">
                            <div>
                                <a class="white-bg" href="#"><img alt="" src="{{url('front-theme/images/clients/client-1.png')}}"></a>
                            </div>
                            <div>
                                <a class="white-bg" href="#"><img alt="" src="{{url('front-theme/images/clients/client-2.png')}}"></a>
                            </div>
                            <div>
                                <a class="white-bg" href="#"><img alt="" src="{{url('front-theme/images/clients/client-3.png')}}"></a>
                            </div>
                            <div>
                                <a class="white-bg" href="#"><img alt="" src="{{url('front-theme/images/clients/client-4.png')}}"></a>
                            </div>
                            <div>
                                <a class="white-bg" href="#"><img alt="" src="{{url('front-theme/images/clients/client-5.png')}}"></a>
                            </div>
                            <div>
                                <a class="white-bg" href="#"><img alt="" src="{{url('front-theme/images/clients/client-6.png')}}"></a>
                            </div>
                            <div>
                                <a class="white-bg" href="#"><img alt="" src="{{url('front-theme/images/clients/client-7.png')}}"></a>
                            </div>
                            <div>
                                <a class="white-bg" href="#"><img alt="" src="{{url('front-theme/images/clients/client-8.png')}}"></a>
                            </div>
                            <div>
                                <a class="white-bg" href="#"><img alt="" src="{{url('front-theme/images/clients/client-9.png')}}"></a>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- our clients block end -->


@endsection	

@section('css')
    <!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
    <link rel="stylesheet" href="{{url('front-theme/css/slick.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/rs-plugin/css/settings.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/css/custom.css')}}">
@endsection 

@section('slider-js')
	<!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
    <!-- SLIDER REVOLUTION SCRIPTS  -->
        <script type="text/javascript" src="{{url('front-theme/rs-plugin/js/jquery.themepunch.tools.min.js')}}"></script>
        <script type="text/javascript" src="{{url('front-theme/rs-plugin/js/jquery.themepunch.revolution.min.js')}}"></script>

        <!-- slick slider carousel -->
        <script type="text/javascript" src="{{url('front-theme/js/slick.min.js')}}"></script>
        <!-- Animate numbers increment -->
        <script type="text/javascript" src="{{url('front-theme/js/jquery.animateNumber.min.js')}}"></script>
        
        <!-- Animate numbers increment -->
        <script type="text/javascript" src="{{url('front-theme/js/jquery.easypiechart.min.js')}}"></script>


        <script type="text/javascript" src="{{url('front-theme/js/jquery.animateNumber.min.js')}}"></script>
        <script type="text/javascript" src="{{url('front-theme/js/jquery.easypiechart.min.js')}}"></script>

        <script src="{{url('front-theme/js/sweetalert.min.js')}}"></script>
        @include('frontend.extra.cart-js')
        
@endsection

<nav id="fieldmegamenu-mobile" class="fieldmegamenu inactive">
                        <ul>
                            <li class="root root-1 ">
                                <div class="root-item no-description">
                                    <a href="{{url('home')}}">
                                        <div class="title title_font"><span class="title-text">Home</span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                            </li>
                            @if(isset($cat))
                            @foreach($cat as $ct)
                            <li class="root root-7">
                                <div class="root-item no-description">
                                    <a href="{{url('category')}}/{{$ct->id}}/{{$ct->name}}">
                                        <div class="title title_font"><span class="title-text">{{$ct->name}}<?php
                                                // print_r($cat->subcate());
                                                ?></span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                                @if(isset($brandAll))
                                <ul class="menu-items col-md-3 col-xs-12">
                                    <li class="menu-item menu-item-19 depth-1 category menucol-1-4 ">
                                        <div class="title title_font" style="width: 200px;"> <a href="javascript:void(0);"> Available Brand </a></div>
                                        <ul class="submenu submenu-depth-2 col-md-12" style="width: 150px;">
                                            @foreach($brandAll as $sc)
                                            <li class="menu-item menu-item-27 depth-2 category ">
                                                <div class="title"> <a href="{{url('category/brand/'.$sc->id.'/'.$ct->id.'/'.$sc->name)}}"> {{$sc->name}} </a></div>
                                            </li>
                                            @endforeach

                                        </ul>
                                    </li>
                                </ul>
                                @endif
                            </li>
                            @endforeach
                            @endif
<!--                            <li class="root root-7 ">
                                <div class="root-item no-description">
                                    <a href="/ps_monaco/home1/en/12-shop">
                                        <div class="title title_font"><span class="title-text">Shop</span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                                <ul class="menu-items col-md-7 col-xs-12">
                                    <li class="menu-item menu-item-19 depth-1 category menucol-1-4 ">
                                        <div class="title title_font"> <a href="/ps_monaco/home1/en/15-accessories"> Accessories </a></div>
                                        <ul class="submenu submenu-depth-2">
                                            <li class="menu-item menu-item-27 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/21-cocktail"> Cocktail </a></div>
                                            </li>
                                            <li class="menu-item menu-item-28 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/22-day"> Day </a></div>
                                            </li>
                                            <li class="menu-item menu-item-29 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/23-evening"> Evening </a></div>
                                            </li>
                                            <li class="menu-item menu-item-30 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/24-sundresses"> Sundresses </a></div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-20 depth-1 category menucol-1-4 ">
                                        <div class="title title_font"> <a href="/ps_monaco/home1/en/16-dresses"> Dresses </a></div>
                                        <ul class="submenu submenu-depth-2">
                                            <li class="menu-item menu-item-31 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/25-accessories"> Accessories </a></div>
                                            </li>
                                            <li class="menu-item menu-item-32 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/26-hats-and-gloves"> Hats and Gloves </a></div>
                                            </li>
                                            <li class="menu-item menu-item-33 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/27-lifestyle"> Lifestyle </a></div>
                                            </li>
                                            <li class="menu-item menu-item-34 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/28-bras"> Bras </a></div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-22 depth-1 customcontent menucol-1-2 ">
                                        <div class="normalized">
                                            <div style="margin-top: 10px;">
                                                <a href="#"><img class="img-responsive" src="images/img1.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="menu-item menu-item-101 depth-1 divider "></li>
                                    <li class="menu-item menu-item-23 depth-1 category menucol-1-4 ">
                                        <div class="title title_font"> <a href="/ps_monaco/home1/en/18-handbags"> Handbags </a></div>
                                        <ul class="submenu submenu-depth-2">
                                            <li class="menu-item menu-item-39 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/29-toter"> Toter </a></div>
                                            </li>
                                            <li class="menu-item menu-item-40 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/30-clutches"> Clutches </a></div>
                                            </li>
                                            <li class="menu-item menu-item-41 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/31-satchels"> Satchels </a></div>
                                            </li>
                                            <li class="menu-item menu-item-42 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/32-cross-body"> Cross body </a></div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-24 depth-1 category menucol-1-4 ">
                                        <div class="title title_font"> <a href="/ps_monaco/home1/en/19-shoes"> Shoes </a></div>
                                        <ul class="submenu submenu-depth-2">
                                            <li class="menu-item menu-item-43 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/21-cocktail"> Cocktail </a></div>
                                            </li>
                                            <li class="menu-item menu-item-44 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/26-hats-and-gloves"> Hats and Gloves </a></div>
                                            </li>
                                            <li class="menu-item menu-item-45 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/27-lifestyle"> Lifestyle </a></div>
                                            </li>
                                            <li class="menu-item menu-item-46 depth-2 category ">
                                                <div class="title"> <a href="/ps_monaco/home1/en/28-bras"> Bras </a></div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="menu-item menu-item-26 depth-1 customcontent menucol-1-2 customcontent_women ">
                                        <div class="normalized">
                                            <div style="margin-top: 10px;">
                                                <a href="#"><img class="img-responsive" src="images/img2.jpg" alt="" /></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>-->
                            <li class="root root-10 demo_custom_link_cms">
                                <div class="root-item no-description">
                                    <a href="#">
                                        <div class="title title_font"><span class="title-text">more</span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                                <ul class="menu-items col-md-3 col-xs-12">
                                    @foreach($cats as $cs)
                                    <li class="menu-item menu-item-90 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('category')}}/{{$cs->id}}/{{$cs->name}}"> {{$cs->name}} </a></div>
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            <li class="root root-7">
                                <div class="root-item no-description">
                                    <a href="{{url('brand')}}">
                                        <div class="title title_font"><span class="title-text">Brand</span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                            </li>
                            <li class="root root-10 demo_custom_link_cms">
                                <div class="root-item no-description">
                                    <a href="{{url('contact-us')}}">
                                        <div class="title title_font"><span class="title-text">contacts</span><span class="icon-has-sub icon-angle-down"></span></div>
                                    </a>
                                </div>
                                <ul class="menu-items col-md-2 col-xs-12">
                                    <li class="menu-item menu-item-90 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/About-us')}}"> About us </a></div>
                                    </li>
                                    <li class="menu-item menu-item-88 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/Delivery')}}"> Delivery </a></div>
                                    </li>
                                    <li class="menu-item menu-item-89 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/Secure-payment')}}"> Secure payment </a></div>
                                    </li>
                                    <li class="menu-item menu-item-91 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/Legal-Notice')}}"> Legal Notice </a></div>
                                    </li>
                                    <li class="menu-item menu-item-92 depth-1 cmspage ">
                                        <div class="title"> <a href="{{url('Contact-Pages/Terms-of-use')}}"> Terms of use </a></div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
<?php
$objSTD=new MenuPageController();
$Seo=$objSTD->Seo();
?>
@extends('frontend.layout.master')
@section('title','Gallery | ')
@section('seo')
    <meta name="description" content="{{$Seo->gallery_description}}">
    <meta name="keywords" content="{{$Seo->meta}}">
@endsection
@section('content')	
    <div class="page-title title-1">
        <div class="container">
            <div class="row">
                <div class="cell-12">
                    <h1 class="fx" data-animate="fadeInLeft"><span>Gallery</span></h1>

                 <!--  <div class="breadcrumbs main-bg fx" data-animate="fadeInUp">
                        <span class="bold">You Are In:</span><a href="#">Home</a><span class="line-separate">/</span><span> Gallery Photos</span>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sectionWrapper">
        <div class="container">
            <div class="portfolio-filterable">
                <div class="row">
                    {{-- <div class="gry-bg skew-25">
                        <span class="skew25 left filter-by">Filter by:</span>
                        <ul id="filters">
                            <li class="active"><a href="#" class="skew25 filter" data-filter="*">All</a></li>
                            <li><a href="#" class="skew25 filter" data-filter=".design">Web Design</a></li>
                            <li><a href="#" class="skew25 filter" data-filter=".develop">Web Development</a></li>
                            <li><a href="#" class="skew25 filter" data-filter=".seo">SEO Management</a></li>
                        </ul>
                    </div> --}}
                    <div class="portfolio-items" id="container">
                        @if(isset($gallery))
                        @foreach($gallery as $data)
                        <div class="cell-3 develop" data-category="develop">
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="#" class="fx link">
                                            {{-- <b class="fa fa-link"></b> --}}
                                        </a>
                                        <a href="{{ URL::asset('upload/gallery-photo/'.$data->photo) }}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title=""><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" style="max-height: 150px;" src="{{ URL::asset('upload/gallery-photo/'.$data->photo) }}">
                                </div>
                                {{-- <div class="name-holder">
                                    <a href="#" class="project-name">Project Title</a>
                                    <span class="project-options">Project Category</span>
                                </div> --}}
                            </div>
                        </div>
                        @endforeach
                        @endif
                        {{-- <div class="cell-3 develop seo" data-category="develop">
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="gallery portfolio-img-slick">
                                        <div>
                                            <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                <img src="{{url('front-theme/images/portfolio/1.jpg')}}" alt=""></a>
                                        </div>
                                        <div>
                                            <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                <img src="{{url('front-theme/images/portfolio/1.jpg')}}" alt=""></a>
                                        </div>
                                        <div>
                                            <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                <img src="{{url('front-theme/images/portfolio/1.jpg')}}" alt=""></a>
                                        </div>
                                        <div>
                                            <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                <img src="{{url('front-theme/images/portfolio/1.jpg')}}" alt=""></a>
                                        </div>
                                        <div>
                                            <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title">
                                                <img src="{{url('front-theme/images/portfolio/1.jpg')}}" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">Project Title</a>
                                    <span class="project-options">Project Category</span>
                                </div>
                            </div>
                        </div>
                        <div class="cell-3 design" data-category="design">
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{url('front-theme/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">Project Title</a>
                                    <span class="project-options">Project Category</span>
                                </div>
                            </div>
                        </div>
                        <div class="cell-3 seo" data-category="seo">
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{url('front-theme/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">Project Title</a>
                                    <span class="project-options">Project Category</span>
                                </div>
                            </div>
                        </div>
                        <div class="cell-3 develop" data-category="develop">
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{url('front-theme/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">Project Title</a>
                                    <span class="project-options">Project Category</span>
                                </div>
                            </div>
                        </div>
                        <div class="cell-3 design" data-category="design">
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{url('front-theme/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">Project Title</a>
                                    <span class="project-options">Project Category</span>
                                </div>
                            </div>
                        </div>
                        <div class="cell-3 develop" data-category="develop">
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over full-hover">
                                        <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" title="Project Title" data-gal="prettyPhoto[pp_gal]"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">Project Title</a>
                                    <span class="project-options">Project Category</span>
                                </div>
                            </div>
                        </div>
                        <div class="cell-3 design" data-category="design">
                            <div class="portfolio-item">
                                <div class="img-holder">
                                    <div class="img-over">
                                        <a href="portfolio-single.html" class="fx link"><b class="fa fa-link"></b></a>
                                        <a href="{{url('front-theme/images/portfolio/1.jpg')}}" class="fx zoom" data-gal="prettyPhoto[pp_gal]" title="Project Title"><b class="fa fa-search-plus"></b></a>
                                    </div>
                                    <img alt="" src="{{url('front-theme/images/portfolio/1.jpg')}}">
                                </div>
                                <div class="name-holder">
                                    <a href="#" class="project-name">Project Title</a>
                                    <span class="project-options">Project Category</span>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection	





@section('css')
    <link rel="stylesheet" href="{{url('front-theme/css/prettyPhoto.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/css/slick.css')}}">
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
    <!-- slick slider carousel -->
    <script type="text/javascript" src="{{url('front-theme/js/slick.min.js')}}"></script>
    <!-- isotope plugin -->
    <script type="text/javascript" src="{{url('front-theme/js/isotope.pkgd.min.js')}}"></script>
    <!-- PrettyPhoto script -->
    <script type="text/javascript" src="{{url('front-theme/js/jquery.prettyPhoto.js')}}"></script>

    <script type="text/javascript" src="{{url('front-theme/js/jquery.animateNumber.min.js')}}"></script>
    <script type="text/javascript" src="{{url('front-theme/js/jquery.easypiechart.min.js')}}"></script>

    <script src="{{url('front-theme/js/sweetalert.min.js')}}"></script>
    @include('frontend.extra.cart-js')

@endsection


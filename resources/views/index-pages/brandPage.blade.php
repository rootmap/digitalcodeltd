@extends('front-layout.master')


@section('content')
<div id="page">
        
        <div class="columns-container">
            <div id="columns" class="container">
                <div id="slider_row" class="row"></div>
                <div class="row" style="padding-top: 15px;">
                    
                    <div id="left_column" class="column col-xs-12 col-sm-12 col-md-3">
                        
                        @include('front-include.categoryfilter')
                         @include('front-include.topseller')
                       
                        
                    </div>
                    @if($categoryInfo->layout==1)
                        @include('front-include.catbanall')
                    @elseif($categoryInfo->layout==2)
                        @include('front-include.branCat')
                    @elseif($categoryInfo->layout==3)
                        @include('front-include.branCats')
                    @else
                    
                    @endif
                </div>
            </div>
        </div>
        
    </div>

@endsection
@include('front-include.titleseo')
@include('front-include.index_js')

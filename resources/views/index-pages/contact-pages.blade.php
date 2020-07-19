@extends('front-layout.master')


@section('content')

<div id="page">


    <div class="columns-container" style="padding-top: 20px;">
        <div id="columns" class="container">
            <div id="slider_row" class="row"></div>
            <div class="row">
                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 class="page-heading">{{$data[0]->heading}}</h1>
                    @include('front-include.msg')
                    <div class="row">
                        @foreach($data as $row)
                        <div class="col-xs-12 col-sm-12">
                            <p>{{$row->description}}</p>
                        </div>
                        @endforeach

                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

@endsection
@include('front-include.titleseo')
@include('front-include.index_js')

      

<div class="tp-banner-container">
    <div class="tp-banner">
        <ul>
            @if(isset($SliderData))
                @foreach($SliderData as $sld)
                <li data-transition="fade" data-slotamount="7">
                    <img alt="{{$sld->name}}" src="{{url('front-theme/images/slider/dummy.png')}}" data-lazyload="{{url('upload/slider/'.$sld->sliderimage)}}" data-duration="1000" data-ease="Linear.easeNone">
                </li>
                @endforeach
            @endif            
        </ul>
    </div>
</div>

{{-- <div class="page-title title-1">
    <div class="container">
        <div class="row">
            <div class="cell-12">
                <div class="my-sticky-element" data-sticky="true">
                    @include('frontend.extra.mobileloginmenu')
                </div>
            </div>
        </div>
    </div>
</div>  

<style type="text/css">
    .title-1
    {
        margin-top: -50px;
        background: none;
    }
</style> --}}
@if(isset($brn))
<div id="fieldbrandslider" class="block horizontal_mode title_center">
    <h4 class="title_block title_font"><a class="title_text" href="manufacturers">Our brands<span class="bd_title"></span></a></h4>
    <div class="row">
        <div id="fieldbrandslider-manufacturers" class="grid carousel-grid owl-carousel">
            @foreach($brn as $bn)
            <div class="item">
                <a class="img-wrapper" href="{{url('category')}}/{{$cat[0]->id}}/{{$cat[0]->name}}" title="{{$bn->name}}"> <img class="img-responsive" src="{{url('upload/brand')}}/{{$bn->brandlogo}}"  style="width: 210px; height: 62px;" alt="{{$bn->name}}" /> </a>
            </div>
            @endforeach

        </div>
    </div>
</div>
@endif
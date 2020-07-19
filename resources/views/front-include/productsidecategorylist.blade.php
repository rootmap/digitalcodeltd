<div id="right_column" class="col-xs-12 col-sm-12 col-md-3 column">
    <?php /*
    <div id="categories_block_left" class="block">
        <h2 class="title_block">Categories</h2>
        <div class="block_content">
            <ul class="tree dhtml">
                @if(isset($cats))
                @foreach($cats as $ct)
                <li> 
                    <a href="{{url('category')}}/{{$ct->id}}/{{$ct->name}}" title="{{$ct->name}}"> {{$ct->name}} </a>
                    <ul>
                        @foreach($ct->subcat as $sc)
                        <li> 
                            <a href="{{url('sub-category')}}/{{$sc->id}}/{{$sc->name}}" title=""> {{$sc->name}} </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                @endforeach
                @endif
                
            </ul>
        </div>
    </div>*/ ?>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    @if(isset($topseller))
    <div id="best-sellers_block_right" class="block vertical_mode">
        <h4 class="title_block title_font"> 
            <a href="{{url('top-seller')}}" title="View a top sellers products"> Top Sales </a>
        </h4>
        <div id="field_bestsellers" class="grid carousel-grid owl-carousel block_content">
            <div class="item">
                @foreach($topseller as $sell)
                <div class="item-content clearfix">
                    <div class="left-content">
                        <a href="{{url('product')}}/{{$sell->id}}/{{$sell->name}}" title=""> 
                            <img src="{{url('upload/product')}}/{{$sell->photo}}" style="width: 110px; height: 140px;" height="140" width="110" alt="" /> 
                        </a>
                    </div>
                    <div class="right-content">
                        <h3 class="sub_title_font product-name"> 
                            <a href="{{url('product')}}/{{$sell->id}}/{{$sell->name}}" title="{{$sell->name}}"> {!! \Illuminate\Support\Str::words($sell->name, 5,'....')  !!}</a>
                        </h3>
                        <div class="content_price"> <span class="price product-price"> {{$arrayCurrency->icon}}{{$sell->price}} </span>
                        </div>
                       
                    </div>
                </div>
                @endforeach
            </div>
            
        </div>
    </div>
    @endif
</div>

























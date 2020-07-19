<div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-9">

    <h1 class="page-heading title_font"><span class="cat-name">{{$brand->name}}&nbsp;</span><span class="heading-counter">There are <?= count($product) ?> products.</span></h1>
    
    @if(!isset($product_info))
    <div class=" hide-color-options hide-stock-info">
        <h3>No Product Found</h3>
    </div>
    @endif
    <div class=" hide-color-options hide-stock-info">
        <ul class="product_list grid row">

            @if(isset($product_info))
            @foreach($product_info as $pro)
            <li class="ajax_block_product col-xs-12 col-sm-4 col-lg-3 first-in-line first-item-of-tablet-line first-item-of-mobile-line">
                <div class="product-container" itemscope itemtype="">
                    <div class="item-inner">
                        <div class="left-block">
                            <div class="product-image-container">

                                <a class="product_img_link product_img" href="{{url('category/brand/sub/'.$cid.'/'.$bid.'/'.$pro->id.'/'.$pro->name)}}" title="{{$pro->name}}" itemprop="url"> 

                                    <span class="img_root" style="display: block;"> 
                                        <img style="height:190px !important;" src="{{url('upload/category')}}/{{$pro->photo}}"  style="height: 300px !important;"  alt="{{$pro->name}}" /> 
                                    </span> 
                                    <span class="img_root btn btn-primary" style="display: block;"> 
                                        <h4>{{$pro->name}}</h4>
                                    </span> 
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
            </li>
            @endforeach
            @else
            <li>
                <div class="col-md-12">
                    <h3>No Product Found</h3>
                </div>

            </li>
            @endif

        </ul>
    </div>
    
</div>
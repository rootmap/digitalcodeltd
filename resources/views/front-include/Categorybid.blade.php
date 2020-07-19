<div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-9">
    <div class="content_scene_cat">
        <div class="content_scene_cat_bg" style="background:url('<?=url('/upload/category/'.$cat_info->banner)?>') right center no-repeat; background-size:cover; min-height:270px;">
            <div class="cat_desc"> 
                <span class="category-name title_font"> {{$cat_info->name}} </span>
                <div class="rte">
                    <p>{{$cat_info->description}}</p>
                </div>
            </div>
        </div>
    </div>
    <h1 class="page-heading product-listing title_font"><span class="cat-name">Shop&nbsp;</span><span class="heading-counter">There are <?=count($product_info)?> products.</span></h1>
    
    @if(!isset($product_info))
    <div class=" hide-color-options hide-stock-info">
        <h3>No Product Found</h3>
    </div>
    @endif
    <div class=" hide-color-options hide-stock-info">
        <ul class="product_list grid row">

            @if(isset($product))
            @foreach($product as $pro)
            <li class="ajax_block_product col-xs-12 col-sm-4 col-lg-3 first-in-line first-item-of-tablet-line first-item-of-mobile-line">
                <div class="product-container" itemscope itemtype="">
                    <div class="item-inner">
                        
                        <div class="left-block">
                            <div class="product-image-container">
                                <?php
                                if($pro->is_custom_layout==1){
                                    if(!empty($pro->layout))
                                    {
                                        $link=url('category/'.$cid.'/custom/'.$pro->layout.'/brand/'.$pro->id.'/'.$pro->name);
                                    }
                                    else
                                    {
                                        $link=url('404');
                                    }
                                }
                                else
                                {
                                    $link=url('pro-category/'.$cid.'/brand/'.$pro->id.'/'.$pro->name);
                                }
                                ?>
                                <a class="product_img_link product_img" href="<?=$link?>" title="{{$pro->name}}" itemprop="url"> 
                                    <span class="img_root" style="display: block;"> 
                                        <img style="height:180px !important;" src="{{url('upload/brand')}}/{{$pro->brandimage}}"  alt="{{$pro->name}}" /> 
                                    </span> 
                                    <span class="img_root" style="display: block;"> 
                                        <img style="height:50px !important;" src="{{url('upload/brand')}}/{{$pro->brandlogo}}"  alt="{{$pro->name}}" /> 
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
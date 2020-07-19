<?php 
$arrayDD=MenuPageController::siteBasic();
//echo "<pre>";
$categoryAll=$arrayDD['cats'];
$brandAll=$arrayDD['brn'];
//exit();
?>
<div id="categories_block_left" class="block">
    <h2 class="title_block">Categories</h2>
    <div class="block_content">
        <ul class="tree dhtml">
            @foreach($categoryAll as $catAr)
            <li> 
                <a href="{{url('category/'.$catAr->id.'/'.$catAr->name)}}" 
                    @if(isset($cid))
                        @if($catAr->id==$cid)
                            class="selected"
                        @endif
                    @endif 
                     title="{{$catAr->name}}"> {{$catAr->name}} 
                </a>
            </li>
            @endforeach
        </ul>
    </div>
</div>

{{--
<div id="layered_block_left" class="block">
    <p class="title_block">Category</p>
    <div class="block_content">
        <form action="#" id="layered_form">
            <div>
                <div class="layered_filter">
                    <div class="layered_subtitle_heading"> <span class="layered_subtitle">Availability</span></div>
                    <ul id="ul_layered_quantity_0" class="col-lg-12 layered_filter_ul">
                        <li class="nomargin hiddable col-lg-12">
                            <input type="checkbox" class="checkbox" name="layered_quantity_0" id="layered_quantity_0" value="0" />
                            <label for="layered_quantity_0"> <a href="12-shop#availability-not_available" data-rel="nofollow">Not available<span> (2)</span></a> </label>
                        </li>
                        <li class="nomargin hiddable col-lg-12">
                            <input type="checkbox" class="checkbox" name="layered_quantity_1" id="layered_quantity_1" value="1" />
                            <label for="layered_quantity_1"> <a href="12-shop#availability-in_stock" data-rel="nofollow">In stock<span> (11)</span></a> </label>
                        </li>
                    </ul>
                </div>
                <div class="layered_filter">
                    <div class="layered_subtitle_heading"> <span class="layered_subtitle">Condition</span></div>
                    <ul id="ul_layered_condition_0" class="col-lg-12 layered_filter_ul">
                        <li class="nomargin hiddable col-lg-12">
                            <input type="checkbox" class="checkbox" name="layered_condition_new" id="layered_condition_new" value="new" />
                            <label for="layered_condition_new"> <a href="12-shop#condition-new" data-rel="nofollow">New<span> (6)</span></a> </label>
                        </li>
                        <li class="nomargin hiddable col-lg-12">
                            <input type="checkbox" class="checkbox" name="layered_condition_used" id="layered_condition_used" value="used" />
                            <label for="layered_condition_used"> <a href="12-shop#condition-used" data-rel="nofollow">Used<span> (7)</span></a> </label>
                        </li>
                    </ul>
                </div>
                <div class="layered_filter">
                    <div class="layered_subtitle_heading"> <span class="layered_subtitle">Manufacturer</span></div>
                    <ul id="ul_layered_manufacturer_0" class="col-lg-12 layered_filter_ul">
                        <li class="nomargin hiddable col-lg-12">
                            <input type="checkbox" class="checkbox" name="layered_manufacturer_1" id="layered_manufacturer_1" value="1" />
                            <label for="layered_manufacturer_1"> <a href="12-shop#manufacturer-fashion_manufacturer" data-rel="nofollow">Demo Text<span> (1)</span></a> </label>
                        </li>
                        <li class="nomargin hiddable col-lg-12">
                            <input type="checkbox" class="checkbox" name="layered_manufacturer_2" id="layered_manufacturer_2" value="2" />
                            <label for="layered_manufacturer_2"> <a href="12-shop#manufacturer-manufacture_1" data-rel="nofollow">Demo Text <span> (12)</span></a> </label>
                        </li>
                    </ul>
                </div>
                <div class="layered_price" style="display: none;">
                    <div class="layered_subtitle_heading"> <span class="layered_subtitle">Price</span></div>
                    <ul id="ul_layered_price_0" class="col-lg-12 layered_filter_ul">
                        <label for="price"> Range: </label> <span id="layered_price_range"></span>
                        <div class="layered_slider_container">
                            <div class="layered_slider" id="layered_price_slider" data-type="price" data-format="1" data-unit="$"></div>
                        </div>
                    </ul>
                </div>
                <div class="layered_filter">
                    <div class="layered_subtitle_heading"> <span class="layered_subtitle">Size</span></div>
                    <ul id="ul_layered_id_attribute_group_1" class="col-lg-12 layered_filter_ul">
                        <li class="nomargin hiddable col-lg-12">
                            <input type="checkbox" class="checkbox" name="layered_id_attribute_group_1" id="layered_id_attribute_group_1" value="1_1" />
                            <label for="layered_id_attribute_group_1"> <a href="12-shop#size-s">S<span> (12)</span></a> </label>
                        </li>
                        <li class="nomargin hiddable col-lg-12">
                            <input type="checkbox" class="checkbox" name="layered_id_attribute_group_2" id="layered_id_attribute_group_2" value="2_1" />
                            <label for="layered_id_attribute_group_2"> <a href="12-shop#size-m">M<span> (12)</span></a> </label>
                        </li>
                        <li class="nomargin hiddable col-lg-12">
                            <input type="checkbox" class="checkbox" name="layered_id_attribute_group_3" id="layered_id_attribute_group_3" value="3_1" />
                            <label for="layered_id_attribute_group_3"> <a href="12-shop#size-l">L<span> (12)</span></a> </label>
                        </li>
                    </ul>
                </div>

            </div>
            <input type="hidden" name="id_category_layered" value="12" />
        </form>
    </div>
    <div id="layered_ajax_loader" style="display: none;">
        <p> <img src="images/loader.gif" alt="" />
            <br />Loading...</p>
    </div>
</div>
--}}
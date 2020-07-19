<style type="text/css">
.micm_inclusive
{
        right: 39px;
        font-weight: bold;
        top: 0px;

}

.micm_inclusive::before
{
    content: '£';
}
</style>

<div class="productmbl">
        <ul id="accordion" class="accordion">     
            @if(count($inclusiveMeal)>0)
                <li>
                <h3 class="skew-255">
                    
                    <a href="#" id="proMobileNameInclusiveMeal">
                        <span style="width:80%; overflow:hidden;" class="skew255">
                            Inclusive Meal
                        </span>
                    </a>
                </h3>
                <div class="accordion-panel">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody id="place_pro_InclusiveMeal">
                                    @foreach($inclusiveMeal as $row)
                                        <tr>
                                            <td width="80%">
                                                <span class="proName">{{$row->name}}</span>
                                            </td>
                                            <td><span style="font-weight: 900;" class="micm_inclusive" id="micm_{{$row->id}}">{{$row->price}}</span></td>
                                            {{-- <td align="right">
                                                <div class="prosec" style="width: 42px;">
                                                    <p class="proPrice"></p>
                                                    <div style="height: 0px; width: 0px; overflow: hidden;">
                                                            <img src="{{url('front-theme/images/cart-icon.png')}}">
                                                    </div>
                                                    <a href="javascript:void(0);" data-id="1629" class="proButton add-cart"><i class="fa fa-plus"></i></a>
                                                    <p></p>
                                                </div>
                                            </td> --}}
                                        </tr>
                                        <tr>
                                           <td colspan="2">
                                               
                                            <p class="proDes" style=" font-style: italic !important;"><?php echo $row->description;?></p>
                                            <div class="clearfix"></div>
                                        <?php
                                            $optMenu=json_decode(unserialize($row->product_json));
                                            $k=1;
                                        ?>
                                        
                                        @if(count($optMenu)>0)
                                        
                                            @foreach($optMenu as $rw)
                                                
                                                        <div class="cell-12" style="margin-bottom: 5px; padding: 0px;">
                                                            <div class="cell-6" style="text-align: left; line-height: 33px; padding-left: 0px; font-weight: 600;">
                                                                {{$rw->pro_opt_name}}
                                                            </div>
                                                            <div class="cell-6" style="padding-left: 0px;">
                                                                <select name="imjnameMobile{{$row->id}}_{{str_replace('.','_',str_replace(' ','_',$rw->pro_opt_name))}}" data-opt-cond="{{$rw->pro_opt_name}}" class="form-control inmPriceMobile imjMobile{{$row->id}}" data-tag="{{$row->id}}" style="width: 100%;">
                                                                    <option value="0">Please Select</option>
                                                                    @if(count($rw->option_param)>0)
                                                                        @foreach($rw->option_param as $rr)
                                                                            <option data-price="{{$rr->price}}" value="{{$rr->name}}">{{$rr->name}}</option>
                                                                        @endforeach
                                                                    @endif
                                                                </select>
                                                            </div>
                                                        </div>
                                                        
                                                    
                                            @endforeach
                                            
                                        @endif
                                            <div class="clearfix"></div>
                                            <div class="cell-12" style="padding-left: 0px; text-align:right; padding-bottom:10px;">
                                                <button data-pull="{{$row->id}}" class="btn btn-block btn-danger addtocartimMobile" type="button">Add To Cart</button>
                                            </div>
                                            </td>
                                         </tr>
                                    @endforeach
                        </tbody>
                    </table>
                    
                </div>
            </li>

                

            @endif

            <?php 
            $modal='';
            ?>
            @if(count($category)>0)
                @foreach($category as $cat)
            <li>
                <h3 class="skew-25">
                    <a href="#">
                        <span class="skew25">
                            {{$cat['name']}}
                            
                        </span>
                    </a>
                </h3>
                
                <div class="accordion-panel active">

                    <?php
                    if($cat['layout']==1 || $cat['layout']==4){
                        if(isset($cat['product_row']))
                        {
                            ?>
                            <table cellpadding="0" cellspacing="0" border="0">
                                <tbody id="place_pro_{{$cat['id']}}">
                                    @if(!empty($cat['description']))
                                        <tr>
                                            <td colspan="3">
                                                <p class="proDes" style="text-transform: capitalize;  font-style: italic !important;">
                                                    <?php echo $cat['description'];?>
                                                </p>
                                            </td>
                                        </tr>
                                    @endif
                                    <?php 
                                    foreach ($cat['product_row'] as $key => $row) 
                                    {
                                        $interface=$row['interface'];
                                        ?>
                                        <tr>
                                                    <td width="80%">
                                                        <span class="proName">{{$row['name']}}</span>
                                                    </td>
                                                    <td><span style="font-weight: 900;">
                                                    @if($interface==3)
                                                    <?php 
                                                    $min_prince_row=0; 
                                                    foreach($row['modal'] as $key=>$mod):
                                                        if($min_prince_row>0)
                                                        {
                                                            if($min_prince_row>$mod['price'])
                                                            {
                                                                $min_prince_row=$mod['price'];
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $min_prince_row=$mod['price'];
                                                        }
                                                    endforeach;
                                                    echo "£".$min_prince_row;
                                                    ?>
                                                    @else
                                                        £{{$row['price']}}
                                                    @endif
                                                    </span></td>
                                                    <td align="right">
                                                        <div class="prosec" style="width: 42px;">
                                                            @if($interface==5)
                                                                <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="pizza_modal_name_{{$row['id']}}"><i class="fa fa-plus"></i></a>
                                                            @elseif($interface==4)
                                                                <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="ex_modal-name_{{$row['id']}}"><i class="fa fa-plus"></i></a>
                                                            @elseif($interface==3)
                                                                <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="other_modal_name_{{$row['id']}}"><i class="fa fa-plus"></i></a>
                                                            @elseif($interface==2)
                                                                &nbsp;
                                                            @else
                                                            <p class="proPrice">
                                                                
                                                                <div style="height: 0px; width: 0px; overflow: hidden;">
                                                                    <img src="{{url('front-theme/images/cart-icon.png')}}">
                                                                </div>
                                                                <a href="javascript:void(0);" data-id="{{$row['id']}}" class="proButton add-cart"><i class="fa fa-plus"></i></a>
                                                            </p>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>

                                                @if(!empty($row['description']))
                                                    <tr>

                                                        <td colspan="3"><p class="proDes" style=" font-style: italic !important;">{{strip_tags(html_entity_decode($row['description']))}}</p></td>
                                                    </tr>
                                                @endif


                                                @if($interface==2)

                                                    @foreach($row['ProductOneSubLevel'] as $dt)
                                                    <tr>
                                                        <td>
                                                            <span class="proName">{{$dt['name']}}</span>
                                                        </td>
                                                        <td><span>£{{$dt['price']}}</span></td>
                                                        <td align="right">
                                                            <div class="prosec">
                                                                <p class="proPrice">
                                                                    
                                                                    <div style="height: 0px; width: 0px; overflow: hidden;">
                                                                        <img src="{{url('front-theme/images/cart-icon.png')}}">
                                                                    </div>
                                                                    <a  href="javascript:void(0);" data-name-snd="{{$dt['name']}}"  data-id="{{$row['id']}}" snd-data-id="{{$dt['id']}}" snd-data-price="{{$dt['price']}}" ex-class="add-snd-subcat-cart" name="dddd"  class="add-snd-cart proButton">
                                                                       <i class="fa fa-plus"></i>
                                                                   </a>
                                                                </p>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @endforeach

                                                @endif
                                        <?php
                                    }
                                    ?>
                                    

                                             
                                </tbody>
                            </table>


                            <?php
                        }
                    }
                    elseif($cat['layout']==2)
                    {
                        if(isset($cat['product_row']))
                        {
                            ?>
                            <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                <tbody id="place_pro_{{$cat['id']}}">
                                    @if(!empty($cat['description']))
                                        <tr>
                                            <td colspan="3">
                                                <p class="proDes" style="text-transform: capitalize;  font-style: italic !important;">
                                                    <?php echo $cat['description'];?>
                                                </p>
                                            </td>
                                        </tr>
                                    @endif
                                    <?php 

                                    foreach ($cat['product_row'] as $key => $sc) 
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="3">
                                                <span class="proName">{{$sc['name']}}</span><br>
                                                <i>{{$sc['description']}}</i>
                                            </td>
                                        </tr>
                                        <?php 
                                        foreach ($sc['sub_product_row'] as $key => $row) 
                                        {
                                        
                                        $interface=$row['interface'];
                                        ?>
                                        @if($interface!=2)
                                        <tr>
                                            <td width="80%">
                                                <p class="proDes">{{$row['name']}}
                                                    <i><?php echo $row['description']?'<br>'.$row['description']:'';?></i>
                                                </p>
                                            </td>
                                            <td>
                                            <span style="font-weight: 900;">
                                            @if($interface==3)
                                            <?php 
                                            $min_prince_row=0; 
                                            foreach($row['modal'] as $key=>$mod):
                                                if($min_prince_row>0)
                                                {
                                                    if($min_prince_row>$mod['price'])
                                                    {
                                                        $min_prince_row=$mod['price'];
                                                    }
                                                }
                                                else
                                                {
                                                    $min_prince_row=$mod['price'];
                                                }
                                            endforeach;
                                                echo "£".$min_prince_row;
                                            ?>
                                            @else
                                                @if(!empty($row['price']))
                                                    £{{$row['price']}}
                                                @endif
                                            @endif
                                            </span>
                                            </td>
                                            <td align="right">

                                                <div class="prosec">
                                                    @if($interface==5)
                                                        <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="pizza_modal_name_{{$row['id']}}"><i class="fa fa-plus"></i></a>
                                                    @elseif($interface==4)
                                                        <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="ex_modal-name_{{$row['id']}}"><i class="fa fa-plus"></i></a>
                                                    @elseif($interface==3)
                                                        <a href="javascript:void(0);" class="button-cart_wop button proButton modal-trigger" data-modal="other_modal_name_{{$row['id']}}"><i class="fa fa-plus"></i></a>
                                                    @elseif($interface==2)
                                                        &nbsp;
                                                    @else
                                                    <p class="proPrice">
                                                        
                                                        <div style="height: 0px; width: 0px; overflow: hidden;">
                                                            <img src="{{url('front-theme/images/cart-icon.png')}}">
                                                        </div>
                                                        <a href="javascript:void(0);" data-sub-name="{{$sc['name']}}"  data-id="{{$row['id']}}" class="proButton add-cart"><i class="fa fa-plus"></i></a>
                                                    </p>
                                                    @endif
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @if($interface==2)
                                            @foreach($row['ProductOneSubLevel'] as $dt)
                                            <tr>
                                                <td width="60%" align="left" valign="top">
                                                    <span class="proName" style="font-weight: 100 !important;">{{$dt['name']}}</span>
                                                </td>
                                                <td align="right" style="font-weight: bold;"><span>£{{$dt['price']}}</span></td>
                                                <td width="20%" align="right" valign="top">
                                                    <div class="prosec">
                                                        <p class="proPrice">
                                                            
                                                            <div style="height: 0px; width: 0px; overflow: hidden;">
                                                                <img src="{{url('front-theme/images/cart-icon.png')}}">
                                                            </div>
                                                            <a href="javascript:void(0);"  data-extra-id="{{$dt['id']}}" data-id="{{$row['id']}}" data-sub-name="{{$sc['name']}}"  class="proButton add-subcat-cart"><i class="fa fa-plus"></i></a>
                                                        </p>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    <?php
                                        
                                    }

                                    }
                                    ?>         
                                </tbody>
                            </table>
                            <?php
                        }
                    }
                    ?>


                </div>
            </li>



            
                @endforeach
            @endif





            <?php /*
            <li>
                <h3 class="skew-25"><a href="#"><span class="skew25">MAIN COURSES</span></a></h3>
                
                <div class="accordion-panel">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <?php 
                            for($i=1; $i<=5; $i++){
                                ?>
                                <tr>
                                    <td width="60%">
                                        <span class="proName"> Salmon-Ka-Tukra </span>
                                        <p class="proDes">
                                            Salmon Steak tempered with roasted spices then grilled.
                                        </p>
                                    </td>
                                    <td width="20%"></td>
                                    <td width="20%" align="right">

                                        <div class="prosec">
                                            <p class="proPrice">
                                                <span>£5.50</span>
                                                <div style="height: 0px; width: 0px; overflow: hidden;">
                                                    <img src="{{url('front-theme/images/cart-icon.png')}}">
                                                </div>
                                                <a href="javascript:void(0);" class="proButton add-cart"><i class="fa fa-plus"></i></a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            
                                     
                        </tbody>
                    </table>
                </div>
            </li>
            <li>
                <h3 class="skew-25"><a href="#"><span class="skew25">SPECIAL PRESENTATION</span></a></h3>
                
                <div class="accordion-panel">
                    <table cellpadding="0" cellspacing="0" border="0">
                        <tbody>
                            <?php 
                            for($i=1; $i<=5; $i++){
                                ?>
                                <tr>
                                    <td width="60%">
                                        <span class="proName"> Salmon-Ka-Tukra </span>
                                        <p class="proDes">
                                            Salmon Steak tempered with roasted spices then grilled.
                                        </p>
                                    </td>
                                    <td width="20%"></td>
                                    <td width="20%" align="right">

                                        <div class="prosec">
                                            <p class="proPrice">
                                                <span>£5.50</span>
                                                <div style="height: 0px; width: 0px; overflow: hidden;">
                                                    <img src="{{url('front-theme/images/cart-icon.png')}}">
                                                </div>
                                                <a href="javascript:void(0);" class="proButton add-cart"><i class="fa fa-plus"></i></a>
                                            </p>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            
                                     
                        </tbody>
                    </table>
                </div>
            </li> */ ?>
           
        </ul>
    </div>
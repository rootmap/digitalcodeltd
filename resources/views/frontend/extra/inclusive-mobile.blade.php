<style type="text/css">
.micm
{
        position: absolute;
        right: 39px;
        font-weight: bold;
        top: 0px;

}

.micm::before
{
    content: '£';
}
</style>
<ul id="accordion" class="accordion">
    @if(count($inclusiveMeal)>0)
        @foreach($inclusiveMeal as $row)
            
            <li>
                <h3 class="skew-25">
                    
                    <a href="#" id="proMobileName{{$row->id}}">
                        <span style="width:80%; overflow:hidden;" class="skew25">
                            {{$row->name}}
                        </span>
                        <span class="micm" id="micm_{{$row->id}}">
                            {{$row->price}}
                        </span>
                    </a>
                </h3>
                <div class="accordion-panel active">
                    <table cellpadding="0" cellspacing="0" border="0">
                                <tbody id="place_pro_{{$row->id}}">
                                    <tr>
                                        <td colspan="3">
                                            <span class="proName">{{$row->name}}</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            <p class="proDes" style="text-transform: capitalize;  font-style: italic !important;">
                                                <?php echo $row->description;?>
                                            </p>
                                        </td>
                                    </tr>
                                    <?php
                                        $optMenu=json_decode(unserialize($row->product_json));
                                        $k=1;
                                    ?>
                                    @if(count($optMenu)>0)
                                        @foreach($optMenu as $rw)
                                            <tr>
                                                <td colspan="3">
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
                                                    
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                    <tr>
                                        <td colspan="3">
                                            <div class="cell-12" style="text-align:left; padding-left:0px;">
                                                    <button data-pull="{{$row->id}}" class="btn btn-block btn-danger addtocartimMobile" type="button">Add To Cart</button>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                    </table>
                </div>
            </li>
        @endforeach
    @endif
</ul>
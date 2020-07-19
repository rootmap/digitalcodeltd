@if(count($inclusiveMeal)>0)
    @foreach($inclusiveMeal as $row)
        <div class="cell-12" id="im{{$row->id}}" style="clear: both; padding: 0px; padding-bottom: 5px; padding-top: 5px; border-bottom: 1px #ccc solid;">
            <div id="proName{{$row->id}}" class="cell-4" style="padding-left: 0px;">
                <div><strong>{{$row->name}}</strong></div>
                <p>{{$row->description}}</p>
            </div>
            <div class="cell-3">
                <div style="text-align: center;"><strong>Price : from £<span id="imp{{$row->id}}">{{$row->price}}</span></strong></div>
            </div>
            <?php
                $optMenu=json_decode(unserialize($row->product_json));
                $k=1;
            ?>

            <div class="cell-5" style="padding-right: 0px;">
                @if(count($optMenu)>0)
                    @foreach($optMenu as $rw)
                        <div class="cell-12" style="margin-bottom: 5px; padding: 0px;">
                            <div class="cell-6" style="text-align: right; line-height: 33px; padding-right: 0px; font-weight: 600;">
                                {{$rw->pro_opt_name}}
                            </div>
                            <div class="cell-6" style="padding-right: 0px;">
                                <select name="imjname{{$row->id}}_{{str_replace('.','_',str_replace(' ','_',$rw->pro_opt_name))}}" data-opt-cond="{{$rw->pro_opt_name}}" class="form-control inmPrice imj{{$row->id}}" data-tag="{{$row->id}}" style="width: 100%;">
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

                <div class="cell-12" style="text-align: right;">
                    <div class="cell-6"></div>
                    <div class="cell-6" style="padding-right: 0px;">
                        <button data-pull="{{$row->id}}" class="btn btn-block btn-danger addtocartim" type="button">Add To Cart</button>
                    </div>
                </div>
                
            </div>
 
        </div>

    @endforeach
@endif
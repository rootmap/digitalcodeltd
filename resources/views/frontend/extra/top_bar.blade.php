<div class="top-bar" data-sticky="true">
    <div class="container">
        <div class="row">
            <div class="cell-5">
                <ul>
                    {{-- <li><a href="mailto:{{$ContactDetail->contact_email}}"><i class="fa fa-envelope"></i>{{$ContactDetail->contact_email}}</a></li> --}}
                    <li><a href="skype:{{$ContactDetail->contact_phone}}?call"><i class="fa fa-phone"></i> Call Us: <b> {{$ContactDetail->contact_phone}} </b></a></li>
                </ul>
            </div>
            <div class="cell-7 right-bar">
                <ul class="right">
                    <li class="top-shopping-cart-short"
                    @if(isset($tax))
                        data-tax-type="1" data-tax-amount="{{$tax->tax_amount}}"  
                    @else
                        data-tax-type="0" data-tax-amount="0%"  
                    @endif

                        @if(isset($common))
                            data-disamount-limit="{{$common->minimum_amount}}" 
                             data-disamount-type="{{$common->discount_option}}" 
                            data-discount="{{$common->discount_amount}}"
                        @elseif(isset($colndel))
                            @foreach($colndel as $cnd)
                                @if($cnd->discount_option=="Collection")
                                    data-disamount-limit="{{$cnd->minimum_amount}}" 
                                    data-disamount-type="{{$cnd->discount_option}}" 
                                    data-discount="{{$cnd->discount_amount}}"
                                @elseif($cnd->discount_option=="Delivery")
                                    data-delivery-disamount-limit="{{$cnd->minimum_amount}}" 
                                    data-delivery-disamount-type="{{$cnd->discount_option}}" 
                                    data-delivery-discount="{{$cnd->discount_amount}}"
                                @endif
                            @endforeach
                        @else
                            data-disamount-limit="0" data-discount="0%"
                        @endif
                    >
                        <a href="{{url('shopping-cart')}}"><i class="fa fa-shopping-cart"></i>
                            0 item(s) - £0.00
                        </a>
                    </li>
                    <!-- <li><a href="siteMap.php"><i class="fa fa-sitemap"></i>Site Map</a></li> -->
                    @if(Auth::check())
                        <li><a href="{{url('user/dashboard')}}"><i class="fa fa-user"></i>Profile : {{Auth::user()->name}}</a></li>
                        <li><a class="logoutFront" href="javascript:void(0);">
                                <i class="fa fa-lock"></i> Logout
                            </a>
                        </li>
                        <div style=" height: 0px; width: 0px; opacity: 0px;">
                            <form method="post" style="opacity: 0px;" id="logoutFront" action="{{url('logout')}}" >
                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                <button type="submit" style="height: 0px; width: 0px; background: none; opacity: 0px;" class="btn"></button>
                            </form> 
                        </div>
                    @else
                        <li><a href="{{url('new-account')}}"><i class="fa fa-user"></i>Register</a></li>
                        <li><a href="{{url('user-login')}}"><i class="fa fa-unlock-alt"></i> Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
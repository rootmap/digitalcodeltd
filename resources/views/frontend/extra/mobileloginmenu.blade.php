<div class="cusButonRight">
    @if(Auth::check())
        <a class="btn btn-md btn-square main-bg fx animated fadeInUp" href="{{url('user/dashboard')}}" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms; margin-top: 14px; ">
        <span><i class="fa fa-user"></i> Profile {{Auth::user()->name}}</span>
        </a>

        <a class="btn btn-md btn-square main-bg fx animated fadeInUp logoutFront" href="javascript:void(0);"  data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms; margin-top: 14px; margin-left: 0px;">
            <span><i class="fa fa-lock selectedI"></i> Logout</span>
        </a>
    @else
    <style type="text/css">
        .user-login-info {
            padding: 25px 0px 0px 10px;
        }
        .user-login-info li a {
                color: #000;
                font-size: 14px;
                font-weight: 700;
                padding-right: 10px;
            }
            .user-login-info li i{
                color: #e7512f;
                font-size: 16px;
            }
    </style>
        <div class="user-login-info text-right" style="display: none;">
            <ul class="list-unstyled list-inline">
            <!-- cfologin-orderpage -->
                <li class="fx animated fadeInUp" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;  "><a href="{{url('user-login')}}"><i class="fa fa-user"></i> Sign in</a> <a href="{{url('new-account')}}"><i class="fa fa-user-plus"></i> Sign up</a></li>
            </ul>
        </div>
        {{-- <a class="btn btn-md btn-square main-bg fx animated fadeInUp" href="{{url('user-login')}}" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;  margin-top: 14px; ">
        <span><i class="fa fa-user"></i>login</span>
        </a>
        <a class="btn btn-md btn-square main-bg fx animated fadeInUp" href="{{url('new-account')}}" data-animate="fadeInUp" data-animation-delay="100" style="animation-delay: 100ms;  margin-top: 14px; ">
            <span><i class="fa fa-user-plus selectedI"></i>Register</span>
        </a> --}}
    @endif
    
</div>
{{-- <div class="cart-icon fx" id="mobileCartMenuShort" data-animate="fadeInRight" style="margin-top: 23px; margin-right: 20px;">
    <div class="cart-heading">
        <i class="fa fa-shopping-cart"></i><span id="cart-count" class="mobileCartMenuShortCartData"><b>0</b> item(s)</span>
    </div>
</div> --}}
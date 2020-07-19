@extends('frontend.layout.master')
@section('title','Password Reset | ')
@section('content')	
<div class="limiter">
	    <div class="container-login100 p-t-30 p-b-20" style="background-image: url('{{url('front-theme/images/restaurant-939435_960_720.jpg')}}');">
	        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
	        	
	            <form class="login100-form validate-form" action="{{ url('/password/modify/user') }}" method="post">
	            	@include('frontend.extra.msg')
	                <span class="login100-form-title p-b-20">
	                    Reset Your Password
	                </span>
					{{ csrf_field() }}
					<input type="hidden" name="token" value="{{ $token }}">
	                <div class="wrap-input100 validate-input m-b-23" data-validate="Email is reauired">
	                    <span class="label-input100">Email</span>
	                    <input class="input100" {{ $errors->has('email') ? ' style="border:1px #f00 solid;"' : '' }} type="email" id="email" name="email"  value="{{ old('email') }}" placeholder="Type your email">
	                    <span class="focus-input100" data-symbol=""></span>
	                    @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
	                </div>


	                <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" id="passwd" name="password" placeholder="Type your password">
                         @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                    <div class="wrap-input100 validate-input" style="padding-top: 20px;" data-validate="Confirm Password is required">
                        <span class="label-input100">Confirm Password</span>
                        <input class="input100" type="password" id="password_confirmation" name="password_confirmation" placeholder="Type your Confirm password">
                        <span class="focus-input100" data-symbol=""></span>
                    </div>


	                <div class="container-login100-form-btn" style="margin-bottom: 20px; margin-top: 20px;"> 
	                    <div class="wrap-login100-form-btn">
	                        <div class="login100-form-bgbtn"></div>
	                        <button class="login100-form-btn" type="submit">
	                            Change Password
	                        </button>
	                    </div>
	                </div>   

	                               

	                <div class="flex-col-c p-t-10">
	                    <span class="txt1 p-b-17">
	                        Or
	                    </span>

	                    <a class="btn btn-md btn-skew" href="{{url('user-login')}}">
	                        <span><i class="fa fa-bicycle selectedI"></i>Login</span>
	                    </a>
	                </div>
	            </form>
	        </div>
	    </div>
	</div>
@endsection

@section('css')
	<!-- Skin style (** you can change the link below with the one you need from skins folder in the css folder **) -->
    <link rel="stylesheet" href="{{url('front-theme/css/skins/default.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/css/custom/main.css')}}">
    <link rel="stylesheet" href="{{url('front-theme/css/custom/util.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
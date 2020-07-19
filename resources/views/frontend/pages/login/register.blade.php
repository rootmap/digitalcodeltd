@extends('frontend.layout.master')
@section('title','Create new account. | ')
@section('content') 
    <div class="limiter">
        <div class="container-login100 p-t-30 p-b-20" style="background-image: url('{{url('front-theme/images/restaurant.jpg')}}');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">

                <form class="login100-form validate-form" action="{{ url('/register') }}" method="post">
                    @include('frontend.extra.msg')
                    <span class="login100-form-title p-b-20">
                        Create New Account
                    </span>
                    {{ csrf_field() }}
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Name is reauired">
                        <span class="label-input100">Full Name</span>
                        <input class="input100" type="text" id="name" name="name"  value="{{ old('name') }}" placeholder="Type your name">
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                        <span class="focus-input100" data-symbol=""></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Username is reauired">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="email" id="email" name="email"  value="{{ old('email') }}" placeholder="Type your email">
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                        <span class="focus-input100" data-symbol=""></span>
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

                    <div class="text-right p-t-8 p-b-8">
                        <a href="{{url('user-login')}}">
                            I already have a account, back to login?
                        </a>
                    </div>

                    <div class="container-login100-form-btn" style="margin-bottom: 20px;">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit">
                                Submit
                            </button>
                        </div>
                    </div>   

                    <div class="container-login100-form-btn" data-validate="Username is reauired">
                        <div class="container">
                                <div class="cell-6" style="margin-bottom: 20px;">
                                    <a class="btn btn-block btn-social btn-facebook">
                                        <i class="fa fa-facebook"></i> Facebook Signup
                                    </a>
                                </div>
                                <div class="cell-6" style="padding-left: 22px;">
                                    <a class="btn btn-block btn-social btn-google-plus">
                                        <i class="fa fa-google-plus"></i> Google Signup
                                    </a>
                                </div>
                        </div>
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
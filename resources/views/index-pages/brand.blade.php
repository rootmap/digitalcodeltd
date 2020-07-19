@extends('front-layout.master')


@section('content')

<div id="page">


    <div class="columns-container" style="padding-top: 20px;">
        <div id="columns" class="container">
            <div id="slider_row" class="row"></div>
            <div class="row">
                <div class="container">
                    <div class="breadcrumb title_font clearfix"> <a class="home title_font" href="{{url('home')}}" title="Return to Home"><span class="title">Home</span></a> <span class="navigation-pipe"><i class="icon-chevron-right"></i></span> Brand</div>
                </div>
                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 class="page-heading">All Brand</h1>
                    @include('front-include.msg')
                    <div class="row">
                        @if(isset($brn))
                            @foreach($brn as $bnn)
                            <div class="col-xs-12 col-sm-3" style="margin-bottom: 25px;">
                                <a style="text-decoration: none;" href="{{url('category/brand/'.$bnn->id.'/'.$bnn->cid.'/'.$bnn->name)}}">
                                <div class="thumbnail">
                                    <img style="height: 100px;" src="{{url('upload/brand/'.$bnn->brandlogo)}}" alt="...">
                                    <div class="caption">
                                        <h3>{{$bnn->name}}</h3>
                                        <p>{{str_limit($bnn->description,35)}}</p>
                                        {{--<p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>--}}
                                    </div>
                                </div>
                                </a>    
                            </div>
                            @endforeach
                        @endif
                        


                    </div>
                </div>
                <!--shop login-->
                <!--                    <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                                        <h1 class="page-heading">Shop Login</h1>
                                        <div class="row">
                                            
                                            <div class="col-xs-12 col-sm-6 authentication-left">
                                                <form action="account-shop.php" method="post" id="create-account_form" class="box">
                                                    <h3 class="page-subheading">Create an account</h3>
                                                    <div class="form_content clearfix">
                                                        <p>Please enter your email address to create an account.</p>
                                                        <div class="alert alert-danger" id="create_account_error" style="display:none"></div>
                                                        <div class="form-group">
                                                            <label for="email_create">Email address</label>
                                                            <input type="email" class="is_required validate account_input form-control" data-validate="isEmail" id="email_create" name="email_create" value="" />
                                                        </div>
                                                        <div class="submit">
                                                            <button class="btn btn-default button button-medium exclusive" type="submit" id="SubmitCreate" name="SubmitShop"> <span> <i class="icon-user left"></i> Create an account </span> </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 authentication-right">
                                                <form action="" method="post" id="login_form" class="box">
                <?php //echo $plugin->ShowMsg(); ?>
                                                    <h3 class="page-subheading">Already registered?</h3>
                                                    <div class="form_content clearfix">
                                                        <div class="form-group">
                                                            <label for="email">Email address</label>
                                                            <input class="is_required validate account_input form-control" data-validate="isEmail" type="email" id="email" name="email" value="" />
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="passwd">Password</label>
                                                            <input class="is_required validate account_input form-control" type="password" data-validate="isPasswd" id="passwd" name="password" value="" />
                                                        </div>
                                                        <p class="lost_password form-group"><a href="#" title="Recover your forgotten password" rel="nofollow">Forgot your password?</a></p>
                                                        <p class="submit">
                                                            
                                                            <button type="submit"  name="shoplogin" class="button btn btn-default button-medium"> <span> <i class="icon-lock left"></i> Sign in </span> </button>
                                                        </p>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>-->
                <!--shop login end-->
            </div>
        </div>
    </div>
</div>

@endsection
@include('front-include.titleseo')
@include('front-include.index_js')

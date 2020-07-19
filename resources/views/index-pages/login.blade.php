@extends('front-layout.master')


@section('content')

<div id="page">


    <div class="columns-container" style="padding-top: 20px;">
        <div id="columns" class="container">
            <div id="slider_row" class="row"></div>
            <div class="row">
                <div class="container">
                    <div class="breadcrumb title_font clearfix"> <a class="home title_font" href="http://demo.fieldthemes.com/ps_monaco/home1/" title="Return to Home"><span class="title">Home</span></a> <span class="navigation-pipe"><i class="icon-chevron-right"></i></span> Authentication</div>
                </div>
                <div id="center_column" class="center_column col-xs-12 col-sm-12 col-md-12">
                    <h1 class="page-heading">Customer Login</h1>
                    @include('front-include.msg')
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 authentication-left">
                            <form action="{{ url('/login') }}" method="post" id="login_form" class="box">
                                {{ csrf_field() }}
                                <h3 class="page-subheading">Already registered?</h3>
                                <div class="form_content clearfix">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <input class="is_required validate account_input form-control" data-validate="isEmail" type="email" id="email" name="email"  value="{{ old('email') }}" />
                                    </div>
                                    <div  class="form-group">
                                        <label for="passwd">Password</label>
                                        <input class="is_required validate account_input form-control" type="password" data-validate="isPasswd" id="passwd" name="password" value="" />
                                    </div>
                                    <div class="form-group">

                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="remember"> Remember Me
                                            </label>
                                        </div>
                                    </div>
                                    <p class="lost_password form-group"><a href="#" title="Recover your forgotten password" rel="nofollow">Forgot your password?</a></p>
                                    <p class="submit">

                                        <button type="submit" class="button btn btn-default button-medium"> <span> <i class="icon-lock left"></i> Sign in </span> </button>
                                    </p>
                                </div>
                            </form>
                        </div>
                        <div class="col-xs-12 col-sm-6 authentication-right">
                            <form action="{{ url('/user-registration') }}" method="post" id="create-account_form" class="box">
                                <h3 class="page-subheading">Create an account</h3>
                                <div class="form_content clearfix">
                                    {{ csrf_field() }}
                                    <div class="alert alert-danger" id="create_account_error" style="display:none"></div>
                                    <div class="required text form-group first-group">
                                        <label for="email">Email <sup>*</sup></label>
                                        <input type="email" class="text form-control validate" id="email" name="email" data-validate="isEmail" value="" />
                                    </div>
                                    <div class="required password form-group">
                                        <label for="passwd">Password <sup>*</sup></label>
                                        <input type="password" class="text form-control validate" name="password" id="passwd" data-validate="isPasswd" />
                                        <p class="required opc-required pull-right"> (five characters min.)</p>
                                    </div>
                                    <div class="required form-group">
                                        <label for="firstname">Full name <sup>*</sup></label>
                                        <input type="text" class="text form-control validate" id="customer_firstname" name="name" onblur="$('#firstname').val($(this).val());" data-validate="isName" value="" />
                                    </div>

                                    <div class="submit">
                                        <button class="btn btn-default button button-medium exclusive" type="submit" id="SubmitCreate" name="SubmitCreate"> <span> <i class="icon-user left"></i> Create an account </span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>

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

<div id="opc_new_account" class="opc-main-block">
    <div id="opc_new_account-overlay" class="opc-overlay" style="display: none;"></div>
    @if(Auth::check())
    <h1 class="page-heading step-num"><span>1</span> Please Select Existing Delivery Address / Create New One </h1>
    @else
    <h1 class="page-heading step-num"><span>1</span> Account</h1>
    @endif
    <div class="row">
        @if(!Auth::check())
        <form action="{{url('/login')}}" method="post" id="login_form" class="box col-md-6">
            <fieldset>
                <h3 class="page-subheading">Already registered? 
                    <a href="{{url('user-login')}}" class="btn btn-info pull-right">Create New Account</a>
                </h3>
                <p><a href="login" id="openLoginFormBlock">&raquo;&raquo; Click here</a></p>
                <div id="login_form_content" style="display:none;">
                    <div id="opc_login_errors" class="alert alert-danger" style="display:none;"></div>
                    <p class="form-group">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <label for="login_email">Email address</label>
                        <input type="email" class="form-control validate" id="login_email" name="email" data-validate="isEmail" />
                    </p>
                    <p class="form-group">
                        <label for="login_passwd">Password</label>
                        <input class="form-control validate" type="password" name="password" id="login_passwd" name="login_passwd" data-validate="isPasswd" />
                    </p> <a href="password-recovery" class="lost_password">Forgot your password?</a> | 
                    <p class="submit">
                        <input type="hidden" name="remember">
                        <button type="submit"  class="button btn btn-default button-medium"><span><i class="icon-lock left"></i>Sign in</span></button>
                    </p>
                </div>
            </fieldset>
        </form>
        @endif
        <div class="clearfix"></div>
        @if(Auth::check())

        <form action="#" method="post" id="new_account_form_logged" class="std" autocomplete="on" autofill="on">
            <fieldset>
                <div class="box">
                    <div id="opc_account_choice">
                        <h3 id="new_account_title" class="page-subheading">New Customer</h3>
                        <div class="row">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">


                        </div>
                    </div>
                    <div id="opc_account_form" class="unvisible row">
                        <div class="new_customer col-xs-12 col-sm-12 col-md-6">

                            <div class="delivery_options_address">
                                <div class="delivery_options">

                                    <h3 id="new_account_title" class="page-subheading">Shiping Method</h3>
                                    <div class="delivery_option item">
                                        <div>
                                            <table class="resume table table-bordered table-striped">
                                                <?php $i = 0; ?>
                                                @foreach($ship as $sp)
                                                <tr>
                                                    <td class="delivery_option_radio">
                                                        <input id="delivery_option_{{$i}}" class="delivery_option_radios" type="radio" name="delivery_method" value="{{$sp->id}}" />
                                                    </td>
                                                    <td class="delivery_option_logo"> <img height="30" width="100" class="order_carrier_logo" src="{{url('upload/shipping/'.$sp->shippingimage)}}" alt="My carrier" /></td>
                                                    <td> <strong>{{$sp->name}}</strong>
                                                        <br />{{$sp->description}}</td>
                                                    <td class="delivery_option_price">
                                                        <div class="delivery_option_price"> ${{$sp->price}}</div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>




                                    <h3 id="new_account_title" class="page-subheading">Payment Method</h3>
                                    <div class="delivery_option item">
                                        <div>
                                            <table class="resume table table-bordered table-striped">
                                                <?php $i = 0; ?>
                                                @foreach($pmall as $sp)
                                                <tr>
                                                    <td class="delivery_option_radio">
                                                        <input id="pm_option_{{$i}}" class="delivery_option_radios" type="radio" name="pm_option" value="{{$sp->id}}" />
                                                    </td>
                                                    <td> <strong>{{$sp->name}}</strong></td>
                                                    <td class="delivery_option_price">{{$sp->description}}
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                                @endforeach
                                            </table>
                                        </div>
                                    </div>



                                    <hr style="" />
                                    <div class="box">
                                        <p class="checkbox">
                                            <input type="checkbox" name="cgv" id="cgv" value="1" />
                                            <label for="cgv">I agree to the terms of service and will adhere to them unconditionally.</label> <a target="_blank" href="{{url('terms-and-condition')}}" class="iframe" rel="nofollow">(Read the Terms of Service)</a></p>
                                    </div>
                                </div>
                                <div class="hook_extracarrier" id="HOOK_EXTRACARRIER_0"></div>
                            </div>

                        </div>

                        @if(isset($delivery_info))
                        <div class="delivery_add col-xs-12 col-sm-12 col-md-6 row-50">
                            <h3 class="page-subheading">Delivery address</h3>
                            <div class="required text form-group col-50">
                                <label for="firstname">First name <sup>*</sup></label>
                                <input type="text" value="{{$delivery_info->first_name}}" class="text form-control validate" id="firstname" name="first_name" data-validate="isName" />
                            </div>
                            <div class="required text form-group col-50">
                                <label for="lastname">Last name </label>
                                <input type="text"  value="{{$delivery_info->last_name}}" class="text form-control validate" id="lastname" name="last_name" data-validate="isName"  />
                            </div>
                            <div class="text form-group">
                                <label for="company">Company</label>
                                <input type="text"   value="{{$delivery_info->company}}"  class="text form-control validate" id="company" name="company" data-validate="isGenericName" />
                            </div>
                            <div class="required text form-group col-50">
                                <label for="address1">Address <sup>*</sup></label>
                                <input type="text"  value="{{$delivery_info->address}}" class="text form-control validate" name="address" id="address" data-validate="isAddress" />
                            </div>
                            <div class="text is_customer_param form-group">
                                <label for="address2">Address (Line 2)</label>
                                <input type="text"  value="{{$delivery_info->address_2}}" class="text form-control validate" name="address_2" id="address2" data-validate="isAddress" value="" />
                            </div>
                            <div class="required text form-group col-50">
                                <label for="city">City <sup>*</sup></label>
                                <input type="text"  value="{{$delivery_info->city}}" class="text form-control validate" name="city" id="city" data-validate="isCityName" value="" />
                            </div>

                            <input type="hidden"  value="{{$delivery_info->state}}"  name="state" value="0" />
                            <div class="required text form-group col-50">
                                <label for="postcode">Zip/Postal code <sup>*</sup></label>
                                <input type="text"   value="{{$delivery_info->zip_code}}"  class="text form-control" name="zip_code" id="postcode" />
                            </div>
                            <div class="required select form-group">
                                <label for="id_country">Country <sup>*</sup></label>
                                <select name="country" class="form-control">
                                    <option value="" selected="selected">Select Country</option>
                                    <option <?php if($delivery_info->country==1){ ?> selected="selected" <?php } ?> value="1">United States</option>
                                    <option <?php if($delivery_info->country==2){ ?> selected="selected" <?php } ?>  value="2">United Kingdom</option>
                                    <option <?php if($delivery_info->country==3){ ?> selected="selected" <?php } ?>  value="3">Bangladesh</option>
                                    <option <?php if($delivery_info->country==4){ ?> selected="selected" <?php } ?>  value="4">India</option>
                                </select>
                            </div>
                            <div class="required dni form-group">
                                <label for="dni">Identification number <sup>*</sup></label>
                                <input type="text"  value="{{$delivery_info->zip_code}}"  class="text form-control validate" name="dni" id="dni" data-validate="isDniLite"  /> <span class="form_info">DNI / NIF / NIE</span></div>
                            <div class="form-group is_customer_param">
                                <label for="other">Additional information</label>
                                <textarea class="form-control" name="additional_info" id="other" cols="26" rows="7">{{$delivery_info->additional_info}}</textarea>
                            </div>
                            <div class="form-group is_customer_param col-50">
                                <label for="phone">Home phone </label>
                                <input type="text" value="{{$delivery_info->home_phone}}" class="text form-control validate" name="home_phone" id="phone" data-validate="isPhoneNumber"  />
                            </div>
                            <div class="required form-group col-50">
                                <label for="phone_mobile">Mobile phone <sup>*</sup></label>
                                <input type="text"  value="{{$delivery_info->mobile_phone}}"  class="text form-control validate" name="mobile_phone" id="phone_mobile" data-validate="isPhoneNumber" />
                            </div>

                        </div>
                        @else
                        <div class="delivery_add col-xs-12 col-sm-12 col-md-6 row-50">
                            <h3 class="page-subheading">Delivery address</h3>
                            <div class="required text form-group col-50">
                                <label for="firstname">First name <sup>*</sup></label>
                                <input type="text" class="text form-control validate" id="firstname" name="first_name" data-validate="isName" value="" />
                            </div>
                            <div class="required text form-group col-50">
                                <label for="lastname">Last name </label>
                                <input type="text" class="text form-control validate" id="lastname" name="last_name" data-validate="isName" value="" />
                            </div>
                            <div class="text form-group">
                                <label for="company">Company</label>
                                <input type="text" class="text form-control validate" id="company" name="company" data-validate="isGenericName" value="" />
                            </div>
                            <div class="required text form-group col-50">
                                <label for="address1">Address <sup>*</sup></label>
                                <input type="text" class="text form-control validate" name="address" id="address" data-validate="isAddress" value="" />
                            </div>
                            <div class="text is_customer_param form-group">
                                <label for="address2">Address (Line 2)</label>
                                <input type="text" class="text form-control validate" name="address_2" id="address2" data-validate="isAddress" value="" />
                            </div>
                            <div class="required text form-group col-50">
                                <label for="city">City <sup>*</sup></label>
                                <input type="text" class="text form-control validate" name="city" id="city" data-validate="isCityName" value="" />
                            </div>

                            <input type="hidden" name="state" value="0" />
                            <div class="required text form-group col-50">
                                <label for="postcode">Zip/Postal code <sup>*</sup></label>
                                <input type="text" class="text form-control" name="zip_code" id="postcode" />
                            </div>
                            <div class="required select form-group">
                                <label for="id_country">Country <sup>*</sup></label>
                                <select name="country" class="form-control">
                                    <option value="1" selected="selected">United States</option>
                                    <option value="2">United Kingdom</option>
                                    <option value="3">Bangladesh</option>
                                    <option value="4">India</option>
                                </select>
                            </div>
                            <div class="required dni form-group">
                                <label for="dni">Identification number <sup>*</sup></label>
                                <input type="text" class="text form-control validate" name="dni" id="dni" data-validate="isDniLite" value="" /> <span class="form_info">DNI / NIF / NIE</span></div>
                            <div class="form-group is_customer_param">
                                <label for="other">Additional information</label>
                                <textarea class="form-control" name="additional_info" id="other" cols="26" rows="7"></textarea>
                            </div>
                            <div class="form-group is_customer_param col-50">
                                <label for="phone">Home phone </label>
                                <input type="text" class="text form-control validate" name="home_phone" id="phone" data-validate="isPhoneNumber" value="" />
                            </div>
                            <div class="required form-group col-50">
                                <label for="phone_mobile">Mobile phone <sup>*</sup></label>
                                <input type="text" class="text form-control validate" name="mobile_phone" id="phone_mobile" data-validate="isPhoneNumber" value="" />
                            </div>

                        </div>
                        @endif

                        <input type="hidden" name="cart" value="" />


                        <div class="clearfix"></div>
                        <div class="submit clearfix col-xs-12 col-md-12">
                            <div>
                                <p class="required opc-required"> <sup>*</sup>Required field</p>
                                 
                                <a href="{{url('home')}}" class="btn btn-danger button button-medium"><span>Continue Shopping <i class="icon-chevron-right right"></i></span></a>
                                <button type="button" onclick="dsfdsf()"  name="submitAccount" class="btn btn-default button button-medium"><span> Complete Order & Save Info <i class="icon-chevron-right right"></i></span></button>
                                
                            </div>
                        </div>
                        <div style="display: none;" id="opc_account_saved" class="alert alert-success col-xs-12 col-md-12"> Account information saved successfully</div>
                    </div>
                </div>
            </fieldset>
        </form>
        
        <style type="text/css">
            html {
    -webkit-transition: background-color 1s;
    transition: background-color 1s;
        }
        html, body {
            /* For the loading indicator to be vertically centered ensure */
            /* the html and body elements take up the full viewport */
            min-height: 100%;
        }
        html.loading {
            /* Replace #333 with the background-color of your choice */
            /* Replace loading.gif with the loading image of your choice */
            background: #333 url('<?=url('upload/loader/please_wait.gif')?>') no-repeat 50% 50%;

            /* Ensures that the transition only runs in one direction */
            -webkit-transition: background-color 0;
            transition: background-color 0;
        }
        body {
            -webkit-transition: opacity 1s ease-in;
            transition: opacity 1s ease-in;
        }
        html.loading body {
            /* Make the contents of the body opaque during loading */
            opacity: 0;

            /* Ensures that the transition only runs in one direction */
            -webkit-transition: opacity 0;
            transition: opacity 0;
        }
        
        .loading_text
        {
            height: 100px;
            width: 300px;
            color: #000;
            background: #fff;
            opacity: 1;
            z-index: 9999;
            position: absolute;
            font-size: 20px;
            font-weight: bolder;
        }
        </style>    
        <script type="text/javascript">
            function loadingStop()
            {
                document.getElementsByTagName( "html" )[0].classList.remove( "loading" );
                document.getElementsByTagName( "html" )[0].className.replace( /loading/, "" );
                $( "html" ).removeClass( "loading" );
            }
            
            function addCustomLoader()
            {
                $('html').addClass('loading');
            }
            
            function dsfdsf()
            {
                if(document.getElementById('cgv').checked==true)
                {
                    addCustomLoader();
                    var delivery_option=$("input[name='delivery_method']:checked"). val();
                    var pm_option=$("input[name='pm_option']:checked"). val();
                    if(delivery_option==undefined)
                    {
                        loadingStop();
                        alert('Please select delivery method.');
                        return true;
                    }
                    
                    if(pm_option==undefined)
                    {
                        loadingStop();
                        alert('Please select Payment method.');
                        return true;
                    }
                    
                    var first_name=$("input[name='first_name']"). val();
                    var last_name=$("input[name='last_name']"). val();
                    var company=$("input[name='company']"). val();
                    var address=$("input[name='address']"). val();
                    var address_2=$("input[name='address_2']"). val();
                    var city=$("input[name='city']"). val();
                    var state=$("input[name='state']"). val();
                    var zip_code=$("input[name='zip_code']"). val();
                    var country=$("select[name='country']"). val();
                    var additional_info=$("textarea[name='additional_info']"). val();
                    var home_phone=$("input[name='home_phone']"). val();
                    var mobile_phone=$("input[name='mobile_phone']"). val();
                    var cart=$("input[name='cart']"). val();
                    
                    var token=$("input[name='_token']"). val();
                    //return true;
                    if(delivery_option!=undefined && pm_option!=undefined && first_name!='' && address!='' && city!='' && zip_code!='' && country!=undefined && mobile_phone!='')
                    {
                        $.post('<?=url('shopping-cart/sss')?>',
                        {
                            'delivery_option':delivery_option,
                            'pm_option':pm_option,
                            'first_name':first_name,
                            'last_name':last_name,
                            'company':company,
                            'address':address,
                            'address_2':address_2,
                            'city':city,
                            'state':state,
                            'zip_code':zip_code,
                            'country':country,
                            'additional_info':additional_info,
                            'home_phone':home_phone,
                            'mobile_phone':mobile_phone,
                            'cart':cart,
                            'uniqueOID':'<?=time()?>',
                            '_token':token
                        },function(data){
                            var obj=data;
                            //console.log(obj);
                            //return true;
                            if(obj==1)
                            {
                                loadingStop();
                                //alert('Order successfully saved.');
                                window.location.href="<?=url('checkout-cart/success/'.time())?>";
                            }
                            else
                            {
                                loadingStop();
                                //alert('Failed To Save, Please try again.');
                                window.location.href="<?=url('checkout-cart/failed/'.time())?>";
                            }
                        });
                        //alert(delivery_option+" gg "+pm_option);
                    }
                    else
                    {
                        loadingStop();
                        alert('Please fillup all required (*) field.');
                    }
                    
                }
                else
                {
                    loadingStop();
                    alert('Please agree with our terms & condition.');
                    //e.preventDefault();
                }
            }
            
            

        </script>    

        @endif
    </div>
</div>


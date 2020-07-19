<div id="opc_new_account" class="opc-main-block">
                            <div id="opc_new_account-overlay" class="opc-overlay" style="display: none;"></div>
                            <h1 class="page-heading step-num"><span>1</span> Account</h1>
                            <div class="row">
                                <form action="{{url('login-user-data')}}/{{base64_encode(url('shopping-cart'))}}" method="post"  class="box col-md-6">
                                    <fieldset>
                                        <h3 class="page-subheading">Already registered?</h3>
                                        <p><a href="login" id="openLoginFormBlock">&raquo;&raquo; Click here</a></p>
                                        <div id="login_form_content" style="display:none;">
                                            <div id="opc_login_errors" class="alert alert-danger" style="display:none;"></div>
                                            <p class="form-group">
                                                
                                                <label for="login_email">Email address</label>
                                                <input type="email" class="form-control validate" id="login_email" name="email" data-validate="isEmail" />
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            </p>
                                            <p class="form-group">
                                                <label for="login_passwd">Password</label>
                                                <input class="form-control validate" type="password" id="login_passwd" name="password" data-validate="isPasswd" />
                                            </p> <a href="password-recovery" class="lost_password">Forgot your password?</a> | 
                                            <p class="submit">
                                                <button type="submit"  name="Login" class="button btn btn-default button-medium"><span><i class="icon-lock left"></i>Sign in</span></button>
                                            </p>
                                        </div>
                                    </fieldset>
                                </form>
                                <div class="clearfix"></div>
                                <form action="{{url('customer-signup')}}/{{base64_encode(url('shopping-cart'))}}" method="post" id="new_account_form" class="std" autocomplete="on" autofill="on">
                                    <fieldset>
                                        <div class="box">
                                            <div id="opc_account_choice">
                                                <h3 id="new_account_title" class="page-subheading">New Customer</h3>
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-6">
                                                        <p class="title_block">Instant Checkout</p>
                                                        <p class="opc-button">
                                                            <button type="submit" class="btn btn-default button button-medium exclusive" id="opc_guestCheckout"><span>Guest checkout</span></button>
                                                        </p>
                                                    </div>
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <div class="col-xs-12 col-md-6">
                                                        <p class="title_block">Create your account today and enjoy:</p>
                                                        <ul class="bullet">
                                                            <li>- Personalized and secure access</li>
                                                            <li>- A fast and easy check out process</li>
                                                            <li>- Separate billing and shipping addresses</li>
                                                        </ul>
                                                        <p class="opc-button">
                                                            <button type="submit" class="btn btn-default button button-medium exclusive" id="opc_createAccount"><span><i class="icon-user left"></i>Create an account</span></button>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="opc_account_form" class="unvisible row">
                                                <div class="new_customer col-xs-12 col-sm-12 col-md-6">
                                                    <h3 id="new_account_title" class="page-subheading">New Customer</h3>
                                                    <div id="opc_account_errors" class="alert alert-danger" style="display:none;"></div>
                                                    <input type="hidden" id="is_new_customer" name="is_new_customer" value="0" />
                                                    <input type="hidden" id="opc_id_customer" name="opc_id_customer" value="0" />
                                                    <input type="hidden" id="opc_id_address_delivery" name="opc_id_address_delivery" value="0" />
                                                    <input type="hidden" id="opc_id_address_invoice" name="opc_id_address_invoice" value="0" />
                                                    <p class="required required_opc_account"><sup>*</sup>Required field</p>
                                                    <div class="required text form-group first-group">
                                                        <label for="email">Email <sup>*</sup></label>
                                                        <input type="email" class="text form-control validate" id="email" name="email" data-validate="isEmail" value="" />
                                                    </div>
                                                    <div class="required password is_customer_param form-group">
                                                        <label for="passwd">Password <sup>*</sup></label>
                                                        <input type="password" class="text form-control validate" name="passwd" id="passwd" data-validate="isPasswd" />
                                                        <p class="required opc-required pull-right"> (five characters min.)</p>
                                                    </div>
                                                    <div class="required form-group">
                                                        <label for="firstname">Full name <sup>*</sup></label>
                                                        <input type="text" class="text form-control validate" id="customer_firstname" name="name" onblur="$('#firstname').val($(this).val());" data-validate="isName" value="" />
                                                    </div>
                                                    
                                                    <div class="required clearfix gender-line">
                                                        <label>Social title</label>
                                                        <div class="radio-inline">
                                                            <label for="id_gender1" class="top">
                                                                <input type="radio" name="id_gender" id="id_gender1" value="Male" /> Mr.</label>
                                                        </div>
                                                        <div class="radio-inline">
                                                            <label for="id_gender2" class="top">
                                                                <input type="radio" name="id_gender" id="id_gender2" value="Female" /> Mrs.</label>
                                                        </div>
                                                    </div>
                                                    <div class="select form-group date-select">
                                                        <label>Date of Birth</label>
                                                        <div class="row">
                                                            <div class="col-xs-4">
                                                                <select id="days" name="days" class="form-control">
                                                                    <option value="">-</option>
                                                                    <?php 
                                                                    for($i=1; $i<=31; $i++):
                                                                    	?>
                                                                    	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    	<?php
                                                                    endfor;
                                                                    ?>
                                                                    
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <select id="months" name="months" class="form-control">
                                                                    <option value="">-</option>
                                                                    <?php 
                                                                    for($i=1; $i<=12; $i++):
                                                                    	?>
                                                                    	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    	<?php
                                                                    endfor;
                                                                    ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-xs-4">
                                                                <select id="years" name="years" class="form-control">
                                                                    <option value="">-</option>
                                                                    <?php 
                                                                    for($i=(date('Y')-7); $i>=(date('Y')-7)-70; $i--):
                                                                    	?>
                                                                    	<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                                    	<?php
                                                                    endfor;
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="newsletter">
                                                            <input type="checkbox" name="newsletter" id="newsletter" value="1" autocomplete="off" /> Sign up for our newsletter!</label>
                                                    </div>
                                                    <div class="checkbox">
                                                        <label for="optin">
                                                            <input type="checkbox" name="optin" id="optin" value="1" autocomplete="off" /> Receive special offers from our partners!</label>
                                                    </div>
                                                </div>
                                                <div class="delivery_add col-xs-12 col-sm-12 col-md-6 row-50">
                                                    <h3 class="page-subheading">Delivery address</h3>
                                                    <div class="required text form-group col-50">
                                                        <label for="firstname">First name <sup>*</sup></label>
                                                        <input type="text" class="text form-control validate" id="firstname" name="first_name" data-validate="isName" value="" />
                                                    </div>
                                                    <div class="required text form-group col-50">
                                                        <label for="lastname">Last name <sup>*</sup></label>
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
                                                    <div class="required id_state form-group col-50" style="display:none;">
                                                        <label for="id_state">State <sup>*</sup></label>
                                                        <select name="state" id="id_state" class="form-control">
                                                            <option value="">-</option>
                                                        </select>
                                                    </div>
                                                    <div class="required postcode text form-group col-50">
                                                        <label for="postcode">Zip/Postal code <sup>*</sup></label>
                                                        <input type="text" class="text form-control validate" name="zip_code" id="postcode" data-validate="isPostCode" value="" />
                                                    </div>
                                                    <div class="required select form-group">
                                                        <label for="id_country">Country <sup>*</sup></label>
                                                        <select name="country" id="id_country" class="form-control">
                                                            <option value="21" selected="selected">United States</option>
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
                                                        <label for="phone">Home phone <sup>**</sup></label>
                                                        <input type="text" class="text form-control validate" name="home_phone" id="phone" data-validate="isPhoneNumber" value="" />
                                                    </div>
                                                    <div class="required form-group col-50">
                                                        <label for="phone_mobile">Mobile phone <sup>**</sup></label>
                                                        <input type="text" class="text form-control validate" name="mobile_phone" id="phone_mobile" data-validate="isPhoneNumber" value="" />
                                                    </div>
                                                    
                                                </div>
                                                
                                                

                                                
                                                <div class="clearfix"></div>
                                                <div class="submit clearfix col-xs-12 col-md-12">
                                                    <div>
                                                        <p class="required opc-required"> <sup>*</sup>Required field</p>
                                                        <button type="submit" name="submitAccount" class="btn btn-default button button-medium"><span>Save<i class="icon-chevron-right right"></i></span></button>
                                                    </div>
                                                </div>
                                                <div style="display: none;" id="opc_account_saved" class="alert alert-success col-xs-12 col-md-12"> Account information saved successfully</div>
                                            </div>
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
                        </div>

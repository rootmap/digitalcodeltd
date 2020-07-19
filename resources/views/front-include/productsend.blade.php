<div style="display: none;">
    <div id="send_friend_form">
        <h2 class="page-subheading"> Send to a friend</h2>
        <div class="row">
            <div class="product clearfix col-xs-12 col-sm-6"> 
                <img src="{{url('upload/product')}}/{{$product->photo}}" height="344" width="270" alt="{{$product->name}}" />
                <div class="product_desc">
                    <p class="product_name"> <strong>{{$product->name}}</strong>
                    </p>
                    <p>{{$product->description}}</p>
                </div>
            </div>
            <div class="send_friend_form_content col-xs-12 col-sm-6" id="send_friend_form_content">
                <div id="send_friend_form_error"></div>
                <div id="send_friend_form_success"></div>
                <div class="form_container">
                    <p class="intro_form"> Recipient :</p>
                    <p class="text">
                        <label for="friend_name"> Name of your friend <sup class="required">*</sup> : </label>
                        <input id="friend_name" name="friend_name" type="text" value="" />
                    </p>
                    <p class="text">
                        <label for="friend_email"> E-mail address of your friend <sup class="required">*</sup> : </label>
                        <input id="friend_email" name="friend_email" type="text" value="" />
                    </p>
                    <p class="txt_required"> <sup class="required">*</sup> Required fields</p>
                </div>
                <p class="submit">
                    <button id="sendEmail" class="btn button button-small" name="sendEmail" type="submit"> <span>Send</span> </button>&nbsp; or&nbsp; <a class="closefb" href="#"> Cancel </a>
                </p>
            </div>
        </div>
    </div>
</div>
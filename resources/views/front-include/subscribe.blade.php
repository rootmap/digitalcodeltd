@if($chkSubscribe==0)
<div class="container">
    <div class="row">
        <div class="fieldpopupnewsletter" style="width:770px;height:450px;background-image:url({{url('site-pub/images/slider')}}/95.jpg);">
            <div id="newsletter_block_popup" class="block">
                <div class="block_content">
                    <form action="" method="post">
                        <div class="box-title">
                            <div class="box-title2">
                                <div class="popup_title">
                                    <h2>Sign up now !</h2></div>
                                <div class="popup_text">
                                    <p>Don't miss out - get 10% off discount if</p>
                                    <p>you subscribe to our newsletter.</p>
                                </div>
                            </div>
                        </div>
                        <div class="send-response"></div>
                        <div class="fa fa-envelope-o"></div>
                        <input class="inputNew form-control" id="newsletter-input-popup" type="text" name="email" value="Enter email address" />
                        <div class="send-reqest button_unique main_color_hover">Subscribe</div>
                    </form>
                </div>
                <div class="newsletter_block_popup-bottom">
                    <input id="newsletter_popup_dont_show_again" type="checkbox">
                    <label for="newsletter_popup_dont_show_again">Don't show this popup again</label>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<div class="footer-center">
    <div class="container">
        <div class="row">
            <div class="footer-static row-fluid">
                <div class="footer-block footer-banner col-xs-12 col-sm-6 col-md-3"><img src="{{url('site-pub/images/weaccept.png')}}" alt="" /></div>
                <div class="footer-block footer-contact col-xs-12 col-sm-6 col-md-3">
                    <h4 class="title_block title_font"><span style="display: none;">.</span><img src="{{url('upload/logo')}}/{{$seo[0]->site_logo}}" alt="" width="70%" height="70" style="padding-left: 50px;"/></h4>
                    @if(isset($csudet))
                    <ul class="toggle-footer">
                        <li class="content_contact">
                            <p>{{$csudet[0]->contact_title}}</p>
                        </li>
                        <li>
                            <div class="fa fa-map-marker"></div> <span><span style="color: #fff;">{{$csudet[0]->contact_address}}</span></span>
                        </li>
                        <li>
                            <div class="fa fa-phone"></div> <span><span style="color: #fff;"> {{$csudet[0]->contact_phone}}</span></span>
                        </li>
                        <li>
                            <div class="fa fa-envelope"></div> <span></span style="color: #fff;"><a href="mailto:{{$csudet[0]->contact_email}}">{{$csudet[0]->contact_email}}</a></li>
                    </ul>
                    @endif
                </div>
                
                @if(isset(MenuPageController::recentProductViewShow()['data']))
                <div class="footer-block footer-recenpost col-xs-12 col-sm-6 col-md-3">
                    <h4 class="title_block title_font">Recently Viewed</h4>
                    <ul class="toggle-footer">

                            @foreach(MenuPageController::recentProductViewShow()['data'] as $pro)
                            <li>
                                <a href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}">
                                    <img src="{{url('upload/product')}}/{{$pro->photo}}"  width="100" alt="" />
                                </a>
                                <p style="text-align: left;">Code : {{$pro->pcode}}<br>{{$pro->name}}<br>Price : {{$pro->price}}</p>
                            </li>
                            @endforeach
                    </ul>
                </div>
                
                @else
                <div class="footer-block footer-recenpost col-xs-12 col-sm-6 col-md-3">
                    <h4 class="title_block title_font">New Product</h4>
                    <ul class="toggle-footer">

                            @foreach(MenuPageController::recentProduct() as $pro)
                            <li>
                                <a href="{{url('product')}}/{{$pro->id}}/{{$pro->name}}">
                                    <img src="{{url('upload/product')}}/{{$pro->photo}}"  width="100" alt="" />
                                </a>
                                <p style="text-align: left;">Code : {{$pro->pcode}}<br>{{$pro->name}}<br>Price : {{$pro->price}}</p>
                            </li>
                            @endforeach
                    </ul>
                </div>
                @endif
                @if(isset(MenuPageController::QRCode()->qrcode))
                <div class="footer-block footer-newsletter col-xs-12 col-sm-6 col-md-3">
                    <h4 class="title_block title_font">QR Code</h4>
                    <div class="toggle-footer">
                        <img class="img-responsive" style="height: 130px;" src="{{url('upload/qrcode/'.MenuPageController::QRCode()->qrcode)}}" />
                    </div>
                </div>
                @endif
                <div class="footer-block footer_social col-xs-12 col-sm-6 col-md-3">
                    <h4 class="title_block title_font">Social media</h4>
                    <div class="toggle-footer">
                        <div id="social_block">
                            <ul>
                                <li class="facebook">
                                    <a class="_blank" href="http://www.facebook.com/"> <span>Facebook</span> </a>
                                </li>
                                <li class="twitter">
                                    <a class="_blank" href="http://www.twitter.com/"> <span>Twitter</span> </a>
                                </li>
                                <li class="rss">
                                    <a class="_blank" href=""> <span>RSS</span> </a>
                                </li>
                                <li class="youtube">
                                    <a class="_blank" href="https://www.youtube.com/"> <span>Youtube</span> </a>
                                </li>
                                <li class="google-plus">
                                    <a class="_blank" href="https://www.google.com/" rel="publisher"> <span>Google Plus</span> </a>
                                </li>
                                <li class="instagram">
                                    <a class="_blank" href="#"> <span>Instagram</span> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-md-9 pull-right">
                    <div class="footer-address-payment ">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="footer-address">
                                    <p style="color: #fff; font-weight: bolder;">Copyright © 2016. All rights reserved.</p>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="payment">
                                    <!--<a href="#"><img class="img-responsive" src="images/payment_footer.png" alt="" width="220" height="24" /> </a>-->
                                    <i class="fa fa-cc-mastercard" aria-hidden="true" style="color: #000; font-size: 30px;"></i>
                                    <i class="fa fa-cc-paypal" aria-hidden="true" style="color: #000; font-size: 30px;"></i>
                                    <i class="fa fa-cc-visa" aria-hidden="true"  style="color: #000; font-size: 30px;"></i>
                                    <i class="fa fa-amazon" aria-hidden="true" style="color: #000; font-size: 30px;"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function CategoryWiseRedirect(cid)
    {
        var getCIDName=$("option[value="+cid+"]").text();
        console.log('working hill');
        cid=cid.replace('C','');
        window.location.href="{{url('/')}}/category/"+cid+"/"+getCIDName;
    }

    function pageLimitAssign(limit)
    {
        var linkForLimit="<?=url('default/page/limit')?>";
        $.get(linkForLimit+"/"+limit,function(data)
        {
            var linkForReloadData="<?=url('/')?>/<?=Request::path()?>";
            window.location.href=linkForReloadData;
        });
    }

    function pageFilterAssign(limit)
    {
        var linkForLimit="<?=url('default/page/filter')?>";
        $.get(linkForLimit+"/"+limit,function(data)
        {
            var linkForReloadData="<?=url('/')?>/<?=Request::path()?>";
            window.location.href=linkForReloadData;
        });
    }
</script>
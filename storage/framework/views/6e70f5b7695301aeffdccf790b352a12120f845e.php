<footer id="footWrapper">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- main menu footer cell start -->
                <!-- contact us footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head">Keep in Touch</h3>
                    <ul>
                        <li class="footer-contact"><i class="fa fa-home"></i><span><?php echo e($ContactDetail->contact_address); ?></span></li>
                        <li class="footer-contact"><i class="fa fa-globe"></i><span><a href="mailto:<?php echo e($ContactDetail->contact_email); ?>"><?php echo e($ContactDetail->contact_email); ?></a></span></li>
                        <li class="footer-contact"><i class="fa fa-phone"></i><span><a href="skype:<?php echo e($ContactDetail->contact_phone); ?>?call"><?php echo e($ContactDetail->contact_phone); ?></span></a></li>
                        <li class="footer-contact"><i class="fa fa-map-marker"></i><span><a href="<?php echo e(url('contact-us')); ?>">View our map</a></span></li>
                    </ul>
                </div>
                <!-- contact us footer cell end -->

                <!-- Newsletters footer cell start -->
                <div class="cell-3">                                
                    <h3 class="block-head"><?= $AcceptPayment->title?$AcceptPayment->title:'We accept payment Using'; ?></h3>
                    <p>
                       <a target="_blank" href="<?php echo e($AcceptPayment->title_link); ?>">
                        <img src="<?php echo e(url('upload/AcceptPayment')); ?>/<?= $AcceptPayment->images ?>">
                        </a>
                    </p>



                </div>
                <!-- Newsletters footer cell start -->

                <!-- latest tweets footer cell start -->
                <div class="cell-3">
                    <h3 class="block-head"><?php echo e($ContactDetail->qrcode_section_title?$ContactDetail->qrcode_section_title:'Verify Us with QR Code'); ?></h3>
                    <p align="center">
                        <a target="_blank" href="<?php echo e($ContactDetail->qrcode_link); ?>">
                        <img style="height: 140px;" src="<?php echo e(url('upload/qrcode')); ?>/<?php echo e($ContactDetail->qr_code); ?>" alt="QRCode">
                        </a>
                    </p>
                    <!-- <form action="link-to-your-site" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" target="_blank" novalidate class="NL">
                        <div class="skew-25 input-box left">
                            <input type="email" value="" name="EMAIL" class="txt-box skew25" id="mce-EMAIL" placeholder="Enter Yor Email" required>
                        </div>
                        <div class="left skew-25 NL-btn">
                            <input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe" class="btn skew25">
                        </div>
                        <div class="hidden"><input type="text" name="name-of-the-hidden-field" value=""></div>

                        <div class="Notfication fx animated fadeInRight">
                            <a class="close-box" href="#"><i class="fa fa-times"></i></a>
                            <p></p>
                        </div>
                    </form> -->
                </div>
                <!-- latest tweets footer cell start -->

                <!-- flickr stream footer cell start -->
                <div class="cell-3 flickr-stream-w">
                    <h3 class="block-head"><?php echo e($ContactDetail->social_section_title?$ContactDetail->social_section_title:'Join us on facebook'); ?></h3>
                    <?php 
                    $social_link=$ContactDetail->social_link;
                    if(empty($ContactDetail->social_link))
                    {
                        $social_link="javascript:void(0);";
                    }
                    ?>
                    <a target="_blank" href="<?php echo e($social_link); ?>">
                        <img  src="<?php echo e(url('upload/social')); ?>/<?php echo e($ContactDetail->social); ?>">
                    </a>
                </div>
                <!-- flickr stream footer cell start -->

            </div>
        </div>	
    </div>

    <!-- footer bottom bar start -->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <!-- footer copyrights left cell -->
                <div class="copyrights cell-4">&copy; <?php echo e(date('Y')); ?> Copyrights <b><?php echo e($Seo->name); ?></b>. All rights reserved. 
                    
                </div>

                <!-- footer social links right cell start -->
                <div class="cell-4">
                    <ul class="social-list right">
                        <li class="skew-25"><a href="#" data-title="dribbble" data-tooltip="true"><span class="fa fa-dribbble skew25"></span></a></li>
                        <li class="skew-25"><a href="#" data-title="facebook" data-tooltip="true"><span class="fa fa-facebook skew25"></span></a></li>
                        <li class="skew-25"><a href="#" data-title="linkedin" data-tooltip="true"><span class="fa fa-linkedin skew25"></span></a></li>
                        <li class="skew-25"><a href="#" data-title="skype" data-tooltip="true"><span class="fa fa-skype skew25"></span></a></li>
                        <li class="skew-25"><a href="#" data-title="tumbler" data-tooltip="true"><span class="fa fa-tumblr skew25"></span></a></li>
                        <li class="skew-25"><a href="#" data-title="twitter" data-tooltip="true"><span class="fa fa-twitter skew25"></span></a></li>
                        <li class="skew-25"><a href="#" data-title="YouTube" data-tooltip="true"><span class="fa fa-youtube skew25"></span></a></li>
                    </ul>
                </div>
                <div class="cell-4 ">
                    <div class="right">
                        Developed by <a href="http://www.londonwebtechnology.co.uk" target="_blank">London web technology</a>
                    </div>
                    
                </div>
                <!-- footer social links right cell end -->

            </div>
        </div>
    </div>
    <!-- footer bottom bar end -->

</footer>
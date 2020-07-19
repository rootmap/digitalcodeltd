<div style="display: none;">
    <div id="new_comment_form">
        <form  action="{{ route('product.addReview',['id'=>$product->id,'reur'=>base64_encode('product/$product->id/$product->name')]) }}">
            <h2 class="page-subheading"> Write a review</h2>
            <div class="row">
                <div class="product clearfix col-xs-12 col-sm-6"> 
                    <img src="{{url('upload/product')}}/{{$product->photo}}" height="159" width="125" alt="Cras ornare tristique elit." />
                    <div class="product_desc">
                        <p class="product_name"> <strong>{{$product->name}}</strong>
                        </p>
                        <p>{{$product->description}}</p>
                    </div>
                </div>
                <div class="new_comment_form_content col-xs-12 col-sm-6">
                    <div id="new_comment_form_error" class="error" style="display: none; padding: 15px 25px">
                        <ul></ul>
                    </div>
                    <ul id="criterions_list">
                        <li>
                            <label>Quality:</label>
                            <div class="star_content">
                                <input class="star not_uniform" type="radio" name="rat" id="rat_0" value="1" />
                                <input class="star not_uniform" type="radio" name="rat" id="rat_1" value="2" />
                                <input class="star not_uniform" type="radio" name="rat" id="rat_2" value="3" />
                                <input class="star not_uniform" type="radio" name="rat" id="rat_3" value="4" checked="checked" />
                                <input class="star not_uniform" type="radio" name="rat" id="rat_4" value="5" />
                            </div>
                            <div class="clearfix"></div>
                        </li>
                    </ul>
                    <label for="comment_title"> Title: <sup class="required">*</sup> </label>
                    <input id="comment_title" name="title" type="text" value="" />
                    <label for="content"> Comment: <sup class="required">*</sup> </label>
                    <textarea id="content" name="content"></textarea>
                    <label> Your name: <sup class="required">*</sup> </label>
                    <input id="commentCustomerName" name="customer_name" type="text" value="" />
                    <div id="new_comment_form_footer">
                        <p class="fl required"><sup>*</sup> Required fields</p>
                        <p class="fr">
                            <button  name="submitMessage" type="submit" class="btn button button-small"> <span>Submit</span> </button>&nbsp; or&nbsp; <a class="closefb" href="#"> Cancel </a>
                        </p>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php

namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Seo;
use App\category;
use App\SubCategory;
use App\Brand;
use App\Slider;
use App\Product;
use App\Cart;
use App\CustomerSupport;
use App\ContactDetail;
use App\Language;
use App\Currency;
use App\ProductReview;
use App\Shipping;
use App\Orders;
use App\OrdersItem;
use App\DeliveryAddress;
use App\PaymentMethod;
use App\Customer;
use App\OrderDeliveryMethod;
use App\OrderPaymentMethod;
use App\User;
use App\ProductColor;
use App\Discount;
use App\OrderInfo;
use App\Tax;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use PHPMailerAutoload;
use PHPMailer;
use App\TodayOffer;
use App\Extrapage;
use App\Review;
use App\GalleryPhoto;
class IndexController extends Controller {

    private $moduleName="Index";
    private $sdc;
    private $minOrderforDelivery=2;
    private $minOrderDeliveryFailedText='Order Delivery is available only when minimum order amount is more than £2.00 Pounds.';
    public function __construct(){ 
        $this->sdc = new MenuPageController(); 
    }
    
    public function GenaratePageDataLimit($limit='')
    {
        if(!session::has('pagination_limit') && empty($limit))
        {
            session::put('pagination_limit',9);
        }
        elseif(!session::has('pagination_limit') && !empty($limit))
        {
            session::put('pagination_limit',$limit);
        }
        elseif(session::has('pagination_limit') && !empty($limit))
        {
            session::put('pagination_limit',$limit);
        }

        $newLimit=session::get('pagination_limit')?session::get('pagination_limit'):$limit;

        return $newLimit;
    }

    public function GenaratePageDataFilter($filter='')
    {
        
        if(!session::has('filter') && empty($filter))
        {
            session::put('filter','id-desc');
        }
        elseif(!session::has('filter') && !empty($filter))
        {
            session::put('filter',$filter);
        }
        elseif(session::has('filter') && !empty($filter))
        {
            session::put('filter',$filter);
        }

        $filterData=session::get('filter')?session::get('filter'):'id-desc';
       

        return $filterData;

    }
    
    
    

    public function login(Request $request)
    {


        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        

        

        //dd($orderINfo);

        
        

        //$product=Product::all();
        $defultReturn=[
            'rec' => $cart->rec,
            'product' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
        ];

        if($this->checkCommonDiscount())
        {
            $defultReturn=array_merge($defultReturn,['common'=>$this->checkCommonDiscount()]);
        }

        if($this->checkColNDelDiscount())
        {
            $defultReturn=array_merge($defultReturn,['colndel'=>$this->checkColNDelDiscount()]);
        }        

        if($this->checkTax())
        {
            $defultReturn=array_merge($defultReturn,['tax'=>$this->checkTax()]);
        }
        return view('frontend.pages.login.index',$defultReturn);
    }

    public function reset()
    {
        return view('frontend.pages.login.reset');
    }

    public function register()
    {
        return view('frontend.pages.login.register');
    }

    public function index(Request $request) {
        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $productcolor = ProductColor::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $seo = Seo::all();
        $brn = Brand::all();
        $ship = Shipping::all();
        $pmall = PaymentMethod::all();


        $orderINfo=OrderInfo::orderBy('id','DESC')->first();

        if (Auth::id()) {
            $auth_email = Auth::user()->email;
            $chkcusto = Customer::where('email', $auth_email)->count();
            if ($chkcusto != 0) {
                $customer_id = Customer::where('email', $auth_email)->first()->id;
                $delivery_info = DeliveryAddress::where('customer_id', $customer_id)->first();
            }
        }




        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);


        
        

        //$product=Product::all();
        $defultReturn=[
            'rec' => $cart->rec,
            'product' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
        ];

       // dd($defultReturn);


        if($this->checkCommonDiscount())
        {
            $defultReturn=array_merge($defultReturn,['common'=>$this->checkCommonDiscount()]);
        }

        if($this->checkColNDelDiscount())
        {
            $defultReturn=array_merge($defultReturn,['colndel'=>$this->checkColNDelDiscount()]);
        }        

        if($this->checkTax())
        {
            $defultReturn=array_merge($defultReturn,['tax'=>$this->checkTax()]);
        }


        return view('frontend.pages.index.index',$defultReturn);
    }

    public function orderItem(Request $request) {

        return view('frontend.pages.product.index');
    }    

       
    public function tableBooking(Request $request) {

        return view('frontend.pages.extra.reservation');
    }

    public function gallery(Request $request) {
        $gallery = GalleryPhoto::where('isactive','1')->get();
        return view('frontend.pages.extra.gallery',['gallery'=>$gallery]);
    }

    public function reviews(Request $request) {
        $review = Review::all();
        return view('frontend.pages.extra.reviews',['data'=>$review]);
    }

    // public function contactUs(Request $request) {

    //     return view('frontend.pages.extra.contactus');
    // }

    public function ourOffer(Request $request) {
        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        //$subcat=SubCategory::all();
        $cat = category::take(2)->get();

        $cats = category::all();
        $seo = Seo::all();
        $offer = TodayOffer::where('isactive','1')->get();

        return view('frontend.pages.extra.offer', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'cat' => $cat,
            'cats' => $cats,
            'offer'=>$offer

        ]);
       
    } 


    public function pageextra(Request $request,$page_id=0,$page_name='') {
        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        //$subcat=SubCategory::all();
        $cat = category::take(2)->get();
        $extrapageData = Extrapage::find($page_id);

        $cats = category::all();
        $seo = Seo::all();
        $offer = TodayOffer::where('isactive','1')->get();

        return view('frontend.pages.extra.extrapage', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'cat' => $cat,
            'page_name' => $page_name,
            'cats' => $cats,
            'extrapageData' => $extrapageData,
            'offer'=>$offer

        ]);
       
    } 

    

    public function contactUS() {

        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        //$subcat=SubCategory::all();
        $cat = category::take(2)->get();

        $cats = category::all();
        $seo = Seo::all();
        $contact = ContactDetail::first();

        return view('frontend.pages.extra.contactus', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'cat' => $cat,
            'cats' => $cats,
            'contact'=>$contact

        ]);
    }

    public function Brand() {

        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        //$subcat=SubCategory::all();
        $cat = category::take(2)->get();

        $cats = category::all();
        //$brn = Brand::all();

        $brnID = DB::table('products')
                ->select('products.bid')
                ->groupBy('products.bid')
                ->get();
        $bid = [];
        if (isset($brnID)) {
            foreach ($brnID as $df):
                array_push($bid, $df->bid);
            endforeach;
        }

        $brn = DB::table('products')
                ->leftJoin('brands', 'products.bid', '=', 'brands.id')
                ->select('brands.*', 'products.cid')
                ->WhereIN('brands.id', $bid)
                ->groupBy('brands.id')
                ->get();

        $seo = Seo::all();
        $product = Product::take(5)->get();
        $slider = Slider::where('isactive', '1')->take(3)->get();

        return view('index-pages.brand', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            'slider' => $slider,
            'product' => $product
        ]);
    }

    public function postContactUS(Request $request) {
        $tab = DB::table('contact_requests')->insert(['name' => $request->name,
            'email' => $request->email,
            'phone' => $request->mobile,
            'description' => $request->description]);
        if ($tab == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    public function TestEmail() {
        $mail = $this->sdc->initMail(
        $to='f.bhuyian@gmail.com',
        $subject='res Test',
        $body='This is the body in plain text for non-HTML mail clients',
        $bcc='',
        $AltBody='This is the body in plain text for non-HTML mail clients',
        $attachment='',
        $debug=0
    );
        echo $mail;
        exit();
    }

    public function getAddToCart(Request $request, $id, $reur) {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        //return $reur;
        //exit();
        //return 1;
        return redirect(url(base64_decode($reur)));
    }

    

    public function storeDelivery(Request $request) {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $name=$request->name;
        $phone=$request->phone;
        $address=$request->address;
        $email=$request->email;
        $zipcode=$request->zipcode;
        $asap=$request->asap;
        $delivery_date=$request->booking_date;
        $delivery_time=$request->booking_time;
        $delivery_note=$request->booking_note;
        $cart = new Cart($oldCart);
        $cart->storeDelivery($name,$phone,$address,$email,$zipcode,$asap,$delivery_date,$delivery_time,$delivery_note);
        $request->session()->put('cart', $cart);
        return response()->json(1);
    }

    public function getAddToCartajax(Request $request, $id, $reur) {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        //return $reur;
        //exit();
        return response()->json($cart);
        //return redirect(url(base64_decode($reur)));
    }

    public function savecart(Request $request) {
        $product = Product::find($request->id_product);

        //echo $request->qty;

        for ($i = 1; $i <= $request->qty; $i++) {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->add($product, $product->id);

            $request->session()->put('cart', $cart);
        }

        //echo $request->qty;
        //print_r($cart);
        return redirect(url($request->reur))->with('status', 'Successfully added to cart.');
        //echo $request->reur;
        //exit();
    }

    public function cartAddFromProduct(Request $request, $pid, $quantity) {
        $product = Product::find($pid);

        //echo $request->qty;
        if (!empty($quantity)) {
            for ($i = 1; $i <= $quantity; $i++) {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->add($product, $product->id);

                $request->session()->put('cart', $cart);
            }

            $request->session()->put('cart', $cart);
            //dd($request->session()->get('cart'));
            //return $reur;
            //exit();
            return response()->json($cart);
            //echo $request->reur;
            //exit();
        } else {
            return 0;
        }
    }

    public function cartAddFromProductCustom(Request $request, $pid = 0, $quantity = 0, $unit = 0, $color = 0) {
        $product = Product::find($pid);

        //echo $request->qty;
        if (!empty($quantity)) {
            $getUnit = DB::table('product_unit_types')->where('id', $product->product_unit_type_id)->first();
            $unitName = $getUnit->name;
            for ($i = 1; $i <= $quantity; $i++) {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->addCustom($product, $product->id, $unit, $color, $unitName);

                $request->session()->put('cart', $cart);
            }

            $request->session()->put('cart', $cart);
            //dd($request->session()->get('cart'));
            //return $reur;
            //exit();
            return response()->json($cart);
            //echo $request->reur;
            //exit();
        } else {
            return 0;
        }
    }

    public function cartAddFromProductCustomWC(Request $request, $pid = 0, $quantity = 0, $color = 0) {
        $product = Product::find($pid);

        //echo $request->qty;

        if (!empty($quantity)) {
            for ($i = 1; $i <= $quantity; $i++) {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->addCustomWC($product, $product->id, $color);

                $request->session()->put('cart', $cart);
            }

            $request->session()->put('cart', $cart);
            //dd($request->session()->get('cart'));
            //return $reur;
            //exit();
            return response()->json($cart);
            //echo $request->reur;
            //exit();
        } else {
            return 0;
        }
    }

    public function cartAddFromProductCustomWU(Request $request, $pid = 0, $quantity = 0, $unit = 0) {
        $product = Product::find($pid);

        //echo $request->qty;

        if (!empty($quantity)) {
            for ($i = 1; $i <= $quantity; $i++) {
                $oldCart = Session::has('cart') ? Session::get('cart') : null;
                $cart = new Cart($oldCart);
                $cart->addCustomWU($product, $product->id, $unit);

                $request->session()->put('cart', $cart);
            }

            $request->session()->put('cart', $cart);
            //dd($request->session()->get('cart'));
            //return $reur;
            //exit();
            return response()->json($cart);
            //echo $request->reur;
            //exit();
        } else {
            return 0;
        }
    }

    public function getDelToCart(Request $request, $id) {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->delProduct($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('site.shopping-cart');
    }

    public function getDelRowCart(Request $request, $id) {

        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);

        $cart->delEntireProduct($product, $product->id);

        $request->session()->put('cart', $cart);
        //dd($request->session()->get('cart'));
        return redirect()->route('site.shopping-cart');
    }

    public function cartProductRemove(Request $request, $pid, $pr) {
        $product = Product::find($pid);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->delProductRow($product, $product->id);
        $request->session()->put('cart', $cart);

        return response()->json($cart);
    }

    public function cartProductRemoveUrl(Request $request, $pid, $reur) {
        $product = Product::find($pid);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->delProductRow($product, $product->id);
        $request->session()->put('cart', $cart);

        return redirect(base64_decode($reur));
    }

    public function getClearCart() {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->ClearCart();
        Session::put('cart', null);
        //$request->session()->put('cart',$cart);
        //dd($request->session()->get('cart'));
        return redirect()->action('IndexController@index');
    }

    public function getCart() {
        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $productcolor = ProductColor::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $seo = Seo::all();
        $brn = Brand::all();
        $ship = Shipping::all();
        $pmall = PaymentMethod::all();

        $orderINfo=OrderInfo::orderBy('id','DESC')->first();

        if (Auth::id()) {
            $auth_email = Auth::user()->email;
            $chkcusto = Customer::where('email', $auth_email)->count();
            if ($chkcusto != 0) {
                $customer_id = Customer::where('email', $auth_email)->first()->id;
                $delivery_info = DeliveryAddress::where('customer_id', $customer_id)->first();
            }
        }



        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if (empty($cart->totalQty)) {
            return redirect(url('order-item'));
        }

        if(empty(self::typeofdelivery()))
        {
            return redirect(url('order-item'));
        }

        //dd($orderINfo);

        if ($orderINfo->isoffline==0)
        {
            if($cart->rec=="Delivery")
            {
                if($cart->totalPrice<$this->minOrderforDelivery)
                {
                    return redirect(url('order-item'))->with('error',$this->minOrderDeliveryFailedText);
                }
            }
        }

        if ($orderINfo->isoffline==1)
        {
            return redirect(url('order-item'));
        }
        

        //$product=Product::all();
        $defultReturn=[
            'rec' => $cart->rec,
            'product' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
        ];

        if($this->checkCommonDiscount())
        {
            $defultReturn=array_merge($defultReturn,['common'=>$this->checkCommonDiscount()]);
        }

        if($this->checkColNDelDiscount())
        {
            $defultReturn=array_merge($defultReturn,['colndel'=>$this->checkColNDelDiscount()]);
        }        

        if($this->checkTax())
        {
            $defultReturn=array_merge($defultReturn,['tax'=>$this->checkTax()]);
        }

        //dd($defultReturn);

        return view('frontend.pages.checkout.shopping-cart', $defultReturn);
    }

    public function typeofdelivery()
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return $cart->rec; 
    }

    private function checkCommonDiscount()
    {
        $chk=Discount::where('discount_status','Active')
                     ->where('discount_option','Common')
                     ->count();
        if($chk>0)
        {
            $data=Discount::select(
                            'id',
                            'minimum_amount',
                            'discount_option',
                            'discount_type',
                            \DB::Raw("CASE WHEN discount_type='Fixed' THEN discount_amount 
                            ELSE CONCAT(discount_amount,'%') END as discount_amount"),
                            'message',
                            'discount_status',
                            'created_at'
                            )
                          ->where('discount_status','Active')
                          ->where('discount_option','Common')
                          ->first();
            //dd($data);
            return $data;
        }
    }

    private function checkColNDelDiscount()
    {
        $chk=Discount::where('discount_status','Active')
                     ->whereIn('discount_option', ['Delivery','Collection','Order Online'])
                     ->count();
        //dd($chk);
        if($chk>0)
        {
            $data=Discount::select(
                            'id',
                            'minimum_amount',
                            'discount_option',
                            'discount_type',
                            \DB::Raw("CASE WHEN discount_type='Fixed' THEN discount_amount 
                            ELSE CONCAT(discount_amount,'%') END as discount_amount"),
                            'message',
                            'discount_status',
                            'created_at'
                            )
                          ->where('discount_status','Active')
                          ->whereIn('discount_option', ['Delivery','Collection','Order Online'])
                          ->get();
            //dd($data);
            return $data;
        }
    }
    
    private function checkTax()
    {
        $chk=Tax::where('tax_status','Active')
                ->orderBy('id','DESC')
                ->count();
        //dd($chk);



        if($chk>0)
        {
            $data=Tax::where('tax_status','Active')
                     ->orderBy('id','DESC')
                     ->first();
            return $data;
        }
    }
    

    public function getCheckout() {
        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $productcolor = ProductColor::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $seo = Seo::all();
        $brn = Brand::all();
        $ship = Shipping::all();
        $pmall = PaymentMethod::all();

        if (Auth::id()) {
            $auth_email = Auth::user()->email;
            $chkcusto = Customer::where('email', $auth_email)->count();
            if ($chkcusto != 0) {
                $customer_id = Customer::where('email', $auth_email)->first()->id;
                $delivery_info = DeliveryAddress::where('customer_id', $customer_id)->first();
            }
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if (empty($cart->totalQty)) {
            return redirect(url('order-item'));
        }

        if(empty(self::typeofdelivery()))
        {
            return redirect(url('order-item'));
        }


        $defultReturn=[
            'product' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
        ];

        if($this->checkCommonDiscount())
        {
            $defultReturn=array_merge($defultReturn,['common'=>$this->checkCommonDiscount()]);
        }

        if($this->checkColNDelDiscount())
        {
            $defultReturn=array_merge($defultReturn,['colndel'=>$this->checkColNDelDiscount()]);
        }        

        if($this->checkTax())
        {
            $defultReturn=array_merge($defultReturn,['tax'=>$this->checkTax()]);
        }

        return view('frontend.pages.checkout.confirm', $defultReturn);
    }

    public function getProcedPayment() {

         $orderINfo=OrderInfo::orderBy('id','DESC')->first();
        //dd($orderINfo->isoffline);
        if($orderINfo->isoffline==1)
        {
            return redirect(url('order-item'))->with('error',strip_tags(htmlspecialchars_decode($orderINfo->offline_notice)));
        }

        
        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $productcolor = ProductColor::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $seo = Seo::all();
        $brn = Brand::all();
        $ship = Shipping::all();
        $pmall = PaymentMethod::all();
        $delivery_info='';
        

        //dd($delivery_info)


        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $productcolor = ProductColor::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $seo = Seo::all();
        $brn = Brand::all();
        $ship = Shipping::all();
        $pmall = PaymentMethod::all();

        $orderINfo=OrderInfo::orderBy('id','DESC')->first();

        $customer_id=0;

        if (Auth::id()) {
            $auth_email = Auth::user()->email;
            $chkcusto = Customer::where('email', $auth_email)->count();
            if ($chkcusto != 0) {
                $customer_id = Customer::where('email', $auth_email)->first()->id;
                $delivery_info = DeliveryAddress::where('customer_id', Auth::id())->orderby('id','DESC')->first();
            }
        }



        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        if (empty($cart->totalQty)) {
            return redirect(url('order-item'));
        }

        if(empty(self::typeofdelivery()))
        {
            return redirect(url('order-item'));
        }

        //dd($orderINfo);

        if ($orderINfo->isoffline==0)
        {
            if($cart->rec=="Delivery")
            {
                if($cart->totalPrice<$this->minOrderforDelivery)
                {
                    return redirect(url('order-item'))->with('error',$this->minOrderDeliveryFailedText);
                }
            }
        }

        if ($orderINfo->isoffline==1)
        {
            return redirect(url('order-item'));
        }

        //dd($customer_id);
        //dd($delivery_info);
        

        //$product=Product::all();
        $defultReturn=[
            'delivery_info' => $delivery_info,
            'product' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'rec' => $cart->rec
        ];

        if($this->checkCommonDiscount())
        {
            $defultReturn=array_merge($defultReturn,['common'=>$this->checkCommonDiscount()]);
        }

        if($this->checkColNDelDiscount())
        {
            $defultReturn=array_merge($defultReturn,['colndel'=>$this->checkColNDelDiscount()]);
        }        

        if($this->checkTax())
        {
            $defultReturn=array_merge($defultReturn,['tax'=>$this->checkTax()]);
        }

        return view('frontend.pages.checkout.proced-to-payment', $defultReturn);
    }

    public function shoppingCart() {
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return response()->json($cart);
    }

    public function categoryPage($cid, $name) {

        $language = Language::all();
        $currency = Currency::all();



        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$product = Product::all();
        //echo "<pre>";
        //print_r($product);
        //exit();

        $cat_info = category::find($cid);

        //echo $cat_info->layout; die();

        if ($cat_info->layout == 1 || $cat_info->layout == 3) {

            $product = DB::table('products')
                    ->join('brands', 'products.bid', '=', 'brands.id')
                    ->select('brands.*')
                    ->where('cid', $cid)
                    ->groupBy('brands.id')
                    ->get();

        } elseif ($cat_info->layout == 2) {
            $product = SubCategory::where('category_id',$cid)->get();
        } else {
            $product = DB::table('products')
                    ->join('brands', 'products.bid', '=', 'brands.id')
                    ->select('brands.*')
                    ->where('cid', $cid)
                    ->groupBy('brands.id')
                    ->get();
        }


        $product_info = Product::where('cid', $cid)->get();
        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('index-pages.category', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'seo' => $seo,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'cid' => $cid,
            'brn' => $brn,
            'cats' => $cats,
            'product' => $product,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function custombrandcategoryPage($cid=0,$layout_id=0,$bid=0, $name='') 
    {


        $language = Language::all();
        $currency = Currency::all();



        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$product = Product::all();
        //echo "<pre>";
        //print_r($product);
        //exit();

        $cat_info = category::find($cid);

        //echo $cat_info->layout; die();
        $filter=$this->GenaratePageDataFilter();
        if ($layout_id == 1) {
            
            $product = DB::table('products')
                    ->select('products.*')
                    ->where('products.cid', $cid)
                    ->where('products.bid', $bid)
                    ->where('products.scid', 0)
                    ->where('products.sscid', 0)
                    ->where('products.multi_product', 0)
                    ->when($filter, function($query) use ($filter){
                        if($filter=='id-desc'){ return $query->orderby('id','desc'); }
                        elseif($filter=='price:asc'){ return $query->orderby('price','asc'); }
                        elseif($filter=='price:desc'){ return $query->orderby('price','desc'); }
                        elseif($filter=='name:asc'){ return $query->orderby('name','asc'); }
                        elseif($filter=='name:desc'){ return $query->orderby('name','desc'); }
                        elseif($filter=='quantity:desc'){ return $query->orderby('quantity','desc'); }
                        elseif($filter=='position:asc'){ return $query->orderby('id','desc'); }
                        else{ return $query->orderby('id','desc'); }                    
                    })
                    ->paginate($this->GenaratePageDataLimit());

        }elseif ($layout_id == 2) {

            $cat_info=brand::find($bid);

            $product = DB::table('sub_categories')
                    ->select('sub_categories.*')
                    ->where('sub_categories.category_id', $cid)
                    ->WhereRaw("sub_categories.id IN (SELECT scid FROM products WHERE cid='".$cid."' AND bid='".$bid."')")
                    ->get();
        
        } elseif ($layout_id == 3) {
            $product = DB::table('sub_categories')
                    ->select('sub_categories.*')
                    ->where('sub_categories.category_id', $cid)
                    ->WhereRaw("sub_categories.id IN (SELECT scid FROM products WHERE cid='".$cid."' AND bid='".$bid."')")
                    ->get();
        }


/*        echo "<pre>";

        print_r($product);

        die();*/


        $product_info = Product::where('cid', $cid)->get();
        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('index-pages.categorycustombrand', [
            'language' => $language,
            'currency' => $currency,
            'scatname' => $name,
            'cussup' => $cs,
            'layout_id' => $layout_id,
            'bid' => $bid,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'seo' => $seo,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'cid' => $cid,
            'brn' => $brn,
            'cats' => $cats,
            'product' => $product,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    

    public function subcategoryPage($cid, $name) {

        $language = Language::all();
        $currency = Currency::all();



        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        $cat_info = SubCategory::find($cid);
        $product_info = Product::where('scid', $cid)->get();
        $sub_catinfo = DB::table('sub_categories as sc')
                ->join('categories as c', 'c.id', '=', 'sc.category_id')
                ->select(DB::raw('c.banner,c.description,sc.*'))
                ->where('sc.id', $cid)
                ->orderBy('sc.id', 'DESC')
                ->first();



        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('index-pages.subcategory', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'seo' => $seo,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            'product' => $product,
            'pagedata' => $sub_catinfo,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function catsubcategoryPage($cid = 0, $sub_cat_id = 0, $name = '', $sname = '') {

        $language = Language::all();
        $currency = Currency::all();

        if(!empty($sname))
        {
            $name .='/'.$sname;
        }

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        $cat_info = SubCategory::find($sub_cat_id);
        $filter=$this->GenaratePageDataFilter();
        $product_info = Product::where('scid', $sub_cat_id)
                        ->where('parent_product', '0')
                        ->when($filter, function($query) use ($filter){
                            if($filter=='id-desc'){ return $query->orderby('id','desc'); }
                            elseif($filter=='price:asc'){ return $query->orderby('price','asc'); }
                            elseif($filter=='price:desc'){ return $query->orderby('price','desc'); }
                            elseif($filter=='name:asc'){ return $query->orderby('name','asc'); }
                            elseif($filter=='name:desc'){ return $query->orderby('name','desc'); }
                            elseif($filter=='quantity:desc'){ return $query->orderby('quantity','desc'); }
                            elseif($filter=='position:asc'){ return $query->orderby('id','desc'); }
                            else{ return $query->orderby('id','desc'); }                    
                        })
                        ->paginate($this->GenaratePageDataLimit());

                        
        $sub_catinfo = DB::table('sub_categories as sc')
                ->leftjoin('categories as c', 'c.id', '=', 'sc.category_id')
                ->select(DB::raw('c.banner,c.description,sc.*'))
                ->where('sc.id', $sub_cat_id)
                ->orderBy('sc.id', 'DESC')
                ->first();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('index-pages.catsubcategory', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'product_info' => $product_info,
            'seo' => $seo,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            'product' => $product,
            'pagedata' => $sub_catinfo,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function CategorybrandPage($id, $cid, $name) {        
        $language = Language::all();
        $currency = Currency::all();


        $brand_info = Brand::find($id);
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$categoryInfo=Category::find($cid);
        $product = Product::where('bid', $id)->get();
        //$cat_info = SubCategory::find($cid);
        
        $categoryInfo=Category::find($cid);
       
        if($categoryInfo->layout==1)
        {
            $filter=$this->GenaratePageDataFilter();
            $product_info = DB::table('products')
                ->where('bid', $id)
                ->where('cid', $cid)
                ->where('parent_product', '0')
                ->where('scid', '0')
                ->where('sscid', '0')
                ->select('products.*')
                ->groupBy('products.id')
                ->when($filter, function($query) use ($filter){
                    if($filter=='id-desc'){ return $query->orderby('id','desc'); }
                    elseif($filter=='price:asc'){ return $query->orderby('price','asc'); }
                    elseif($filter=='price:desc'){ return $query->orderby('price','desc'); }
                    elseif($filter=='name:asc'){ return $query->orderby('name','asc'); }
                    elseif($filter=='name:desc'){ return $query->orderby('name','desc'); }
                    elseif($filter=='quantity:desc'){ return $query->orderby('quantity','desc'); }
                    elseif($filter=='position:asc'){ return $query->orderby('id','desc'); }
                    else{ return $query->orderby('id','desc'); }                    
                })
                ->paginate($this->GenaratePageDataLimit());
        }
        else
        {
            $product_info = DB::table('products')
                ->join('sub_categories', 'products.scid', '=', 'sub_categories.id')
                ->where('bid', $id)
                ->where('cid', $cid)
                ->select('sub_categories.*')
                ->groupBy('sub_categories.id')
                ->get();
        }
        
        

        //echo "<pre>";
        // print_r($product_info);
        //exit();

        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.brandPage', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'seo' => $seo,
            //'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'bid' => $id,
            'cid' => $cid,
            'cats' => $cats,
            'product' => $product,
            'categoryInfo' => $categoryInfo,
            'brand' => $brand_info,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }


    public function CategorybrandextraSubPage($cid, $bid, $sub_cid, $name) {        
        $language = Language::all();
        $currency = Currency::all();


        $brand_info = Brand::find($bid);
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$categoryInfo=Category::find($cid);
        $product = Product::where('bid', $bid)->get();
        //$cat_info = SubCategory::find($cid);
        
        $categoryInfo=Category::find($cid);
       
        
        $product_info = DB::table('sub_sub_categories')
                ->where('category_id', $cid)
                ->where('sub_category_id', $sub_cid)
                ->select('sub_sub_categories.*')
                ->get();
        
        

        //echo "<pre>";
        // print_r($product_info);
        //exit();

        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.catsubextraPage', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'seo' => $seo,
            'name' => $name,
            'sub_cid' => $sub_cid,
            'cat' => $cat,
            'brn' => $brn,
            'bid' => $bid,
            'cid' => $cid,
            'cats' => $cats,
            'product' => $product,
            'categoryInfo' => $categoryInfo,
            'brand' => $brand_info,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }
    
    public function CategorybrandSubPage($cid=0,$bid=0,$sub_cid=0,$name='') {

        $language = Language::all();
        $currency = Currency::all();


        $brand_info = Brand::find($bid);
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::where('bid', $bid)->get();

        $cat_info = SubCategory::find($sub_cid);

        $product_info=DB::table('sub_sub_categories')
                        ->where('category_id',$cid)
                        ->where('sub_category_id',$sub_cid)
                        ->get();

//        $product_info = DB::table('products')
//                ->join('sub_categories', 'products.scid', '=', 'sub_categories.id')
//                ->where('bid', $bid)
//                ->where('cid', $cid)
//                ->select('sub_categories.*')
//                ->groupBy('sub_categories.id')
//                ->get();

        //echo "<pre>";
        // print_r($product_info);
        //exit();

        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.brandsscatPage', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'seo' => $seo,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'bid' => $bid,
            'cid' => $cid,
            'sub_cid' => $sub_cid,
            'cats' => $cats,
            'product' => $product,
            'brand' => $brand_info,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function CategorybrandSubCategoryPage($cid, $bid, $id, $name) {

        

        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $cat_info = SubCategory::find($cid);

        $filter=$this->GenaratePageDataFilter();
        $product_info = DB::table('products')
                ->where('bid', $bid)
                ->where('cid', $cid)
                ->where('scid', $id)
                ->where('multi_product', 0)
                ->select('products.*')
                ->when($filter, function($query) use ($filter){
                    if($filter=='id-desc'){ return $query->orderby('id','desc'); }
                    elseif($filter=='price:asc'){ return $query->orderby('price','asc'); }
                    elseif($filter=='price:desc'){ return $query->orderby('price','desc'); }
                    elseif($filter=='name:asc'){ return $query->orderby('name','asc'); }
                    elseif($filter=='name:desc'){ return $query->orderby('name','desc'); }
                    elseif($filter=='quantity:desc'){ return $query->orderby('quantity','desc'); }
                    elseif($filter=='position:asc'){ return $query->orderby('id','desc'); }
                    else{ return $query->orderby('id','desc'); }                    
                })
                ->paginate($this->GenaratePageDataLimit());
        //@include('front-include.pagination') for view
                //$filter=$this->GenaratePageDataFilter();
        //$this->GenaratePageDataLimit() pagination param here     

        $sub_catinfo = DB::table('sub_categories as sc')
                ->join('categories as c', 'c.id', '=', 'sc.category_id')
                ->select(DB::raw('c.banner,c.description,sc.*'))
                ->where('sc.id', $id)
                ->take(1)
                ->get();

      
        $sqlSubcategory = DB::table('products')
                ->join('sub_categories', 'products.scid', '=', 'sub_categories.id')
                ->where('cid', $cid)
                ->where('bid', $bid)
                ->select('sub_categories.*')
                ->groupBy('sub_categories.id')
                ->get();

        
        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.subcategory', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'pagedata' => $sub_catinfo[0],
            'seo' => $seo,
            'cid' => $cid,
            'bid' => $bid,
            'scid' => $id,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            //'SubcategoryPaginate' => $sqlSubcategoryPaginate,
            'relSub' => $sqlSubcategory,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'scatname' => $name
        ]);
    }


    public function ProCategorybrandextrasubPage($cid, $bid, $sub_cid,$sub_sub_cid, $name) {

        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$product = Product::where('bid', $cid)->get();
        $cat_info = SubCategory::find($cid);

        $filter=$this->GenaratePageDataFilter();
        $product_info = DB::table('products')
                ->where('bid', $bid)
                ->where('cid', $cid)
                ->where('scid', $sub_cid)
                ->where('sscid', $sub_sub_cid)
                ->where('multi_product', 0)
                ->select('products.*')
                ->when($filter, function($query) use ($filter){
                    if($filter=='id-desc'){ return $query->orderby('id','desc'); }
                    elseif($filter=='price:asc'){ return $query->orderby('price','asc'); }
                    elseif($filter=='price:desc'){ return $query->orderby('price','desc'); }
                    elseif($filter=='name:asc'){ return $query->orderby('name','asc'); }
                    elseif($filter=='name:desc'){ return $query->orderby('name','desc'); }
                    elseif($filter=='quantity:desc'){ return $query->orderby('quantity','desc'); }
                    elseif($filter=='position:asc'){ return $query->orderby('id','desc'); }
                    else{ return $query->orderby('id','desc'); }                    
                })
                ->paginate($this->GenaratePageDataLimit());




        $sub_catinfo = DB::table('sub_categories as sc')
                ->join('categories as c', 'c.id', '=', 'sc.category_id')
                ->select(DB::raw('c.banner,c.description,sc.*'))
                ->where('sc.id', $sub_cid)
                ->take(1)
                ->get();

        //echo "<pre>";
        //print_r($sub_catinfo);
        //exit();

        $sqlSubcategory = DB::table('products')
                ->join('sub_categories', 'products.scid', '=', 'sub_categories.id')
                ->where('cid', $cid)
                ->where('bid', $bid)
                ->select('sub_categories.*')
                ->groupBy('sub_categories.id')
                ->get();

        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.subsubextraallProduct', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'pagedata' => $sub_catinfo[0],
            'seo' => $seo,
            'cid' => $cid,
            'bid' => $bid,
            'scid' => $sub_cid,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            'relSub' => $sqlSubcategory,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'scatname' => $name
        ]);
    }

    public function productSubcategorycustombrandSubcategoryPage($cid=0,$layout_id=0,$bid=0,$subcid=0,$name='')
    {
        $language = Language::all();
        $currency = Currency::all();


        $brand_info = Brand::find($bid);
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$categoryInfo=Category::find($cid);
        $product = Product::where('bid', $bid)->get();
        //$cat_info = SubCategory::find($cid);
        
        $categoryInfo=Category::find($cid);
       
        
        $product_info = DB::table('sub_sub_categories')
                ->where('category_id', $cid)
                ->where('sub_category_id', $subcid)
                ->select('sub_sub_categories.*')
                ->get();
        
        

        //echo "<pre>";
        // print_r($product_info);
        //exit();

        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.catsubextraPage', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'seo' => $seo,
            'name' => $name,
            'sub_cid' => $subcid,
            'cat' => $cat,
            'brn' => $brn,
            'bid' => $bid,
            'cid' => $cid,
            'cats' => $cats,
            'product' => $product,
            'categoryInfo' => $categoryInfo,
            'brand' => $brand_info,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function ProCategorybrandPage($cid=0, $bid=0, $name='') {

        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$product = Product::where('bid', $cid)->get();
        $cat_info = SubCategory::find($sub_id);
        $product_info = DB::table('products')
                ->where('bid', $bid)
                ->where('cid', $cid)
                ->where('scid', $sub_id)
                ->where('multi_product', 0)
                ->select('products.*')
                ->get();

        $sub_catinfo = DB::table('sub_categories as sc')
                ->join('categories as c', 'c.id', '=', 'sc.category_id')
                ->select(DB::raw('c.banner,c.description,sc.*'))
                ->where('sc.id', $sub_id)
                ->take(1)
                ->get();

        //echo "<pre>";
        //print_r($sub_catinfo);
        //exit();

        $sqlSubcategory = DB::table('products')
                ->join('sub_categories', 'products.scid', '=', 'sub_categories.id')
                ->where('cid', $cid)
                ->where('bid', $bid)
                ->select('sub_categories.*')
                ->groupBy('sub_categories.id')
                ->get();

        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.subcategory', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'pagedata' => $sub_catinfo[0],
            'seo' => $seo,
            'cid' => $cid,
            'bid' => $bid,
            'scid' => $sub_id,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            //'product' => $product,
            'relSub' => $sqlSubcategory,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'scatname' =>$cat_info->name
        ]);
    }
    
    public function CategorybrandSubSubCategoryPage($cid=0, $bid=0, $sub_id=0, $sub_sub_id=0, $name='') 
    {



        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$product = Product::where('bid', $cid)->get();
        $cat_info = SubCategory::find($cid);
        $product_info = DB::table('products')
                ->where('bid', $bid)
                ->where('cid', $cid)
                ->where('scid', $sub_id)
                ->where('sscid', $sub_sub_id)
                ->where('multi_product', 0)
                ->select('products.*')
                ->get();

        $sub_catinfo = DB::table('sub_categories as sc')
                ->join('categories as c', 'c.id', '=', 'sc.category_id')
                ->select(DB::raw('c.banner,c.description,sc.*'))
                ->where('sc.id', $sub_id)
                ->take(1)
                ->get();

        //echo "<pre>";
        //print_r($sub_catinfo);
        //exit();

        $sqlSubcategory = DB::table('products')
                ->join('sub_categories', 'products.scid', '=', 'sub_categories.id')
                ->where('cid', $cid)
                ->where('bid', $bid)
                ->select('sub_categories.*')
                ->groupBy('sub_categories.id')
                ->get();

        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);


        return view('index-pages.subcategory', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'pagedata' => $sub_catinfo[0],
            'seo' => $seo,
            'cid' => $cid,
            'bid' => $bid,
            'scid' => $sub_id,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            //'product' => $product,
            'relSub' => $sqlSubcategory,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'scatname' => $name
        ]);
    }
    
    public function productSubcategorycustombrandcategoryPage($cid=0,$layout_id=0,$bid=0, $sub_id=0) {

        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$product = Product::where('bid', $cid)->get();
        $cat_info = SubCategory::find($sub_id);
        $product_info = DB::table('products')
                ->where('bid', $bid)
                ->where('cid', $cid)
                ->where('scid', $sub_id)
                ->where('multi_product', 0)
                ->select('products.*')
                ->get();

        $sub_catinfo = DB::table('sub_categories as sc')
                ->join('categories as c', 'c.id', '=', 'sc.category_id')
                ->select(DB::raw('c.banner,c.description,sc.*'))
                ->where('sc.id', $sub_id)
                ->take(1)
                ->get();

        //echo "<pre>";
        //print_r($sub_catinfo);
        //exit();

        $sqlSubcategory = DB::table('products')
                ->join('sub_categories', 'products.scid', '=', 'sub_categories.id')
                ->where('cid', $cid)
                ->where('bid', $bid)
                ->select('sub_categories.*')
                ->groupBy('sub_categories.id')
                ->get();

        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.subcategory', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'pagedata' => $sub_catinfo[0],
            'seo' => $seo,
            'cid' => $cid,
            'bid' => $bid,
            'scid' => $sub_id,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            //'product' => $product,
            'relSub' => $sqlSubcategory,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'scatname' =>$cat_info->name
        ]);
    }

    public function brandPage($cid, $name) {

        $language = Language::all();
        $currency = Currency::all();


        $brand_info = Brand::find($cid);
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::where('bid', $cid)->get();
        $cat_info = SubCategory::find($cid);
        $product_info = Product::where('bid', $cid)->get();

        if (empty($product_info)) {
            $product_info = array();
        }

        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.brandPage', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'product_info' => $product_info,
            'seo' => $seo,
            'cat_info' => $cat_info,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            'product' => $product,
            'brand' => $brand_info,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function completeCheckout($status, $token) {

        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->ClearCart();
        Session::put('cart', null);
        $orderdetail = Orders::where('tracking', $token)->get();
        $oid = $orderdetail[0]->id;
        if ($status == "success") {
            $messagesum = "Your Order is complete, Please wait for admin approval.";

            $message = '<div class="alert alert-success" id="create_account_error"> Your order is complete & Your order-id is : ' . $oid . ', please keep it for further query. </div>';


            //mail
        } elseif ($status == "failed") {
            $messagesum = "Your Order isn't complete, Please place your order again.";
            $message = '<div class="alert alert-danger" id="create_account_error"> Your order is failed to save please try again. </div>';
        } else {
            $messagesum = "Your order is pending for admin approval.";
            $message = '<div class="alert alert-success" id="create_account_error"> Your order is pending for admin approval. </div>';
        }


        // print_r($orderdetail);
        //exit();
        return view('index-pages.complete-cart', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'cat' => $cat,
            'cats' => $cats,
            'product' => $product,
            'messsum' => $messagesum,
            'oid' => $oid,
            'message' => $message,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function proceedPayment(Request $request, $reur) {
        $user = User::find(Auth::user()->id);
        $customer = Customer::where('email', $user->email)->get();
        $chkcustomer = count($customer);


        $uniqueOID = $request->uniqueOID;
        //exit();


        if (empty($chkcustomer)) {
            $cus = new Customer;
            $cus->name = $user->name;
            $cus->email = $user->email;
            $cus->password = $user->password;
            $cus->save();
            $customer_id = $cus->id;
            $customer_email = $user->email;
            $customer_name = $user->name;
        } else {
            $customer_id = $customer[0]->id;
            $customer_email = $customer[0]->email;
            $customer_name = $customer[0]->name;
        }


        $address_2 = $request->address_2 ? $request->address_2 : 'Not Mention';
        $company = $request->company ? $request->company : 'Not Mention';
        $last_name = $request->last_name ? $request->last_name : 'Not Mention';
        $address = $request->address ? $request->address : 'Not Mention';
        $state = $request->state ? $request->state : '0';
        $country = $request->country ? $request->country : '0';
        $additional_info = $request->additional_info ? $request->additional_info : 'Not Mention';
        $home_phone = $request->home_phone ? $request->home_phone : 'Not Mention';
        $zip_code = $request->zip_code ? $request->zip_code : 'Not Mention';
        $city = $request->city ? $request->city : 'Not Mention';
        $state = $request->state ? $request->state : '0';

        $delivery = new DeliveryAddress;
        $delivery->customer_id = $customer_id;
        $delivery->token = $uniqueOID;
        $delivery->first_name = $request->first_name;
        $delivery->last_name = $last_name;
        $delivery->company = $company;
        $delivery->address = $request->address;
        $delivery->address_2 = $address_2;
        $delivery->city = $city;
        $delivery->state = $state;
        $delivery->zip_code = $zip_code;
        $delivery->country = $country;
        $delivery->additional_info = $additional_info;
        $delivery->home_phone = $home_phone;
        $delivery->mobile_phone = $request->mobile_phone;
        $delivery->save();




        $order = new Orders;
        $order->tracking = $uniqueOID;
        $order->cart = $uniqueOID;
        $order->cid = Auth::user()->id;
        $order->invoice_date = date('Y-m-d');
        $order->due_date = date('Y-m-d');
        $order->order_status = "Pending";
        $order->save();

        $order_id = $order->id;

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        //print_r($cart->items);
        //exit();
//        $empt=[];
//        foreach($cart->items as $ite):
//            $empt[]=$ite;
//        endforeach;

        $loop = count($cart->items);
        $i = 0;
        $totalOrderAmount = 0;
        foreach ($cart->items as $crt):
            $price = $crt['item']->price;
            $pid = $crt['item']->id;
            $rowtotal = $crt['price'];
            $quantity = $crt['qty'];
            $orderitem = new OrdersItem();
            $orderitem->order_id = $order_id;
            $orderitem->pid = $pid;
            if (isset($crt['unit'])) {
                $orderitem->unit = $crt['unit'] . " " . $crt['unit_name'];
            }

            if (isset($crt['color'])) {
                $orderitem->color = $crt['color'];
            }
            $orderitem->tracking = $uniqueOID;
            $orderitem->quantity = $quantity;
            $orderitem->unit_price = $price;
            $orderitem->row_total = $rowtotal;
            $orderitem->save();
            $totalOrderAmount += $rowtotal;
        endforeach;

        $deliveryshipp = new OrderDeliveryMethod;
        $deliveryshipp->token = $uniqueOID;
        $deliveryshipp->shipping_id = $request->delivery_option;
        $deliveryshipp->order_id = $order_id;
        $deliveryshipp->save();

        $orderpm = new OrderPaymentMethod;
        $orderpm->token = $uniqueOID;
        $orderpm->payment_method_id = $request->pm_option;
        $orderpm->order_id = $order_id;
        $orderpm->save();

        $sqlPaymentMenthod = PaymentMethod::find($request->pm_option);
        $pmName = $sqlPaymentMenthod->name;

        $sqlShipping = Shipping::find($request->delivery_option);
        $shipName = $sqlShipping->name;

        $mail = new EmailController();
        $subject = "New Order in HIChoce";
//        $htmlBody="Order Detail";
//        $htmlBody .="nextt dfdsf";
        $fullName = $request->first_name . ' ' . $last_name;
        $Address = $request->address;
        $Phone = $request->mobile_phone;
        if (!empty($home_phone)) {
            $Phone .= ', ' . $home_phone;
        }
        $htmlBody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
                        <html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
                        <head>
                          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
                          <meta name="viewport" content="width=device-width">
                        </head>
                        <body style="-moz-box-sizing:border-box;-ms-text-size-adjust:100%;-webkit-box-sizing:border-box;-webkit-text-size-adjust:100%;box-sizing:border-box;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;min-width:100%;padding:0;text-align:left;width:100%!important; background-color: #ededed; padding-top:40px; padding-bottom:40px;">

     
                                  <table align="center" class="container booking-confirmation-payment" style="background:#fff;border-collapse:collapse;border-spacing:0;margin:0 auto;Margin:0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px;">
                                    <tbody>
                                      <tr style="padding:0;text-align:left;vertical-align:top">
                                        <td style="-moz-hyphens:none;-webkit-hyphens:none;border-collapse:collapse!important;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;hyphens:none;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left;vertical-align:top;word-break:normal;word-wrap:normal">
                                          <table class="row booking-confirmation-header" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-12 large-12 columns first last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:8px;padding-left:16px;padding-right:16px;padding-top:20px;text-align:left;width:564px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <h2 style="color:#000;font-family:Helvetica,Arial,sans-serif;font-size:18px;font-weight:700;letter-spacing:-.03px;line-height:20px;margin:0;Margin:0;margin-bottom:8px;Margin-bottom:8px;padding:0;text-align:left;word-wrap:normal">Order Information</h2>
                                                      </th>
                                                      <th class="expander" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-7 large-7 columns first" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:8px;text-align:left;width:322.33px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:left">Transaction ID:</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                                <th class="small-5 large-5 columns last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:8px;padding-right:50px;text-align:left;width:225.67px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="text-right" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:right">' . $uniqueOID . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-6 large-6 columns first" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:8px;text-align:left;width:274px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:left">Transaction Date:</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                                <th class="small-6 large-6 columns last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:8px;padding-right:50px;text-align:left;width:274px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="text-right" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:right">' . date('d M Y g:i:s') . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-7 large-7 columns first" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:8px;text-align:left;width:322.33px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:left">Payment Method:</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                                <th class="small-5 large-5 columns last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:8px;padding-right:50px;text-align:left;width:225.67px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="text-right" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:right">' . $pmName . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-7 large-7 columns first" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:8px;text-align:left;width:322.33px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:left">Delivery Method:</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                                <th class="small-5 large-5 columns last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:8px;padding-right:50px;text-align:left;width:225.67px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="text-right" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:right"> ' . $shipName . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-12 large-12 columns first last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:50px;text-align:left;width:564px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <h3 style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:700;letter-spacing:-.03px;line-height:1.3;margin:0;Margin:0;margin-bottom:8px;Margin-bottom:8px;margin-top:8px;Margin-top:8px;padding:0;text-align:left;word-wrap:normal">Customer Info</h3>
                                                      </th>
                                                      <th class="expander" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-7 large-7 columns first" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:8px;text-align:left;width:322.33px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:left">Name :</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                                <th class="small-5 large-5 columns last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:8px;padding-right:50px;text-align:left;width:225.67px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="text-right" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:right">' . $fullName . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-7 large-7 columns first" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:8px;text-align:left;width:322.33px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:left">Address :</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                                <th class="small-5 large-5 columns last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:8px;padding-right:50px;text-align:left;width:225.67px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="text-right" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:right">' . $Address . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-7 large-7 columns first" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:8px;text-align:left;width:322.33px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:left">Phone :</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                                <th class="small-5 large-5 columns last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:8px;padding-right:50px;text-align:left;width:225.67px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="text-right" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:right">' . $Phone . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-12 large-12 columns first last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:50px;text-align:left;width:564px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <h3 style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:700;letter-spacing:-.03px;line-height:1.3;margin:0;Margin:0;margin-bottom:8px;Margin-bottom:8px;margin-top:8px;Margin-top:8px;padding:0;text-align:left;word-wrap:normal">Order details</h3>
                                                      </th>
                                                      <th class="expander" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>';

        foreach ($cart->items as $crt):
            $price = $crt['item']->price;
            $pid = $crt['item']->id;
            $rowtotal = $crt['price'];
            $quantity = $crt['qty'];
            $itemNameSql = Product::find($pid);
            $itemName = $itemNameSql->name;

            $htmlBody .= '<table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              
                                                <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-12 large-12 columns first last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:50px;text-align:left;width:564px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <h5 style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;letter-spacing:-.03px;line-height:1.3;margin:0;Margin:0;margin-bottom:8px;Margin-bottom:8px;padding:0;text-align:left;word-wrap:normal">' . $itemName . '</h5>
                                                      </th>
                                                      <th class="expander" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                              
                                            </tbody>
                                          </table>';



            $htmlBody .= '<table class="row booking-confirmation-fare" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-7 large-7 columns first" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:8px;text-align:left;width:322.33px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:left">' . $quantity . ' x ' . $price . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                                <th class="small-5 large-5 columns last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:8px;padding-right:50px;text-align:left;width:225.67px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="text-right" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:right"> = &#163;' . $rowtotal . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>';
        endforeach;
        $htmlBody .= '<table class="spacer" style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <td height="16px" style="-moz-hyphens:none;-webkit-hyphens:none;border-collapse:collapse!important;color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:16px;font-weight:400;hyphens:none;line-height:16px;margin:0;Margin:0;padding:0;text-align:left;vertical-align:top;word-break:normal;word-wrap:normal">&#xA0;</td>
                                              </tr>
                                            </tbody>
                                          </table>
                                          
                                          <table class="row" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-7 large-7 columns first" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:50px;padding-right:8px;text-align:left;width:322.33px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="booking-confirmation-total" style="color:#000;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:700;line-height:1.3;margin:0;Margin:0;margin-bottom:16px;Margin-bottom:16px;margin-top:16px;Margin-top:16px;padding:0;text-align:left">Total amount:</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                                <th class="small-5 large-5 columns last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:8px;padding-right:50px;text-align:left;width:225.67px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="booking-confirmation-total text-right" style="color:#000;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:700;line-height:1.3;margin:0;Margin:0;margin-bottom:16px;Margin-bottom:16px;margin-top:16px;Margin-top:16px;padding:0;text-align:right">&#163;' . $totalOrderAmount . '</p>
                                                      </th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                          <table class="row booking-confirmation-vat" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="padding:0;text-align:left;vertical-align:top">
                                                <th class="small-12 large-12 columns first last" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:16px;padding-right:16px;text-align:left;width:564px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="padding:0;text-align:left;vertical-align:top">
                                                      <th style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left">
                                                        <p class="text-center unlink" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;margin-bottom:4px;Margin-bottom:4px;padding:0;text-align:center"><small style="color:#6e6e6e;font-size:12px">* Costs inclusive of VAT at 0%<br>VAT number 791 7261 08</small>
                                                        </p>
                                                      </th>
                                                      <th class="expander" style="color:#4d4d4d;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;line-height:1.3;margin:0;Margin:0;padding:0!important;text-align:left;visibility:hidden;width:0"></th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>
                                        </td>
                                      </tr>
                                    </tbody>
                                  </table>
                                  <table align="center" class="container help-section" style="background:#fff;border-collapse:collapse;border-spacing:0;margin:0 auto;Margin:0 auto;padding:0;text-align:inherit;vertical-align:top;width:580px">
                                    <tbody>
                                      <tr style="padding:0;text-align:left;vertical-align:top">
                                        <td style="-moz-hyphens:none;-webkit-hyphens:none;border-collapse:collapse!important;color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:14px;font-weight:400;hyphens:none;line-height:1.3;margin:0;Margin:0;padding:0;text-align:left;vertical-align:top;word-break:normal;word-wrap:normal">
                                          <table class="row smallhr" style="border-collapse:collapse;border-spacing:0;display:table;padding:0;position:relative;text-align:left;vertical-align:top;width:100%">
                                            <tbody>
                                              <tr style="font-size:6px;line-height:6px;padding:0;padding-bottom:0;text-align:left;vertical-align:top">
                                                <th class="small-12 large-12 columns first last" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:6px;font-weight:400;line-height:6px;margin:0 auto;Margin:0 auto;padding:0;padding-bottom:0;padding-left:16px;padding-right:16px;text-align:left;width:564px">
                                                  <table style="border-collapse:collapse;border-spacing:0;padding:0;text-align:left;vertical-align:top;width:100%">
                                                    <tr style="font-size:6px;line-height:6px;padding:0;padding-bottom:0;text-align:left;vertical-align:top">
                                                      <th style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:6px;font-weight:400;line-height:6px;margin:0;Margin:0;padding:0;padding-bottom:0;text-align:left">
                                                        <div class="hr" style="background:#dbdbdb;border-radius:6px;font-size:6px;line-height:6px;margin:20px auto;Margin:20px auto;margin-bottom:16px;Margin-bottom:16px;margin-top:16px;Margin-top:16px">&nbsp;</div>
                                                      </th>
                                                      <th class="expander" style="color:#6e6e6e;font-family:Helvetica,Arial,sans-serif;font-size:6px;font-weight:400;line-height:6px;margin:0;Margin:0;padding:0!important;padding-bottom:0;text-align:left;visibility:hidden;width:0"></th>
                                                    </tr>
                                                  </table>
                                                </th>
                                              </tr>
                                            </tbody>
                                          </table>


                          <!-- prevent Gmail on iOS font size manipulation -->
                          <div style="display:none;white-space:nowrap;font:15px courier;line-height:0; margin-bottom:20px;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
                         
                            </body>

                        </html>';
        $mail->sendEmail($subject, $htmlBody, $customer_email, $customer_name);
        //exit();
        //$retarray=array('status'=>1,'token'=>$request->_token);

        return 1;
    }

    public function productPage($pid, $name) {
        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();


        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        //$product = Product::find($pid);
        //echo $pid;
        //exit();
        $product = DB::table('products')
                ->Leftjoin('categories as c', 'c.id', '=', 'products.cid')
                ->Leftjoin('sub_categories as sc', 'sc.id', '=', 'products.scid')
                ->Leftjoin('product_unit_types as put', 'put.id', '=', 'products.product_unit_type_id')
                ->select('products.*', 'c.name as cat_name', 'sc.name as scat_name', 'put.name as put_name')
                ->where('products.id', '=', $pid)
                ->get();

        $productCategoryInfo = array();
        if (isset($product)) {
            $cidProduct = $product[0]->cid;
            $productCategoryInfo = Category::find($cidProduct);
        }

        $proRelatedUnitProductCount = DB::table('products')->where('parent_product', $pid)->count();
        $proRelatedUnitProduct = array();
        if (isset($product[0]->unit) && empty($product[0]->parent_product)) {

            $proRelatedUnitProduct = DB::table('products')->where('parent_product', $pid)->get();
        }

        $brandProInfo = Brand::find($product[0]->bid);

        //dd($brandProInfo);
        //exit();
        //dd($product);
        if (count($product) == 0) {
            return redirect(url('home'))->with('status', 'Invalid Product Request.');
        }
        $product_unit = array();
        if ($product[0]->isunit == 1) {
            $product_unit = explode(",", $product[0]->unit);
        }

        $colorData = array();
        if ($product[0]->iscolor == 1) {
            $colorData = DB::table('color_in_products')
                    ->join('product_colors', 'color_in_products.color_id', '=', 'product_colors.id')
                    ->select('product_colors.id', 'product_colors.name')
                    ->where('color_in_products.pid', $pid)
                    ->groupby('color_in_products.color_id')
                    ->get();
        }



        $cat_info = category::find($product[0]->cid);
        $related_info = Product::where('cid', $product[0]->cid)->limit(20)->get();
        $topseller = DB::table('orders_items as oi')
                ->join('products as p', 'p.id', '=', 'oi.pid')
                ->select(DB::raw('count(oi.id) as total,oi.pid,p.*'))
                ->groupby('oi.pid')
                ->orderby(DB::raw('count(oi.id)'))
                ->take(3)
                ->get();

        $productreview = DB::table('product_reviews as pr')
                ->select('pr.*')
                ->where('pr.product_id', $pid)
                ->take(10)
                ->get();

        //print_r($productreview);
        //exit();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('index-pages.product', ['productreview' => $productreview,
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'topseller' => $topseller,
            'related' => $related_info,
            'cat_info' => $cat_info,
            'product' => $product[0],
            'seo' => $seo,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'product_unit' => $product_unit,
            'proRelatedUnitProduct' => $proRelatedUnitProduct,
            'brandProInfo' => $brandProInfo,
            'productCategoryInfo' => $productCategoryInfo,
            'multi_product' =>$proRelatedUnitProductCount,
            'color' => $colorData]);
    }

    public function savereview(Request $request, $id, $reur) {

        $pr = new ProductReview;
        $pr->product_id = $id;
        $pr->rating = $request->rat;
        $pr->title = $request->title;
        $pr->comment = $request->content;
        $pr->customer_name = $request->customer_name;
        $pr->save();

        return redirect(url(base64_decode($reur)));
    }

    public function SubMenu($id) {
        return $id;
    }

    public function loginuser() {
        $language = Language::all();
        $currency = Currency::all();



        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $seo = Seo::all();
        $brn = Brand::all();
        //print_r($seo);
        //exit();



        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

//        if (!Session::has('cart')) {
//            return view('index-pages.shopping-cart');
//        }

        if (empty($seo)) {
            $seo = array();
        }
        //echo "<pre>";
        //print_r($cart->items);
        //exit();
        return view('index-pages.login', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'brn' => $brn,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'seo' => $seo,
            'cat' => $cat,
            'cats' => $cats
        ]);
    }

    public function termsncondition() {
        $language = Language::all();
        $currency = Currency::all();



        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $seo = Seo::all();
        $brn = Brand::all();

        //print_r($seo);
        //exit();



        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

//        if (!Session::has('cart')) {
//            return view('index-pages.shopping-cart');
//        }

        if (empty($seo)) {
            $seo = array();
        }
        //echo "<pre>";
        //print_r($cart->items);
        //exit();
        return view('index-pages.termsncondition', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'brn' => $brn,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'seo' => $seo,
            'cat' => $cat,
            'cats' => $cats
        ]);
    }

    public function wishList() {
        $language = Language::all();
        $currency = Currency::all();



        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $seo = Seo::all();
        $brn = Brand::all();
        $productInfo = Product::all();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        if (empty($seo)) {
            $seo = array();
        }

        return view('index-pages.wishlist', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'brn' => $brn,
            'product_info' => $productInfo,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'seo' => $seo,
            'cat' => $cat,
            'cats' => $cats
        ]);
    }

    public function viewSignUp() {
        $language = Language::all();
        $currency = Currency::all();



        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        $cat = category::take(2)->get();
        $cats = category::all();
        $seo = Seo::all();
        $brn = Brand::all();
        //print_r($seo);
        //exit();



        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

//        if (!Session::has('cart')) {
//            return view('index-pages.shopping-cart');
//        }
        //echo "<pre>";
        //print_r($cart->items);
        //exit();
        return view('index-pages.signup', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'brn' => $brn,
            'product' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice,
            'seo' => $seo,
            'cat' => $cat,
            'cats' => $cats
        ]);
    }

    public function userDashboard() {

        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        if (!Auth::id()) {
            return redirect(url('user-login'));
        }
        $custo = Customer::where('email', Auth::user()->email)->get();
        $order = Orders::where('cid', Auth::id())->groupby('tracking')->get();
        //echo Auth::id();
        //exit();

        $orderpening = Orders::where('cid', Auth::id())
                ->where('order_status', 'Pending')
                ->groupby('tracking')
                ->get();

        $ordercancel = Orders::where('cid', Auth::id())
                ->where('order_status', 'Cancel')
                //->groupby('tracking')
                ->get();

        $orderpaid = Orders::where('cid', Auth::id())
                ->where('order_status', 'Paid')
                //->groupby('tracking')
                ->get();


        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('index-pages.user-dashboard', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'cat' => $cat,
            'cats' => $cats,
            'product' => $product,
            'orders' => $order,
            'orderspending' => $orderpening,
            'orderscancel' => $ordercancel,
            'orderspaid' => $orderpaid,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function userProfile() {

        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        if (!Auth::id()) {
            return redirect(url('user-login'));
        }
        $custo = Customer::where('email', Auth::user()->email)->get();
        $order = Orders::where('cid', Auth::id())->groupby('tracking')->get();
        //echo Auth::id();
        //exit();

        $orderpening = Orders::where('cid', Auth::id())
                ->where('order_status', 'Pending')
                ->groupby('tracking')
                ->get();

        $ordercancel = Orders::where('cid', Auth::id())
                ->where('order_status', 'Cancel')
                //->groupby('tracking')
                ->get();

        $orderpaid = Orders::where('cid', Auth::id())
                ->where('order_status', 'Paid')
                //->groupby('tracking')
                ->get();


        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);

        return view('index-pages.user-profile-view', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'cat' => $cat,
            'cats' => $cats,
            'product' => $product,
            'orders' => $order,
            'orderspending' => $orderpening,
            'orderscancel' => $ordercancel,
            'orderspaid' => $orderpaid,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function userProfileSave(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
        ]);

        if (!empty($request->password)) {
            $sql = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);
        } else {
            $sql = DB::table('users')
                    ->where('id', Auth::user()->id)
                    ->update([
                'name' => $request->name,
                'email' => $request->email
            ]);
        }

        return redirect()->action("IndexController@userProfile")->with('status', 'Profile info Modified successfully!');
    }

    public function OrdersDetail($tracking = 0) {

        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();

        $auth_id = Auth::id();
        $order = Orders::where('cid', $auth_id)->where('tracking', $tracking)->groupby('tracking')->get();
        $orderDetail = DB::table('orders_items')
                ->leftjoin('products', 'products.id', '=', 'orders_items.pid')
                ->select('orders_items.*', DB::raw('products.name as product_name'))
                ->where('tracking', $tracking)
                ->get();
        $contactDetail = ContactDetail::all();
//        echo "<pre>";
//        print_r($orderDetail);
//        exit();

        $custo = Customer::where('email', Auth::user()->email)->get();
//        $orderpening=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Pending')
//                            ->get();
//        $ordercancel=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Cancel')
//                            ->get();
//        $orderpaid=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Paid')
//                            ->get();
        //print_r($orderdetail);
        //exit();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.order-detail', [
            'orderdetail' => $orderDetail,
            'custo' => $custo,
            'contactdetail' => $contactDetail,
            'tracking' => $tracking,
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'cat' => $cat,
            'cats' => $cats,
            'product' => $product,
            'orders' => $order,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function totalUserOrders() {

        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        $custo = Customer::where('email', Auth::user()->email)->get();
        $auth_id = Auth::id();
        $order = Orders::where('cid', $auth_id)->OrderBy('id', 'DESC')->groupby('tracking')->get();

//        $orderpening=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Pending')
//                            ->get();
//        $ordercancel=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Cancel')
//                            ->get();
//        $orderpaid=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Paid')
//                            ->get();
        //print_r($orderdetail);
        //exit();

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.user-total-orders', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'cat' => $cat,
            'cats' => $cats,
            'product' => $product,
            'orders' => $order,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function pendingUserOrders() {

        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        $custo = Customer::where('email', Auth::user()->email)->get();
        //$order=Orders::where('cid',$custo[0]->id)->get();
        $auth_id = Auth::id();
        $order = Orders::where('cid', $auth_id)
                ->where('order_status', 'Pending')
                ->OrderBy('id', 'DESC')
                ->groupby('tracking')
                ->get();
//        $ordercancel=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Cancel')
//                            ->get();
//        $orderpaid=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Paid')
//                            ->get();
        //print_r($orderdetail);
        //exit();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.user-pending-orders', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'cat' => $cat,
            'cats' => $cats,
            'product' => $product,
            'orders' => $order,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function cancelUserOrders() {

        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        $custo = Customer::where('email', Auth::user()->email)->get();
        //$order=Orders::where('cid',$custo[0]->id)->get();
        $auth_id = Auth::id();
//        $order=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Pending')
//                            ->get();
        $order = Orders::where('cid', $auth_id)
                ->where('order_status', 'Cancel')
                ->OrderBy('id', 'DESC')
                ->groupby('tracking')
                ->get();
//        $orderpaid=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Paid')
//                            ->get();
        //print_r($orderdetail);
        //exit();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.user-cancel-orders', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'cat' => $cat,
            'cats' => $cats,
            'product' => $product,
            'orders' => $order,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function paidUserOrders() {

        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        $custo = Customer::where('email', Auth::user()->email)->get();
        //$order=Orders::where('cid',$custo[0]->id)->get();
//        $order=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Pending')
//                            ->get();
//        $order=Orders::where('cid',$custo[0]->id)
//                            ->where('order_status','Cancel')
//                            ->get();
        $auth_id = Auth::id();
        $order = Orders::where('cid', $auth_id)
                ->where('order_status', 'Paid')
                ->OrderBy('id', 'DESC')
                ->groupby('tracking')
                ->get();



        //print_r($orderdetail);
        //exit();
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('index-pages.user-paid-orders', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'cat' => $cat,
            'cats' => $cats,
            'product' => $product,
            'orders' => $order,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }
    

}

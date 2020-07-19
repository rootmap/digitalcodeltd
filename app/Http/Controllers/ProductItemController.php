<?php

namespace App\Http\Controllers;
use App\category;
use App\ProductItem;
use App\PizzaSize;
use App\PizzaFlabour;
use App\ProductOneSubLevel;
use App\ProductTwoSubLevel;
use App\Product;
use App\PaypalSetting;
use App\Discount;
use App\Tax;
use App\SubCategory;
use Session;
use App\Cart;
use App\Customer;
use App\DeliveryAddress;
use App\OrderInfo;
use Auth;
use App\Orders;
use App\OrdersItem;
use App\DeliveryCost;
use Illuminate\Http\Request;

//paypal lib
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
//paypal lib 
use App\WelcomeContent;
use App\InclusiveMeal;

class ProductItemController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $moduleName="Sales";
    private $sdc;
    private $_api_content;
    public function __construct(){ 
        //$paypal_conf['client_id']
        //$paypal_conf['secret']
        $this->sdc = new MenuPageController(); 
        $paypal_conf=\Config::get('paypal');
        $this->_api_content=new ApiContext(new OAuthTokenCredential(
            $this->sdc->paypal_client_id,
            $this->sdc->paypal_secret
        ));

        $this->_api_content->setConfig($paypal_conf['settings']);

        date_default_timezone_set("Europe/London");
        
    }

    public function index()
    {

        $tab=WelcomeContent::find(1);
        if($tab->collection_only==1){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->addRec("Collect");
        }
        

        $category=$this->categoryProduct();
        //$product=Product::all();
        $defultReturn=['category'=>$category];

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





        $orderINfo=OrderInfo::orderBy('id','DESC')->first();
        $defultReturn=array_merge($defultReturn,['orderINfoText'=>$orderINfo,'tab'=>$tab]);
        //dd($defultReturn);
        $inclusiveMeal=InclusiveMeal::where('isactive',1)->get();
        $defultReturn=array_merge($defultReturn,['inclusiveMeal'=>$inclusiveMeal]);



        return view('frontend.pages.product.index',$defultReturn);
    }

    public function inclusiveMeal(Request $request)
    {
        $tab=WelcomeContent::find(1);
        if($tab->collection_only==1){
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->addRec("Collect");
        }
        

        $category=$this->categoryProduct();
        //$product=Product::all();
        $defultReturn=['category'=>$category];

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


        $inclusiveMeal=InclusiveMeal::where('isactive',1)->get();
        $defultReturn=array_merge($defultReturn,['inclusiveMeal'=>$inclusiveMeal]);
        
        $orderINfo=OrderInfo::orderBy('id','DESC')->first();
        $defultReturn=array_merge($defultReturn,['orderINfoText'=>$orderINfo,'tab'=>$tab]);
        //dd($defultReturn);



        return view('frontend.pages.product.inclusivemeal',$defultReturn);
    }

    public function makePayment(Request $request)
    {

         $orderINfo=OrderInfo::orderBy('id','DESC')->first();
        //dd($orderINfo->isoffline);
        if($orderINfo->isoffline==1)
        {
            return redirect(url('order-item'))->with('error',strip_tags(htmlspecialchars_decode($orderINfo->offline_notice)));
        }
        $cart = Session::has('cart') ? Session::get('cart') : null;
        
       //dd($cart->deliveryDetail);

        $defultReturn=['cart'=>$cart];



        if($this->checkCommonDiscount())
        {
            $defultReturn=array_merge($defultReturn,['common'=>$this->checkCommonDiscount()]);
        }

        $defRec=$cart->rec;
        if($cart->rec=="Collect")
        {
            $defRec='Collection';
        }

        if($this->checkColNDelDiscount($defRec))
        {
            $defultReturn=array_merge($defultReturn,['colndel'=>$this->checkColNDelDiscount($defRec)]);
        }        

        if($this->checkTax())
        {
            $defultReturn=array_merge($defultReturn,['tax'=>$this->checkTax()]);
        }

        //Collection
        //dd($cart->totalPrice);
        $totalPrice=$defultReturn['cart']->totalPrice;

        if($totalPrice<1)
        {
            return redirect('order-item')->with('error', 'Failed to process order, Please try again.');
        }

        $specialItemPrice=0;
        /* $specialItemID=env('SPECIALSETMENUID');
        if(count($defultReturn['cart']->items)>0)
        {
            foreach($defultReturn['cart']->items as $itm):
                $cid=$itm['item']->cid;
                if($cid==$specialItemID){
                    $specialItemPrice+=$itm["price"];
                }
            endforeach;
        } */
        
        $tax_title="Tax";
        if(isset($defultReturn['tax']->tax_amount))
        {
            $tax_amount=$defultReturn['tax']->tax_amount;
        }
        else
        {
            $tax_amount=0;
        }
        
        if(isset($defultReturn['tax']))
        {
            if (strpos($defultReturn['tax']->tax_amount, '%') !== false) {
               $tax_title="Tax (".$defultReturn['tax']->tax_amount.")";
               $tax_amount=(($totalPrice*$defultReturn['tax']->tax_amount)/100);
            }
        }

        $discount_title="Discount";
        $discount_amount=0;

        $recType=$defultReturn['cart']->rec;
        //dd($defultReturn);
        if(isset($defultReturn['colndel']))
        {
            if(($totalPrice-$specialItemPrice) > $defultReturn['colndel']->minimum_amount)
            {
                $recType=$defultReturn['cart']->rec;
                if(in_array($defultReturn['colndel']->discount_option,array("Delivery","Collection")))
                {
                    //echo $defultReturn['colndel']->discount_option.";".$recType; die();
                    $discount_title="Discount";
                    $discount_amount=0;
                    if($recType=="Collect" && $defultReturn['colndel']->discount_option=="Collection")
                    {
                        
                        $discount_title="Discount on Collection";
                        $discount_amount=$defultReturn['colndel']->discount_amount;
                        if (strpos($defultReturn['colndel']->discount_amount, '%') !== false) {

                           

                           $discount_title="Discount (".$defultReturn['colndel']->discount_amount.")";
                           $discount_amount=((($totalPrice-$specialItemPrice)*str_replace("%","",$defultReturn['colndel']->discount_amount))/100);

                            //echo $discount_amount; die();
                        }

                        //dd($defultReturn['colndel']);
                    }
                    elseif($recType=="Delivery" && $defultReturn['colndel']->discount_option=="Delivery")
                    {
                        $discount_title="Discount on Delivery";
                        $discount_amount=$defultReturn['colndel']->discount_amount;
                        if (strpos($defultReturn['colndel']->discount_amount, '%') !== false) {
                           $discount_title="Discount (".$defultReturn['colndel']->discount_amount.")";
                           $discount_amount=((($totalPrice-$specialItemPrice)*str_replace("%","",$defultReturn['colndel']->discount_amount))/100);
                        }

                        //echo $discount_amount; die();
                    }
                    
                }
                else
                {
                    $discount_title="Discount";
                    $discount_amount=$defultReturn['colndel']->discount_amount;
                    if (strpos($defultReturn['colndel']->discount_amount, '%') !== false) {
                       $discount_title="Discount (".$defultReturn['colndel']->discount_amount.")";
                       $discount_amount=((($totalPrice-$specialItemPrice)*$defultReturn['colndel']->discount_amount)/100);
                    }
                }    
            }
                
        }
        elseif(isset($defultReturn['common']))
        {

            if($totalPrice > $defultReturn['common']->minimum_amount)
            {

                $recType=$defultReturn['cart']->rec;
                    $discount_title="Discount";
                    $discount_amount=$defultReturn['common']->discount_amount;
                    if (strpos($defultReturn['common']->discount_amount, '%') !== false) {
                       $discount_title="Discount (".$defultReturn['common']->discount_amount.")";
                       $discount_amount=((($totalPrice-$specialItemPrice)*$defultReturn['common']->discount_amount)/100);
                    }
            }
                
        }

       //dd($discount_amount);

        //echo 1; die();

        //$delivery_cost=$defultReturn['cart']->delivery_cost;
        $delivery_cost=0;
        if($recType=="Delivery")
        {
            $delivery_cost=0.00;
        }
        


        $extra_cost_in_delivery=0;
        if($defRec=="Delivery")
        {
            if($totalPrice>14.99){}else{
                $extra_cost_in_delivery=2.00;
            }
        }
        //echo 1; die();
        
       // dd($defultReturn['cart']->items);
        $delivery = new DeliveryAddress;
        $delivery->customer_id = Auth::user()->id;
        $delivery->token = csrf_token();
        $delivery->first_name = $defultReturn['cart']->deliveryDetail["name"];
        $delivery->address = $defultReturn['cart']->deliveryDetail["address"];
        $delivery->mobile_phone =$defultReturn['cart']->deliveryDetail["phone"];
        $delivery->email =$defultReturn['cart']->deliveryDetail["email"];
        $delivery->zip_code =$defultReturn['cart']->deliveryDetail["zipcode"];
        $delivery->save();

        //dd($delivery);

        

        $pro = new Orders;
        $pro->tracking = csrf_token();
        $pro->cid = Auth::user()->id;
        $pro->invoice_date = date('Y-m-d');
        $pro->due_date = date('Y-m-d');
        $pro->order_status = "Pending";
        $pro->payment_method = $request->payment_method;
        $pro->tax_title = $tax_title;
        $pro->tax_amount = $tax_amount;
        $pro->discount_title = $discount_title;
        $pro->discount_amount = $discount_amount;
        $pro->delivery_cost = $delivery_cost;
        $pro->order_total = $totalPrice+$delivery_cost+$extra_cost_in_delivery;
        $pro->order_type = $defultReturn['cart']->rec;
        $pro->order_online = 1;
        $pro->delivery_asap = $defultReturn['cart']->deliveryDetail["asap"];
        $pro->delivery_date = $defultReturn['cart']->deliveryDetail["delivery_date"];
        $pro->delivery_time = $defultReturn['cart']->deliveryDetail["delivery_time"];
        $pro->delivery_note = $defultReturn['cart']->deliveryDetail["delivery_note"];
        $pro->cart_json = serialize($defultReturn['cart']);
        $pro->save();

        $order_id = $pro->id;



        if(count($defultReturn['cart']->items)>0)
        {
            //dd($defultReturn['cart']->items);
            foreach($defultReturn['cart']->items as $itm):
                try {
                    if(isset($itm['inclusiveMeal']))
                    {

                        $flavour=json_encode($itm['flavour']);
                        $protag = new OrdersItem();
                        $protag->pid = $itm['data']->id;
                        $protag->order_id = $order_id;
                        $protag->tracking = csrf_token();
                        $protag->quantity = $itm["qty"];
                        $protag->unit_price = $itm['unit_price'];
                        $protag->inclusiveMeal = 1;
                        $protag->flavour = $flavour;
                        $protag->tax_rate = 0;
                        $protag->tax_amount = 0;
                        $protag->row_total = $itm["price"];
                        $protag->cart_json = serialize($itm);
                        $protag->save();
                    }
                    else 
                    {
                $protag = new OrdersItem();
                $protag->pid = $itm['item']->id;
                $protag->order_id = $order_id;
                $protag->tracking = csrf_token();
                $protag->quantity = $itm["qty"];
                $protag->unit_price =$itm['item']->price;
                $protag->tax_rate = 0;
                $protag->tax_amount = 0;
                $protag->row_total = $itm["price"];
                $protag->cart_json = serialize($itm);
                $protag->save();
                    }
                } catch (\Exception $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n"; die();
                }
                

            endforeach;
        }
        else
        {
            return redirect('order-item')->with('error', 'Failed to process order, Please try again.');
        }

       // dd(1);

        $orderDetailSql=OrdersItem::leftJoin('products','orders_items.pid','=','products.id')
                                    ->leftJoin('sub_categories','products.scid','=','sub_categories.id')
                                    ->where('order_id',$order_id)
                                    ->select(
                                        'orders_items.id',
                                        'orders_items.quantity',
                                        'orders_items.inclusiveMeal',
                                        'orders_items.flavour',
                                        'orders_items.row_total',
                                        'products.name as product_name',
                                        'sub_categories.name as sc_name',
                                        'orders_items.cart_json as row_json'
                                        )
                                    ->orderBy('products.cid','ASC')
                                    ->get();
        //dd($orderDetailSql);
        $autoOrderType=$recType;                           
        if($recType=="Collect"){
            $autoOrderType="Collection";      
        }

        $siteMessage='<h2><strong><span style="color: #ff9900;">Receipt</span></strong></h2>
                        <table style="border: 2px solid #000000; width: 436px;">
                        <tbody>
                        <tr style="height: 36px;">
                        <td style="width: 184px; height: 36px;">Order Time</td>
                        <td style="width: 244px; height: 36px;">&nbsp;'.date('dS M Y, h:i A').'</td>
                        </tr>
                        <tr>
                        <td style="width: 428px;" colspan="2">
                        <div style="display: block; width: 80%; font-size:16px; border-bottom: 3px #000 solid;">
                            <strong>Customer Detail</strong>
                        </div>
                        </td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Name</td>
                        <td style="width: 244px; height: 18px;">'.$delivery->first_name.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Order Type&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$autoOrderType.'</td>
                        </tr>';
						
						
		$siteMessagePrinter ='*Receipt* \rOrder Time  '.date('dS M Y, h:i A').'\r 
			*Customer Detail* \rName '.$delivery->first_name.' \rOrder Type  '.$autoOrderType.'\r';		
		
		
						
        if($request->payment_method=="Cash")
        {
            $siteMessage .='<tr style="height: 25px;">
                        <td style="width: 184px; height: 25px;">&nbsp;Payment Type&nbsp;</td>
                        <td style="width: 244px; height: 25px; font-size:20px;"><strong>CASH</strong></td>
                        </tr>';
			$siteMessagePrinter .='Payment Type  Cash \r';
        }
        elseif($request->payment_method=="Paypal")
        {
            $siteMessage .='<tr style="height: 18px;">
                                <td style="width: 184px; height: 18px;">&nbsp;Payment Type&nbsp;</td>
                                <td style="width: 244px; height: 18px;"><h2>PAYPAL</h2></td>
                            </tr>
                            <tr style="height: 18px;">
                                <td style="width: 184px; height: 18px;">&nbsp;Payment Status&nbsp;</td>
                                <td style="width: 244px; height: 18px;">Pending</td>
                            </tr>';
        }
        


        if($defultReturn['cart']->deliveryDetail["asap"]==1)
        {
			$siteMessagePrinter .='Deliver Date  ASAP \r';
            $siteMessage .='<tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Deliver Date&nbsp;</td>
                        <td style="width: 244px; height: 18px;">ASAP</td>
                        </tr>';
        }
        else
        {
			$siteMessagePrinter .='Deliver Date and Time \r'.$defultReturn['cart']->deliveryDetail["delivery_date"].' - '.$defultReturn['cart']->deliveryDetail["delivery_time"].' \r';
            $siteMessage .='<tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Deliver Date &amp; Time&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$defultReturn['cart']->deliveryDetail["delivery_date"].' - '.$defultReturn['cart']->deliveryDetail["delivery_time"].'</td>
                        </tr>';
        }



        if(!empty($defultReturn['cart']->deliveryDetail["delivery_note"]))
        {
			$siteMessagePrinter .='Deliver Note  '.$pro->delivery_note.'\r';
            $siteMessage .='<tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Deliver Note&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$defultReturn['cart']->deliveryDetail["delivery_note"].'</td>
                        </tr>';
        }
        
		$siteMessagePrinter .='Address '.$delivery->address.'\rPhone '.$delivery->mobile_phone.'\rEmail '.$delivery->email.'\r\r';	

        //Delivery 
        //$recType

        if($recType=="Delivery")
        {
            $siteMessage .='<tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Address</td>
                        <td style="width: 244px; height: 18px;">'.$delivery->address.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Zip Code </td>
                        <td style="width: 244px; height: 18px;">'.$delivery->zip_code.'</td>
                        </tr>';

            $siteMessage .='<tr style="height: 18px;">
                            <td style="width: 184px; height: 18px;">&nbsp;Phone</td>
                            <td style="width: 244px; height: 18px;">'.$delivery->mobile_phone.'</td>
                            </tr>';

            $siteMessage .='</tr>
                            <tr style="height: 18px;">
                            <td style="width: 184px; height: 18px;">&nbsp;Email</td>
                            <td style="width: 244px; height: 18px;">'.$delivery->email.'</td>
                            </tr>';
        }
        else
        {
            $siteMessage .='<tr style="height: 18px;">
                            <td style="width: 184px; height: 18px;">&nbsp;Phone</td>
                            <td style="width: 244px; height: 18px;">'.$delivery->mobile_phone.'</td>
                            </tr>';
        }
        


        $siteMessage .='<tr style="height: 46px;">
                        <td style="width: 428px; height: 46px;" colspan="2">
                        <h3 style="display: block; width: 100%; border-bottom: 1px #000 dashed;">
                            <strong>Order Detail</strong>
                        </h3>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table align="center" width="100%">
                                    <thead style="border-bottom: 1px #000 solid;">
                                        <tr>
                                            <th align="left">Quantity</th>
                                            <th align="left">Product Name</th>
                                            <th align="right">Price</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <span style="display: block; height:1px; width: 100%; border-bottom: 1px #000 solid;">&nbsp;
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>';
									
						$siteMessagePrinter .='*Order Detail* \r 
						Qty  Pr.Name Price\r';	
			
			
		
                        
                        $attachmentProduct='';
                        if(count($orderDetailSql)>0)
                        {
                            foreach($orderDetailSql as $itm):
                                if($itm->inclusiveMeal==1)
                                {
                                $sc_nn='';
                                    $proNameFromRow = '';
                                    $proNameFromRowPrinter = '';
                                    $dataJson= unserialize($itm->row_json);
                                    
                                    $sc_nn ='<b>'.$dataJson['item'].'</b>';
                                    $proNameFromRowPrinter = $dataJson['item'];
                                    if(count($dataJson['flavour'])>0)
                                    {
                                        $sc_nn .= '<br>';
                                        foreach($dataJson['flavour'] as $rr)
                                        {
                                            if(!empty($proNameFromRow))
                                            {
                                                $proNameFromRow .= '<br>';
                                            }

                                            if(!empty($proNameFromRowPrinter))
                                            {
                                                $proNameFromRowPrinter .= '\r';
                                            }
                                            $proNameFromRow .='+'.$rr;
                                            $proNameFromRowPrinter .= '+' . $rr;
                                        }
                                    }
                                    
                                }
                                else
                                {
                                    $sc_nn = '';
                                    if (!empty($itm->sc_name)) {
                                    $sc_nn='['.$itm->sc_name.'] ';
                                }

                                $rowJsonUnseri=unserialize($itm->row_json);
                                //echo $rowJsonUnseri['snd_item']; 
                                $proNameFromRow='';
                                    if (isset($rowJsonUnseri['snd_item']) && isset($rowJsonUnseri['snd_item'])) {
                                    $proNameFromRow .='[<b>'.$rowJsonUnseri['item']->name.'</b>]';
                                        if (count($rowJsonUnseri['snd_item']) > 0) {
                                            foreach ($rowJsonUnseri['snd_item'] as $snd) {
                                                $proNameFromRow .= '<br /> + ' . $snd['item']->name . ' (' . $snd['qty'] . ' X ?' . $snd['item']->price . ')';
                                            }
                                        }
                                    } elseif (isset($rowJsonUnseri['snd_item']) && !isset($rowJsonUnseri['snd_item'])) {
                                        if (count($rowJsonUnseri['snd_item']) > 0) {
                                            foreach ($rowJsonUnseri['snd_item'] as $snd) {
                                                $proNameFromRow .= '<br /> + ' . $snd['item']->name . ' (' . $snd['qty'] . ' X ?' . $snd['item']->price . ')';
                                            }
                                        }
                                    } elseif (isset($rowJsonUnseri['execArrayData'])) {
                                    $proNameFromRow .='<b>'.$itm->product_name.' </b>';

                                        if (count($rowJsonUnseri['execArrayData']) > 0) {
                                            foreach ($rowJsonUnseri['execArrayData'] as $snd) {
                                            $proNameFromRow .='<br /> + '.$snd;
                                        }
                                    }
                                    } else {
                                    $proNameFromRow=$itm->product_name;
                                }
								
								
								$proNameFromRowPrinter='';
                                    if (isset($rowJsonUnseri['snd_item']) && isset($rowJsonUnseri['item'])) {
                                    $proNameFromRowPrinter .='['.$rowJsonUnseri['item']->name.']\r';
                                        if (count($rowJsonUnseri['snd_item']) > 0) {
                                            foreach ($rowJsonUnseri['snd_item'] as $snd) {
                                                $proNameFromRowPrinter .= '\r + ' . $snd['item']->name . ' (' . $snd['qty'] . ' X ?' . $snd['item']->price . ')';
                                            }
                                        }
                                    } elseif (isset($rowJsonUnseri['snd_item']) && !isset($rowJsonUnseri['item'])) {
                                        if (count($rowJsonUnseri['snd_item']) > 0) {
                                            foreach ($rowJsonUnseri['snd_item'] as $snd) {
                                                $proNameFromRowPrinter .= '\r + ' . $snd['item']->name . ' (' . $snd['qty'] . ' X ?' . $snd['item']->price . ')';
                                            }
                                        }
                                    } elseif (isset($rowJsonUnseri['execArrayData'])) {
                                    $proNameFromRowPrinter .='<b>'.$itm->product_name.' </b>';

                                        if (count($rowJsonUnseri['execArrayData']) > 0) {
                                            foreach ($rowJsonUnseri['execArrayData'] as $snd) {
                                            $proNameFromRowPrinter .='\r + '.$snd;
                                        }
                                    }
                                    } else {
                                    $proNameFromRowPrinter=$itm->product_name;
                                }
                                }

                                $siteMessage .= '  <tr><td valign="top">' . intval($itm->quantity) . '</td>
                                            <td>'.$sc_nn;
                        
                        $siteMessage .=$proNameFromRow;

                        $siteMessage .='</td>
                                            <td align="right" valign="top">&#163;'.number_format($itm->row_total,2).'</td>
                                        </tr>';

                        $attachmentProduct .='  <tr>
                                            <td valign="top">'.intval($itm->quantity).'</td>
                                            <td>'.$sc_nn.''.$proNameFromRow.'</td>
                                            <td align="right" valign="top">&#163;'.number_format($itm->row_total,2).'</td>
                                        </tr>';
                                $siteMessagePrinter .= '' . intval($itm->quantity) . ' ' . strtoupper($sc_nn . '' . strip_tags($proNameFromRowPrinter)) . ' ?' . number_format($itm->row_total, 2) . ' \r';



                            endforeach;
                        }
                        
                        $siteMessage .='  </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">
                                                <span style="display: block; height:1px; width: 100%; border-bottom: 2px #000 solid;">&nbsp;
                                                </span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Sub Total</td>
                                            <td align="right">&#163;'.number_format($totalPrice,2).'</td>
                                        </tr>';
										
						$siteMessagePrinter .='\rSub Total ?'.number_format($totalPrice,2).' \r';

						

                    if($tax_amount>0)
                    {
						$siteMessagePrinter .=$tax_title.' ?'.number_format($tax_amount,2).'\r';
                        $siteMessage .='      <tr>
                                            <td></td>
                                            <td>'.$tax_title.'</td>
                                            <td align="right">&#163;'.number_format($tax_amount,2).'</td>
                                        </tr>';

                    }
                    
                    if($discount_amount>0)
                    {
						$siteMessagePrinter .=$discount_title.' ?'.number_format($discount_amount,2).'\r';
                        $siteMessage .='<tr>
                                            <td></td>
                                            <td>'.$discount_title.'</td>
                                            <td align="right">&#163;'.number_format($discount_amount,2).'</td>
                                        </tr>';
                    }

                    if($extra_cost_in_delivery>0)
                    {
                        $siteMessagePrinter .='Extra Charge ?'.number_format($extra_cost_in_delivery,2).'\r';
                        $siteMessage .='<tr>
                                            <td></td>
                                            <td>Extra Charge</td>
                                            <td align="right">&#163;'.number_format($extra_cost_in_delivery,2).'</td>
                                        </tr>';
                    }
                    if($delivery_cost>0)
                    {
                        $siteMessage .='<tr>
                                            <td></td>
                                            <td>Delivery Charge</td>
                                            <td align="right">&#163;'.number_format($delivery_cost,2).'</td>
                                        </tr>';
                    }
                    

                    $siteMessage .='<tr>
                                            <th colspan="3">
                                                <span style="display: block; width: 100%; border-bottom: 1px #000 solid;">&nbsp;
                                                </span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Net Payable</td>
                                            <td align="right">&#163;'.number_format(((($totalPrice+$tax_amount)-$discount_amount)+$delivery_cost+$extra_cost_in_delivery),2).'</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                        </table>';
          $siteRegards='<p>Kind Regards, '.$this->sdc->SiteName.'&nbsp;</p>
                        <p>&nbsp;</p>';
          $totalInvoiceAmount=number_format((($totalPrice+$tax_amount+$extra_cost_in_delivery)-$discount_amount),2);

		  $siteMessagePrinter .='Net Payable ?'.$totalInvoiceAmount.' \r';
		  
       //echo $siteMessage; die();
	   
		
       
       if($request->payment_method=="Cash")
       {
            $ct=$this->sdc->ContactDetail();
            //dd($ct);
            $attachmentSlip='';
            $attachmentSlip .='<table align="left" width="25%" style="font-family: Ubuntu,sans-serif;">
                                    <tbody>
                                        <tr>
                                            <td align="center"><h3><b>'.$ct->contact_title.'</b></h3></td>
                                        </tr>
                                        <tr>
                                            <td align="left">------------------------------------------------------</td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td width="60%"><font size="4">'.$delivery->first_name.'</font></td>
                                                            <td align="right"><b><font size="4">'.$autoOrderType.'<br />';
                                    if($defultReturn['cart']->deliveryDetail["asap"]==1)
                                    {
                                        $attachmentSlip .='ASAP';
                                    }
                                    else
                                    {
                                        $attachmentSlip .=$defultReturn['cart']->deliveryDetail["delivery_date"].' - '.$defultReturn['cart']->deliveryDetail["delivery_time"];
                                    }


                                    $attachmentSlip .='</font></b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left">------------------------------------------------------</td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" align="left"  width="40%"><b>'.$delivery->mobile_phone.'</b></td>
                                                            <td valign="top" align="right">Cash</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-size:15px;"><br />'.$delivery->address.', Zip Code : '.$delivery->zip_code.'</td>
                                        </tr>
                                        <tr>
                                            <td align="left">------------------------------------------------------</td>
                                        </tr>

                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody style="font-size:15px;">
                                                        '.$attachmentProduct.'
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody>';
                                    if($tax_amount>0)
                                    {

                                      $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h5><b>'.$tax_title.'</b></h5></td>
                                                            <td valign="top" align="left"> <h5>: &#163;'.number_format($tax_amount,2).'</h5></td>
                                                        </tr>';

                                    }

                                    if($discount_amount>0)
                                    {
                                        $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h5><b>'.$discount_title.'</b></h5></td>
                                                            <td valign="top" align="left"> <h5>: &#163;'.number_format($discount_amount,2).'</h5></td>
                                                        </tr>';
                                    }

                                    if($delivery_cost>0)
                                    {
                                        $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h4><b>Amount Due</b></h4></td>
                                                            <td valign="top" align="left"> <h4>: &#163;'.$delivery_cost.'</h4></td>
                                                        </tr>';
                                    }

                                    if($extra_cost_in_delivery>0)
                                    {
                                    $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h4><b>Extra Charge</b></h4></td>
                                                            <td valign="top" align="left"> <h4>: &#163;'.$extra_cost_in_delivery.'</h4></td>
                                                        </tr>';
                                    }

                                    $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h4><b>Amount Due</b></h4></td>
                                                            <td valign="top" align="left"> <h4>: &#163;'.($totalInvoiceAmount+$delivery_cost+$extra_cost_in_delivery).'</h4></td>
                                                        </tr>';
                                    
                                 $attachmentSlip .='</tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /><br /></td>
                                        </tr>

                                        <tr>
                                            <td align="center"><b>Thank You</b></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="center">'.date('d/m/Y H:i A').'</td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /><br /><br /><br /><br /><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><h3><b>'.$ct->contact_title.'</b></h3></td>
                                        </tr>
                                        <tr>
                                            <td align="center">'.$ct->contact_address.'</td>
                                        </tr>
                                        <tr>
                                            <td align="center">'.$ct->contact_phone.'</td>
                                        </tr>
                                        <tr>
                                            <td align="center">Vat No : 253864581</td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody>';

                                    $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h4><b>Amount Due</b></h4></td>
                                                            <td valign="top" align="left"> <h4>: &#163;'.($totalInvoiceAmount+$delivery_cost+$extra_cost_in_delivery).'</h4></td>
                                                        </tr>';
                                    
                                 $attachmentSlip .='</tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                               </table>';



           // $pos_slip_name=$this->sdc->PDFLayout('POS SLIP',$attachmentSlip,1);

            //echo secure_asset('invoice/'.$pos_slip_name); die();

        $ct=$this->sdc->ContactDetail();

        $totalPriceAmount=0;
        $newReceiptProduct='';
        if(count($orderDetailSql)>0)
        {
            foreach($orderDetailSql as $itm):
                    if ($itm->inclusiveMeal == 1) {
                $sc_nn='';
                        $proNameFromRow = '';
                        $proNameFromRowPrinter = '';
                        $dataJson = unserialize($itm->row_json);

                        $proNameFromRow = '<b>' . $dataJson['item'] . '</b>';
                        $proNameFromRowPrinter = $dataJson['item'];
                        if (count($dataJson['flavour']) > 0) {
                            $sc_nn .= '<br>';
                            foreach ($dataJson['flavour'] as $rr) {
                                if (!empty($proNameFromRow)) {
                                    $proNameFromRow .= '<br>';
                                }

                                if (!empty($proNameFromRowPrinter)) {
                                    $proNameFromRowPrinter .= '\r';
                                }
                                $proNameFromRow .= '+' . $rr;
                                $proNameFromRowPrinter .= '+' . $rr;
                            }
                        }
                    } 
                    else 
                {
                        $sc_nn = '';
                        if (!empty($itm->sc_name)) {
                    $sc_nn=''.$itm->sc_name.' ';
                }

                $rowJsonUnseri=unserialize($itm->row_json);
                //echo $rowJsonUnseri['snd_item']; 
                $proNameFromRow='';
                        if (isset($rowJsonUnseri['snd_item']) && isset($rowJsonUnseri['snd_item'])) {
                    $proNameFromRow .='[<b>'.$rowJsonUnseri['item']->name.'</b>]';
                            if (count($rowJsonUnseri['snd_item']) > 0) {
                                foreach ($rowJsonUnseri['snd_item'] as $snd) {
                                    $proNameFromRow .= '<br /> + ' . $snd['item']->name . ' (' . $snd['qty'] . ' X ?' . $snd['item']->price . ')';
                                }
                            }
                        } elseif (isset($rowJsonUnseri['snd_item']) && !isset($rowJsonUnseri['snd_item'])) {
                            if (count($rowJsonUnseri['snd_item']) > 0) {
                                foreach ($rowJsonUnseri['snd_item'] as $snd) {
                                    $proNameFromRow .= '<br /> + ' . $snd['item']->name . ' (' . $snd['qty'] . ' X ?' . $snd['item']->price . ')';
                                }
                            }
                        } elseif (isset($rowJsonUnseri['execArrayData'])) {
                    $proNameFromRow .='<b>'.$itm->product_name.' </b>';

                            if (count($rowJsonUnseri['execArrayData']) > 0) {
                                foreach ($rowJsonUnseri['execArrayData'] as $snd) {
                            $proNameFromRow .='<br /> + '.$snd;
                        }
                    }
                        } else {
                    $proNameFromRow=$itm->product_name;
                }
                    }
                

        $newReceiptProduct .='<tr>
                                    <td valign="top" style="font-size:16px;">'.intval($itm->quantity).'</td>
                                    <td valign="top" align="center" style="font-size:16px;">X</td>
                                    <td valign="top" width="300" style="font-size:16px;"><b>'.$proNameFromRow.'</b></td>
                                    <td valign="top" align="right" style="font-size:16px;">'.number_format($itm->row_total,2).'</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-size:5px; line-height:5px;">&nbsp;</td>
                            </tr>';

                $totalPriceAmount+=$itm->row_total;

            endforeach;
        }

        $delivery_charge=2.00;
        $service_charge=1.45;


        //$receiptTotal=$totalPriceAmount+$delivery_charge+$service_charge;

        $receiptTotal=$totalPriceAmount+$extra_cost_in_delivery+$tax_amount;

        $totalDeduction=$discount_amount;

        $receiptTotaldue=($receiptTotal-$totalDeduction);
        $autoOrderType=$recType;  

        $totalCustomerOrder=Orders::CustomerOrder(Auth::user()->id)->count();


        if($recType=="Collect"){
                $autoOrderType="Collection";     

                $newHtmlStr='
                <table border="0" align="center" width="300">
                    <tr><td colspan="4" align="center" style="font-size:20px;"><b>'.$ct->contact_title.'</b></td></tr>
                    <tr><td colspan="4" align="center"><b>Tel : '.$ct->contact_phone.'</b></td></tr>
                    <tr><td colspan="4" align="center">'.$ct->contact_address.'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>
                    <tr><td colspan="4" align="center" style="font-size:20px;"><b>'.$autoOrderType.'</b></td></tr>';


                if($cart->deliveryDetail['asap']==2){
                    $newHtmlStr .='<tr><td colspan="4" align="center" style="font-size:16px;">Due '.date('d-M',strtotime($cart->deliveryDetail['delivery_date'])).' at '.$cart->deliveryDetail['delivery_time'].'</td></tr>';
                }elseif($cart->deliveryDetail['asap']==1){
                    $newHtmlStr .='<tr><td colspan="4" align="center" style="font-size:16px;">Due '.date('d-M').' at <b>ASAP</b></td></tr>';
                }


                $newHtmlStr.='<tr><td colspan="4" align="center"><hr /></td></tr>';

                if(!empty($pro->delivery_note))
                {
                    $newHtmlStr.='<tr><td colspan="4" align="left"><b>Restaurants Notes</b></td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">'.$pro->delivery_note.'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }

            

                $newHtmlStr.='<tr><td></td><td></td><td></td><td align="right" style="font-size:16px;">GBP</td></tr>
                '.$newReceiptProduct;
                $newHtmlStr.='<tr><td colspan="3" style="font-size:16px;">Sub Total</td><td align="right" style="font-size:16px;">'.number_format($receiptTotal,2).'</td></tr>';
                    if($tax_amount>0)
                    {

                      $newHtmlStr .='<tr><td colspan="3" style="font-size:16px;">'.$tax_title.'</td><td align="right" style="font-size:16px;">'.number_format($tax_amount,2).'</td></tr>';

                    }

                    if($discount_amount>0)
                    {
                        $newHtmlStr .='<tr><td colspan="3" style="font-size:16px;">'.$discount_title.'</td><td align="right" style="font-size:16px;">'.number_format($discount_amount,2).'</td></tr>';
                    }


                $newHtmlStr.='<tr><td colspan="3"></td><td><hr /></td></tr>
                    <tr><td colspan="3" style="font-size:20px;">Total Due</td><td style="font-size:20px;" align="right">'.number_format($receiptTotaldue,2).'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>
                    <tr><td colspan="4" align="center" style="font-size:20px; font-weight: bolder; text-transform: uppercase;">Order Not Paid</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';

                $newHtmlStr.='<tr><td colspan="4" align="left"><b>Customer Detail</b></td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">Name : '.$delivery->first_name.'</td></tr>
                    <tr><td colspan="4" align="left">&nbsp;</td></tr>
                    <tr><td colspan="4" align="left">Customer Number:</td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;"><b>'.$delivery->mobile_phone.'</b></td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                
                if($totalCustomerOrder==1)
                {
                    $newHtmlStr.='<tr><td colspan="4" align="center" style="font-size:18px; text-transform: uppercase; font-weight: 600;">New Customer</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }else{
                    $newHtmlStr.='<tr><td colspan="4" align="center" style="font-size:18px; text-transform: uppercase; font-weight: 600;">Old Customer</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }

                $newHtmlStr.='<tr><td colspan="4" align="left">Customer Orders: '.$totalCustomerOrder.'</td></tr>
                                <tr><td colspan="4" width="50" align="left">Order Placed At     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    '.date('H:i d-M').'</td></tr>
                            </table>'; 
            

        }else{

                $newHtmlStr='
                    <table border="0" align="center" width="300">
                    <tr><td colspan="4" align="center" style="font-size:20px;"><b>'.$ct->contact_title.'</b></td></tr>
                    <tr><td colspan="4" align="center"><b>Tel : '.$ct->contact_phone.'</b></td></tr>
                    <tr><td colspan="4" align="center">'.$ct->contact_address.'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>
                    <tr><td colspan="4" align="center" style="font-size:20px;"><b>'.$autoOrderType.'</b></td></tr>';

                if($cart->deliveryDetail['asap']==2){
                    $newHtmlStr .='<tr><td colspan="4" align="center" style="font-size:16px;">Due '.date('d-M',strtotime($cart->deliveryDetail['delivery_date'])).' at '.$cart->deliveryDetail['delivery_time'].'</td></tr>';
                }elseif($cart->deliveryDetail['asap']==1){
                    $newHtmlStr .='<tr><td colspan="4" align="center" style="font-size:16px;">Due '.date('d-M').' at <b>ASAP</b></td></tr>';
                }
            
                $newHtmlStr.='<tr><td colspan="4" align="center"><hr /></td></tr>';


                if(!empty($pro->delivery_note))
                {
                    $newHtmlStr.='<tr><td colspan="4" align="left"><b>Restaurants Notes</b></td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">'.$pro->delivery_note.'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }


                $newHtmlStr.='<tr><td></td><td></td><td></td><td align="right" style="font-size:16px;">GBP</td></tr>
                '.$newReceiptProduct;

                $newHtmlStr.='<tr><td colspan="3" style="font-size:16px;">Sub Total</td><td align="right" style="font-size:16px;">'.number_format($receiptTotal,2).'</td></tr>';
                if($tax_amount>0)
                {
                  $newHtmlStr .='<tr><td colspan="3" style="font-size:16px;">'.$tax_title.'</td><td align="right" style="font-size:16px;">'.number_format($tax_amount,2).'</td></tr>';
                }

                if($discount_amount>0)
                {
                    $newHtmlStr .='<tr><td colspan="3" style="font-size:16px;">'.$discount_title.'</td><td align="right" style="font-size:16px;">'.number_format($discount_amount,2).'</td></tr>';
                }

                if($extra_cost_in_delivery>0)
                {
                    $newHtmlStr .='<tr><td colspan="3" style="font-size:16px;">Extra Charge</td><td align="right">'.number_format($extra_cost_in_delivery,2).'</td></tr>';
                }


                $newHtmlStr.='<tr><td colspan="3"></td><td><hr /></td></tr>
                    <tr><td colspan="3" style="font-size:20px;">Total Due</td><td style="font-size:20px;" align="right">'.number_format($receiptTotaldue,2).'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>
                    <tr><td colspan="4" align="center" style="font-size:20px; font-weight: bolder; text-transform: uppercase;">Order Not Paid</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';

                $newHtmlStr.='<tr><td colspan="4" align="left"><b>Customer Detail</b></td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">Name : '.$delivery->first_name.'</td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">Address : '.$delivery->address.'</td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">Post Code : '.$delivery->zip_code.'</td></tr>
                    <tr><td colspan="4" align="left">&nbsp;</td></tr>
                    <tr><td colspan="4" align="left">Customer Number:</td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;"><b>'.$delivery->mobile_phone.'</b></td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';

                if($totalCustomerOrder==1)
                {
                    $newHtmlStr.='<tr><td colspan="4" align="center" style="font-size:18px; text-transform: uppercase; font-weight: 600;">New Customer</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }else{
                    $newHtmlStr.='<tr><td colspan="4" align="center" style="font-size:18px; text-transform: uppercase; font-weight: 600;">Old Customer</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }
            

                $newHtmlStr.='<tr><td colspan="4" align="left">Customer Orders: '.$totalCustomerOrder.'</td></tr>
                    <tr><td colspan="4" width="50" align="left">Order Placed At     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    '.date('H:i d-M').'</td></tr>
                    </table>';

        }

			
			$this->sdc->initMail(
            $delivery->email,
            $this->sdc->order_admin_email,
            'Online Order Receipt - '.$this->sdc->SiteName,
            $this->sdc->TableUserOrder($delivery->first_name,$this->sdc->SiteName).'<br>'.$siteMessage.$siteRegards,'');

            $this->sdc->initMail(
            $this->sdc->order_admin_email,
            $delivery->email,
            'Admin Order Receipt - '.$this->sdc->SiteName,
            $newHtmlStr,'printordergt90@tandoorimahalonline.co.uk');
        }

        /*if($_SERVER['REMOTE_ADDR']=="103.57.42.222"){
                echo "Under Maintainence";
                die();
            
        }
*/


        //die();
        
       // echo "Under Maintainence";
       // die();

        if($request->payment_method=="Cash")
        {
            //echo 1; die();
            $Ncart = new Cart($cart);
            $Ncart->ClearCart();

            $request->session()->put('cart', $Ncart);
            
            return redirect('complete-payment')->with('status', 'THANK YOU ! Please allow us 45-60 minutes for Delivery and around 30 minutes for Collection Order! It might takes more time on Friday & Saturday Nights');
        }
        elseif($request->payment_method=="Paypal")
        {
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            $item1 = new Item();
            $item1->setName('Invoice - '.$order_id)
                ->setCurrency('GBP')
                ->setQuantity(1)
                ->setSku($order_id) // Similar to `item_number` in Classic API
                ->setPrice($totalInvoiceAmount+$delivery_cost);
            


            $itemList = new ItemList();
            $itemList->setItems(array($item1));   

            $details = new Details();
            $details->setSubtotal($totalInvoiceAmount+$delivery_cost); 

            $amount = new Amount();
            $amount->setCurrency("GBP")
                ->setTotal($totalInvoiceAmount+$delivery_cost)
                ->setDetails($details);   
            
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Invoice Payment description")
                ->setInvoiceNumber(uniqid()); 

            //$baseUrl = url();
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl(url('invoice/payment/paypal/'.$order_id.'/success'))
                ->setCancelUrl(url('invoice/payment/paypal/'.$order_id.'/cancel'));

            $payment = new Payment();
            $payment->setIntent("sale")
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions(array($transaction));


            try {
                $payment->create($this->_api_content);
            } catch (\PayPal\Exception\PPConnectionException $ex) {

                dd($ex);
                if(\Config::get('app.debug'))
                {
                    \Session::put('error','Connection has timeout.!!!!, Please try again.');
                    return redirect('payment-method');
                }
                else
                {
                    \Session::put('error','Something went wrong.!!!!, Please try again.');
                    return redirect('payment-method');
                }
            }


            foreach($payment->getLinks() as $link){
                if($link->getRel()=='approval_url')
                {
                    $redirect_url=$link->getHref();
                    break;
                }
            }

            \Session::put('paypal_payment_id',$payment->getId());

            if(isset($redirect_url))
            {
                return redirect($redirect_url);
            }

            \Session::put('error','Unknown error occured, Please try again.!!!!!');
            return redirect('payment-method');
            
        }
        else
        {
            return redirect('payment-method')->with('error', 'Failed, Please try again.!!!!');
        }
        

    }

    public function getPOSPaymentStatusPaypal(Request $request,$invoice_id=0,$status='fahad')
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        $defultReturn=['cart'=>$cart];
        if($this->checkCommonDiscount())
        {
            $defultReturn=array_merge($defultReturn,['common'=>$this->checkCommonDiscount()]);
        }

        $defRec=$cart->rec;
        if($cart->rec=="Collect")
        {
            $defRec='Collection';
        }

        if($this->checkColNDelDiscount($defRec))
        {
            $defultReturn=array_merge($defultReturn,['colndel'=>$this->checkColNDelDiscount($defRec)]);
        }        

        if($this->checkTax())
        {
            $defultReturn=array_merge($defultReturn,['tax'=>$this->checkTax()]);
        }

        //dd(csrf_token());

         
        $totalPrice=$defultReturn['cart']->totalPrice;

        if($totalPrice<1)
        {
            return redirect('order-item')->with('error', 'Failed to process order, Please try again.');
        }


        $specialItemPrice=0;
        $specialItemID=env('SPECIALSETMENUID');
        if(count($defultReturn['cart']->items)>0)
        {
            foreach($defultReturn['cart']->items as $itm):
                $cid=$itm['item']->cid;
                if($cid==$specialItemID){
                    $specialItemPrice+=$itm["price"];
                }
            endforeach;
        }

        
        $tax_title="Tax";
        if(isset($defultReturn['tax']->tax_amount))
        {
            $tax_amount=$defultReturn['tax']->tax_amount;
        }
        else
        {
            $tax_amount=0;
        }
        
        if(isset($defultReturn['tax']))
        {
            if (strpos($defultReturn['tax']->tax_amount, '%') !== false) {
               $tax_title="Tax (".$defultReturn['tax']->tax_amount.")";
               $tax_amount=(($totalPrice*$defultReturn['tax']->tax_amount)/100);
            }
        }

        $discount_title="Discount";
        $discount_amount=0;
        $recType=$defultReturn['cart']->rec;
        if(isset($defultReturn['colndel']))
        {

            if(($totalPrice-$specialItemPrice) > $defultReturn['colndel']->minimum_amount)
            {

             
            
                if(in_array($defultReturn['colndel']->discount_option,array("Delivery","Collection")))
                {
                   // echo $defultReturn['colndel']->discount_option.";".$recType; die();
                    $discount_title="Discount";
                    $discount_amount=0;
                    if($recType=="Collect" && $defultReturn['colndel']->discount_option=="Collection")
                    {
                        $discount_title="Discount on Collection";
                        $discount_amount=$defultReturn['colndel']->discount_amount;
                        if (strpos($defultReturn['colndel']->discount_amount, '%') !== false) {

                           $discount_title="Discount (".$defultReturn['colndel']->discount_amount.")";
                           $discount_amount=((($totalPrice-$specialItemPrice)*$defultReturn['colndel']->discount_amount)/100);
                        }
                    }
                    elseif($recType=="Delivery" && $defultReturn['colndel']->discount_option=="Delivery")
                    {
                        $discount_title="Discount on Delivery";
                        $discount_amount=$defultReturn['colndel']->discount_amount;
                        if (strpos($defultReturn['colndel']->discount_amount, '%') !== false) {
                           $discount_title="Discount (".$defultReturn['colndel']->discount_amount.")";
                           $discount_amount=((($totalPrice-$specialItemPrice)*$defultReturn['colndel']->discount_amount)/100);
                        }
                    }
                }
                else
                {
                    $discount_title="Discount";
                    $discount_amount=$defultReturn['colndel']->discount_amount;
                    if (strpos($defultReturn['colndel']->discount_amount, '%') !== false) {
                       $discount_title="Discount (".$defultReturn['colndel']->discount_amount.")";
                       $discount_amount=((($totalPrice-$specialItemPrice)*$defultReturn['colndel']->discount_amount)/100);
                    }
                }    
            }
                
        }
        elseif(isset($defultReturn['common']))
        {

            if($totalPrice > $defultReturn['common']->minimum_amount)
            {

                $recType=$defultReturn['cart']->rec;
                    $discount_title="Discount";
                    $discount_amount=$defultReturn['common']->discount_amount;
                    if (strpos($defultReturn['common']->discount_amount, '%') !== false) {
                       $discount_title="Discount (".$defultReturn['common']->discount_amount.")";
                       $discount_amount=((($totalPrice-$specialItemPrice)*$defultReturn['common']->discount_amount)/100);
                    }
            }
                
        }

        //$delivery_cost=$defultReturn['cart']->delivery_cost;
        $delivery_cost=0;
        if($recType=="Delivery")
        {
            $delivery_cost=0.00;
        }
        
       // dd($defultReturn['cart']->items);
        /*$delivery = new DeliveryAddress;
        $delivery->customer_id = Auth::user()->id;
        $delivery->token = csrf_token();
        $delivery->first_name = $defultReturn['cart']->deliveryDetail["name"];
        $delivery->address = $defultReturn['cart']->deliveryDetail["address"];
        $delivery->mobile_phone =$defultReturn['cart']->deliveryDetail["phone"];
        $delivery->email =$defultReturn['cart']->deliveryDetail["email"];
        $delivery->zip_code =$defultReturn['cart']->deliveryDetail["zipcode"];
        $delivery->save();*/

        //dd($delivery);

        /*$pro = new Orders;
        $pro->tracking = csrf_token();
        $pro->cid = Auth::user()->id;
        $pro->invoice_date = date('Y-m-d');
        $pro->due_date = date('Y-m-d');
        $pro->order_status = "Pending";
        $pro->tax_title = $tax_title;
        $pro->tax_amount = $tax_amount;
        $pro->discount_title = $discount_title;
        $pro->discount_amount = $discount_amount;
        $pro->order_total = $totalPrice;
        $pro->order_type = $defultReturn['cart']->rec;
        $pro->order_online = 1;
        $pro->delivery_asap = $defultReturn['cart']->deliveryDetail["asap"];
        $pro->delivery_date = $defultReturn['cart']->deliveryDetail["delivery_date"];
        $pro->delivery_time = $defultReturn['cart']->deliveryDetail["delivery_time"];
        $pro->delivery_note = $defultReturn['cart']->deliveryDetail["delivery_note"];
        $pro->save();*/

        $order_id = $invoice_id;


        /*if(count($defultReturn['cart']->items)>0)
        {
            foreach($defultReturn['cart']->items as $itm):
                //dd($itm);

                $protag = new OrdersItem();
                $protag->pid = $itm['item']->id;
                $protag->order_id = $order_id;
                $protag->tracking = csrf_token();
                $protag->quantity = $itm["qty"];
                $protag->unit_price =$itm['item']->price;
                $protag->tax_rate = 0;
                $protag->tax_amount = 0;
                $protag->row_total = $itm["price"];
                $protag->save();

            endforeach;
        }
        else
        {
            return redirect('order-item')->with('error', 'Failed to process order, Please try again.');
        }*/


            //dd($invoice_id);
            $payment_id=\Session::get('paypal_payment_id');
                        \Session::forget('paypal_payment_id');

            if(empty($request->PayerID) || empty($request->token))
            {
                \Session::put('error','Failed token mismatch, Please tryagain');
                return redirect('payment-method');
            }

            $payment=Payment::get($payment_id,$this->_api_content);
            $excution=new PaymentExecution();
            $excution->setPayerId($request->PayerID);

            $result=$payment->execute($excution,$this->_api_content);
            //dd($invoice_id);
            if($result->getState()=='approved')
            {
                $trans=$result->getTransactions();
                //$amtAr=$trans->getAmount();
                $amountPaid=$trans[0]->getAmount()->getTotal();
                //dd($amountPaid);

                $orderTab=Orders::find($order_id);
                $orderTab->order_status="Paid";
                $orderTab->save();


                $orderDetailSql=OrdersItem::leftJoin('products','orders_items.pid','=','products.id')
                                    ->leftJoin('sub_categories','products.scid','=','sub_categories.id')
                                    ->where('order_id',$order_id)
                                    ->select(
                                        'orders_items.id',
                                        'orders_items.quantity',
                                        'orders_items.row_total',
                                        'orders_items.inclusiveMeal',
                                        'orders_items.flavour',
                                        'products.name as product_name',
                                        'sub_categories.name as sc_name',
                                        'orders_items.cart_json as row_json'
                                        )
                                    ->orderBy('products.cid','ASC')
                                    ->get();

                        $pro = Orders::find($order_id);
                        $delivery =DeliveryAddress::where('token',$pro->tracking)->first();
        //dd($orderDetailSql);

        $autoOrderType=$recType;                           
        if($recType=="Collect"){
            $autoOrderType="Collection";      
        }

        $siteMessage='<h2><strong><span style="color: #ff9900;">Receipt</span></strong></h2>
                        <table style="border: 2px solid #000000; width: 436px;">
                        <tbody>
                        <tr style="height: 36px;">
                        <td style="width: 184px; height: 36px;">Order Time</td>
                        <td style="width: 244px; height: 36px;">&nbsp;'.date('dS M Y, h:i A').'</td>
                        </tr>
                        <tr>
                        <td style="width: 428px;" colspan="2">
                        <div style="display: block; width: 80%; font-size:16px; border-bottom: 3px #000 solid;">
                            <strong>Customer Detail</strong>
                        </div>
                        </td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Name</td>
                        <td style="width: 244px; height: 18px;">'.$delivery->first_name.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Order Type&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$autoOrderType.'</td>
                        </tr>';



        
            $siteMessage .='<tr style="height: 25px;">
                        <td style="width: 184px; height: 25px;">&nbsp;Payment Type&nbsp;</td>
                        <td style="width: 244px; height: 25px; font-size:20px;"><strong>PAYPAL</strong></td>
                        </tr>
                            <tr style="height: 18px;">
                                <td style="width: 184px; height: 18px;">&nbsp;Payment Status&nbsp;</td>
                                <td style="width: 244px; height: 18px;">Complete</td>
                            </tr>';
        
		$siteMessagePrinterPaypal ='*Receipt* \rOrder Time  '.date('dS M Y, h:i A').'\r 
			*Customer Detail* \rName '.$defultReturn['cart']->deliveryDetail["name"].' \rOrder Type  '.$autoOrderType.'\r';		
			$siteMessagePrinterPaypal .='Payment Type Paypal \r';
			$siteMessagePrinterPaypal .='Payment Status Paid \r';
			


        if($defultReturn['cart']->deliveryDetail["asap"]==1)
        {
				$siteMessagePrinterPaypal .='Deliver Date ASAP \r';
            $siteMessage .='<tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Deliver Date&nbsp;</td>
                        <td style="width: 244px; height: 18px;">ASAP</td>
                        </tr>';
        }
        else
        {
				$siteMessagePrinterPaypal .='Deliver Date and Time \r'.$defultReturn['cart']->deliveryDetail["delivery_date"].' - '.$defultReturn['cart']->deliveryDetail["delivery_time"].' \r';
            $siteMessage .='<tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Deliver Date &amp; Time&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$defultReturn['cart']->deliveryDetail["delivery_date"].' - '.$defultReturn['cart']->deliveryDetail["delivery_time"].'</td>
                        </tr>';
        }



        if(!empty($defultReturn['cart']->deliveryDetail["delivery_note"]))
        {
				$siteMessagePrinterPaypal .='Deliver Note  '.$defultReturn['cart']->deliveryDetail["delivery_note"].'\r';
            $siteMessage .='<tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Deliver Note&nbsp;</td>
                        <td style="width: 244px; height: 18px;">'.$defultReturn['cart']->deliveryDetail["delivery_note"].'</td>
                        </tr>';
        }
        
	$siteMessagePrinterPaypal .='Address '.$defultReturn['cart']->deliveryDetail["address"].'\rPhone '.$defultReturn['cart']->deliveryDetail["phone"].'\rEmail '.$defultReturn['cart']->deliveryDetail["email"].'\r\r';



         if($recType=="Delivery")
        {
            $siteMessage .='<tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Address</td>
                        <td style="width: 244px; height: 18px;">'.$delivery->address.'</td>
                        </tr>
                        <tr style="height: 18px;">
                        <td style="width: 184px; height: 18px;">&nbsp;Zip Code </td>
                        <td style="width: 244px; height: 18px;">'.$delivery->zip_code.'</td>
                        </tr>';

            $siteMessage .='<tr style="height: 18px;">
                            <td style="width: 184px; height: 18px;">&nbsp;Phone</td>
                            <td style="width: 244px; height: 18px;">'.$delivery->mobile_phone.'</td>
                            </tr>';

            $siteMessage .='</tr>
                            <tr style="height: 18px;">
                            <td style="width: 184px; height: 18px;">&nbsp;Email</td>
                            <td style="width: 244px; height: 18px;">'.$delivery->email.'</td>
                            </tr>';
        }
        else
        {
            $siteMessage .='<tr style="height: 18px;">
                            <td style="width: 184px; height: 18px;">&nbsp;Phone</td>
                            <td style="width: 244px; height: 18px;">'.$delivery->mobile_phone.'</td>
                            </tr>';
        }
        

        $siteMessage .='
                        <tr style="height: 46px;">
                        <td style="width: 428px; height: 46px;" colspan="2">
                        <h3 style="display: block; width: 100%; border-bottom: 1px #000 dashed;">
                            <strong>Order Detail</strong>
                        </h3>
                        </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <table align="center" width="100%">
                                    <thead style="border-bottom: 1px #000 solid;">
                                        <tr>
                                            <th align="left">Quantity</th>
                                            <th align="left">Product Name</th>
                                            <th align="right">Price</th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <span style="display: block; height:1px; width: 100%; border-bottom: 1px #000 solid;">&nbsp;
                                                </span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>';
                        
                        $attachmentProduct=''; 
			
			$siteMessagePrinterPaypal .='*Order Detail* \rQuantityProduct NamePrice \r';
                        
			if(count($orderDetailSql)>0)
                        {
                            foreach($orderDetailSql as $itm):
                    if ($itm->inclusiveMeal == 1) {
                        $sc_nn = '';
                        $proNameFromRow = '';
                        $proNameFromRowPrinter = '';
                        $dataJson = unserialize($itm->row_json);

                        $sc_nn = '<b>' . $dataJson['item'] . '</b>';
                        $proNameFromRowPrinter = $dataJson['item'];
                        if (count($dataJson['flavour']) > 0) {
                            $sc_nn .= '<br>';
                            foreach ($dataJson['flavour'] as $rr) {
                                if (!empty($proNameFromRow)) {
                                    $proNameFromRow .= '<br>';
                                }

                                if (!empty($proNameFromRowPrinter)) {
                                    $proNameFromRowPrinter .= '\r';
                                }
                                $proNameFromRow .= '+' . $rr;
                                $proNameFromRowPrinter .= '+' . $rr;
                            }
                        }
                    } else {
                                $sc_nn='';
                                if(!empty($itm->sc_name))
                                {
                                    $sc_nn='['.$itm->sc_name.'] ';
                                }

                                $rowJsonUnseri=unserialize($itm->row_json);
                                //echo $rowJsonUnseri['snd_item']; 
                                $proNameFromRow='';
                                if(isset($rowJsonUnseri['snd_item']))
                                {
                                    if(count($rowJsonUnseri['snd_item'])>0)
                                    {
                                        foreach($rowJsonUnseri['snd_item'] as $snd)
                                        {
                                            $proNameFromRow .='<br /> + '.$snd['item']->name.' ('.$snd['qty'].' X&nbsp;&#163;'.$snd['item']->price.')';
                                        }
                                    }
                                }
                                elseif(isset($rowJsonUnseri['execArrayData']))
                                {
                                    $proNameFromRow .='<b>'.$itm->product_name.' </b>';

                                    if(count($rowJsonUnseri['execArrayData'])>0)
                                    {
                                        foreach($rowJsonUnseri['execArrayData'] as $snd)
                                        {
                                            $proNameFromRow .='<br /> + '.$snd;
                                        }
                                    }
                                }
                                else
                                {
                                    $proNameFromRow=$itm->product_name;
                                }
                            }
                        //dd($rowJsonUnseri);
                        //die();
                        $siteMessage .='  <tr>
                                            <td valign="top">'.intval($itm->quantity).'</td>
                                            <td>'.$sc_nn;
                        
                        $siteMessage .=$proNameFromRow;

                        $siteMessage .='</td>
                                            <td align="right" valign="top">&#163;'.number_format($itm->row_total,2).'</td>
                                        </tr>';

                        $attachmentProduct .='  <tr>
                                            <td valign="top">'.intval($itm->quantity).'</td>
                                            <td>'.$sc_nn.''.$proNameFromRow.'</td>
                                            <td align="right" valign="top">&#163;'.number_format($itm->row_total,2).'</td>
                                        </tr>';

			$siteMessagePrinterPaypal .=''.intval($itm->quantity).' '.strtoupper($sc_nn.''.strip_tags($itm->product_name)).' ?'.number_format($itm->row_total,2).' \r';	
                            endforeach;
                        }
				$siteMessagePrinterPaypal .='\rSub Total ?'.number_format($totalPrice,2).' \r';
                        
                        $siteMessage .='  </tbody>
                                    <tfoot>
                                        <tr>
                                            <th colspan="3">
                                                <span style="display: block; height:1px; width: 100%; border-bottom: 2px #000 solid;">&nbsp;
                                                </span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Sub Total</td>
                                            <td align="right">&#163;'.number_format($totalPrice,2).'</td>
                                        </tr>';


                            if($tax_amount>0)
                            {
								$siteMessagePrinterPaypal .=$tax_title.' ?'.number_format($tax_amount,2).'\r';
                                $siteMessage .='      <tr>
                                                    <td></td>
                                                    <td>'.$tax_title.'</td>
                                                    <td align="right">&#163;'.number_format($tax_amount,2).'</td>
                                                </tr>';

                    }
                    
                    if($discount_amount>0)
                    {
			$siteMessagePrinterPaypal .=$discount_title.' ?'.number_format($discount_amount,2).'\r';
                        $siteMessage .='<tr>
                                            <td></td>
                                            <td>'.$discount_title.'</td>
                                            <td align="right">&#163;'.number_format($discount_amount,2).'</td>
                                        </tr>';
                    }

                    if($delivery_cost>0)
                    {
                        $siteMessage .='<tr>
                                            <td></td>
                                            <td>Delivery Charge</td>
                                            <td align="right">&#163;'.number_format($delivery_cost,2).'</td>
                                        </tr>';
                    }
                    

                    $siteMessage .='<tr>
                                            <th colspan="3">
                                                <span style="display: block; width: 100%; border-bottom: 1px #000 solid;">&nbsp;
                                                </span>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Net Payable</td>
                                            <td align="right">&#163;'.number_format(((($totalPrice+$tax_amount)-$discount_amount)+$delivery_cost),2).'</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </td>
                        </tr>
                        </tbody>
                        </table>';
          $siteRegards='<p>Kind Regards, '.$this->sdc->SiteName.'&nbsp;</p>
                        <p>&nbsp;</p>';
          $totalInvoiceAmount=number_format((($totalPrice+$tax_amount)-$discount_amount),2);
		$siteMessagePrinterPaypal .='Net Payable ?'.$totalInvoiceAmount;

                        //echo $siteMessage; die(); 


/*	  $this->sdc->PrinterinitMail("printordergt90@bombaynite.com",
					'Online Print Order Receipt - '.$this->sdc->SiteName,
					$siteMessagePrinterPaypal);*/


            $ct=$this->sdc->ContactDetail();
            //dd($ct);
            $attachmentSlip='';
            $attachmentSlip .='<table align="left" width="25%" style="font-family: Ubuntu,sans-serif;">
                                    <tbody>
                                        <tr>
                                            <td align="center"><h3><b>'.$ct->contact_title.'</b></h3></td>
                                        </tr>
                                        <tr>
                                            <td align="left">------------------------------------------------------</td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td width="60%"><font size="4">'.$delivery->first_name.'</font></td>
                                                            <td align="right"><b><font size="4">'.$defultReturn['cart']->rec.'<br />';
                                    if($defultReturn['cart']->deliveryDetail["asap"]==1)
                                    {
                                        $attachmentSlip .='ASAP';
                                    }
                                    else
                                    {
                                        $attachmentSlip .=$defultReturn['cart']->deliveryDetail["delivery_date"].' - '.$defultReturn['cart']->deliveryDetail["delivery_time"];
                                    }


                                    $attachmentSlip .='</font></b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left">------------------------------------------------------</td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td valign="top" align="left"  width="40%"><b>'.$delivery->mobile_phone.'</b></td>
                                                            <td valign="top" align="right">Cash</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left" style="font-size:15px;"><br />'.$delivery->address.', Zip Code : '.$delivery->zip_code.'</td>
                                        </tr>
                                        <tr>
                                            <td align="left">------------------------------------------------------</td>
                                        </tr>

                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody style="font-size:15px;">
                                                        '.$attachmentProduct.'
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody>';
                                    if($tax_amount>0)
                                    {

                                      $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h5><b>'.$tax_title.'</b></h5></td>
                                                            <td valign="top" align="left"> <h5>: &#163;'.number_format($tax_amount,2).'</h5></td>
                                                        </tr>';

                                    }

                                    if($discount_amount>0)
                                    {
                                        $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h5><b>'.$discount_title.'</b></h5></td>
                                                            <td valign="top" align="left"> <h5>: &#163;'.number_format($discount_amount,2).'</h5></td>
                                                        </tr>';
                                    }

                                    if($delivery_cost>0)
                                    {
                                        $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h4><b>Amount Due</b></h4></td>
                                                            <td valign="top" align="left"> <h4>: &#163;'.$delivery_cost.'</h4></td>
                                                        </tr>';
                                    }

                                    $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h4><b>Amount Due</b></h4></td>
                                                            <td valign="top" align="left"> <h4>: &#163;'.($totalInvoiceAmount+$delivery_cost).'</h4></td>
                                                        </tr>';
                                    
                                 $attachmentSlip .='</tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /><br /></td>
                                        </tr>

                                        <tr>
                                            <td align="center"><b>Thank You</b></td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="center">'.date('d/m/Y H:i A').'</td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /><br /><br /><br /><br /><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="center"><h3><b>'.$ct->contact_title.'</b></h3></td>
                                        </tr>
                                        <tr>
                                            <td align="center">'.$ct->contact_address.'</td>
                                        </tr>
                                        <tr>
                                            <td align="center">'.$ct->contact_phone.'</td>
                                        </tr>
                                        <tr>
                                            <td align="center">Vat No : 253864581</td>
                                        </tr>
                                        <tr>
                                            <td align="left"><br /><br /></td>
                                        </tr>
                                        <tr>
                                            <td align="left">
                                                <table align="left" width="100%">
                                                    <tbody>';

                                    $attachmentSlip .='<tr>
                                                            <td valign="top" align="right"  width="50%"><h4><b>Amount Due</b></h4></td>
                                                            <td valign="top" align="left"> <h4>: &#163;'.($totalInvoiceAmount+$delivery_cost).'</h4></td>
                                                        </tr>';
                                    
                                 $attachmentSlip .='</tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                               </table>';

                                //echo $siteMessage; die();
               
               $full_cus_name=$delivery->first_name;
                if(!empty($delivery->last_name))
                {
                    $full_cus_name .=" ".$delivery->last_name;
                }





        $ct=$this->sdc->ContactDetail();

        $totalPriceAmount=0;
        $newReceiptProduct='';
        if(count($orderDetailSql)>0)
        {
            foreach($orderDetailSql as $itm):
                    if ($itm->inclusiveMeal == 1) {
                        $sc_nn = '';
                        $proNameFromRow = '';
                        $proNameFromRowPrinter = '';
                        $dataJson = unserialize($itm->row_json);

                        $proNameFromRow = '<b>' . $dataJson['item'] . '</b>';
                        $proNameFromRowPrinter = $dataJson['item'];
                        if (count($dataJson['flavour']) > 0) {
                            $sc_nn .= '<br>';
                            foreach ($dataJson['flavour'] as $rr) {
                                if (!empty($proNameFromRow)) {
                                    $proNameFromRow .= '<br>';
                                }

                                if (!empty($proNameFromRowPrinter)) {
                                    $proNameFromRowPrinter .= '\r';
                                }
                                $proNameFromRow .= '+' . $rr;
                                $proNameFromRowPrinter .= '+' . $rr;
                            }
                        }
                    } else {
                $sc_nn='';
                if(!empty($itm->sc_name))
                {
                    $sc_nn=''.$itm->sc_name.' ';
                }

                $rowJsonUnseri=unserialize($itm->row_json);
                //echo $rowJsonUnseri['snd_item']; 
                $proNameFromRow='';
                if(isset($rowJsonUnseri['snd_item']) && isset($rowJsonUnseri['snd_item']))
                {
                    $proNameFromRow .='[<b>'.$rowJsonUnseri['item']->name.'</b>]';
                    if(count($rowJsonUnseri['snd_item'])>0)
                    {
                        foreach($rowJsonUnseri['snd_item'] as $snd)
                        {
                                    $proNameFromRow .='<br /> + '.$snd['item']->name.' ('.$snd['qty'].' X ?'.$snd['item']->price.')';
                        }
                    }
                }
                elseif(isset($rowJsonUnseri['snd_item']) && !isset($rowJsonUnseri['snd_item']))
                {
                    if(count($rowJsonUnseri['snd_item'])>0)
                    {
                        foreach($rowJsonUnseri['snd_item'] as $snd)
                        {
                                    $proNameFromRow .='<br /> + '.$snd['item']->name.' ('.$snd['qty'].' X ?'.$snd['item']->price.')';
                        }
                    }
                }
                elseif(isset($rowJsonUnseri['execArrayData']))
                {
                    $proNameFromRow .='<b>'.$itm->product_name.' </b>';

                    if(count($rowJsonUnseri['execArrayData'])>0)
                    {
                        foreach($rowJsonUnseri['execArrayData'] as $snd)
                        {
                            $proNameFromRow .='<br /> + '.$snd;
                        }
                    }
                }
                else
                {
                    $proNameFromRow=$itm->product_name;
                }
                    }

        $newReceiptProduct .='<tr>
                                    <td valign="top" style="font-size:20px;">'.intval($itm->quantity).'</td>
                                    <td valign="top" align="center" style="font-size:20px;">X</td>
                                    <td valign="top" width="300" style="font-size:20px;"><b>'.$proNameFromRow.'</b></td>
                                    <td valign="top" align="right" style="font-size:20px;">'.number_format($itm->row_total,2).'</td>
                            </tr>
                            <tr>
                                <td colspan="4" style="font-size:5px; line-height:5px;">&nbsp;</td>
                            </tr>';

                $totalPriceAmount+=$itm->row_total;

            endforeach;
        }

        $delivery_charge=2.00;
        $service_charge=1.45;


        //$receiptTotal=$totalPriceAmount+$delivery_charge+$service_charge;

        $receiptTotal=$totalPriceAmount;

        $totalDeduction=$tax_amount+$discount_amount;

        $receiptTotaldue=($receiptTotal-$totalDeduction);
        $autoOrderType=$recType;  

        $totalCustomerOrder=Orders::CustomerOrder(Auth::user()->id)->count();


        if($recType=="Collect"){
                $autoOrderType="Collection";     

                $newHtmlStr='
                <table border="0" align="center" width="300">
                    <tr><td colspan="4" align="center" style="font-size:20px;"><b>'.$ct->contact_title.'</b></td></tr>
                    <tr><td colspan="4" align="center"><b>Tel : '.$ct->contact_phone.'</b></td></tr>
                    <tr><td colspan="4" align="center">'.$ct->contact_address.'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>
                    <tr><td colspan="4" align="center" style="font-size:20px;"><b>'.$autoOrderType.'</b></td></tr>';


                if($cart->deliveryDetail['asap']==2){
                    $newHtmlStr .='<tr><td colspan="4" align="center" style="font-size:16px;">Due '.date('d-M',strtotime($cart->deliveryDetail['delivery_date'])).' at '.$cart->deliveryDetail['delivery_time'].'</td></tr>';
                }elseif($cart->deliveryDetail['asap']==1){
                    $newHtmlStr .='<tr><td colspan="4" align="center" style="font-size:16px;">Due '.date('d-M').' at <b>ASAP</b></td></tr>';
                }


                $newHtmlStr.='<tr><td colspan="4" align="center"><hr /></td></tr>';

                if(!empty($pro->delivery_note))
                {
                    $newHtmlStr.='<tr><td colspan="4" align="left"><b>Restaurants Notes</b></td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">'.$pro->delivery_note.'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }

            

                $newHtmlStr.='<tr><td></td><td></td><td></td><td align="right">GBP</td></tr>
                '.$newReceiptProduct;
                $newHtmlStr.='<tr><td colspan="3">Sub Total</td><td align="right">'.number_format($receiptTotal,2).'</td></tr>';
                    if($tax_amount>0)
                    {

                      $newHtmlStr .='<tr><td colspan="3">'.$tax_title.'</td><td align="right">'.number_format($tax_amount,2).'</td></tr>';

                    }

                    if($discount_amount>0)
                    {
                        $newHtmlStr .='<tr><td colspan="3">'.$discount_title.'</td><td align="right">'.number_format($discount_amount,2).'</td></tr>';
                    }


                $newHtmlStr.='<tr><td colspan="3"></td><td><hr /></td></tr>
                    <tr><td colspan="3" style="font-size:20px;">Total Due</td><td style="font-size:20px;" align="right">'.number_format($receiptTotaldue,2).'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>
                    <tr><td colspan="4" align="center" style="font-size:20px; font-weight: bolder; text-transform: uppercase;">Paid With Paypal</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';

                $newHtmlStr.='<tr><td colspan="4" align="left"><b>Customer Detail</b></td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">Name : '.$delivery->first_name.'</td></tr>
                    <tr><td colspan="4" align="left">&nbsp;</td></tr>
                    <tr><td colspan="4" align="left">Customer Number:</td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;"><b>'.$delivery->mobile_phone.'</b></td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                
                if($totalCustomerOrder==1)
                {
                    $newHtmlStr.='<tr><td colspan="4" align="center" style="font-size:18px; text-transform: uppercase; font-weight: 600;">New Customer</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }else{
                    $newHtmlStr.='<tr><td colspan="4" align="center" style="font-size:18px; text-transform: uppercase; font-weight: 600;">Old Customer</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }

                $newHtmlStr.='<tr><td colspan="4" align="left">Customer Orders: '.$totalCustomerOrder.'</td></tr>
                                <tr><td colspan="4" width="50" align="left">Order Placed At     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    '.date('H:i d-M').'</td></tr>
                            </table>'; 
            

        }else{

                $newHtmlStr='
                    <table border="0" align="center" width="300">
                    <tr><td colspan="4" align="center" style="font-size:20px;"><b>'.$ct->contact_title.'</b></td></tr>
                    <tr><td colspan="4" align="center"><b>Tel : '.$ct->contact_phone.'</b></td></tr>
                    <tr><td colspan="4" align="center">'.$ct->contact_address.'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>
                    <tr><td colspan="4" align="center" style="font-size:20px;"><b>'.$autoOrderType.'</b></td></tr>';

                if($cart->deliveryDetail['asap']==2){
                    $newHtmlStr .='<tr><td colspan="4" align="center" style="font-size:16px;">Due '.date('d-M',strtotime($cart->deliveryDetail['delivery_date'])).' at '.$cart->deliveryDetail['delivery_time'].'</td></tr>';
                }elseif($cart->deliveryDetail['asap']==1){
                    $newHtmlStr .='<tr><td colspan="4" align="center" style="font-size:16px;">Due '.date('d-M').' at <b>ASAP</b></td></tr>';
                }
            
                $newHtmlStr.='<tr><td colspan="4" align="center"><hr /></td></tr>';


                if(!empty($pro->delivery_note))
                {
                    $newHtmlStr.='<tr><td colspan="4" align="left"><b>Restaurants Notes</b></td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">'.$pro->delivery_note.'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }


                $newHtmlStr.='<tr><td></td><td></td><td></td><td align="right">GBP</td></tr>
                '.$newReceiptProduct;

                $newHtmlStr.='<tr><td colspan="3">Sub Total</td><td align="right">'.number_format($receiptTotal,2).'</td></tr>';
                if($tax_amount>0)
                {
                  $newHtmlStr .='<tr><td colspan="3">'.$tax_title.'</td><td align="right">'.number_format($tax_amount,2).'</td></tr>';
                }

                if($discount_amount>0)
                {
                    $newHtmlStr .='<tr><td colspan="3">'.$discount_title.'</td><td align="right">'.number_format($discount_amount,2).'</td></tr>';
                }


                $newHtmlStr.='<tr><td colspan="3"></td><td><hr /></td></tr>
                    <tr><td colspan="3" style="font-size:20px;">Total Due</td><td style="font-size:20px;" align="right">'.number_format($receiptTotaldue,2).'</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>
                    <tr><td colspan="4" align="center" style="font-size:20px; font-weight: bolder; text-transform: uppercase;">Paid With Paypal</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';

                $newHtmlStr.='<tr><td colspan="4" align="left"><b>Customer Detail</b></td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">Name : '.$delivery->first_name.'</td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">Address : '.$delivery->address.'</td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;">Post Code : '.$delivery->zip_code.'</td></tr>
                    <tr><td colspan="4" align="left">&nbsp;</td></tr>
                    <tr><td colspan="4" align="left">Customer Number:</td></tr>
                    <tr><td colspan="4" align="left" style="font-size:22px;"><b>'.$delivery->mobile_phone.'</b></td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';

                if($totalCustomerOrder==1)
                {
                    $newHtmlStr.='<tr><td colspan="4" align="center" style="font-size:18px; text-transform: uppercase; font-weight: 600;">New Customer</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }else{
                    $newHtmlStr.='<tr><td colspan="4" align="center" style="font-size:18px; text-transform: uppercase; font-weight: 600;">Old Customer</td></tr>
                    <tr><td colspan="4" align="center"><hr /></td></tr>';
                }
            

                $newHtmlStr.='<tr><td colspan="4" align="left">Customer Orders: '.$totalCustomerOrder.'</td></tr>
                    <tr><td colspan="4" width="50" align="left">Order Placed At     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    '.date('H:i d-M').'</td></tr>
                    </table>';

        }






            $this->sdc->initMail(
            $delivery->email,
            $this->sdc->order_admin_email,
            'Online Order Receipt - '.$this->sdc->SiteName,
            $this->sdc->TableUserOrder($delivery->first_name,$this->sdc->SiteName).'<br>'.$siteMessage.$siteRegards,'');

            $this->sdc->initMail(
            $this->sdc->order_admin_email,
            $delivery->email,
            'Admin Order Receipt - '.$this->sdc->SiteName,
            $newHtmlStr,'printordergt90@tandoorimahalonline.co.uk');


/*



                $this->sdc->initMail(
                    $delivery->email,
                    $this->sdc->order_admin_email,
                    'Online Order Receipt - '.$this->sdc->SiteName,
                    $this->sdc->TableUserOrder($full_cus_name,$this->sdc->SiteName).'<br>'.$siteMessage.$siteRegards);

                $this->sdc->initMail(
                    $this->sdc->order_admin_email,
                    $delivery->email,
                    'Admin Order Receipt - '.$this->sdc->SiteName,
                    $this->sdc->TableAdminOrder($this->sdc->SiteName).'<br>'.$siteMessage,'printordergt90@bombaynite.com');*/


                $cart = Session::has('cart') ? Session::get('cart') : null;
                $Ncart = new Cart($cart);
                $Ncart->ClearCart();
                $request->session()->put('cart', $Ncart);

                return redirect('complete-payment')->with('status', 'Many thanks your Order at lovegoldenbengal.co.uk. Please allow 45-60 minutes for Delivery and around 30 minutes for Collection Order!');
                die();
            }
            else
            {
                \Session::put('error','Payment Failed, Please try again');
               return redirect('payment-method'); die();
            }       

    }

    public function completePayment()
    {

       // echo "Complete Payment"; die();
        

        return view('frontend.pages.checkout.complete-payment');
    }

    public function userDashboard()
    {
        $category=$this->categoryProduct();
        //$product=Product::all();
        $defultReturn=['category'=>$category];

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

        $orderINfo=OrderInfo::orderBy('id','DESC')->first();
        $defultReturn=array_merge($defultReturn,['orderINfoText'=>$orderINfo]);
        
        $custo = Customer::where('email', Auth::user()->email)->first();
        //dd($custo->id);
        $totalorder = Orders::where('cid',Auth::id())->count();
        $defultReturn=array_merge($defultReturn,['totalorder'=>$totalorder]);

        $paidtotalorder = Orders::where('cid',Auth::id())->where('order_status','Paid')->count();
        $defultReturn=array_merge($defultReturn,['paidtotalorder'=>$paidtotalorder]);

        $pendingtotalorder = Orders::where('cid',Auth::id())->where('order_status','Pending')->count();
        $defultReturn=array_merge($defultReturn,['pendingtotalorder'=>$pendingtotalorder]);

        $rejecttotalorder = Orders::where('cid',Auth::id())->where('order_status','Reject')->count();
        $defultReturn=array_merge($defultReturn,['rejecttotalorder'=>$rejecttotalorder]);

        //dd($defultReturn);

        return view('frontend.pages.user.dashboard',$defultReturn);
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

    private function checkColNDelDiscount($rec='')
    {
        if(empty($rec))
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
        else
        {
            $chk=Discount::where('discount_status','Active')
                     ->whereIn('discount_option', [$rec])
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
                              ->whereIn('discount_option', [$rec])
                              ->first();
                //dd($data);
                return $data;
            }
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

    public function cartzipcode(Request $request)
    {
        $delivery_cost=0;
        if(!empty($request->zip_code))
        {
            $dc_count=DeliveryCost::where('zip_code',$request->zip_code)
                        ->where('delivery_status','Active')
                        ->count();
            
            if($dc_count>0)
            {
                $dc=DeliveryCost::select('delivery_cost')
                            ->where('zip_code',$request->zip_code)
                            ->where('delivery_status','Active')
                            ->first();
                $delivery_cost=$dc->delivery_cost;
            }

        }

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->mergeDeliveryCost($delivery_cost);

        $request->session()->put('cart', $cart);
        return response()->json($cart);  

    }

    

    public function addtocart(Request $request)
    {
        if(isset($request->rec))
        {
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->addRec($request->rec);
        }
        elseif(isset($request->snd_item_id))
        {
            $product = Product::find($request->item_id);
            $sndItm = ProductOneSubLevel::find($request->snd_item_id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            if(isset($request->item_sub_cat_name))
            {
                $cart->addSndSubCat($product, $product->id,$sndItm,$sndItm->id,$request->item_sub_cat_name);
            }
            else
            {
                $cart->addSnd($product, $product->id,$sndItm,$sndItm->id);
            }
            
            
        }
        elseif(isset($request->exec_menu))
        {
            parse_str($request->execArrayData, $searcharray);
            //dd($searcharray); 
            $execArrayData=$searcharray;
            $product = Product::find($request->item_id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->addexecMenu($product, $product->id,$execArrayData);
        }
        elseif(isset($request->pizza_menu))
        {
            $postcount=0;
            $nExtra=[];
            $searcharray=json_decode(json_encode(json_decode($request->cartData,true)),true);
            if(isset($searcharray))
            {
                if(count($searcharray)>0)
                {
                    $size=$searcharray['size_info'];;
                    $flabour=$searcharray['flabour'];
                    $extra=$searcharray['extra'];
                    if(count($extra)>0)
                    {
                        
                        foreach($extra as $ex):
                            if(!empty($ex))
                            {
                                $nExtra[]=array(
                                    'extra_name'=>$ex['extra_name'],
                                    'extra_id'=>$ex['extra_id'],
                                    'extra_price'=>$ex['extra_price'],
                                    'extra_quantity'=>$ex['extra_quantity']
                                );
                            }
                            
                        endforeach;
                    }
                }
            }
            //dd($nExtra);
            //$execArrayData=$searcharray;
            $product = Product::find($request->item_id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->addPizzaMenu($product, $product->id,$size,$flabour,$nExtra);
        }
        elseif(isset($request->inclusiveMeal))
        {
            //dd($request);
            $product = InclusiveMeal::find($request->item_id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->addINM($product, $product->id,$request->price,$request->proName,$request->inMealDetail);
        }
        else
        {
            $product = Product::find($request->item_id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            if(isset($request->item_sub_cat_name))
            {
                $cart->addSingleSubcat($product, $product->id,$request->item_sub_cat_name);
            }
            else
            {
                $cart->add($product, $product->id);
            }
            
        }

        $request->session()->put('cart', $cart);
        return response()->json($cart);  
    }

    public function deltocart(Request $request)
    {
        //dd($request->lid);
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->delProductFullRemove($request->lid);

        $request->session()->put('cart', $cart);
        return response()->json($cart); 
    }

    public function typeofdelivery(Request $request)
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return response()->json($cart->rec); 
    }

    public function cartJson()
    {
        $cart = Session::has('cart') ? Session::get('cart') : null;
        return response()->json($cart);  
    }

    public function ClearCart(Request $request)
    {
        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->ClearCart();

        $request->session()->put('cart', $cart);
        return response()->json($cart);  
    }

    public function categoryProduct($filter='')
    {
        $row=[];
        $category=category::where('product','!=',0)
                            //->where('id','52')
                            ->get();
        foreach($category as $index=>$cat)
        {
            $row[$index]['id']=$cat->id;
            $row[$index]['name']=$cat->name;
            $row[$index]['description']=$cat->description;
            $row[$index]['layout']=$cat->layout;
            $row[$index]['product']=$cat->product;
            if($cat->layout==2)
            {
                $subCatData=[];
                $checkSubcid=SubCategory::where('category_id',$cat->id)->count();
                if($checkSubcid > 0)
                {
                    
                    $SubcidData=SubCategory::where('category_id',$cat->id)->get();
                    foreach($SubcidData as $inx=>$sc)
                    {
                        $subCatData[$inx]['id']=$sc->id;
                        $subCatData[$inx]['name']=$sc->name;
                        $subCatData[$inx]['description']=$sc->description;

                        $product_row=[];
                        $product=Product::where('scid',$sc->id)->get();
                        //dd($product);
                        foreach($product as $key=>$pro)
                        {
                            if($pro->product_level_type==1)
                            {
                                $product_row[$key]['id']=$pro->id;
                                $product_row[$key]['name']=$pro->name;
                                $product_row[$key]['price']=$pro->price;
                                $product_row[$key]['interface']=$pro->product_level_type;
                                $product_row[$key]['description']=$pro->description;
                            }
                            elseif($pro->product_level_type==2)
                            {

                                $suboneData=[];
                                $product_row[$key]['id']=$pro->id;
                                $product_row[$key]['name']=$pro->name;
                                $product_row[$key]['price']=$pro->price;
                                $product_row[$key]['interface']=$pro->product_level_type;
                                $product_row[$key]['description']=$pro->description;
                                $subOne=ProductOneSubLevel::where('pid',$pro->id)->get();
                                foreach($subOne as $soIndex=>$so)
                                {
                                    $suboneData[$soIndex]['id']=$so->id;
                                    $suboneData[$soIndex]['name']=$so->name;
                                    $suboneData[$soIndex]['price']=$so->price;
                                }
                                $product_row[$key]['ProductOneSubLevel']=$suboneData;
                            }
                            elseif($pro->product_level_type==3)
                            {

                                $suboneDatamodal=[];
                                $product_row[$key]['id']=$pro->id;
                                $product_row[$key]['name']=$pro->name;
                                $product_row[$key]['price']=$pro->price;
                                $product_row[$key]['interface']=$pro->product_level_type;
                                $product_row[$key]['description']=$pro->description;
                                $subOne=ProductOneSubLevel::where('pid',$pro->id)->get();

                                foreach($subOne as $soIndex=>$so)
                                {
                                    $suboneDatamodal[$soIndex]['id']=$so->id;
                                    $suboneDatamodal[$soIndex]['name']=$so->name;
                                    $suboneDatamodal[$soIndex]['price']=$so->price;
                                }

                                $product_row[$key]['modal']=$suboneDatamodal;
                            }
                            elseif($pro->product_level_type==4)
                            {
                                $suboneData=[];
                                $product_row[$key]['id']=$pro->id;
                                $product_row[$key]['name']=$pro->name;
                                $product_row[$key]['price']=$pro->price;
                                $product_row[$key]['interface']=$pro->product_level_type;
                                $product_row[$key]['description']=$pro->description;
                                $subOne=ProductOneSubLevel::where('pid',$pro->id)->get();
                                foreach($subOne as $soIndex=>$so)
                                {
                                    $suboneData[$soIndex]['id']=$so->id;
                                    $suboneData[$soIndex]['name']=str_replace('&','&amp;',$so->name);
                                    $suboneData[$soIndex]['is_parent']=$so->parent_id;
                                    $dpsOP=explode(',', str_replace('&','&amp;',$so->description));
                                    $suboneData[$soIndex]['dropdown']=$dpsOP;


                                }

                                $product_row[$key]['ProductOneSubLevel']=$suboneData;
                            }
                            elseif($pro->product_level_type==5)
                            {
                                $suboneData=[];
                                $product_row[$key]['id']=$pro->id;
                                $product_row[$key]['name']=$pro->name;
                                $product_row[$key]['price']=$pro->price;
                                $product_row[$key]['interface']=$pro->product_level_type;
                                $product_row[$key]['description']=$pro->description;
                                
                                $pizzaSize=[];
                                $pizzaSql=PizzaSize::where('pid',$pro->id)->get();
                                foreach($pizzaSql as $SizeIndex=>$sz)
                                {
                                    $pizzaSize[$SizeIndex]['id']=$sz->id;
                                    $pizzaSize[$SizeIndex]['name']=$sz->name;
                                    $pizzaSize[$SizeIndex]['price']=$sz->price;
                                }
                                $product_row[$key]['PizzaSize']=$pizzaSize;

                                $PiFlabour=[];
                                $pizzaSql=PizzaFlabour::where('pid',$pro->id)->get();
                                foreach($pizzaSql as $plIndex=>$sl)
                                {
                                    $PiFlabour[$plIndex]['id']=$sl->id;
                                    $PiFlabour[$plIndex]['name']=$sl->name;
                                    $PiFlabour[$plIndex]['price']=$sl->price;
                                }
                                $product_row[$key]['PizzaFlabour']=$PiFlabour;


                                $suboneData=[];
                                $subOne=ProductOneSubLevel::where('pid',$pro->id)->get();
                                foreach($subOne as $soIndex=>$so)
                                {
                                    $suboneData[$soIndex]['id']=$so->id;
                                    $suboneData[$soIndex]['name']=$so->name;
                                    $suboneData[$soIndex]['price']=$so->price;
                                }

                                $product_row[$key]['pizzaExtra']=$suboneData;
                            }
                        }

                        //dd($product_row);

                        $subCatData[$inx]['sub_product_row']=$product_row;
                    }
                       
                }

                $row[$index]['product_row']=$subCatData; 
                
            }
            else
            {
                $product_row=[];
                $product=Product::where('cid',$cat->id)->get();

                foreach($product as $key=>$pro)
                {
                   

                    if($pro->product_level_type==1)
                    {
                        $product_row[$key]['id']=$pro->id;
                        $product_row[$key]['name']=$pro->name;
                        $product_row[$key]['price']=$pro->price;
                        $product_row[$key]['interface']=$pro->product_level_type;
                        $product_row[$key]['description']=$pro->description;
                    }
                    elseif($pro->product_level_type==2)
                    {

                        $suboneData=[];
                        $product_row[$key]['id']=$pro->id;
                        $product_row[$key]['name']=$pro->name;
                        $product_row[$key]['price']=$pro->price;
                        $product_row[$key]['interface']=$pro->product_level_type;
                        $product_row[$key]['description']=$pro->description;
                        $subOne=ProductOneSubLevel::where('pid',$pro->id)->get();
                        foreach($subOne as $soIndex=>$so)
                        {
                            $suboneData[$soIndex]['id']=$so->id;
                            $suboneData[$soIndex]['name']=$so->name;
                            $suboneData[$soIndex]['price']=$so->price;
                        }
                        $product_row[$key]['ProductOneSubLevel']=$suboneData;
                    }
                    elseif($pro->product_level_type==3)
                    {

                        $suboneDatamodal=[];
                        $product_row[$key]['id']=$pro->id;
                        $product_row[$key]['name']=$pro->name;
                        $product_row[$key]['price']=$pro->price;
                        $product_row[$key]['interface']=$pro->product_level_type;
                        $product_row[$key]['description']=$pro->description;
                        $subOne=ProductOneSubLevel::where('pid',$pro->id)->get();

                        foreach($subOne as $soIndex=>$so)
                        {
                            $suboneDatamodal[$soIndex]['id']=$so->id;
                            $suboneDatamodal[$soIndex]['name']=$so->name;
                            $suboneDatamodal[$soIndex]['price']=$so->price;
                        }

                        $product_row[$key]['modal']=$suboneDatamodal;
                    }
                    elseif($pro->product_level_type==4)
                    {
                        $suboneData=[];
                        $product_row[$key]['id']=$pro->id;
                        $product_row[$key]['name']=$pro->name;
                        $product_row[$key]['price']=$pro->price;
                        $product_row[$key]['interface']=$pro->product_level_type;
                        $product_row[$key]['description']=$pro->description;
                        $subOne=ProductOneSubLevel::where('pid',$pro->id)->get();
                        foreach($subOne as $soIndex=>$so)
                        {
                            $suboneData[$soIndex]['id']=$so->id;
                            $suboneData[$soIndex]['name']=str_replace('&','&amp;',$so->name);
                            $suboneData[$soIndex]['is_parent']=$so->parent_id;
                            $dpsOP=explode(',', str_replace('&','&amp;',$so->description));
                            $suboneData[$soIndex]['dropdown']=$dpsOP;


                        }

                        $product_row[$key]['ProductOneSubLevel']=$suboneData;
                    }
                    elseif($pro->product_level_type==5)
                    {
                        $suboneData=[];
                        $product_row[$key]['id']=$pro->id;
                        $product_row[$key]['name']=$pro->name;
                        $product_row[$key]['price']=$pro->price;
                        $product_row[$key]['interface']=$pro->product_level_type;
                        $product_row[$key]['description']=$pro->description;
                        
                        $pizzaSize=[];
                        $pizzaSql=PizzaSize::where('pid',$pro->id)->get();
                        foreach($pizzaSql as $SizeIndex=>$sz)
                        {
                            $pizzaSize[$SizeIndex]['id']=$sz->id;
                            $pizzaSize[$SizeIndex]['name']=$sz->name;
                            $pizzaSize[$SizeIndex]['price']=$sz->price;
                        }
                        $product_row[$key]['PizzaSize']=$pizzaSize;

                        $PiFlabour=[];
                        $pizzaSql=PizzaFlabour::where('pid',$pro->id)->get();
                        foreach($pizzaSql as $plIndex=>$sl)
                        {
                            $PiFlabour[$plIndex]['id']=$sl->id;
                            $PiFlabour[$plIndex]['name']=$sl->name;
                            $PiFlabour[$plIndex]['price']=$sl->price;
                        }
                        $product_row[$key]['PizzaFlabour']=$PiFlabour;


                        $suboneData=[];
                        $subOne=ProductOneSubLevel::where('pid',$pro->id)->get();
                        foreach($subOne as $soIndex=>$so)
                        {
                            $suboneData[$soIndex]['id']=$so->id;
                            $suboneData[$soIndex]['name']=$so->name;
                            $suboneData[$soIndex]['price']=$so->price;
                        }

                        $product_row[$key]['pizzaExtra']=$suboneData;


                    }
                }

                $row[$index]['product_row']=$product_row;
            }

        }
        //dd($row);
        return $row;
    }

    public function product()
    {
        $product=$this->categoryProduct(
        );
        return response()->json($product);
    }

    public function getPayment(Request $request)
    {

        $paypalSQL=PaypalSetting::find(1);

        $category=$this->categoryProduct();
        //$product=Product::all();
        $defultReturn=['category'=>$category,'paypalData'=>$paypalSQL];

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



        $orderINfo=OrderInfo::orderBy('id','DESC')->first();
        $defultReturn=array_merge($defultReturn,['orderINfoText'=>$orderINfo]);

        
        return view('frontend.pages.checkout.select-payment',$defultReturn);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductItem  $productItem
     * @return \Illuminate\Http\Response
     */
    public function show(ProductItem $productItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductItem  $productItem
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductItem $productItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductItem  $productItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductItem $productItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductItem  $productItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductItem $productItem)
    {
        //
    }
}

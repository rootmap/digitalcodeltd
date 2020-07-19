<?php

namespace App\Http\Controllers;

use App\OrderItem;
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


class OrderItemController extends Controller
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
        
        $paypal_conf=\Config::get('paypal');
        $this->_api_content=new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret']
        ));

        $this->_api_content->setConfig($paypal_conf['settings']);
    }

     public function index()
    {
        //
    }
    //paypal intregation start
    public function paywithpaypal()
    {
        // After Step 2
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");

        $item1 = new Item();
        $item1->setName('Ground Coffee 40 oz')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku("123123") // Similar to `item_number` in Classic API
            ->setPrice(7.5);
        $item2 = new Item();
        $item2->setName('Granola bars')
            ->setCurrency('USD')
            ->setQuantity(5)
            ->setSku("321321") // Similar to `item_number` in Classic API
            ->setPrice(2);

        $itemList = new ItemList();
        $itemList->setItems(array($item1, $item2));   

        $details = new Details();
        $details->setShipping(1.2)
            ->setTax(1.3)
            ->setSubtotal(17.50); 

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal(20)
            ->setDetails($details);   
        
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Payment description")
            ->setInvoiceNumber(uniqid()); 

        //$baseUrl = url();
        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(url('paypal/success'))
            ->setCancelUrl(url('paypal/cancel'));

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrls)
            ->setTransactions(array($transaction));


        try {
            $payment->create($this->_api_content);
        } catch (\PayPal\Exception\PPConnectionException $ex) {
            if(\Config::get('app.debug'))
            {
                \Session::put('error','Connection has timeout.!!!!, Please try again.');
                return redirect('paypal');
            }
            else
            {
                \Session::put('error','Something went wrong.!!!!, Please try again.');
                return redirect('paypal');
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
        return redirect('paypal');

    }

    public function paypal(Request $request)
    {
       return view('paypal.paywithpaypal');
    }

    public function getPaymentStatus(Request $request,$status='fahad')
    {
        $payment_id=\Session::get('paypal_payment_id');
                    \Session::forget('paypal_payment_id');

        if(empty($request->PayerID) || empty($request->token))
        {
            \Session::put('error','Failed token mismatch, Please tryagain');
            return redirect('paypal');
        }

        $payment=Payment::get($payment_id,$this->_api_content);
        $excution=new PaymentExecution();
        $excution->setPayerId($request->PayerID);

        $result=$payment->execute($excution,$this->_api_content);

        if($result->getState()=='approved')
        {
            \Session::put('success','Payment successful.');
            return redirect('paypal'); die();
        }
        else
        {
            \Session::put('error','Payment Failed, Please tryagain');
            return redirect('paypal');
        }

    }

    public function getPaymentStatusPaypal(Request $request,$invoice_id=0,$status='fahad')
    {
        //dd($invoice_id);
        $payment_id=\Session::get('paypal_payment_id');
                    \Session::forget('paypal_payment_id');

        if(empty($request->PayerID) || empty($request->token))
        {
            \Session::put('error','Failed token mismatch, Please tryagain');
            return redirect('invoice/pay/'.$invoice_id);
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

            $tenderData=Tender::where('paypal',1)->first();

            $invoiceData=Invoice::where('invoice_id',$invoice_id)->first();
            $invoiceData->tender_id=$tenderData->id;
            $invoiceData->tender_name=$tenderData->name;
            $invoiceData->invoice_status='Paid';
            $total_profit=$invoiceData->total_amount-$invoiceData->total_cost;
            $invoiceData->total_profit=$total_profit;
            $invoiceData->save();

            $cusInfo=Customer::find($invoiceData->customer_id);

            $invoicePay=new InvoicePayment;
            $invoicePay->invoice_id=$invoice_id;
            $invoicePay->customer_id=$invoiceData->customer_id;
            $invoicePay->customer_name=$cusInfo->name;
            $invoicePay->tender_id=$tenderData->id;
            $invoicePay->tender_name=$tenderData->name;
            $invoicePay->total_amount=$invoiceData->total_amount;
            $invoicePay->paid_amount=$amountPaid;
            $invoicePay->store_id=$invoiceData->store_id;
            $invoicePay->created_by=$invoiceData->created_by;
            $invoicePay->save();
            
            \Session::put('success','Payment successful.');
            return redirect('invoice/pay/'.$invoice_id); die();
        }
        else
        {
            \Session::put('error','Payment Failed, Please tryagain');
           return redirect('invoice/pay/'.$invoice_id);
        }

    }

    public function getPOSPaymentStatusPaypal(Request $request,$invoice_id=0,$status='fahad')
    {
        //dd($invoice_id);
        $payment_id=\Session::get('paypal_payment_id');
                    \Session::forget('paypal_payment_id');

        if(empty($request->PayerID) || empty($request->token))
        {
            \Session::put('error','Failed token mismatch, Please tryagain');
            return redirect('pos');
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

            $tenderData=Tender::where('paypal',1)->first();

            $invoiceData=Invoice::where('invoice_id',$invoice_id)->first();
            $invoiceData->tender_id=$tenderData->id;
            $invoiceData->tender_name=$tenderData->name;
            $invoiceData->invoice_status='Paid';
            $total_profit=$invoiceData->total_amount-$invoiceData->total_cost;
            $invoiceData->total_profit=$total_profit;
            $invoiceData->save();

            //dd($invoiceData);

            $cusInfo=Customer::find($invoiceData->customer_id);

            $invoicePay=new InvoicePayment;
            $invoicePay->invoice_id=$invoice_id;
            $invoicePay->customer_id=$invoiceData->customer_id;
            $invoicePay->customer_name=$cusInfo->name;
            $invoicePay->tender_id=$tenderData->id;
            $invoicePay->tender_name=$tenderData->name;
            $invoicePay->total_amount=$invoiceData->total_amount;
            $invoicePay->paid_amount=$amountPaid;
            $invoicePay->store_id=$invoiceData->store_id;
            $invoicePay->created_by=$invoiceData->created_by;
            $invoicePay->save();

            $cart = Session::has('Pos') ? Session::get('Pos') : null;
            $Ncart = new Pos($cart);
            $Ncart->ClearCart();
            Session::put('Pos', $Ncart);
            
            \Session::put('success','Paypal payment successfully accepted.');
            return redirect('pos'); die();
        }
        else
        {
            \Session::put('error','Payment Failed, Please tryagain');
           return redirect('pos'); die();
        }

    }


    public function paywithpaypalInvoice(Invoice $invoice,$invoice_id=0)
    {
        if(!empty($invoice_id))
        {



            $tab_invoice=$invoice::Leftjoin('tenders','invoices.tender_id','=','tenders.id')
                                 ->select('invoices.id',
                                          'invoices.tax_rate',
                                          'invoices.total_tax',
                                          'invoices.discount_type',
                                          'invoices.sales_discount',
                                          'invoices.discount_total',
                                          'invoices.total_amount',
                                          'invoices.invoice_id',
                                          "tenders.name as tender",
                                          'invoices.store_id',
                                          'invoices.created_at',
                                          'invoices.customer_id')
                                 ->where('invoices.invoice_id',$invoice_id)
                                 ->first();
            $invoice_payment=InvoicePayment::where('invoice_id',$tab_invoice->invoice_id)
                                 //->groupBy("invoice_id")
                                 ->sum('paid_amount');

            //print_r($invoice_payment);   die();                  

            $tab_customer=Customer::find($tab_invoice->customer_id);


            $tab_invoice_product=InvoiceProduct::join('products','invoice_products.product_id','=','products.id')
                                               ->where('invoice_products.invoice_id',$tab_invoice->invoice_id)
                                               ->select('invoice_products.*','products.name as product_name')
                                               ->get();

            $chkEmailInvoice=AuthorizeNetPayment::where('store_id',$tab_invoice->store_id)
                                                ->where('active_module_for_email_invoice',1)
                                                ->count();

            $chkAuthorizeNetPayment=AuthorizeNetPayment::where('store_id',$tab_invoice->store_id)
                                                ->where('active_module_for_email_invoice',1)
                                                ->count();

            //echo $tab_invoice->store_id; die();
            $authorizeNettender=Tender::where('authorizenet',1)->get();
            $payPaltender=Tender::where('paypal',1)->get();
            $InvInfo=$this->sdc->Invlayout($tab_invoice->store_id);
            
            $invoice_due_amount=number_format(($tab_invoice->total_amount-$invoice_payment),2);

            //echo $invoice_due_amount; die();


            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            $item1 = new Item();
            $item1->setName('Invoice - '.$invoice_id)
                ->setCurrency('USD')
                ->setQuantity(1)
                ->setSku($tab_invoice->id) // Similar to `item_number` in Classic API
                ->setPrice($invoice_due_amount);
            


            $itemList = new ItemList();
            $itemList->setItems(array($item1));   

            $details = new Details();
            $details->setSubtotal($invoice_due_amount); 

            $amount = new Amount();
            $amount->setCurrency("USD")
                ->setTotal($invoice_due_amount)
                ->setDetails($details);   
            
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Invoice Payment description")
                ->setInvoiceNumber(uniqid()); 

            //$baseUrl = url();
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl(url('invoice/payment/paypal/'.$invoice_id.'/success'))
                ->setCancelUrl(url('invoice/payment/paypal/'.$invoice_id.'/cancel'));

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
                    return redirect('invoice/pay/'.$invoice_id);
                }
                else
                {
                    \Session::put('error','Something went wrong.!!!!, Please try again.');
                    return redirect('invoice/pay/'.$invoice_id);
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
            return redirect('invoice/pay/'.$invoice_id);
            
        }
        else
        {
            return redirect('invoice/pay/'.$invoice_id)->with('error', $this->moduleName.' Invoice failed to load, Please try again. !'); 
        }
    }

    public function posPayPaypal()
    {
       $cart = Session::has('Pos') ? Session::get('Pos') : null;
       $countItems=count($cart->items);
       $total_amount_invoice=0;
       $total_cost_invoice=0;
       $total_profit_invoice=0;
       $total_sold_quantity=0;

       $discount_type=0;
       $discount_amount=0;
       $discount_total=0;

       if($countItems>0)
       {
            $invoice_id=$cart->invoiceID;
            if(empty($invoice_id))
            {
                $invoice_id=time();
            }

            foreach($cart->items as $row):
                $pid=$row['item_id'];
                $quantity=$row['qty'];
                $unitprice=$row['unitprice'];
                $pro=Product::find($pid);
                $tab_stock=new InvoiceProduct;
                $tab_stock->invoice_id=$invoice_id;
                $tab_stock->product_id=$pid;
                $tab_stock->tax_percent=$cart->TaxRate;
                $tab_stock->tax_amount=$row['tax'];
                $tab_stock->quantity=$quantity;
                $tab_stock->price=$unitprice;
                $tab_stock->cost=$pro->cost;
                $tab_stock->total_price=($quantity*$unitprice);
                $tab_stock->total_cost=($quantity*$pro->cost);
                $tab_stock->store_id=$this->sdc->storeID();
                $tab_stock->created_by=$this->sdc->UserID();
                $tab_stock->save();

                Product::where('id',$pid)
                ->update([
                   'quantity' => \DB::raw('quantity - '.$quantity),
                   'sold_times' => \DB::raw('sold_times + 1')
                ]);

                $amount_invoice=($quantity*$unitprice);
                $cost_invoice=($quantity*$pro->cost);
                $profit_invoice=$amount_invoice-$cost_invoice;
                $total_amount_invoice+=$amount_invoice;
                $total_cost_invoice+=$cost_invoice;
                $total_profit_invoice+=$profit_invoice;
                $total_sold_quantity+=$quantity;
            endforeach;

            
            $discount_type=$cart->discount_type;
            $discount_amount=$cart->sales_discount;
            if(!empty($discount_type))
            {
                if(!empty($discount_amount))
                {
                    if($discount_type==1)
                    {
                        $discount_total=$discount_amount;
                    }
                    elseif($discount_type==2)
                    {
                        $discount_total=(($total_amount_invoice*$discount_amount)/100);
                    }
                }
            }

            

            $taxAmount=(($total_amount_invoice*$cart->TaxRate)/100);
            $total_amount_invoice-=$discount_total;
            $total_amount_invoice+=$taxAmount;

            $sqlTender=Tender::find($cart->paymentMethodID);
            $tender_name="";
            $invoiceStatus="Due";
            if(isset($sqlTender))
            {
                $tender_name=$sqlTender->name?$sqlTender->name:'';
                if(isset($cart->paid))
                {
                    if(!empty($cart->paid))
                    {
                        if($total_amount_invoice>$cart->paid)
                        {
                            $invoiceStatus="Partial";
                        }
                        elseif($total_amount_invoice==$cart->paid)
                        {
                            $invoiceStatus="Paid";
                        }
                        elseif($total_amount_invoice<=$cart->paid)
                        {
                            $invoiceStatus="Paid";
                        }
                    }
                    
                }
                
            }

            $tab=new Invoice;
            $tab->invoice_id=$invoice_id;
            $tab->customer_id=$cart->customerID;
            $tab->tender_id=$cart->paymentMethodID;
            $tab->tender_name=$tender_name;
            $tab->invoice_status=$invoiceStatus;
            $tab->tax_rate=$cart->TaxRate;
            $tab->total_tax=$taxAmount;
            $tab->discount_type=$discount_type;
            $tab->sales_discount=$discount_amount;
            $tab->discount_total=$discount_total;
            $tab->total_amount=$total_amount_invoice;
            $tab->total_cost=$total_cost_invoice;
            $tab->total_profit=$total_profit_invoice;
            $tab->store_id=$this->sdc->storeID();
            $tab->created_by=$this->sdc->UserID();
            $tab->save();
            $nid=$tab->id;

            $tabCus=Customer::find($cart->customerID);
            $tabCus->last_invoice_no=$invoice_id;
            $tabCus->save();
            $customer_name=$tabCus->name;

            

            /*$tabInPay=new InvoicePayment;
            $tabInPay->invoice_id=$invoice_id;
            $tabInPay->customer_id=$cart->customerID;
            $tabInPay->customer_name=$customer_name;
            $tabInPay->tender_id=$cart->paymentMethodID;
            $tabInPay->tender_name=$tender_name;
            $tabInPay->total_amount=$total_amount_invoice;
            $tabInPay->paid_amount=$cart->paid;
            $tabInPay->store_id=$this->sdc->storeID();
            $tabInPay->created_by=$this->sdc->UserID();
            $tabInPay->save();*/

            $this->sdc->log("sales","Invoice Created, Invoice ID : ".$invoice_id);

            RetailPosSummary::where('id',1)
            ->update([
               'sales_invoice_quantity' => \DB::raw('sales_invoice_quantity + 1'),
               'sales_quantity' => \DB::raw('sales_quantity + '.$total_sold_quantity),
               'sales_amount' => \DB::raw('sales_amount + '.$total_amount_invoice),
               'sales_cost' => \DB::raw('sales_cost + '.$total_cost_invoice),
               'sales_profit' => \DB::raw('sales_profit + '.$total_profit_invoice),
               'product_quantity' => \DB::raw('product_quantity - '.$total_sold_quantity)
            ]);

            $Todaydate=date('Y-m-d');
            if(RetailPosSummaryDateWise::where('report_date',$Todaydate)->count()==0)
            {
                RetailPosSummaryDateWise::insert([
                   'report_date'=>$Todaydate,
                   'sales_invoice_quantity' => \DB::raw('1'),
                   'sales_quantity' => \DB::raw($total_sold_quantity),
                   'sales_amount' => \DB::raw($total_amount_invoice),
                   'sales_cost' => \DB::raw($total_cost_invoice),
                   'sales_profit' => \DB::raw($total_profit_invoice)
                ]);
            }
            else
            {
                RetailPosSummaryDateWise::where('report_date',$Todaydate)
                ->update([
                   'sales_invoice_quantity' => \DB::raw('sales_invoice_quantity + 1'),
                   'sales_quantity' => \DB::raw('sales_quantity + '.$total_sold_quantity),
                   'sales_amount' => \DB::raw('sales_amount + '.$total_amount_invoice),
                   'sales_cost' => \DB::raw('sales_cost + '.$total_cost_invoice),
                   'sales_profit' => \DB::raw('sales_profit + '.$total_profit_invoice)
                ]);
            }

            $edQr=$this->sdc->invoiceEmailTemplate();
            $emaillayoutData=$edQr['editData'];
            $bcc=$emaillayoutData->bcc?$emaillayoutData->bcc:'';

            $tabsse=new SendSalesEmail;
            $tabsse->invoice_id=$invoice_id;
            $tabsse->email_address=$tabCus->email;
            $tabsse->bcc_email_address=$bcc;
            $tabsse->email_process_type=$emaillayoutData->email_time;
            $tabsse->store_id=$this->sdc->storeID();
            $tabsse->created_by=$this->sdc->UserID();
            $tabsse->save();

            
            
            $payer = new Payer();
            $payer->setPaymentMethod("paypal");

            $item1 = new Item();
            $item1->setName('Invoice - '.$invoice_id)
                    ->setCurrency('USD')
                    ->setQuantity(1)
                    ->setSku($nid) // Similar to `item_number` in Classic API
                    ->setPrice($total_amount_invoice);
            


            $itemList = new ItemList();
            $itemList->setItems(array($item1));   

            $details = new Details();
            $details->setSubtotal($total_amount_invoice); 

            $amount = new Amount();
            $amount->setCurrency("USD")
                    ->setTotal($total_amount_invoice)
                    ->setDetails($details);   
            
            $transaction = new Transaction();
            $transaction->setAmount($amount)
                ->setItemList($itemList)
                ->setDescription("Invoice Payment description")
                ->setInvoiceNumber(uniqid()); 

            //$baseUrl = url();
            $redirectUrls = new RedirectUrls();
            $redirectUrls->setReturnUrl(url('pos/payment/paypal/'.$invoice_id.'/success'))
                ->setCancelUrl(url('pos/payment/paypal/'.$invoice_id.'/cancel'));

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
                    return redirect('pos');
                }
                else
                {
                    \Session::put('error','Something went wrong.!!!!, Please try again.');
                    return redirect('pos');
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
            return redirect('pos');
            
       }
       else
       {
            \Session::put('error','No item in cart, Please try again.!!!!!');
            return redirect('pos');
       }
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
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function show(OrderItem $orderItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderItem $orderItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderItem $orderItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderItem  $orderItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderItem $orderItem)
    {
        //
    }
}

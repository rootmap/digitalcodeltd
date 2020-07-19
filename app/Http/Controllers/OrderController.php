<?php



namespace App\Http\Controllers;



use App\Http\Requests;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

use App\Customer;

use App\Product;
use App\ContactDetail;

use App\Orders;

use App\OrdersItem;

use App\DeliveryAddress;

use App\payment_method;

use App\OrderTransaction;
use App\Discount;

use Symfony\Component\HttpFoundation\File;

use Auth;

class OrderController extends Controller {



    /**

     * Display a listing of the resource.

     *

     * @return Response

     */

    public function index() {

        return view('order.index');

    }



    public function orderReport() {

        return view('order.order-report');

    }

    

    public function orderReportToday() {

        return view('order.order-report-today');

    }



    public function orderspaidreport() {

        return view('order.paid');

    }



    public function orderscancelreport() {

        return view('order.cancel');

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return Response

     */

    public function create() {

        $cat = Customer::all();

        $pro = Product::all();

        return view('order.create', ['cat' => $cat, 'pro' => $pro]);

    }



    public function filterorderproduct(Request $request) {

        $query = DB::table('products')->where('id', $request->pid)->get();

        return response()->json($query);

    }



    public function UserOrderAll()

    {

        if(Auth::check())

        {

          $cid=Auth::user()->id;

          $order =Orders::where('cid',$cid)->orderBy('id','DESC')->get();

          return view('frontend.pages.user.all-order',['data'=>$order]);

        }

        else

        {

            return redirect('user-login')->with('error', 'Session Expired, Please login again.');

        }

    }



    public function UserOrderPaid()

    {

        if(Auth::check())

        {

          $cid=Auth::user()->id;

          $order =Orders::where('cid',$cid)->where('order_status','Paid')->orderBy('id','DESC')->get();

          return view('frontend.pages.user.paid-order',['data'=>$order]);

        }

        else

        {

            return redirect('user-login')->with('error', 'Session Expired, Please login again.');

        }

    }



    public function UserOrderPending()

    {

        if(Auth::check())

        {

          $cid=Auth::user()->id;

          $order =Orders::where('cid',$cid)->where('order_status','Pending')->orderBy('id','DESC')->get();

          return view('frontend.pages.user.pending-order',['data'=>$order]);

        }

        else

        {

            return redirect('user-login')->with('error', 'Session Expired, Please login again.');

        }

    }



    public function UserOrderRejected()

    {

        if(Auth::check())

        {

          $cid=Auth::user()->id;

          $order =Orders::where('cid',$cid)->where('order_status','Cancel')->orderBy('id','DESC')->get();

          return view('frontend.pages.user.rejected-order',['data'=>$order]);

        }

        else

        {

            return redirect('user-login')->with('error', 'Session Expired, Please login again.');

        }

    }



    public function UserOrderDetail($order_id)

    {

        if(Auth::check())

        {

          

          $cid=Auth::user()->id;

          $customerInfo=DeliveryAddress::where('customer_id',$cid)->orderBy('id','DESC')->first();

          $orderItem=OrdersItem::leftjoin('products','orders_items.pid','=','products.id')->select('orders_items.*','products.name as pname')->where('order_id',$order_id)->get();

          //dd($orderItem);

          $order =Orders::where('cid',$cid)->where('id',$order_id)->first();

          return view('frontend.pages.user.view-order',[
            'order_detail'=>$order,

            'order_id'=>$order_id,

            'customerInfo'=>$customerInfo,

            'orderItem'=>$orderItem

          ]);

        }

        else

        {

            return redirect('user-login')->with('error', 'Session Expired, Please login again.');

        }

    }



    public function UserDetail()

    {

        if(Auth::check())

        {

          $cid=Auth::user()->id;

          $customerInfo=DeliveryAddress::where('customer_id',$cid)->orderBy('id','DESC')->first();

          

          return view('frontend.pages.user.view-profile',[

            'customerInfo'=>$customerInfo

          ]);

        }

        else

        {

            return redirect('user-login')->with('error', 'Session Expired, Please login again.');

        }

    }



    public function changePassword()

    {

        if(Auth::check())

        {

            return view('frontend.pages.user.edit-password');

        }

        else

        {

            return redirect('user-login')->with('error', 'Failed to login, Please try again.');

        }

    }



    public function editProfile()

    {

        if(Auth::check())

        {

            $cid=Auth::user()->id;

            $customerInfo=DeliveryAddress::where('customer_id',$cid)->orderBy('id','DESC')->first();

            

            return view('frontend.pages.user.edit-profile',[

              'customerInfo'=>$customerInfo

            ]);

        }

        else

        {

            return redirect('user-login')->with('error', 'Failed to login, Please try again.');

        }



    }



    public function UpdateProfile(Request $request)

    {

        if(Auth::check())

        {

            $user = Auth::user();

            $user->name=$request->name;

            $user->email=$request->email;

            $user->save();



            $cid=Auth::user()->id;

            $customerInfo=DeliveryAddress::where('customer_id',$cid)->orderBy('id','DESC')->first();

            $customerInfo->mobile_phone=$request->phone;

            $customerInfo->address=$request->address;

            $customerInfo->save();

            

            return redirect('user/edit/profile')->with('status', 'Your profile updated successfully.!!!');

        }

        else

        {

            return redirect('user-login')->with('error', 'Failed to login, Please try again.');

        }



    }



    public function UpdatePassword(Request $request)

    {

        //echo $request->old_password; die();

        if(Auth::check())

        {

            if (\Hash::check($request->old_password, Auth::user()->password))

            {

                if($request->password==$request->retype_password)

                {

                    $user = Auth::user();

                    $user->password=\Hash::make($request->password);

                    $user->save();

                    

                    return redirect('user/change-password')->with('status', 'Your password updated successfully.!!!');

                }

                else

                {

                    return redirect('user/change-password')->with('error', 'Failed to update password, New & Retype password mismatch.');

                }

            }

            else

            {

                return redirect('user/change-password')->with('error', 'Failed to update password, Old password mismatch.');

            }

        }

        else

        {

            return redirect('user-login')->with('error', 'Failed to login, Please try again.');

        }



    }



    public function resetUserHash(Request $request)

    {





        $token=$request->token;

        $email=$request->email;



        $emailDB = \DB::table("password_resets")->where('email',$email)->get();



        if(count($emailDB))

        {

            $match=0;

            foreach($emailDB as $rr):

                if (\Hash::check($token, $rr->token))

                {

                    $match++;

                }

            endforeach;

        }



        if($match > 0)

        {

            if($request->password==$request->password_confirmation)

            {

                \DB::table("users")->where('email',$email)->update(['password'=>\Hash::make($request->password)]);

  

                

                return redirect('user-login')->with('status', 'Your password updated successfully.!!!');

            }

            else

            {

                return view('frontend.pages.login.reset-password',['token'=>$token])->with('error','New password & confirmed password is mismatch.');

            }

        }

        else

        {

            return redirect('password-reset')->with('error','Invalid reset code, Please try again.');

        }



    }





    /**

     * Store a newly created resource in storage.

     *

     * @return Response

     */

    public function store(Request $request) {

        $this->validate($request, [

            'due_date' => 'required',

            'invoice_date' => 'required',

            'cid' => 'required',

            'pid' => 'required'

        ]);



        $pro = new Orders;

        $pro->tracking = $request->tracking;

        $pro->cid = $request->cid;

        $pro->invoice_date = date('Y-m-d', strtotime($request->invoice_date));

        $pro->due_date = date('Y-m-d', strtotime($request->due_date));

        $pro->order_status = "Pending";

        $pro->save();



        $order_id = $pro->id;



        if (count($request->pid) != 0) {

            foreach ($request->pid as $index => $pid):

                if (!empty($request->pid[$index])) {

                    $protag = new OrdersItem();

                    $protag->pid = $request->pid[$index];

                    $protag->order_id = $order_id;

                    $protag->tracking = $request->tracking;

                    $protag->quantity = $request->quantity[$index];

                    $protag->unit_price = $request->unit_price[$index];

                    $protag->tax_rate = $request->tax_rate[$index];

                    $protag->tax_amount = $request->tax_amount[$index];

                    $protag->row_total = $request->row_total[$index];

                    $protag->save();

                }

            endforeach;

        }



        \Session::flash('status', 'Successfully Added To Order List');

        //->with('status', 'Successfully Added To Product List.')

        return redirect()->action('OrderController@index');

    }



    public function makepayment(Request $request) {

        $this->validate($request, [

            'amount' => 'required',

            'oid' => 'required',

            'paid' => 'required',

            'pm' => 'required',

            'os' => 'required'

        ]);

        $id = $request->oid;

        $order = Orders::find($id);

        $order->order_status = $request->os;

        $order->save();



        if ($request->os == 'Paid') {

            $jsoncus = DB::table('orders')

                    ->leftjoin('customers', 'orders.cid', '=', 'customers.id')

                    ->select('customers.*', 'customers.name', 'customers.email')

                    ->where('orders.id',$id)

                    ->first();

            $jsonorder = DB::table('orders')

                    ->leftjoin('customers', 'orders.cid', '=', 'customers.id')

                    ->select('orders.*', 'orders.cart', 'orders.order_status')

                    ->where('orders.id',$id)

                    ->first();

            $jsonamount = DB::table('orders')

                    ->leftjoin('order_transactions', 'orders.id', '=', 'order_transactions.order_id')

                    ->select('order_transactions.*', 'order_transactions.amount', 

                            

                            DB::raw("(SELECT payment_methods.name from payment_methods WHERE payment_methods.id=order_transactions.pm) AS payment")

                            )

                    ->where('orders.id',$id)

                    ->first();

            //echo '<pre>';

            //print_r($jsonamount);

            //exit();

            $customer_name = $jsoncus->name;

            $customer_email = $jsoncus->email;

            $invoice = $jsonorder->cart;

            $payment_method = $jsonamount->payment;

            $amount =$jsonamount->amount;

            

        }

     



        $pro = new OrderTransaction;

        $pro->order_id = $request->oid;

        $pro->amount = $request->paid;

        $pro->pm = $request->pm;

        $pro->save();



        $this->OrderStausUpdate($request->oid);



        $json = array($request->amount, $request->oid);

        $pm = payment_method::all();

        //->with('status', 'Successfully Added To Product List.')

        return redirect('admin-ecom/orders-view/' . $request->oid)->with('status', 'Payment Completed Successfully');

    }



    public function OrderStausUpdate($id) {

        $jsontrans = DB::table('order_transactions as ot')

                ->join('payment_methods as pm', 'ot.pm', '=', 'pm.id')

                ->select('ot.id', 'ot.amount', 'pm.name', 'ot.status')

                ->where('ot.order_id', '=', $id)

                ->orderBy('ot.id', 'ASC')

                ->get();



        $jsonitem = DB::table('orders as o')

                ->join('orders_items as oi', 'oi.order_id', '=', 'o.id')

                ->join('products as p', 'oi.pid', '=', 'p.id')

                ->select('oi.id', 'oi.tax_amount', 'oi.row_total')

                ->where('o.id', '=', $id)

                ->orderBy('oi.id', 'ASC')

                ->get();

        $order_total = 0;

        $vat_total = 0;

        $paid = 0;

        if (!empty($jsonitem)) {

            foreach ($jsonitem as $item):

                $order_total += $item->row_total;

                $vat_total += $item->tax_amount;

            endforeach;

        }



        if (!empty($jsontrans)) {

            foreach ($jsontrans as $item):

                $paid += $item->amount;

            endforeach;

        }



        $total = $order_total + $vat_total;

        $due = $total - $paid;

        if ($due < 0) {

            $ord = Orders::find($id);

            $ord->order_status = "Paid";

            $ord->save();

        }

    }



    public function orderdetail($id) {

        $json = DB::table('orders as o')

                ->leftjoin('customers as c', 'c.id', '=', 'o.cid')

                ->select('o.*', 'c.name')

                ->where('o.id', '=', $id)

                ->orderBy('o.id', 'desc')

                ->get();

        //dd($json);

        $customer=DeliveryAddress::where('customer_id',$json[0]->cid)->where('token',$json[0]->tracking)->first();

        //dd($customer);

        $jsonitem = DB::table('orders as o')

                ->leftjoin('orders_items as oi', 'oi.order_id', '=', 'o.id')

                ->leftjoin('products as p', 'oi.pid', '=', 'p.id')

                ->select('oi.id', 'oi.pid','oi.cart_json','oi.unit', 'oi.color', 'p.name', 'oi.quantity', 'oi.unit_price', 'oi.tax_rate', 'oi.tax_amount', 'oi.row_total')

                ->where('o.id', '=', $id)

                ->orderBy('oi.id', 'ASC')

                ->get();



        $jsontrans = DB::table('order_transactions as ot')

                ->leftjoin('payment_methods as pm', 'ot.pm', '=', 'pm.id')

                ->select('ot.id', 'ot.amount', 'pm.name', 'ot.status')

                ->where('ot.order_id', '=', $id)

                ->orderBy('ot.id', 'ASC')

                ->get();

        $company=ContactDetail::orderBy('id','DESC')->first();

        $discount=Discount::where('discount_option',unserialize($json[0]->cart_json)->rec)
                          ->where('discount_status','Active')
                          ->first();

        //dd($discount);

       // dd(unserialize($json[0]->cart_json)->rec);

        return view('order.view', ['customer' => $customer,'order' => $json,'company' => $company, 'order_item' => $jsonitem, 'ot' => $jsontrans,'discount'=>$discount]);

    }



    public function payment($amount, $order_id) {

        $json = array($amount, $order_id);

        $pm = payment_method::all();

        return view('order.payment', ['order' => $json, 'pm' => $pm]);

    }



    public function showjson() {

        $json = DB::table('orders as o')

                ->leftjoin('customers as c', 'c.id', '=', 'o.cid')

                ->select('o.id', 'o.tracking', 'c.name', 'o.invoice_date', 'o.due_date', 'o.order_status', 'o.created_at')

                ->orderBy('o.id', 'desc')

                ->get();



        $retarray = array("data" => $json, "total" => count($json));



        return response()->json($retarray);

        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"

    }



    public function showReportjson() {

        $json = DB::table('orders as o')

                ->leftjoin('users as c', 'c.id', '=', 'o.cid')

                ->select('o.id', 'o.tracking', 'c.name', 'o.invoice_date', 'o.due_date', 'o.order_status', 'o.created_at')

                ->orderBy('o.id', 'desc')

                ->get();



        $retarray = array("data" => $json, "total" => count($json));



        return response()->json($retarray);

        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"

    }

    public function showReporttodayjson() {

        $json = DB::table('orders as o')

                ->Leftjoin('users as c', 'c.id', '=', 'o.cid')

                ->where('o.invoice_date',date('Y-m-d'))

                ->select('o.id', 'o.tracking', 'c.name', 'o.invoice_date', 'o.due_date', 'o.order_status', 'o.created_at')

                ->orderBy('o.id', 'desc')

                ->groupBy('o.id')

                ->get();



        $retarray = array("data" => $json, "total" => count($json));



        return response()->json($retarray);

        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"

    }



    public function showjsonpaid() {

        $json = DB::table('orders as o')

                ->join('customers as c', 'c.id', '=', 'o.cid')

                ->select('o.id', 'o.tracking', 'c.name', 'o.invoice_date', 'o.due_date', 'o.order_status', 'o.created_at')

                ->where('o.order_status', '=', 'Paid')

                ->orderBy('o.id', 'desc')

                ->get();



        $retarray = array("data" => $json, "total" => count($json));



        return response()->json($retarray);

        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"

    }



    public function showjsonpening() {

        $json = DB::table('orders as o')

                ->join('customers as c', 'c.id', '=', 'o.cid')

                ->select('o.id', 'o.tracking', 'c.name', 'o.invoice_date', 'o.due_date', 'o.order_status', 'o.created_at')

                ->where('o.order_status', '=', 'Pending')

                ->orderBy('o.id', 'desc')

                ->get();



        $retarray = array("data" => $json, "total" => count($json));



        return response()->json($retarray);

        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"

    }



    public function showjsoncancel() {

        $json = DB::table('orders as o')

                ->join('customers as c', 'c.id', '=', 'o.cid')

                ->select('o.id', 'o.tracking', 'c.name', 'o.invoice_date', 'o.due_date', 'o.order_status', 'o.created_at')

                ->where('o.order_status', '=', 'Cancel')

                ->orderBy('o.id', 'desc')

                ->get();



        $retarray = array("data" => $json, "total" => count($json));



        return response()->json($retarray);

        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"

    }



    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return Response

     */

    public function show($id) {

        $cat = category::all();

        $brand = Brand::all();

        $tag = Tag::all();

        $subcat = SubCategory::all();

        $json = Product::find($id);



        $producttag = DB::table('product_tags as pt')

                ->select('pt.tid')

                ->where('pt.pid', '=', $id)

                ->get();

        $tpt = array();

        foreach ($producttag as $td):

            array_push($tpt, $td->tid);

        endforeach;



        //print_r($tpt);

        //exit();

        return view('product.edit', ['data' => $json, 'cat' => $cat, 'subcat' => $subcat, 'pt' => $tpt, 'tag' => $tag, 'brand' => $brand]);

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

    public function update(Request $request) {

        $this->validate($request, [

            'pcode' => 'required',

            'name' => 'required',

            'price' => 'required',

            'cid' => 'required',

            'scid' => 'required'

        ]);









        $filename = "";

        if (!empty($request->file('brandimage'))) {

            $img = $request->file('brandimage');

            $upload = 'upload\product';

            //$filename=$img->getClientOriginalName();

            $filename = time() . "." . $img->getClientOriginalExtension();

            $success = $img->move($upload, $filename);

        }





        $pid = $request->id;

        $pro = Product::find($pid);

        $pro->pcode = $request->pcode;

        $pro->name = $request->name;

        $pro->price = $request->price;

        $pro->old_price = $request->old_price;

        $pro->cid = $request->cid;

        $pro->scid = $request->scid;

        $pro->bid = $request->bid;

        $pro->photo = $filename;

        $pro->description = $request->description;

        $pro->isactive = $request->isactive;

        $pro->save();





        //print_r($request->tid);





        if (count($request->tid) != 0) {

            $cleantag = DB::table('product_tags')->where('pid', '=', $pid)->delete();

            foreach ($request->tid as $index => $td):

                $protag = new ProductTag();

                $protag->pid = $pid;

                $protag->tid = $td;

                $protag->isactive = 1;

                $protag->save();

            endforeach;

        }



        \Session::flash('status', 'Successfully Updated To Product List');

        //->with('status', 'Successfully Added To Product List.')

        return redirect()->action('ProductController@index');

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return Response

     */

    public function destroy($id) {

        $cleantag = DB::table('product_tags')->where('pid', '=', $id)->delete();

        $delinfo = Product::find($id);

        $delinfo->delete();

        //\Session::flash('status', 'Successfully Updated To Product List');

        //

        return response()->json(1);

    }



}


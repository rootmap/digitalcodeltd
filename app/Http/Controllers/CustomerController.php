<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Auth\Authenticatable;
//use Illuminate\Support\Facades\Input;
use App\Customer;
use App\DeliveryAddress;
use App\User;
use App\Orders;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('customer.index');
    }

    public function report() {
        return view('customer.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('customer.create');
    }

    public function showjson() {
        $json =DB::table('customers')
               ->leftJoin('delivery_addresses','customers.id','=','delivery_addresses.customer_id')
               ->select('customers.id',
                       'customers.name',
                       'customers.sex',
                       'customers.dob',
                       'customers.email',
                       'customers.created_at')
               ->where('user_type','Customer')
               ->groupBy('customers.id')
               ->orderBy('customers.id','DESC')
               ->get();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }
    
    public function showReportjson() {
        $json =DB::table('customers')
               ->leftJoin('orders','customers.id','=','orders.cid')
               ->leftJoin('orders_items','orders.id','=','orders_items.order_id')
               ->select('customers.id',
                       'customers.name',
                       'customers.sex',
                       'customers.dob',
                       DB::Raw("IFNULL(SUM(orders_items.row_total),'0') as total"),
                       'customers.email',
                       'customers.created_at')
               ->groupBy('customers.id') 
               ->get();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }
    
    public function showCustomerReportjson($id)
    {
        $sql=DB::table('orders')
             ->leftJoin('orders_items','orders.id','=','orders_items.order_id')
             ->leftJoin('customers as c','orders.cid','=','c.id')
             ->select('orders.*',DB::Raw("IFNULL(SUM(orders_items.row_total),'0') as total"),'c.name as cus_name','orders.created_at')
             ->where('orders.cid',$id)   
             ->groupBy('orders.id')
             ->get();
			 
		$sqlSum=DB::table('orders')
             ->leftJoin('orders_items','orders.id','=','orders_items.order_id')
             ->leftJoin('customers as c','orders.cid','=','c.id')
             ->where('orders.cid',$id)   
             ->SUM('orders_items.row_total');	 

        $sqlpending = Orders::where('cid', $id)
                ->where('order_status', 'Pending')
                ->count('order_status');
                
        $sqlpaid = Orders::where('cid', $id)
                ->where('order_status', 'paid')
                ->count('order_status');
                          
        $sqlcancel = Orders::where('cid', $id)
                ->where('order_status', 'Cancel')
                ->count('order_status');
                

        return view('order.customer-order-report',['data'=>$sql,'total'=>$sqlSum,'pending'=>$sqlpending,'paid'=>$sqlpaid,'cancel'=>$sqlcancel]);
     //print_r($sql);
     //exit();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        //echo $request->name;
        //exit();

        $cat = new Customer;
        $cat->name = $request->name;
        $cat->sex = $request->sex;
        $cat->dob = $request->dob;
        $cat->phone = $request->phone;
        $cat->email = $request->email;
        $cat->password = Hash::make($request->password);
        $cat->save();

        return redirect()->action("CustomerController@index")->with('status', 'Customer info Saved successfully!');
    }

    public function FrontSiteCreate(Request $request, $reur) {
        if (isset($request->name)) {
            $this->validate($request, [
                'name' => 'required',
                'passwd' => 'required',
                'email' => 'required',
            ]);

            //echo $request->name;
            //exit();

            if (empty($id_gender)) {
                $id_gender = 0;
            }

            if (empty($days)) {
                $days = "00";
            }

            if (empty($months)) {
                $months = "00";
            }

            if (empty($years)) {
                $years = "0000";
            }

            $dob = $years . "-" . $months . "-" . $days;

            $passhash = bcrypt($request->password);

            $cat = new Customer;
            $cat->name = $request->name;
            $cat->sex = $id_gender;
            $cat->dob = $dob;
            $cat->phone = "";
            $cat->email = $request->email;
            $cat->password = $passhash;
            $cat->save();
            $cid = $cat->id;



            $da = new DeliveryAddress;
            $da->customer_id = $cid;
            $da->first_name = $request->first_name;
            $da->last_name = $request->last_name;
            $da->company = $request->company;
            $da->address = $request->address;
            $da->address_2 = $request->address_2;
            $da->city = $request->city;
            $da->state = $request->state;
            $da->zip_code = $request->zip_code;
            $da->country = $request->country;
            $da->additional_info = $request->additional_info;
            $da->home_phone = $request->home_phone;
            $da->mobile_phone = $request->mobile_phone;
            $da->save();

            $usr = new User;
            $usr->name = $request->name;
            $usr->email = $request->email;
            $usr->password = $passhash;
            $usr->save();
            //echo $reur;
            //echo $cat->id;
            //exit();

            $data = array('email' => $request->email, 'password' => $request->password);
            if (Auth::attempt($data)) {
                return redirect(base64_decode($reur))->with('success', 'You Are Successfully Logged In');
            } else {
                return redirect(base64_decode($reur))->with('error', 'Invalid email password');
            }
        }
        else
        {
//            $this->validate($request, [
//                'password' => 'required',
//                'email' => 'required|email',
//            ]);
//            $passhash = Hash::make($request->password);
            //$user=new User::find('email',$request->email,"password",$passhash);
            //print_r($user);
            $data = array('email' => $request->email, 'password' => $request->password);
            
            if (Auth::attempt($data)) {
                echo 1;
                //return redirect(base64_decode($reur))->with('success', 'You Are Successfully Logged In');
            } else {
                echo 2;
                //return redirect(base64_decode($reur))->with('error', 'Invalid email password');
            }
            exit();
        }

        //return redirect(base64_decode($reur))->with('status', 'Customer info Saved successfully!');
    }

//    public function userLogin(Request $request,$reur) 
//    {
//        
////        echo 1;
////        exit();
////        $this->validate($request,[
////            'email'=>'required|email',
////            'password'=>'required',
////        ]);
////      
//        $user=DB::table('users')
//              ->where('email','=',$request->email,'password','=',$request->password)
//              ->select('users.*')
//              ->get();
//        $data=array('email' =>$request->email, 'password' =>$request->password);
//        if (Auth::login($user)) {
//            echo 1;
//            //return redirect(base64_decode($reur))->with('success','You Are Successfully Logged In');
//        } else {
//            echo 22;
//            //return redirect(base64_decode($reur))->with('error','Invalid email password');
//        }
//        
//        exit();
//    }

    public function userLogout() {
        Auth::logout();
        return redirect(url('shopping-cart'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $json = Customer::find($id);
        return view('customer.edit', ['data' => $json]);
    }
    public function userprofile($id) {
        $json = Customer::find($id);
        return view('userprofile.index');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            //'phone' => 'required',
            'user_type' => 'required',
        ]);


        $id = $request->id;
        $cat = Customer::find($id);
        $cat->name = $request->name;
        $cat->sex = $request->sex;
        $cat->dob = $request->dob;
        $cat->phone = $request->phone;
        $cat->email = $request->email;
        $cat->user_type = $request->user_type;
        $cat->password = Hash::make($request->password);
        $cat->save();
        
        
        DB::table('users')->where('email',$request->email)->update(['user_type'=>$request->user_type]);
        
        //echo 1;
        //\Session::flash('message','Record Successfullu Updated.');
        //    return redirect()->action("ProjectController@index");

        return redirect()->action("CustomerController@index")->with('status', 'Customer info Modified successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $json = Customer::find($id);
        $json->delete();
        return response()->json(1);
    }

}

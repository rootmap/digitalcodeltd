<?php



namespace App\Http\Controllers;



use Illuminate\Http\Request;

use App\Orders;

use App\User;
use App\WelcomeContent;

class dashboardController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $today_order=Orders::where('invoice_date',date('Y-m-d'))->get();

        $order_paid=Orders::where('order_status','Paid')->get();

        $order_pending=Orders::where('order_status','Pending')->get();

        $all_orders=Orders::all();

        $all_user=User::all();

        



        

        return view('dashboard.index',[

            'today_order'=>$today_order,

            'order_paid'=>$order_paid,

            'order_pending'=>$order_pending,

            'all_order'=>$all_orders,

            'all_user'=>$all_user

                ]);

    }

    public function collectiononly(){
        $tab=WelcomeContent::find(1);

         return view('dashboard.collectiononly',['tab'=>$tab]);

    }

    public function savecollectiononly(Request $request){
        $collection_only=0;
        if(isset($request->isactive)){
            $collection_only=1;
        }

        $tab=WelcomeContent::find(1);
        $tab->collection_only=$collection_only;
        $tab->save();

        return redirect(url('admin-ecom/enable-collection-only'))->with('success','Action has been performed.');
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

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function show($id)

    {

        //

    }



    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function edit($id)

    {

        //

    }



    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, $id)

    {

        //

    }



    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return \Illuminate\Http\Response

     */

    public function destroy($id)

    {

        //

    }

}


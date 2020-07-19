<?php

namespace App\Http\Controllers;

use App\DeliveryCost;
use Illuminate\Http\Request;

class DeliveryCostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('delivery-cost.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('delivery-cost.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'zip_code'=>'required',
            'delivery_cost'=>'required',
            'delivery_status'=>'required'
        ]);

        $delivery_status=$request->delivery_status?'Active':'Inactive';



        $tab=new DeliveryCost;
        $tab->zip_code=$request->zip_code;
        $tab->delivery_cost=$request->delivery_cost;
        $tab->delivery_status=$delivery_status;
        $tab->save();

        return redirect('admin-ecom/new-delivery-cost')->with('status', 'New Delivery Cost Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryCost  $deliveryCost
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryCost $deliveryCost)
    {
        $tab=DeliveryCost::all();
        $retarray = array("data" => $tab, "total" => count($tab));
        return response()->json($retarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeliveryCost  $deliveryCost
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryCost $deliveryCost,$id=0)
    {
        $tab=DeliveryCost::find($id);
        return view('delivery-cost.create',['edit'=>$tab]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeliveryCost  $deliveryCost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryCost $deliveryCost,$id=0)
    {
        $this->validate($request,[
            'zip_code'=>'required',
            'delivery_cost'=>'required',
            'delivery_status'=>'required'
        ]);

        $delivery_status=$request->delivery_status?'Active':'Inactive';

        $tab=DeliveryCost::find($id);
        $tab->zip_code=$request->zip_code;
        $tab->delivery_cost=$request->delivery_cost;
        $tab->delivery_status=$delivery_status;
        $tab->save();

        return redirect('admin-ecom/delivery-cost')->with('status', 'Delivery Cost Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryCost  $deliveryCost
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryCost $deliveryCost)
    {
        //
    }
}

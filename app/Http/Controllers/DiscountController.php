<?php

namespace App\Http\Controllers;

use App\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('discount.report');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('discount.create');
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
            'minimum_amount'=>'required',
            'discount_option'=>'required',
            'discount_type'=>'required',
            'discount_amount'=>'required'
        ]);

        $discount_status=$request->discount_status?'Active':'Inactive';

        if($discount_status=='Active')
        {
            Discount::where('id','>','0')->update(['discount_status'=>'Inactive']);
        }

        $tab=new Discount;
        $tab->minimum_amount=$request->minimum_amount;
        $tab->discount_option=$request->discount_option;
        $tab->discount_type=$request->discount_type;
        $tab->discount_amount=$request->discount_amount;
        $tab->message=$request->message;
        $tab->discount_status=$discount_status;
        $tab->save();

        return redirect('admin-ecom/discount')->with('status', 'Discount Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        $tab=Discount::all();
        $retarray = array("data" => $tab, "total" => count($tab));
        return response()->json($retarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount,$id=0)
    {
        $tab=Discount::find($id);
        return view('discount.create',['edit'=>$tab]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount,$id=0)
    {
        $this->validate($request,[
            'minimum_amount'=>'required',
            'discount_option'=>'required',
            'discount_type'=>'required',
            'discount_amount'=>'required'
        ]);

        $discount_status=$request->discount_status?'Active':'Inactive';

        $tab=Discount::find($id);
        $tab->minimum_amount=$request->minimum_amount;
        $tab->discount_option=$request->discount_option;
        $tab->discount_type=$request->discount_type;
        $tab->discount_amount=$request->discount_amount;
        $tab->message=$request->message;
        $tab->discount_status=$discount_status;
        $tab->save();

        return redirect('admin-ecom/discount')->with('status', 'Discount Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        //
    }
}

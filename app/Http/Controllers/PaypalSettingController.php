<?php

namespace App\Http\Controllers;

use App\PaypalSetting;
use Illuminate\Http\Request;

class PaypalSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CheckTab=PaypalSetting::orderBy('id','DESC')->count();
        $ret=[];
        if($CheckTab>0)
        {
            $Tab=PaypalSetting::orderBy('id','DESC')->first();
            $ret=['edit'=>$Tab];
        }

        return view('paypalsettings.index',$ret);
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
        $this->validate($request,[
            'paypal_client_id'=>'required',
            'paypal_secret'=>'required',
        ]);

        $tax_status=$request->paypal_status?'Active':'Inactive';

        $tab=new PaypalSetting;
        $tab->paypal_client_id=$request->paypal_client_id;
        $tab->paypal_secret=$request->paypal_secret;
        $tab->paypal_status=$tax_status;
        $tab->save();

        return redirect('admin-ecom/paypalsetting')->with('status', 'Paypal Settings Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaypalSetting  $paypalSetting
     * @return \Illuminate\Http\Response
     */
    public function show(PaypalSetting $paypalSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaypalSetting  $paypalSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(PaypalSetting $paypalSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaypalSetting  $paypalSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaypalSetting $paypalSetting)
    {
        $this->validate($request,[
            'paypal_client_id'=>'required',
            'paypal_secret'=>'required',
        ]);

        $tax_status=$request->paypal_status?'Active':'Inactive';

        $tab=PaypalSetting::orderBy('id','DESC')->first();
        $tab->paypal_client_id=$request->paypal_client_id;
        $tab->paypal_secret=$request->paypal_secret;
        $tab->paypal_status=$tax_status;
        $tab->save();

        return redirect('admin-ecom/paypalsetting')->with('status', 'Paypal Settings Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaypalSetting  $paypalSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaypalSetting $paypalSetting)
    {
        //
    }
}

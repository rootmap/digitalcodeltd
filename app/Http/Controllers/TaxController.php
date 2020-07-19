<?php

namespace App\Http\Controllers;

use App\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CheckTab=Tax::orderBy('id','DESC')->count();
        $ret=[];
        if($CheckTab>0)
        {
            $Tab=Tax::orderBy('id','DESC')->first();
            $ret=['edit'=>$Tab];
        }

        return view('tax.index',$ret);
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
            'name'=>'required',
            'tax_amount'=>'required',
        ]);

        $tax_status=$request->tax_status?'Active':'Inactive';

        $tab=new Tax;
        $tab->name=$request->name;
        $tab->tax_amount=$request->tax_amount;
        $tab->tax_status=$tax_status;
        $tab->save();

        return redirect('admin-ecom/tax')->with('status', 'Tax Added Successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show(Tax $tax)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        $this->validate($request,[
            'name'=>'required',
            'tax_amount'=>'required',
        ]);

        $tax_status=$request->tax_status?'Active':'Inactive';

        $tab=Tax::orderBy('id','DESC')->first();
        $tab->name=$request->name;
        $tab->tax_amount=$request->tax_amount;
        $tab->tax_status=$tax_status;
        $tab->save();

        return redirect('admin-ecom/tax')->with('status', 'Tax Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\AcceptPayment;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\File;

class AcceptPaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AcceptPayment::find(1);
        if (isset($data)) {
            return view('accept_payment.index',['data'=>$data]);
        } else {
            return view('accept_payment.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $this->validate($request, [
            'image' => 'required',
        ]);

        //echo $request->name;
        //exit();
        $filename = "";
        if (!empty($request->file('image'))) {
            $img = $request->file('image');
            $upload = 'upload/AcceptPayment';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();

        $bran = new AcceptPayment;
        $bran->images = $filename;
        $bran->title = $request->title;
        $bran->title_link = $request->title_link;
        $bran->save();

        return redirect('admin-ecom/accept-payment')->with('status', 'Accept Payment Added Successfully!');
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
     * @param  \App\AcceptPayment  $acceptPayment
     * @return \Illuminate\Http\Response
     */
    public function show(AcceptPayment $acceptPayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AcceptPayment  $acceptPayment
     * @return \Illuminate\Http\Response
     */
    public function edit(AcceptPayment $acceptPayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AcceptPayment  $acceptPayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AcceptPayment $acceptPayment)
    {
       
        //echo $request->name;
        //exit();
        $filename = $request->eximages;
        if (!empty($request->file('image'))) {
            $img = $request->file('image');
            $upload = 'upload/AcceptPayment';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }

        $bran = AcceptPayment::find($request->id);
        $bran->images = $filename;
        $bran->title = $request->title;
        $bran->title_link = $request->title_link;
        $bran->save();

        return redirect('admin-ecom/accept-payment')->with('status', 'Accept Payment Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AcceptPayment  $acceptPayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(AcceptPayment $acceptPayment)
    {
        //
    }
}

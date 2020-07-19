<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    public function index()
	{
            return view('paymentmethod.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
        ]);

        //echo $request->name;
        //exit();
        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;

        $bran = new PaymentMethod;
        $bran->name = $request->name;
        $bran->description = $request->description;
        $bran->isactive = $isactive;
        $bran->save();

        return redirect('admin-ecom/paymentmethod')->with('status', 'Payment Method Added Successfully!');
    }

    public function showjson() {
        $json = PaymentMethod::all();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $json=PaymentMethod::find($id);
        return view('paymentmethod.edit',['data'=>$json]);
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
            'name' => 'required',
        ]);

        //echo $request->name;
        //exit();

        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;

        $bran =PaymentMethod::find($request->id);
        $bran->name = $request->name;
        $bran->description = $request->description;
        $bran->isactive = $isactive;
        $bran->save();

        return redirect('admin-ecom/paymentmethod')->with('status', 'Payment Method Updated Successfully!');
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=PaymentMethod::find($id);
        $json->delete();
        return response()->json(1);
    }
}

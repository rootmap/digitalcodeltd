<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\OrderInfo;
use Illuminate\Http\Request;

class OrderInfoController extends Controller
{
     public function index(){
        $chk=OrderInfo::count();
        if($chk==0)
        {
            $tab=new OrderInfo;
            $tab->delivery_time='';
            $tab->allergy_alert='';
            $tab->delivery_info='';
            $tab->delivery_time='';
            $tab->save();
        }


        $edit=OrderInfo::orderBy('id','DESC')->first();

        return view('pages.order-Info.index',['data'=>$edit]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request) {
        
        $this->validate($request, [
            'delivery_time' => 'required',
            'allergy_alert' => 'required',
            'delivery_info' => 'required',
        ]);

        // echo $request->delivery_time;
        // exit();
        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;

        $OrderInfo = new OrderInfo;
        $OrderInfo->delivery_time = $request->delivery_time;
        $OrderInfo->allergy_alert = $request->allergy_alert;
        $OrderInfo->delivery_info = $request->delivery_info;
        $OrderInfo->description = $request->description;
        $OrderInfo->isactive = $isactive;
        $OrderInfo->save();

        return redirect('admin-ecom/order-Info')->with('status', 'Order Info Added Successfully!');
    }
    public function showjson() {
        $json = OrderInfo::all();

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
        $json=OrderInfo::find($id);
        return view('pages.order-Info.edit',['data'=>$json]);
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
            'delivery_time' => 'required',
            'allergy_alert' => 'required',
            'delivery_info' => 'required',
        ]);

        //echo $request->name;
        //exit();

        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;
        $isoffline=$request->isoffline?1:0;
        
        $OrderInfo =OrderInfo::find($request->id);
        $OrderInfo->delivery_time = $request->delivery_time;
        $OrderInfo->allergy_alert = $request->allergy_alert;
        $OrderInfo->delivery_info = $request->delivery_info;
        $OrderInfo->description = $request->description;
        $OrderInfo->isactive = $isactive;
        $OrderInfo->isoffline = $isoffline;
        $OrderInfo->offline_notice = $request->offline_notice;
        $OrderInfo->save();

        return redirect('admin-ecom/order-Info')->with('status', 'Order Info Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=OrderInfo::find($id);
        $json->delete();
        return response()->json(1);
    }
}

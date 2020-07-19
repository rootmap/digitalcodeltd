<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Input;
use App\OrderEmail;

class OrderEmailController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $cat = OrderEmail::all();
        if (count($cat)>0) {
            return view('orderemail.index', ['data' => $cat]);
        } else {
            return view('orderemail.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request) {


        $this->validate($request, [
            'primary_email' => 'required',
        ]);

       

        $cat = new OrderEmail;
        $cat->primary_email = $request->primary_email;
        $cat->backup_email = $request->backup_email;
        $cat->save();

        return redirect()->action("OrderEmailController@index")->with('status', 'Order Email Modified successfully!');
    }

    public function showjson() {
        $json = OrderEmail::all();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $json = OrderEmail::find($id);
        return view('orderemail.edit', ['data' => $json]);
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
            'primary_email' => 'required',
        ]);


        $id = $request->id;
        $cat = OrderEmail::find($id);
        $cat->primary_email = $request->primary_email;
        $cat->backup_email = $request->backup_email;
        $cat->save();

        //echo 1;
        //\Session::flash('message','Record Successfullu Updated.');
        //    return redirect()->action("ProjectController@index");

        return redirect()->action("OrderEmailController@index")->with('status', 'Order Email info Modified successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $json = OrderEmail::find($id);
        $json->delete();
        return response()->json(1);
    }

}

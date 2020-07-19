<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Currency;

class CurrencyController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('currency.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'icon' => 'required',
            'short_code' => 'required',
        ]);

        //echo $request->name;
        //exit();

        $isactive=$request->isactive?1:0;

        $cat = new Currency;
        $cat->name = $request->name;
        $cat->icon = $request->icon;
        $cat->short_code = $request->short_code;
        $cat->isactive = $isactive;
        $cat->save();

        return redirect('admin-ecom/currency')->with('status', 'Currency Added!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    public function showjson() {
        $json = Currency::all();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $json = Currency::find($id);
        return view('currency.edit', ['data' => $json]);
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
            'icon' => 'required',
            'short_code' => 'required',
        ]);

        //echo $request->name;
        //exit();

        $isactive=$request->isactive?1:0;

        $cat = Currency::find($request->id);
        $cat->name = $request->name;
        $cat->icon = $request->icon;
        $cat->short_code = $request->short_code;
        $cat->isactive = $isactive;
        $cat->save();

        return redirect('admin-ecom/currency')->with('status', 'Currency Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json = Currency::find($id);
        $json->delete();
        return response()->json(1);
    }

}

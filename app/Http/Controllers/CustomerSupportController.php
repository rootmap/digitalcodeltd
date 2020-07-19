<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\CustomerSupport;

class CustomerSupportController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $cat = CustomerSupport::all();
        return view('customersupport.index', ['data' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $this->validate($request, [
            'contact_number' => 'required',
        ]);

        //echo $request->contact_number;
        //exit();

        $cat = new CustomerSupport;
        $cat->contact_number = $request->contact_number;
        $cat->reservation_email = $request->reservation_email;
        $cat->contact_admin_email = $request->contact_admin_email;
        $cat->order_admin_email = $request->order_admin_email;
        $cat->save();

        return redirect()->action("CustomerSupportController@index")->with('status', 'Customer Support info Saved successfully!');
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
        //
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
            'id' => 'required',
            'contact_number' => 'required',
        ]);

        //echo $request->contact_number;
        //exit();

        $cat =CustomerSupport::find($request->id);
        $cat->contact_number = $request->contact_number;
        $cat->reservation_email = $request->reservation_email;
        $cat->contact_admin_email = $request->contact_admin_email;
        $cat->order_admin_email = $request->order_admin_email;
        $cat->save();

        return redirect()->action("CustomerSupportController@index")->with('status', 'Customer Support info Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}

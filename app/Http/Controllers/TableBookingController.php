<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\tableBooking;
use Illuminate\Http\Request;

class TableBookingController extends Controller
{
    public function index()
	{
            return view('pages.table-booking.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request) {
        $this->validate($request, [
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'number_of_person' => 'required',
            'reservation_date' => 'required',
            'reservation_time' => 'required',
        ]);

        //echo $request->name;
        //exit();
        //echo $request->isactive;
        //exit();
        
        $tb = new tableBooking;
        $tb->fullname = $request->fullname;
        $tb->email = $request->email;
        $tb->phone = $request->phone;
        $tb->number_of_person = $request->number_of_person;
        $tb->reservation_date = $request->reservation_date;
        $tb->reservation_time = $request->reservation_time;
        $tb->description = $request->description;
        $tb->save();

        return redirect('admin-ecom/table-booking')->with('status', 'Table Booking Added Successfully!');
    }

    public function showjson() {
        $json = tableBooking::all();

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
        $json=tableBooking::find($id);
        return view('pages.table-booking.edit',['data'=>$json]);
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
            'fullname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'number_of_person' => 'required',
            'reservation_date' => 'required',
            'reservation_time' => 'required',
            'description' => 'required',
        ]);

        //echo $request->name;
        //exit();

        //echo $request->isactive;
        //exit();
    

        $tb =tableBooking::find($request->id);
        $tb->fullname = $request->fullname;
        $tb->email = $request->email;
        $tb->phone = $request->phone;
        $tb->number_of_person = $request->number_of_person;
        $tb->reservation_date = $request->reservation_date;
        $tb->reservation_time = $request->reservation_time;
        $tb->description = $request->description;
        $tb->save();

        return redirect('admin-ecom/table-booking')->with('status', 'Table Booking Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=tableBooking::find($id);
        $json->delete();
        return response()->json(1);
    }
}

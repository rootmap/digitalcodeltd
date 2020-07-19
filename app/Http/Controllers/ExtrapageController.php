<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Extrapage;
use Symfony\Component\HttpFoundation\File;

class ExtrapageController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('extrapage.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        
    }

    public function showjson() {
        
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $is_custom_layout=$request->isactive?1:0;

        

        $bran = new Extrapage;
        $bran->name = $request->name;
        $bran->description = $request->description;
        $bran->isactive = $is_custom_layout;
        $bran->save();

        return redirect('admin-ecom/new-extra-page')->with('status', 'New page Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show() {

        $json=Extrapage::all();
        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $json=Extrapage::find($id);
        return view('extrapage.index',['edit'=>$json]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request,$id=0) {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $is_custom_layout=$request->isactive?1:0;

        $bran =Extrapage::find($id);
        $bran->name = $request->name;
        $bran->description = $request->description;
        $bran->isactive = $is_custom_layout;
        $bran->save();

        return redirect('admin-ecom/new-extra-page')->with('status', 'New page modified Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=Extrapage::find($id);
        $json->delete();
        return redirect('admin-ecom/new-extra-page')->with('status', 'Extra page delete Successfully!');
    }

}

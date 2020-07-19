<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Brand;
use Symfony\Component\HttpFoundation\File;

class BrandController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return view('brand.index');
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
        $filename="";
        if (!empty($request->file('brandimage'))) {
            $img = $request->file('brandimage');
            $upload = 'upload/brand';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        $filename_logo="";
        if (!empty($request->file('brandlogo'))) {
            $img = $request->file('brandlogo');
            $upload = 'upload/brand';
            //$filename=$img->getClientOriginalName();
            $filename_logo = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename_logo);
        }
        //echo $request->isactive;
        //exit();

        $is_custom_layout=$request->is_custom_layout?1:0;

        if(!empty($is_custom_layout))
        {
            $this->validate($request, [
                'layout' => 'required',
            ]);
        }

        $bran = new Brand;
        $bran->name = $request->name;
        $bran->brandimage = $filename;
        $bran->brandlogo = $filename_logo;
        $bran->description = $request->description;
        $bran->is_custom_layout = $is_custom_layout;
        if(!empty($is_custom_layout))
        {
            $bran->layout = $request->layout;
        }
        $bran->isactive = $request->isactive;
        $bran->save();

        return redirect('admin-ecom/brand')->with('status', 'Brand Added Successfully!');
    }

    public function showjson() {
        $json = Brand::all();

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
        $json=Brand::find($id);
        return view('brand.edit',['data'=>$json]);
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
        $filename=$request->eximage;
        if (!empty($request->file('brandimage'))) {
            $img = $request->file('brandimage');
            $upload = 'upload/brand';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        
        $filename_logo=$request->eximage_logo;
        if (!empty($request->file('brandlogo'))) {
            $img = $request->file('brandlogo');
            $upload = 'upload/brand';
            //$filename=$img->getClientOriginalName();
            $filename_logo = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename_logo);
        }
        
        //echo $request->isactive;
        //exit();

        $is_custom_layout=$request->is_custom_layout?1:0;

        if(!empty($is_custom_layout))
        {
            $this->validate($request, [
                'layout' => 'required',
            ]);
        }

        $bran =Brand::find($request->id);
        $bran->name = $request->name;
        $bran->brandimage = $filename;
        $bran->brandlogo = $filename_logo;
        $bran->description = $request->description;
        $bran->is_custom_layout = $is_custom_layout;
        if(!empty($is_custom_layout))
        {
            $bran->layout = $request->layout;
        }
        $bran->isactive = $request->isactive;
        $bran->save();

        return redirect('admin-ecom/brand')->with('status', 'Brand Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=Brand::find($id);
        $json->delete();
        return response()->json(1);
    }

}

<?php

namespace App\Http\Controllers;

use App\AppsSetting;
use Illuminate\Http\Request;

class AppsSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AppsSetting.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $this->validate($request, [
            'link' => 'required',
            'images' => 'required',
        ]);

        //echo $request->name;
        //exit();
        $filename="";
        if (!empty($request->file('images'))) {
            $img = $request->file('images');
            $upload = 'upload/AppsSetting';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;
        
        $bran = new AppsSetting;
        $bran->link = $request->link;
        $bran->images = $filename;
        $bran->isactive = $isactive;
        $bran->save();

        return redirect('admin-ecom/apps-setting')->with('status', 'Apps Setting Added Successfully!');
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
     * @param  \App\AppsSetting  $appsSetting
     * @return \Illuminate\Http\Response
     */

    public function showjson() {
        $json = AppsSetting::all();
        $retarray = array("data" => $json, "total" => count($json));
        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    public function show($id)
    {
        $json=AppsSetting::find($id);
        return view('AppsSetting.edit',['data'=>$json]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AppsSetting  $appsSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(AppsSetting $appsSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AppsSetting  $appsSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppsSetting $appsSetting)
    {
        $this->validate($request, [
            'link' => 'required',
        ]);

        //echo $request->name;
        //exit();
        $filename=$request->eximage;
        if (!empty($request->file('images'))) {
            $img = $request->file('images');
            $upload = 'upload/AppsSetting';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;
        
        $bran = AppsSetting::find($request->id);;
        $bran->link = $request->link;
        $bran->images = $filename;
        $bran->isactive = $isactive;
        $bran->save();

        return redirect('admin-ecom/apps-setting')->with('status', 'Apps Setting Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AppsSetting  $appsSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(AppsSetting $appsSetting)
    {
        $json=AppsSetting::find($id);
        $json->delete();
        return response()->json(1);
    }
}

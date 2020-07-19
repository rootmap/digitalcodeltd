<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\QRCode;
use Illuminate\Http\Request;

class QRCodeController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $data = QRCode::find(1);
        if (isset($data)) {
            return view('qrcode.index',['data'=>$data]);
        } else {
            return view('qrcode.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $this->validate($request, [
            'qrcode' => 'required',
            'qrcode_section_title' => 'required',
        ]);

        //echo $request->name;
        //exit();
        $filename = "";
        if (!empty($request->file('qrcode'))) {
            $img = $request->file('qrcode');
            $upload = 'upload/qrcode';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();

        $bran = new QRCode;
        $bran->qrcode_section_title = $request->qrcode_section_title;
        $bran->qrcode_link = $request->qrcode_link;
        $bran->qrcode = $filename;
        $bran->save();

        return redirect('admin-ecom/qrcode')->with('status', 'qrcode Added Successfully!');
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request) {
        $this->validate($request, [
            //'qrcode' => 'required',
            'qrcode_section_title' => 'required',
        ]);

        //echo $request->name;
        //exit();
        $filename = $request->exqrcode;
        if (!empty($request->file('qrcode'))) {
            $img = $request->file('qrcode');
            $upload = 'upload/qrcode';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();

        $bran = QRCode::find($request->id);
        $bran->qrcode_section_title = $request->qrcode_section_title;
        $bran->qrcode_link = $request->qrcode_link;
        $bran->QRCode = $filename;
        $bran->save();

        return redirect('admin-ecom/qrcode')->with('status', 'qrcode Updated Successfully!');
    }


    public function socialindex() {

        $data = QRCode::find(1);
        if (isset($data)) {
            return view('qrcode.social',['data'=>$data]);
        } else {
            return view('qrcode.social');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function socialcreate(Request $request) {
        $this->validate($request, [
            'social' => 'required',
            'social_link' => 'required',
        ]);

        //echo $request->name;
        //exit();
        $filename = "";
        if (!empty($request->file('social'))) {
            $img = $request->file('social');
            $upload = 'upload/social';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();

        $bran = new QRCode;
        $bran->social = $filename;
        $bran->social_link = $request->social_link;
        $bran->social_section_title = $request->social_section_title;
        $bran->save();

        return redirect('admin-ecom/social')->with('status', 'Social info Added Successfully!');
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function socialupdate(Request $request) {

        //echo $request->name;
        //exit();
        $filename = $request->exqrcode;
        if (!empty($request->file('social'))) {
            $img = $request->file('social');
            $upload = 'upload/social';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        else
        {
            $filename=$request->ex_social_image;
        }
        //echo $request->isactive;
        //exit();

        $bran = QRCode::find($request->id);
        $bran->social = $filename;
        $bran->social_link = $request->social_link;
        $bran->social_section_title = $request->social_section_title;
        $bran->save();

        return redirect('admin-ecom/social')->with('status', 'Social Updated Successfully!');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
   
}

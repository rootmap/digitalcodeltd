<?php

namespace App\Http\Controllers;

use App\GalleryPhoto;
use Illuminate\Http\Request;

class GalleryPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('pages.galleryphoto.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
        $this->validate($request, [
            'galleryphoto' => 'required',
        ]);

        //echo $request->name;
        //exit();
        $filename="";
        if (!empty($request->file('galleryphoto'))) {
            $img = $request->file('galleryphoto');
            $upload = 'upload/gallery-photo';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;
        
        
        
        $gallery = new GalleryPhoto;
        $gallery->photo = $filename;
        $gallery->isactive = $isactive;
        $gallery->save();

        return redirect('admin-ecom/gallery-photo')->with('status', 'Slider Added Successfully!');
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
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function showjson() {
        $json = GalleryPhoto::all();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }
    public function show($id)
    {
        $json=GalleryPhoto::find($id);
        return view('pages.galleryphoto.edit',['data'=>$json]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(GalleryPhoto $galleryPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(request $request, $id)
    {
        $filename=$request->eximage;
        if (!empty($request->file('galleryphoto'))) {
            $img = $request->file('galleryphoto');
            $upload = 'upload/gallery-photo';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;
        
        
        
        $gallery = GalleryPhoto::find($id);;
        $gallery->photo = $filename;
        $gallery->isactive = $isactive;
        $gallery->save();

        return redirect('admin-ecom/gallery-photo')->with('status', 'Slider Added Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GalleryPhoto  $galleryPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $json=GalleryPhoto::find($id);
        $json->delete();
        return response()->json(1);
    }
}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index() {
        return view('lang.index');
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
        if (!empty($request->file('languageimage'))) {
            $img = $request->file('languageimage');
            $upload = 'upload\language';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();
        
        $isactive=$request->isactive?1:0;

        $bran = new Language;
        $bran->name = $request->name;
        $bran->languageimage = $filename;
        $bran->description = $request->description;
        $bran->isactive = $isactive;
        $bran->save();

        return redirect('admin-ecom/lang')->with('status', 'Language Added Successfully!');
    }

    public function showjson() {
        $json = Language::all();

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
        $json=Language::find($id);
        return view('lang.edit',['data'=>$json]);
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
        if (!empty($request->file('languageimage'))) {
            $img = $request->file('languageimage');
            $upload = 'upload\language';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();

        $isactive=$request->isactive?1:0;
        
        $bran =Language::find($request->id);
        $bran->name = $request->name;
        $bran->languageimage = $filename;
        $bran->description = $request->description;
        $bran->isactive = $isactive;
        $bran->save();

        return redirect('admin-ecom/lang')->with('status', 'Language Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=Language::find($id);
        $json->delete();
        return response()->json(1);
    }

}

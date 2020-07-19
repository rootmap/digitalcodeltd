<?php

namespace App\Http\Controllers;

use App\WelcomeContent;
use Illuminate\Http\Request;

class WelcomeContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.welcome-content.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);

        $isactive=$request->isactive?1:0;
        
        
        
        $offer = new WelcomeContent;
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->free_home_delivery = $request->free_home_delivery;
        $offer->isactive = $isactive;
        $offer->save();

        return redirect('admin-ecom/welcome-content')->with('status', 'Welcome Content Added Successfully!');
    }

    public function showjson() {
        $json = WelcomeContent::all();

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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WelcomeContent  $welcomeContent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $json=WelcomeContent::find($id);
        return view('pages.welcome-content.edit',['data'=>$json]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WelcomeContent  $welcomeContent
     * @return \Illuminate\Http\Response
     */
    public function edit(WelcomeContent $welcomeContent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WelcomeContent  $welcomeContent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WelcomeContent $welcomeContent)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        
        $isactive=$request->isactive?1:0;

        $offer =WelcomeContent::find($request->id);
        $offer->title = $request->title;
        $offer->description = $request->description;
        $offer->free_home_delivery = $request->free_home_delivery;
        $offer->isactive = $isactive;
        $offer->save();

        return redirect('admin-ecom/welcome-content')->with('status', 'Welcome Content Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WelcomeContent  $welcomeContent
     * @return \Illuminate\Http\Response
     */
    public function destroy(WelcomeContent $welcomeContent)
    {
         $json=WelcomeContent::find($id);
        $json->delete();
        return response()->json(1);
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\TodayOffer;
use Illuminate\Http\Request;

class TodayOfferController extends Controller
{
    public function index()
	{
        return view('pages.today-offer.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request) {
        $this->validate($request, [
            'title' => 'required',
        ]);

        //echo $request->name;
        //exit();
        $filename="";
        if (!empty($request->file('offerimage'))) {
            $img = $request->file('offerimage');
            $upload = 'upload/today-offer';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;
        
        
        
        $offer = new TodayOffer;
        $offer->title = $request->title;
        $offer->name = $request->name;
        $offer->description = $request->description;
        $offer->offerimage = $filename;
        $offer->isactive = $isactive;
        $offer->save();

        return redirect('admin-ecom/todayoffer')->with('status', 'Today Offer Added Successfully!');
    }

    public function showjson() {
        $json = TodayOffer::all();

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
        // $pro=TodayOffer::all();
        $json=TodayOffer::find($id);
        return view('pages.today-offer.edit',['data'=>$json]);
        
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
            'title' => 'required',
        ]);


        $filename=$request->eximage;
        if (!empty($request->file('offerimage'))) {
            $img = $request->file('offerimage');
            $upload = 'upload/today-offer';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();
        
        $isactive=$request->isactive?1:0;

        $offer =TodayOffer::find($request->id);
        $offer->title = $request->title;
        $offer->name = $request->name;
        $offer->description = $request->description;
        $offer->offerimage = $filename;
        $offer->isactive = $isactive;
        $offer->save();

        return redirect('admin-ecom/todayoffer')->with('status', 'Today Offer Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=TodayOffer::find($id);
        $json->delete();
        return response()->json(1);
    }
}

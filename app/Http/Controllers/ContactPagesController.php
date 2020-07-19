<?php

namespace App\Http\Controllers;

use App\ContactPages;
use Illuminate\Http\Request;


use App\Product;
use Session;
use App\Cart;


use App\Seo;
use App\category;
use App\SubCategory;
use App\Brand;
use App\Slider;
use App\CustomerSupport;
use App\ContactDetail;
use App\Language;
use App\Currency;
use App\ProductReview;
use App\Shipping;
use App\Orders;
use App\OrdersItem;
use App\DeliveryAddress;
use App\PaymentMethod;


class ContactPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
            $pro=ContactPages::all();
            return view('contact-pages.index',['product'=>$pro]);
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
        //echo $request->isactive;
        //exit();

        $bran = new ContactPages;
        $bran->heading = $request->heading;
        $bran->name = $request->name;
        $bran->description = $request->description;
        $bran->isactive = $request->isactive?'1':0;
        $bran->save();

        return redirect('admin-ecom/Contact-Pages')->with('status', 'Slider Added Successfully!');
    }

    public function showjson() {
        $json = ContactPages::all();

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
        $json=ContactPages::find($id);
        return view('contact-pages.edit',['data'=>$json]);
    }
    
    public function showPage($name)
    {
        
        $language = Language::all();
        $currency = Currency::all();

        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();

        //$subcat=SubCategory::all();
        $cat = category::take(2)->get();

        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        
        $json=ContactPages::where('name',$name)->get();
        return view('index-pages.contact-pages',[
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'cat' => $cat,
            'brn' => $brn,
            'cats' => $cats,'data'=>$json]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        echo $id;
        exit();
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
        //echo $request->isactive;
        //exit();

        $bran =ContactPages::find($request->id);
        $bran->heading = $request->heading;
        $bran->name = $request->name;
        $bran->description = $request->description;
        $bran->isactive = $request->isactive?'1':0;
        $bran->save();

        return redirect('admin-ecom/Contact-Pages')->with('status', 'Slider Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=ContactPages::find($id);
        $json->delete();
        return response()->json(1);
    }
}

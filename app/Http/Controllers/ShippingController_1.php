<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            return view('shipping.index');
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
        if (!empty($request->file('shippingimage'))) {
            $img = $request->file('shippingimage');
            $upload = 'upload\shipping';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();

        $bran = new Shipping;
        $bran->name = $request->name;
        $bran->price = $request->price;
        $bran->shippingimage = $filename;
        $bran->description = $request->description;
        $bran->isactive = $request->isactive;
        $bran->save();

        return redirect('admin-ecom/shipping')->with('status', 'Shipping Added Successfully!');
    }

    public function showjson() {
        $json = Shipping::all();

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
        $json=Shipping::find($id);
        return view('shipping.edit',['data'=>$json]);
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
        if (!empty($request->file('shippingimage'))) {
            $img = $request->file('shippingimage');
            $upload = 'upload\shipping';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();

        $bran =Shipping::find($request->id);
        $bran->name = $request->name;
        $bran->price = $request->price;
        $bran->shippingimage = $filename;
        $bran->description = $request->description;
        $bran->isactive = $request->isactive;
        $bran->save();

        return redirect('admin-ecom/shipping')->with('status', 'Shipping Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=Shipping::find($id);
        $json->delete();
        return response()->json(1);
    }

}

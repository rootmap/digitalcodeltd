<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Slider;
use App\Product;
use Illuminate\Http\Request;


class SliderController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            $pro=Product::all();
            return view('slider.index',['product'=>$pro]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'product_id' => 'required',
        ]);

        //echo $request->name;
        //exit();
        $filename="";
        if (!empty($request->file('sliderimage'))) {
            $img = $request->file('sliderimage');
            $upload = 'upload/slider';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();
        $isactive=$request->isactive?1:0;
        
        
        
        $bran = new Slider;
        $bran->name = $request->name;
        $bran->product_id = $request->product_id;
        $bran->sliderimage = $filename;
        $bran->description = $request->description;
        $bran->isactive = $isactive;
        $bran->save();

        return redirect('admin-ecom/slider')->with('status', 'Slider Added Successfully!');
    }

    public function showjson() {
        $json = Slider::all();

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
        $pro=Product::all();
        $json=Slider::find($id);
        return view('slider.edit',['data'=>$json,'product'=>$pro]);
        
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
            'product_id' => 'required',
        ]);


        $filename=$request->eximage;
        if (!empty($request->file('sliderimage'))) {
            $img = $request->file('sliderimage');
            $upload = 'upload/slider';
            //$filename=$img->getClientOriginalName();
            $filename = time() . "." . $img->getClientOriginalExtension();
            $success = $img->move($upload, $filename);
        }
        //echo $request->isactive;
        //exit();
        
        $isactive=$request->isactive?1:0;

        $bran =Slider::find($request->id);
        $bran->name = $request->name;
        $bran->product_id = $request->product_id;
        $bran->sliderimage = $filename;
        $bran->description = $request->description;
        $bran->isactive = $isactive;
        $bran->save();

        return redirect('admin-ecom/slider')->with('status', 'Slider Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=Slider::find($id);
        $json->delete();
        return response()->json(1);
    }

}

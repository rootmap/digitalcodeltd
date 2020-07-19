<?php

namespace App\Http\Controllers;

use App\ProductColor;
use Illuminate\Http\Request;

class ProductColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		return view('color.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create(Request $request)
	{
		$this->validate($request,[
            'name'=>'required',
        ]);

        //echo $request->name;
        //exit();

        $cat=new ProductColor;
        $cat->name=$request->name;
        $cat->save();

        return redirect('admin-ecom/color')->with('status', 'Color Added!');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	public function showjson()
    {
        $json =ProductColor::all();

        $retarray=array("data"=>$json,"total"=>count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$json=ProductColor::find($id);
        return view('color.edit',['data'=>$json]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$this->validate($request,[
            'name'=>'required',
        ]);

        //echo $request->name;
        //exit();

        $cat=ProductColor::find($request->id);
        $cat->name=$request->name;
        $cat->save();

        return redirect('admin-ecom/color')->with('status', 'Color Updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
            $json=ProductColor::find($id);
            $json->delete();
            return response()->json(1);
	}
}

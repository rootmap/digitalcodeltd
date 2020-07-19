<?php

namespace App\Http\Controllers;

use App\ProductUnitType;
use Illuminate\Http\Request;

class ProductUnitTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
	{
		return view('unit_type.index');
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

        $cat=new ProductUnitType;
        $cat->name=$request->name;
        $cat->save();

        return redirect('admin-ecom/unit-type')->with('status', 'Tag Added!');
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
        $json =ProductUnitType::all();

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
		$json=ProductUnitType::find($id);
        return view('unit_type.edit',['data'=>$json]);
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

        $cat=ProductUnitType::find($request->id);
        $cat->name=$request->name;
        $cat->save();

        return redirect('admin-ecom/unit-type')->with('status', 'Tag Updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$json=ProductUnitType::find($id);
        $json->delete();
        return response()->json(1);
	}
}

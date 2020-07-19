<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Tag;

class TagController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('tag.index');
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

        $cat=new Tag;
        $cat->name=$request->name;
        $cat->save();

        return redirect('admin-ecom/tag')->with('status', 'Tag Added!');
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
        $json =Tag::all();

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
		$json=Tag::find($id);
        return view('tag.edit',['data'=>$json]);
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

        $cat=Tag::find($request->id);
        $cat->name=$request->name;
        $cat->save();

        return redirect('admin-ecom/tag')->with('status', 'Tag Updated!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$json=Tag::find($id);
        $json->delete();
        return response()->json(1);
	}

}

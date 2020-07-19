<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\SubSubCategory;
use App\SubCategory;
use App\category;

class SubSubCategoryController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $cat = category::all();
        return view('subextracategory.index', ['cat' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request) {
        $this->validate($request, [
            'cid' => 'required',
            'name' => 'required'
        ]);
        
        $thumbname = "";
        if (!empty($request->file('photo'))) {
            $img = $request->file('photo');
            $upload = 'upload/subcategory';
            //$filename=$img->getClientOriginalName();
            $thumbname = time() . "S." . $img->getClientOriginalExtension();
            $img->move($upload, $thumbname);
        }

        $subcat = new SubSubCategory;
        $subcat->category_id = $request->cid;
        $subcat->sub_category_id = $request->scid;
        $subcat->name = $request->name;
        $subcat->photo = $thumbname;
        $subcat->description = $request->description;
        $subcat->save();
        \Session::flash('status', 'Sub-Sub-Category Successfully Added.');
        return redirect()->action('SubSubCategoryController@index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    public function showjsonSubCategory(Request $request) {
        $json= DB::table('sub_categories')
               ->where('category_id',$request->category_id) 
               ->get();        
        
        //$json = SubCategory::all();

        //$retarray = array("data" => $json, "total" => count($json));

        return response()->json($json);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }
    
    public function showjson() {
        $json= DB::table('sub_sub_categories')
        ->join('categories','sub_sub_categories.category_id','=','categories.id')
        ->join('sub_categories','sub_sub_categories.sub_category_id','=','sub_categories.id')
        ->select('sub_sub_categories.*','categories.name as cname','sub_categories.name as scname')
        ->groupBy('sub_sub_categories.id')        
        ->get();        
        
        //$json = SubCategory::all();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $cat = category::all();
        $json=SubSubCategory::find($id);
        $jsonSub=SubCategory::where('category_id',$json->category_id)->get();
        
        //print_r($jsonSub);
        //exit();
        
        return view('subextracategory.edit',['data'=>$json,'cat'=>$cat,'scat'=>$jsonSub]);
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
            'cid' => 'required',
            'scid' => 'required',
            'name' => 'required'
        ]);
        
        $thumbname = $request->ex_photo;
        if (!empty($request->file('photo'))) {
            $img = $request->file('photo');
            $upload = 'upload/category';
            //$filename=$img->getClientOriginalName();
            $thumbname = time() . "S." . $img->getClientOriginalExtension();
            $img->move($upload, $thumbname);
        }

        $subcat=SubSubCategory::find($request->id);
        $subcat->category_id = $request->cid;
        $subcat->sub_category_id = $request->scid;
        $subcat->name = $request->name;
        $subcat->photo = $thumbname;
        $subcat->description = $request->description;
        $subcat->save();
        \Session::flash('status', 'Sub-Sub-Category Successfully Updated.');
        return redirect()->action('SubSubCategoryController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $json=SubSubCategory::find($id);
        $json->delete();
        return response()->json(1);
    }

}

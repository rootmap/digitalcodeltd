<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductTag;
use App\Product;
use App\Tag;
use Illuminate\Support\Facades\DB;
class ProductTagController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $pro = Product::all();
        $tag = Tag::all();
       
        return view('producttag.index',['product' => $pro, 'tag' => $tag]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {


        $this->validate($request,[
            'pid'=>'required',
            'tid'=>'required',
        ]);

        //echo $request->name;
        //exit();

        $cat=new ProductTag;
        $cat->pid=$request->pid;
        $cat->tid=$request->tid;
        $cat->save();

        return redirect('admin-ecom/product-tag')->with('status', 'Tag Added in Product Successfully!');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        //
    }

    public function showjson() {
        $json =DB::table('product_tags as pt')
               ->join('products as p','pt.pid','=','p.id')
               ->join('tags as t','pt.tid','=','t.id')
                ->select('pt.*','p.name as pname','t.name as tname')
                ->get();

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
    public function show($id)
    {
        $pro=Product::all();
        $tag=Tag::all();
        $json=ProductTag::find($id);
        
//        echo '<pre>';
//        print_r($json);
//        exit();
        return view('producttag.edit',['data'=>$json,'product'=>$pro,'tag'=>$tag]);
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
    public function update(Request $request)
    {


        $this->validate($request,[
            'pid'=>'required',
            'tid'=>'required',
        ]);

        //echo $request->name;
        //exit();

        $cat=ProductTag::find($request->id);
        $cat->pid=$request->pid;
        $cat->tid=$request->tid;
        $cat->save();

        return redirect('admin-ecom/product-tag')->with('status', 'Tag Updated in Product Successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $json=ProductTag::find($id);
        $json->delete();
        return response()->json(1);
    }

}

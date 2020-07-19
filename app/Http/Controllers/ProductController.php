<?php

namespace App\Http\Controllers;
use App\PizzaSize;
use App\PizzaFlabour;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\category;
use App\ProductOneSubLevel;
use App\SubCategory;
use App\Brand;
use App\Tag;
use App\Product;
use App\ProductTag;
use App\ProductUnitType;
use App\ProductColor;
use App\ColorInProduct;
use App\ProductTwoSubLevel;
use Symfony\Component\HttpFoundation\File;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $json = DB::table('products as p')
                ->leftjoin('categories as c', 'p.cid', '=', 'c.id')
                ->select('p.*', 'c.name as cname')
                ->orderBy('p.position', 'ASC')
                ->get();
        return view('product.index',['dataTable'=>$json]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        $cat = category::all();
        $scat = SubCategory::all();
        return view('product.create', ['cat' => $cat,'scat' => $scat]);
    }

    public function filtersubcat(Request $request) {
        $query = DB::table('sub_categories')->where('category_id', $request->cid)->get();
        return response()->json($query);
    }

    public function productreorder(Product $product,Request $request)
    {
        $postArray=explode('&',$request->data);
        $totalPost=count($postArray);
        if($totalPost!=0)
        {
            $product::where('position','0')->update(['position'=>3000]);
            $lastPositionSQL=$product::where('position','!=',3000)
                                        ->select('position')
                                        ->orderBy('position','DESC')
                                        ->first();
            $lastPosition=0;                            
            if(isset($lastPositionSQL))
            {
                $lastPosition=(int)($lastPositionSQL->position+1);
            }
            else
            {
                $lastPosition=1;
            }
            foreach($postArray as $key=>$row):
                $pid=str_replace('pid[]=','',$row);
                if(!empty($pid))
                {
                    $product::where('id',$pid)->update(['position'=>($key+$lastPosition)]);
                }
            endforeach;  
            return $totalPost;
        }
        else
        {
            return 0;
        }  

    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request) {

        $this->validate($request, ['input_type' => 'required']);
        $isactive = $request->isactive ? 1 : 0;
        
        //dd($request->scid);


        $input_type = $request->input_type ? $request->input_type : 0;

            if($input_type==1)
            {
                $this->validate($request, [
                    'name' => 'required',
                    'price' => 'required',
                    'cid' => 'required'
                ]);

                $scid = $request->scid ? $request->scid : 0;

                $pro = new Product;
                $pro->pcode = $request->pcode;
                $pro->product_level_type = $input_type;
                $pro->name = $request->name;
                $pro->price = $request->price;
                $pro->old_price = $request->old_price;
                $pro->cid = $request->cid;
                $pro->scid = $scid;
                $pro->quantity = 1;
                $pro->description = $request->description;
                $pro->isactive = $isactive;
                $pro->save();

                category::where('id',$request->cid)->increment('product',1);
            }
            elseif(($input_type==2) OR ($input_type==3))
            {
                $this->validate($request, [
                    'name' => 'required',
                    'cid' => 'required'
                ]);

                $scid = $request->scid ? $request->scid : 0;

                $pro = new Product;
                $pro->product_level_type = $input_type;
                $pro->name = $request->name;
                $pro->price = 0;
                $pro->old_price = 0;
                $pro->cid = $request->cid;
                $pro->scid = $scid;
                $pro->quantity = 1;
                $pro->description = $request->description?$request->description:'';
                $pro->isactive = $isactive;
                $pro->save();
                $pid=$pro->id;
                //echo $pid; 
                $totalProduct=count($request->spname);
                //dd($request->smprice);
                foreach ($request->spname as $key => $pro) {
                    $tab=new ProductOneSubLevel;
                    $tab->name=$pro;
                    $tab->quantity=1;
                    $tab->price=$request->smprice[$key];
                    $tab->pid=$pid;
                    $tab->description=$request->sdesc[$key];
                    $tab->save();
                }
                category::where('id',$request->cid)->increment('product',1);
            }
            elseif($input_type==4)
            {
                $this->validate($request, [
                    'name' => 'required',
                    'cid' => 'required',
                    'price' => 'required'
                ]);

                $scid = $request->scid ? $request->scid : 0;

                $pro = new Product;
                $pro->product_level_type = $input_type;
                $pro->name = $request->name;
                $pro->price =$request->price;
                $pro->old_price = $request->old_price;
                $pro->cid = $request->cid;
                $pro->scid = $scid;
                $pro->quantity = 1;
                $pro->description = $request->description?$request->description:'';
                $pro->isactive = $isactive;
                $pro->save();
                $pid=$pro->id;

                $totalProduct=count($request->dp_name);
                foreach ($request->dp_name as $key => $pro) {
                    $tab=new ProductOneSubLevel;
                    $tab->name=$pro;
                    $tab->pid=$pid;
                    $tab->inq_id=$request->dp_no[$key];
                    $tab->parent_id=$request->parent_opt[$key];
                    $tab->description=$request->dp_opt[$key];
                    $tab->save();
                }
                category::where('id',$request->cid)->increment('product',1);
            }
            elseif($input_type==5)
            {
                $this->validate($request, [
                    'name' => 'required',
                    'cid' => 'required',
                    'pro_default_price' => 'required'
                ]);

                $scid = $request->scid ? $request->scid : 0;

                $pro = new Product;
                $pro->product_level_type = $input_type;
                $pro->name = $request->name;
                $pro->price = $request->pro_default_price;
                $pro->old_price = 0;
                $pro->cid = $request->cid;
                $pro->scid = $scid;
                $pro->quantity = 1;
                $pro->description = $request->description?$request->description:'';
                $pro->isactive = $isactive;
                $pro->save();
                $pid=$pro->id;

                $totalProduct=count($request->s_name);
                foreach ($request->s_name as $key => $size) {
                    if(!empty($size))
                    {
                        $tab=new PizzaSize;
                        $tab->name=$size;
                        $tab->price=$request->s_price[$key];
                        $tab->pid=$pid;
                        $tab->save();
                    }
                }

                foreach ($request->fl_name as $keys => $fl) {
                    if(!empty($fl))
                    {
                        $tab=new PizzaFlabour;
                        $tab->name=$fl;
                        $tab->price=$request->fl_price[$keys];
                        $tab->pid=$pid;
                        $tab->save();
                    }
                }

                foreach ($request->e_name as $index => $pro) {
                    if(!empty($pro))
                    {
                        $tab=new ProductOneSubLevel;
                        $tab->name=$pro;
                        $tab->price=$request->e_price[$index];
                        $tab->description=$request->e_desc[$index];
                        $tab->quantity=1;
                        $tab->pid=$pid;
                        $tab->save();
                    }
                }

                category::where('id',$request->cid)->increment('product',1);
            }
            elseif($input_type==6)
            {
                $this->validate($request, [
                    'name' => 'required',
                    'cid' => 'required',
                    'pro_default_price' => 'required'
                ]);

                $scid = $request->scid ? $request->scid : 0;

                $pro = new Product;
                $pro->product_level_type = $input_type;
                $pro->name = $request->name;
                $pro->price = $request->pro_default_price;
                $pro->old_price = 0;
                $pro->cid = $request->cid;
                $pro->scid = $scid;
                $pro->quantity = 1;
                $pro->description = $request->description?$request->description:'';
                $pro->isactive = $isactive;
                $pro->save();
                $pid=$pro->id;

                $totalProduct=count($request->l_one_name);


                

                foreach ($request->l_one_name as $key => $size) {
                    if(!empty($size))
                    {
                        $tab=new PizzaSize;
                        $tab->name=$size;
                        $tab->price=$request->l_one_price[$key];
                        $tab->pid=$pid;
                        $tab->save();
                    }
                }

                foreach ($request->l_two_name as $keys => $fl) {
                    if(!empty($fl))
                    {
                        $tab=new PizzaFlabour;
                        $tab->name=$fl;
                        $tab->price=$request->l_two_price[$keys];
                        $tab->pid=$pid;
                        $tab->save();
                    }
                }
                
                foreach ($request->l_three_name as $keys => $fl) {
                    if(!empty($fl))
                    {
                        $tab=new PizzaLevelThree;
                        $tab->name=$fl;
                        $tab->price=$request->l_three_price[$keys];
                        $tab->pid=$pid;
                        $tab->save();
                    }
                }

                foreach ($request->l_four_name as $keys => $fl) {
                    if(!empty($fl))
                    {
                        $tab=new PizzaLevelFour;
                        $tab->name=$fl;
                        $tab->price=$request->l_four_price[$keys];
                        $tab->pid=$pid;
                        $tab->save();
                    }
                }
                
                foreach ($request->l_five_name as $keys => $fl) {
                    if(!empty($fl))
                    {
                        $tab=new PizzaLevelFive;
                        $tab->name=$fl;
                        $tab->price=$request->l_five_price[$keys];
                        $tab->pid=$pid;
                        $tab->save();
                    }
                }
                
                foreach ($request->e_name as $index => $pro) {
                    if(!empty($pro))
                    {
                        $tab=new ProductOneSubLevel;
                        $tab->name=$pro;
                        $tab->price=$request->e_price[$index];
                        $tab->description=$request->e_desc[$index];
                        $tab->quantity=1;
                        $tab->pid=$pid;
                        $tab->save();
                    }
                }

                category::where('id',$request->cid)->increment('product',1);
            }

        
    
        // exit();

        \Session::flash('status', 'Successfully Added To Product List');
        //->with('status', 'Successfully Added To Product List.')
        return redirect()->action('ProductController@create');
    }

    public function showjson() {
        $json = DB::table('products as p')
                ->leftjoin('categories as c', 'p.cid', '=', 'c.id')
                ->select('p.*', 'c.name as cname')
                ->orderBy('p.id', 'desc')
                ->get();

        $retarray = array("data" => $json, "total" => count($json));

        return response()->json($retarray);
    }
    
    public function SubSubCategory(Request $request) {
        $json = DB::table('categories')
                ->where('categories.id',$request->category_id)
                ->where('categories.layout',3)
                ->count();

        return response()->json($json);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    public function SubSubCategoryJson(Request $request) {
        $json = DB::table('sub_sub_categories')
                ->where('sub_sub_categories.id',$request->sub_category_id)
                ->get();
                
        return response()->json($json);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }
    
    public function DedSubCategory(Request $request) {
        $json = DB::table('categories')
                ->where('categories.id',$request->category_id)
                ->count();

        if($json==0)
        {
            $response=array('status'=>0);
        }
        else
        {
            $jsonData = DB::table('categories')
                ->where('categories.id',$request->category_id)
                ->first();
            $response=array('status'=>1,'layout'=>$jsonData->layout);
        }        

        return response()->json($response);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }

    public function brandCheckLayout(Request $request) {
        $json = DB::table('brands')
                ->where('brands.id',$request->bid)
                ->where('brands.is_custom_layout',1)
                ->count();
        if($json==1)
        {
            $jsonResponse = DB::table('brands')
                    ->select('layout')
                    ->where('brands.id',$request->bid)
                    ->where('brands.is_custom_layout',1)
                    ->first();
            $returnArray=array('status'=>1,'layout'=>$jsonResponse->layout);
        }
        else
        {
            $returnArray=array('status'=>0);
        }
        return response()->json($returnArray);
    }


    public function brandLayoutExtract(Request $request) {
        $json = DB::table('brands')
                ->select('layout')
                ->where('brands.id',$request->bid)
                ->where('brands.is_custom_layout',1)
                ->first();

        return response()->json($json);
    }

    public function scidCheckLayout(Request $request) {
        $json = DB::table('sub_categories')
                ->where('sub_categories.id',$request->scid)
                ->where('sub_categories.is_custom_layout',1)
                ->count();

        return response()->json($json);
    }

    public function scidLayoutExtract(Request $request) {
        $json = DB::table('sub_categories')
                ->select('layout')
                ->where('sub_categories.id',$request->scid)
                ->where('sub_categories.is_custom_layout',1)
                ->first();

        return response()->json($json);
    }

    public function DedSubCategoryShowBrand(Request $request) {
        $json = DB::table('categories')
                ->where('categories.id',$request->category_id)
                ->where('categories.layout',4)
                ->count();

        return response()->json($json);
        //"{\"data\":" . json_encode($json) . ",\"total\":" . count($json) . "}"
    }
    
    public function JsonSubSubCategory(Request $request) {
        $json = DB::table('sub_sub_categories')
                ->where('sub_sub_categories.category_id',$request->category_id)
                ->where('sub_sub_categories.sub_category_id',$request->sub_category_id)
                ->get();
        
        //echo "<pre>";
        //print_r($json);
        //exit();

        return response()->json($json);
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
        $json = Product::find($id);

        $productOneSubLevel_count=ProductOneSubLevel::where('pid',$id)->count();
       // dd($productOneSubLevel_count);
        $productOneSubLevel=ProductOneSubLevel::where('pid',$id)->get();
        //dd($productOneSubLevel);
        return view('product.edit', ['data' => $json,'cat' => $cat,'productOneSubLevel_count'=>$productOneSubLevel_count,'productOneSubLevel'=>$productOneSubLevel]);
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
            'pcode' => 'required',
            'name' => 'required',
            'price' => 'required',
            'cid' => 'required'
        ]);

        $isactive = $request->isactive ? 1 : 0;
        $pid = $request->id;



        $pro = Product::find($pid);
        $pro->pcode = $request->pcode;
        $pro->name = $request->name;
        $pro->price = $request->price;
        $pro->old_price = $request->old_price;
        $pro->cid = $request->cid;
        $pro->description = $request->description;
        $pro->isactive = $isactive;
        $pro->save();


        if(isset($request->productOneSubLevel_count))
        {

            ProductOneSubLevel::where('pid',$pid)->delete();
           // echo 1; die();
            $totalProduct=count($request->spname);
            //dd($request->smprice);
            foreach ($request->spname as $key => $pro) {
                $tab=new ProductOneSubLevel;
                $tab->name=$pro;
                $tab->quantity=1;
                $tab->price=$request->smprice[$key];
                $tab->pid=$pid;
                $tab->description=$request->sdesc[$key];
                $tab->save();
            }
        }

        \Session::flash('status', 'Successfully Updated To Product List');
        //->with('status', 'Successfully Added To Product List.')
        return redirect()->action('ProductController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $cleantag = DB::table('product_tags')->where('pid', '=', $id)->delete();
        $delinfo = Product::find($id);
        $delinfo->delete();
        //\Session::flash('status', 'Successfully Updated To Product List');
        //
        return response()->json(1);
    }

}

<?php

namespace App\Http\Controllers;

use App\Seo;
use App\category;
use App\SubCategory;
use App\Brand;
use App\Product;
use App\Cart;
use App\CustomerSupport;
use App\ContactDetail;
use App\Language;
use App\Currency;
use App\User;
use Session;
use Illuminate\Http\Request;

class searchController extends Controller {

    public function locateSearch(Request $request) {
        if (!empty($request->category_filter) && !empty($request->search_query)) {
            return redirect(url('search/' . $request->category_filter . '/' . $request->search_query));
        } elseif (empty($request->category_filter) && !empty($request->search_query)) {
            return redirect(url('search/0/' . $request->search_query));
        } elseif (!empty($request->category_filter) && empty($request->search_query)) {
            return redirect(url('search/' . $request->category_filter . '/'));
        } else {
            return redirect(url('search/0/'));
        }
    }

        public function GenaratePageDataLimit($limit='')
    {
        if(!session::has('pagination_limit') && empty($limit))
        {
            session::put('pagination_limit',9);
        }
        elseif(!session::has('pagination_limit') && !empty($limit))
        {
            session::put('pagination_limit',$limit);
        }
        elseif(session::has('pagination_limit') && !empty($limit))
        {
            session::put('pagination_limit',$limit);
        }

        $newLimit=session::get('pagination_limit')?session::get('pagination_limit'):$limit;

        return $newLimit;
    }

    public function GenaratePageDataFilter($filter='')
    {
        if(!session::has('filter') && empty($filter))
        {
            session::put('filter','id-desc');
        }
        elseif(!session::has('filter') && !empty($filter))
        {
            session::put('filter',$filter);
        }
        elseif(session::has('filter') && !empty($filter))
        {
            session::put('filter',$filter);
        }

        $filterData=session::get('filter')?session::get('filter'):'id-desc';
       

        return $filterData;

    }

    public function searchProduct($catpage = 0, $search = '', $limit = 9, $curpage = 1,$orderby="price:desc",$param1='',$param2='',$param3='',$param4='',$param5='',$param6='') { 
        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        $filter=$this->GenaratePageDataFilter();
        
        
        $searchfound = Product::where('name', 'LIKE', '%' . $search . '%')->where('pcode', 'LIKE', '%' . $search . '%')->count();
        $product_info = Product::where('name', 'LIKE', '%' . $search . '%')->orWhere('pcode', 'LIKE', '%' . $search . '%')
                        ->when($filter, function($query) use ($filter){
                            if($filter=='id-desc'){ return $query->orderby('id','desc'); }
                            elseif($filter=='price:asc'){ return $query->orderby('price','asc'); }
                            elseif($filter=='price:desc'){ return $query->orderby('price','desc'); }
                            elseif($filter=='name:asc'){ return $query->orderby('name','asc'); }
                            elseif($filter=='name:desc'){ return $query->orderby('name','desc'); }
                            elseif($filter=='quantity:desc'){ return $query->orderby('quantity','desc'); }
                            elseif($filter=='position:asc'){ return $query->orderby('id','desc'); }
                            else{ return $query->orderby('id','desc'); }                    
                        })
                        ->paginate($this->GenaratePageDataLimit());
                        
        //dd($product_info);               
                        
        $orderarray= 0;
        //print_r($orderarray);
        //exit();
        $genskip=0;
        
        $product_infoget = '';
        
        $totalpro =$searchfound;
        
        $pagedeviner=0;
       
        
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        
        
        //echo floor($pagedeviner);
        //exit();

        $urlst = "search/" . $catpage . "/" . $search;
        return view('index-pages.search-result', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'brand' => '',
            'cat' => $cat,
            'cats' => $cats,
            'product' => $totalpro,
            'product_info' => $product_info,
            'product_info_fetch' => $product_info,
            'urlst' => $urlst,
            'pagination' => $product_info,
            'curpage' =>$curpage,
            'limit' =>$limit,
            'ord'=>$orderarray,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
            
        ]);
    }

}

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
use App\Wishlist;

class WishlistController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function locateSearch(Request $request) {
        if (!empty($request->category_filter) && !empty($request->search_query)) {
            return redirect(url('wish-list/' . $request->category_filter . '/' . $request->search_query));
        } elseif (empty($request->category_filter) && !empty($request->search_query)) {
            return redirect(url('wish-list/0/' . $request->search_query));
        } elseif (!empty($request->category_filter) && empty($request->search_query)) {
            return redirect(url('wish-list/' . $request->category_filter . '/'));
        } else {
            return redirect(url('wish-list/0/a'));
        }
    }

    public function searchProduct($catpage = 0, $search = '', $limit = 9, $curpage = 1, $orderby = "price:desc", $param1 = '', $param2 = '', $param3 = '', $param4 = '', $param5 = '', $param6 = '') {
        $language = Language::all();
        $currency = Currency::all();
        $cs = CustomerSupport::all();
        $cde = ContactDetail::all();
        $cat = category::take(2)->get();
        $cats = category::all();
        $brn = Brand::all();
        $seo = Seo::all();
        $product = Product::all();
        if (!empty($search)) {
            $product_info = Product::where('name', 'LIKE', '%' . $search . '%')->get();
        } else {
            $product_info = Product::all();
        }
        

        $orderarray = explode(":", $orderby);
        //print_r($orderarray);
        //exit();
        $genskip = (($curpage - 1) * $limit);
        $product_infoget = Product::where('name', 'LIKE', '%' . $search . '%')
                ->orderBy($orderarray[0], $orderarray[1])
                ->take($limit)
                ->skip($genskip)
                ->get();

        $totalpro = count($product_info);

        $pagedeviner = floor($totalpro / $limit);
        $genfric = $pagedeviner * $limit;
        $fric = $totalpro - $genfric;
        if (!empty($fric)) {
            $pagedeviner += 1;
        } else {
            $pagedeviner = 1;
        }

        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);


        //echo floor($pagedeviner);
        //exit();

        $urlst = "wish-list/" . $catpage . "/" . $search;
        return view('index-pages.wishlist', [
            'language' => $language,
            'currency' => $currency,
            'cussup' => $cs,
            'csudet' => $cde,
            'seo' => $seo,
            'brn' => $brn,
            'brand' => '',
            'cat' => $cat,
            'cats' => $cats,
            'product' => $product,
            'product_info' => $product_info,
            'product_info_fetch' => $product_infoget,
            'urlst' => $urlst,
            'pagination' => $pagedeviner,
            'curpage' => $curpage,
            'limit' => $limit,
            'ord' => $orderarray,
            'products' => $cart->items,
            'totalQty' => $cart->totalQty,
            'totalPrice' => $cart->totalPrice
        ]);
    }

    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Wishlist $wishlist) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist) {
        //
    }

}

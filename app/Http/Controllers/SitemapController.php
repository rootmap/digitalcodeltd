<?php

namespace App\Http\Controllers;

use App\category;
use Illuminate\Http\Request;

class SitemapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$category=Category::select('id')->get();
        return response()->view('sitemap.sitemap',compact('category'))->header('Content-Type', 'text/xml');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PizzaFlabour  $pizzaFlabour
     * @return \Illuminate\Http\Response
     */
    public function show(PizzaFlabour $pizzaFlabour)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PizzaFlabour  $pizzaFlabour
     * @return \Illuminate\Http\Response
     */
    public function edit(PizzaFlabour $pizzaFlabour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PizzaFlabour  $pizzaFlabour
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PizzaFlabour $pizzaFlabour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PizzaFlabour  $pizzaFlabour
     * @return \Illuminate\Http\Response
     */
    public function destroy(PizzaFlabour $pizzaFlabour)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::paginate(6);
        $expensive=Product::orderBy('price','DESC')->paginate(6);
        $inexpensive=Product::orderBy('price')->paginate(6);
        return view('website.frontend.list.index',['products'=>$products,'expensive'=>$expensive,'inexpensive'=>$inexpensive]);
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $products=Product::where('product_category_id',$id)->paginate(6);
        $expensive=Product::where('product_category_id',$id)->orderBy('price','DESC')->paginate(6);
        $inexpensive=Product::where('product_category_id',$id)->orderBy('price')->paginate(6);
        return view('website.frontend.list.show',['products'=>$products,'expensive'=>$expensive,'inexpensive'=>$inexpensive]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

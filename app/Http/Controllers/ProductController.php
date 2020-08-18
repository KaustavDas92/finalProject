<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        return  view('website.backend.product.index',['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategory=ProductCategory::all();
        return view ('website.backend.product.create',['productCategory'=>$productCategory]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slug=Str::slug($request->name,'-');
        Product::create([
            'product_category_id'=>$request->prodId,
            'name'=>$request->name,
            'price'=>$request->price,
            'gender'=>$request->gender,
            'description'=>$request->description,
            'slug'=>$slug,
        ]);

        return redirect(route('product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $productCategory=ProductCategory::all();
        return view ('website.backend.product.edit',['product'=>$product,'productCategory'=>$productCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $slug=Str::slug($request->name,'-');

        $product->update([
            'product_category_id'=>$request->prodId,
            'name'=>$request->name,
            'price'=>$request->price,
            'description'=>$request->description,
            'slug'=>$slug,
        ]);
        return redirect(route('product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $product->delete();
        return back();
    }
}

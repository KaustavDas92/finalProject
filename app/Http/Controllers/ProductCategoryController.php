<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories=ProductCategory::all();
        return  view('website.backend.product_category.index',['productCategories'=>$productCategories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('website.backend.product_category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        $newProduct=new ProductCategory();
//        $newProduct->brand_name=$request->brand_name;
//        $newProduct->status='active';
//        $newProduct->slug=$request->slug;
//        $newProduct->save();

        $slug=Str::slug($request->brand_name,'-');
        ProductCategory::create([
           'brand_name'=>$request->brand_name,
           'slug'=>$slug
        ]);

        return redirect(route('productcategory.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategory $productCategory)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productCategory=ProductCategory::find($id);
        return view ('website.backend.product_category.update',['productCategory'=>$productCategory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $productCategory=ProductCategory::find($id);
        $slug=Str::slug($request->brand_name,'-');
        $productCategory->update([
            'brand_name'=>$request->brand_name,
            'slug'=>$slug
        ]);

        return redirect(route('productcategory.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductCategory  $productCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productCategory=ProductCategory::find($id);
        $productCategory->delete();
        return back();
    }
}

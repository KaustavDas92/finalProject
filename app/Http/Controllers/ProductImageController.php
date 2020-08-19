<?php

namespace App\Http\Controllers;

use App\ProductCategory;
use App\ProductImage;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $productImages=ProductImage::orderBy('created_at', 'desc')->get();;
        return  view('website.backend.product_image.index',['productImages'=>$productImages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product=Product::all();
        return view ('website.backend.product_image.create',['product'=>$product]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,JPG,JPEG,gif,svg',
        ]);
        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $slug=Str::slug($request->img_title,'-');
        ProductImage::create([
            'product_id'=>$request->prodId,
            'img_title'=>$request->img_title,
            'image'=>$imageName,
            'slug'=>$slug,
        ]);

        return redirect(route('productimage.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $productImage=ProductImage::find($id);
       $products=Product::all();
        return view ('website.backend.product_image.edit',['products'=>$products,'productImage'=>$productImage]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $productImage=ProductImage::find($id);
        if($request->has('image'))
        {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,JPG,JPEG,gif,svg',
            ]);
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('images'), $imageName);
        }
        else{
            $imageName = $productImage->image;
        }

        $slug=Str::slug($request->img_title,'-');
        $productImage->update([
            'product_id'=>$request->prodId,
            'img_title'=>$request->img_title,
            'image'=>$imageName,
            'slug'=>$slug,
        ]);

        return redirect(route('productimage.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductImage  $productImage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productImage=ProductImage::find($id);
        $productImage->delete();
        return back();
    }
}

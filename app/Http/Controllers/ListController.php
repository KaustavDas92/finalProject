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
    public function index(Request $request)
    {
        if($request->gender=='male')
        {
            $products=Product::where('gender','male')->latest()->paginate(9);
            $expensive=Product::where('gender','male')->orderBy('price','DESC')->paginate(9);
            $inexpensive=Product::where('gender','male')->orderBy('price')->paginate(9);

        }
        else if($request->gender=='female')
        {
            $products=Product::where('gender','female')->latest()->paginate(9);
            $expensive=Product::where('gender','female')->orderBy('price','DESC')->paginate(9);
            $inexpensive=Product::where('gender','female')->orderBy('price')->paginate(9);
        }
        else
        {
            $products=Product::latest()->paginate(9);
            $expensive=Product::orderBy('price','DESC')->paginate(9);
            $inexpensive=Product::orderBy('price')->paginate(9);
        }

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
    public function show(Request $request,$id)
    {
        if($request->gender=="male")
        {
            $products=Product::where('product_category_id',$id)->where('gender','male')->latest()->paginate(9);
            $expensive=Product::where('product_category_id',$id)->where('gender','male')->orderBy('price','DESC')->paginate(9);
            $inexpensive=Product::where('product_category_id',$id)->where('gender','male')->orderBy('price')->paginate(9);
        }
        else if($request->gender=="female")
        {
            $products=Product::where('product_category_id',$id)->where('gender','female')->latest()->paginate(9);
            $expensive=Product::where('product_category_id',$id)->where('gender','female')->orderBy('price','DESC')->paginate(9);
            $inexpensive=Product::where('product_category_id',$id)->where('gender','female')->orderBy('price')->paginate(9);
        }
        else
        {
            $products=Product::where('product_category_id',$id)->latest()->paginate(9);
            $expensive=Product::where('product_category_id',$id)->orderBy('price','DESC')->paginate(9);
            $inexpensive=Product::where('product_category_id',$id)->orderBy('price')->paginate(9);
        }


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

<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carts=Cart::where('user_id',auth()->user()->id)->get();
        $subTotal=0.0;
        foreach ($carts as $cart)
        {
            $subTotal+=$cart->total;
        }

        return view('website.frontend.product.cart',['carts'=>$carts,'subTotal'=>$subTotal]);
    }

    public function checkout()
    {
        return view('website.frontend.product.checkout');
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

        $this->validate($request,[
            'product'=>'unique:carts,product_id'
        ]);
        $product=Product::find($request->product);

        $price=$product->price;
        $quantity=$request->quantity;
        $total=$price*$quantity;
        Cart::create([
            'product_id'=>$product->id,
            'user_id'=>auth()->user()->id,
            'price'=>$price,
            'quantity'=>$quantity,
            'total'=>$total
        ])->firstorFail();
        return back()->with('message','Item Added to the Cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        $cart=Cart::find($id);

        $quan=$request->quantity;
        $total=$cart->price*$quan;
        $cart->update([
            'product_id'=>$cart->product_id,
            'price'=>$cart->price,
            'quantity'=>$quan,
            'total'=>$total
        ]);
        return back();


    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart=Cart::find($id);
        $cart->delete();
        return back();
    }
}

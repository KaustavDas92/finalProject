<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CustomerDetail;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer=CustomerDetail::where('user_id',auth()->user()->id)->exists();
        if($customer==null)
            return view('website.frontend.customer_details.customerDetails_new');
        else
        {
            $cus=CustomerDetail::where('user_id',auth()->user()->id)->first();
            return redirect(route('checkout.show',$cus->id));
        }


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

        CustomerDetail::create($request->all());
        return redirect(route('checkout.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer=CustomerDetail::find($id);
        //$cart=auth()->user()->carts->flatten()->pluck('product_id');
        $carts=auth()->user()->carts;

        $subTotal=0.0;
        foreach ($carts as $cart)
        {
            $subTotal+=$cart->total;
        }

        return view('website.frontend.product.checkout',['customer'=>$customer,'carts'=>$carts,'subTotal'=>$subTotal]);
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

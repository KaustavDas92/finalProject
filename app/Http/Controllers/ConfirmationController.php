<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CustomerDetail;
use App\Order;
use App\Payment;
use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class ConfirmationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order=Order::where('user_id',auth()->user()->id)->latest()->first();
        $payment=Payment::find($order->payment_id);
        $quantities=$payment->quantities;
        $customerDetail=CustomerDetail::find($payment->customer_id);
        $productIds=$payment->product_ids;
        $products=array();
        $subtotal=0;
        foreach ($productIds as $ids)
        {
            $prod=Product::find($ids);
            array_push($products,$prod);
        }
        for($i=0;$i<count($products);$i++)
        {
            $subtotal+=$products[$i]->price * $quantities[$i] ;
        }

       return view('website.frontend.thankYou',[
           'order'=>$order,
           'customerDetail'=>$customerDetail,
           'products'=>$products,
           'quantities'=>$quantities,
           'subtotal'=>$subtotal
       ]);
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
        $payment=Payment::create([
            'product_ids'=>$request->products,
            'quantities'=>$request->quantities,
            'total'=>$request->total,
            'payment_type'=>$request->payment_type,
            'customer_id'=>$request->customer_id
        ]);

        Order::create([
            'user_id'=>auth()->user()->id,
            'payment_id'=>$payment->id
        ]);

        Cart::where('user_id',auth()->user()->id)->delete();
        return redirect(route('confirmation.index'));
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

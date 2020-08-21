<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CustomerDetail;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

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
            return view('website.frontend.checkout.customerDetails_new');
        else
        {
            $cus=CustomerDetail::where('user_id',auth()->user()->id)->first();

            return redirect(route('checkout.show',$cus->id));
        }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */

    public function select($id){

        $details=auth()->user()->customerDetails;
        $currentAddress=CustomerDetail::find($id);
        return view('website.frontend.checkout.select',['details'=>$details,'currentAddress'=>$currentAddress]);
    }
    public function create()
    {
        return view('website.frontend.checkout.customerDetails_new');
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
            'fname'=>'required',
            'lname'=>'required',
            'company_name'=>'required',
            'phone_number'=>'required|numeric',
            'country'=>'required',
            'address1'=>'required',
            'address2'=>'required',
            'town'=>'required',
            'district'=>'required',
            'pincode'=>'required',
            'email'=>'required|email',
        ]);
        CustomerDetail::create($request->all());
        return redirect(route('checkout.index'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {

        if($id!=0)
        {
            $customer=CustomerDetail::find($id);
            //$cart=auth()->user()->carts->flatten()->pluck('product_id');
            $carts=auth()->user()->carts;

            $subTotal=0.0;
            foreach ($carts as $cart)
            {
                $subTotal+=$cart->total;
            }
        }
        else
        {
            $id=$request->address;

            $customer=CustomerDetail::find($id);
            //$cart=auth()->user()->carts->flatten()->pluck('product_id');
            $carts=auth()->user()->carts;

            $subTotal=0.0;
            foreach ($carts as $cart)
            {
                $subTotal+=$cart->total;
            }
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

        $customer=CustomerDetail::find($id);
        return view('website.frontend.checkout.Edit',['customer'=>$customer]);
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
        $customerDetail=CustomerDetail::find($id);
        $request->validate([
            'fname'=>'required',
            'lname'=>'required',
            'company_name'=>'required',
            'phone_number'=>'required|numeric',
            'country'=>'required',
            'address1'=>'required',
            'address2'=>'required',
            'town'=>'required',
            'district'=>'required',
            'pincode'=>'required',
            'email'=>'required|email'
        ]);
        $customerDetail->update($request->all());

        return redirect(route('checkout.index'))->with('message','Customer Details Updated Successfully');
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

<?php

namespace App\Http\Controllers;

use App\CustomerDetail;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        return view('website.frontend.customer_details.Edit',['customer'=>$customer]);
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

<?php

namespace App\Http\Controllers;

use App\CustomerDetail;
use Illuminate\Http\Request;

class BillingController extends Controller
{

    public function index()
    {
        $details=auth()->user()->customerDetails;
       return view('website.frontend.customer_details.index',['details'=>$details]);
    }


    public function create()
    {
        return view('website.frontend.customer_details.new');
    }


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
            'email'=>'required|email'
        ]);
        CustomerDetail::create($request->all());
        return redirect(route('billingDetails.index'))->with('message','New Billing Address Created');
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $customer=CustomerDetail::find($id);
        return view('website.frontend.customer_details.Edit',['customer'=>$customer]);
    }


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

        return redirect(route('billingDetails.index'))->with('message','Customer Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerDetail=CustomerDetail::find($id);
        $customerDetail->delete();
        return back();
    }
}

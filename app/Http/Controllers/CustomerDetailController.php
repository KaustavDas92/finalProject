<?php

namespace App\Http\Controllers;

use App\CustomerDetail;
use Cassandra\Custom;
use Illuminate\Http\Request;

class CustomerDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customerDetails=CustomerDetail::all();
        return view('website.backend.customerdetail.index',['customerDetails'=>$customerDetails]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('website.backend.customerdetail.create');
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
        return redirect(route('customerdetail.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CustomerDetail $customerDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function edit($id )
    {
        $customerDetail=CustomerDetail::find($id);
        return view ('website.backend.customerdetail.edit',['customerDetail'=>$customerDetail]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customerDetail=CustomerDetail::find($id);
        $customerDetail->update($request->all());

        return redirect(route('customerdetail.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CustomerDetail  $customerDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customerDetail=CustomerDetail::find($id);
        $customerDetail->delete();
        return back();
    }
}

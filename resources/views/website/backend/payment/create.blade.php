@extends('website.backend.layouts.main')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Create a new Payment </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                            {{--                            <li><a class="dropdown-item" href="#">Settings 1</a>--}}
                            {{--                            </li>--}}
                            {{--                            <li><a class="dropdown-item" href="#">Settings 2</a>--}}
                            {{--                            </li>--}}
                        </ul>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br>
                <form id="demo-form2" data-parsley-validate=""
                      class="form-horizontal form-label-left" novalidate=""
                      method="POST" action="{{route('payment.store')}}">
                    @csrf

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="productCategory_name">Customer Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="custId" required="required">
                                <option value="none" selected disabled hidden>
                                    Select Customer
                                </option>
                            @foreach($customers as $customer)
                                <option  value="{{$customer->id}}" name="custId">{{$customer->fname." ".$customer->lname}}</option>
                                @endforeach
                            </select>
{{--                            <input type="text" id="productCategory_name" name="productCategory_name"required="required" class="form-control ">--}}
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="payment_type">Payment Type <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <select class="form-control" name="payment_type" required="required">
                                <option value="none" selected disabled hidden>
                                    Select payment Type
                                </option>
                                <option value="cash" name="payment_type" >Cash On Delivery</option>
                                <option value="card" name="payment_type">Pay By Card</option>


                            </select>
                            {{--                            <input type="text" id="productCategory_name" name="productCategory_name"required="required" class="form-control ">--}}
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Total</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="total" class="form-control" type="text" name="total">
                        </div>
                    </div>


{{--                    <div class="item form-group">--}}
{{--                        <label for="price" class="col-form-label col-md-3 col-sm-3 label-align">Product Image</label>--}}
{{--                        <div class="col-md-6 col-sm-6 ">--}}
{{--                            <input id="price" class="form-control" type="text" name="price">--}}
{{--                        </div>--}}
{{--                    </div>--}}


                    {{--                    <div class="item form-group">--}}
                    {{--                        <label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>--}}
                    {{--                        <div class="col-md-6 col-sm-6 ">--}}
                    {{--                            <div id="gender" class="btn-group" data-toggle="buttons">--}}
                    {{--                                <label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">--}}
                    {{--                                    <input type="radio" name="gender" value="male" class="join-btn" data-parsley-multiple="gender"> &nbsp; Male &nbsp;--}}
                    {{--                                </label>--}}
                    {{--                                <label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">--}}
                    {{--                                    <input type="radio" name="gender" value="female" class="join-btn" data-parsley-multiple="gender"> Female--}}
                    {{--                                </label>--}}
                    {{--                            </div>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    {{--                    <div class="item form-group">--}}
                    {{--                        <label class="col-form-label col-md-3 col-sm-3 label-align">Date Of Birth <span class="required">*</span>--}}
                    {{--                        </label>--}}
                    {{--                        <div class="col-md-6 col-sm-6 ">--}}
                    {{--                            <input id="birthday" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">--}}
                    {{--                            <script>--}}
                    {{--                                function timeFunctionLong(input) {--}}
                    {{--                                    setTimeout(function() {--}}
                    {{--                                        input.type = 'text';--}}
                    {{--                                    }, 60000);--}}
                    {{--                                }--}}
                    {{--                            </script>--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button class="btn btn-primary" type="button">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

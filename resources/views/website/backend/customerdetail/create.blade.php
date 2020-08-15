@extends('website.backend.layouts.main')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Create Customer Details </h2>
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
                      method="POST" action="{{route('customerdetail.store')}}">
                    @csrf

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="fname">First Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="fname" name="fname" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="lname">Last Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="lname" name="lname" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="company_name">Company Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="company_name" name="company_name" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="phone_number" class="col-form-label col-md-3 col-sm-3 label-align">Phone Number<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="phone_number" class="form-control" type="number" name="phone_number" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="email">Email Address <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="email" id="email" name="email" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="country">Country
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="country" name="country" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group  ">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="address">Address
                        </label>
                        <div class="ml-3 mr-4">
                            <input type="text" id="address1" placeholder="Address 1" name="address1" required="required" class="form-control ">
                        </div>
                        <div class="">
                            <input type="text" id="address2" placeholder="Address 2" name="address2" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="town">Town
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="town" name="town" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="district">District
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="district" name="district" required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="pincode" class="col-form-label col-md-3 col-sm-3 label-align">Pincode<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="pincode" class="form-control" type="number" name="pincode" required="required">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="other_notes">Other Notes
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="other_notes" name="other_notes"  class="form-control ">
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

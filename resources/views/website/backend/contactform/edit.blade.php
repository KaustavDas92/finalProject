@extends('website.backend.layouts.main')
@section('content')
    <div class="col-md-12 col-sm-12 ">
        <div class="x_panel">
            <div class="x_title">
                <h2>Update Product </h2>
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
                      method="POST" action="{{route('contactform.update',$contactForm->id)}}">
                    @csrf
                    @method('PUT')

                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="username">User Name <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="username" value="{{$contactForm->username}}" name="username"required="required" class="form-control ">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label for="email" class="col-form-label col-md-3 col-sm-3 label-align">Email</label>
                        <div class="col-md-6 col-sm-6 ">
                            <input id="email" class="form-control" value="{{$contactForm->email}}"type="email" name="email">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label class="col-form-label col-md-3 col-sm-3 label-align" for="subject">Subject<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 ">
                            <input type="text" id="subject" value="{{$contactForm->subject}}" name="subject"required="required" class="form-control ">
                        </div>
                    </div>
                    <div class="item form-group">
                        <label for="description" class="col-form-label col-md-3 col-sm-3 label-align">Message</label>
                        <div class="col-md-6 col-sm-6 ">
                            <textarea id="message" class="form-control" required="required" name="message" >
                                {{$contactForm->message}}
                            </textarea>
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
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
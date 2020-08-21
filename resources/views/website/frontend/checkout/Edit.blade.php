<!doctype html>
<html lang="zxx">
@include('website.frontend.layouts.head')

<body>

@include('website.frontend.layouts.header')
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Edit Billing Details</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Checkout Area =================-->
    <section class="checkout_area section_padding">
        <div class="container">
            {{--            <div class="returning_customer">--}}

            {{--                <form class="row contact_form" action="#" method="post" novalidate="novalidate">--}}
            {{--                    <div class="col-md-6 form-group p_star">--}}
            {{--                        <input type="text" class="form-control" id="name" name="name" value=" " />--}}
            {{--                        <span class="placeholder" data-placeholder="Username or Email"></span>--}}
            {{--                    </div>--}}
            {{--                    <div class="col-md-6 form-group p_star">--}}
            {{--                        <input type="password" class="form-control" id="password" name="password" value="" />--}}
            {{--                        <span class="placeholder" data-placeholder="Password"></span>--}}
            {{--                    </div>--}}
            {{--                    <div class="col-md-12 form-group">--}}
            {{--                        <button type="submit" value="submit" class="btn_3">--}}
            {{--                            log in--}}
            {{--                        </button>--}}

            {{--                    </div>--}}
            {{--                </form>--}}
            {{--            </div>--}}
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-8">
                        <h3>Billing Details</h3>
                        <form method="POST"
                              class="row contact_form"
                              action="{{route('checkout.update',$customer->id)}}"

                              novalidate="novalidate">
                            @csrf
                            @method('PUT')
                            <input  type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" id="fname"  name="fname" value="{{$customer->fname}}" required="required" class="form-control "/>
                                {{--                                <span class="placeholder" data-placeholder="First name"></span>--}}
                                @error('fname')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" id="lname"  name="lname" value="{{$customer->lname}}" required="required" class="form-control "/>

                                @error('lname')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text"  id="company_name" name="company_name" value="{{$customer->company_name}}" required="required" class="form-control"/>
                                @error('company_name')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input id="phone_number" class="form-control"  type="number" name="phone_number" value="{{$customer->phone_number}}" required="required"/>
                                @error('phone_number')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="email" id="email" name="email"  value="{{$customer->email}}" required="required" class="form-control "/>
                                @error('email')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="country" name="country" value="{{$customer->country}}" required="required" class="form-control "/>
                                @error('country')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="address1" name="address1" value="{{$customer->address1}}" required="required" class="form-control ">
                                @error('address1')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="address2"  name="address2" value="{{$customer->address2}}" required="required" class="form-control ">

                                @error('address2')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="town" name="town" required="required" value="{{$customer->town}}" class="form-control ">
                                @error('town')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="district" name="district" required="required" value="{{$customer->district}}" class="form-control ">
                                @error('district')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="col-md-12 form-group">
                                <input id="pincode" class="form-control" type="number" value="{{$customer->pincode}}" name="pincode" required="required">
                                @error('pincode')
                                <small class="form-text invalid-feedback">{{$message}}</small>
                                @enderror
                            </div>
                            {{--                            <div class="col-md-12 form-group">--}}
                            {{--                                <div class="creat_account">--}}
                            {{--                                    <input type="checkbox" id="f-option2" name="selector" />--}}
                            {{--                                    <label for="f-option2">Create an account?</label>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            <div class="col-md-12 form-group">
                                {{--                                <div class="creat_account">--}}
                                {{--                                    <h3>Shipping Details</h3>--}}
                                {{--                                    <input type="checkbox" id="f-option3" name="selector" />--}}
                                {{--                                    <label for="f-option3">Ship to a different address?</label>--}}
                                {{--                                </div>--}}
                                <textarea class="form-control" id="other_notes" name="other_notes" rows="1"
                                          value="{{$customer->other_notes}}"></textarea>
                            </div>
                            <button class="genric-btn success circle arrow">
                                Update Details
                                <span class="lnr lnr-arrow-right"></span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Checkout Area =================-->
</main>
@include('website.frontend.layouts.footer')
<!--? Search model Begin -->
<div class="search-model-box">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-btn">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Searching key.....">
        </form>
    </div>
</div>
<!-- Search model end -->

<!-- JS here -->

@include('website.frontend.layouts.foot')

</body>
</html>

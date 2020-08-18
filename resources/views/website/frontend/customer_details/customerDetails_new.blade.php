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
                            <h2>Billing Details</h2>
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
                              action="{{route('checkout.store')}}"

                              novalidate="novalidate">
                            @csrf
                           <input  type="hidden" name="user_id" id="user_id" value="{{auth()->user()->id}}">
                            <div class="col-md-6 form-group p_star">
                                <input type="text" id="fname" placeholder="First name " name="fname" required="required" class="form-control "/>
{{--                                <span class="placeholder" data-placeholder="First name"></span>--}}
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" id="lname" placeholder="Last name" name="lname" required="required" class="form-control "/>

{{--                                <span class="placeholder" data-placeholder="Last name"></span>--}}
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" placeholder="Company Name" id="company_name" name="company_name" required="required" class="form-control"/>
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input id="phone_number" class="form-control" placeholder="Phone number" type="number" name="phone_number" required="required"/>
{{--                                <span class="placeholder" data-placeholder="Phone number"></span>--}}
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="email" id="email" name="email" placeholder="Email Address" required="required" class="form-control "/>
{{--                                <span class="placeholder" data-placeholder="Email Address"></span>--}}
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="country" name="country" placeholder="Country" required="required" class="form-control "/>
{{--                                <span class="placeholder" data-placeholder="Country"></span>--}}
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="address1" name="address1" placeholder="Address line 01" required="required" class="form-control ">
{{--                                <span class="placeholder" data-placeholder="Address line 01"></span>--}}
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="address2"  name="address2" placeholder="Address line 02" required="required" class="form-control ">

{{--                                <span class="placeholder" data-placeholder="Address line 02"></span>--}}
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="town" name="town" required="required" placeholder="Town/City" class="form-control ">
{{--                                <span class="placeholder" data-placeholder="Town/City"></span>--}}
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="district" name="district" required="required" placeholder="District" class="form-control ">
{{--                                <span class="placeholder" data-placeholder="District"></span>--}}
                            </div>
                            <div class="col-md-12 form-group">
                                <input id="pincode" class="form-control" type="number" placeholder="Pincode" name="pincode" required="required">
{{--                                <span class="placeholder" data-placeholder="Pin Code"></span>--}}
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
                                          placeholder="Order Notes"></textarea>
                            </div>
                            <button class="genric-btn success circle arrow">
                                Submit
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

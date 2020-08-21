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
                            <h2>Checkout</h2>
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
                        <form class="row contact_form" action="{{route('checkout.edit',$customer->id)}}" method="GET" novalidate="novalidate">
                            @csrf
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control font-weight-bold" value="{{$customer->fname}}" readonly id="fname" name="fname"  />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control font-weight-bold" value="{{$customer->lname}}" readonly id="last" name="name" />
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control font-weight-bold" value="{{$customer->company_name}}" readonly id="company" name="company" placeholder="Company name" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control font-weight-bold" value="{{$customer->phone_number}}" readonly id="number" name="number" />
                            </div>
                            <div class="col-md-6 form-group p_star">
                                <input type="text" class="form-control font-weight-bold" value="{{$customer->email}}" readonly id="email" name="compemailany" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="country" name="country" placeholder="Country" required="required" class="form-control font-weight-bold" value="{{$customer->country}}" readonly/>

                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control font-weight-bold" value="{{$customer->address1}}" readonly id="add1" name="add1" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control font-weight-bold" value="{{$customer->address2}}" readonly id="add2" name="add2" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" class="form-control font-weight-bold" value="{{$customer->town}}" readonly id="city" name="city" />
                            </div>
                            <div class="col-md-12 form-group p_star">
                                <input type="text" id="district" name="district" required="required" placeholder="District" class="form-control font-weight-bold" value="{{$customer->district}}" readonly/>

                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control font-weight-bold" value="{{$customer->pincode}}" readonly id="zip" name="zip" placeholder="Postcode/ZIP" />
                            </div>

                            <div class="col-md-12 form-group">

                                <textarea class="form-control font-weight-bold" value="{{$customer->other_notes}}" readonly name="message" id="message" rows="1"
                                          ></textarea>
                            </div>
                            <div class="flex justify-content-between mt-30">
                                <button type="submit" class="btn btn-dark">Edit Details</button>
                                <a href="{{route('checkout.select',$customer->id)}}"><span class="btn btn-sm">Select Another Address</span></a>
                            </div>

                        </form>
                        <a href="{{route('checkout.create')}}"><span class="btn btn-sm mt-30">Add Address</span></a>



                    </div>
                    <div class="col-lg-4">
                        <div class="order_box">
                            <h2>Your Order</h2>
                                <ul class="list">
                                    <li>
                                        <a href="#">Product
                                            <span>Total</span>
                                        </a>
                                    </li>
                                    @foreach($carts as $cart)
                                        <li>
                                            <a>{{$cart->product->name}}
                                                <span class="middle">x {{$cart->quantity}}</span>
                                                <span class="last">Rs {{$cart->total}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                                <ul class="list list_2">
                                    <li>
                                        <a href="#">Subtotal
                                            <span>Rs {{$subTotal}}</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">Shipping
                                            <span>Flat rate: $50.00</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a name="grandTotal" id="grandToTal">Total
                                            <span>Rs {{$subTotal+50}}</span>
                                        </a>
                                    </li>
                                </ul>
                            <form method="POST" action="{{route('confirmation.store')}}" >
                                @csrf
                                @foreach($carts as $cart)
                                    <input type="hidden" name="products[]" value="{{$cart->product->id}}">
                                    <input type="hidden" name="quantities[]" value="{{$cart->quantity}}">
                                @endforeach
                                <input type="hidden" name="customer_id" value="{{$customer->id}}">
                                <input type="hidden" name="total" value="{{$subTotal+50}}">
                                <div class="payment_item">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option5" name="payment_type" value="cash" />
                                        <label for="f-option5">Pay By Cash</label>
                                        <div class="check"></div>
                                    </div>

                                </div>
                                <div class="payment_item active">
                                    <div class="radion_btn">
                                        <input type="radio" id="f-option6" name="payment_type" value="card"/>
                                        <label for="f-option6">Pay By Card </label>
                                        <div class="check"></div>
                                    </div>
                                    @error('payment_type')
                                    <p class="error text-white" style="background: indianred" >{{$message}}</p>
                                    @enderror
                                </div>

                                <div class="creat_account">
                                    <input type="checkbox" id="selector" name="selector" required/>
                                    <label for="selector">I’ve read and accept the </label>
                                    <a href="#">terms & conditions*</a>
                                    @error('selector')
                                    {{$message}}
                                    @enderror
                                </div>
                                <button class="btn_3" >Proceed to Pay</button>
                            </form>

                        </div>
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

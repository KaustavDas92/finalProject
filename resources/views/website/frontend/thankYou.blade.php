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
                            <h2>Confirmation</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================ confirmation part start =================-->
    <section class="confirmation_part section_padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="confirmation_tittle">
                        <span>Thank you. Your order has been received.</span>
                    </div>
                    <div class="checkout_btn_inner float-right mb-10">
                        <a class="btn_1" href="/home">Continue Shopping</a>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>order info</h4>
                        <ul>
                            <li>
                                <p>order number</p><span>: {{$order->id}}</span>
                            </li>
                            <li>
                                <p>data</p><span>:
                                    {{
                                        $order->created_at->getTranslatedMonthName()
                                        ." "
                                        .$order->created_at->day
                                        .", "
                                        .$order->created_at->year}}
                                </span>
                            </li>
                            <li>
                                <p>total</p><span>: Rs {{$order->payment->total}}</span>
                            </li>
                            <li>
                                <p>Payment Method</p><span>: {{$order->payment->payment_type}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-lx-4">
                    <div class="single_confirmation_details">
                        <h4>Billing Address</h4>
                        <ul>
                            <li>
                                <p>name</p><span>: {{$customerDetail->fname." ".$customerDetail->lname}}</span>
                            </li>
                            <li>
                                <p>phone number</p><span>: {{$customerDetail->phone_number}}</span>
                            </li>
                            <li>
                                <p>Address line 1</p><span>: {{$customerDetail->address1}}</span>
                            </li>
                            <li>
                                <p>Address line 2</p><span>: {{$customerDetail->address2}}</span>
                            </li>
                            <li>
                                <p>city</p><span>: {{$customerDetail->town}}</span>
                            </li>
                            <li>
                                <p>country</p><span>: {{$customerDetail->country}}</span>
                            </li>
                            <li>
                                <p>postcode</p><span>: {{$customerDetail->pincode}}</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="order_details_iner">
                        <h3>Order Details</h3>
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col" >Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @for($i=0;$i<count($products);$i++)
                                <tr>
                                    <th colspan="2"><span>{{$products[$i]->name}}</span></th>
                                    <th><span> Rs. {{$products[$i]->price}}</span></th>
                                    <th><span>x{{$quantities[$i]}}</span></th>
                                    <th> Rs. {{$products[$i]->price * $quantities[$i]}}</th>
                                </tr>
                            @endfor

                            <tr>
                                <th colspan="4">Subtotal</th>
                                <th>Rs. {{$subtotal }}</th>
                            </tr>
                            <tr>
                                <th scope="col" colspan="3">Quantity</th>
                                <th><span>x{{array_sum($quantities)}}</span></th>
                            </tr>
                            </tbody>
                            <tfoot>

                            <tr>
                                <th colspan="3">shipping</th>
                                <th><span>flat rate: Rs.50.00</span></th>
                                <th scope="col">Total: Rs. {{$subtotal+50}}</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================ confirmation part end =================-->
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

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
                            <h2>Cart List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================Cart Area =================-->

        <section class="cart_area section_padding">
            <div class="container">
                <div class="cart_inner">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($carts as $cart)
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex">
                                            <img src="{{asset('images/'.$cart->product->images[0]->image)}}" alt="" />
                                        </div>
                                        <div class="media-body">
                                            <p >{{$cart->product->name}}</p>
                                            <p>{{$cart->user_id}}</p>
                                            <form method="POST"
                                                  action="{{route('cart.destroy',$cart->id)}}">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn-sm mt-10" style="background-color: red">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>

                                    </div>
                                </td>
                                <td>
                                    <h5>{{$cart->price}}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                            <div class="product_count">
                                                <form  name="cartUpdate" method="POST"
                                                       action="{{route('cart.update',[$cart->id])}}">
                                                    @csrf
                                                    @method('PUT')

                                                <button type="button" onclick="decrement(this.id);" class="btn-sm text-black-50" id="{{$cart->id.'-'}}">-</button>
                                                <input name="quantity" type="text" id="{{$cart->id}}" value="{{$cart->quantity}}" min="1" max="10">
                                                    <button type="button" onclick="increment(this.id);" class="btn-sm text-black-50" id="{{$cart->id.'+'}}">+</button>
                                                    <button class="ml-4" style="background:green; width: 80px; font-size: 10px " > Update This Product</button>
                                                <script>
                                                        function increment(cart_id){
                                                            cart_id=cart_id.slice(0,cart_id.length - 1);
                                                            var count =parseInt(document.getElementById(cart_id).value) + 1;
                                                            document.getElementById(cart_id).value=count;

                                                        }

                                                        function decrement(cart_id)
                                                        {
                                                            cart_id=cart_id.slice(0,cart_id.length-1)
                                                            var count=parseInt(document.getElementById(cart_id).value) -1;
                                                            document.getElementById(cart_id).value=count;

                                                        }


                                                </script>
                                                </form>
                                            </div>
{{--                                            <span onclick="document.getElementById('updateCart').submit();" class="input-number-decrement"> <i class="ti-minus"></i></span>--}}
{{--                                            <input class="input-number" id="quantity" name="quantity" type="number" value="{{$cart->quantity}}" min="0" max="10">--}}
{{--                                            <span onclick="document.getElementById('updateCart').submit();" class="input-number-increment"> <i class="ti-plus"></i></span>--}}

                                    </div>
                                </td>
                                <td>
                                    <h5>{{$cart->total}}</h5>
                                </td>
                            </tr>
                            @empty
                                <p> Your Cart is Empty!</p>
                            @endforelse
                            <tr class="bottom_button">
                                <td>
                                </td>
                                <td></td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>{{$subTotal}}</h5>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td>

                                </td>
                                <td>

                                </td>
                            </tr>
                            <tr class="shipping_area">
                                <td></td>
                                <td></td>
                                <td>
                                    <h5>Shipping</h5>
                                </td>
                                <td>
                                    <div class="shipping_box">
                                        <ul class="list">
                                            <li>
                                                Flat Rate: $5.00
                                                <input type="radio" aria-label="Radio button for following text input">
                                            </li>
                                            <li>
                                                Free Shipping
                                                <input type="radio" aria-label="Radio button for following text input">
                                            </li>
                                            <li>
                                                Flat Rate: $10.00
                                                <input type="radio" aria-label="Radio button for following text input">
                                            </li>
                                            <li class="active">
                                                Local Delivery: $2.00
                                                <input type="radio" aria-label="Radio button for following text input">
                                            </li>
                                        </ul>
                                        <h6>
                                            Calculate Shipping
                                            <i class="fa fa-caret-down" aria-hidden="true"></i>
                                        </h6>
                                        <select class="shipping_select">
                                            <option value="1">Bangladesh</option>
                                            <option value="2">India</option>
                                            <option value="4">Pakistan</option>
                                        </select>
                                        <select class="shipping_select section_bg">
                                            <option value="1">Select a State</option>
                                            <option value="2">Select a State</option>
                                            <option value="4">Select a State</option>
                                        </select>
                                        <input class="post_code" type="text" placeholder="Postcode/Zipcode" />

                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="checkout_btn_inner float-right">
                            <a class="btn_1" href="/home">Continue Shopping</a>
                            <a class="btn_1 checkout_btn_1" href="{{route('checkout.index')}}">Proceed to checkout</a>
                        </div>
                    </div>
                </div>
        </section>
    <!--================End Cart Area =================-->
</main>>
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

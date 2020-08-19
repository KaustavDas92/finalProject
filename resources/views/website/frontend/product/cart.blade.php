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

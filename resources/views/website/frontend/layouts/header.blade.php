<header>
    <div class="header-area">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="index.html"><img src="{{asset('frontend/assets/img/logo/logo.png')}}" alt=""></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="{{route('home.index')}}">Home</a></li>
                                <li><a href="{{route('list.index')}}">shop</a>
                                    <ul class="submenu">
                                        @foreach($product_category as $brands)
                                            <li><a href="{{route('list.show',$brands->id)}}"> {{$brands->brand_name}}</a></li>
                                        @endforeach

                                    </ul>
                                </li>
                                <li><a href="about.html">about</a></li>
                                <li><a href="#">Men's</a>
                                    <ul class="submenu">
                                        @foreach($product_category as $brands)
                                            @if($brands->mens())
                                                <li><a href="{{route('list.show',$brands->id)}}"> {{$brands->brand_name}}</a></li>
                                            @endif
                                        @endforeach

                                    </ul>
                                </li>
                                <li><a href="#">Women's</a>
                                    <ul class="submenu">
                                        @foreach($product_category as $brands)
                                            @if($brands->womens())
                                                <li><a href="{{route('list.show',$brands->id)}}"> {{$brands->brand_name}}</a></li>
                                            @endif
                                        @endforeach

                                    </ul>
                                </li>
{{--                                <li class="hot"><a href="#">Latest</a>--}}
{{--                                    <ul class="submenu">--}}
{{--                                        <li><a href="shop.html"> Product list</a></li>--}}
{{--                                        <li><a href="product_details.html"> Product Details</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
                                <li><a href="{{route('cart.index')}}">Cart</a>

                                </li>
                                <li><a href="#">Pages</a>
                                    <ul class="submenu">
                                        <li><a href="login.html">Login</a></li>
                                        <li><a href="{{route('orders.show',auth()->user()->id)}}">Your Orders</a></li>
                                        <li><a href="checkout.html">Product Checkout</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{route('contact.index')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <li>
                                <div class="nav-search search-switch">
                                    <span class="flaticon-search"></span>
                                </div>
                            </li>
                            <li> <a href="login.html"><span class="flaticon-user"></span></a></li>
                            <li><a href="cart.html"><span class="flaticon-shopping-cart"></span></a> </li>
                        </ul>
                    </div>
                </div>
                <!-- Mobile Menu -->
                <div class="col-12">
                    <div class="mobile_menu d-block d-lg-none"></div>
                </div>
            </div>
        </div>
    </div>

    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif

</header>

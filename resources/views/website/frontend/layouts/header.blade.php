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
                                <li><a href="/list?gender=male">Men's</a>
                                    <ul class="submenu">
                                        @foreach($product_category as $brands)
                                            @if($brands->mens())
                                                <li><a href="/list/{{$brands->id}}?gender=male">{{$brands->brand_name}}</a></li>
                                            @endif
                                        @endforeach

                                    </ul>
                                </li>
                                <li><a href="/list?gender=female">Women's</a>
                                    <ul class="submenu">
                                        @foreach($product_category as $brands)
                                            @if($brands->womens())
                                                <li><a href="/list/{{$brands->id}}?gender=female">{{$brands->brand_name}}</a></li>
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
                                        <li><a href="{{route('billingDetails.index')}}">Billing Address Details</a></li>
                                        <li><a href="{{route('orders.show',auth()->user()->id)}}">Your Orders</a></li>
                                        <li><a href="{{route('checkout.index')}}">Product Checkout</a></li>
                                    </ul>
                                </li>
                                <li><a href="/about">about</a></li>
                                <li><a href="{{route('contact.index')}}">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <!-- Header Right -->
                    <div class="header-right">
                        <ul>
                            <form name="logoutForm" id="logoutForm" method="POST" action="/logout">
                                @csrf
                                <li> <span class="flaticon-arrow" onclick="document.forms['logoutForm'].submit();"> Logout</span>
                                    {{--                                <ul class="submenu">--}}
                                    {{--                                    <li><a href="shop.html"> Product list</a></li>--}}
                                    {{--                                    <li><a href="product_details.html"> Product Details</a></li>--}}
                                    {{--                                </ul>--}}
                                    {{--                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">--}}
                                    {{--                                    <a class="dropdown-item" href="javascript:;"> Profile</a>--}}
                                    {{--                                    <a class="dropdown-item" href="javascript:;">--}}
                                    {{--                                        <span class="badge bg-red pull-right">50%</span>--}}
                                    {{--                                        <span>Settings</span>--}}
                                    {{--                                    </a>--}}
                                    {{--                                    <a class="dropdown-item" href="javascript:;">Help</a>--}}
                                    {{--                                    <a class="dropdown-item" href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>--}}
                                    {{--                                </div>--}}

                                </li>
                            </form>
                            @if(auth()->user()->admin)
                            <li><a href="/dashboard"><span class="flaticon-user"> DashBoard</span></a> </li>
                            @endif
                            <li><a href="{{route('cart.index')}}"><span class="flaticon-shopping-cart"></span></a>
                            </li>
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

<!doctype html>
<html class="no-js" lang="zxx">
@include('website.frontend.layouts.head')

<body>
<!--? Preloader Start -->
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="preloader-circle"></div>
            <div class="preloader-img pere-text">
                <img src="{{asset('frontend/assets/img/logo/logo.png')}}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- Preloader Start -->
@include('website.frontend.layouts.header')
<main>
    <!-- Hero Area Start-->
    <div class="slider-area ">
        <div class="single-slider slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="hero-cap text-center">
                            <h2>Watch Shop List</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Area End-->
    <!-- Latest Products Start -->
    <section class="popular-items latest-padding">
        <div class="container">
            <div class="row product-btn justify-content-between mb-40">
                <div class="properties__button">
                    <!--Nav Button  -->
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Newest Arrivals</a>
                            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false"> Price high to low</a>
                            <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false"> Price Low to High </a>
                        </div>
                    </nav>
                    <!--End Nav Button  -->
                </div>
                <!-- Grid and List view -->
                <div class="grid-list-view">
                </div>
                <!-- Select items -->

            </div>
            <!-- Nav Card -->
            <div class="tab-content" id="nav-tabContent">
                <!-- card one -->
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <form name="ProductsForm" id="ProductsForm" method="POST" action="">
                        @csrf
                        <div class="row">
                        @foreach($products as $product)
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-popular-items mb-50 text-center">
                                <div class="popular-img">
                                    <img src="{{asset('images/'.$product->images[0]->image)}}"
                                         height="330"
                                         width="347.36"
                                         alt="{{$product->images[0]->img_title}}">
                                    <div class="img-cap">
                                        <input type="hidden" name="quantity"  value="1">
                                        <span onclick="send(this.id);" id="{{$product->id}}">Add to cart</span>
                                        <script>
                                            function send(thisID)
                                            {
                                                var x = "/cart?product="+thisID;
                                                document.getElementById('ProductsForm').setAttribute('action', x);
                                                document.forms['ProductsForm'].submit();
                                            }
                                        </script>
                                    </div>
                                    <div class="favorit-items">
                                        <span class="flaticon-heart"></span>
                                    </div>
                                </div>
                                <div class="popular-caption">
                                    <h3><a href="{{route('home.show',$product->id)}}">{{$product->name}}</a></h3>
                                    <span>Rs {{$product->price}}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        {{$products->links()}}
                    </div>
                    </form>

                </div>
                <!-- Card two -->
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form name="ExpensiveForm" id="ExpensiveForm" method="POST" action="">
                        @csrf
                        <div class="row">
                            @foreach($expensive as $costly)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="{{asset('images/'.$costly->images[0]->image)}}"
                                                 height="330"
                                                 width="347.36"
                                                 alt="{{$costly->images[0]->img_title}}">
                                            <div class="img-cap">
                                                <input type="hidden" name="quantity"  value="1">
                                                <span onclick="send(this.id);" id="{{$costly->id}}">Add to cart</span>
                                                <script>
                                                    function send(thisID)
                                                    {
                                                        var x = "/cart?product="+thisID;
                                                        document.getElementById('ExpensiveForm').setAttribute('action', x);
                                                        document.forms['ExpensiveForm'].submit();
                                                    }
                                                </script>
                                            </div>
                                            <div class="favorit-items">
                                                <span class="flaticon-heart"></span>
                                            </div>
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="{{route('home.show',$costly->id)}}">{{$costly->name}}</a></h3>
                                            <span>Rs {{$costly->price}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{$expensive->links()}}
                        </div>
                    </form>
                </div>
                <!-- Card three -->
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
                    <form name="CheapForm" id="CheapForm" method="POST" action="">
                        @csrf
                        <div class="row">
                            @foreach($inexpensive as $cheap)
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                                    <div class="single-popular-items mb-50 text-center">
                                        <div class="popular-img">
                                            <img src="{{asset('images/'.$cheap->images[0]->image)}}"
                                                 height="330"
                                                 width="347.36"
                                                 alt="{{$cheap->images[0]->img_title}}">
                                            <div class="img-cap">
                                                <input type="hidden" name="quantity"  value="1">
                                                <span onclick="send(this.id);" id="{{$cheap->id}}">Add to cart</span>
                                                <script>
                                                    function send(thisID)
                                                    {
                                                        var x = "/cart?product="+thisID;
                                                        document.getElementById('CheapForm').setAttribute('action', x);
                                                        document.forms['CheapForm'].submit();
                                                    }
                                                </script>
                                            </div>
                                            <div class="favorit-items">
                                                <span class="flaticon-heart"></span>
                                            </div>
                                        </div>
                                        <div class="popular-caption">
                                            <h3><a href="{{route('home.show',$cheap->id)}}">{{$cheap->name}}</a></h3>
                                            <span>Rs {{$cheap->price}}</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{$inexpensive->links()}}
                        </div>
                    </form>
                </div>
            </div>
            <!-- End Nav Card -->
        </div>
    </section>
    <!-- Latest Products End -->
    <!--? Shop Method Start-->
    <div class="shop-method-area">
        <div class="container">
            <div class="method-wrapper">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-package"></i>
                            <h6>Free Shipping Method</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-unlock"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="single-method mb-40">
                            <i class="ti-reload"></i>
                            <h6>Secure Payment System</h6>
                            <p>aorem ixpsacdolor sit ameasecur adipisicing elitsf edasd.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Method End-->
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

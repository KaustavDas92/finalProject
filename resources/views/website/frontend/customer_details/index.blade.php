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
    <!--================ confirmation part start =================-->
    <section class="confirmation_part section_padding">
        <a class="mb-50 ml-150 btn view-btn1" href="{{route('billingDetails.create')}}">
           Add New Address
        </a>

        <div class="container">
            <div class="col-md-12 col-sm-12 ">
                <form>

                </form>
                @forelse($details as $customer)
                        <div class="mb-5 x_panel border border-dark rounded p-3">
                            <div>
                                <div class="x_title">
                                    <h2>{{$customer->fname." ".$customer->lname.", ".$customer->address1.",".$customer->address2}}</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-down"></i></a>
                                        </li>
                                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content" style="display: none;">
                                    <div class="row">
                                        <div class="col-lg-6 col-lx-4">

                                            <div class="flex justify-content-between">
                                                <p class="font-weight-bold">First Name: </p>
                                                <span>{{$customer->fname}}</span>
                                            </div>
                                            <div class="col-md-6 form-group p_star">
                                                <p class="font-weight-bold">Last Name</p><span>{{$customer->lname}}</span>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <p class="font-weight-bold">Company Name</p><span>{{$customer->company_name}}</span>
                                            </div>
                                            <div class="col-md-6 form-group p_star">
                                                <p class="font-weight-bold">Phone Number</p><span>{{$customer->phone_number}}</span>

                                            </div>
                                            <div class="col-md-6 form-group p_star">
                                                <p class="font-weight-bold">Email</p><span>{{$customer->email}}</span>
                                            </div>
                                            <div class="col-md-12 form-group p_star">
                                                <p class="font-weight-bold">Address Line 1</p><span>{{$customer->address1}}</span>
                                            </div>
                                            <div class="col-md-12 form-group p_star">
                                                <p class="font-weight-bold">Address Line 2</p><span>{{$customer->address2}}</span>
                                            </div>
                                            <div class="col-md-12 form-group p_star">
                                                <p class="font-weight-bold">country</p><span>{{$customer->country}}</span>
                                            </div>
                                            <div class="col-md-12 form-group p_star">
                                                <p class="font-weight-bold">City</p><span>{{$customer->town}}</span>
                                            </div>
                                            <div class="col-md-12 form-group p_star">
                                                <p class="font-weight-bold">District</p><span>{{$customer->district}}</span>
                                            </div>
                                            <div class="col-md-12 form-group">
                                                <p class="font-weight-bold">Email</p><span>{{$customer->pincode}}</span>
                                            </div>
                                            <form method="POST" action="{{route('billingDetails.destroy',$customer->id)}}">
                                                @csrf
                                                @method('DELETE')
                                            <div class="flex justify-content-between">
                                                <a href="{{route('billingDetails.edit',$customer->id)}}"><span class="btn btn-dark">Edit Details</span></a>
                                                <button type="submit" class="btn btn-dark">Delete Address</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                @empty
                    You have No Billing Address Yet
                @endforelse
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

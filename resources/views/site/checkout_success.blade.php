@extends('site.layouts.master')

@section('content')

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active">Checkout Success</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb checkout-page" ng-controller="">
        <div class="container">
            <!-- checkout-details-wrapper start -->
            <div class="checkout-details-wrapper">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                    </div>
                    <div class="col-lg-12 col-md-12">
                        <!-- your-order-wrapper start -->
                        <div class="your-order-wrapper">
                            <h3 class="shoping-checkboxt-title" style="text-align: center">Đặt hàng thành công</h3>
                            <!-- your-order-wrap start-->
                            <div class="your-order-wrap">
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <!-- ACCORDION START -->
                                        <h5> Cảm ơn quý khách đã đặt mua sản phẩm của chúng tôi ! <br>
                                            <br>
                                            Đơn hàng của quý khách sẽ được nhân viên kiểm tra và giao hàng trong thời gian sớm nhất.
                                        </h5>
                                        <!-- ACCORDION END -->
                                    </div>
                                    <div class="order-button-payment" style="text-align: center;">
                                       <a href="{{route('front.home_page')}}"><input type="button" value="Tiếp tục mua sắm" /></a>
                                    </div>
                                </div>
                                <!-- your-order-wrapper start -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- checkout-details-wrapper end -->

            <div class="loading"><i class="icon">Loading</i></div>

        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection
@push('scripts')

@endpush

@extends('site.layouts.master')

@section('content')
    <style>
        .invalid-feedback {
            margin-top: .25rem;
            font-size: 12.5px;
            color: #dc3545;
        }
    </style>

    <!-- breadcrumb-area start -->
    @include('site.partials.bread_crumb', ['type' => '','title' => 'Thanh toán' ])
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb checkout-page" ng-controller="checkOut" ng-cloak>
        <div class="container">
            <!-- checkout-details-wrapper start -->
            <div class="checkout-details-wrapper">
                <h3 ng-if="! checkCart">Bạn chưa có đơn hàng nào</h3>

                <div class="row" ng-if="checkCart">
                    <div class="col-lg-6 col-md-6">
                        <!-- billing-details-wrap start -->
                        <div class="billing-details-wrap">
                            <form action="#">
                                <h3 class="shoping-checkboxt-title">Thông tin thanh toán</h3>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Họ tên <span class="required">*</span></label>
                                            <input type="text" ng-model="form.customer_name">
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong><% errors.customer_name[0] %></strong>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-lg-6">
                                        <p class="single-form-row">
                                            <label>Số điện thoại<span class="required">*</span></label>
                                            <input type="text" ng-model="form.customer_phone">
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong><% errors.customer_phone[0] %></strong>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Email<span class="required">*</span></label>
                                            <input type="text" ng-model="form.customer_email">
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong><% errors.customer_email[0] %></strong>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row">
                                            <label>Địa chỉ giao hàng<span class="required">*</span></label>
                                            <input type="text" ng-model="form.customer_address">
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong><% errors.customer_address[0] %></strong>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <div class="single-form-row">
                                            <label>Phương thức thanh toán <span class="required">*</span></label>
                                            <div class="">
                                                <select class="form-control" ng-model="form.payment_method">
                                                    <option value="1">Thanh toán COD (thanh toán khi nhận hàng)</option>
                                                    <option value="0">Chuyển khoản qua ngân hàng</option>
                                                </select>
                                            </div>
                                            <span class="invalid-feedback d-block" role="alert">
                                                    <strong><% errors.payment_method[0] %></strong>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <p class="single-form-row m-0">
                                            <label>Yêu cầu khác</label>
                                            <textarea placeholder="" class="checkout-mess" rows="5" cols="5"
                                                      ng-model="form.customer_required"></textarea>
                                        </p>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- billing-details-wrap end -->
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <!-- your-order-wrapper start -->
                        <div class="your-order-wrapper">
                            <h3 class="shoping-checkboxt-title">Đơn hàng</h3>
                            <!-- your-order-wrap start-->
                            <div class="your-order-wrap">
                                <!-- your-order-table start -->
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product-name">Sản phẩm</th>
                                            <th class="product-total">Thành tiền</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cartCollection as $item)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{$item->name}} <strong class="product-quantity">
                                                        × {{$item->quantity}}</strong>
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">{{number_format($item->price * $item->quantity)}} đ</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr class="order-total">
                                            <th>Tổng</th>
                                            <td><strong><span class="amount">{{number_format($total)}} đ</span></strong>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- your-order-table end -->

                                <!-- your-order-wrap end -->
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <!-- ACCORDION START -->
{{--                                        <h5>Direct Bank Transfer</h5>--}}
{{--                                        <div class="payment-content">--}}
{{--                                            <p>Make your payment directly into our bank account. Please use your Order--}}
{{--                                                ID as the payment reference. Your order won’t be shipped until the funds--}}
{{--                                                have cleared in our account.</p>--}}
{{--                                        </div>--}}
{{--                                        <!-- ACCORDION END -->--}}
{{--                                        <!-- ACCORDION START -->--}}
{{--                                        <h5>Cheque Payment</h5>--}}
{{--                                        <div class="payment-content">--}}
{{--                                            <p>Please send your cheque to Store Name, Store Street, Store Town, Store--}}
{{--                                                State / County, Store Postcode.</p>--}}
{{--                                        </div>--}}
{{--                                        <!-- ACCORDION END -->--}}
{{--                                        <!-- ACCORDION START -->--}}
{{--                                        <h5>PayPal</h5>--}}
{{--                                        <div class="payment-content">--}}
{{--                                            <p>Pay via PayPal; you can pay with your credit card if you don’t have a--}}
{{--                                                PayPal account.</p>--}}
{{--                                        </div>--}}
                                        <!-- ACCORDION END -->
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="button" value="Đặt hàng" ng-click="submit()"/>
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
    <script>
        app.controller('checkOut', function ($rootScope, $scope, $http) {
            $scope.items = @json($cartCollection);
            $scope.total = "{{$total}}";
            $scope.checkCart = true;
            $scope.loading = true;
            $scope.form = {};

            $(document).ready(function () {
                if ($scope.total == 0) {
                    $scope.checkCart = false;
                    $scope.$applyAsync();
                }
            })

            $scope.submit = function () {
                $scope.loading.submit = true;
                $.ajax({
                    type: "POST",
                    url: "{{route('cart.post.checkout')}}",
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        customer_name: $scope.form.customer_name,
                        customer_phone: $scope.form.customer_phone,
                        customer_email: $scope.form.customer_email,
                        customer_address: $scope.form.customer_address,
                        customer_required: $scope.form.customer_required,
                        payment_method: $scope.form.payment_method,
                        items: $scope.items
                    },
                    beforeSend: function () {
                        $('.loading').show();
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.errors = null;
                            location.reload();
                            window.location.href = "/dat-hang-thanh-cong/" + response.order_code;

                            // cart.checkout.success
                        } else {
                            $scope.errors = response.errors;
                        }
                        $('.loading').hide();
                        console.log($scope.loading);
                    },
                    error: function () {
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    },
                });
            }

        })
    </script>
@endpush

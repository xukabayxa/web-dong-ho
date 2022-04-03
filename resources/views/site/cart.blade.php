@extends('site.layouts.master')
@section('title')
    <title>{{ "Giỏ hàng - " . ucfirst($_SERVER['HTTP_HOST']) }}</title>
@endsection
@section('content')
    <!-- breadcrumb-area start -->
    @include('site.partials.bread_crumb', ['type' => '','title' => 'Giỏ hàng' ])
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb cart-page" ng-controller="Cart" ng-cloak>
        <div class="container">
            <div class="row" ng-if="checkCart">
                <div class="col-12">
                    <form action="#" class="cart-table">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="plantmore-product-price">Đơn giá</th>
                                    <th class="plantmore-product-quantity">Số lượng</th>
                                    <th class="plantmore-product-subtotal">Thành tiền</th>
                                    <th class="plantmore-product-remove">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>

                                <tr ng-repeat="item in items">
                                    <td class="plantmore-product-thumbnail"><a href="#"><img src="<% item.attributes.image %>" alt="" style="width: 100px; height: 120px"></a></td>
                                    <td class="plantmore-product-name"><a href="#"><% item.name %></a></td>
                                    <td class="plantmore-product-price"><span class="amount"><% item.price | number %></span></td>
                                    <td class="plantmore-product-quantity">
                                        <input type="number" ng-model="item.quantity" min="1"
                                               ng-change="changeQty(item.quantity, item.id)"
                                               name="qtybutton">
                                    </td>
                                    <td class="product-subtotal"><span class="amount"></span><% (item.price * item.quantity) | number %></td>
                                    <td class="plantmore-product-remove"><a href="#" ng-click="removeItem(item.id)"><i class="fa fa-times"></i></a></td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="coupon-all">

                                    <div class="coupon2">
                                        <a href="{{route('front.home_page')}}" class=" continue-btn">Tiếp tục mua sắm</a>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Thanh toán</h2>
                                    <ul>
                                        <li>Tổng <span><% total | number%> đ</span></li>
                                    </ul>
                                    <a href="{{route('cart.get.checkout')}}" class="proceed-checkout-btn">Mua hàng</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row" ng-if="! checkCart">
                <p>Chưa có sản phẩm nào</p>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection

@push('scripts')
    <script>
        app.controller('Cart', function ($rootScope, $scope, $interval, cartItemSync) {
            $scope.items = @json($cartCollection);
            $scope.total = "{{$total}}";
            $scope.checkCart = true;

            $(document).ready(function () {
                if ($scope.total == 0) {
                    $scope.checkCart = false;
                    $scope.$applyAsync();
                }
            })

            $scope.changeQty = function (qty, product_id) {
                updateCart(qty, product_id)
                console.log(qty);
                console.log(product_id);
            }

            function updateCart(qty, product_id) {
                $.ajax({
                    type: 'GET',
                    url: "{{route('cart.update.item')}}",
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.removeItem = function (product_id) {
                $.ajax({
                    type: 'GET',
                    url: "{{route('cart.remove.item')}}",
                    data: {
                        product_id: product_id
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            if ($scope.total == 0) {
                                $scope.checkCart = false;
                            }

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);

                            $scope.$applyAsync();
                        }
                    },
                    error: function (e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });
            }


        })
    </script>
@endpush

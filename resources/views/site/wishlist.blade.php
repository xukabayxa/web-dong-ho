@extends('site.layouts.master')
@section('title')
    <title>{{ "Yêu thích - " . ucfirst($_SERVER['HTTP_HOST']) }}</title>
@endsection
@section('content')
    <!-- breadcrumb-area start -->
    @include('site.partials.bread_crumb', ['type' => '','title' => 'Yêu thích' ])
    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb" ng-controller="wishList" ng-cloak>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="#" class="cart-table">
                        <div class=" table-content table-responsive">
                            <p ng-if="products.length == 0">Danh sách yêu thích của bạn đang trống</p>
                            <table class="table" ng-if="products.length > 0">
                                <thead>
                                <tr>
                                    <th class="plantmore-product-thumbnail"></th>
                                    <th class="cart-product-name">Sản phẩm</th>
                                    <th class="plantmore-product-price">Đơn giá</th>
                                    <th class="plantmore-product-stock-status">Tình trạng</th>
                                    <th class="plantmore-product-add-cart">Thêm vào giỏ</th>
                                    <th class="plantmore-product-remove">Xóa</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr ng-repeat="product in products">
                                        <td class="plantmore-product-thumbnail"><a href="#"><img src="<% product.image.path %>" alt="" style="max-width: 45% !important;"></a></td>
                                        <td class="plantmore-product-name"><a href="#"><% product.name %></a></td>
                                        <td class="plantmore-product-price"><span class="amount"><% product.price | number:0 %></span></td>

                                        <td class="plantmore-product-stock-status" ng-if="product.state != 2"><span class="<% product.state !=2 ? 'in-stock' : '' %>"></span>còn hàng</td>
                                        <td class="plantmore-product-stock-status" ng-if="product.state == 2"><span class="<% product.state ==2 ? 'out-stock' : '' %>"></span>hết hàng</td>

                                        <td class="plantmore-product-add-cart"><a href="javascript:void(0)" ng-click="addToCart(product.id,1)">Thêm vào giỏ</a></td>
                                        <td class="plantmore-product-remove"><a href="javascript:void(0)" ng-click="addToWishList($event, product.id)"><i class="fa fa-times"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->

@endsection
@push('scripts')
    <script>
        app.controller('wishList', function ($rootScope, $scope, $interval, cartItemSync, wishlistSync) {
            $scope.products = @json($products);

            // add to cart
            @include('site.partials.cart.add_to_cart');

            $scope.addToWishList = function ($event, product_id) {
                url = "{{route('cart.add.wishlist', ['productId' => 'productId'])}}";
                if (product_id) {
                    url = url.replace('productId', product_id);
                } else {
                    url = url.replace('productId', $scope.product.id);
                }

                $.ajax({
                    type: "POST",
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    processData: false,
                    contentType: false,
                    success: function (response) {
                        $scope.products = $scope.products.filter(val => val.id != product_id);

                        if (response.success) {
                            toastr.options = {
                                timeOut : 1000,
                                extendedTimeOut : 1000,
                                tapToDismiss : true,
                                debug : false,
                                fadeOut: 10,
                                positionClass : "toast-top-center"
                            };

                            toastr.success(response.message);

                            $interval.cancel($rootScope.promise);
                            $rootScope.promise = $interval(function(){
                                wishlistSync.count = response.countProductWishlist;
                            }, 1000);

                        }
                    },
                    error: function () {
                        toastr.error('Lỗi !!!');
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    },
                });
            }
        })
    </script>
@endpush

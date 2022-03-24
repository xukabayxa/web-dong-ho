@extends('site.layouts.master')
@section('css')

@endsection
@section('content')

    @include('site.partials.bread_crumb', ['type' => '','title' => 'Sản phẩm' ])

    <!-- main-content-wrap start -->
    <div class="main-content-wrap shop-page section-ptb" ng-controller="ListProducts">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <!-- shop-sidebar-wrap start -->
                    <div class="shop-sidebar-wrap">
                        <div class="shop-box-area">

                            <!--sidebar-categores-box start  -->
                            <div class="sidebar-categores-box shop-sidebar mb-30">
                                <h4 class="title">Danh mục</h4>
                                <!-- category-sub-menu start -->
                                <div class="category-sub-menu">
                                    <ul>
                                        @foreach($categories as $category)
                                            <li class="has-sub"><a
                                                    href="{{route('front.category_product', $category->slug)}}">{{$category->name}} ({{$category->products_count}})</a>
                                                <ul>
                                                    @foreach($category->child_categories as $child_category)
                                                        <li>
                                                            <a href="{{route('front.category_product', $child_category->slug)}}">{{$child_category->name}}
                                                                ({{$child_category->products_count}})</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                                <!-- category-sub-menu end -->
                            </div>
                            <!--sidebar-categores-box end  -->

                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar mb-30">
                                <h4 class="title">Lọc theo giá</h4>
                                <!-- filter-price-content start -->
                                <div class="filter-price-content">
                                    <form action="#" method="post">
                                        <div id="price-slider" class="price-slider"></div>
                                        <div class="filter-price-wapper">

                                            <a class="add-to-cart-button" ng-click="filterPrice()">
                                                <span>Lọc</span>
                                            </a>
                                            <div class="filter-price-cont">

                                                <span>Price:</span>
                                                <div class="input-type">
                                                    <input type="text" id="min-price" readonly=""
                                                           style="width: 90px !important;"/>
                                                </div>
                                                <span>—</span>
                                                <div class="input-type">
                                                    <input type="text" id="max-price" readonly=""
                                                           style="width: 90px !important;"/>
                                                </div>

                                                <input type="hidden" id="min-price-hidden">
                                                <input type="hidden" id="max-price-hidden">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <!-- filter-price-content end -->
                            </div>
                            <!-- shop-sidebar end -->

                            <!-- shop-sidebar start -->
                        {{--                            <div class="shop-sidebar mb-30">--}}
                        {{--                                <h4 class="title">Filter by Color</h4>--}}

                        {{--                                <ul class="category-widget-list">--}}
                        {{--                                    <li><a href="#">Red (1)</a></li>--}}
                        {{--                                    <li><a href="#">White (1)</a></li>--}}
                        {{--                                </ul>--}}

                        {{--                            </div>--}}
                        <!-- shop-sidebar end -->

                            <!-- shop-sidebar start -->
                            <div class="shop-sidebar mb-30">
                                <h4 class="title">Tags</h4>

                                <ul class="sidebar-tag">
                                    @foreach($tags as $tag)
                                        <li><a href="#">{{$tag->name}}</a></li>
                                    @endforeach
                                </ul>

                            </div>
                            <!-- shop-sidebar end -->

                        </div>
                    </div>
                    <!-- shop-sidebar-wrap end -->
                </div>
                <div class="col-lg-9 order-lg-2 order-1">

                    <!-- shop-product-wrapper start -->
                    <div class="shop-product-wrapper">
                        <div class="row align-itmes-center">
                            <div class="col">
                                <!-- shop-top-bar start -->
                                <div class="shop-top-bar">
                                    <!-- product-view-mode start -->

                                    <div class="product-mode">
                                        <!--shop-item-filter-list-->
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active"><a
                                                    class="{{$viewGrid == 'true' ? 'active' : ''}} grid-view"
                                                    data-toggle="tab" ng-click="chooseView(1)"
                                                    href="#grid"><i class="fa fa-th"></i></a></li>
                                            <li><a class="list-view {{$viewList == 'true' ? 'active' : ''}}"
                                                   data-toggle="tab"
                                                   href="#list" ng-click="chooseView(2)"><i
                                                        class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <!-- shop-item-filter-list end -->
                                    </div>
                                    <!-- product-view-mode end -->
                                    <!-- product-short start -->
                                    <div class="product-short">
                                        <p>Sắp xếp theo :</p>
                                        <select class="nice-select" name="sortby" ng-change="sortBy()"
                                                ng-model="sort_type"
                                        >
                                            <option value="lasted" {{'lasted' == $sort ? 'selected' : ''}}>Mới nhất
                                            </option>
                                            <option value="priceAsc" {{'priceAsc' == $sort ? 'selected' : ''}}>Giá (từ
                                                thấp đến cao)
                                            </option>
                                            <option value="priceDesc" {{'priceDesc' == $sort ? 'selected' : ''}}>Giá (từ
                                                cao đến thấp)
                                            </option>
                                        </select>
                                    </div>
                                    <!-- product-short end -->
                                </div>
                                <!-- shop-top-bar end -->
                            </div>
                        </div>

                        <!-- shop-products-wrap start -->
                        <div class="shop-products-wrap">
                            <div class="tab-content">
                                <div class="tab-pane {{$viewGrid == 'true' ? 'active' : ''}}" id="grid">
                                    <div class="shop-product-wrap">
                                        <div class="row">
                                            @foreach($products as $product)
                                                <div class="col-lg-4 col-md-6">
                                                    <!-- single-product-area start -->
                                                @include('site.partials.single_product', ['product' => $product])
                                                <!-- single-product-area end -->
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  {{$viewList == 'true' ? 'active' : ''}}" id="list">
                                    @foreach($products as $product)
                                        <div class="shop-product-list-wrap">
                                            <div class="row product-layout-list mt-30">
                                                <div class="col-lg-3 col-md-3">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product">
                                                        <div class="product-image">
                                                            <a href="product-details.html"><img
                                                                    src="{{$product->image->path ?? '/site/assets/images/product/product-01.png'}}"
                                                                    alt="{{$product->name}}"></a>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="product-content-list text-left">

                                                        <h4><a href="product-details.html"
                                                               class="product-name">{{$product->name}}</a></h4>
                                                        <div class="price-box">
                                                            <span
                                                                class="new-price">{{number_format($product->price)}}đ</span>
                                                            @if($product->base_price)
                                                                <span class="old-price">{{number_format($product->base_price)}}đ</span>
                                                            @endif
                                                        </div>

                                                        <div class="product-rating">
                                                            {{--                                                            <ul class="d-flex">--}}
                                                            {{--                                                                <li><a href="#"><i class="icon-star"></i></a></li>--}}
                                                            {{--                                                                <li><a href="#"><i class="icon-star"></i></a></li>--}}
                                                            {{--                                                                <li><a href="#"><i class="icon-star"></i></a></li>--}}
                                                            {{--                                                                <li><a href="#"><i class="icon-star"></i></a></li>--}}
                                                            {{--                                                                <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>--}}
                                                            {{--                                                            </ul>--}}
                                                        </div>

                                                        <p>{{$product->short_des}}</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="block2">
                                                        <ul class="stock-cont">
                                                            {{--                                                            <li class="product-sku">Sku: <span>P006</span></li>--}}
                                                            <li class="product-stock-status">Tình trạng: <span
                                                                    class="in-stock">Còn hàng</span></li>
                                                        </ul>
                                                        <div class="product-button">

                                                            <ul class="actions">
                                                                <li class="add-to-wishlist">
                                                                    {{--                                                                    <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>--}}
                                                                </li>
                                                            </ul>
                                                            <div class="add-to-cart">
                                                                <div class="product-button-action">
                                                                    <a href="#" class="add-to-cart">Add to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- shop-products-wrap end -->

                        <!-- paginatoin-area start -->
                    {{ $products->links('site.pagination.paginate2') }}
                    <!-- paginatoin-area end -->
                    </div>
                    <!-- shop-product-wrapper end -->
                </div>
            </div>
        </div>

    </div>
    <!-- main-content-wrap end -->
@endsection
@push('scripts')
    <script>
        app.controller('ListProducts', function ($rootScope, $scope, $interval, cartItemSync) {
            $scope.viewGrid = {{$viewGrid}};
            $scope.viewList = null;
            $scope.sort_type = null;
            $scope.qty = 1;
            $scope.minPrice = {{$minPrice}};
            $scope.maxPrice = {{$maxPrice}};
            $scope.cart = {};
            // filter
            if (!$scope.viewGrid && !$scope.viewList) {
                $scope.viewGrid = "{{Request::get('viewGrid')}}";
                $scope.viewList = "{{Request::get('viewList')}}";
            }

            // chọn view xem, grid hay list
            $scope.chooseView = function (type) {
                if (type == 1) {
                    $scope.viewGrid = true;
                    $scope.viewList = false;
                } else {
                    $scope.viewList = true;
                    $scope.viewGrid = false;
                }

                console.log($scope.viewGrid)
            };

            // sắp xếp
            $scope.sortBy = function () {
                let categorySlug = "{{$categorySlug}}";
                if (categorySlug) {
                    var url = "{{route('front.category_product', ['categorySlug' => "$categorySlug"])}}"
                } else {
                    var url = "{{route('front.category_product')}}"
                }

                window.location.href = url + "?viewList=" + $scope.viewList +
                    "&viewGrid=" + $scope.viewGrid + "&sort=" + $scope.sort_type + "&minPrice=" + $scope.minPrice
                    + "&maxPrice=" + $scope.maxPrice;
            }

            // lọc theo giá
            $(document).ready(function () {
                $("#price-slider").slider({
                    range: true,
                    min: 0,
                    max: 30000000,
                    values: [{{$minPrice}}, {{$maxPrice}}],
                    slide: function (event, ui) {
                        $("#min-price").val(new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(ui.values[0]));
                        $("#max-price").val(new Intl.NumberFormat('vi-VN', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(ui.values[1]));

                        $("#min-price-hidden").val(ui.values[0]);
                        $("#max-price-hidden").val(ui.values[1]);
                    }
                });

                $("#min-price").val(new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format($("#price-slider").slider("values", 0)));
                $("#max-price").val(new Intl.NumberFormat('vi-VN', {
                    style: 'currency',
                    currency: 'VND'
                }).format($("#price-slider").slider("values", 1)));

                $("#min-price-hidden").val($("#price-slider").slider("values", 0));
                $("#max-price-hidden").val($("#price-slider").slider("values", 1));
            });

            $scope.filterPrice = function () {
                let categorySlug = "{{$categorySlug}}";
                if (categorySlug) {
                    var url = "{{route('front.category_product', ['categorySlug' => "$categorySlug"])}}"
                } else {
                    var url = "{{route('front.category_product')}}"
                }

                $scope.minPrice = $("#min-price-hidden").val();
                $scope.maxPrice = $("#max-price-hidden").val();

                window.location.href = url + "?viewList=" + $scope.viewList +
                    "&viewGrid=" + $scope.viewGrid + "&sort=" + "{{$sort}}" + "&minPrice=" + $scope.minPrice
                    + "&maxPrice=" + $scope.maxPrice;
            }

            // click trang
            $(document).on('click', '.load-product', function (e) {
                e.preventDefault();
                window.location.href = $(this).attr('href') + "&viewList=" + $scope.viewList +
                    "&viewGrid=" + $scope.viewGrid + "&sort=" + "{{$sort}}" + "&minPrice=" + $scope.minPrice
                    + "&maxPrice=" + $scope.maxPrice;
            });
            // end filter

            // modal detail product
            $scope.showModalDetail = function (product_id) {
                url = "{{route('front.product.getData', ['id' => 'product_id'])}}";
                url = url.replace('product_id', product_id);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function (response) {
                        if (response.success) {
                            $scope.product = response.data;
                            $("div.product-images").html(response.html);
                        }

                        $('.product-large-slider').slick({
                            fade: true,
                            arrows: false,
                            asNavFor: '.product-nav'
                        });
                        $('.product-nav').slick({
                            slidesToShow: 4,
                            asNavFor: '.product-large-slider',
                            centerMode: true,
                            centerPadding: 0,
                            focusOnSelect: true,
                            prevArrow: '<button type="button" class="slick-prev"><i class="fa fa-angle-left"></i></button>',
                            nextArrow: '<button type="button" class="slick-next"><i class="fa fa-angle-right"></i></button>',
                            responsive: [{
                                breakpoint: 576,
                                settings: {
                                    slidesToShow: 3,
                                }
                            }]
                        });
                    },
                    error: function (e) {
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });

                $("#modalProductDetail").modal('show');
            }
            // end

            // add to cart
            $scope.addToCart = function (productId = null, qty = null) {
                url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
                if (productId) {
                    url = url.replace('productId', productId);
                } else {
                    url = url.replace('productId', $scope.product.id);
                }

                if(qty) {
                    quantity = qty;
                } else {
                    quantity =  parseInt($scope.qty)
                }

                $.ajax({
                    type: 'POST',
                    url: url,
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        'qty': quantity
                    },
                    success: function (response) {
                        if (response.success) {
                            $.toast('Đã thêm vào giỏ hàng');

                            $interval.cancel($rootScope.promise);

                            $rootScope.promise = $interval(function(){
                                cartItemSync.items = response.items;
                                cartItemSync.total = response.total;
                                cartItemSync.count = response.count;
                            }, 1000);
                        }
                    },
                    error: function () {
                        $.toast('Lỗi')
                    },
                    complete: function () {
                        $scope.$applyAsync();
                    }
                });

            }

        })
    </script>
@endpush

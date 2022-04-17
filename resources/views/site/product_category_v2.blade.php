@extends('site.layouts.master')
@section('title')
    <title>{{" Sản phẩm - " . ucfirst($_SERVER['HTTP_HOST']) }}</title>
@endsection

@section('css')

@endsection
@section('content')

    <?php
    if(@$categorySlug) {
        $type = 'product_category';
        $title = $category->name;
    } else {
        $type = '';
        $title = 'Sản phẩm';
    }
    ?>

    @include('site.partials.bread_crumb', ['type' => $type, 'title' => $title ])
    <!-- main-content-wrap start -->
    <div class="main-content-wrap shop-page section-ptb" ng-controller="ListProducts" ng-cloak>
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <!-- shop-sidebar-wrap start -->
                    <div class="shop-sidebar-wrap">
                        @include('site.partials.sidebar_category', ['categories' => $categories, 'tags' => $tags])
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
                        @if(@$child_categories)
                            <div class="row align-itmes-center">
                                <div class="col-12 text-center">
                                    <ul class="nav product-tab-menu" role="tablist">
                                        @foreach($child_categories as $child_category)
                                            <li class="product-tab__item nav-item">
                                                <a class="product-tab__link nav-link {{$category->id == $child_category->id ? 'active' : ''}}" href="{{route('front.category_product', $child_category->slug)}}" role="tab" aria-selected="false">{{$child_category->name}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                    @endif
                    <!-- shop-products-wrap start -->
                        <div class="shop-products-wrap">
                            <div class="tab-content">
                                <div class="tab-pane {{$viewGrid == 'true' ? 'active' : ''}}" id="grid">
                                    <div class="shop-product-wrap">
                                        <div class="row" id="load-more-product-grid">
                                            @forelse($products as $product)
                                                <div class="col-lg-4 col-md-6 col-4">
                                                    <!-- single-product-area start -->
                                                @include('site.partials.single_product', ['product' => $product])
                                                <!-- single-product-area end -->
                                                </div>
                                            @empty
                                                <div class="col-lg-4 col-md-6" style="margin-top: 10px">
                                                    <span style="font-weight: bold; font-size: 14px">Chưa có sản phẩm</span>
                                                </div>

                                            @endforelse
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane  {{$viewList == 'true' ? 'active' : ''}} load-more-product-list" id="list">
                                    @forelse($products as $product)
                                        <div class="shop-product-list-wrap">
                                            <div class="row product-layout-list mt-30">
                                                <div class="col-lg-3 col-md-3">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product">
                                                        <div class="product-image">
                                                            <a href="{{route('front.product.detail', $product->slug)}}"><img
                                                                    src="{{$product->image->path ?? '/site/assets/images/product/product-01.png'}}"
                                                                    alt="{{$product->name}}"></a>
                                                        </div>
                                                    </div>
                                                    <!-- single-product-wrap end -->
                                                </div>

                                                <div class="col-lg-6 col-md-6">
                                                    <div class="product-content-list text-left">

                                                        <h4><a href="{{route('front.product.detail', $product->slug)}}"
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

                                                        <p>{!! $product->short_des !!}</p>
                                                    </div>
                                                </div>

                                                <div class="col-lg-3 col-md-3">
                                                    <div class="block2">
                                                        <ul class="stock-cont">
                                                            {{--                                                            <li class="product-sku">Sku: <span>P006</span></li>--}}
                                                            <li class="product-stock-status">Tình trạng: <span
                                                                    class="in-stock" style="color: {{$product->state == 1 ? '#28a745' : '#a73628'}}">{{$product->state == 1 ? 'Còn hàng' : 'Hết hàng'}}</span></li>
                                                        </ul>
                                                        <div class="product-button">

                                                            <ul class="actions">
                                                                <li class="add-to-wishlist">
                                                                    {{--                                                                    <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>--}}
                                                                </li>
                                                            </ul>
                                                            <div class="add-to-cart">
                                                                <div class="product-button-action">
                                                                    <a href="javascript:void(0)" class="add-to-cart" ng-click="addToCart({{$product->id}},1)">Thêm vào giỏ hàng</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                        <div class="" style="margin-top: 10px">
                                            <span style="font-weight: bold; font-size: 14px">Chưa có sản phẩm</span>
                                        </div>
                                    @endforelse

                                </div>
                            </div>
                        </div>

                        @if(count($products) >= 9)
                        <div class="contact-submit-btn" style="text-align: center; margin-top: 12px" ng-if="checkLoad">
                            <button class="submit-btn" id="loadMore" type="submit" ng-click="loadMoreProduct()" ng-disabled="loading">
                                <div class="lds-ellipsis" ng-if="loading" style="width: <% loading ? '70px' : '' %>"><div></div><div></div><div></div><div></div></div>
                                <span ng-if="! loading">xem thêm</span>

                            </button>
                            <p class="form-messege"></p>
                        </div>
                        @endif
                    </div>
                    <!-- shop-product-wrapper end -->
                </div>
            </div>
        </div>

        <!-- Modal -->
        @include('site.partials.product_detail_modal_2')

    </div>
    <!-- main-content-wrap end -->
@endsection
@push('scripts')
    <script>
        app.controller('ListProducts', function ($rootScope, $scope, $compile, $interval, cartItemSync, wishlistSync) {
            $scope.viewGrid = {{$viewGrid}};
            $scope.viewList = null;
            $scope.sort_type = "{{$sort}}";
            $scope.qty = 1;
            $scope.minPrice = {{$minPrice}};
            $scope.maxPrice = {{$maxPrice}};
            $scope.cart = {};

            $scope.checkLoad = true;
            $scope.loading = false;
            $scope.product_ids = {{$product_ids}};

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
            @include('site.partials.cart.add_to_cart');

            // add to wishlist
            @include('site.partials.cart.add_to_wishlist');

            $scope.loadMoreProduct = function () {

                $.ajax({
                    type: 'GET',
                    url: '{{route('front.loadmore.products')}}',
                    data: {
                        minPrice: $scope.minPrice,
                        maxPrice: $scope.maxPrice,
                        category_id: {{$category->id}},
                        sort: $scope.sort_type,
                        product_ids_load_more: $scope.product_ids,
                    },
                    beforeSend: function() {
                        $scope.loading = true;
                    },
                    success: function (response) {
                        if (response.success) {
                            $("#load-more-product-grid").append($compile(response.product_render_grid)($scope));
                            $(".load-more-product-list").append($compile(response.product_render_list)($scope));
                            $scope.product_ids = $scope.product_ids.concat(response.product_ids);
                            console.log(response.product_ids.length);

                            if(response.product_ids.length < 9) {
                                $scope.checkLoad = false;
                            }
                        }
                    },
                    error: function (e) {
                    },
                    complete: function () {
                        $scope.loading = false;
                        $scope.$applyAsync();
                    }
                });
            }

        })
    </script>

@endpush

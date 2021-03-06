@extends('site.layouts.master')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.css" />
<link rel="stylesheet" type="text/css" href="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
@endsection
@section('content')
@include('site.partials.bread_crumb', ['type' => '','title' => 'Tìm kiếm' ])
<!-- main-content-wrap start -->
<div class="main-content-wrap shop-page section-ptb" ng-controller="SearchProducts" style="padding-top: 30px">
    <div class="container">
        <div class="row" style="margin-bottom: 10px">
            <div class="col-lg-12">
                <span style="font-size: 14px; font-weight: bold">Tìm thấy {{$countProducts}} kết quả phù hợp với từ khóa "{{$keyword}}"</span>
            </div>

        </div>
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
                                        <li class="active"><a class="{{$viewGrid == 'true' ? 'active' : ''}} grid-view" data-toggle="tab" ng-click="chooseView(1)" href="#grid"><i class="fa fa-th"></i></a></li>
                                        <li><a class="list-view {{$viewList == 'true' ? 'active' : ''}}" data-toggle="tab" href="#list" ng-click="chooseView(2)"><i class="fa fa-th-list"></i></a></li>
                                    </ul>
                                    <!-- shop-item-filter-list end -->
                                </div>
                                <!-- product-view-mode end -->
                                <!-- product-short start -->
                                <div class="product-short">
                                    <p>Sắp xếp theo :</p>
                                    <select class="nice-select" name="sortby" ng-change="sortBy()" ng-model="sort_type">
                                        <option value="lasted" {{'lasted'==$sort ? 'selected' : '' }}>Mới nhất</option>
                                        <option value="priceAsc" {{'priceAsc'==$sort ? 'selected' : '' }}>Giá (từ thấp đến cao)</option>
                                        <option value="priceDesc" {{'priceDesc'==$sort ? 'selected' : '' }}>Giá (từ cao đến thấp)</option>
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
                                    <div class="row" id="load-more-product-grid">
                                        @foreach($products as $product)
                                        <div class="col-lg-4 col-md-6 col-4">
                                            <!-- single-product-area start -->
                                            @include('site.partials.single_product', ['product' => $product])
                                            <!-- single-product-area end -->
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane  {{$viewList == 'true' ? 'active' : ''}} load-more-product-list" id="list">
                                @foreach($products as $product)
                                <div class="shop-product-list-wrap">
                                    <div class="row product-layout-list mt-30">
                                        <div class="col-lg-3 col-md-3">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product">
                                                <div class="product-image">
                                                    <a href="product-details.html"><img src="{{$product->image->path ?? '/site/assets/images/product/product-01.png'}}" alt="{{$product->name}}"></a>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="product-content-list text-left">

                                                <h4><a href="product-details.html" class="product-name">{{$product->name}}</a></h4>
                                                <div class="price-box">
                                                    <span class="new-price">{{number_format($product->price)}}đ</span>
                                                    @if($product->base_price)
                                                    <span class="old-price">{{number_format($product->base_price)}}đ</span>
                                                    @endif
                                                </div>

                                                <div class="product-rating">
                                                    {{-- <ul class="d-flex">--}}
                                                        {{-- <li><a href="#"><i class="icon-star"></i></a></li>--}}
                                                        {{-- <li><a href="#"><i class="icon-star"></i></a></li>--}}
                                                        {{-- <li><a href="#"><i class="icon-star"></i></a></li>--}}
                                                        {{-- <li><a href="#"><i class="icon-star"></i></a></li>--}}
                                                        {{-- <li class="bad-reting"><a href="#"><i class="icon-star"></i></a></li>--}}
                                                        {{-- </ul>--}}
                                                </div>

                                                <p>{!! $product->short_des !!}</p>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3">
                                            <div class="block2">
                                                <ul class="stock-cont">
                                                    {{-- <li class="product-sku">Sku: <span>P006</span></li>--}}
                                                    <li class="product-stock-status">Tình trạng: <span class="in-stock" style="color: {{$product->state == 1 ? '#28a745' : '#a73628'}}">{{$product->state == 1 ? 'Còn hàng' : 'Hết hàng'}}</span></li>
                                                </ul>
                                                <div class="product-button">

                                                    <ul class="actions">
                                                        <li class="add-to-wishlist">
                                                            {{-- <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>--}}
                                                        </li>
                                                    </ul>
                                                    <div class="add-to-cart">
                                                        <div class="product-button-action">
                                                            <a href="javascript:void(0)" class="add-to-cart" ng-click="addToCart({{$product->id}},1)">Đặt mua hàng</a>
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
<script src="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
<script src="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    app.controller('SearchProducts', function ($rootScope, $scope, $compile, $interval, cartItemSync, wishlistSync) {
            $scope.viewGrid = {{$viewGrid}};
            $scope.viewList = null;
            $scope.sort_type = null;
            $scope.qty = 1;
            $scope.minPrice = {{$minPrice}};
            $scope.maxPrice = {{$maxPrice}};

            $scope.cart = {};

            $scope.keyword = "{{$keyword}}";
            $scope.category ="{{$category_id}}";
            $scope.checkLoad = true;
            $scope.loading = false;
            $scope.product_ids = {{$product_ids}};

        // filter
            if( ! $scope.viewGrid && ! $scope.viewList) {
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
                if(categorySlug) {
                    var url = "{{route('front.search', ['categorySlug' => "$categorySlug"])}}"
                } else {
                    var url = "{{route('front.search')}}";
                }

                window.location.href = url + "?keyword="+$scope.keyword + "&category_id="+$scope.category + "&viewList=" + $scope.viewList +
                    "&viewGrid=" + $scope.viewGrid + "&sort=" + $scope.sort_type + "&minPrice=" + $scope.minPrice
                    + "&maxPrice=" + $scope.maxPrice;
            }

            // lọc theo giá
            $(document).ready(function () {
                $( "#price-slider" ).slider({
                    range: true,
                    min: 0,
                    max: 30000000,
                    values: [ {{$minPrice}}, {{$maxPrice}} ],
                    slide: function( event, ui ) {
                        $( "#min-price" ).val(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format( ui.values[0])  );
                        $( "#max-price" ).val(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format( ui.values[1])  );

                        $( "#min-price-hidden" ).val(ui.values[ 0 ]);
                        $( "#max-price-hidden" ).val(ui.values[ 1 ]);
                    }
                });

                $( "#min-price" ).val(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format($( "#price-slider" ).slider( "values", 0 )));
                $( "#max-price" ).val(new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format($( "#price-slider" ).slider( "values", 1 )));

                $( "#min-price-hidden" ).val($( "#price-slider" ).slider( "values", 0 ));
                $( "#max-price-hidden" ).val($( "#price-slider" ).slider( "values", 1 ));
            });

            $scope.filterPrice = function () {
                let categorySlug = "{{$categorySlug}}";
                if(categorySlug) {
                    var url = "{{route('front.search', ['categorySlug' => "$categorySlug"])}}"
                } else {
                    var url = "{{route('front.search')}}"
                }

                $scope.minPrice = $( "#min-price-hidden" ).val();
                $scope.maxPrice = $( "#max-price-hidden" ).val();

                window.location.href = url + "?keyword="+$scope.keyword + "&category_id="+$scope.category + "&viewList=" + $scope.viewList +
                    "&viewGrid=" + $scope.viewGrid + "&sort=" + "{{$sort}}" + "&minPrice=" + $scope.minPrice
                    + "&maxPrice=" + $scope.maxPrice;
            }

            $scope.loadMoreProduct = function () {

            $.ajax({
                type: 'GET',
                url: '{{route('front.loadmore.products')}}',
                data: {
                    minPrice: $scope.minPrice,
                    maxPrice: $scope.maxPrice,
                    category_id: null,
                    sort: $scope.sort_type,
                    product_ids_load_more: $scope.product_ids,
                    keyword: $scope.keyword,
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

            // end filter

            // modal detail product
            $scope.showModalDetail = function (product_id) {
                url = "{{route('front.product.getData', ['id' => 'product_id'])}}";
                url = url.replace('product_id', product_id);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(response) {
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
                    error: function(e) {
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });

                $("#modalProductDetail").modal('show');
            }
            // end

            // Đặt mua hàng
            @include('site.partials.cart.add_to_cart');

            // add to wishlist
             @include('site.partials.cart.add_to_wishlist');
        })

</script>
@endpush

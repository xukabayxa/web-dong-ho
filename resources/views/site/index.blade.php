@extends('site.layouts.master')
@section('title')
    <title>{{ ucfirst($_SERVER['HTTP_HOST']) . ' - '. $config->web_title }}</title>
@endsection
@section('content')
    <div ng-controller="indexPage">
        <!-- Hero Section Start -->
        <div class="hero-slider hero-slider-one">
        @foreach($banners as $banner)
            <!-- Single Slide Start -->
                <div class="single-slide"
                     style="background-image: url({{$banner->image->path ?? 'site/assets/images/slider/slide-bg-2.jpg'}})">
                    <!-- Hero Content One Start -->
                    <div class="hero-content-one container">
                        <div class="row">
                            <div class="col-lg-12 col-md-12">
                                <div class="slider-content-text text-left">
                                    {!! $banner->intro !!}

                                    @if($banner->link)
                                        <div class="slide-btn-group">
                                            <a href="{{$banner->link}}" class="btn btn-bordered btn-style-1">Mua ngay</a>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Hero Content One End -->
                </div>
                <!-- Single Slide End -->
            @endforeach
        </div>
        <!-- Hero Section End -->

        <div class="banner-area section-pt">
            <div class="container">
                <div class="tgdh-sale">
                    <section class="section-box st-cate margin-30"><div class="category-container">
                            <div class="cate-box">
                                <div class="row-flex bg-white">
                                    @foreach($productCategories as $p_cate)
                                    <div class="col6-no col-border">
                                        <a href="{{route('front.category_product', $p_cate->slug)}}" class="ct-item-a ct-transition">
                                            <div class="cate-item text-center">
                                                <picture class="picture margin-10">
                                                    <img src="{{$p_cate->image->path ?? null}}" alt="{{$p_cate->name}}">
                                                </picture>
                                                <div class="cate-item-name f15-bold">
                                                    {{$p_cate->name}}
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>

        <!-- Banner Area Start -->
        <div class="banner-area section-pt">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#">{!! printBlock(12) !!}</a>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#">{!! printBlock(13) !!}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->

    <?php
    $categorySpecialFirst = $categoriesSpecial->shift();
    ?>
    @if($categorySpecialFirst)
        <!-- Product Area Start -->
            <div class="product-area section-pb section-pt-30">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-title">
                                <h4>{{$categorySpecialFirst->name }}</h4>
                            </div>
                        </div>
                    </div>

                    <div class="row product-active-lg-4">
                        @foreach($categorySpecialFirst->products as $product)
                            <div class="col-lg-12">
                                <!-- single-product-area start -->
                            @include('site.partials.single_product', ['product' => $product])
                            <!-- single-product-area end -->
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
            <!-- Product Area End -->
    @endif

    <!-- Banner Area Start -->
        <div class="banner-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#">{!! printBlock(14) !!}</a>
                        </div>
                    </div>
                    <div class="col-lg-6  col-md-6">
                        <div class="single-banner mb-30">
                            <a href="#">{!! printBlock(15) !!}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Area End -->

        <!-- Product Area Start -->
        @if($categoriesSpecial->count() > 0)
            <div class="product-area section-pb section-pt-30">
                <div class="container">

                    <div class="row">
                        <div class="col-12 text-center">
                            <ul class="nav product-tab-menu" role="tablist">
                                @foreach($categoriesSpecial as $index => $cate)
                                    <li class="product-tab-item nav-item {{$index == 0 ? 'active' : ''}}">
                                        <a class="product-tab__link nav-link {{$index == 0 ? 'active' : ''}}" id="nav-featured-tab" data-toggle="tab"
                                           href="#{{$cate->code}}" role="tab" aria-selected="true">{{$cate->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content product-tab__content" id="product-tabContent">
                        @foreach($categoriesSpecial as $index => $cate)
                            <div class="tab-pane fade {{$index == 0 ? 'show active' : ''}}" id="{{$cate->code}}" role="tabpanel">
                                <div class="product-carousel-group">

                                    <div class="row product-active-row-4">
                                        @foreach($cate->products as $product)
                                            <div class="col-lg-12">
                                                @include('site.partials.single_product', ['product' => $product])
                                            </div>
                                        @endforeach
                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        @endif
    <!-- Product Area End -->

        <!-- letast blog area Start -->
        <div class="letast-blog-area section-pb">
            <div class="container">
                <div class="row">

                    <?php
                    \Carbon\Carbon::setLocale('vi');
                    ?>

                    @foreach($postsRecent as $post)
                        <div class="col-lg-4">
                            <div class="singel-latest-blog">
                                <div class="aritcles-content">
                                    <div class="author-name">
                                        <a href="#"> {{$post->user_create->name}}</a> - {{ ucfirst(\Carbon\Carbon::parse($post->created_at)->dayName).', '.\Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i') }}
                                    </div>
                                    <h4><a href="{{route('front.news', ['slug' => $post->category->slug, 'postSlug' => $post->slug])}}" class="articles-name">{{$post->name}}</a></h4>
                                </div>
                                <div class="articles-image">
                                    <a href="{{route('front.news', ['slug' => $post->category->slug, 'postSlug' => $post->slug])}}">
                                        <img src="{{$post->image->path ?? "site/assets/images/blog/blog-01.jpg"}}" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- letast blog area End -->
        <!-- Modal -->
        <div class="modal fade modal-wrapper" id="modalProductDetail2" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="modal-inner-area">
                            <div class="row product-details-inner">
                                <div class="col-lg-5 col-md-6 col-sm-6 product-images">

                                </div>
                                <div class="col-lg-7 col-md-6 col-sm-6">
                                    <div class="product-details-view-content">
                                        <div class="product-info">
                                            <h3><% product.name %></h3>
                                            <div class="price-box">
                                                <span class="new-price"><% product.price.toLocaleString('en')%></span>
                                                <span class="old-price" ng-if="product.base_price"><% product.base_price.toLocaleString('en')%></span>
                                            </div>

                                            <p><% product.short_des %></p>

                                            <div class="single-add-to-cart">
                                                <form action="#" class="cart-quantity d-flex">
                                                    <div class="quantity">
                                                        <div class="cart-plus-minus">
                                                            <input type="number" class="input-text" name="quantity" value="1" title="Qty" min="1" ng-model="qty">
                                                        </div>
                                                    </div>
                                                    <button class="add-to-cart" type="button" ng-click="addToCart()">Thêm vào giỏ hàng</button>
                                                </form>
                                            </div>
                                            <ul class="single-add-actions">
                                                {{--                                            <li class="add-to-wishlist">--}}
                                                {{--                                                <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>--}}
                                                {{--                                            </li>--}}
                                            </ul>
                                            <ul class="stock-cont">
                                                <li class="product-stock-status">Danh mục: <a href="#"><% product.category.name %></a></li>
                                                <li class="product-stock-status">Hãng sản xuất: <a href="#"><% product.manufacturer.name %></a></li>
                                                <li class="product-stock-status">Tag: <a href="#"><% product.tags_str %></a></li>
                                            </ul>
                                            <div class="share-product-socail-area">
                                                {{--                                            <p>Share this product</p>--}}
                                                {{--                                            <ul class="single-product-share">--}}
                                                {{--                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                                                {{--                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                                                {{--                                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>--}}
                                                {{--                                            </ul>--}}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        app.controller('indexPage', function ($rootScope, $scope, $interval, cartItemSync, wishlistSync) {
            $scope.qty = 1;
            $scope.cart = {}
            $scope.product = {};
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

                $("#modalProductDetail2").modal('show');
            }
            // end

            // Đặt mua hàng
            @include('site.partials.cart.add_to_cart');

            // add to wishlist
            @include('site.partials.cart.add_to_wishlist');

        })
    </script>
@endpush

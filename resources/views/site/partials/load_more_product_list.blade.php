
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
                            <a href="javascript:void(0)" class="add-to-cart" ng-click="addToCart({{$product->id}},1)">Đặt mua hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

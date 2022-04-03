<div class="single-product-area mt-30">
    <div class="product-thumb">
        <a href="">
            <img class="primary-image" src="{{$product->image->path ?? '/site/assets/images/product/product-02.png'}}" alt="">
        </a>
        {{-- <div class="label-product label_new">New</div>--}}
        <div class="action-links">
            <a href="javascript:void(0)" class="cart-btn" title="Đặt mua hàng" ng-click="addToCart({{$product->id}},1)"><i
                    class="icon-basket-loaded"></i></a>
            <a href="javascript:void(0)" class="wishlist-btn {{in_array($product->id, $productWishlist) ? 'active-wishlist' : ''}}" title="{{in_array($product->id, $productWishlist) ? 'Gỡ khỏi danh sách yêu thích' : 'Thêm vào danh sách yêu thích'}}"><i
                    class="icon-heart" ng-click="addToWishList($event, {{$product->id}})"></i></a>
            <a href="javascript:void(0)" class="quick-view" title="Quick View"  ng-click="showModalDetail({{$product->id}})"
               ><i class="icon-magnifier icons"></i></a>
        </div>
        {{-- <ul class="watch-color">--}}
            {{-- <li class="twilight"><span></span></li>--}}
            {{-- <li class="pigeon"><span></span></li>--}}
            {{-- <li class="portage"><span></span></li>--}}
            {{-- </ul>--}}
    </div>
    <div class="product-caption">
        <h4 class="product-name"><a href="{{route('front.product.detail', $product->slug)}}">{{$product->name}}</a></h4>
        <div class="price-box">
            <span class="new-price">{{number_format($product->price)}}đ</span>
            @if($product->base_price)
            <span class="old-price">{{number_format($product->base_price)}}đ</span>
            @endif
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade modal-wrapper" id="modalProductDetail">
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
                                        <h3>
                                            <% product.name %>
                                        </h3>
                                        <div class="price-box">
                                            <span class="new-price">
                                                <% product.price.toLocaleString('en')%>
                                            </span>
                                            <span class="old-price" ng-if="product.base_price">
                                                <% product.base_price.toLocaleString('en')%>
                                            </span>
                                        </div>

                                        <p>
                                            <% product.short_des %>
                                        </p>

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
                                            {{-- <li class="add-to-wishlist">--}}
                                                {{-- <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>--}}
                                                {{-- </li>--}}
                                        </ul>
                                        <ul class="stock-cont">
                                            <li class="product-stock-status">Danh mục: <a href="#">
                                                    <% product.category.name %>
                                                </a></li>
                                            <li class="product-stock-status">Tag: <a href="#">
                                                    <% product.tags_str %>
                                                </a></li>
                                        </ul>
                                        <div class="share-product-socail-area">
                                            {{-- <p>Share this product</p>--}}
                                            {{-- <ul class="single-product-share">--}}
                                                {{-- <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
                                                {{-- <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
                                                {{-- <li><a href="#"><i class="fa fa-pinterest"></i></a></li>--}}
                                                {{-- </ul>--}}
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

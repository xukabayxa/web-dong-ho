<div class="single-product-area mt-30">
    <div class="product-thumb">
        <a href="{{route('front.product.detail', $product->slug)}}">
            <img class="primary-image" src="{{$product->image->path ?? '/site/assets/images/product/product-02.png'}}" alt="">
        </a>
         <div class="label-product label_new" style="background: {{$product->state == 1 ? '#28a745' : '#a73628'}}">{{\App\Model\Admin\Product::STATE[$product->state]}}</div>
{{--         <div class="label-product label_new" style="background: {{$product->is_pin == 1 ? '#28a745' : '#a73628'}}">{{$product->is_pin == 1 ? 'ghim' : 'không ghim'}}</div>--}}
        <div class="action-links">
            <a href="javascript:void(0)" class="cart-btn" title="Đặt mua hàng" ng-click="addToCart({{$product->id}},1)"><i
                    class="icon-basket-loaded"></i></a>
            <a href="javascript:void(0)" class="wishlist-btn {{in_array($product->id, $productWishlist) ? 'active-wishlist' : ''}}" title="{{in_array($product->id, $productWishlist) ? 'Gỡ khỏi danh sách yêu thích' : 'Thêm vào danh sách yêu thích'}}"><i
                    class="icon-heart" ng-click="addToWishList($event, {{$product->id}})"></i></a>
            <a href="javascript:void(0)" class="quick-view" title="Quick View"  ng-click="showModalDetail({{$product->id}})"
               ><i class="icon-magnifier icons"></i></a>
        </div>

         <div class="price-reponsive">
            <span style="font-weight: bold; font-size:12px; color: white">{{number_format($product->price)}}</span>
         </div>

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
</div>

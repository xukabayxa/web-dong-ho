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

                                    <p ng-bind-html="trustAsHtml(product.short_des)">

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
{{--                                        <li class="add-to-wishlist">--}}
{{--                                            <a href="wishlist.html" class="add_to_wishlist"><i class="icon-heart"></i> Add to Wishlist</a>--}}
{{--                                        </li>--}}
                                    </ul>
                                    <ul class="stock-cont">
                                        <li class="product-stock-status">Danh mục: <a href="#">
                                                <% product.category.name %>
                                            </a></li>
                                        <li class="product-stock-status">Hãng sản xuất: <a href="#">
                                                <% product.manufacturer.name %>
                                            </a></li>
                                        <li class="product-stock-status"><i class="fa fa-tags" aria-hidden="true"></i>
                                                <span ng-bind-html="trustAsHtml(product.tags_str)"></span>
                                            </li>
                                    </ul>
{{--                                    <div class="share-product-socail-area">--}}
{{--                                        <p>Share this product</p>--}}
{{--                                        <ul class="single-product-share">--}}
{{--                                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>--}}
{{--                                            <li><a href="#"><i class="fa fa-pinterest"></i></a></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

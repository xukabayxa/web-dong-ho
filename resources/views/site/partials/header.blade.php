<!--  Header Start -->
<header class="header" ng-controller="headerPartial">

    <!-- Header Top Start -->
    <div class="header-top-area d-none d-lg-block text-color-white bg-gren border-bm-1">

        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="header-top-settings">
                        <ul class="nav align-items-center">
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="top-info-wrap text-right">
                        <ul class="my-account-container">
                            <li><a href="{{route('cart')}}">Giỏ hàng</a></li>
                            <li><a href="{{route('cart.get.checkout')}}">Thanh toán</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Header Top End -->

    <!-- haeader Mid Start -->
    <div class="haeader-mid-area bg-gren border-bm-1 d-none d-lg-block ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-5">
                    <div class="logo-area">
                        <a href="{{route('front.home_page')}}"><img src="{{$config->image->path ?? "/site/assets/images/logo/logo.png"}}" alt="{{$config->web_title}}"></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="search-box-wrapper">
                        <div class="search-box-inner-wrap">
                            <form class="search-box-inner">
                                <div class="search-select-box">
                                    <select class="nice-select" ng-model="search.category_id">
                                        <optgroup label=" Watch">
                                            <option value="all">Tất cả</option>
                                            @foreach($productCategories as $p_cate)
                                            <option value="{{$p_cate->id}}" {{$p_cate->id == Request::get('category_id') ? 'selected' : ''}}>{{$p_cate->name}}</option>
                                            @endforeach
                                        </optgroup>
                                    </select>
                                </div>
                                <div class="search-field-wrap">
                                    <input type="text" class="search-field keyword" placeholder="Tìm kiếm sản phẩm...">

                                    <div class="search-btn">
                                        <button class="btn-search"><i class="icon-magnifier"></i></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="right-blok-box text-white d-flex">

                        <div class="user-wrap">
                            <a href="#"><span class="cart-total">2</span> <i class="icon-heart"></i></a>
                        </div>

                        <div class="shopping-cart-wrap">
                            <a href="#"><i class="icon-basket-loaded"></i><span class="cart-total"><% cart.count %></span></a>
                            <ul class="mini-cart" ng-if="checkCart">
                                <li class="cart-item" ng-repeat="item in cart.items">
                                    <div class="cart-image">
                                        <a href=""><img alt="" src="<% item.attributes.image %>"></a>
                                    </div>
                                    <div class="cart-title">
                                        <a href="">
                                            <h4><% item.name %></h4>
                                        </a>
                                        <div class="quanti-price-wrap">
                                            <span class="quantity"><% item.quantity %> ×</span>
                                            <div class="price-box"><span class="new-price"><% item.price | number %></span></div>
                                        </div>
                                        <a class="remove_from_cart" ng-click="removeItem(item.id)"><i class="icon_close"></i></a>
                                    </div>
                                </li>

                                <li class="subtotal-box">
                                    <div class="subtotal-title">
                                        <h3>Tổng :</h3><span><% cart.total | number %> đ</span>
                                    </div>
                                </li>

                                <li class="mini-cart-btns">
                                    <div class="cart-btns">
                                        <a href="{{route('cart')}}">Giỏ hàng</a>
                                        <a href="{{route('cart.get.checkout')}}">Thanh toán</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- haeader Mid End -->

    <!-- haeader bottom Start -->
    <div class="haeader-bottom-area bg-gren header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 d-none d-lg-block">
                    <div class="main-menu-area white_text">
                        <!--  Start Mainmenu Nav-->
                        <nav class="main-navigation text-center">
                            <ul>
                                <li class="active"><a href="{{route('front.home_page')}}">Trang chủ</a>
                                </li>

                                <li><a href="#">Sản phẩm <i class="fa fa-angle-down"></i></a>
                                    <ul class="mega-menu">
                                        @foreach($productCategories as $category)
                                            <li><a href="{{route('front.category_product', $category->slug)}}">{{$category->name}}</a>
                                                <ul>
                                                    @foreach($category->childs as $categoryChild)
                                                    <li><a href="{{route('front.category_product', $categoryChild->slug)}}">{{$categoryChild->name}}</a></li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        @endforeach

                                    </ul>

                                </li>

                                <li><a href="#">Blog <i class="fa fa-angle-down"></i></a>

                                    <ul class="sub-menu">
                                        @foreach($postCategories as $postCategory)
                                        <li><a href="{{route('front.news', $postCategory->slug)}}">{{$postCategory->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>

                                <li><a href={{route('front.about')}}>Về chúng tôi</a></li>
                                <li><a href="{{route('front.contact')}}">Liên hệ</a></li>
                            </ul>
                        </nav>

                    </div>
                </div>

                <div class="col-5 col-md-6 d-block d-lg-none">
                    <div class="logo"><a href="index.html"><img src="/site/assets/images/logo/logo.png" alt=""></a></div>
                </div>


                <div class="col-lg-3 col-md-6 col-7 d-block d-lg-none">
                    <div class="right-blok-box text-white d-flex">

                        <div class="user-wrap">
                            <a href="wishlist.html"><span class="cart-total">2</span> <i class="icon-heart"></i></a>
                        </div>

                        <div class="shopping-cart-wrap">
                            <a href="#"><i class="icon-basket-loaded"></i><span class="cart-total">2</span></a>
                            <ul class="mini-cart">
                                <li class="cart-item">
                                    <div class="cart-image">
                                        <a href="product-details.html"><img alt="" src="/site/assets/images/product/product-02.png"></a>
                                    </div>
                                    <div class="cart-title">
                                        <a href="product-details.html">
                                            <h4>Product Name 01</h4>
                                        </a>
                                        <div class="quanti-price-wrap">
                                            <span class="quantity">1 ×</span>
                                            <div class="price-box"><span class="new-price">$130.00</span></div>
                                        </div>
                                        <a class="remove_from_cart" href="#"><i class="fa fa-times"></i></a>
                                    </div>
                                </li>
                                <li class="cart-item">
                                    <div class="cart-image">
                                        <a href="product-details.html"><img alt="" src="/site/assets/images/product/product-03.png"></a>
                                    </div>
                                    <div class="cart-title">
                                        <a href="product-details.html">
                                            <h4>Product Name 03</h4>
                                        </a>
                                        <div class="quanti-price-wrap">
                                            <span class="quantity">1 ×</span>
                                            <div class="price-box"><span class="new-price">$130.00</span></div>
                                        </div>
                                        <a class="remove_from_cart" href="#"><i class="icon-trash icons"></i></a>
                                    </div>
                                </li>
                                <li class="subtotal-box">
                                    <div class="subtotal-title">
                                        <h3>Sub-Total :</h3><span>$ 260.99</span>
                                    </div>
                                </li>
                                <li class="mini-cart-btns">
                                    <div class="cart-btns">
                                        <a href="cart.html">View cart</a>
                                        <a href="checkout.html">Checkout</a>
                                    </div>
                                </li>
                            </ul>
                        </div>

                        <div class="mobile-menu-btn d-block d-lg-none">
                            <div class="off-canvas-btn">
                                <a href="#"><img src="/site/assets/images/icon/bg-menu.png" alt=""></a>
                            </div>
                        </div>

                    </div>
                </div>



            </div>
        </div>
    </div>
    <!-- haeader bottom End -->

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="fa fa-times"></i>
            </div>

            <div class="off-canvas-inner">

                <div class="search-box-offcanvas">
                    <form>
                        <input type="text" class="keyword" placeholder="Tìm kiếm sản phẩm...">
                        <button class="search-btn btn-search"><i class="icon-magnifier"></i></button>
                    </form>
                </div>

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            <li><a href="{{route('front.home_page')}}">Trang chủ</a>
                            </li>
                            <li class="menu-item-has-children"><a href="">Sản phẩm</a>
                                <ul class="megamenu dropdown">
                                    @foreach($productCategories as $category)
                                        <li class="mega-title has-children"><a href="{{route('front.category_product', $category->slug)}}">{{$category->name}}</a>
                                            <ul class="dropdown">
                                                @foreach($category->childs as $categoryChild)
                                                    <li><a href="{{route('front.category_product', $categoryChild->slug)}}">{{$categoryChild->name}}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>

                            <li class="menu-item-has-children "><a href="#">Blog</a>
                                <ul class="dropdown">
                                    @foreach($postCategories as $postCategory)
                                        <li><a href="{{route('front.news', $postCategory->slug)}}">{{$postCategory->name}}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                            <li><a href="{{route('front.about')}}">Về chúng tôi</a></li>
                            <li><a href="{{route('front.contact')}}">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->

</header>
<!--  Header Start -->


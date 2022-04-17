<div class="shop-sidebar-wrap">
    <div class="shop-box-area">

        <!--sidebar-categores-box start  -->
        <div class="sidebar-categores-box shop-sidebar mb-30">
            <h4 class="title">Danh mục</h4>
            <!-- category-sub-menu start -->
            <div class="category-sub-menu">
                <ul>
                    @foreach($categories as $cate)
                        <li class="{{count($cate->child_categories) > 0 ? 'has-sub' : ''}}" ><a
                                style="padding-bottom: 10px; padding-top: 10px; line-height: 14px "
                                href="{{route('front.category_product', $cate->slug)}}">{{$cate->name}} ({{$cate->products_count}})</a>
                            <ul>
                                @foreach($cate->child_categories as $child_category)
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
        <div class="shop-sidebar mb-30">
            <h4 class="title">Tags</h4>

            <ul class="sidebar-tag">
                @foreach($tags as $tag)
                    <li><a href="{{route('front.search')}}?keyword={{($tag->name)}}">{{$tag->name}}</a></li>
                @endforeach
            </ul>

        </div>
        <!-- shop-sidebar end -->

    </div>
</div>

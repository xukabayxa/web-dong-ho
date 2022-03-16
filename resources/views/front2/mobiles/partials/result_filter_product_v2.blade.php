<section class="ctgr_prduc_home">
    <div class="container">
        <div class="heading">
            <div class="flexBet">
                <h3>{{$category->name}}</h3>
                <a class="cpro-view-all" href="{{route('Category', $category->slug)}}" rel="nofollow">Xem tất cả</a>
            </div>
        </div>
        <div class="row-5">
            <ul class="fixul list_item_prd">
                @forelse($category->products as $product)
                <li class="col-xs-6 col-xs-6-5">
                    <div class="item">
                        <div class="thumbnail-prd">
                            <a href="{{route('Product', $product->slug)}}" class="hm-responsive" title="{{$product->name}}">
                                <img src="{{$product->image->path ?? asset('site/image/no-image.png')}}" alt="{{$product->name}}">
                            </a>
                        </div>
                        <div class="info_item">
                            <h3><a href="{{route('Product', $product->slug)}}" title="">{{$product->name}}</a></h3>
                            <div class="brand_pro_img">

                                <a href="{{route('Category', ['parent_slug' => $category->slug, 'code_manufacturer' => $product->manufacturer->code])}}">
                                    <img alt="{{$product->manufacturer->name}}" src="{{$product->manufacturer->image->path ?? asset('site/image/no-image.png')}}">
                                </a>

                            </div>


                            <div class="pricebuy flexBet">

                                @if($product->base_price)
                                <span class="priceOld">{{number_format($product->base_price)}}đ</span>
                                <span class="prsale">(-{{round(($product->base_price - $product->price)/$product->base_price *100)}}%)</span>
                                @endif

                                <strong>{{number_format($product->price)}}đ</strong>

                            </div>

                        </div>
                    </div>
                </li>
                @empty
                    <span style="padding-top: 120px"><i>Chưa có sản phẩm</i></span>
                @endforelse

            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</section>


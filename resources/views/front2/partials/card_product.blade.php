<div class="cate_pro_top">
    <figure>

        <a href="{{$product->link}}"
           title="{{$product->name}}">
            <img class="owl-lazy"
                 src="{{$product->image->path}}"
                 data-src="{{$product->image->path}}"
                 alt="{{$product->name}}"
                 title="{{$product->name}}">
        </a>
    </figure>
    <h3><a href="{{$product->link}}"
           title="{{$product->name}}">{{$product->name}}</a>
    </h3>
</div>
<div class="cate_pro_title">

    <a href="{{route('Category', ['parent_slug' => $cate->slug, 'code_manufacturer' => $product->manufacturer->code])}}">
        <img alt="{{$product->manufacturer->name}}" title="{{$product->manufacturer->name}}"
             src="{{$product->manufacturer->image->path ?? asset('site/image/no-image.png')}}">
    </a>

</div>
<div class="cate_pro_bot">

    <p class="price-now">{{number_format($product->price)}}đ</p>
    @if($product->base_price)
        <p>
            <span>{{number_format($product->base_price)}}đ</span>

            <span class="cate_pro_bot-saleof">(-{{round(($product->base_price - $product->price)/$product->base_price *100)}}%)</span>
        </p>
    @endif
</div>

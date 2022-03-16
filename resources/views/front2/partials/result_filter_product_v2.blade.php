<section class="box-category">

    <div class="sub_header">
        <h2 class="title">
            <a href="{{route('Category', $category->slug)}}" title="{{$category->name}}">{{$category->name}}</a>
        </h2>
        @if(@$cate)
        {{--                lấy thương hiệu của 1 cate(cate cha)--}}
        @foreach($cate->manufacturers as $manu)
            <a class="select" href="{{route('Category', ['parent_slug' => $category->slug, 'code_manufacturer' => $manu->code])}}" title="{{$manu->name}}">

                <img src="{{($manu->image ? $manu->image->path : '')}}" />
{{--                {{$manu->name}}--}}
            </a>
        @endforeach
        @else
            @foreach($category->manufacturers as $manu)
                <a class="select" href="{{route('Category', ['parent_slug' => $category->slug, 'code_manufacturer' => $manu->code])}}" title="{{$manu->name}}">
                    <img src="{{($manu->image ? $manu->image->path : '')}}" />
{{--                    {{$manu->name}}--}}
                </a>
            @endforeach
        @endif
        <a class="select view-all" href="{{route('Category', $category->slug)}}" title="Xem tất cả">Xem tất cả</a>
    </div>

    <ul class="list_product_featured ">

        @forelse($category->products as $product)
            <li>
                @include('front2.partials.card_product', ['product' => $product, 'cate' => $product->category])
            </li>
        @empty
            <div style="height: 50px; line-height: 50px; text-align: left; padding-left: 10px">
                <span><i><b>Chưa có sản phẩm</b></i></span>
            </div>
        @endforelse
    </ul>
</section>

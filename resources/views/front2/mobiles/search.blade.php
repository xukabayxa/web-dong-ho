@extends('front2.mobiles.layouts.master')

@section('content')

    <div>
        @include('front2.partials.bread_crumb', ['url' => '', 'title' => 'Tìm kiếm'])

        <div class="sub_header_hot">
            <h3 class="title" style="font-size: 18px"><a href="javascript:void(0)" rel="nofollow">Kết quả tìm kiếm với từ khóa "{{$keyword}}"</a>
            </h3>
        </div>

        <section class="ctgr_prduc_home">
            <div class="container">
                <div class="row-5">
                    <ul class="fixul list_item_prd list-products">

                        @foreach($products as $product)
                        <li class="col-xs-6 col-xs-6-5">
                            <div class="item">
                                <div class="thumbnail-prd">
                                    <a href="{{route('Product', $product->slug)}}" class="hm-responsive" title="{{$product->name}}">
                                        <img src="{{$product->category->image->path ?? asset('site/image/no-image.png')}}" alt="{{$product->name}}">
                                    </a>
                                </div>
                                <div class="info_item">
                                    <h3><a href="{{route('Product', $product->slug)}}" title="">{{$product->name}}</a></h3>
                                    <div class="brand_pro_img">

                                        <a href="{{route('Category', ['parent_slug' => $product->category->slug, 'code_manufacturer' => $product->manufacturer->code])}}">
                                            <img alt="Bosch" src="{{$product->manufacturer->image->path ?? asset('site/image/no-image.png')}}">
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
                        @endforeach

                    </ul>

                    <div class="clearfix"></div>
                </div>
            </div>
        </section>

    </div>


@endsection
@push('scripts')
    <script>
    </script>
@endpush

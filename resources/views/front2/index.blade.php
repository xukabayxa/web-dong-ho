@extends('front2.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <section class="banner-top">
                <div class="slide-banner">

                    <div id="banner-img" class="owl-carousel owl-theme">
                        @foreach($bannersLeft as $bannerLeft)
                            <div class="item">
                                <a href="{{$bannerLeft->link}}" title="{{$bannerLeft->title}}">
                                    <img class="owl-lazy"
                                         data-src="{{$bannerLeft->image->path ?? asset('site/image/no-image.png')}}"
                                         alt="{{$bannerLeft->title}}"></a>
                            </div>
                        @endforeach
                    </div>

                    <div id="banner-txt" class="owl-carousel owl-theme">
                        @foreach($bannersLeft as $bannerLeft)
                            <div class="item">
                                <h3>{{$bannerLeft->title}}</h3>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="big-bn-right">
                    <aside class="homenews">
                        <h2><a href="">Chương trình khuyến mãi</a></h2>
                    </aside>
                    <ul>
                        @foreach($bannersRight as $bannerRight)
                            <li class="bannerHome">
                                <a href="{{$bannerRight->link}}" title="{{$bannerRight->title}}" target="_blank"
                                   rel="nofollow">
                                    <img alt="{{$bannerRight->title}}"
                                         src="{{$bannerRight->image->path ?? asset('site/image/no-image.png')}}">
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            @forelse($categorySpecial as $c_special)
                @if($c_special->products()->count() > 0)
                    <section class="box-category">
                        <div id="box_pro_special">
                            <div class="sub_header_hot">
                                <h2 class="title">
                                    <a href="#">{{$c_special->name}}</a>
                                </h2>
                            </div>
                            <ul class="list_product_featured owl-carousel owl-theme">
                                @foreach($c_special->products as $product)
                                    <li>
                                        @include('front2.partials.card_product', ['product' => $product, 'cate' => $product->category])
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </section>
                @endif
            @empty
            @endforelse

            @foreach($categories as $category)
                @include('front2.partials.result_filter_product_v2', ['category' => $category])
            @endforeach
        </div>
    </div>
@endsection

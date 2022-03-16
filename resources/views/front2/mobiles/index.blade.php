@extends('front2.mobiles.layouts.master')

@section('content')

        <section class="slidemain">
            <ul class="slide-home owl-carousel owl-theme">
                @foreach($bannersLeft as $bannerLeft)
                            <li>
                                <a href="{{$bannerLeft->link}}">
                                    <img src="{{$bannerLeft->image->path ?? asset('site/image/no-image.png')}}"
                                         alt="{{$bannerLeft->name}}">
                                </a>
                            </li>
                @endforeach


                <div class="owl-nav disabled">
                    <button type="button" role="presentation" class="owl-prev"><span aria-label="Previous">‹</span>
                    </button>
                    <button type="button" role="presentation" class="owl-next"><span aria-label="Next">›</span></button>
                </div>


                <div class="owl-dots">
                    @for($i=1; $i<=count($bannersLeft); $i++)
                    <button role="button" class="owl-dot"><span></span></button>
                    @endfor
                </div>
            </ul>
        </section>

        <section class="slidemain2">
                    <ul class="slide-cate">

                        @foreach($bannersRight->take(2) as $bannerRight)

                        <li class="item-banner-cate">
                            <a href="{{$bannerRight->link}}">
                                <img src="{{$bannerRight->image->path ?? asset('site/image/no-image.png')}}" alt="{{$bannerRight->title}}">
                            </a>
                        </li>

                        @endforeach

                    </ul>
                </section>

        <section class="categoryhome">
                    <div class="">
                        <div class="listctgr">
                            @foreach($productCategories as $category)
                            <a href="{{route('Category', $category->slug)}}">
                                <div class="category-card__image">
                                    <img src="{{$category->image->path ?? asset('site/image/no-image.png')}}" alt="">
                                </div>
                                <div class="category-card__name ">
                                    <strong>
                                       {{$category->name}}
                                    </strong>
                                </div>
                            </a>
                            @endforeach
                        </div>
                    </div>
        </section>

        @foreach($categories as $category)
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

                                @foreach($category->products->take(2) as $product)
                                <li class="col-xs-6 col-xs-6-5">
                                    <div class="item">
                                        <div class="thumbnail-prd">
                                            <a href="{{route('Product', $product->slug)}}" class="hm-responsive"
                                               title="{{$product->name}}">
                                                <img
                                                    src="{{$product->image->path ?? asset('site/image/no-image.png')}}"
                                                    alt="{{$product->name}}">
                                            </a>
                                        </div>
                                        <div class="info_item">
                                            <h3><a href="{{route('Product', $product->slug)}}"
                                                   title="">{{$product->name}}</a></h3>
                                            <div class="brand_pro_img">

                                                <a href="">
                                                    <img alt="{{$product->manufacturer->name}}"
                                                         src="{{$product->manufacturer->image->path ?? asset('site/image/no-image.png')}}">
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
                @endforeach

        @foreach($postCategorySpecial as $post_category)
            @if(count($post_category->posts))
                <section class="newhome">
                    <div class="container">
                        <h3 class="titless"><a href="" title="Khuyến mãi">{{$post_category->name}}</a></h3>
                        <ul class="fixul listnewhome">
                            @foreach($post_category->posts as $post)
                            <li>
                                <div class="media">
                                    <div class="media-left">
                                        <a href="{{route('Post.detail', $post->slug)}}"
                                           title="{{$post->name}}">
                                            <img src="{{$post->image->path ?? ''}}"
                                                 alt="{{$post->name}}">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="media-heading"><a
                                                href="{{route('Post.detail', $post->slug)}}"
                                                title="{{$post->name}}">{{$post->name}}</a></h4>
                                        <p class="datepost">{{\Carbon\Carbon::parse($post->created_at)->format('d-m-Y H:i')}}</p>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="text-center mt10">
                            <a href="{{route('postCategory', $post_category->slug)}}" class="axemthem" rel="nofollow">Xem thêm tin khác</a>
                        </div>
                    </div>
                </section>
            @endif
        @endforeach


@endsection

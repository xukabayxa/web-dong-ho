@extends('layouts.master_front')

@section('page_title')
Trang chủ
@endsection


@section('content')
<section id="block-banner">
    {!! printBlock(1) !!}
</section>
<section id="first-title" class="clearfix">
    <div class="container">
        <h2 class="h2-custom-title">
            <strong style="display: block">Sản phẩm</strong> và
            <strong>Dịch vụ nổi bật</strong>
        </h2>
        <div class="sub-text-title">
            {!! printBlock(6) !!}
        </div>
        <img src="{{ asset('img/icons/sea-waves.webp') }}" alt="" style="margin: 25px 0">
    </div>
</section>

<section id="home-categories">
    <div class="container">
        <div class="row">
            @foreach(App\Model\Admin\Category::with(['image'])->where('parent_id',0)->orderBy('sort_order','asc')->get() as $row)
            <div class="text-center col-sm-4 category-item">
                <div class="category-item-inner">
                    <div class="category-inner-wrap">
                        <div class="text-center category-item-img">
                            <img src="{{ $row->image ? $row->image->path : '' }}" alt="">
                        </div>
                        <h4 style="text-align: left" class="category-heading text-blue">{{ $row->name }}</h4>
                        <div class="category-infos">
                            <div class="infos-wrap">
                                <div>
                                    <p class="text-gray-product">{{ $row->short_des }}</p>
                                    <p>
                                        <a class="view-more" href="{{ route('Category',[$row->slug]) }}">
                                            Chi tiết
                                            <img src="{{ asset('img/icons/arrow.svg') }}" alt="Arrow" width="30" height="30"><br>
                                        </a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<section id="solutions">
    <div class="container">
        <div class="solution-introduct">
            <div class="ltf-text">
                <div id="box-solutions" class="content-business-solutions">
                    {!! printBlock(7) !!}
                </div>
            </div>
            <div class="rtf-img">
                <img src="img/blocks/img-business-img-1.jpg" alt="">
            </div>
        </div>
    </div>
</section>
<section id="institutional-banner">
    <div class="container">
        <div class="banner-text-block">
            <h2 class="banner-title"><strong>Celebrating 85 Years</strong><br>Of Service, Innovation and Expertise</h2>
            <div class="text-holder">
                <p class="banner-description">We’re proud to celebrate nearly a century as your trusted source for providing better water for a better world.</p>
                <p><a class="view-more" href="#">Chi tiết</a></p>
            </div>
        </div>
    </div>
</section>
<section id="first-title" class="clearfix">
    <div class="container">
        <h2 class="h2-custom-title">
            <strong style="display: block">Tại sao</strong> Chọn mua tại
            <strong>Lợi Toán</strong>
        </h2>
        <div class="sub-text-title">
            {!! printBlock(8) !!}
        </div>
        <img src="{{ asset('img/icons/sea-waves.webp') }}" alt="" style="margin: 25px 0">
    </div>
</section>
<section id="home-ads" class="clearfix">
    <div class="container">
        <div class="row">
            <div class="col-md-4 item-ads">
                <div class="item-ads-inner">
                    <div class="ads-text">
                        <div class="counter counter_vertical">
                            <div class="icon_wrapper"></div>
                            <div class="desc_wrapper">
                                <div class="number-wrapper"><span class="number">24</span><span class="label postfix">%</span></div>
                            </div>
                        </div>

                        <div class="ads-text-detail">
                            <p class="text">in energy savings* by using softened cool water to wash clothes</p>
                            <p class="small-text"><small>*Water Quality Research Foundation / Batelle Memorial Institute</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 item-ads">
                <div class="item-ads-inner">
                    <div class="ads-text">
                        <div class="counter counter_vertical">
                            <div class="icon_wrapper"></div>
                            <div class="desc_wrapper">
                                <div class="number-wrapper"><span class="number">24</span><span class="label postfix">%</span></div>
                            </div>
                        </div>

                        <div class="ads-text-detail">
                            <p class="text">in energy savings* by using softened cool water to wash clothes</p>
                            <p class="small-text"><small>*Water Quality Research Foundation / Batelle Memorial Institute</small></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 item-ads">
                <div class="item-ads-inner">
                    <div class="ads-text">
                        <div class="counter counter_vertical">
                            <div class="icon_wrapper"></div>
                            <div class="desc_wrapper">
                                <div class="number-wrapper"><span class="number">24</span><span class="label postfix">%</span></div>
                            </div>
                        </div>

                        <div class="ads-text-detail">
                            <p class="text">in energy savings* by using softened cool water to wash clothes</p>
                            <p class="small-text"><small>*Water Quality Research Foundation / Batelle Memorial Institute</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="institutional-banner" style="margin: 25px 0">
    <div class="container">
        <div class="banner-text-block">
            {!! printBlock(9) !!}
        </div>
    </div>
</section>
<section id="reviews">
    <div class="container">
        <div class="review-container row">
            @foreach($reviews as $row)
            <div class="col-sm-12 col-md-4 review-item">
                <div class="review-inner">
                    <div class="review-wrap">
                        <div class="review-text">
                            <div class="testimonial-text-block">
                                <p class="testimonial-text">“{{ $row->message }}”</p>
                                <p><small class="text-secondary-blue author">{{ $row->name }}</small></p>
                            </div>
                        </div>

                        <div class="stars">
                            <div class="star filled"></div>
                            <div class="star filled"></div>
                            <div class="star filled"></div>
                            <div class="star filled"></div>
                            <div class="star filled"></div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
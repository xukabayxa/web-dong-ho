@extends('front2.mobiles.layouts.master')
@section('css')
    <link type="text/css" href="/site/css/glasscase.min.css?v=637741327681511178" rel="stylesheet"/>
@endsection
@section('content')

    <section class="slidemain2">
        <ul class="slide-cate">

            @foreach($bannersRight->take(2) as $banner)
                <li class="item-banner-cate">
                    <a href="{{$banner->link}}">
                        <img src="{{$banner->image->path ?? asset('site/image/no-image.png')}}"
                             alt="{{$banner->title}}">
                    </a>
                </li>
            @endforeach

        </ul>
    </section>


@include('front2.partials.bread_crumb', ['type' => 'product_detail', 'url' => route('Category', $cate->slug),
                   'title' => $cate->name, 'url2'  => route('Product', $product->slug), 'title2' => $product->name ]);

<section itemscope="" itemtype="http://schema.org/Product" class="boxinfo_detail">
    <div class="container">
        <div class="wp-img-zoom">
                <ul id='zoom1' class='gc-start'>

                    <li><img src="{{$product->image->path ?? asset('site/image/no-image.png')}}" title="{{$product->name}}" alt="{{$product->name}}"/></li>
                    @foreach($product->galleries as $gallery)
                        <li>
                            <img
                                src="{{$gallery->image->path ?? asset('site/image/no-image.png')}}"
                                title="{{$product->name}}"
                                alt="{{$product->name}}">
                        </li>
                    @endforeach
                </ul>

        </div>

        <h1 itemprop="name" class="bk-product-name nameDetail">{{$product->name}}</h1>
        <meta itemprop="description" content="">
        <meta itemprop="sku" content="">
        <div itemscope="" itemprop="brand" itemtype="http://schema.org/Thing">
            <meta itemprop="name" content="Lorca">
        </div>
        <div itemscope="" itemprop="aggregateRating" itemtype="http://schema.org/AggregateRating">
            <meta itemprop="reviewCount" content="1361">
            <meta itemprop="ratingValue" content="4.9">
        </div>
        <div class="control03">
            <p>{{$product->short_des}}</p>
        </div>
        <div class="control01 flexBet">
            <i class="s s5"></i>
            <div></div>
        </div>
        <div class="control02">
            @if($product->base_price)
                <div class="price01 flexLeft mb10">

                    <span class="labelprice">Giá niêm yết:</span>
                    <p>
                        <span class="spanPriceOld">{{number_format($product->base_price)}}đ</span>
                        <span class="prsale">(-{{round(($product->base_price - $product->price)/$product->base_price *100)}}%)</span>
                    </p>

                </div>
            @endif

            <div class="price02 flexLeft mb10">
                <span class="labelprice">Giá bán:</span>
                <p>

                    <span class="spanPricebuy bk-product-price">{{number_format($product->price)}}đ</span>

                </p>
            </div>

            <div class="box-proside box-gift">

            </div>

        </div>

        <hr>

        <div class="box-pd">
{{--            <div class="box_support">--}}
{{--                <p class="hotline">CHƯƠNG TRÌNH KHUYẾN MÃI</p>--}}
{{--                <p class="value">Giảm tới 15%</p>--}}
{{--                <div class="product-call-requests">--}}
{{--                    <label class="ty-control-group__title">--}}
{{--                        <input class="ty-input-text-full cm-number" id="PhoneRegister" size="50" type="tel"--}}
{{--                               maxlength="11" autocomplete="off" minlength="8" name=""--}}
{{--                               placeholder="Nhập số điện thoại " value="">--}}
{{--                    </label>--}}
{{--                    <div class="ty-btn ty-btn cm-call-requests"><a href="javascript:void(0)"--}}
{{--                                                                   onclick="getPhone();">Đăng ký ngay</a>--}}
{{--                    </div>--}}
{{--                    <span class="call-note">Chúng tôi sẽ gọi lại cho quý khách</span>--}}

{{--                </div>--}}
{{--            </div>--}}

            <div class="shockbuttonbox">
                <a href="tel: 0986083083" class="buy_ins contact-detail"><b>Liên hệ trực tiếp
                        {{$config->zalo}}</b> <span>(Để có giá tốt nhất)</span> </a>
{{--                <a href="javascript:void(0)" class="buy_ins ks-detail" data-toggle="modal"--}}
{{--                   data-target="#modal-khaosat"><b>Khảo sát - Tư vấn lắp đặt tại nhà </b><span>(Miễn phí 100%)</span>--}}
{{--                </a>--}}

                <a href="javascript:void(0)" class="buy_now buy_ins buy-detail" data-id="{{$product->id}}"
                   data-returnpath="" rel="nofollow"><b>Mua ngay</b> <span>(Xem hàng, không mua không sao)</span>
                </a>
{{--                <div class="bk-btn">--}}
{{--                    <button class="bk-btn-installment"--}}
{{--                            style="display: inline-block;background-color: #288ad6 !important;color: #fff !important"--}}
{{--                            type="button"><strong>Trả góp qua thẻ</strong><span>Visa, Master, JCB</span>--}}
{{--                    </button>--}}
{{--                </div>--}}
            </div>
        </div>
        <div class="whotline">
            <li><a href="tel:02433100100">
                    <span>Tổng đài tư vấn (8:00 - 19:00)</span>
                    <p class="tdtv">{{$config->phone_switchboard}}</p>
                </a>
            </li>
            <li><a href="tel:0986083083">
                    <span>Hotline (24/7)</span>
                    <p class="hotline">{{$config->hotline}}</p>
                </a>
            </li>
        </div>
        <div class="chinhsach xhtn">
            <ul class="fixul">
                <li><i class="fa fa-check-circle-o"></i>Cam kết<br>
                    chính hãng
                </li>
                <li><i class="fa fa-line-chart"></i>Đổi trả trong<br>
                    30 ngày
                </li>
                <li><i class="fa fa-truck"></i>Giao hàng toàn quốc<br>
                    giao hàng
                </li>
                <li><i class="fa fa-money"></i>Thanh toán khi<br>
                    nhận hàng
                </li>
            </ul>
        </div>
    </div>
</section>

<section class="contentDetail">
    <div class="boxCt">
        <div class="description-title">Thông tin chi tiết</div>
        <div class="description-content" style="background-color: whitesmoke">
            {!! $product->body !!}

        </div>
        <div class="show-more">
            <a href="javascript:void(0)" class="readmore" id="js-show-more">Xem thêm </a>
        </div>
    </div>
    <div class="boxCt">
        <div class="attribute-title">Thông số kỹ thuật</div>
        <div class="attribute-content">

            <table border="0" cellpadding="0">
                <tbody>
                <tr>
                    <td>
                        <p>Tên sản phẩm</p>
                    </td>
                    <td>
                        <p>:&nbsp;{{$product->name}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="">
                        <p>H&atilde;ng sản xuất</p>
                    </td>
                    <td style="height:21px; width:202px">
                        <p>{{$product->manufacturer->name ?: ''}}</p>
                    </td>
                </tr>
                <tr>
                    <td style="">
                        <p>Xuất xứ</p>
                    </td>
                    <td style="height:21px; width:202px">
                        <p>{{$product->origin->name ?: ''}}</p>
                    </td>
                </tr>
                @foreach($product->attributeValues as $attribute)
                    <tr>
                        <td style="">
                            <p>{{$attribute->name}}</p>
                        </td>
                        <td style="">
                            <p>{{$attribute->pivot->value}}</p>
                        </td>
                    </tr>
                @endforeach
                </tbody>

            </table>

        </div>

    </div>


</section>


<section class="ctgr_prduc_home">
    <div class="container">
        <div class="heading">
            <div class="boxCt">
            <div class="attribute-title">Sản phẩm tương tự</div>
            </div>
        </div>
        <div class="row-5">
            <ul class="fixul list_item_prd">
                @forelse($relate_products as $relate_product)
                    <li class="col-xs-6 col-xs-6-5">
                        <div class="item">
                            <div class="thumbnail-prd">
                                <a href="{{route('Product', $relate_product->slug)}}" class="hm-responsive"
                                   title="{{$relate_product->name}}">
                                    <img src="{{$relate_product->image->path}}"
                                         alt="{{$relate_product->name}}">
                                </a>
                            </div>
                            <div class="info_item">
                                <h3><a href="{{route('Product', $relate_product->slug)}}"
                                       title="{{$relate_product->name}}">{{$relate_product->name}}</a></h3>
                                <div class="brand_pro_img">

                                    <a href="{{route('Category', ['parent_slug' => $product->category->slug, 'code_manufacturer' => $product->manufacturer->code])}}">
                                        <img alt="{{$product->manufacturer->name}}"
                                             src="{{$product->manufacturer->image->path ?? asset('site/image/no-image.png')}}">
                                    </a>

                                </div>

                            </div>
                        </div>
                    </li>
                @empty
                    <p>Chưa có sản phẩm nào</p>
                @endforelse
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>
</section>
<div class="modal fade" id="modal-khaosat" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <div class="wp-content-danhgia">
                    <div class="row">
                        <div class="col-md-6 hidden-sm hidden-xs">
                            <div class="wp-left-xemtainha">
                                <p class="h1 h1-title-xtn"></p>
                                <div class="img-xtn">
                                    <img
                                        src=""
                                        alt="">
                                </div>
                                <div class="top-box-img">
                                    <div class="wp-gia-km">
                                        <span>Giá KM:<b>10.800.000 đ</b></span>
                                    </div>

                                    <div class="wp-gia-ny">
                                        <span>Giá niêm yết: 13.800.000 đ</span>
                                    </div>
                                    <div class="wp-tiet-kiem">
                                        <span>Tiết kiệm: 3.000.000 đ</span>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="wp-form-dk-popup wp-right-xemtainha wp-right-khaosat">
                                <h3 class="h3-title">Khảo
                                    sát<span>Tư vấn lắp đặt tại nhà - miễn phí 100%</span></h3>
                                <form name="reg_survey">
                                    <div class="form-dk-ct">
                                        <div class="wp-input wp-input1 form-group">
                                            <input id="Name_Survey" name="Name_Survey" type="text"
                                                   placeholder="Họ và tên" class="form-control">
                                        </div>
                                        <div class="wp-input wp-input2 form-group">
                                            <input id="Phone_Survey" name="Phone_Survey" type="text"
                                                   placeholder="Số điện thoại" class="form-control">
                                        </div>
                                        <div class="wp-input wp-input3 form-group">
                                            <input id="Address_Survey" name="Address_Survey" type="text"
                                                   placeholder="Địa chỉ" class="form-control">
                                        </div>
                                        <div class="wp-button">
                                            <a href="javascript:void(0)" type="button" onclick="regSurvey()"
                                               class="btn btn-submit">ĐĂNG KÝ NGAY</a>
                                        </div>
                                        <p class="text-center" style="padding-top: 5px;">Cam kết mọi thông
                                            tin đều được bảo mật</p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="loading"><i class="icon">Loading</i></div>



@endsection
@push('scripts')

    <script type="text/javascript" src="/site/js/jquery.glasscase.min.js?v=637741327701510574"></script>
    <script type="text/javascript" src="/site/js/bk_plus_v2.popup.js"></script>
    <script type="text/javascript" src="/site/js/owl.carousel.min.js?v=637741327702448618"></script>
    <script type="text/javascript" src="/site/js/home.ajax.js?v=637746664537278883"></script>
    <script type="text/javascript" src="/site/js/modernizr.custom.js?v=637741327702291956"></script>
    <script type="text/javascript" src="/site/js/jquery.glasscase.min.js?v=637741327701510574"></script>
    <script type="text/javascript" src="/site/js/sticky-sidebar.js?v=637744950109166877"></script>
    <script type="text/javascript">
    </script>
    <script>
        $(".buy-detail").on('click',function (e) {
            e.preventDefault();
            $.ajax({
                type: 'POST',
                url: "{{route('cart.add.item', $product->id)}}",
                headers: {
                    'X-CSRF-TOKEN': "{{csrf_token()}}"
                },
                success: function(response) {
                    if (response.success) {
                        window.location.href = "/gio-hang";
                    }
                },
                error: function(e) {
                },
            });
        })
    </script>
@endpush

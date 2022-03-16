@extends('front2.layouts.master')
@section('css')
    <link type="text/css" href="/site/css/glasscase.min.css?v=637741327681511178" rel="stylesheet"/>
@endsection
@section('content')
    <div class="container" ng-controller="ProductDetail">
        <div class="row">
            @include('front2.partials.bread_crumb', ['type' => 'product_detail', 'url' => route('Category', $cate->slug),
                    'title' => $cate->name, 'url2'  => route('Product', $product->slug), 'title2' => $product->name ]);

            <input type="hidden" id="ProductID" value="28894"/>
            <img class="bk-product-image hidden"
                 src="{{$product->image->path}}"
                 data-src=""/>

            <section class="eurocook-page-view">
                <div class="product-detail-block">
                    <div class="row">
                        <div class="col-md-5">
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

                            <div class="box-proside box-gift">
{{--                                <aside>--}}
{{--                                    <p>Quà khuyến mãi</p>--}}

{{--                                    <div class="imgpromotion">--}}
{{--                                        <a href="javascript:void(0)">--}}
{{--                                            <img--}}
{{--                                                src="https://beptot.vn/bep-dien-domino-bosch-hmhpkf375v14e.html/Data/ResizeImage/images/adv/10569106_846093875400964_7585170393470138753_nx100x100x4.jpg"--}}
{{--                                                alt="Bộ nồi từ Fivestar 5 chiếc " width="50" height="50">--}}
{{--                                            <h3>Tặng Bộ nồi từ Fivestar 5 chiếc </h3>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </aside>--}}

                            </div>


                        </div>

                        <div class="col-md-4">
                            <div class="productdecor-details">
                                <h1 itemprop="name" class="bk-product-name">{{$product->name}}</h1>
                                <div class="rating-sets">
                                    <ul class="rating-result">
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star"></i></li>
                                        <li><i class="fa fa-star none"></i></li>
                                    </ul>
                                    <a href="/">(Xem <span>17</span> đánh giá)</a>
                                </div>

                                <div class="productdecor-price">
                                    <strong class="price">
                                        <span class="bk-product-price">{{number_format($product->price)}}đ</span>
                                        @if($product->base_price)
                                            <del>            <span class="cate_pro_bot-saleof">(-{{round(($product->base_price - $product->price)/$product->base_price *100)}}%)</span>


                                        @endif
                                    </strong>
                                </div>

                                <div class="box-proside">
                                    <strong>Đặc điểm nổi bật</strong>
                                    <p>{{$product->short_des}}</p>
                                </div>
                                <div class="box-pd">

                                    <div class="shockbuttonbox">
                                        <a href="tel: 0986083083" class="buy_ins contact-detail"><b>Liên hệ trực tiếp
                                                {{$config->zalo}}</b> <span>(Để có giá tốt nhất)</span> </a>
{{--                                        <a href="javascript:void(0)" class="buy_ins ks-detail" data-toggle="modal"--}}
{{--                                           data-target="#modal-khaosat"><b>Khảo sát - Tư vấn lắp đặt tại nhà </b><span>(Miễn phí 100%)</span>--}}
{{--                                        </a>--}}

                                        <a href="" class="buy-detail buy_now buy_ins" data-id="{{$product->id}}"
                                            ><b>Mua
                                                ngay</b> <span>(Xem hàng, không mua không sao)</span> </a>
                                        <div class="bk-btn"></div>
                                    </div>
                                </div>

                                <div class="whotline">
                                    <li>
                                        <span>Tổng đài tư vấn (8:00 - 19:00)</span>
                                        <p class="tdtv">{{$config->phone_switchboard}}</p>
                                    </li>
                                    <li>
                                        <span>Hotline (24/7)</span>
                                        <p class="hotline">{{$config->hotline}}</p>
                                    </li>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="why-buy hidden-xs">
                                <label>Tại sao mua hàng tại GiaDaiLy ?</label>
                            </div>
                            <div class="wsupport-s">
                                <li>
                                    <i class="akr-icon_Security"></i>
                                    <p>
                                        Cam kết<br>
                                        giá tốt nhất

                                    </p>
                                </li>
                                <li>
                                    <i class="akr-icon_Return"></i>
                                    <p>
                                        Nhận đổi trả<br>
                                        trong 30 ngày

                                    </p>
                                </li>
{{--                                <li>--}}
{{--                                    <i class="fa fa-wrench" aria-hidden="true"></i>--}}
{{--                                    <p>--}}
{{--                                        Bảo trì vĩnh viễn<br>--}}
{{--                                        trọn đời máy--}}

{{--                                    </p>--}}
{{--                                </li>--}}
{{--                                <li>--}}
{{--                                    <i class="akr-icon_Warranty2"></i>--}}
{{--                                    <p>--}}
{{--                                        Miễn phí lắp đặt<br>--}}
{{--                                        tại Hà Nội--}}
{{--                                    </p>--}}
{{--                                </li>--}}
                                <li>
                                    <i class="akr-Delivery"></i>
                                    <p>
                                        Giao hàng<br>
                                        toàn quốc
                                    </p>
                                </li>
                                <li>
                                    <i class="akr-icon_Cash"></i>
                                    <p>
                                        Thanh toán<br>
                                        khi nhận hàng
                                    </p>
                                </li>
                            </div>
                            <div class="map-bt list-showroom-detail">
                                <label>Hệ thống siêu thị:</label>
                                @foreach($stores as $s)
                                <p class="item-showroom ">
                                    <i class="fa fa-map-marker"></i>{{$s->name}}<br/>
                                    <span>{{$s->address}}</span>
                                </p>
                                @endforeach

                            </div>

                        </div>
                    </div>
                </div>

                <div class="box-category">
                    <div class="sub_heading">
                        <div class="icon">
                            <i class="fa fa-star-o"></i>
                            <h2>Sản phẩm tương tự</h2>
                        </div>
                    </div>

                    <ul class="list_product_featured product-cate owl-carousel owl-theme">
                        @forelse($relate_products as $relate_product)
                            <li>
                                @include('front2.partials.card_product', ['product' => $relate_product, 'cate' => $product->category])
                            </li>
                        @empty
                            <p>Chưa có sản phẩm nào</p>
                        @endforelse

                    </ul>

                </div>

                <div class="box_content_view">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="wp-post-thongso">
                                <div class="bg-article expand js-content">

                                   {!! $product->body !!}

                                </div>
                                <div class="show-more">
                                    <a href="javascript:void(0)" id="js-show-more">Xem Thêm Nội Dung</a>
                                </div>

                                <div class="sp-khuyenmai">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="left-km">
                                                <a href="#">
                                                    <img
                                                        src="{{$product->image->path}}"
                                                        alt=""></a>
                                                <div class="text-11">
                                                    <h4 class="h4-title"><a
                                                            href="{{route('Product', $product->slug)}}">{{$product->name}}</a></h4>
                                                    <div class="productdecor-price">
                                                        <strong class="price">
                                                            <span>{{number_format($product->price)}}đ</span>
                                                            @if($product->base_price)
                                                            <del><span>{{number_format($product->base_price)}} đ</span></del>
                                                            @endif
                                                        </strong>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="btn-mua-ngay">
                                                <a href="javascript:void(0)" class="buy-detail buy_now btn1 btn" data-id="{{$product->id}}"
                                                   data-returnpath=""
                                                   rel="nofollow">Mua ngay
                                                    <span>Giao tận nơi, không mua không sao</span></a>
                                                <a href="tel: {{$config->zalo}}" class="btn2 btn">Gọi đặt
                                                    mua<span>{{$config->zalo}}</span></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <div class="side-bar-ctsp">
                                <div class="sidebar__inner">
                                    <div class="box-table-thongso">
                                        <h3 class="h3-title-sb-ct">Thông số kỹ thuật</h3>
                                        <div class="table-responsive">
                                            <div style="clear:both;">&nbsp;</div>
                                            <table border="1" cellpadding="0" cellspacing="0" style="width:100%">
                                                <tbody>
                                                <tr>
                                                    <td style="height:17px; width:283px">
                                                        <p>Tên sản phẩm</p>
                                                    </td>
                                                    <td style="height:17px; width:202px">
                                                        <p>{{$product->name}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:21px; width:283px">
                                                        <p>H&atilde;ng sản xuất</p>
                                                    </td>
                                                    <td style="height:21px; width:202px">
                                                        <p>{{$product->manufacturer->name ?: ''}}</p>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="height:21px; width:283px">
                                                        <p>Xuất xứ</p>
                                                    </td>
                                                    <td style="height:21px; width:202px">
                                                        <p>{{$product->origin->name ?: ''}}</p>
                                                    </td>
                                                </tr>

                                                @foreach($product->attributeValues as $attribute)
                                                <tr>
                                                    <td style="height:21px; width:283px">
                                                        <p>{{$attribute->name}}</p>
                                                    </td>
                                                    <td style="height:21px; width:202px">
                                                        <p>{{$attribute->pivot->value}}</p>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                </tbody>
                                            </table>

                                            <div style="clear:both;">&nbsp;</div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
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
                                                    src="https://beptot.vn/bep-dien-domino-bosch-hmhpkf375v14e.html/Data/ResizeImage/images/product/large_bep-dien-domino-bosch-pkf375v14ex500x500x4.jpg"
                                                    alt="Bếp điện DOMINO Bosch HMH.PKF375V14E">
                                            </div>
                                            <div class="top-box-img">
                                                <div class="wp-gia-km">
                                                    <span>Giá KM:<b>18.100.000 đ</b></span>
                                                </div>

                                                <div class="wp-gia-ny">
                                                    <span>Giá niêm yết: 21.300.000 đ</span>
                                                </div>
                                                <div class="wp-tiet-kiem">
                                                    <span>Tiết kiệm: 3.200.000 đ</span>
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


        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="/site/js/jquery.glasscase.min.js?v=637741327701510574"></script>
    <script type="text/javascript" src="/site/js/bk_plus_v2.popup.js"></script>
    <script type="text/javascript" src="/site/js/owl.carousel.min.js?v=637741327702448618"></script>
    <script type="text/javascript" src="/site/js/home.ajax.js?v=637746664537278883"></script>
    <script type="text/javascript" src="/site/js/modernizr.custom.js?v=637741327702291956"></script>
    <script type="text/javascript" src="/site/js/jquery.glasscase.min.js?v=637741327701510574"></script>
    <script type="text/javascript" src="/site/js/sticky-sidebar.js?v=637744950109166877"></script>

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

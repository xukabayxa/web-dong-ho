@extends('site.layouts.master')

@section('css')
    <style>
        .checkout-col {
            text-align: right;
        }
        .post-thumb-checkout {
            max-width: 15%;
            float: left;
        }
        @media only screen and (max-width: 768px) {
            .checkout-col {
                text-align: left;
            }

            .post-thumb-checkout {
                max-width: 30%;
                float: left;
            }
        }
    </style>
@endsection

@section('content')

    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb-list start -->
                    <ul class="breadcrumb-list">
                        <li class="breadcrumb-item"><a href="{{route('front.home_page')}}">Trang chủ</a></li>
                        <li class="breadcrumb-item active">Đặt hàng thành công</li>
                    </ul>
                    <!-- breadcrumb-list end -->
                </div>
            </div>
        </div>
    </div>

    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-pt">
        <div class="container">
            <div class="frequently-questions-area">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title text-center mb-30">
                            <h3>ĐẶT HÀNG THÀNH CÔNG</h3>
                        </div>
                        <div class="your-order-wrap">
                            <div class="payment-method">
                                <div class="payment-accordion">
                                    <!-- ACCORDION START -->
                                    <h5> Mã đơn hàng của bạn: {{$order->code}} <br>
                                        <br>
                                        Bạn vừa mua:
                                    </h5>
                                    <!-- ACCORDION END -->
                                </div>
                                <br>
                                <div class="single-widget mb-30">
                                    <div class="newletter-wrap"></div>
                                    @foreach($order->details as $item)
                                        <div class="recent-post-widget">
                                            <div class="single-widget-post">
                                                <div class="post-thumb-checkout" >
                                                    <?php
                                                    $product = $item->product;
                                                    ?>
                                                    <a href="#"><img
                                                            src="{{$product->image->path ?? '/site/assets/images/blog/small-blog.jpg'}}"
                                                            alt=""></a>
                                                </div>
                                                <div class="post-info">
                                                    <h6 class="post-title" style="font-size: 16px"><a
                                                            href="#">{{$item->qty}} x {{$product->name}}</a></h6>
                                                    <div class="post-date">{{number_format($item->price)}} đ</div>
                                                </div>
                                            </div>

                                        </div>
                                    @endforeach

                                    <div class="payment-accordion">
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="newletter-wrap">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-7 col-md-12">
                                                            <div class="newsletter-title mb-30">
                                                                <h4 style="font-size: 17px">Tổng cộng: </h4>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-5 col-md-7">
                                                            <div class="newsletter-title mb-30 checkout-col">
                                                                <h5>{{number_format($order->details->sum(function ($item) {
                                                                                    return $item->price * $item->qty;
                                                                            }))}} VNĐ</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="newletter-wrap"
                                                     style="border-top: none !important; margin-top: -40px">
                                                    <div class="row align-items-center">
                                                        <div class="col-lg-7 col-md-12">
                                                            <div class="newsletter-title mb-30">
                                                                <h4 style="font-size: 17px">Phương thức thanh
                                                                    toán: </h4>
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-5 col-md-7">
                                                            <div class="newsletter-title mb-30 checkout-col">
                                                                <h5>{{\App\Model\Admin\Order::PAYMENT_METHODS[$order->payment_method]}}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="newletter-wrap">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-12">
                                                            <div class="newsletter-title mb-30" style="text-align: center">
                                                                <h4 style="font-size: 17px">Cảm ơn bạn đã mua hàng Thegioidongho.com. Chúng tôi sẽ xác nhận
                                                                và liên hệ với bạn sớm nhất</h4>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="order-button-payment" style="text-align: center;">
                                    <a href="{{route('front.home_page')}}"><input type="button" value="Tiếp tục mua sắm"></a>
                                </div>
                            </div>
                            <!-- your-order-wrapper start -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->

@endsection
@push('scripts')

@endpush

@extends('front2.layouts.master')

@section('content')

    <div class="container">
        <div class="wrap_cart_suscess">
            <div class="text-center">
                <h2 class="titleThank"><i class="fa fa-check-circle"></i>&nbsp;QUÝ KHÁCH ĐÃ ĐẶT HÀNG THÀNH CÔNG</h2>
                <h3 class="thankyouText">
                    Cảm ơn quý khách đã đặt mua sản phẩm của chúng tôi !
                    <br>
                    Đơn hàng của quý khách sẽ được nhân viên kiểm tra và giao hàng trong thời gian sớm nhất.</h3>
                <div class="flextBet thankyouButton">
                    <a href="/" class="btn btnBackBuy btn-lg" rel="nofollow">
                        Tiếp tục mua hàng&nbsp;<i class="fa fa-angle-double-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>

    </script>
    <script>
        app.controller('CheckoutSuccess', function ($rootScope, $scope, $http) {
        })
    </script>
@endpush

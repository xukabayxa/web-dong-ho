@extends('front2.mobiles.layouts.master')

@section('content')
    <style>
        .invalid-feedback {
            margin-top: .25rem;
            font-size: 12.5px;
            color: #dc3545;
        }
    </style>

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
    @include('front2.partials.bread_crumb', ['url' => route('cart'),'title' => 'Giỏ hàng' ])
    <div class="orderbox" ng-controller="Cart">
        <div class="boxFormPayment" ng-if="checkCart">
            <ul class="listcart all">

                <li class="cartitem" ng-repeat="item in items">
                    <div class="oimg">
                        <a href="" title="">
                            <img src="<% item.attributes.image %>"></a>
                        <a ng-click="removeItem(item.id)" title="Xóa" class="odel">Xóa</a>
                    </div>
                    <div class="oname">
                        <h3><a href="" title=""><% item.name %></a></h3>
                        <label><% item.price  | number %>đ</label>
                        <div class="quantity">
                            <div class="cart-plus-minus">
                                <input type="text" value="<% item.quantity %>" name="qtybutton" data-index="<% item.id %>"
                                       class="cart-plus-minus-box">
                            </div>
                        </div>
                    </div>
                </li>

            </ul>
            <div class="total" >
                <div id="totalSum">
                    <span>Tổng tiền:</span>
                    <b class="total_money"><% total | number%>đ</b>
                </div>
            </div>
            <form name="cart_form" id="cart_form" class="form-list" ng-if="checkCart">
                <div class="fpanel all">
                    <div class="title-user">Thông tin khách hàng</div>
                    <div class="form-group">
                        <label class="radioPure">
                            <input id="radio1" type="radio" name="Gender" value="1"><span class="outer"><span class="inner"></span></span><i>Anh</i></label>
                        <label class="radioPure">
                            <input id="radio2" type="radio" name="Gender" value="0"><span class="outer"><span class="inner"></span></span><i>Chị</i></label>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" class="form-control" name="Name" ng-model="form.customer_name" placeholder="Họ và tên">
                            <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.customer_name[0] %></strong>
                    </span>
                        </div>
                        <div class="col-md-6 form-group">
                            <input type="number" class="form-control" name="Phone" ng-model="form.customer_phone" placeholder="Số điện thoại">
                            <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.customer_phone[0] %></strong>
                     </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="Email" ng-model="form.customer_email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="Address" ng-model="form.customer_address" placeholder="Địa chỉ, Số nhà, Tòa nhà, Đường phố, Xã Phường, Quận Huyện...">
                        <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.customer_address[0] %></strong>
                     </span>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="Content" rows="5" ng-model="form.customer_required" placeholder="Yêu cầu khác"></textarea>
                    </div>

                    <div class="title-user">CHỌN HÌNH THỨC THANH TOÁN</div>
                    <div class="form-group">
                        <label class="radioPure">
                            <input id="payment_method_1" type="radio" name="payment_method" ng-model="form.payment_method" value="1" checked><span class="outer"><span class="inner"></span></span><i>Thanh toán khi nhận hàng - COD</i></label>
                        <label class="radioPure">
                            <input id="payment_method_0" type="radio" name="payment_method" ng-model="form.payment_method" value="0"><span class="outer"><span class="inner"></span></span><i>Chuyển khoản qua ngân hàng</i></label>
                        <div class="sub_show payment_method_0">
                            <div class="col-pd">
                                <p>Qúy khách vui lòng chuyển khoản vào một trong các tài khoản sau:</p>
                                <p>( Nội dung chuyển tiền: HỌ TÊN + SỐ ĐIỆN THOẠI + MÃ SẢN PHẨM )</p>
                                <p><b>Ngân hàng TMCP Việt Nam Thịnh Vượng - VPbank</b></p>
                                <p><b>Thông tin các tài khoản tại Beptot.vn!  </b></p>
                                <p>

                                    NGÂN HÀNG TECHCOM BANK</br>
                                    - Tên chủ TK: Nguyễn Đức Trường</br>
                                    - Số TK: 19027501510013</br>
                                    - Chi nhánh: Hà Nội</br>
                                </p>
                                <p>
                                    NGÂN HÀNG VIETTIN BANK</br>
                                    - Tên chủ TK: Nguyễn Đức Trường</br>
                                    - Số TK: 104000744394</br>
                                    -Chi nhánh: Hà Nội</br>
                                <p>
                                    NGÂN HÀNG MB BANK</br>
                                    -Tên chủ TK: Nguyễn Đức Trường</br>
                                    -Số TK: 0989883888888</br>
                                    -Chi nhánh: Hà Nội</br>
                                </p>
                            </div>
                        </div>

                        <div>
                                     <span class="invalid-feedback d-block" role="alert">
                        <strong><% errors.payment_method[0] %></strong>
                     </span>
                        </div>
                    </div>


                    <div class="shockbuttonbox">
                        <a href="" id="btnOrder2" class="check-out" ng-click="submit()"><b>Thanh toán</b> <span>(Xem hàng, không mua không sao)</span> </a>
                    </div>
                </div>
            </form>
        </div>
        <div class="loading"><i class="icon">Loading</i></div>

        <div class="flextBet " ng-if="!checkCart">
            <a href="/" class="btn-lg" rel="nofollow">
                Chưa có sản phẩm nào<i class="fa fa-angle-double-right"></i>
            </a>
        </div>
{{--        <div class="navigate"><a href="" title="">Tiếp tục mua hàng</a><label>Giỏ hàng của bạn</label></div>--}}
    </div>
@endsection
@push('scripts')
    <script>

    </script>
    <script>
        app.controller('Cart', function ($rootScope, $scope, $http) {
            $scope.items = @json($cartCollection);
            $scope.total = "{{$total}}";
            $scope.loading = {};
            $scope.form = {};
            $scope.checkCart = true;

            $scope.removeItem = function (product_id) {
                $.ajax({
                    type: 'GET',
                    url: "{{route('cart.remove.item')}}",
                    data: {
                        product_id: product_id
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total  = response.total ;
                            if($scope.total == 0) {
                                $scope.checkCart = false;
                            }
                            console.log($scope.checkCart);
                            $scope.$applyAsync();
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $(document).ready(function (){
                if($scope.total == 0) {
                    $scope.checkCart = false;
                    $scope.$applyAsync();
                }

                $(".qtybutton").on("click", function () {
                    var $button = $(this);
                    var oldValue = $button.parent().find("input").val();
                    var index = $button.parent().find("input").data("index");
                    if ($button.text() == "+") {
                        var newVal = parseFloat(oldValue) + 1;
                        updateCart(index, newVal);
                    } else {
                        // Don't allow decrementing below zero
                        if (oldValue > 1) {
                            var newVal = parseFloat(oldValue) - 1;
                        } else {
                            newVal = 0;
                        }
                        updateCart(index, newVal);
                    }
                    $button.parent().find("input").val(newVal);
                });
            })

            function updateCart(product_id, qty) {
                $.ajax({
                    type: 'GET',
                    url: "{{route('cart.update.item')}}",
                    data: {
                        product_id: product_id,
                        qty: qty
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.items = response.items;
                            $scope.total = response.total;
                            $scope.$applyAsync();
                        }
                    },
                    error: function(e) {
                        toastr.error('Đã có lỗi xảy ra');
                    },
                    complete: function() {
                        $scope.$applyAsync();
                    }
                });
            }

            $scope.submit = function () {
                $scope.loading.submit = true;
                $.ajax({
                    type: "POST",
                    url: "{{route('cart.checkout')}}",
                    headers: {
                        'X-CSRF-TOKEN': "{{csrf_token()}}"
                    },
                    data: {
                        customer_name: $scope.form.customer_name,
                        customer_phone: $scope.form.customer_phone,
                        customer_email: $scope.form.customer_email,
                        customer_address: $scope.form.customer_address,
                        customer_required: $scope.form.customer_required,
                        payment_method: $scope.form.payment_method,
                        items: $scope.items
                    },
                    beforeSend: function() {
                        $('.loading').show();
                    },
                    success: function (response) {
                        if (response.success) {
                            $scope.errors = null;
                            location.reload();
                            window.location.href = "/dat-hang-thanh-cong?code="+response.order_code;

                            // cart.checkout.success
                        } else {
                            $scope.errors = response.errors;
                        }
                        $('.loading').hide();
                        console.log( $scope.loading);
                    },
                    error: function () {
                    },
                    complete: function () {
                        $scope.loading.submit = false;
                        $scope.$applyAsync();
                    },
                });
            }
        })
    </script>
@endpush

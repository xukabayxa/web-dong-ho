@extends('site.layouts.master')
@section('title')
    <title>{{ "Liên hệ - " . ucfirst($_SERVER['HTTP_HOST']) }}</title>
@endsection
@section('content')
    <!-- breadcrumb-area start -->
    @include('site.partials.bread_crumb', ['type' => '','title' => 'Liên hệ' ])

    <!-- breadcrumb-area end -->

    <!-- Page Conttent -->
    <main class="page-content section-ptb" ng-controller="Contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-sm-12">
                    <div class="contact-form">
                        <div class="contact-form-info">
                            <div class="contact-title">
                                <h3>Để lại lời nhắn</h3>
                                <h5 ng-if="sendSuccess">Cảm ơn bạn đã để lại liên hệ, chúng tôi sẽ liên lạc lại với bạn sớm nhất !</h5>
                            </div>
                            <form id="contact-form" method="post" ng-if="! sendSuccess">
                                <div class="contact-page-form">
                                    <div class="contact-input">
                                        <div class="contact-inner">
                                            <input name="con_name" type="text" placeholder="Họ tên *"
                                                   ng-model="contact.user_name"
                                            >
                                            <span class="invalid-feedback d-block" role="alert"
                                                  ng-if="errors && errors.user_name" >
                                        <strong><% errors.user_name[0] %></strong>
                                        </span>

                                        </div>
                                        <div class="contact-inner">
                                            <input name="con_email" type="text" placeholder="Email *"
                                                   ng-model="contact.email"
                                            >
                                            <span class="invalid-feedback d-block" role="alert"
                                                  ng-if="errors && errors.email" >
                                        <strong><% errors.email[0] %></strong>
                                        </span>
                                        </div>

                                        <div class="contact-inner">
                                            <input name="con_phone" type="text" placeholder="Số điện thoại *"
                                                   ng-model="contact.phone_number"
                                            >
                                            <span class="invalid-feedback d-block" role="alert"
                                                  ng-if="errors && errors.phone_number" >
                                        <strong><% errors.phone_number[0] %></strong>
                                        </span>
                                        </div>

                                        <div class="contact-inner">
                                            <input name="con_subject" type="text" placeholder="Địa chỉ"
                                                   ng-model="contact.address"
                                            >
                                        </div>
                                        <div class="contact-inner contact-message">
                                            <textarea name="con_message" placeholder="Nội dung *"
                                                      ng-model="contact.content"
                                            ></textarea>
                                            <span class="invalid-feedback d-block" role="alert"
                                                  ng-if="errors && errors.content" >
                                        <strong><% errors.content[0] %></strong>
                                        </span>
                                        </div>
                                    </div>
                                    <div class="contact-submit-btn">
                                        <button class="submit-btn" type="button" ng-click="submit()">Gửi</button>
                                        <p class="form-messege"></p>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-sm-12">
                    <div class="contact-infor">
                        <div class="contact-title">
                            <h3>Liên hệ</h3>
                        </div>
                        <div class="contact-dec">
                            <p>{{$config->web_title}} </p>
                        </div>
                        <div class="contact-address">
                            <ul>
                                <li>Email: {{$config->email}}</li>
                                <li>Tổng đài: {{$config->phone_switchboard}}</li>
                                <li>Hotline: {{$config->hotline}}</li>
                            </ul>
                        </div>
                        <div class="work-hours">
                            <h5>Giờ làm việc</h5>
                            <p><strong>Tất cả các ngày trong tuần 24/7</strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="loading"><i class="icon">Loading</i></div>

    <!--// Page Conttent -->
@endsection
@push('scripts')
    <script>
        app.controller('Contact', function ($scope, $http) {
            $scope.contact = {};
            $scope.submit = function() {
                var url = "{{route('send.contact')}}";
                $scope.loading = true;
                $.ajax({
                    url: url,
                    type: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: $scope.contact,
                    beforeSend: function() {
                        $('.loading').show();
                    },
                    success: function(response) {
                        if (response.success) {
                            $scope.errors = null;
                            $scope.sendSuccess = true;
                        } else {
                            $scope.errors = response.errors;
                        }
                    },
                    error: function(err) {
                        console.log(err);
                    },
                    complete: function() {
                        $('.loading').hide();
                        $scope.$apply();
                    }
                });
            }
        })
    </script>
@endpush

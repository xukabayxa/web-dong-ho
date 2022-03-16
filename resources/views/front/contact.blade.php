@extends('layouts.master_front')

@section('page_title')
Liên hệ & Hỗ trợ khách hàng
@endsection

@section('content')

<nav aria-label="Page breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page"><a href="{{ route('homePage') }}" title="Trang chủ">Trang chủ</a></li>
            <li class="breadcrumb-item">Liên hệ & Hỗ trợ khách hàng</li>
        </ol>
    </div>
</nav>
<section class="support-banner mb-4">
    <div class="container">
        {!! printBlock(3) !!}
    </div>
</section>
<section class="support-content" ng-app="App" ng-cloak>
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-xs-12 support-introduct">
                <div class="introduct-inner">
                    <h1 class="big-title">{!! printBlock(11) !!}</h1>
                    {!! printBlock(4) !!}
                </div>
            </div>
            <div class="col-md-7 col-xs-12 support-form" ng-controller="postSupport">
                <div class="support-form-wrap">
                        <div class="form-group">
                            <label for="my-input">Họ tên *</label>
                            <input id="my-input" class="form-control" type="text" ng-model="form.name">
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><% errors.name[0] %></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Số điện thoại *</label>
                            <input id="my-input" class="form-control" type="text" ng-model="form.mobile">
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><% errors.mobile[0] %></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="my-input">Địa chỉ</label>
                            <input id="my-input" class="form-control" type="text" ng-model="form.address">
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><% errors.address[0] %></strong>
                            </span>
                        </div>
                        <div class="form-group">
                            <label for="my-textarea">Nội dung cần hỗ trợ *</label>
                            <textarea id="my-textarea" class="form-control" ng-model="form.content" rows="3"></textarea>
                            <span class="invalid-feedback d-block" role="alert">
                                <strong><% errors.content[0] %></strong>
                            </span>
                        </div>
                        <p>
                            <button type="submit" class="btn btn-success" ng-click="submit()" ng-disabled="loading.submit" style="cursor: pointer">
                                <i ng-if="!loading.submit" class="fa fa-save"></i>
                                <i ng-if="loading.submit" class="fa fa-spin fa-spinner"></i>
                                Gửi
                            </button>
                        </p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@section('script')
<script src="{{ asset('libs/angularjs/angular.js') }}"></script>
<script src="{{ asset('libs/angularjs/angular-resource.js') }}"></script>
<script src="{{ asset('libs/angularjs/sortable.js') }}"></script>
<script src="{{ asset('libs/dnd/dnd.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-sanitize.js"></script>
<script src="{{ asset('libs/angularjs/select.js') }}"></script>
<script src="{{ asset('js/angular.js') }}?version={{ env('APP_VERSION', '1') }}"></script>

<script>
    app.controller('postSupport', function ($scope, $http) {
      $scope.form = {};
      $scope.loading = {};

      $scope.submit = function() {
        $scope.loading.submit = true;
        console.log($scope.form);
        $.ajax({
          type: 'POST',
          url: "{!! route('postSupport') !!}",
          headers: {
            'X-CSRF-TOKEN': CSRF_TOKEN
          },
          data: $scope.form,

          success: function(response) {
            if (response.success) {
              alert('Gửi yêu cầu hỗ trợ thành công !');
              window.location.reload;
            } else {
                alert('Gửi yêu cầu hỗ trợ thất bại !');
              $scope.errors = response.errors;
            }
          },
          error: function(e) {
            toastr.error('Đã có lỗi xảy ra');
          },
          complete: function() {
            $scope.loading.submit = false;
            $scope.$applyAsync();
          }
        });
      }
    });
</script>
@endsection
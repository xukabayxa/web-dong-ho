<!DOCTYPE html>
<html lang="vi-vn" xml:lang="vi-vn">
<head>
    @include('site.partials.head')
    @yield('css')
</head>
<body id="body" ng-app="App">

<div class="main-wrapper">
    @include('site.partials.header')

    @yield('content')

    @include('site.partials.footer')


</div>

<!-- Modernizer JS -->
<script src="/site/assets/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- jquery -->
<script src="/site/assets/js/vendor/jquery-3.5.1.min.js"></script>
<script src="/site/assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>

<!-- Bootstrap JS -->
<script src="/site/assets/js/vendor/popper.min.js"></script>
<script src="/site/assets/js/vendor/bootstrap.min.js"></script>

<!-- Plugins JS -->
<script src="/site/assets/js/plugins/slick.min.js"></script>
<script src="/site/assets/js/plugins/jqueryui.min.js"></script>

<script src="/site/assets/js/plugins/jquery.nice-select.min.js"></script>
<script src="/site/assets/js/plugins/countdown.min.js"></script>
<script src="/site/assets/js/plugins/image-zoom.min.js"></script>
<script src="/site/assets/js/plugins/fancybox.js"></script>
<script src="/site/assets/js/plugins/scrollup.min.js"></script>
<script src="/site/assets/js/plugins/ajax-contact.js"></script>
<!-- Main JS -->
<script src="/site/assets/js/main.js"></script>
<!-- Angular Js -->
<script src="{{ asset('libs/angularjs/angular.js') }}"></script>
<script src="{{ asset('libs/angularjs/angular-resource.js') }}"></script>
<script src="{{ asset('libs/angularjs/sortable.js') }}"></script>
<script src="{{ asset('libs/dnd/dnd.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-sanitize.js"></script>
<script src="{{ asset('libs/angularjs/select.js') }}"></script>
<script src="{{ asset('js/angular.js') }}?version={{ env('APP_VERSION', '1') }}"></script>

<script src="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.js"></script>
<script src="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>

<script>
    app.controller('headerPartial', function ($scope) {
        $scope.cart = {};
        $scope.cart.items = @json($cartItems);
        $scope.cart.count = Object.keys($scope.cart.items).length;
        $scope.cart.totalCost = {{$totalCart}};
        $scope.checkCart = true;

        $scope.removeItem = function (product_id) {
            $.ajax({
                type: 'GET',
                url: "{{route('cart.remove.item')}}",
                data: {
                    product_id: product_id
                },
                success: function (response) {
                    if (response.success) {
                        $scope.cart.items = response.items;
                        $scope.cart.count = Object.keys($scope.cart.items).length;
                        $scope.cart.totalCost = response.total;
                        if ($scope.cart.count == 0) {
                            $scope.checkCart = false;
                        }
                        $scope.$applyAsync();
                    }
                },
                error: function (e) {
                    toastr.error('Đã có lỗi xảy ra');
                },
                complete: function () {
                    $scope.$applyAsync();
                }
            });
        }

        $scope.search = {};
        $scope.search.category_id = 'all';
        $scope.searchProduct = function () {
            var keyword = $('#keyword').val();

            if (keyword.length < 2 || keyword == 'Nhập từ khóa tìm kiếm') {
                $.toast('Từ khóa phải nhiều hơn 1 ký tự.');
                return;
            }

            location.href = '/tim-kiem?keyword=' + (keyword) +'&category_id='+$scope.search.category_id;
        }
    })
</script>

@stack('scripts')

</body>
</html>

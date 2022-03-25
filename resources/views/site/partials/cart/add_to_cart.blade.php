$scope.addToCart = function (productId = null, qty = null) {
    url = "{{route('cart.add.item', ['productId' => 'productId'])}}";
    if (productId) {
        url = url.replace('productId', productId);
    } else {
        url = url.replace('productId', $scope.product.id);
    }

    if(qty) {
        quantity = qty;
    } else {
        quantity =  parseInt($scope.qty)
    }

    $.ajax({
        type: 'POST',
        url: url,
        headers: {
            'X-CSRF-TOKEN': "{{csrf_token()}}"
            },
        data: {
            'qty': quantity
            },
        success: function (response) {
            if (response.success) {
                toastr.options = {
                    timeOut : 0,
                    extendedTimeOut : 100,
                    tapToDismiss : true,
                    debug : false,
                    fadeOut: 10,
                    positionClass : "toast-top-center"
                };
            toastr.success('Thêm vào giỏ hàng thành công !');
        // $.toast('Đã thêm vào giỏ hàng');
            $interval.cancel($rootScope.promise);

        $rootScope.promise = $interval(function(){
        cartItemSync.items = response.items;
        cartItemSync.total = response.total;
        cartItemSync.count = response.count;
        }, 1000);
        }
        },
        error: function () {
            $.toast('Lỗi')
            },
        complete: function () {
            $scope.$applyAsync();
        }
    });

}

@extends('front2.layouts.master')
@section('content')
<div class="container" ng-controller="Products">
    <div class="row" >
        @include('front2.partials.bread_crumb', ['url' => route('Category', $cate->slug), 'title' => $cate->name])

        <div class="hd-card-body top-page-content">

            <h1><a href="{{route('Category', $cate->slug)}}" class="fs-hotit" title="">{{$cate->short_des}}</a></h1>

            <section class="descriptionTopCtgr">
                <div class="noteDescription">
                    <p>{!! $cate->intro !!}</p>
                </div>
            </section>

            <div class="hd-module-title filterBoxFixed">
                @include('front2.partials.filter_product', ['childCategories' => $childCategories])

            </div>
        </div>

        <div id="p_cat_v2">

        </div>
        <style>
            .loading2 {
                position: fixed;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                transform: -webkit-translate(-50%, -50%);
                transform: -moz-translate(-50%, -50%);
                transform: -ms-translate(-50%, -50%);
            }
        </style>

{{--        <div ng-if="loading" class="loading2"><img src="/site/image/loading.gif"></div>--}}

        <div class="loading"><i class="icon">Loading</i></div>
    </div>
</div>
@endsection
@push('scripts')
    <script>
        app.controller('Products', function ($scope) {
            $scope.manufacturers_ids = [];
            $scope.origin_ids = [];
            $scope.prices = [];
            $scope.sorts = [];
            $scope.child_cate_ids = [];
            $scope.filters = [];
            $scope.checkLoad = true;

            $scope.chooseManufacturer = function(e) {
                resetProductList();
                if (e.target.checked) $scope.manufacturers_ids.push(e.target.value)
                else $scope.manufacturers_ids = $scope.manufacturers_ids.filter(val => val != e.target.value);

                $scope.filters.forEach((value,index)=>{
                    if(value.manu) $scope.filters.splice(index,1);
                });

                $scope.filters.push({'manu': $scope.manufacturers_ids});

                filterData($scope.filters);

                console.log($scope.manufacturers_ids);
                console.log($scope.filters)
            }

            $scope.choosePrice = function(e) {
                resetProductList();
                if (e.target.checked) $scope.prices.push(e.target.value)
                else $scope.prices = $scope.prices.filter(val => val != e.target.value);

                $scope.filters.forEach((value,index)=>{
                    if(value.prices) $scope.filters.splice(index,1);
                });

                $scope.filters.push({'prices': $scope.prices});

                filterData($scope.filters);

                console.log($scope.prices);
                console.log($scope.filters)
            }

            $scope.chooseOrigin = function(e) {
                resetProductList();
                if (e.target.checked) $scope.origin_ids.push(e.target.value)
                else $scope.origin_ids = $scope.origin_ids.filter(val => val != e.target.value);

                $scope.filters.forEach((value,index)=>{
                    if(value.origin) $scope.filters.splice(index,1);
                });

                $scope.filters.push({'origin': $scope.origin_ids});

                filterData($scope.filters);
            }

            $scope.chooseChildCate = function(e) {
                resetProductList();
                if (e.target.checked) $scope.child_cate_ids.push(e.target.value)
                else $scope.child_cate_ids = $scope.child_cate_ids.filter(val => val != e.target.value);

                $scope.filters.forEach((value,index)=>{
                    if(value.child_cate_ids) $scope.filters.splice(index,1);
                });

                $scope.filters.push({'child_cate_ids': $scope.child_cate_ids});

                filterData($scope.filters);
            }

            $scope.chooseSort = function(e) {
                resetProductList();
                if (e.target.checked) $scope.sorts.push(e.target.value)
                else $scope.sorts = $scope.sorts.filter(val => val != e.target.value);

                $scope.filters.forEach((value,index)=>{
                    if(value.sorts) $scope.filters.splice(index,1);
                });

                $scope.filters.push({'sorts': $scope.sorts});

                filterData($scope.filters);

                console.log($scope.filters)
            }

            $(document).ready(function () {
                filterData();
            });

            function filterData(filters = []) {
                $.ajax({
                    url: "{{ route('product.filter.v2') }}",
                    method: "GET",
                    data: {
                        cate_id: "{{$cate->id}}",
                        filters: filters
                    },
                    beforeSend: function() {
                        $scope.loading = true;
                        $scope.$applyAsync();
                        $('.loading').show();
                    },
                    success: function (data) {
                        $('#p_cat_v2').append(data);
                        $scope.loading = false;
                        $('.loading').hide();
                        $scope.$applyAsync();
                    }
                })
            }
        })


        function resetProductList() {
            $('#p_cat_v2').empty();
        }
    </script>
@endpush

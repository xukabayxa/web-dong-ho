@extends('front2.layouts.master')
@section('content')
    <div class="container" ng-controller="Products">
        <div class="row">

            @include('front2.partials.bread_crumb', ['url' => route('Category', $cate->slug), 'title' => $cate->name])

            <div class="hd-card-body top-page-content">

                <h1><a href="{{route('Category', $cate->slug)}}" class="fs-hotit"
                       title="">{{$cate->name}}</a></h1>

                <section class="descriptionTopCtgr">
                    <div class="noteDescription"><p> </p>

                        <p>
                            <meta charset="utf-8"/>
                        </p>

                        <p dir="ltr">{!! $cate->intro !!}</p>
                    </div>
                </section>

                <div class="hd-module-title filterBoxFixed">
                    <div class="row">
                        <div class="col-xs-12">

                            <div class="boxFilterLeft btn-group">
                                <button type="button" class="btn btn-filters btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                    Hãng Sản xuất <span class="caret"></span>
                                </button>

                                <ul class="listform_filter category right-property dropdown-menu" role="menu">
                                    @foreach($manufacturers as $manufacturer)
                                        <li>
                                            <div class="checkbox">
                                                <input type="checkbox" class="manu-checkbox" name="manu-checkbox"
                                                       id="{{$manufacturer->id}}"
                                                       data-url=""
                                                       ng-click="chooseManufacturer($event)"
                                                       value="{{$manufacturer->id}}"/>
                                                <label for="{{$manufacturer->id}}">{{$manufacturer->name}}</label>
                                            </div>

                                        </li>
                                    @endforeach
                                </ul>
                            </div>

                            <div class="boxFilterLeft btn-group">
                                <button type="button" class="btn btn-filters btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                    Xuất xứ <span class="caret"></span>
                                </button>
                                <ul class="listform_filter right-property dropdown-menu" role="menu">

                                    @foreach($origins as $origin)
                                        <li>
                                            <div class="checkbox">
                                                <input type="checkbox" name="{{$origin->code}}" id="{{$origin->code}}"
                                                       ng-click="chooseOrigin($event)"
                                                       data-url="" value="{{$origin->id}}"/>
                                                <label for="{{$origin->code}}">{{$origin->name}}</label>
                                            </div>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>

                            <div class="boxFilterLeft btn-group">
                                <button type="button" class="btn btn-filters btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                    Mức giá <span class="caret"></span>
                                </button>
                                <ul class="listform_filter right-property dropdown-menu" role="menu">

                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" name="muc-gia" id="muc-gia490"
                                                   ng-click="choosePrice($event)"
                                                   data-url="" value="[3000000]"/>
                                            <label for="muc-gia490">Dưới 3 triệu</label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" name="muc-gia" id="muc-gia102"
                                                   ng-click="choosePrice($event)"
                                                   data-url="" value="[3000000, 5000000]"/>
                                            <label for="muc-gia102"> 3 triệu - 5 triệu</label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" name="muc-gia" id="muc-gia103"
                                                   ng-click="choosePrice($event)"
                                                   data-url="" value="[5000000, 10000000]"/>
                                            <label for="muc-gia103"> 5 triệu - 10 triệu</label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" name="muc-gia" id="muc-gia104"
                                                   ng-click="choosePrice($event)"
                                                   data-url="" value="[10000000,15000000]"/>
                                            <label for="muc-gia104"> 10 triệu - 15 triệu</label>
                                        </div>
                                    </li>

                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" name="muc-gia" id="muc-gia105"
                                                   ng-click="choosePrice($event)"
                                                   data-url="" value="[16000000]"/>
                                            <label for="muc-gia105">Trên 15 triệu</label>
                                        </div>
                                    </li>

                                </ul>
                            </div>

{{--                            <div class="boxFilterLeft btn-group">--}}
{{--                                <button type="button" class="btn btn-filters btn-default dropdown-toggle"--}}
{{--                                        data-toggle="dropdown">--}}
{{--                                    Số bếp <span class="caret"></span>--}}
{{--                                </button>--}}
{{--                                <ul class="listform_filter right-property dropdown-menu" role="menu">--}}

{{--                                    <li>--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <input type="checkbox" name="so-bep" id="so-bep113"--}}
{{--                                                   data-url="https://beptot.vn/bep-dien-bosch.html" value="113"/>--}}
{{--                                            <label for="so-bep113">1 bếp</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

{{--                                    <li>--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <input type="checkbox" name="so-bep" id="so-bep99"--}}
{{--                                                   data-url="https://beptot.vn/bep-dien-bosch.html" value="99"/>--}}
{{--                                            <label for="so-bep99">2 bếp</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

{{--                                    <li>--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <input type="checkbox" name="so-bep" id="so-bep100"--}}
{{--                                                   data-url="https://beptot.vn/bep-dien-bosch.html" value="100"/>--}}
{{--                                            <label for="so-bep100">3 bếp</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

{{--                                    <li>--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <input type="checkbox" name="so-bep" id="so-bep101"--}}
{{--                                                   data-url="https://beptot.vn/bep-dien-bosch.html" value="101"/>--}}
{{--                                            <label for="so-bep101">4 bếp</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

{{--                                    <li>--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <input type="checkbox" name="so-bep" id="so-bep112"--}}
{{--                                                   data-url="https://beptot.vn/bep-dien-bosch.html" value="112"/>--}}
{{--                                            <label for="so-bep112">5 bếp</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

{{--                                    <li>--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <input type="checkbox" name="so-bep" id="so-bep709"--}}
{{--                                                   data-url="https://beptot.vn/bep-dien-bosch.html" value="709"/>--}}
{{--                                            <label for="so-bep709">6 Bếp</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

{{--                                    <li>--}}
{{--                                        <div class="checkbox">--}}
{{--                                            <input type="checkbox" name="so-bep" id="so-bep515"--}}
{{--                                                   data-url="https://beptot.vn/bep-dien-bosch.html" value="515"/>--}}
{{--                                            <label for="so-bep515">Bếp đa điểm</label>--}}
{{--                                        </div>--}}
{{--                                    </li>--}}

{{--                                </ul>--}}
{{--                            </div>--}}

                            <div class="boxFilterLeft btn-group">
                                <button type="button" class="btn btn-filters btn-default dropdown-toggle"
                                        data-toggle="dropdown">
                                    Sắp xếp theo <span class="caret"></span>
                                </button>
                                <ul class="listform_filter right-property dropdown-menu filterTopCtgr" role="menu">
                                    <li>
                                        <div class="checkbox">
                                            <input data-url="" id="new_asc"
                                                   ng-click="chooseSort($event)"
                                                   name="sort"
                                                   type="checkbox" value="new_asc"/>
                                            <label for="new_asc">Sản phẩm mới</label>
                                        </div>
                                    </li>
                                    {{--                    <li>--}}
                                    {{--                        <div class="checkbox">--}}
                                    {{--                            <input data-url="https://beptot.vn/bep-dien-bosch.html" id="view_desc"--}}
                                    {{--                                   name="sort" type="checkbox" value="view_desc"/>--}}
                                    {{--                            <label for="view_desc">Xem nhiều nhất</label>--}}
                                    {{--                        </div>--}}
                                    {{--                    </li>--}}
                                    <li>
                                        <div class="checkbox">
                                            <input data-url="" id="price_asc"
                                                   ng-click="chooseSort($event)"
                                                   name="sort" type="checkbox" value="price_asc"/>
                                            <label for="price_asc">Giá thấp đến cao</label>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="checkbox">
                                            <input data-url="" id="price_desc"
                                                   ng-click="chooseSort($event)"
                                                   name="sort" type="checkbox" value="price_desc"/>
                                            <label for="price_desc">Giá cao xuống thấp</label>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <main class="er-main ">
                <div class="er-box-cate box-category">
                    <ul class="product-fs list_product_featured list-products ">
                    </ul>
                </div>


                <div class="page-sort-cate">
                    <ul class="pagination">
                        <li class="active load_more_button" ng-if="checkLoad"><a ng-click="loadData()">Xem thêm</a>
                        </li>
                        <input id="p_id" type="hidden" value="">
                        <input id="manu_id" type="hidden" value="{{(@$manu ? $manu->id : null)}}">
                        <div class="loading"><i class="icon">Loading</i></div>
                    </ul>
                </div>

            </main>

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
@endsection
@push('scripts')
    <script>
        app.controller('Products', function ($scope) {
            $scope.manufacturers_ids = [];
            $scope.origin_ids = [];
            $scope.prices = [];
            $scope.sorts = [];
            $scope.filters = [];
            $scope.checkLoad = true;

            $scope.chooseManufacturer = function (e) {
                resetProductList();
                if (e.target.checked) $scope.manufacturers_ids.push(e.target.value)
                else $scope.manufacturers_ids = $scope.manufacturers_ids.filter(val => val != e.target.value);

                $scope.filters.forEach((value, index) => {
                    if (value.manu) $scope.filters.splice(index, 1);
                });

                $scope.filters.push({'manu': $scope.manufacturers_ids});

                loadMore("", $scope.filters);

                console.log($scope.manufacturers_ids);
                console.log($scope.filters)
            }

            $scope.choosePrice = function (e) {
                resetProductList();
                if (e.target.checked) $scope.prices.push(e.target.value)
                else $scope.prices = $scope.prices.filter(val => val != e.target.value);

                $scope.filters.forEach((value, index) => {
                    if (value.prices) $scope.filters.splice(index, 1);
                });

                $scope.filters.push({'prices': $scope.prices});

                loadMore("", $scope.filters);

                console.log($scope.prices);
                console.log($scope.filters)
            }

            $scope.chooseOrigin = function (e) {
                resetProductList();
                if (e.target.checked) $scope.origin_ids.push(e.target.value)
                else $scope.origin_ids = $scope.origin_ids.filter(val => val != e.target.value);

                $scope.filters.forEach((value, index) => {
                    if (value.origin) $scope.filters.splice(index, 1);
                });

                $scope.filters.push({'origin': $scope.origin_ids});

                loadMore("", $scope.filters);
            }

            $scope.chooseSort = function(e) {
                resetProductList();
                if (e.target.checked) $scope.sorts.push(e.target.value)
                else $scope.sorts = $scope.sorts.filter(val => val != e.target.value);

                $scope.filters.forEach((value,index)=>{
                    if(value.sorts) $scope.filters.splice(index,1);
                });

                $scope.filters.push({'sorts': $scope.sorts});

                loadMore("", $scope.filters);

                console.log($scope.filters)
            }

            $scope.loadData = function () {
                let p_id = $("input#p_id").val();
                loadMore(p_id, $scope.filters);
            }

            $(document).ready(function () {
                let manu_id = $("#manu_id").val();
                if (manu_id != '') {
                    $scope.filters.push({'manu': [manu_id]});
                    loadMore("", $scope.filters);

                    $(".manu-checkbox").each(function () {
                        if ($(this).val() == manu_id) {
                            $(this).prop('checked', true);
                        }
                    });

                } else {
                    loadMore("");
                }

            });

            function loadMore(id = "", filters = []) {
                $.ajax({
                    url: "{{ route('product.loadmore') }}",
                    method: "GET",
                    data: {
                        cate_id: "{{$cate->id}}",
                        id: id,
                        filters: filters
                    },
                    beforeSend: function () {
                        $scope.loading = true;
                        $('.loading').show();
                        $scope.$applyAsync();
                    },
                    success: function (data) {
                        console.log(data.p_id);
                        if (data.p_id === null) {
                            $scope.checkLoad = false;
                            console.log($scope.checkLoad);
                            $scope.$applyAsync();
                            // $('.load_more_button').remove();
                        } else {
                            console.log($scope.checkLoad);
                            $scope.checkLoad = true;
                        }
                        $scope.loading = false;
                        $('.loading').hide();
                        $scope.$applyAsync();

                        $("input#p_id").val(data.p_id);
                        $('.list-products').append(data.html);
                    }
                })
            }
        })

        function resetProductList() {
            $('.list-products').empty();
        }
    </script>
@endpush

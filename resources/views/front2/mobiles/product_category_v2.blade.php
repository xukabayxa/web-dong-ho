@extends('front2.mobiles.layouts.master')

@section('content')

    <div ng-controller="Products">
        <section class="slidemain2">
            <ul class="slide-cate">

                @foreach($bannersRight->take(2) as $banner)
                    <li class="item-banner-cate">
                        <a href="{{$banner->link}}">
                            <img src="{{$banner->image->path ?? asset('site/image/no-image.png')}}" alt="{{$banner->title}}">
                        </a>
                    </li>
                @endforeach

            </ul>
        </section>

        @include('front2.partials.bread_crumb', ['url' => route('Category', $cate->slug), 'title' => $cate->name])

        <section class="noteBookCtgr">
            <div class="container">
                <div class="heading heading-menu-page">
                    <div class="flexBet">
                        <h1>{{$cate->short_des}}</h1>
                    </div>
                </div>
                <div class="hd-module-title filterBoxFixed">
                    <div class="">
                        @if(@$childCategories)
                            <div class="boxFilterLeft btn-group">
                                <button type="button" class="btn btn-filters btn-default dropdown-toggle" data-toggle="dropdown">
                                    Phân loại <span class="caret"></span>
                                </button>
                                <ul class="listform_filter category right-property dropdown-menu" role="menu">

                                    @foreach($childCategories as $category)
                                        <li data-url="">
                                            <div class="checkbox">
                                                <input type="checkbox" name="{{$category->name}}" id="{{$category->name}}"
                                                       ng-click="chooseChildCate($event)"
                                                       value="{{$category->id}}"/>
                                                <label for="{{$category->name}}">{{$category->name}}</label>
                                            </div>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        @endif

                        <div class="boxFilterLeft btn-group">
                            <button type="button" class="btn btn-filters btn-default dropdown-toggle"
                                    data-toggle="dropdown">
                                Hãng Sản xuất <span class="caret"></span>
                            </button>
                            <ul class="listform_filter category right-property dropdown-menu" role="menu">
                                @foreach($manufacturers as $manufacturer)
                                    <li>
                                        <div class="checkbox">
                                            <input type="checkbox" name="{{$manufacturer->id}}" id="{{$manufacturer->id}}"
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
                            <ul class="listform_filter right-property dropdown-menu filterTopCtgr" role="menu">

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

                        <div class="boxFilterLeft btn-group">
                            <button type="button" class="btn btn-filters btn-default dropdown-toggle"
                                    data-toggle="dropdown">
                                Sắp xếp theo <span class="caret"></span>
                            </button>
                            <ul class="listform_filter right-property dropdown-menu filterTopCtgr" role="menu">
                                <li>
                                    <div class="checkbox">
                                        <input data-url="" id="new_asc"
                                               name="sort"
                                               type="checkbox" value="new_asc"/>
                                        <label for="new_asc">Sản phẩm mới</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input data-url="" id="view_desc"
                                               name="sort" type="checkbox" value="view_desc"/>
                                        <label for="view_desc">Xem nhiều nhất</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input data-url="" id="price_asc"
                                               name="sort" type="checkbox" value="price_asc"/>
                                        <label for="price_asc">Giá thấp đến cao</label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox">
                                        <input data-url="" id="price_desc"
                                               name="sort" type="checkbox" value="price_desc"/>
                                        <label for="price_desc">Giá cao xuống thấp</label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

{{--                <div class="bxnote_ctgr postentry show-more-height1">--}}
{{--                    <p></p>--}}

{{--                </div>--}}
{{--                <div class="show-more1">(Hiển thị thêm)</div>--}}

            </div>
        </section>

        <div  id="p_cate_v2">

        </div>

        <div class="loading"><i class="icon">Loading</i></div>

    </div>


@endsection
@push('scripts')
    <script>
        app.controller('Products', function ($scope) {
            $scope.manufacturers_ids = [];
            $scope.origin_ids = [];
            $scope.prices = [];
            $scope.child_cate_ids = [];
            $scope.filters = [];
            $scope.checkLoad = true;

            $scope.chooseManufacturer = function(e) {
                resetProductList();
                if (e.target.checked)  $scope.manufacturers_ids.push(e.target.value)
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
                        $('#p_cate_v2').append(data);
                        $scope.loading = false;
                        $('.loading').hide();
                        $scope.$applyAsync();
                    }
                })
            }
        })

        function resetProductList() {
            $('#p_cate_v2').empty();
        }

    </script>
@endpush

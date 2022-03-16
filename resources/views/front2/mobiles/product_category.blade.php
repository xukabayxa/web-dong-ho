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

                <div class="bxnote_ctgr postentry show-more-height1">
                    {!! $cate->intro !!}

                </div>
                <div class="show-more1">(Hiển thị thêm)</div>

            </div>
        </section>


        <section class="ctgr_prduc_home">
            <div class="container">
                <div class="row-5">
                    <ul class="fixul list_item_prd list-products">



                    </ul>

                    <div class="clearfix"></div>
                    <div class="text-center">
                        <ul class="pagination">
                            <li class="active" ng-if="checkLoad"><a ng-click="loadData()">Xem thêm</a>
                            </li>
                            <input id="p_id" type="hidden" value="">
                            <input id="manu_id" type="hidden" value="{{(@$manu ? $manu->id : null)}}">
                            <div class="loading"><i class="icon">Loading</i></div>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@push('scripts')
    <script>
        app.controller('Products', function ($scope) {
            $scope.manufacturers_ids = [];
            $scope.origin_ids = [];
            $scope.prices = [];
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

                loadMore("", $scope.filters);

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

                loadMore("", $scope.filters);

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

                loadMore("", $scope.filters);
            }

            $scope.loadData = function () {
                let p_id = $("input#p_id").val();
                loadMore(p_id, $scope.filters);
            }

            $(document).ready(function () {
                let manu_id = $("#manu_id").val();
                if(manu_id != '') {
                    $scope.filters.push({'manu': [manu_id]});
                    loadMore("", $scope.filters);
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
                    beforeSend: function() {
                        $scope.loading = true;
                        $('.loading').show();
                        $scope.$applyAsync();
                    },
                    success: function (data) {
                        console.log(data.p_id);
                        if(data.p_id === null) {
                            $scope.checkLoad = false;
                            console.log($scope.checkLoad);
                            $scope.$applyAsync();
                            // $('.load_more_button').remove();
                        } else {
                            console.log( $scope.checkLoad);
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

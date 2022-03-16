<div class="row">
    <div class="col-xs-12">
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
                               data-url=""
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
{{--        <div class="boxFilterLeft btn-group">--}}
{{--            <button type="button" class="btn btn-filters btn-default dropdown-toggle"--}}
{{--                    data-toggle="dropdown">--}}
{{--                Số bếp <span class="caret"></span>--}}
{{--            </button>--}}
{{--            <ul class="listform_filter right-property dropdown-menu" role="menu">--}}

{{--                <li>--}}
{{--                    <div class="checkbox">--}}
{{--                        <input type="checkbox" name="so-bep" id="so-bep113"--}}
{{--                               data-url="https://beptot.vn/bep-dien-bosch.html" value="113"/>--}}
{{--                        <label for="so-bep113">1 bếp</label>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <div class="checkbox">--}}
{{--                        <input type="checkbox" name="so-bep" id="so-bep99"--}}
{{--                               data-url="https://beptot.vn/bep-dien-bosch.html" value="99"/>--}}
{{--                        <label for="so-bep99">2 bếp</label>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <div class="checkbox">--}}
{{--                        <input type="checkbox" name="so-bep" id="so-bep100"--}}
{{--                               data-url="https://beptot.vn/bep-dien-bosch.html" value="100"/>--}}
{{--                        <label for="so-bep100">3 bếp</label>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <div class="checkbox">--}}
{{--                        <input type="checkbox" name="so-bep" id="so-bep101"--}}
{{--                               data-url="https://beptot.vn/bep-dien-bosch.html" value="101"/>--}}
{{--                        <label for="so-bep101">4 bếp</label>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <div class="checkbox">--}}
{{--                        <input type="checkbox" name="so-bep" id="so-bep112"--}}
{{--                               data-url="https://beptot.vn/bep-dien-bosch.html" value="112"/>--}}
{{--                        <label for="so-bep112">5 bếp</label>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <div class="checkbox">--}}
{{--                        <input type="checkbox" name="so-bep" id="so-bep709"--}}
{{--                               data-url="https://beptot.vn/bep-dien-bosch.html" value="709"/>--}}
{{--                        <label for="so-bep709">6 Bếp</label>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--                <li>--}}
{{--                    <div class="checkbox">--}}
{{--                        <input type="checkbox" name="so-bep" id="so-bep515"--}}
{{--                               data-url="https://beptot.vn/bep-dien-bosch.html" value="515"/>--}}
{{--                        <label for="so-bep515">Bếp đa điểm</label>--}}
{{--                    </div>--}}
{{--                </li>--}}

{{--            </ul>--}}
{{--        </div>--}}

    </div>
</div>

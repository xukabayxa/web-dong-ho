<header>

    @if($bannerTop)
    <div class="er-banner-top">
        <a class="banner-link" href="{{@$bannerTop ? $bannerTop->link : ''}}" title="{{@$bannerTop ? $bannerTop->name : ''}}">
            <img src="{{$bannerTop->image->path ?? asset('site/image/logo_mau.png')}}" alt=""></a>
        <span class="close_top_banner">✕</span>
    </div>
    @endif

    <div class="header-wrap">
        <div class="container">
            <div class="row">

                <div class="logo">

                    <h1 class="logo_home">{{$config->web_title}}</h1>

                    <a href="/" title="{{$config->web_title}}">
                        <img width="120" height="60" src="{{$config->image->path ?? asset('site/image/'. $config->site_logo)}}"
                             alt="{{$config->web_title}}"/>
                    </a>
                </div>


                <div class="search-boxtr">
                    <form class="headsearch" method="post" id="formSearchTop" onsubmit="doSearch(); return false;">
                        <input type="text" name="keyword" id="keyword" onkeyup="search(this.value)"
                               autocomplete="off" value="" placeholder="Nhập từ khóa tìm kiếm" class="topinput">
                        <button type="submit" class="btn btntop"><i class="fa fa-search"></i></button>
                        <ul class="resuiltSearch ul-menu-muiten .search-suggest"></ul>
                    </form>
                </div>
                <div class="nav-user-txt">

                    <li class="">
                        <a href="/tin-tuc">
                            <div class="icon"><i class="akr-Menuicon_Sale"></i></div>
                            <span class="user">Tin tức</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="#">
                            <div class="icon"><i class="akr-icon_Warranty1"></i></div>
                            <span class="user">Dịch vụ</span>
                        </a>
                    </li>

{{--                    <li class="sp-view">--}}
{{--                        <a class="btnviewed" href="/khuyen-mai.html">--}}
{{--                            <span>Khuyến mãi</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li>
                        <a href="tel:{{$config->zalo}}">
                            <div class="icon"><i class="akr-Contact_PhoneCall"></i></div>
                            <p><span>{{$config->zalo}}</span></p>
                        </a>
                    </li>

                    <li><a href="/gio-hang">
                        <div class="icon"><i class="akr-Headericon_Cart"></i><span class="mount">{{Cart::getContent()->count()}}</span></div>
                            <span>Giỏ hàng</span></a>
                    </li>

                </div>

                <script type="text/javascript">
                    function doSearch() {
                        var keyword = $('#keyword').val();

                        if (keyword.length < 2 || keyword == 'Nhập từ khóa tìm kiếm') {
                            zebra_alert('Thông báo !', 'Từ khóa phải nhiều hơn 1 ký tự.');
                            return;
                        }
                        location.href = '/tim-kiem?keyword=' + (keyword);
                    }

                    function nonAccentVietnamese(str) {
                        str = str.toLowerCase();
                        str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g, "a");
                        str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g, "e");
                        str = str.replace(/ì|í|ị|ỉ|ĩ/g, "i");
                        str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g, "o");
                        str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g, "u");
                        str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g, "y");
                        str = str.replace(/đ/g, "d");
                        // Some system encode vietnamese combining accent as individual utf-8 characters
                        str = str.replace(/\u0300|\u0301|\u0303|\u0309|\u0323/g, ""); // Huyền sắc hỏi ngã nặng
                        str = str.replace(/\u02C6|\u0306|\u031B/g, "");
                        str = str.replace(/\s/g, '-');// Â, Ê, Ă, Ơ, Ư
                        return str;
                    }
                </script>

            </div>
        </div>
    </div>

    <nav class="menu_main_cate">
        <div class="container">
            <div class="row">
                <ul class="menu-right-head">

                    @foreach($productCategories as $category)
                    <li class="level1">

                        <a href="{{route('Category', $category->slug)}}" title="{{$category->name}}">
                            {!! $category->icon  !!}
                            &nbsp;
                            <span>{{$category->name}}</span>
                            <span class="angle-down"></span>
                        </a>
                        <ul class="dropdown-listchildpage">

                            @foreach($category->childs as $child)
                            <li><a title="{{$child->name}}" href="{{route('Category', $child->slug)}}">{{$child->name}}</a></li>
                            @endforeach

                            @foreach($category->manufacturers as $manu)
                            <li class="brand-menu">
                                <a title="{{$manu->name}}" href="{{route('Category', ['parent_slug' => $category->slug, 'code_manufacturer' => $manu->code])}}">
                                    <img src="{{$manu->image->path ?? asset('site/image/no-image.png')}}">
                                </a>
                            </li>
                            @endforeach

                        </ul>

                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </nav>
    <div class="overlay"></div>
</header>

<header id="header" class="fix_header">
    <div class="btnMenuTop">
        <a href="#my-mobile-menu" class="buttonMenu iconopenMenu sidebar-toggle"></a>
    </div>


    <div id="mainMenu">
        <ul class="navmenu">

            @foreach($productCategories as $category)
            <li class="iconmenu">
                <a href="{{route('Category', $category->slug)}}"><span></span>{{$category->name}}</a>
                <ul>
                @foreach($category->childs as $child)
                    <li><a href="{{route('Category', $child->slug)}}">{{$child->name}}</a></li>
                @endforeach
                </ul>

            </li>
            @endforeach
        </ul>

    </div>


    <div class="logoTop" style="text-align: -webkit-center; margin-top: -10px">

        <h1>{{$config->web_title}}</h1>

        <a href="/" title="{{$config->web_title}}">
            <img src="{{$config->image->path ?? asset('site/image/logo_mau.png')}}" alt="{{$config->web_title}}" style="text-align: -webkit-center; width: 60%; height: auto !important;">
        </a>
    </div>


    <div class="cartTop">
        <a href="/gio-hang" rel="nofollow"><i class="fa fa-shopping-cart"></i></a>
    </div>
    <div class="boxsearchTop" style="margin-top: -18px">
        <form method="post" onsubmit="doSearch(); return false;">
            <input type="text" class="form-control" name="keyword" id="keyword" onkeyup="search(this.value)"
                   autocomplete="off" placeholder="Từ khóa tìm kiếm">
            <button type="button" class="btnSearch" onclick="doSearch(); return false;"><i class="fa fa-search"></i>
            </button>
            <ul class="resuiltSearch"></ul>
        </form>
    </div>

    <script type="text/javascript">
        function doSearch() {
            var sURL = '';
            var keyword = $('#keyword').val();

            if (keyword.length < 2 || keyword == 'Nhập từ khóa tìm kiếm') {
                //zebra_alert('Thông báo !', 'Từ khóa phải nhiều hơn 1 ký tự.');
                Swal.fire({
                    icon: 'info',
                    title: 'Thông báo',
                    text: 'Từ khóa phải nhiều hơn 1 ký tự.',
                    showCloseButton: true,
                    showCancelButton: false,
                    focusConfirm: false,
                    confirmButtonText: "OK",
                })
                return;
            }

            location.href = '/tim-kiem?keyword=' + (keyword);
        }
    </script>

</header>

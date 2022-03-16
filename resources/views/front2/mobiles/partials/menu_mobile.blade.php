<div id="my-mobile-menu" class="mm-menu mm-theme-white mm-offcanvas mm-hasnavbar-top-1">
    <div class="mm-navbar mm-navbar-top mm-navbar-top-1 mm-hasbtns"><a class="mm-prev mm-btn mm-hidden"></a><a
            class="mm-title">Menu</a></div>
    <div class="mm-panel mm-opened mm-current" id="mm-1">
        <div class="mm-navbar"><a class="mm-title">Menu</a></div>
        <ul class="navmenu mm-listview mm-first mm-last">

            @foreach($productCategories as $category)
            <li class="iconmenu"><em class="mm-counter">{{$category->childs()->count()}}</em>
                <a class="mm-next" href="#mm-{{$category->id}}" data-target="#mm-{{$category->id}}"></a><a
                    href="{{route('Category', $category->slug)}}"><span></span>{{$category->name}}</a>
            </li>
            @endforeach

        </ul>
    </div>

    @foreach($productCategories as $category)

    <div class="mm-panel mm-hidden" id="mm-2">
        <div class="mm-navbar"><a class="mm-btn mm-prev" href="#mm-{{$category->id}}" data-target="#mm-{{$category->id}}"></a><a class="mm-title"
                                                                                                 href="#mm-{{$category->id}}"></a>
        </div>

        <ul class="mm-listview mm-first mm-last">
            @foreach($category->childs as $child)
            <li><a href="{{route('Category', $child->slug)}}">{{$child->name}}</a></li>
            @endforeach
        </ul>
    </div>
    @endforeach
</div>

<div id="bs-navbar">
    <div class="ruby-wrapper ">
        <nav class="nav-navbar clearfix navar_menu" id="bs-navbar">
            <ul class="ruby-menu">
                <li><a href="{{ route('homePage') }}">Trang chủ</a></li>
                @foreach(App\Model\Admin\Category::where('parent_id',0)->orderBy('sort_order','asc')->get() as $item)
                <li>
                    <a href="{{ route('Category',[$item->slug]) }}">{{ $item->name }}</a>
                    @if($item->getChilds()->count() > 0)
                    <ul class="">
                        @foreach ($item->getChilds() as $row)
                        <li><a href="{{ route('Category',[$row->parentSlug(), $row->slug]) }}">{{ $row->name }}</a></li>
                        @endforeach
                    </ul>
                    <span class="ruby-dropdown-toggle"></span>
                    @endif
                </li>
                @endforeach
                @foreach(App\Model\Admin\PostCategory::where('parent_id',0)->orderBy('sort_order','asc')->get() as $item)
                <li>
                    <a href="{{ route('postCategory',[$item->slug]) }}">{{ $item->name }}</a>
                    @if($item->getChilds()->count() > 0)
                    <ul class="">
                        @foreach ($item->getChilds() as $row)
                        <li><a href="{{ route('postCategory',[$row->parentSlug(), $row->slug]) }}">{{ $row->name }}</a></li>
                        @endforeach
                    </ul>
                    <span class="ruby-dropdown-toggle"></span>
                    @endif
                </li>
                @endforeach
                <li><a href="contact.html">Liên hệ</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
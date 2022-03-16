<header id="header" class="site-header d-none d-md-block">
    <div class="container">
        <div class="header-content row">
            <div class="col-md-12">
                <div class="menu-header-left float-left">
                    {!! printBlock(10) !!}
                </div>
                <div class="menu-header float-right">
                    <ul>
                        <li>
                            <i class="fas fa-phone-alt mr-2" style="color: #fff"></i>
                            <a class="header-phone" href="tel:{{ $config->hotline }}">{{ $config->hotline }}</a>
                        </li>
                        <li>
                            <div class="custom-button-1">
                                <i class="fas fa-map-marker-alt"></i>
                                <a href="{{ $config->location }}" target="_blank">Địa điểm siêu thị Lợi Toán</a>
                            </div>
                        </li>
                        <li>
                            <div class="custom-button-2">
                                <a href="{{ route('contact') }}">Yêu cầu hỗ trợ</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>

<header class="site-header header-mobile d-md-none d-lg-none d-xl-none d-sm-block">
    {{-- @include('front.blocks.menu') --}}
    <div class="mobile-logo">
        <a href="{{ route('homePage') }}"><img src="{{ $config->image->path }}" alt="{{ $config->web_title }}"></a>
    </div>
    @include('front.blocks.menu-button')
</header>
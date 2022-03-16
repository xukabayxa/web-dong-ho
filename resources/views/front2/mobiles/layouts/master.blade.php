<!DOCTYPE html>
<html lang="vi-vn" xml:lang="vi-vn">
<head>
    <title>@yield('title')</title>
    @include('front2.mobiles.partials.head')
    @yield('css')
</head>
<body id="body" class="page-home" ng-app="App">

@include('front2.mobiles.partials.menu_mobile')

<div id="mm-0" class="mm-page mm-slideout">
    <div class="Wrapper positionR">
        @include('front2.mobiles.partials.header')

        <main class="content-main">
            @yield('content')

            @include('front2.mobiles.partials.bottom')

        </main>

        @include('front2.mobiles.partials.footer')

    </div>

    <div id="buttonCallfix" class="support-online">
        <div class="">
            @if($config->click_call)
                <a href="tel:{{ $config->hotline }}" class="call-now" rel="nofollow">
                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                    <div class="animated infinite zoomIn alo-circle"></div>
                    <div class="animated infinite pulse alo-circle-fill"></div>
                </a>
            @endif
            @if($config->zalo)
                <a class="zalo" href="http://zalo.me/{{$config->zalo}}" target="_blank">
                    <img src="https://stc.sp.zdn.vn/chatwidget/images/stick_zalo.png">
                    <div class="animated infinite zoomIn alo-circle"></div>
                    <div class="animated infinite pulse alo-circle-fill"></div>
                </a>
            @endif
            @if($config->facebook)
                <a class="fb" href="{{$config->facebook}}" target="_blank">
                    <img src="/site/mobile/image/messenger.png">
                    <div class="animated infinite zoomIn alo-circle"></div>
                    <div class="animated infinite pulse alo-circle-fill"></div>
                </a>
            @endif
        </div>
    </div>
</div>


{{--<script type="text/javascript" src="https://beptot.vn/Content/mobile/js/app.pack.js?v=637745606011108275"></script>--}}
<script type="text/javascript" src="/site/mobile/js/app.pack.js?v=9989898989898"></script>
<script type="text/javascript"
        src="/site/mobile/js/jquery.mmenu.min.all.js?v=637745606035326587"></script>
<script type="text/javascript"
        src="/site/mobile/js/owl.carousel.min.js?v=637745606036732910"></script>
<script type="text/javascript"
        src="/site/mobile/js/sweetalert2.min.js?v=637746649587181723"></script>
<script type="text/javascript" src="/site/mobile/js/library.js"></script>

<!-- Angular Js -->

<script src="{{ asset('libs/angularjs/angular.js') }}"></script>
<script src="{{ asset('libs/angularjs/angular-resource.js') }}"></script>
<script src="{{ asset('libs/angularjs/sortable.js') }}"></script>
<script src="{{ asset('libs/dnd/dnd.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-sanitize.js"></script>
<script src="{{ asset('libs/angularjs/select.js') }}"></script>
<script src="{{ asset('js/angular.js') }}?version={{ env('APP_VERSION', '1') }}"></script>
@stack('scripts')

</body>
</html>

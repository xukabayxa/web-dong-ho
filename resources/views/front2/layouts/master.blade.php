<!DOCTYPE html>
<html lang="vi-vn" xml:lang="vi-vn">
<head>
    <title>@yield('title')</title>
    @include('front2.partials.head')
    @yield('css')
</head>
<body id="body" ng-app="App">

<div class="Wrapper">
    @include('front2.partials.header')

    <div class="content-main">
        @yield('content')
    </div>
    @include('front2.partials.footer')

</div>

<div class="back-to-top">
    <a href="javascript:;">
        <span class="fa fa-angle-up fa-2x"></span>
    </a>
</div>

<script type="text/javascript" src="/site/js/jquery.min.js?v=637741327701823527"></script>
<script type="text/javascript" src="/site/js/bootstrap.min.js?v=637741327701042548"></script>
<script type="text/javascript" src="/site/js/owl.carousel.min.js?v=637741327702448618"></script>
<script type="text/javascript" src="/site/js/home.ajax.js?v=637746664537278883"></script>
<script type="text/javascript" src="/site/js/library.js?v=637748404687986618"></script>

<!-- Angular Js -->
<script src="{{ asset('libs/angularjs/angular.js') }}"></script>
<script src="{{ asset('libs/angularjs/angular-resource.js') }}"></script>
<script src="{{ asset('libs/angularjs/sortable.js') }}"></script>
<script src="{{ asset('libs/dnd/dnd.min.js') }}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.9/angular-sanitize.js"></script>
<script src="{{ asset('libs/angularjs/select.js') }}"></script>
<script src="{{ asset('js/angular.js') }}?version={{ env('APP_VERSION', '1') }}"></script>
@stack('scripts')
@if($config->click_call)
@include('front.blocks.click-call')
@endif

@if($config->facebook)
@include('front.blocks.facebookchat')
@endif

@if($config->zalo)
@include('front.blocks.zalo')
@endif
</body>
</html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    @yield('title')
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{$config->favicon->path ?? ''}}">

    <!-- CSS ============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/site/assets/css/vendor/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="/site/assets/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="/site/assets/css/vendor/simple-line-icons.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="/site/assets/css/plugins/animation.css">
    <link rel="stylesheet" href="/site/assets/css/plugins/slick.css">
    <link rel="stylesheet" href="/site/assets/css/plugins/animation.css">
    <link rel="stylesheet" href="/site/assets/css/plugins/nice-select.css">
    <link rel="stylesheet" href="/site/assets/css/plugins/fancy-box.css">
    <link rel="stylesheet" href="/site/assets/css/plugins/jqueryui.min.css">

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="/site/assets/css/style.css">
    <link rel="stylesheet" href="/site/assets/css/loading.css">
    <!--<link rel="stylesheet" href="/site/assets/css/style.min.css">-->
    <link rel="stylesheet" type="text/css" href="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.tutorialjinni.com/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />

    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet" />

    @yield('css')
    <style>
        .single-product-area .product-thumb .action-links a.active-wishlist {
            background-color: #C71201;
            color: #fff;
        }
    </style>

    <style>
        @media only screen and (max-width: 768px) {
            .action-links {
                display: none;
            }

            .product-caption {
                display: none;
            }

            .label_new{
                display: none;
            }

            .col-4-custom {
                padding-left: 0 !important;
            }

            .price-reponsive {
                position: absolute;
                display: block;
                padding: 1px 3px 1px 3px;
                border-radius: 0px 20px 20px 0px;
                left: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.4);
            }
        }

        @media only screen and (min-width: 768px) {
            .price-reponsive {
                display: none;
            }
        }

    </style>

    <style>
        #toast-container {
            text-align: center;
            z-index: 9999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999999
        }

        .toast-top-center {
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            margin: auto;
            /*width: 50px;*/
            height: 50px;
        }

        #toast-container.toast-bottom-center>div, #toast-container.toast-top-center>div {
            width: 400px;
            height: 70px;
            margin-left: auto;
            margin-right: auto;
        }
        #toast-container>div{
            padding: 20px 0 0 0;

        }
        #toast-container>.toast-success {
            font-weight: bold;
            background-color: #cf834f !important;
            background-image: none !important;
        }
    </style>

    <style>
        .search-box-inner-wrap .results-box {
            color: #555;
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 9999;
            width: 100%;
            background-color: #fff;
            -webkit-box-shadow: 0 2px 6px 0 rgb(50 50 50 / 33%);
            -moz-box-shadow: 0 2px 6px 0 rgba(50,50,50,.33);
            box-shadow: 0 2px 6px 0 rgb(50 50 50 / 33%);
        }

        .search-box-inner-wrap .results-box a {
            background-color: #fff;
            padding: 5px;
            font-size: 14px;
            display: block;
        }

        .search-box-inner-wrap .results-box .history {
            position: relative;
            z-index: 2;
            display: flex;
            flex-flow: column;
        }

        .search-box-inner-wrap .results-box a .img {
            text-align: center;
            float: left;
            width: 40px;
            margin-right: 5px;
        }

        .search-box-inner-wrap .results-box a .d-title {
            text-transform: none;
            margin-bottom: 0;
            margin-top: 0;
            color: #303846;
            line-height: 18px;
            text-transform: capitalize;
        }

        .search-box-inner-wrap .results-box a .d-title.d-price {
            color: #fcaf17!important;
            font-family: svn-gilroy bold;
        }

    </style>

    <style>
        .lds-ellipsis {
            display: inline-block;
            position: relative;
            /*width: 70px;*/
            height: 60px;
        }
        .lds-ellipsis div {
            position: absolute;
            top: 15px;
            width: 13px;
            height: 13px;
            border-radius: 50%;
            background: #fff;
            animation-timing-function: cubic-bezier(0, 1, 1, 0);
        }
        .lds-ellipsis div:nth-child(1) {
            left: 8px;
            animation: lds-ellipsis1 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(2) {
            left: 8px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(3) {
            left: 32px;
            animation: lds-ellipsis2 0.6s infinite;
        }
        .lds-ellipsis div:nth-child(4) {
            left: 56px;
            animation: lds-ellipsis3 0.6s infinite;
        }
        @keyframes lds-ellipsis1 {
            0% {
                transform: scale(0);
            }
            100% {
                transform: scale(1);
            }
        }
        @keyframes lds-ellipsis3 {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(0);
            }
        }
        @keyframes lds-ellipsis2 {
            0% {
                transform: translate(0, 0);
            }
            100% {
                transform: translate(24px, 0);
            }
        }
    </style>
</head>

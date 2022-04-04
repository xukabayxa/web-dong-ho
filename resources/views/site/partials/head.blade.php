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

        @media only screen and (max-width: 768px) {
            .action-links {
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
</head>

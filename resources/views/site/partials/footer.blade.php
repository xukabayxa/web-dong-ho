<!-- footer Start -->
<footer class="section-pt">
    <div class="footer-top section-pb section-pt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">

                    <div class="widget-footer mt-40">
                        <h6 class="title-widget">Thông tin liên hệ</h6>

                        <div class="footer-addres">
                            <div class="widget-content mb--20">
                                <p>Địa chỉ: {{$config->address}}</p>
                                <p>Phone: <a href="tel:{{$config->zalo}}">{{$config->zalo}}</a></p>
                                <p>Hotline: <a href="tel:{{$config->zalo}}">{{$config->hotline}}</a></p>
                                <p>Email: <a href="#">{{$config->email}}</a></p>
                            </div>
                        </div>

                        <ul class="social-icons">
                            <li>
                                <a class="facebook social-icon" href="{{$config->facebook}}" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a class="twitter social-icon" href="{{$config->twitter}}" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                            </li>
                            <li>
                                <a class="instagram social-icon" href="{{$config->instagram}}" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>

                    </div>

                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget-footer mt-40">
                        <h6 class="title-widget">Sản phẩm</h6>
                        <ul class="footer-list">
                           @foreach($product_categories as $p_cate)
                                <li><a href="{{route('front.category_product', $p_cate->slug)}}">{{$p_cate->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                    <div class="widget-footer mt-40">
                        <h6 class="title-widget">Blog</h6>
                        <ul class="footer-list">
                            @foreach($post_categories as $post_cate)
                            <li><a href="{{route('front.news', $post_cate->slug)}}">{{$post_cate->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="widget-footer mt-40">
                        <h6 class="title-widget">Về chúng tôi</h6>
                        <p>{{$config->web_des}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copy-left-text">
                        <p>Copyright &copy; <a href="#">DNS</a> 2022. {{ucfirst($_SERVER['HTTP_HOST'])}}</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="copy-right-image">
                        <img src="site/assets/images/icon/img-payment.png" alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer End -->

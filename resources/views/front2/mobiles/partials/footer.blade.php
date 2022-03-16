<footer id="footer">

    <div class="col-xs-6 col-sm-6 col-md-25">
        <div class="single-text res-text">
            <div class="footer-title">
                <h4>Thông tin công ty</h4>
            </div>
            <div class="footer-menu">
                <ul>

                    <li>
                        <a href="{{route('About')}}" title="Giới thiệu" rel="nofollow">Giới thiệu</a>
                    </li>

                    <li>
                        <a href="" title="Tuyển dụng" rel="nofollow">Tuyển dụng</a>
                    </li>

                </ul>
            </div>
        </div>
    </div>

    <div class="col-xs-6 col-sm-6 col-md-25">
        <div class="single-text res-text">
            <div class="footer-title">
                <h4>Hỗ trợ khách hàng</h4>
            </div>
            <div class="footer-menu">
                <ul>
                    @foreach($policies as $policy)
                        <li><a rel="nofollow" href="{{route('policy', $policy->id)}}"
                               title="{{$policy->title}}">{{$policy->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

    <section class="lienketchungtoi">
        <div class="container">
            <h3>Liên kết với chúng tôi</h3>
            <a href="{{$config->facebook}}" class="icon" target="_blank" rel="nofollow">
            <span class="bxic">
                <div class="ic icon-facebook">
                    <i class="fa fa-facebook"></i>
                </div>
            </span>
                <span>facebook</span>
            </a>

            <a href="{{$config->youtube}}" class="icon" target="_blank" rel="nofollow">
            <span class="bxic">
                <div class="ic icon-youtube">
                    <i class="fa fa-youtube"></i>
                </div>
            </span>
                <span>youtube</span>
            </a>

{{--            <a href="" class="icon" target="_blank" rel="nofollow">--}}
{{--            <span class="bxic">--}}
{{--                <div class="ic icon-zalo">--}}
{{--                    <i class="fa"><strong>zalo</strong></i>--}}
{{--                </div>--}}
{{--            </span>--}}
{{--                <span>Zalo</span>--}}
{{--            </a>--}}
        </div>
    </section>
    <section class="infoCompany">
        <div class="container">
            <div class="block-cpn">
                <h5>© 2022 - Bản quyền thuộc về Tic.vn</h5>
                <p>
                    Địa chỉ trụ sở:
                </p>
            </div>
            <div class="block" style="float: left;">
                <a href="http://online.gov.vn/Home/WebDetails/29602" rel="noreferrer" aria-label="">
                    <img src="/Content/desktop/images/logo-noikhonghanggia.png" width="36" alt="">
                    <img src="/Content/desktop/images/dathongbao.png" width="120" alt="">
                </a>
            </div>
        </div>
    </section>

</footer>

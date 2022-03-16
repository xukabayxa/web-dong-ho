<footer id="footer">
    <section class="footer_top">
        <div class="container">
            <div class="row">
                <ul class="list-footer">


                    <li>
                        <div class="footer-title">
                            <div class="logo-f">
                                <a href="{{route('homePage')}}">
                                    <img src="{{$config->image->path ?? asset('site/image/'.$config->site_logo)}}" alt=""></a>
                            </div>
                        </div>
                        <div class="bg-ft">
                            <ul class="list-mn">
                                <li>
                                    <span>Hotline: <a href="tel:{{$config->hotline}}"><strong>{{$config->hotline}}</strong></a></span>
                                </li>
                                <li>
                                    <span>Tổng đài: <a href="tel:{{$config->phone_switchboard}}"><strong>{{$config->phone_switchboard}} </strong></a></span>
                                </li>
                                <li>
                                    <span>Zalo: <a href="tel:{{$config->zalo}}"><strong>{{$config->zalo}}</strong></a></span>
                                </li>
                            </ul>
                        </div>
                        <div class="mb10">
                            <h3>Bạn có thể thanh toán với</h3>
                            <div class="payment-img">
                                <img class="icon" src="https://beptot.vn/Content/desktop/images/visa.svg" width="54" alt="">
                                <img class="icon" src="https://beptot.vn/Content/desktop/images/mastercard.svg" width="54" alt="">
                                <img class="icon" src="https://beptot.vn/Content/desktop/images/jcb.svg" width="54" alt="">
                                <img class="icon" src="https://beptot.vn/Content/desktop/images/cash.svg" width="54" alt="">
                                <img class="icon" src="https://beptot.vn/Content/desktop/images/internet-banking.svg" width="54"
                                     alt="">
                                <img class="icon" src="https://beptot.vn/Content/desktop/images/installment.svg" width="54" alt="">
                            </div>
                        </div>
                    </li>


                    <li>
                        <p class="heading">Thông tin công ty</p>
                        <div class="bg-ft">
                            <ul class="list-mn">

                                <li><a rel="nofollow" href="{{route('About')}}" title="Giới thiệu">Giới
                                        thiệu</a></li>

                                <li><a rel="nofollow" href="" title="Tuyển dụng">Tuyển
                                        dụng</a></li>

                            </ul>
                        </div>
                    </li>


                    <li>
                        <p class="heading">Hỗ trợ khách hàng</p>
                        <div class="bg-ft">
                            <ul class="list-mn">

                                @foreach($policies as $policy)
                                    <li><a rel="nofollow" href="{{route('policy', $policy->id)}}"
                                           title="{{$policy->title}}">{{$policy->title}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </li>


                    <li>

                        <div class="single-text res-text">
                            <div class="mb10">
                                <h3>Kết nối với chúng tôi</h3>
                                <div class="social-footer">
                                    <a href="{{$config->facebook}}" title="Facebook" rel="nofollow"><i class="fa fa-facebook-square"></i></a>
                                    <a href="{{$config->twitter}}" title="Twitter" rel="nofollow"><i class="fa fa-twitter"></i></a>
                                    <a href="{{$config->instagram}}" title="Instagram" rel="nofollow"><i class="fa fa-instagram"></i></a>
                                    <a href="{{$config->youtube}}" title="Youtube" rel="nofollow"><i class="fa fa-youtube-play"></i></a>
                                </div>
                            </div>
{{--                            <a href="{{$config->facebook}}">--}}
{{--                                <img class="lazy" src="https://beptot.vn/Content/desktop/images/fb_beptot.png"/>--}}
{{--                            </a>--}}

                        </div>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <section class="footer_middle">
        <div class="container">
            @if(count($stores) > 0)
            <div class="row">
                <?php
                    $chunkStores = $stores->chunk(4)->take(2);

                ?>

                <div>
                    <div class="row">
                        <div class="col-md-12 title-showroom">HỆ THỐNG CỬA HÀNG</div>
                        <div class="col-md-4 footer-new-left">
                            @foreach($chunkStores->take(1)[0] as $key => $stores)

                            <h3>Showroom khu vực {{$key}}</h3>

                            <?php
                                $store_first = $stores[0];
                                ?>
                            @foreach($stores as $store)

                            <button type="button" class="address-link" data-value="1" id="map{{$store->id}}"
                                    data-map="
                <iframe src='https://maps.google.com/maps?q={{$store->lat}},{{$store->long}}&hl=es&z=14&amp;output=embed' class='map-iframe' width='100%' height='400' style='border:0;' allowfullscreen=''
                loading='lazy'></iframe>"
                                    onclick="ShowMap({{$store->id}},'{{$store->name}}','{{$store->phone}}','{{$store->hotline}}','{{$store->des}}');">
                                <i class="fa fa-home icon-2"></i>{{$store->address}}<i
                                    class="fa fa-arrow-circle-o-right icon-1"></i></button>
                            @endforeach
                            @endforeach


                        </div>

                        <div class="col-md-4 footer-new-center address-content">

                            <h3 id="ShowroomName">{{$store_first->name}}</h3>
                            <p id="ShowroomAddress">{{$store_first->address}}</p>
                            <p>Điện thoại: <strong><a href="tel:{{$store_first->phone}}" id="ShowroomPhone1">{{$store_first->phone}} </a></strong>-
                                Hotline: <strong><a href="tel:{{$store_first->hotline}}" id="ShowroomPhone2">{{$store_first->hotline}}</a></strong>
                            </p>
                            <hr style="width: 100%; background: #fff">
                            <div id="mapnopop">
                                <iframe src='https://maps.google.com/maps?q={{$store_first->lat}},{{$store_first->long}}&hl=es&z=14&amp;output=embed' class='map-iframe' width='100%' height='400' style='border:0;' allowfullscreen=''
                                        loading='lazy'></iframe>
                            </div>

                        </div>


                        @if(count($chunkStores) > 1)
                        <div class="col-md-4 footer-new-left footer-new-right">

                            @foreach($chunkStores->take(-1)[1] as $key => $stores)

                                <h3>Showroom khu vực {{$key}}</h3>


                                @foreach($stores as $storeRight)
                                    <button type="button" class="address-link" data-value="1" id="map{{$storeRight->id}}"
                                            data-map="
                <iframe src='https://maps.google.com/maps?q={{$storeRight->lat}},{{$storeRight->long}}&hl=es&z=14&amp;output=embed' class='map-iframe' width='100%' height='400' style='border:0;' allowfullscreen=''
                loading='lazy'></iframe>"
                                            onclick="ShowMap({{$storeRight->id}},'{{$storeRight->name}}','{{$storeRight->phone}}','{{($storeRight->hotline)}}','{{$storeRight->des}}')">
                                        <i class="fa fa-home icon-2"></i>{{$storeRight->address}}<i
                                            class="fa fa-arrow-circle-o-right icon-1"></i></button>
                                @endforeach
                            @endforeach

                        </div>
                        @endif
                        <script type="text/javascript">
                            function ShowMap(mapID, name, phone1, phone2, address) {
                                var map = $("#map" + mapID).data("map");
                                $("#ShowroomName").text(name);
                                $("#ShowroomPhone1").text(phone1);
                                $("#ShowroomPhone2").text(phone2);
                                $("#ShowroomAddress").text(address);
                                $("#mapnopop").html(map);
                            }
                        </script>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </section>


    <section class="footer_bottom">
        <div class="container">
            <div class="row">
                <div class="block-cpn">
                    <h5>© {{ date('Y') }} - Bản quyền thuộc về Tic.vn</h5>
                    <p>
                        Địa chỉ trụ sở: {{ $config->adress }}
                    </p>
                </div>
                <div class="block" style="float: left;">
                    <a href="#" rel="noreferrer" aria-label="">
                        <img src="https://beptot.vn/Content/desktop/images/logo-noikhonghanggia.png" width="36"
                             alt="">
                        <img src="https://beptot.vn/Content/desktop/images/dathongbao.png" width="120" alt="">
                    </a>
                </div>
            </div>
        </div>
    </section>

</footer>

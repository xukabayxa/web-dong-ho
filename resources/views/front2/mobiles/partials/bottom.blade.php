<section class="tongdaibottom">
    <div class="container">
        <div class="media">
            <div class="bottom-logo">
                <img src="{{$config->image->path ?? asset('site/image/logo_mau.png')}}" alt="">
            </div>
            <div class="media-body">
                <h4 class="media-heading">Hotline: <a href="tel:{{$config->hotline}}" rel="nofollow"><strong>{{$config->hotline}}</strong></a></h4>
                <h4 class="media-heading">Tổng đài: <a href="tel:{{$config->phone_switchboard}}" rel="nofollow"><strong>{{$config->phone_switchboard}} </strong></a></h4>
                <h4 class="media-heading">Zalo: <a href="tel:{{$config->zalo}}" rel="nofollow"><strong>{{$config->zalo}}</strong></a></h4>
            </div>
        </div>
    </div>
</section>

<section class="infoBotom">
    <div class="foot-head">
        Hệ thống Showroom
    </div>

    @php
    $index = 1;
    @endphp

    @foreach($stores as $key => $s)
        <?php
        $index += 1;
        ?>
    <h4><a href="javascript:void(0)" class="clickmenuBottom" data-toggle="collapse" data-target="#{{$index}}-bottom"
           rel="nofollow"><span class="count-address">{{count($s)}}</span> Showroom khu vực {{$key}}</a></h4>
    <div id="{{$index}}-bottom" class="panel-collapse collapse">
        <span class="view-detail-shr"><i>(Click để xem chi tiết showroom)</i></span>
        <ul>

            @foreach($s as $store)
            <li>
                <a href="javascript:void(0)" id="map{{$store->id}}"
                   onclick="ShowMapMobile({{$store->id}},'{{$store->name}}','{{$store->phone}}','{{$store->hotline}}','{{$store->des}}');"
                   data-map="
                <iframe src='https://maps.google.com/maps?q={{$store->lat}},{{$store->long}}&hl=es&z=14&amp;output=embed' class='map-iframe' width='100%' height='400' style='border:0;' allowfullscreen=''
                loading='lazy'></iframe>"
                   rel="nofollow"><i class="fa fa-map-marker" aria-hidden="true"></i>{{$store->address}}
                </a>
                <span>Điện thoại: <strong><a href="tel:{{$store->phone}}"
                                             id="ShowroomPhone1">{{$store->phone}} </a></strong>- Hotline: <strong><a
                            href="tel:{{$store->hotline}}" id="ShowroomPhone2">{{$store->hotline}}</a></strong></span>
            </li>
            @endforeach

        </ul>
    </div>
    @endforeach
</section>


<div class="modal fade" id="modal-map">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function ShowMapMobile(mapID, name) {
        var map = $("#map" + mapID).data("map");
        $("#modal-map").modal("show");
        $(".modal-title").text(name);
        $(".modal-body").html(map);
    }
</script>

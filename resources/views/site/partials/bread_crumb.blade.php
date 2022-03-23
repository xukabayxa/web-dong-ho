
<div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{route('front.home_page')}}">Trang chủ</a></li>
                    @if($type == 'product_detail')
                        <li class="breadcrumb-item">Sản phẩm</li>
                    @elseif($type == 'post_detail')
                        <li class="breadcrumb-item">Tin tức</li>
                    @endif
                    <li class="breadcrumb-item active">{{$title}}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

@extends('layouts.master_front')

@section('page_title')
{{ $product->name }}
@endsection

@section('css')
<link rel="stylesheet" href="{{ asset('libs/owl/dist/assets/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('libs/owl/dist/assets/owl.theme.default.min.css') }}">
@endsection

@section('content')
<nav aria-label="Page breadcrumb">
  <div class="container">
    <ol class="breadcrumb">
      <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
      <li class="breadcrumb-item">Lọc nước Aosmith</li>
    </ol>
  </div>
</nav>
<section id="product_detail">
  <div class="container">
    <div class="row">
      <div class="border-wrap">
        <div class="col-sm-6 col-p-2 order-md-12">
          <div class="outer">
            <div id="big" class="owl-carousel owl-theme">
              @foreach($product->galleries as $row)
              <div class="item">
                <img src="{{ $row->image->path }}" alt="{{ $row->image->name }}">
              </div>
              @endforeach
            </div>
            <div id="thumbs" class="owl-carousel owl-theme">
              @foreach($product->galleries as $row)
              <div class="item">
                <img src="{{ $row->image->path }}" alt="{{ $row->image->name }}">
              </div>
              @endforeach
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-p-1 order-md-1">
          <div class="col-detail-info">
            <h1 class="product-title">
              {{ $product->name }}
            </h1>
            <div class="product-introduct mb-4">
              {!! $product->intro !!}
            </div>
            <div class="cart-price mb-3">
              <label for="" style="font-weight: 700">Giá bán:</label> <strong style="color: #1A4C3E; font-size: 22px">{{ formatCurrency($product->price) }}</strong>
              @if($product->base_price)
              <label for="" style="font-weight: 700">Giá gốc:</label> <strong style="color: #777; font-size: 18px;text-decoration: line-through">{{ formatCurrency($product->base_price) }}</strong>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="product-body mb-4 col-sm-12">
        <div id="body">
          <div class="body-inner">
            <h4 class="mb-4">{{ $product->name }}:</h4>
            {!! $product->body !!}
          </div>
        </div>
      </div>

      <div class="relate-product col-sm-12">
        <h3 class="relate-title mb-4 mt-5">Sản phẩm liên quan</h3>
        <div class="relate-intro mb-5">
          {!! printBlock(2) !!}
        </div>

        <div class="row">
          @foreach($relate_products as $row)
          <div class="col-sm-6 mb-5">
            <div class="p-inner">
              <img src="{{ $row->image->path }}" alt="" class="p-img-small">
              <div class="p-info-d">
                <h3>{{ $row->name }}</h3>
                <p>{{ $row->short_des }}</p>
                <a class="view-more" href="{{ route('Product', $row->slug) }}">
                  Chi tiết
                  <img src="{{ asset('img/icons/arrow.svg') }}" alt="Arrow" width="30" height="30"><br>
                </a>
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
@section('script')
<script type="text/javascript" src="{{ asset('libs/owl/dist/owl.carousel.min.js') }}"></script>
<script>
  $(document).ready(function() {
  var bigimage = $("#big");
  var thumbs = $("#thumbs");
  //var totalslides = 10;
  var syncedSecondary = true;

  bigimage
    .owlCarousel({
    items: 1,
    slideSpeed: 2000,
    nav: true,
    autoplay: true,
    dots: false,
    loop: true,
    responsiveRefreshRate: 200,
    navText: [
      '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
      '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
    ]
  })
    .on("changed.owl.carousel", syncPosition);

  thumbs
    .on("initialized.owl.carousel", function() {
    thumbs
      .find(".owl-item")
      .eq(0)
      .addClass("current");
  })
    .owlCarousel({
    items: 4,
    dots: true,
    nav: true,
    navText: [
      '<i class="fa fa-arrow-left" aria-hidden="true"></i>',
      '<i class="fa fa-arrow-right" aria-hidden="true"></i>'
    ],
    smartSpeed: 200,
    slideSpeed: 500,
    slideBy: 4,
    responsiveRefreshRate: 100
  })
    .on("changed.owl.carousel", syncPosition2);

  function syncPosition(el) {
    //if loop is set to false, then you have to uncomment the next line
    //var current = el.item.index;

    //to disable loop, comment this block
    var count = el.item.count - 1;
    var current = Math.round(el.item.index - el.item.count / 2 - 0.5);

    if (current < 0) {
      current = count;
    }
    if (current > count) {
      current = 0;
    }
    //to this
    thumbs
      .find(".owl-item")
      .removeClass("current")
      .eq(current)
      .addClass("current");
    var onscreen = thumbs.find(".owl-item.active").length - 1;
    var start = thumbs
    .find(".owl-item.active")
    .first()
    .index();
    var end = thumbs
    .find(".owl-item.active")
    .last()
    .index();

    if (current > end) {
      thumbs.data("owl.carousel").to(current, 100, true);
    }
    if (current < start) {
      thumbs.data("owl.carousel").to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if (syncedSecondary) {
      var number = el.item.index;
      bigimage.data("owl.carousel").to(number, 100, true);
    }
  }

  thumbs.on("click", ".owl-item", function(e) {
    e.preventDefault();
    var number = $(this).index();
    bigimage.data("owl.carousel").to(number, 300, true);
  });
});
</script>
@endsection
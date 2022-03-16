@extends('layouts.master_front')

@section('page_title')
{{ $cate->name }}
@endsection

@section('content')
<nav aria-label="Page breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
            <li class="breadcrumb-item">{{ App\Model\Admin\Category::where('id', $cate->parent_id)->first()->name }}</li>
            <li class="breadcrumb-item">{{ $cate->name }}</li>
        </ol>
    </div>
</nav>
<section class="cate-banner">
    <img src="{{ $cate->banner ? $cate->banner->path : null}}" alt="" style="width:100%; height: 100%">
</section>
<section class="cate-products">
    <div class="container">
        <div class="product-option">
            <div class="row">
                @foreach($products as $row)
                <div class="col-sm-6 cate-item-p mb-4">
                    <div class="product-wrapper">
                        <strong class="quality-prod">{{ $cate->name }}</strong>
                        <div class="product-details">
                            <div class="product-title-section mb-3">
                                <a href="{{ route('Product', $row->slug) }}" title="{{ $row->name }}">
                                    <h2 class="product-title">{{ $row->name }}</h2>
                                </a>
                            </div>
                            <div class="product-description">
                                {!! $row->short_des !!}
                            </div>
                            <div class="product-cta">
                                <a class="see-more-link" href="{{ route('Product', $row->slug) }}">Xem chi tiết</a>
                                <!--  -->
                            </div>
                        </div>
                        <div class="product-image">
                            <img src="{{ $row->image ? $row->image->path : null }}" alt="{{ $row->image->name }}">
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
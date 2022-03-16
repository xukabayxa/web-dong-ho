@extends('layouts.master_front')

@section('page_title')
{{ $cate->name }}
@endsection

@section('content')
<div class="container">
    <nav aria-label="Page breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
            <li class="breadcrumb-item">{{ $cate->name }}</li>
        </ol>
    </nav>
    <section class="category-detail mb-5">
        <div class="row">
            <div class="col-sm-6 category-img">
                <img src="{{ $cate->image->path }}" alt="">
            </div>
            <div class="col-sm-6 category-intro">
                <h2 class="category-name">{{ $cate->name }}</h2>
                <div class="category-img-bottom mb-4">
                    <img src="{{ asset('img/categories/title-separator-blue.webp') }}" alt="">
                </div>
                <div class="category-intro-text mb-3">
                    {!! $cate->intro !!}
                </div>

                {{-- <div class="category-btn-link">
                    <a class="btn btn-yellow" href="#" style="color: #fff;">Xem sản phẩm thuộc danh mục</a>
                </div> --}}

            </div>
        </div>
    </section>
    <section class="child-categories mb-4">
        <div class="row">
            @foreach($childs as $row)
            <div class="col-sm-6">
                <div class="child-cate-item mb-4 text-center">
                    <div class="child-cate-img mb-4">
                        <img src="{{ $row->image->path }}" alt="">
                    </div>

                    <h4 class="child-cate-name mb-3">{{ $row->name }}</h4>
                    <p class="text-center">
                        {{ $row->short_des }}
                    </p>
                    <div class="div child-cate-link">
                        <a class="btn btn-yellow" href="{{ route('Category',[$row->parentSlug(), $row->slug]) }}">Xem sản phẩm</a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </section>
</div>
@endsection
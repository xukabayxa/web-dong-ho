@extends('layouts.master_front')

@section('page_title')
{{ $cate->name }}
@endsection

@section('content')
<nav aria-label="Page breadcrumb">
    <div class="container">
        <ol class="breadcrumb">
            <li class="breadcrumb-item" aria-current="page"><a title="Trang chủ" href="{{ route('homePage') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active">{{ $cate->name }}</li>
        </ol>
    </div>
</nav>
<section id="blog">
    <div class="blog-wrap">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <h1 class="blog-title mb-4">
                    <p>{{ $cate->name }}<br>
                        <strong>{!! $cate->intro !!}</strong>
                    </p>
                </h1>
                <img src="{{ asset('img/icons/wave.svg') }}" alt="" class="mb-5 blog-wave">
            </div>
            <div class="col-sm-12 blog-list-posts">
                <div class="row">
                    @foreach($posts as $row)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <article class="box">
                            <div class="box-wrapper">
                                <div class="image-container">
                                    <a href="{{ route('Post', $row->slug) }}"><img src="{{ $row->image->path }}" class="" alt="{{ $row->image->name }}"></a>
                                </div>
                                <div class="content">
                                    <a href="{{ route('Post', $row->slug) }}">
                                        <h5>{{ $row->name }}</h5>
                                    </a>
                                    <p>{{ $row->intro }}</p>
                                </div>
                            </div>
                        </article>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
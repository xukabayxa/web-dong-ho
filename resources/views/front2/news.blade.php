@extends('front2.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            @if(@$cate)
                @include('front2.partials.bread_crumb', ['type' => 'posts',
                    'url' => route('Post'), 'title' => 'Tin tức', 'url2' => route('postCategory', $cate->slug), 'title2' => $cate->name])
            @else
                <ul class="breadcrumb" itemprop="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
                </ul>
                <br>
            @endif
            <section class="eurocook-page">
                <aside id="sidebar" class="er-sidebar">
                    <div class="news-menu">
                        <h3 class="title-news-menu">Danh mục tin tức</h3>
                        <ul class="list-news-menu">

                            @foreach($categories as $category)
                                <li><a href="{{route('postCategory', $category->slug)}}"
                                       title="{{$category->name}}">{{$category->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="newest-news">
                        <h3 class="title-newest-news">Mới nhất</h3>
                        <ul class="list-newest-news">
                            @forelse($postsLatest as $post)
                                <li class="item-newest-news">
                                    <div class="img-newest-news">
                                        <a href="{{route('Post.detail', $post->slug)}}"
                                           title="{{$post->name}}">
                                            <img src="{{$post->image->path ?? ''}}" alt="{{$post->name}}"></a>
                                    </div>
                                    <div class="text-newest-news">
                                        <h3 class="h3-title"><a
                                                href="{{route('Post.detail', $post->slug)}}"
                                                title="{{$post->name}}">
                                                {{$post->name}}</a></h3>
                                        <p class="p-date"><i
                                                class="fa fa-calendar"></i><span>{{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span>
                                        </p>
                                    </div>
                                </li>
                            @empty
                            @endforelse
                        </ul>
                    </div>

                    @foreach($categoryPostSpecial as $category)
                        <div class="hot-news">
                            <h3 class="title-hot-news">{{$category->name}}</h3>
                            <ul class="list-newest-news">
                                @foreach($category->posts as $post)
                                    <li class="item-newest-news">
                                        <div class="img-newest-news">
                                            <a href="{{route('Post.detail', $post->slug)}}"
                                               title="{{$post->name}}">
                                                <img src="{{$post->image->path ?? ''}}" alt="{{$post->name}}"></a>
                                        </div>
                                        <div class="text-newest-news">
                                            <h3 class="h3-title"><a
                                                    href="{{route('Post.detail', $post->slug)}}"
                                                    title="{{$post->name}}">
                                                    {{$post->name}}</a></h3>
                                            <p class="p-date"><i
                                                    class="fa fa-calendar"></i><span>{{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span>
                                            </p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </aside>

                <main class="er-main news-main">
                    <section class="box-category">
                        <div class="list-news-home">
                            {{--                            @forelse($postCateFirst as $postFirst)--}}
                            {{--                            <div class="col-md-3">--}}
                            {{--                                <div class="item">--}}
                            {{--                                    <a href="{{route('Post.detail', $postFirst->slug)}}" title="{{$postFirst->name}}" class="img">--}}
                            {{--                                        <img src="{{$postFirst->image->path ?? ''}}" alt="{{$postFirst->name}}"></a>--}}
                            {{--                                    <div class="info">--}}
                            {{--                                        <a href="{{route('Post.detail', $postFirst->slug)}}" title="{{$postFirst->name}}" class="name">--}}
                            {{--                                            {{$postFirst->name}}</a>--}}
                            {{--                                        <p class="summary">{{$postFirst->intro}}</p>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            @empty--}}
                            {{--                            @endforelse--}}
                        </div>
                    </section>

                    <section class="main-category">
                        <div class="row">
                            <div class="col-md-12">

                                @forelse($postCateSecond as $postsSecond)
                                    <div class="wp-item-tin-page">
                                        <div class="img-item-tin-page">
                                            <a href="{{route('Post.detail', $postsSecond->slug)}}"
                                               title="{{$postsSecond->name}}">
                                                <img src="{{$postsSecond->image->path ?? ''}}"
                                                     alt="{{$postsSecond->name}}"></a>
                                        </div>
                                        <div class="text-item-tin-page">
                                            <h3 class="h3-title"><a href="{{route('Post.detail', $postsSecond->slug)}}"
                                                                    title="{{$postsSecond->name}}">
                                                    {{$postsSecond->name}}</a>
                                            </h3>
                                            <p class="p-date"><i
                                                    class="fa fa-calendar"></i><span>{{\Carbon\Carbon::parse($postsSecond->created_at)->format('d/m/Y')}}</span>
                                            </p>
                                            <p class="p-post">{{$postsSecond->intro}}</p>
                                            <div class="btn-xem-them">
                                                <a href="{{route('Post.detail', $postsSecond->slug)}}"
                                                   class="btn btn-default xem-them">Xem thêm <i
                                                        class="fa fa-chevron-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <p>Chưa có bài viết</p>
                                @endforelse

                                {{ $postCateSecond->links('front2.pagination.paginate2') }}

                            </div>
                        </div>
                    </section>
                </main>
            </section>

        </div>
    </div>
@endsection

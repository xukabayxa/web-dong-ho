@extends('front2.layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            @if(@$cate)
                @include('front2.partials.bread_crumb', ['type' => 'posts',
                    'url' => route('Post'), 'title' => 'Tin tức', 'url2' => route('Post.detail', $post->slug), 'title2' => $post->name])
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
                                <li><a href="{{route('postCategory', $category->slug)}}" title="{{$category->name}}">{{$category->name}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <div class="newest-news">
                        <h3 class="title-newest-news">Mới nhất</h3>
                        <ul class="list-newest-news">
                            @foreach($postsLatest as $post)
                                <li class="item-newest-news">
                                    <div class="img-newest-news">
                                        <a href="{{route('Post.detail', $post->slug)}}l" title="{{$post->name}}">
                                            <img src="{{$post->image->path ?? ''}}" alt="{{$post->name}}"></a>
                                    </div>
                                    <div class="text-newest-news">
                                        <h3 class="h3-title"><a href="{{route('Post.detail', $post->slug)}}" title="{{$post->name}}">
                                                {{$post->name}}</a></h3>
                                        <p class="p-date"><i class="fa fa-calendar"></i><span>{{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span></p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    @foreach($categoryPostSpecial as $category)
                        <div class="hot-news">
                            <h3 class="title-hot-news">{{$category->name}}</h3>
                            <ul class="list-newest-news">
                                @foreach($category->posts as $post)
                                    <li class="item-newest-news">
                                        <div class="img-newest-news">
                                            <a href="{{route('Post.detail', $post->slug)}}" title="{{$post->name}}">
                                                <img src="{{$post->image->path ?? ''}}" alt="{{$post->name}}"></a>
                                        </div>
                                        <div class="text-newest-news">
                                            <h3 class="h3-title"><a href="{{route('Post.detail', $post->slug)}}" title="{{$post->name}}">
                                                    {{$post->name}}</a></h3>
                                            <p class="p-date"><i class="fa fa-calendar"></i><span>{{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span></p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </aside>

                <main class="er-main news-main">
                    <section class="main-category">
                        <article class="thumbnail-news-view">
                            <h1>{{$post->name}}</h1>
                            <p class="p-date-ct"><i
                                    class="fa fa-calendar"></i><span>{{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y')}}</span>
                            </p>
                            <div class="div-post-border">
                                {{$post->intro}}
                            </div>
                            <div class="post_content">
                                {!! $post->body !!}

                            </div>
                            <div class="other-news-detail">
                                <h2><span>Tin liên quan</span></h2>

                                <ul>

                                    @foreach($relate_posts as $p_relate)
                                        <li><span>
                            <a href="{{route('Post.detail', $p_relate->slug)}}"
                               title="{{$p_relate->name}}">
                                {{$p_relate->name}}</a></span>
                                        </li>
                                    @endforeach


                                </ul>
                            </div>
                        </article>
                    </section>
                </main>
            </section>

        </div>
    </div>
@endsection


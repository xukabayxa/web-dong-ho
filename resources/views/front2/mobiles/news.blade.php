@extends('front2.mobiles.layouts.master')

@section('content')
    <section class="slidemain2">
        <ul class="slide-cate">

            @foreach($bannersRight->take(2) as $banner)
                <li class="item-banner-cate">
                    <a href="{{$banner->link}}">
                        <img src="{{$banner->image->path ?? asset('site/image/no-image.png')}}"
                             alt="{{$banner->title}}">
                    </a>
                </li>
            @endforeach

        </ul>
    </section>


    <ol itemprop="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#" class="breadcrumb">
        <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="/" itemprop="url"><span itemprop="title">{{ucfirst($_SERVER['HTTP_HOST'])}}</span></a>
        </li>
        <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
            <a href="{{route('Post')}}" itemprop="url"><span itemprop="title">Tin tức</span></a>
        </li>
    </ol>


    <section class="newhome">
        <div class="container">
            <ul class="fixul listnewhome">

                @foreach($postCateSecond as $postsSecond)
                <li>
                    <div class="media">
                        <div class="media-left">
                            <a href="{{route('Post.detail', $postsSecond->slug)}}"
                               title="{{$postsSecond->name}}">
                                <img src="{{$postsSecond->image->path ?? ''}}"
                                     alt="{{$postsSecond->name}}">
                            </a>
                        </div>
                        <div class="media-body">
                            <h4 class="media-heading"><a href="{{route('Post.detail', $postsSecond->slug)}}"
                                                         title="{{$postsSecond->name}}">{{$postsSecond->name}}</a></h4>
                            <p class="datepost">{{\Carbon\Carbon::parse($postsSecond->created_at)->format('d/m/Y')}}</p>
                        </div>
                    </div>
                </li>
                @endforeach

            </ul>

            {{ $postCateSecond->links('front2.pagination.paginate2') }}
        </div>
    </section>
@endsection

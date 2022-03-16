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
    @include('front2.partials.bread_crumb', ['url' => route('policy', $policy->id),'title' => $policy->title ])
    <style type="text/css">

        .post_content {
            word-wrap: break-word;
            padding-bottom: 20px;
            line-height: 25px;
        }

        .post_content p > img {
            width: auto;
            max-width: 100%;
            margin: 10px auto;
            display: block;
        }

        .post_content p {
            margin-bottom: 10px;
        }

        .post_content.mcontent h1 {
            font-size: 24px;
            line-height: 30px;
            text-align: center;
            padding: 15px;
            color: #4a90e2;
        }
    </style>
    <div class="orderbox">
        <div class="boxFormPayment">
            <div class="post_content mcontent">
                {!! $policy->content !!}
            </div>
        </div>
    </div>
@endsection

@extends('front2.layouts.master')
@section('content')
    <div class="container">
        <div class="row">

            @include('front2.partials.bread_crumb', ['url' => route('policy', $policy->id), 'title' => $policy->title])

            <div class="orderbox">
                <div class="boxFormPayment">
                    <div class="post_content mcontent">
                        <h1><strong><a href="{{route('policy', $policy->id)}}">{{$policy->title}}</a></strong></h1>

                        {!! $policy->content !!}

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@extends('front2.layouts.master')

@section('content')
    <div class="container">
        <div class="row">

            @include('front2.partials.bread_crumb', ['url' => route('About'),'title' => 'Giới thiệu' ])


            <div class="orderbox">
                <div class="boxFormPayment">
                    <div class="post_content mcontent">
                       {!! $config->introduction  !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

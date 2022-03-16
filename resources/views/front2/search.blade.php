@extends('front2.layouts.master')
@section('content')
<div class="container">
    <div class="row">


        <ul class="breadcrumb" itemprop="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
            <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/" itemprop="url"><span itemprop="title">{{$_SERVER['HTTP_HOST']}}</span></a>
            </li>   <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
                <a href="/tim-kiem" itemprop="url"><span itemprop="title">Tìm kiếm</span></a>
            </li>


        </ul>

        <section class="box-category">
            <div class="sub_header_hot">
                <h1 class="title"><a href="javascript:void(0)" rel="nofollow">Kết quả tìm kiếm với từ khóa "{{$keyword}}"</a>
                </h1>
            </div>
            <ul class="list_product_featured ">

                @foreach($products as $product)
                <li>
                    @include('front2.partials.card_product', ['product' => $product, 'cate' => $product->category])
                </li>
                @endforeach

            </ul>
        </section>

    </div>
</div>
@endsection

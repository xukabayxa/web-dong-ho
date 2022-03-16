<ul class="breadcrumb" itemprop="breadcrumb" xmlns:v="http://rdf.data-vocabulary.org/#">
    <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="/" itemprop="url"><span itemprop="title">{{ucfirst($_SERVER['HTTP_HOST'])}}</span></a>
    </li>   <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="{{$url}}" itemprop="url"><span itemprop="title">{{$title}}</span></a>
    </li>

    @if(@$type == 'product_detail' || @$type == 'posts')
    </li>   <li itemscope="itemscope" itemtype="http://data-vocabulary.org/Breadcrumb">
        <a href="{{$url2}}" itemprop="url"><span itemprop="title">{{$title2}}</span></a>
    </li>
    @endif
</ul>

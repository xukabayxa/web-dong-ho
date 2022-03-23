@extends('site.layouts.master')
@section('content')
    <!-- breadcrumb-area start -->

    @include('site.partials.bread_crumb', ['type' => '','title' => 'Tin tức' ])

    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap blog-page">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <!-- blog-sidebar-wrap start -->
                    <div class="blog-sidebar-wrap section-pt">
                        <div class="blog-sidebar-widget-area">

                            <!--single-widget start  -->
                            <div class="single-widget search-widget mb-30">
                                <h4 class="widget-title">Tìm kiếm</h4>
                                <form action="#">
                                    <div class="form-input">
                                        <input type="text" placeholder="Search... ">
                                        <button class="button-search" type="submit"><i class="icon-magnifier"></i></button>
                                    </div>
                                </form>
                            </div>
                            <!--single-widget start end -->

                            <!--single-widget start  -->
                            <div class="single-widget mb-30">
                                <h4 class="widget-title">Danh mục</h4>
                                <!-- category-widget start -->
                                <div class="category-widget-list">
                                    <ul>
                                        @foreach($categories as $category)
                                        <li><a href="{{route('front.news', $category->slug)}}">{{$category->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- category-widget end -->
                            </div>
                            <!--single-widget end  -->
                        </div>
                    </div>
                    <!-- blog-sidebar-wrap end -->
                </div>
                <div class="col-lg-9 order-lg-2 order-1">

                    <div class="blog-wrapper section-pt">
                        <div class="row">
                            @foreach($posts as $post)
                            <div class="col-lg-6 col-md-6">
                               @include('site.partials.single_post', ['post' => $post])
                            </div>
                            @endforeach
                        </div>

                        <!-- paginatoin-area start -->
                            {{ $posts->links('site.pagination.paginate2') }}
                        <!-- paginatoin-area end -->

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection

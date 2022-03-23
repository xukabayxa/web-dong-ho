@extends('site.layouts.master')

@section('content')
    <!-- breadcrumb-area start -->
    @include('site.partials.bread_crumb', ['type' => 'post_detail','title' => $post->name ])

    <!-- breadcrumb-area end -->

    <!-- main-content-wrap start -->
    <div class="main-content-wrap shop-page section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <!-- blog-sidebar-wrap start -->
                    <div class="blog-sidebar-wrap">
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

                            <!--single-widget start  -->
                            <div class="single-widget mb-30">
                                <h4 class="widget-title">Bài viết mới</h4>

                                <div class="recent-post-widget">
                                    @foreach($postsRecent as $post_recent)
                                    <div class="single-widget-post">
                                        <div class="post-thumb">
                                            <a href="{{route('front.news',['slug' => $post_recent->category->slug, 'postSlug' => $post_recent->slug])}}"><img src="{{$post_recent->image->path ?? '/site/assets/images/blog/small-blog.jpg'}}" alt=""></a>
                                        </div>
                                        <div class="post-info">
                                            <h6 class="post-title"><a href="{{route('front.news',['slug' => $post_recent->category->slug, 'postSlug' => $post_recent->slug])}}">{{$post_recent->name}}</a></h6>
                                            <div class="post-date">{{$post_recent->created_at->format('d/m/Y H:i')}}</div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                            </div>
                            <!--single-widget end  -->
                        </div>
                    </div>
                    <!-- blog-sidebar-wrap end -->
                </div>
                <div class="col-lg-9 order-lg-2 order-1">

                    <div class="blog-wrapper">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- single-blog-wrap Start -->
                                <div class="single-blog-wrap mb-40">
                                    <div class="latest-blog-content mt-0">
                                        <h4><a href="">{{$post->name}}</a></h4>
                                        <ul class="post-meta">
                                            <li class="post-author"><a href="#">{{$post->user_create->name}} </a></li>
                                            <li class="post-date">{{$post->created_at->format('d/m/Y H:i')}}</li>
                                        </ul>
                                    </div>
                                    <div class="latest-blog-image">
{{--                                        <a href="blog-details.html"><img src="assets/images/blog/large-blog.jpg" alt=""></a>--}}
                                    </div>
                                    <div class="latest-blog-content mt-20">
                                        {!! $post->body !!}
                                    </div>

                                    <div class="meta-sharing">
                                        <div class="row align-items-center">
                                            <div class="col-lg-6">
                                                <div class="entry-meta mt-15">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <ul class="social-icons text-right">
                                                    <li>
                                                        <a class="facebook social-icon" href="#" title="Facebook" target="_blank"><i class="fa fa-facebook"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="twitter social-icon" href="#" title="Twitter" target="_blank"><i class="fa fa-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="instagram social-icon" href="#" title="Instagram" target="_blank"><i class="fa fa-instagram"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="linkedin social-icon" href="#" title="Linkedin" target="_blank"><i class="fa fa-linkedin"></i></a>
                                                    </li>
                                                    <li>
                                                        <a class="rss social-icon" href="#" title="Rss" target="_blank"><i class="fa fa-rss"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- single-blog-wrap End -->

                            </div>
                        </div>

                        <div class="related-post-blog-area">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h4>Bài viết liên quan</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @foreach($postsRelated as $post_related)
                                <div class="col-lg-4 col-md-6">
                                    <div class="single-latest-blog mt-30">
                                        <div class="latest-blog-image">
                                            <a href="{{route('front.news',['slug' => $post_related->category->slug, 'postSlug' => $post_related->slug])}}"><img src="{{$post_related->image->path ?? '/site/assets/images/blog/blog-05.jpg'}}" alt=""></a>
                                        </div>
                                        <div class="latest-blog-content mt-20">
                                            <h4><a href="{{route('front.news',['slug' => $post_related->category->slug, 'postSlug' => $post_related->slug])}}">{{$post_related->name}}</a></h4>
                                            <ul class="post-meta">
                                                <li class="post-date">{{$post->created_at->format('d/m/Y H:i')}}</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@endsection


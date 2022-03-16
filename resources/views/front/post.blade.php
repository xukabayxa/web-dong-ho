@extends('layouts.master_front')

@section('page_title')
{{ $post->name }}
@endsection


@section('content')
<nav aria-label="Page breadcrumb">
  <div class="container">
    <ol class="breadcrumb d-none d-md-block d-lg-block d-xl-block">
      <li class="breadcrumb-item active" aria-current="page">Trang chủ</li>
      <li class="breadcrumb-item">Tin tức</li>
      <li class="breadcrumb-item last">Ưu điểm của Lọc nước Aosmith</li>
    </ol>
  </div>
</nav>
<section id="post">
  <div class="post-wrap">
    <section class="redesign-post-hero">
      <div class="redesign-post-background">
        <div class="container-fluid">
          <div class="redesign-post-content-wrapper">
            <div class="redesign-post-content-wrapper-hero">
              <div class="redesign-post-hero-content">
                <div class="rd-post-hero-tags">
                  <a href="{{ route('postCategory', [$cate->slug, $post->slug]) }}" class="posts-tags" style="background-color: #0084ff"><span>{{ $cate->name }}</span></a>
                </div>
                <h1>{{ $post->name }}</h1>
                <p class="rdp-hero-excerpt"></p>
                <img src="{{ asset('css/images/wave.svg') }}" alt="Wave" class="wave">
              </div>
              <!-- ends: redesign-post-hero-content -->
              <div class="redesign-post-hero-media-content">
                <img src="{{ $post->image->path }}">
              </div>
            </div>
          </div>
          <!-- ends: redesign-post-wrapper -->
        </div>
        <!-- ends: container-fluid -->
      </div>
    </section>

    <div class="container-fluid">
      <div class="redesign-post-content-wrapper detail-post">
        <section class="redesign-post-hero-content-mobile">
          <div class="redesign-post-hero-media-content-mobile">
            <img src="{{ $post->image->path }}" class="" alt="well water testing">
          </div>
          <h1>{{ $post->name }}</h1>
          <div class="redesign-post-meta-data-mobile">
            <img class="rph-cm-waves" src="{{ asset('img/icons/CUL-Globalicons-New.svg') }}" alt="Wave">
          </div>
        </section>

        <section class="redesing-post-wrappe-inner">
          <div class="left-container rp-back-meta-data d-none d-md-block d-lg-block d-xl-block">
            <div class="left">
              <div class="redesign-post-left-sidebar">
                <a href="javascript:history.back()" class="history-back">Back</a>
              </div>
            </div>
            <div class="center">
            </div>
          </div>
          <div class="left-container">
            <div class="left d-none d-md-block d-lg-block d-xl-block">
              <div class="redesign-post-left-sidebar">
                <div class="redesign-post-share  d-none d-md-block d-lg-block d-xl-block" id="rd-post-share">
                  <div class="share-simple-wrapper">
                    <span class="share-label">Chia sẻ</span>
                    <div class="icons">
                      <a target="_blank" class="facebook fb-icon" href="" auto-tracked="true">Facebook</a>
                      <a target="_blank" class="twitter tw-icon" href="" auto-tracked="true">Twitter</a>
                      <a class="email-icon" href="mailto:{{ $config->email }}" auto-tracked="true">Email</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="center rdpc-center">
              <div class="redesign-post-content">
                {!! $post->body !!}
              </div> <!-- ends: redesign-post-content -->

              <div class="redesign-post-share d-sm-block d-md-none d-lg-none d-xl-none" id="rd-post-share">
                <div class="share-simple-wrapper">
                  <span class="share-label">Chia sẻ</span>
                  <div class="icons">
                    <a target="_blank" class="facebook fb-icon" href="" auto-tracked="true">Facebook</a>
                    <a target="_blank" class="twitter tw-icon" href="" auto-tracked="true">Twitter</a>
                    <a class="email-icon" href="mailto:info@culligan.com" auto-tracked="true">Email</a>
                  </div>
                </div>
                <div class="redesign-post-left-sidebar">
                  <a href="javascript:history.back()" class="history-back">Back</a>
                </div>
              </div>
            </div>
          </div> <!-- ends: left-container -->

          <div class="right-container">
            <div class="redesign-post-right-sidebar-desktop">
              <section class="redesign-post-related-articles">
                <h4>Bài viết cùng loại</h4>
                @foreach($relate_posts as $row)
                <article class="related-article-result">
                  <a href="{{ route('Post', $row->slug) }}" title="{{ $row->name }}">
                    <h6>{{ $row->name }}</h6>
                  </a>
                </article>
                @endforeach
              </section>
            </div>
            <!-- ends: redesign-right-sidebar -->
          </div>
          <!-- ends: redesign-right-sidebar -->
          <div class="redesign-post-right-sidebar">
            <section class="redesign-post-related-articles">
            </section>
          </div>
          <!-- ends: redesign-right-sidebar -->
        </section>
      </div>
      <!-- ends: redesign-post-wrapper -->
    </div>
  </div>
</section>
@endsection
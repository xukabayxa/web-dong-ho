<div class="singel-latest-blog">
    <div class="articles-image">
        <a href="{{route('front.news', ['slug' => $post->category->slug, 'postSlug' => $post->slug])}}">
            <img src="{{$post->image->path ?? 'site/images/blog/blog-01.jpg'}}" alt="">
        </a>
    </div>
    <div class="aritcles-content">
        <div class="author-name">
            <a href="#">{{$post->user_create->name}}</a> - {{\Carbon\Carbon::parse($post->created_at)->format('d/m/Y H:i')}}
        </div>
        <h4><a href="{{route('front.news', ['slug' => $post->category->slug, 'postSlug' => $post->slug])}}" class="articles-name">{{$post->name}}</a></h4>
    </div>
</div>

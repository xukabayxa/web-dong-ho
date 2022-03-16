<footer class="footer-main">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 logo-footer mb-5">
                <a href="#">
                    <img src="{{ $config->image->path }}" alt="" style="max-width: 275px">
                </a>
            </div>
            <div class="col-sm-12 intro-footer">
                {!! printBlock(5) !!}
            </div>
            <div class="col-sm-12 social-footer">
                <ul>
                    <li><a href="{{ $config->facebook }}"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="#"><i class="fab fa-youtube"></i></a></li>
                </ul>
            </div>
            <div class="col-sm-12 links-footer">
                <ul>
                    @foreach(App\Model\Admin\Category::where('parent_id',0)->orderBy('sort_order')->get() as $cate)
                    <li>
                        <label for="">{{ $cate->name }}</label>
                        @if($cate->getChilds())
                        <ul>
                            @foreach($cate->getChilds() as $row)
                            <li><a href="{{ route('Category',[$cate->slug, $row->slug]) }}">{{ $row->name }}</a></li>
                            @endforeach
                        </ul>
                        @endif
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="btn-wrapper back-to-top show"><a href="#top" class="btn btn-transparent"><i class="fa fa-angle-up"></i></a></div>
</footer>
@include('front.blocks.mobile_menu')

    <!-- Product Details Left -->
    <div class="product-large-slider product-large-slider-2">
        <div class="pro-large-img">
            <img src="{{$product->image->path ?? '/site/image/no-image.png'}}" alt="{{$product->name}}"/>
        </div>

        @foreach($product->galleries as $gallery)
            <div class="pro-large-img">
                <img src="{{$gallery->image->path ?? '/site/image/no-image.png'}}" alt="{{$product->name}}"/>
            </div>
        @endforeach

    </div>
    <div class="product-nav product-nav-2">
        <div class="pro-nav-thumb">
            <img src="{{$product->image->path ?? '/site/image/no-image.png'}}" alt="{{$product->name}}"/>
        </div>
        @foreach($product->galleries as $gallery)
            <div class="pro-nav-thumb">
                <img src="{{$gallery->image->path ?? '/site/image/no-image.png'}}" alt="{{$product->name}}"/>
            </div>
        @endforeach
    </div>


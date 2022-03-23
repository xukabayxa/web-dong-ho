@extends('site.layouts.master')

@section('content')
    @include('site.partials.bread_crumb', ['type' => '','title' => 'Về chúng tôi' ])

    <!-- Page Conttent -->
    <main class="about-us-page section-ptb">

        <div class="about-us_area section-pb">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="about-us_img">
                           {!! printBlock(16) !!}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-us_content">
                            <h3 class="heading mb-20">Về chúng tôi</h3>
                            <p class="short-desc mb-20">
                                {{$config->web_des}}
                            </p>
                            <div class="munoz-btn-ps_left slide-btn">
                                <a class="btn" href="{{route('front.home_page')}}">Quay lại</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="testimonials-area bg-gray section-ptb">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class=" testimonials-area">
                            <div class="row testimonial-two">
                                <div class="col-lg-6 ml-auto mr-auto">
                                    <div class="testimonial-wrap-two text-center">
                                        <div class="quote-container">
                                            <div class="quote-image">
                                                <img src="assets/images/testimonial/testimonial-01.jpg" alt="">
                                            </div>
                                            <div class="author">
                                                <h6>Niloba Khan</h6>
                                                <p>CEO of Hasbar</p>
                                            </div>
                                            <div class="testimonials-text">
                                                <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 ml-auto mr-auto">
                                    <div class="testimonial-wrap-two text-center">
                                        <div class="quote-container">
                                            <div class="quote-image">
                                                <img src="assets/images/testimonial/testimonial-02.jpg" alt="">
                                            </div>
                                            <div class="author">
                                                <h6>Devite oni</h6>
                                                <p>CEO of SunPark</p>
                                            </div>
                                            <div class="testimonials-text">
                                                <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 ml-auto mr-auto">
                                    <div class="testimonial-wrap-two text-center">
                                        <div class="quote-container">
                                            <div class="quote-image">
                                                <img src="assets/images/testimonial/testimonial-01.jpg" alt="">
                                            </div>
                                            <div class="author">
                                                <h6>Kathy Young</h6>
                                                <p>CEO of SunPark</p>
                                            </div>
                                            <div class="testimonials-text">
                                                <p>Support and response has been amazing, helping me with several issues I came across and got them solved almost the same day. A pleasure to work with them!</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--// Page Conttent -->

    <!-- our-brand-area start -->
    <div class="our-brand-area section-pb-30">
        <div class="container">
            <div class="row our-brand-active">
                <div class="brand-single-item">
                    <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
                </div>
                <div class="brand-single-item">
                    <a href="#"><img src="assets/images/brand/brand-01.png" alt=""></a>
                </div>
            </div>
        </div>
    </div>
    <!-- our-brand-area end -->

    <div class="newletter-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="newletter-wrap">
                        <div class="row align-items-center">
                            <div class="col-lg-7 col-md-12">
                                <div class="newsletter-title mb-30">
                                </div>
                            </div>

                            <div class="col-lg-5 col-md-7">
                                <div class="newsletter-footer mb-30">
                                    <input type="text" placeholder="Your email address...">
                                    <div class="subscribe-button">
                                        <button class="subscribe-btn">Subscribe</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

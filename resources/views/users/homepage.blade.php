@extends('layouts.base')

@section('title')
    Make It Memories | Homepage
@endsection

@section('content')
    <header id="header">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                @foreach ($sliders as $key => $slider)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key==0 ? 'active' : '' }}"
                    aria-current="true" aria-label="Slide {{ $key }}"></button> 
                @endforeach
            </div>
            <div class="carousel-inner">
                @foreach ($sliders as $key => $slider)
                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                        <div class="headerContainer" style="background: url({{ asset($slider->left_image) }}); background-repeat: no-repeat; background-size: auto;">
                            {{-- <div id="left-side">
                                <img src="{{ asset($slider->left_image) }}" class="left-image">
                            </div> --}}
                            <div class="text-center mx-auto my-5" style="flex: 2;">
                                <!-- Adjusted the width using 'flex: 2;' -->
                                <h2 class="text-body-emphasis mt-5" style="color: rgb(158, 37, 0) !important;">
                                    {{ $slider->title }}
                                </h2>
                                <div class="col-lg-6 mx-auto">
                                    <div>
                                        <label class="lead mt-5"
                                            style=" font-size: 15px;">{{ $slider->description }}</label>
                                    </div>
                                    <a href="/products" class="btn btn-lg px-4"
                                        style="border-radius: 12px; background: rgb(241, 235, 210); color: rgb(158, 37, 0); box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                        Create Your First Gallery
                                    </a>
                                    <div
                                        class="d-flex flex-wrap justify-content-center align-items-center text-center mt-5">
                                        <a href="{{ isset($social_link['facebook']) ? $social_link['facebook'] : '' }}"><img src="{{ asset('assets/images/fbicon.png') }}" alt="Facebook"
                                                style="width: 35px; height: 35px;"></a>
                                        <a href="{{ isset($social_link['instagram']) ? $social_link['instagram'] : '' }}"><img src="{{ asset('assets/images/instagramicon.png') }}"
                                                alt="Instagram" style="width: 35px; height: 35px;"></a>
                                        <a href="{{ isset($social_link['tiktok']) ? $social_link['tiktok'] : '' }}"><img src="{{ asset('assets/images/tiktokicon.png') }}"
                                                alt="TikTok" style="width: 35px; height: 35px;"></a>
                                    </div>
                                </div>
                            </div>
                            {{-- <div id="right-side">
                                <img src="{{ asset($slider->right_image) }}" class="right-image">
                                <img src="{{ asset('assets/images/LowOpacityLogoBGeffect.png') }}" class="background-image">
                            </div> --}}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </header>
    @include('admin.components.error_success_flash_message')

    <div class="container">
        <div class="row">
            <div class="col-md mx-auto">
                <div class="stepsIcon">
                    <div><img src="{{ asset('assets/images/icons/cameraicon.png') }}" alt=""
                            style="width: 30px;
                        height: 28px;"> <span class="stepText">Take
                            Photos</span></div>
                    <div><img src="{{ asset('assets/images/icons/scanicon.png') }}" alt=""
                            style="width: 22px;
                        height: 30px; margin-right: 3px"><span
                            class="stepText">Scan</span>
                    </div>
                    <div><img src="{{ asset('assets/images/icons/uploadicon.png') }}" alt=""
                            style="width: 22px;
                        height: 30px; margin-right: 3px;"><span
                            class="stepText">Share</span>
                    </div>
                    <div><img src="{{ asset('assets/images/icons/photoicon.png') }}" alt=""
                            style="width: 30px;
                        height: 28px; margin-right: 3px;"><span
                            class="stepText">Create
                            Memories</span></div>
                </div>
                <div class="cardContainer row">
                   
                    @foreach ($cards as $card)
                    <div class="col-lg-4 mb-4 cardFrame">
                        <div class="card mx-auto"
                            style="width: 300px; background: rgb(255, 255, 241); border: none; padding: 10px;">
                            <img class="card-img-top" style="width: 100%; height: 220px;"
                                src="{{ asset($card->image) }}" alt="Card image cap">
                            <div class="card-body" style="font-family: 'Montserrat';">
                                <h5 class="card-title text-center" style="font-weight: bold">{{ $card->title }}</h5>
                                <p class="card-text" style="font-size: 11px">{{ $card->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                <div class="row mt-5 text-center" style="font-family: 'Montserrat';">
                    <h1 style="font-weight: 500">Our Commitment</h1>
                    <p
                        style="text-align: justify; margin-top: 20px; padding-left: 110px; padding-right: 110px; font-size: 17px;">
                        {!! $why_choose_us !!}
                    </p>
                </div>
                <div class="row text-center" style="font-family: 'Montserrat'; margin-top: 90px; margin-bottom: 110px">
                    <h1 style="font-weight: 500">Testimonals</h1>
                    <div id="carouselExample" class="carousel slide mt-5" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach ($testimonials as $key => $testimonial)
                                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                    <div class="d-flex align-items-center justify-content-center">
                                        <img class="d-block" style="width: 150px; height: 150px; margin-right: 50px;"
                                            src="{{ asset($testimonial->profile_img) }}" alt="User Photo">

                                        <div id="textArea">
                                            "{{ $testimonial->description }}"
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample"
                            role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only" style="color: rgb(158, 37, 0); font-size: 35px;"><i
                                    class="bi bi-chevron-compact-left"></i></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample"
                            role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only" style="color: rgb(158, 37, 0); font-size: 35px;"><i
                                    class="bi bi-chevron-compact-right"></i></span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

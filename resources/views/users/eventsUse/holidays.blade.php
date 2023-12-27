@extends('layouts.base')

@section('title')
    Make It Memories | Holidays
@endsection

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="image-container">
                    <img src="{{ asset('assets/images/holiday1.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Holiday Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/holiday2.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Holiday Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/holiday3.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Holiday Gallery</h1>
            </div>
        </div>
    </div>

    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md mx-auto">
                <div class="row mt-3 mb-3 text-center" style="padding-left: 100px; padding-right: 100px;">
                    <h4 class="mb-4 congrats">holiday time!</h4>
                    <p style="letter-spacing: 2px; font-size: 16px;">Don't let your precious memories fade away and get lost
                        in your camera roll, with our user-friendly platform, you can easily create and share a QR code
                        gallery of your holiday photos and videos with your loved ones. Our platform is the perfect way to
                        keep your memories alive and share your experiences with friends and family.</p>
                    <a href="/products" class="nav-link mx-auto mt-2 mb-2" id="see-pricing">
                        See pricing
                    </a>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="banner">
                        <div class="banner-img-left">
                            <img src="{{ asset('assets/images/holiday1.jpg') }}" alt="">
                        </div>

                        <div class="banner-text">
                            <h2>Share your QR code</h2>

                            <p>Whether you're on your honeymoon, a beach vacation, exploring a new city, or simply enjoying
                                time with your family, our sharable gallery will help you capture and preserve those special
                                moments.</p>
                        </div>
                    </div>
                    <div class="banner">
                        <div class="banner-text">
                            <h2>Make It Memories</h2>

                            <p>At Make It Memories, we understand the value of memories and the importance of sharing them
                                with the people who matter most. That's why our platform is designed to make it easy and fun
                                to share your holiday experiences with your loved ones. So why wait? Sign up with Never
                                Miss Moments today and start sharing your holiday memories with your friends and family!</p>

                        </div>
                        <div class="banner-img-right">
                            <img src="{{ asset('assets/images/holiday1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

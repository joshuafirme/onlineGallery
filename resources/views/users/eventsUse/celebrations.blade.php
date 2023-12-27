@extends('layouts.base')

@section('title')
    Make It Memories | Celebrations
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
                    <img src="{{ asset('assets/images/celebrations1.jpg') }}" alt=""
                        style="width: 100%; height: 400px" class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Celebration Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/celebrations2.jpg') }}" alt=""
                        style="width: 100%; height: 400px" class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Celebration Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/celebrations3.jpg') }}" alt=""
                        style="width: 100%; height: 400px" class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Celebration Gallery</h1>
            </div>
        </div>
    </div>

    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md mx-auto">
                <div class="row mt-3 mb-3 text-center" style="padding-left: 100px; padding-right: 100px;">
                    <h4 class="mb-4 congrats">we will help you share your celebrations</h4>
                    <p style="letter-spacing: 2px; font-size: 16px;">Are you planning a celebration or special event? Never
                        Miss Moments can help you capture and share the best moments from your event. Our sharable QR code
                        gallery is the perfect way to showcase your celebration, engage your guests, and create lasting
                        memories.</p>
                    <a href="/products" class="nav-link mx-auto mt-2 mb-2" id="see-pricing">
                        See pricing
                    </a>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="banner">
                        <div class="banner-img-left">
                            <img src="{{ asset('assets/images/celebrations1.jpg') }}" alt="">
                        </div>

                        <div class="banner-text">
                            <h2>Relive your celebrations with your loved ones</h2>

                            <p>With our platform, you can easily create a gallery of your event photos and videos, and share
                                it with your guests through a simple QR code or link. It’s the perfect way to showcase your
                                event and create a memorable keepsake.</p>
                        </div>
                    </div>
                    <div class="banner">
                        <div class="banner-text">
                            <h2>Make it Memories</h2>

                            <p>At Make It Memories, we understand the importance of creating unforgettable memories at
                                your celebrations. That's why our platform is designed to help you capture and share those
                                special moments with your loved ones.

                                With our visually stunning galleries and easy-to-use platform, you can create a beautiful
                                and memorable keepsake that you and your guests will treasure for years to come.So why wait?
                                Sign up with Make It Memories today and take your celebration to the next level!</p>

                        </div>
                        <div class="banner-img-right">
                            <img src="{{ asset('assets/images/celebrations1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

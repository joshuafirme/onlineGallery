@extends('layouts.base')

@section('title')
    Make It Memories | Christmas
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
                    <img src="{{ asset('assets/images/christmas1.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Christmas Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/christmas2.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Christmas Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/christmas3.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Christmas Gallery</h1>
            </div>
        </div>
    </div>

    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md mx-auto">
                <div class="row mt-3 mb-3 text-center" style="padding-left: 100px; padding-right: 100px;">
                    <h4 class="mb-4 congrats">We can make your Christmas unforgettable.</h4>
                    <p style="letter-spacing: 2px; font-size: 16px;">Time to get the family together, people fly in from all
                        over the state and country, so why not make it unforgettable with Make It Memories. Our sharable
                        QR code gallery is the perfect way to capture and share the best moments from your family gathering.
                        With our platform, you can easily create a gallery of your Christmas photos and videos, and share it
                        with your loved ones to be enjoyed and added to for years to come.</p>
                    <a href="/products" class="nav-link mx-auto mt-2 mb-2" id="see-pricing">
                        See pricing
                    </a>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="banner">
                        <div class="banner-img-left">
                            <img src="{{ asset('assets/images/christmas1.jpg') }}" alt="">
                        </div>

                        <div class="banner-text">
                            <h2>Purchase a shareable gallery</h2>

                            <p>Our user-friendly platform allows you to create a beautiful and memorable way to share your
                                memories. You can easily share your gallery with your family through a simple QR code or
                                link, making it easy for everyone to relive the fun and joy of your Christmas reunion.</p>
                        </div>
                    </div>
                    <div class="banner">
                        <div class="banner-text">
                            <h2>Make it Memories</h2>

                            <p>At Make It Memories, we understand the value of family and the importance of creating
                                lasting memories. That's why our platform is designed to help you capture and share those
                                special moments with your loved ones.

                                With our visually stunning galleries and easy-to-use platform, you can create a beautiful
                                and memorable keepsake that you and your family will treasure for years to come. So why
                                wait? Sign up with Make It Memories today and make your family Christmas reunion
                                unforgettable!</p>

                        </div>
                        <div class="banner-img-right">
                            <img src="{{ asset('assets/images/christmas1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

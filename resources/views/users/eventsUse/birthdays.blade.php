@extends('layouts.base')

@section('title')
    Make It Memories | Birthdays
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
                    <img src="{{ asset('assets/images/birthday1.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Birthday Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/birthday2.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Birthday Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/birthday3.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Birthday Gallery</h1>
            </div>
        </div>
    </div>

    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md mx-auto">
                <div class="row mt-3 mb-3 text-center" style="padding-left: 100px; padding-right: 100px;">
                    <h4 class="mb-4 congrats">happy birthday!</h4>
                    <p style="letter-spacing: 2px; font-size: 16px;">Make it unforgettable with Make It Memories, our
                        sharable QR code gallery is the perfect way to capture and share your special moments with your
                        friends and loved ones. With our platform, you can easily create a gallery of your birthday photos
                        and videos, and share it with your family and friends, or collect them all for yourself!</p>
                    <a href="/products" class="nav-link mx-auto mt-2 mb-2" id="see-pricing">
                        See pricing
                    </a>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="banner">
                        <div class="banner-img-left">
                            <img src="{{ asset('assets/images/birthday1.jpg') }}" alt="">
                        </div>

                        <div class="banner-text">
                            <h2>Relive the fun with a shareable gallery</h2>

                            <p>Our user-friendly platform allows you and your friends to simply upload all the amazing
                                photos and videos of your birthday. You can easily share your gallery with a simple QR code
                                or link (that we provide), making it easy for your loved ones to relive the fun and
                                excitement of your birthday.</p>
                        </div>
                    </div>
                    <div class="banner">
                        <div class="banner-text">
                            <h2>Make it Memories</h2>

                            <p>At Make It Memories, we understand how important it is to make your birthday memorable, and
                                our platform is designed to help you do just that. Whether you're planning a small gathering
                                or a big celebration, our sharable gallery is the perfect way to capture and share your
                                special moments. So why wait? Sign up with Make It Memories today and make your birthday
                                unforgettable!</p>

                        </div>
                        <div class="banner-img-right">
                            <img src="{{ asset('assets/images/birthday1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

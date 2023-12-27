@extends('layouts.base')

@section('title')
    Make It Memories | Wedding
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
                    <img src="{{ asset('assets/images/wedding1.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Wedding Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/wedding2.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Wedding Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/wedding3.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Wedding Gallery</h1>
            </div>
        </div>
    </div>

    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md mx-auto">
                <div class="row mt-3 mb-3 text-center" style="padding-left: 100px; padding-right: 100px;">
                    <h4 class="mb-4 congrats">congratulations!</h4>
                    <p style="letter-spacing: 2px; font-size: 16px;">Congratulations on your upcoming
                        wedding! At Make It Memories, we understand how important it is to
                        capture and preserve those special moments on your big day. That's why we offer a unique and
                        innovative way to keep and share all your memories with your loved ones via a sharable unique QR
                        code gallery.</p>
                    <a href="/products" class="nav-link mx-auto mt-2 mb-2" id="see-pricing">
                        See pricing
                    </a>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="banner">
                        <div class="banner-img-left">
                            <img src="{{ asset('assets/images/wedding1.jpg') }}" alt="">
                        </div>

                        <div class="banner-text">
                            <h2>Share your QR code at your wedding</h2>

                            <p>Simply order a QR code from our Shop, once we email it to you, print it and place it on
                                tables throughout your wedding for guests to use. Its really that simple.</p>
                        </div>
                    </div>
                    <div class="banner">
                        <div class="banner-text">
                            <h2>Your guests can share their own photos & videos</h2>

                            <p>This allows ALL of your guests to become mini photographers and videographers for your whole
                                day! You will find hundreds of images and videos you would have never had the opportunity to
                                see before all in one convenient place.</p>

                        </div>
                        <div class="banner-img-right">
                            <img src="{{ asset('assets/images/wedding1.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="banner">
                        <div class="banner-img-left">
                            <img src="{{ asset('assets/images/wedding1.jpg') }}" alt="">
                        </div>

                        <div class="banner-text">
                            <h2>Make it Memories</h2>

                            <p>With Make It Memories, you can rest assured that your memories will be preserved, stored
                                and shared in the best possible way, free to download & keep.

                                Our platform is user-friendly, reliable, and visually stunning, making it the perfect choice
                                for couples who want to capture and share their wedding memories with their loved ones. So
                                why wait?

                                Order your personal QR code gallery from Make It Memories today and make your wedding day
                                unforgettable!</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

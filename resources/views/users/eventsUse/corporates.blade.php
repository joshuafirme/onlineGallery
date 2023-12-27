@extends('layouts.base')

@section('title')
    Make It Memories | Corporate Events
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
                    <img src="{{ asset('assets/images/corporate1.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Corporate Event Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/corporate2.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Corporate Event Gallery</h1>
            </div>
            <div class="carousel-item">
                <div class="image-container">
                    <img src="{{ asset('assets/images/corporate3.jpg') }}" alt="" style="width: 100%; height: 400px"
                        class="vignette-filter">
                </div>
                <h1 class="eventTitle">Your Corporate Event Gallery</h1>
            </div>
        </div>
    </div>

    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md mx-auto">
                <div class="row mt-3 mb-3 text-center" style="padding-left: 100px; padding-right: 100px;">
                    <h4 class="mb-4 congrats">corporate events or fundraiser</h4>
                    <p style="letter-spacing: 2px; font-size: 16px;">Make It Memories can help you capture and share the
                        best moments from your event, did someone say “free content?” Our sharable QR code gallery is the
                        perfect way to showcase your event, engage your guests, and create lasting memories.</p>
                    <a href="/products" class="nav-link mx-auto mt-2 mb-2" id="see-pricing">
                        See pricing
                    </a>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="banner">
                        <div class="banner-img-left">
                            <img src="{{ asset('assets/images/corporate1.jpg') }}" alt="">
                        </div>

                        <div class="banner-text">
                            <h2>Share your event with your guests</h2>

                            <p>With our platform, you can easily create a gallery of your event photos and videos, and share
                                it with your guests or keep them for promotional purposes, through a simple customizable QR
                                code.</p>
                        </div>
                    </div>
                    <div class="banner">
                        <div class="banner-text">
                            <h2>Make it Memories</h2>

                            <p>At Make It Memories, we understand the importance of making a lasting impression at
                                corporate events and fundraisers. That's why our platform is designed to help you showcase
                                your event in the best possible way. With our user-friendly platform and visually stunning
                                galleries, you can engage your guests and create a lasting impression that will keep them
                                coming back for more.

                                So why wait? Sign up with Make It Memories today and take your corporate events and
                                fundraisers to the next level!</p>

                        </div>
                        <div class="banner-img-right">
                            <img src="{{ asset('assets/images/corporate1.jpg') }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

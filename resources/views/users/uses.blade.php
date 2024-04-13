@extends('layouts.base')

@section('title')
    Make It Memories | {{ $uses->name }}
@endsection

@section('content')
    <div id="carouselExampleIndicators" class="carousel slide carousel-dark" data-bs-ride="carousel">
        <div class="carousel-indicators">
            @foreach ($uses_slider as $key => $slider)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                    aria-current="true" aria-label="Slide {{ $key }}"></button>
            @endforeach
        </div>
        <div class="carousel-inner">
            @foreach ($uses_slider as $key => $slider)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="image-container">
                        <img src="{{ asset($slider->image) }}" alt="" style="width: 100%; height: 400px"
                            class="vignette-filter">
                    </div>
                    <h1 class="eventTitle">{{ $slider->title }}</h1>
                </div>
            @endforeach
        </div>
    </div>

    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md mx-auto">
                <div class="row mt-3 mb-3 text-center" style="padding-left: 100px; padding-right: 100px;">
                    <h4 class="mb-4 congrats">{{ $uses->name }}</h4>
                    <p style="letter-spacing: 2px; font-size: 16px;">{{ $uses->description }}</p>
                    <a href="/products" class="nav-link mx-auto mt-2 mb-2" id="see-pricing">
                        CREATE MY GALLERY NOW!
                    </a>
                </div>
                <div class="row mt-5 mb-5">
                    <div class="banner">
                        <div class="banner-img-left">
                            <img src="{{ asset($uses->image) }}" alt="">
                        </div>

                        <div class="banner-text">
                            <h2>{{ $uses->title_1 }}</h2>

                            <p>{{ $uses->description_1 }}</p>
                        </div>
                    </div>
                    <div class="banner">
                        <div class="banner-text">
                            <h2>{{ $uses->title_2 }}</h2>

                            <p>{{ $uses->description_2 }}</p>

                        </div>
                        <div class="banner-img-right">
                            <img src="{{ asset($uses->image) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

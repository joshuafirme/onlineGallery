@extends('layouts.base')

@section('title')
    Make It Memories | How It Works
@endsection

@section('content')
    <div class="image-container">
        <img src="{{ asset('assets/images/howitworks.jpg') }}" alt="" style="width: 100%; height: 400px"
            class="vignette-filter">
    </div>

    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md mx-auto mt-3">
                <div class="row mt-5 mb-3 text-center">
                    <h4 class="mb-5" style="font-size: 40px">How it Works</h4>
                    <p style="letter-spacing: 2px; font-size: 16px;">{!! $how_it_works !!}</p>
                </div>

                <div class="cardContainer row">

                    @if (count($steps) > 0)
                        @foreach ($steps as $step)
                            <div class="col-lg-4 mb-4 cardFrame">
                                <div class="card mx-auto flex-column"
                                    style="width: 300px; background: rgb(235, 235, 235); border: none; padding: 10px; height: 100%;">
                                    <div style="width: 100%; height: 250px; position: relative;">

                                        <h2
                                            style="letter-spacing: 2px; font-weight: bolder; margin: 0; width: 100%; height: 50px; display: flex; align-items: center; justify-content: center; background: rgb(255, 211, 116); border-top-left-radius: 8px; border-top-right-radius: 8px; ">
                                            {{ $step->name }}
                                        </h2>

                                        <div
                                            style="background: rgb(253, 203, 94); width: 100%; max-height: 100%; display:flex; justify-content: center; align-items: center;">
                                            <i class="{{ $step->icon_class }}"
                                                style="margin-top: 5px; margin-bottom: 5px; font-size: 128px; color: white;"></i>
                                        </div>
                                    </div>
                                    <div class="card-body" style="font-family: 'Montserrat';">
                                        <h5 class="card-title" style="font-weight: 700">{{ $step->title }}</h5>
                                        <p class="card-text mt-3" style="font-size: 12px; line-height: 1.8rem">{{ $step->description }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                <div class="row mt-4 mb-5">
                    <a href="/products" class="nav-link mx-auto mt-2 mb-2 text-center" id="see-pricing">
                        Create my Gallery Now
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

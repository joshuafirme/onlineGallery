@extends('layouts.base')

@section('title')
    Make It Memories | Homepage
@endsection

@section('content')
    <header id="header">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
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
                    <div class="headerContainer">
                        <div id="left-side">
                            <img src="{{ asset('assets/images/HandWPhoneCam.png') }}" class="left-image">
                        </div>
                        <div class="text-center mx-auto my-5" style="flex: 2;">
                            <!-- Adjusted the width using 'flex: 2;' -->
                            <h3 class="text-body-emphasis mt-5" style="color: rgb(158, 37, 0) !important; font-size: 43px;">
                                Captured
                                Moments,
                            </h3>
                            <h1 class="text-body-emphasis" style="color: rgb(158, 37, 0) !important; font-size: 58px;">
                                Cherished Memories
                            </h1>
                            <div class="col-lg-6 mx-auto">
                                <div>
                                    <label class="lead mt-5" style=" font-size: 15px;">The Best Photo Sharing Platform You
                                        Can
                                        Rely</label>
                                </div>
                                <a href="/products" class="btn btn-lg px-4"
                                    style="border-radius: 12px; background: rgb(241, 235, 210); color: rgb(158, 37, 0); box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    Create Your First Gallery
                                </a>
                                <div class="d-flex flex-wrap justify-content-center align-items-center text-center mt-5">
                                    <p class="mb-0" style="font-size: 12px;">Like & Visit Us At</p>
                                    <a href=""><img src="{{ asset('assets/images/fbicon.png') }}" alt="Facebook"
                                            style="width: 35px; height: 35px;"></a>
                                    <a href=""><img src="{{ asset('assets/images/instagramicon.png') }}"
                                            alt="Instagram" style="width: 35px; height: 35px;"></a>
                                    <a href=""><img src="{{ asset('assets/images/tiktokicon.png') }}" alt="TikTok"
                                            style="width: 35px; height: 35px;"></a>
                                </div>
                            </div>
                        </div>
                        <div id="right-side">
                            <img src="{{ asset('assets/images/couple.png') }}" class="right-image">
                            <img src="{{ asset('assets/images/LowOpacityLogoBGeffect.png') }}" class="background-image">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="headerContainer">
                        <div id="left-side">
                            <img src="{{ asset('assets/images/HandWPhoneCam.png') }}" class="left-image">
                        </div>
                        <div class="text-center mx-auto my-5" style="flex: 2;">
                            <!-- Adjusted the width using 'flex: 2;' -->
                            <h3 class="text-body-emphasis mt-5" style="color: rgb(158, 37, 0) !important; font-size: 43px;">
                                Captured
                                Moments,
                            </h3>
                            <h1 class="text-body-emphasis" style="color: rgb(158, 37, 0) !important; font-size: 58px;">
                                Cherished Memories
                            </h1>
                            <div class="col-lg-6 mx-auto">
                                <div>
                                    <label class="lead mt-5" style=" font-size: 15px;">The Best Photo Sharing Platform You
                                        Can
                                        Rely</label>
                                </div>
                                <a href="/products" class="btn btn-lg px-4"
                                    style="border-radius: 12px; background: rgb(241, 235, 210); color: rgb(158, 37, 0); box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    Create Your First Gallery
                                </a>
                                <div class="d-flex flex-wrap justify-content-center align-items-center text-center mt-5">
                                    <p class="mb-0" style="font-size: 12px;">Like & Visit Us At</p>
                                    <a href=""><img src="{{ asset('assets/images/fbicon.png') }}" alt="Facebook"
                                            style="width: 35px; height: 35px;"></a>
                                    <a href=""><img src="{{ asset('assets/images/instagramicon.png') }}"
                                            alt="Instagram" style="width: 35px; height: 35px;"></a>
                                    <a href=""><img src="{{ asset('assets/images/tiktokicon.png') }}" alt="TikTok"
                                            style="width: 35px; height: 35px;"></a>
                                </div>
                            </div>
                        </div>
                        <div id="right-side">
                            <img src="{{ asset('assets/images/couple.png') }}" class="right-image">
                            <img src="{{ asset('assets/images/LowOpacityLogoBGeffect.png') }}" class="background-image">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="headerContainer">
                        <div id="left-side">
                            <img src="{{ asset('assets/images/HandWPhoneCam.png') }}" class="left-image">
                        </div>
                        <div class="text-center mx-auto my-5" style="flex: 2;">
                            <!-- Adjusted the width using 'flex: 2;' -->
                            <h3 class="text-body-emphasis mt-5"
                                style="color: rgb(158, 37, 0) !important; font-size: 43px;">Captured
                                Moments,
                            </h3>
                            <h1 class="text-body-emphasis" style="color: rgb(158, 37, 0) !important; font-size: 58px;">
                                Cherished Memories
                            </h1>
                            <div class="col-lg-6 mx-auto">
                                <div>
                                    <label class="lead mt-5" style=" font-size: 15px;">The Best Photo Sharing Platform You
                                        Can
                                        Rely</label>
                                </div>
                                <a href="/products" class="btn btn-lg px-4"
                                    style="border-radius: 12px; background: rgb(241, 235, 210); color: rgb(158, 37, 0); box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">
                                    Create Your First Gallery
                                </a>
                                <div class="d-flex flex-wrap justify-content-center align-items-center text-center mt-5">
                                    <p class="mb-0" style="font-size: 12px;">Like & Visit Us At</p>
                                    <a href=""><img src="{{ asset('assets/images/fbicon.png') }}" alt="Facebook"
                                            style="width: 35px; height: 35px;"></a>
                                    <a href=""><img src="{{ asset('assets/images/instagramicon.png') }}"
                                            alt="Instagram" style="width: 35px; height: 35px;"></a>
                                    <a href=""><img src="{{ asset('assets/images/tiktokicon.png') }}"
                                            alt="TikTok" style="width: 35px; height: 35px;"></a>
                                </div>
                            </div>
                        </div>
                        <div id="right-side">
                            <img src="{{ asset('assets/images/couple.png') }}" class="right-image">
                            <img src="{{ asset('assets/images/LowOpacityLogoBGeffect.png') }}" class="background-image">
                        </div>
                    </div>
                </div>
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
                    <div class="col-lg-4 mb-4 cardFrame">
                        <div class="card mx-auto"
                            style="width: 300px; background: rgb(255, 255, 241); border: none; padding: 10px;">
                            <img class="card-img-top" style="width: 100%; height: 220px;"
                                src="{{ asset('assets/images/FeatureImagePhoto.png') }}" alt="Card image cap">
                            <div class="card-body" style="font-family: 'Montserrat';">
                                <h5 class="card-title text-center" style="font-weight: bold">Seize The Moment</h5>
                                <p class="card-text" style="font-size: 11px">Seizing the moment is not merely about acting
                                    impulsively, but rather, it's an invitation to be fully present and engaged in the
                                    richness of life.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 cardFrame">
                        <div class="card mx-auto"
                            style="width: 300px; background: rgb(255, 255, 241); border: none; padding: 10px;">
                            <img class="card-img-top" style="width: 100%; height: 220px;"
                                src="{{ asset('assets/images/FeatureImagePhoto.png') }}" alt="Card image cap">
                            <div class="card-body" style="font-family: 'Montserrat';">
                                <h5 class="card-title text-center" style="font-weight: bold">Capture Stories</h5>
                                <p class="card-text" style="font-size: 11px">Capturing Stories Unfold: Chronicles of
                                    Life's Unwritten Chapters.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mb-4 cardFrame">
                        <div class="card mx-auto"
                            style="width: 300px; background: rgb(255, 255, 241); border: none; padding: 10px;">
                            <img class="card-img-top" style="width: 100%; height: 220px;"
                                src="{{ asset('assets/images/FeatureImagePhoto.png') }}" alt="Card image cap">
                            <div class="card-body" style="font-family: 'Montserrat';">
                                <h5 class="card-title text-center" style="font-weight: bold">Share Memories</h5>
                                <p class="card-text" style="font-size: 11px">Take a moment and relive each captured
                                    memories, Where moments become treasures, and treasure defines moments.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5 text-center" style="font-family: 'Montserrat';">
                    <h1 style="font-weight: 500">Why Choose Us</h1>
                    <p
                        style="text-align: justify; margin-top: 20px; padding-left: 110px; padding-right: 110px; font-size: 17px;">
                        Our platform stands out as the preferred choice for clients due to its unwavering commitment to
                        providing a
                        seamless and enriching experience. We prioritize user satisfaction by offering a user-friendly
                        interface,
                        Cutting-edge technology, and a comprehensive range of features tailored to meet diverse needs.
                        <br><br>
                        We excel in reliability, ensuring uninterrupted service and security to build trust. We
                        differentiate
                        ourselves by fostering a sense of community and collaboration, creating a space where users not
                        only
                        utilize
                        our services but actively contribute to a dynamic and supportive ecosystem.
                    </p>
                </div>
                <div class="row text-center" style="font-family: 'Montserrat'; margin-top: 90px; margin-bottom: 110px">
                    <h1 style="font-weight: 500">Testimonals</h1>
                    <div id="carouselExample" class="carousel slide mt-5" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="d-block" style="width: 150px; height: 150px; margin-right: 50px;"
                                        src="{{ asset('assets/images/testimonialuserphoto.png') }}" alt="User Photo">

                                    <div id="textArea">
                                        "Kudos to the developers for creating such a seamless and efficient tool."
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="d-block" style="width: 150px; height: 150px; margin-right: 50px;"
                                        src="{{ asset('assets/images/testimonialuserphoto.png') }}" alt="User Photo">

                                    <div id="textArea">
                                        "Kudos to the developers for creating such a seamless and efficient tool."
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="d-flex align-items-center justify-content-center">
                                    <img class="d-block" style="width: 150px; height: 150px; margin-right: 50px;"
                                        src="{{ asset('assets/images/testimonialuserphoto.png') }}" alt="User Photo">

                                    <div id="textArea">
                                        "Kudos to the developers for creating such a seamless and efficient tool."
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Second slide">
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="..." alt="Third slide">
                        </div> --}}
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

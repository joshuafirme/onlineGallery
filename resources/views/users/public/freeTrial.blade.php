@extends('layouts.base')

@section('title')
    Make It Memories | Free Trial
@endsection

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/freeTrial_style.css') }}" />
    <div class="container" style="font-family: 'Montserrat'">
        <div class="row">
            <div class="col mx-auto">
                <div class="row mt-5 mb-5">

                    <div class="col-lg-6 mt-1 mb-3 d-flex justify-content-center align-items-center">
                        <div class="frame"
                            style="height: 100%; width: 100%; border: 1px solid black; border-radius: 30px; background: rgb(231, 231, 231); padding: 40px">
                            <p style="padding-left: 5px; padding-right:5px; text-align: justify; white-space: pre-line">Here you will find a <strong>PUBLIC</strong> QR code and a link similar to one that you will receive once you place an order.
                            </p>
                            <p style="padding-left: 30px; padding-right:30px; text-align: justify; white-space: pre-line;">
                                <i class="bi bi-stop-circle-fill" style="font-size: 8px; font-weight: bolder; margin-right: 6px"></i>Feel free to scan the QR code or click the link (they both take you to the same place)
                                <i class="bi bi-stop-circle-fill" style="font-size: 8px; font-weight: bolder; margin-right: 6px"></i>Once there, you’ll instantly see the page you can upload any photo or
                                video too.
                                <i class="bi bi-stop-circle-fill" style="font-size: 8px; font-weight: bolder; margin-right: 6px"></i>To see the gallery images simply click the “done” button in the top
                                right corner.
                                <i class="bi bi-stop-circle-fill" style="font-size: 8px; font-weight: bolder; margin-right: 6px"></i>You can download any photo or video you want from this gallery.
                                <i class="bi bi-stop-circle-fill" style="font-size: 8px; font-weight: bolder; margin-right: 6px"></i>If you want to upload a photo or video please remember this is a PUBLIC
                                gallery,</p>

                            <a href="/demo/public-gallery" id="freeTrial"><i class="bi bi-chevron-double-right"></i> Try before you buy! <i class="bi bi-arrow-right"></i></a>
                        </div>
                        
                    </div>

                    <div class="col-lg-6 mt-1 mb-3">
                        <div class="frame"
                            style="height: 100%; width: 100%; border: 1px solid black; display: flex; justify-content: center; align-items: center; border-radius: 30px; background: rgb(231, 231, 231);">
                            <div class="qr-area" style="background: white">
                                <div class="position-relative">
                                    <img style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height: 150px; width: 300px; z-index: 100; border-radius:50%; filter: saturate(145%); background: rgba(255, 255, 255, 0.151);"
                                    src="{{ asset('assets/images/icons/LOGO3.png') }}" class="white-logo"
                                    alt="logo">
                                    {!! QrCode::size(380)->margin(3)->eye('circle')->generate(url('http://makeitmemories.net/demo/public-gallery')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="demo-button-container">
                    <a href="/demo/public-gallery" class="demo-button">
                        click here to try it out! <i class="bi bi-magic"></i>
                    </a>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="col-lg-6">
                        <img style="height: 100%; width: 100%;" src="{{ asset('assets/images/share.jpeg') }}" alt="">
                    </div>
                    <div class="col-lg-6">
                        <h4 style="line-height: 2rem">Acquiring your own QR code and setting up a gallery for your special event has never been easier!</h4>

                        <p style="line-height: 2rem">Buy one of our QR codes today and within 24 hours, your unique link and QR code will be created and sent to you via email. Whether it's for your wedding, holiday, or any other occasion, you can simply use or print the code however you see fit. It's that simple!</p>

                        <div class="row mt-4 mb-5">
                            <a href="/products" class="nav-link mt-2 mb-2 text-center" id="howItWorks">
                                How It Works
                            </a>
                        </div>
                    </div>
                </div>

                <div class="row d-flex justify-content-center" style="margin-top: 80px">
                    <h1 class="text-center mb-5">TESTIMONIALS</h1>
                    <div class="col-lg-4 col-md-6 text-center">
                        <img style="height: 140px; width: 140px; border-radius: 100%" src="{{ asset('assets/images/testimonialuserphoto.png') }}" alt="">
                        <h2 class="fw-normal">Name</h2>
                        <p>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor quas modi dolore dolorem alias illum commodi ea! Deleniti, ipsum tempore, iure vel error quos delectus, amet vitae cum ipsa perspiciatis?"</p>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <img style="height: 140px; width: 140px; border-radius: 100%" src="{{ asset('assets/images/testimonialuserphoto.png') }}" alt="">
                        <h2 class="fw-normal">Name</h2>
                        <p>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor quas modi dolore dolorem alias illum commodi ea! Deleniti, ipsum tempore, iure vel error quos delectus, amet vitae cum ipsa perspiciatis?"</p>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <img style="height: 140px; width: 140px; border-radius: 100%" src="{{ asset('assets/images/testimonialuserphoto.png') }}" alt="">
                        <h2 class="fw-normal">Name</h2>
                        <p>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor quas modi dolore dolorem alias illum commodi ea! Deleniti, ipsum tempore, iure vel error quos delectus, amet vitae cum ipsa perspiciatis?"</p>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <img style="height: 140px; width: 140px; border-radius: 100%" src="{{ asset('assets/images/testimonialuserphoto.png') }}" alt="">
                        <h2 class="fw-normal">Name</h2>
                        <p>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor quas modi dolore dolorem alias illum commodi ea! Deleniti, ipsum tempore, iure vel error quos delectus, amet vitae cum ipsa perspiciatis?"</p>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <img style="height: 140px; width: 140px; border-radius: 100%" src="{{ asset('assets/images/testimonialuserphoto.png') }}" alt="">
                        <h2 class="fw-normal">Name</h2>
                        <p>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor quas modi dolore dolorem alias illum commodi ea! Deleniti, ipsum tempore, iure vel error quos delectus, amet vitae cum ipsa perspiciatis?"</p>
                    </div>
                    <div class="col-lg-4 col-md-6 text-center">
                        <img style="height: 140px; width: 140px; border-radius: 100%" src="{{ asset('assets/images/testimonialuserphoto.png') }}" alt="">
                        <h2 class="fw-normal">Name</h2>
                        <p>"Lorem ipsum dolor, sit amet consectetur adipisicing elit. Dolor quas modi dolore dolorem alias illum commodi ea! Deleniti, ipsum tempore, iure vel error quos delectus, amet vitae cum ipsa perspiciatis?"</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

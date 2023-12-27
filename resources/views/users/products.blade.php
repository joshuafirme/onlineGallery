@extends('layouts.base')

@section('title')
    Website Title | Products
@endsection

@section('content')
    <div class="container" style="font-family: 'Montserrat'">
        <div class="row">
            <div class="col mx-auto">

                <div class="row mt-5 mb-5">
                    <div class="col-sm" id="withWatermarks">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="frame"
                                style="height: 470px; width: 470px; border: 1px solid black; display: flex; justify-content: center; align-items: center; border-radius: 30px; background: rgb(253, 243, 198);">
                                <div class="qr-area" style="background: white">
                                    <div class="position-relative">
                                        <img style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height: 150px; width: 300px; z-index: 100; border-radius:50%; filter: saturate(145%); background: rgba(255, 255, 255, 0.151);"
                                            src="{{ asset('assets/images/icons/LOGO3.png') }}" class="white-logo"
                                            alt="logo">
                                        {!! QrCode::size(380)->margin(3)->eye('circle')->generate(url('http://makeitmemories.net')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm" style="display: none" id="withoutWatermarks">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="frame"
                                style="height: 470px; width: 470px; border: 1px solid black; display: flex; justify-content: center; align-items: center; border-radius: 30px; background: rgb(253, 243, 198);">
                                <div class="qr-area" style="background: white">
                                    <div class="position-relative">
                                        {!! QrCode::size(380)->margin(3)->eye('circle')->generate(url('http://makeitmemories.net')) !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm">
                        <p style="padding: 20px; text-align: justify">Are you going to miss out on all the photos and videos
                            your guests take of you on your wedding
                            day?
                            Allow all your friends and family to easily upload their amazing memories of your day to your
                            personal online gallery. Recieve your unique QR code and link within 24hrs from placing an
                            order,
                            then simply print and display it at your wedding. </p>

                        <h6>Logo:</h6>

                        <button class="btn" id="buttonWith" style="background: rgb(158, 37, 0)"
                            onclick="showForm('formWith', 'buttonWith', 'withPricing' , 'withWatermarks')">With</button>
                        <button class="btn text-black" id="buttonWithout"
                            onclick="showForm('formWithout', 'buttonWithout', 'withoutPricing' , 'withoutWatermarks')">Without</button>

                        <div id="withPricing">
                            $ {{ number_format($pricing->priceWith, 2) }}
                        </div>
                        <div id="withoutPricing" style="display: none;">
                            $ {{ number_format($pricing->priceWithout, 2) }}
                        </div>

                        <div id="formWith">
                            <form action="/payment/process" method="POST">
                                @csrf
                                <!-- Include your payment form fields here -->
                                <button type="submit" class="btn btn-warning" style="color: white">Pay with <i
                                        class="bi bi-paypal"></i>aypal</button>
                            </form>
                        </div>

                        <div id="formWithout" style="display: none;">
                            <form action="/payment/processWithout" method="POST">
                                @csrf
                                <!-- Include your payment form fields here -->
                                <button type="submit" class="btn btn-warning" style="color: white">Pay with <i
                                        class="bi bi-paypal"></i>aypal</button>
                            </form>
                        </div>

                    </div>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="cardContainer row mt-5">
                        <div class="col-lg-4 mb-4 cardFrame d-flex">
                            <div class="card mx-auto flex-column"
                                style="width: 300px; background: rgb(235, 235, 235); border: none; padding: 10px;">
                                <div style="width: 100%; height: 250px; position: relative;">

                                    <h2
                                        style="letter-spacing: 2px; font-weight: bolder; margin: 0; width: 100%; height: 50px; display: flex; align-items: center; justify-content: center; background: rgb(255, 211, 116); border-top-left-radius: 8px; border-top-right-radius: 8px;">
                                        STEP 1
                                    </h2>

                                    <img width="100%" height="200px" src="{{ asset('assets/images/capture.jpg') }}"
                                        alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: 700">CAPTURE</h5>
                                    <p class="card-text mt-3" style="font-size: 12px; line-height: 1.8rem">Everyone has a
                                        smartphone these days,
                                        and your guests will take HEAPS of photos and videos on your wedding day.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4 cardFrame d-flex">
                            <div class="card mx-auto flex-column"
                                style="width: 300px; background: rgb(235, 235, 235); border: none; padding: 10px;">
                                <div style="width: 100%; height: 250px; position: relative;">

                                    <h2
                                        style="letter-spacing: 2px; font-weight: bolder; margin: 0; width: 100%; height: 50px; display: flex; align-items: center; justify-content: center; background: rgb(255, 211, 116); border-top-left-radius: 8px; border-top-right-radius: 8px; ">
                                        STEP 2
                                    </h2>

                                    <img width="100%" height="200px" src="{{ asset('assets/images/share.jpeg') }}"
                                        alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: 700">SHARE</h5>
                                    <p class="card-text mt-3" style="font-size: 12px; line-height: 1.8rem">Display your
                                        unique QR code on all
                                        your reception tables for your guests to scan and upload their photos and videos to.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 mb-4 cardFrame d-flex">
                            <div class="card mx-auto flex-column"
                                style="width: 300px; background: rgb(235, 235, 235); border: none; padding: 10px;">
                                <div style="width: 100%; height: 250px; position: relative;">

                                    <h2
                                        style="letter-spacing: 2px; font-weight: bolder; margin: 0; width: 100%; height: 50px; display: flex; align-items: center; justify-content: center; background: rgb(255, 211, 116); border-top-left-radius: 8px; border-top-right-radius: 8px; ">
                                        STEP 3
                                    </h2>

                                    <img width="100%" height="200px" src="{{ asset('assets/images/remember.jpg') }}"
                                        alt="">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title" style="font-weight: 700">REMEMBER</h5>
                                    <p class="card-text mt-3" style="font-size: 12px; line-height: 1.8rem">Click the link we
                                        supply, to access
                                        ALL these amazing photos & videos, free to download and share from your online
                                        gallery.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="demo-button-container">
                    <a href="/demo" class="demo-button">
                        Try our DEMO <i class="bi bi-magic"></i>
                    </a>
                </div>

                <div class="row mt-5 mb-5">
                    <div class="cardContainer row">
                        <div class="col-lg-6 mb-4 cardFrame d-flex">
                            <div class="card mx-auto flex-column"
                                style="width: 300px; background: rgb(235, 235, 235); border: none; padding: 10px;">
                                <div class="card-body text-center">
                                    <i class="bi bi-infinity" style="font-size:100px; color: rgb(158, 37, 0);"></i>
                                    <h5 class="card-title" style="font-weight: 700">Unlimited access</h5>
                                    <p class="card-text mt-3" style="font-size: 12px; line-height: 1.8rem">Your gallery
                                        can keep as many photos and videos as you like, and you can share them with anyone
                                        and everyone.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-4 cardFrame d-flex">
                            <div class="card mx-auto flex-column"
                                style="width: 300px; background: rgb(235, 235, 235); border: none; padding: 10px;">
                                <div class="card-body text-center">
                                    <i class="bi bi-unlock" style="font-size:100px; color: rgb(158, 37, 0);"></i>
                                    <h5 class="card-title" style="font-weight: 700">No logins required</h5>
                                    <p class="card-text mt-3" style="font-size: 12px; line-height: 1.8rem">Your gallery is
                                        easy to access and easy to use. We fulfill the setup for you so you can enjoy those
                                        moments with ease.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function showForm(formId, buttonId, pricingId, watermarksID) {
            // Hide all forms
            document.getElementById('formWith').style.display = 'none';
            document.getElementById('formWithout').style.display = 'none';
            document.getElementById('withPricing').style.display = 'none';
            document.getElementById('withoutPricing').style.display = 'none';
            document.getElementById('withWatermarks').style.display = 'none';
            document.getElementById('withoutWatermarks').style.display = 'none';

            // Set text color for inactive buttons
            document.getElementById('buttonWith').removeAttribute('style');
            document.getElementById('buttonWith').classList.add('text-black');

            document.getElementById('buttonWithout').removeAttribute('style');
            document.getElementById('buttonWithout').classList.add('text-black');

            // Show the selected form
            document.getElementById(formId).style.display = 'block';
            document.getElementById(pricingId).style.display = 'block';
            document.getElementById(watermarksID).style.display = 'block';

            // Set text color for the active button
            document.getElementById(buttonId).classList.remove('text-black');
            document.getElementById(buttonId).style.backgroundColor = 'rgb(158, 37, 0)';
        }
    </script>
@endsection

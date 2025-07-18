<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Bootstrap -->

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css?family=Sacramento&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <!-- Fonts -->

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/gallery/gallery_navbar_style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/gallery/gallery_sidebar_style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/gallery/gallery_dashboard_style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/flash_message.css') }}" />
    <!-- CSS -->

    <link rel="shortcut icon" href="{{ asset('assets/images/icons/LOGO3.png') }}" type="image/x-icon">
    
    <title>@yield('title')</title>

</head>

<body>
    {{-- SIDEBAR --}}
    <section class="sidebar">
        <div class="brand">
            <a href="/"
                class="d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="{{ asset('assets/images/icons/LOGO3.png') }}" alt="Logo"
                    style="width: 170px; height: 85px;">
            </a>
        </div>
        <ul class="side-menu top">
            @if ($accountsPayments)
                <li>
                    <a type="button" data-bs-toggle="modal" data-bs-target="#uploadMedia">
                        <i class="bi bi-upload"></i>
                        <span class="text">Upload</span>
                    </a>
                </li>
                <li class="{{ Request::is('your-gallery/' . $accountsPayments->uuid) ? 'active' : '' }}">
                    <a href="/your-gallery/{{ $accountsPayments->uuid }}">
                        <i class="bi bi-columns-gap" style="font-weight: bolder"></i>
                        <span class="text">All</span>
                    </a>
                </li>
                <li class="{{ Request::is('your-gallery/photos/' . $accountsPayments->uuid) ? 'active' : '' }}">
                    <a href="/your-gallery/photos/{{ $accountsPayments->uuid }}">
                        <i class="bi bi-camera-fill"></i>
                        <span class="text">Photos</span>
                    </a>
                </li>
                <li class="{{ Request::is('your-gallery/videos/' . $accountsPayments->uuid) ? 'active' : '' }}">
                    <a href="/your-gallery/videos/{{ $accountsPayments->uuid }}">
                        <i class="bi bi-camera-reels-fill"></i>
                        <span class="text">Videos</span>
                    </a>
                </li>
                <li class="{{ Request::is('your-gallery/myQR/' . $accountsPayments->uuid) ? 'active' : '' }}">
                    <a href="/your-gallery/myQR/{{ $accountsPayments->uuid }}">
                        <i class="bi bi-qr-code"></i>
                        <span class="text">My QR</span>
                    </a>
                </li>
                <li
                    class="{{ Request::is('public-gallery/events/' . $accountsPayments->uuid . '/show') ? 'active' : '' }}">
                    <a href="{{ url('public-gallery/events/' . $accountsPayments->uuid . '/show') }}">
                        <i class="bi bi-image"></i>
                        <span class="text">Public Gallery</span>
                    </a>
                </li>
            @endif
        </ul>
    </section>
    {{-- SIDEBAR --}}

    {{-- CONTENT --}}
    <section class="content">
        {{-- NAVBAR --}}
        <nav class="navbar">
            <i class="bi bi-list" style="margin-right: 20px"></i>
        </nav>
        {{-- NAVBAR --}}
        <div class="d-flex flex-column align-items-center">
            <div style="margin-top:20px; margin-bottom: 20px; font-family: 'Montserrat', sans-serif;">
                @yield('HeaderTitle')
            </div>

            @include('admin.components.error_success_flash_message')

            <div class="modal fade" id="uploadMedia" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
                tabindex="-1">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Upload Media</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" id="container">

                            <div class="drop-section">
                                <div class="col">
                                    <div class="cloud-icon"> <i class="bi bi-cloud-upload-fill"></i> </div>
                                    <header>Drag Photos & Videos Here</header>
                                    <span>OR</span>
                                    <button class="file-selector"> <i class="bi bi-file-earmark-arrow-up-fill"></i>
                                        Browse
                                        File</button>
                                    <p style="font-size: 12px">(Media must be less than 50mb)</p>
                                    @if ($accountsPayments)
                                        <form id="mediaUploadForm"
                                            action="/your-gallery/processUploadImageSingle/{{ $uuid }}"
                                            method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" name="media_path[]" class="file-selector-input">
                                        </form>

                                        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $(".file-selector-input").change(function() {
                                                    $("#mediaUploadForm").submit();
                                                });
                                            });
                                        </script>
                                    @endif
                                </div>
                                <div class="col">
                                    <div class="drop-here">
                                        Drop Here
                                    </div>
                                </div>
                            </div>

                            <div class="list-section">
                                <div class="list-title">
                                    Uploaded Files:
                                </div>
                                <div class="list">
                                    {{-- <li class="in-prog">
                                        <div class="col">
                                            <img src="{{ asset('assets/images/icons/video.png') }}" alt="">
                                        </div>
                                        <div class="col">
                                            <div class="file-name">
                                                <div class="name">File Name Here</div>
                                                <span>50%</span>
                                            </div>
                                            <div class="file-progress">
                                                <span></span>
                                            </div>
                                            <div class="file-size">2.2 MB</div>
                                        </div>
                                        <div class="col">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="cross" width="25" height="25"
                                                fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                                <path
                                                    d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708" />
                                            </svg>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="check" width="25" height="25"
                                                fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                                <path
                                                    d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
                                            </svg>
                                        </div>
                                    </li> --}}
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

        </div>
        @yield('content')
    </section>
    {{-- CONTENT --}}
    @yield('scripts')

    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

    @if (!empty($uuid))
        <script>
            const uuid = {!! json_encode($uuid) !!};
        </script>
    @endif

    <script src="{{ asset('assets/js/imageUpload.js') }}"></script>

    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
    <!-- Bootstrap -->

</body>

</html>

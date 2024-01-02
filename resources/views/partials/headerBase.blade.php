<style>
    header {
        background-color: #f8f9fa;
        font-family: 'Montserrat', sans-serif;

        /* Add your desired background color */
    }

    .nav-pills {
        margin-bottom: 0;
        /* Remove default margin for the ul element */
    }

    .nav-link {
        color: rgb(158, 37, 0);
        /* Adjust as needed for spacing between navigation links */
    }

    .btn {
        margin-right: 20px;
        /* Adjust as needed for spacing between buttons */
    }

    .nav-item.dropdown:hover .dropdown-menu {
        display: block;
        opacity: 1;
        visibility: visible;
        transform: translateY(0);
    }

    .dropdown-menu {
        display: none;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease, transform 0.3s ease;
        /* Add a smooth transition for opacity, visibility, and transform */
        transform: translateY(-10px);
        /* Add a slight vertical offset for a smooth animation */
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* Add a subtle box shadow for a stylish look */
        border-radius: 8px;
        /* Add rounded corners for a modern appearance */
        border: none;
        /* Remove the default border */
    }

    .dropdown-menu a {
        font-weight: 600;
        color: rgb(158, 37, 0);
        /* Set the text color */
        padding: 10px 20px;
        /* Add padding for better spacing */
        text-decoration: none;
        /* Remove the default underline */
        display: block;
        transition: background-color 0.3s ease;
        /* Add a smooth transition for background color */
    }

    .dropdown-menu a:hover {
        background-color: #f8f9fa;
        /* Change the background color on hover */
    }

    .nav-link::after {
        display: none;
    }
</style>

<header class="d-flex flex-wrap justify-content-between border-bottom" style="padding-left:20px; padding-right:20px">
    <a href="/" class="d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
        <img src="{{ asset('assets/images/icons/LOGO3.png') }}" alt="Logo" style="width: 150px; height: 75px;">
    </a>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav nav-pills" style="font-size: 16px;"> <!-- Adjust the font-size as needed -->
                    <li class="nav-item"><a href="/homepage" class="nav-link">Home</a></li>
                    @if (Auth::check())
                        <li class="nav-item"><a href="/dashboard" class="nav-link">Dashboard</a></li>
                    @else
                    @endif
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Uses <i class="bi bi-chevron-compact-right" style="font-size: 11px;"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"
                            style="letter-spacing: 2px; text-transform: uppercase;">
                            @php
                                $uses = new App\Models\Uses;
                                $usesItems = $uses::get();
                            @endphp
                            @foreach ($usesItems as $usesItem)
                                <a class="dropdown-item" href="/uses/show/{{ Utils::slugify($usesItem->name) }}">{{ $usesItem->name }}</a>
                            @endforeach
                            <!-- Dropdown items go here -->
                            {{-- 
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/uses-holidays"><img
                                    src="{{ asset('assets/images/icons/travel.png') }}" alt=""> Holidays</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/uses-birthdays"><img
                                    src="{{ asset('assets/images/icons/birthday-cake.png') }}" alt="">
                                Birthdays</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/uses-corporates"><img
                                    src="{{ asset('assets/images/icons/champagne.png') }}" alt=""> Corporate
                                Events</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/uses-christmas"><img
                                    src="{{ asset('assets/images/icons/christmas-tree.png') }}" alt="">
                                Christmas</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/uses-celebrations"><img
                                    src="{{ asset('assets/images/icons/confetti.png') }}" alt="">
                                Celebrations</a> --}}
                        </div>
                    </li>
                    <li class="nav-item"><a href="/howItWorks" class="nav-link">How it Works</a></li>
                    <li class="nav-item"><a href="/affiliate" class="nav-link">Affiliate</a></li>
                    {{-- <li class="nav-item"><a href="/reachUs" class="nav-link">Reach Us</a></li> --}}
                    <li class="nav-item"><a href="/products" class="nav-link"
                            style="border: 1px solid rgb(116, 116, 116); border-radius: 12px; margin: 0 10px; color:rgb(158, 37, 0); font-size: 14px;">Choose
                            a Plan <i class="bi bi-chevron-compact-right" style="font-size: 11px;"></i></a></li>
                    <li class="nav-item"><a href="/free-trial" class="nav-link"
                            style="border-radius: 12px; background: rgb(158, 37, 0); color:white; font-size: 14px;">Try
                            Free Trial</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>

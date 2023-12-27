<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- Bootstrap -->

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/admin/navbar_style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin/sidebar_style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/admin/dashboard_style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/flash_message.css') }}" />
    <!-- CSS -->

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <!-- Fonts -->

    <title>@yield('title')</title>
</head>

<body>
    {{-- SIDEBAR --}}
    <section class="sidebar">
        <div class="brand mt-2">
            <a href="/"
                class="d-flex align-items-center mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <img src="{{ asset('assets/images/icons/LOGO3.png') }}" alt="Logo"
                    style="width: 170px; height: 85px;">
            </a>
        </div>
        <ul class="side-menu top">
            <li class="{{ request()->is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard">
                    <i class="bi bi-speedometer"></i>
                    <span class="text">Dashboard</span>
                </a>
            </li>
            <li class="{{ request()->is('accounts') ? 'active' : '' }}">
                <a href="/accounts">
                    <i class="bi bi-people-fill"></i>
                    <span class="text">Accounts</span>
                </a>
            </li>
            <li class="{{ request()->is('message') ? 'active' : '' }}">
                <a href="/message">
                    <i class="bi bi-chat-dots-fill"></i>
                    <span class="text">Message</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li class="{{ request()->is('settings') ? 'active' : '' }}">
                <a href="#">
                    <i class="bi bi-gear-fill"></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <form action="/logout" method="POST" class="mr-2">
                    @csrf
                    <button type="submit" class="logout">
                        <i class="bi bi-box-arrow-left"></i>
                        <span class="text">Logout</span>
                    </button>
                </form>
            </li>
        </ul>
    </section>
    {{-- SIDEBAR --}}

    {{-- CONTENT --}}
    <section class="content">
        {{-- NAVBAR --}}
        <nav class="navbar">
            <div class="row mt-2">
                <div class="col-auto">
                    <i class="bi bi-list"></i>
                </div>
                <div class="col mt-1">
                    <p class="nav-link">
                        Categories
                    </p>
                </div>
            </div>
        </nav>
        {{-- NAVBAR --}}
        @include('components.error_success_flash_message')
        @yield('content')
    </section>
    {{-- CONTENT --}}

    @yield('scripts')
    <script src="{{ asset('assets/js/dashboard.js') }}"></script>

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

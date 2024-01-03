@extends('layouts.base')

@section('title')
    Make It Memories | Affiliate
@endsection

@section('content')
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/gallery/myQR_style.css') }}" /> --}}
    <style>
        .container {
            width: 80%;
            background: white;
            margin-bottom: 100px;
        }
    </style>

    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row vh-100">
            <div class="col-sm-10 col-md-8 col-lg-6 col-xl-5 mx-auto d-table h-100">
                <div class="d-table-cell align-middle">
                    <div class="text-center">
                        <h1 class="display-1 fw-bold">404</h1>
                        <p class="h2">Page not found.</p>
                        <p class="lead fw-normal mt-3 mb-4"> Looks like you've hit a dead end in cyberspace. Our apologies!
                            The page you're looking for seems to be playing hide and seek. But fear not, we're here to help
                            you get back on track.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

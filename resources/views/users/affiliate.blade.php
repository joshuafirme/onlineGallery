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
        <div class="row">
            <div class="col-md mx-auto mt-3">
                <div class="row mt-5 mb-3 text-center">
                    <h4 class="mb-5" style="font-size: 40px">Capture the Moment: Join the Make It Memories Affiliate
                        Program!</h4>
                </div>
                <p style="letter-spacing: 2px; font-size: 16px;">{!! $affiliate !!}</p>

                <a href="/affiliate/registration" class="btn btn-primary">Register now!</a>

                {{-- <div class="cardContainer row">
                    <div class="col-lg-4 mb-4 cardFrame">
                        <div class="card mx-auto flex-column"
                            style="width: 300px; background: rgb(235, 235, 235); border: none; padding: 10px; height: 100%;">
                            <form action="/update-QR/" method="POST">
                                @csrf
                                <label for="name">Greetings <span id="optional">(optional)</span></label>
                                <input type="text" name="greetings" autocomplete="off" placeholder="Ex. Welcome">

                                <label for="name">Brief Description <span id="optional">(optional)</span></label>
                                <input type="text" name="briefDescription" autocomplete="off"
                                    placeholder="Ex. To Our Wedding">

                                <label for="name">Name <span id="optional">(optional)</span></label>
                                <input type="text" name="name" autocomplete="off" placeholder="Ex. Olivia & Richard">

                                <label for="name">Date <span id="optional">(optional)</span></label>
                                <input id="min-date" type="date" name="date">

                                <label for="name">Share Description <span id="optional">(optional)</span></label>
                                <textarea type="text" name="shareDescription" autocomplete="off" placeholder="Ex. Please scan this......."
                                    style="width: 100%"></textarea>

                                <button class="btn btn-primary" style="width:200px" type="submit">
                                    Submit Changes
                                </button>
                            </form>
                        </div>
                    </div>
                </div> --}}

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection

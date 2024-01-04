@extends('layouts.base')

@section('title')
    Make It Memories | Affiliate
@endsection

<style>
    .optional {
        font-size: 11px;
        color: gray;
    }

    .card {
        display: block;
        text-align: center;
    }

    form {
        display: inline-block;
        margin-left: auto;
        margin-right: auto;
        text-align: left;
    }
</style>

@section('content')
    <div class="container" style="font-family: 'Montserrat', sans-serif;">
        <div class="row">
            <div class="col-md mx-auto">
                <div class="row mt-5 mb-3 text-center">
                    <h4 style="font-size: 40px">Affiliate Registration</h4>
                </div>

                <p>
                    Thank you for choosing to join the Make It Memories Affiliate Program! Please fill out the form below to
                    kickstart your journey of turning memories into earnings.
                </p>
                <p>Once registered, a confirmation email will be
                    sent to you, containing a link to access your personalized affiliate dashboard.</p>

                <div class="d-flex justify-content-center mt-5 row">

                    <div class="card col-xs-12 col-md-8 col-lg-5" style="margin-bottom: 150px;">
                        <div class="card-body p-5">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            @include('admin.components.alerts')

                            <form action="{{ url('/affiliate/do-register') }}" class="row" method="POST"
                                id="affiliate-form" autocomplete="off">
                                @csrf

                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Account Name</label>
                                    <input type="text" class="form-control" name="account_name" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Contact Number <span
                                            class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" name="contact_number">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Facebook Account Link <span
                                            class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" name="fb_link">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Instagram Link <span
                                            class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" name="ig_link">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">TikTok Link <span class="optional">(optional)</span></label>
                                    <input type="text" class="form-control" name="tiktok_link">
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" style="width:200px" type="submit" id="btn-submit">
                                        Register
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://www.google.com/recaptcha/api.js?render=6Lch7EMpAAAAAJ0PJYDf_bcRjnAZBuFwN84QuM3u"></script>

<script>
    $(function() {
        $(document).on('click', '#btn-submit', function(e) {

            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('6Lch7EMpAAAAAJ0PJYDf_bcRjnAZBuFwN84QuM3u', {
                    action: 'submit'
                }).then(function(token) {

                    $('#affiliate-form').prepend(
                        '<input type="hidden" class="token" name="token" value="' +
                        token + '">');

                    let id = $(this).attr('data-id');
                    Swal.fire({
                        title: 'Please confirm',
                        text: "Are you sure you have complete and correct details?",
                        icon: 'warning',
                        showCancelButton: true,
                        cancelButtonText: 'No',
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes',
                        cancelButtonColor: '#d33',
                    }).then((result) => {
                        if (result.isConfirmed) {

                            let timerInterval
                            Swal.fire({
                                title: 'Please wait.',
                                html: 'Submitting information...',
                                timerProgressBar: true,
                                didOpen: () => {

                                    Swal.showLoading();

                                    setTimeout(() => {
                                        $('#affiliate-form')
                                            .submit();
                                    }, 1000);

                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                }
                            })
                        }
                    })
                });
            });

            return false;
        });
    });
</script>

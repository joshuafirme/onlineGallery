@extends('layouts.gallerybase')

@section('title')
    Website Title | Your-Gallery {{ $uuid }}
@endsection

@section('content')
    {{-- <link href="https://fonts.googleapis.com/css?family=Dancing+Script&display=swap" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('assets/css/gallery/gallery_style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/gallery/myQR_style.css') }}" />
@section('HeaderTitle')
    <h1>My QR</h1>
@endsection
<div class="row d-flex justify-content-center mt-3" style="gap:35px">

    <button class="col-sm-4 col-lg-4 btn btn-primary" id="downloadQR" style="width:200px">
        Generate Card to PDF
    </button>

    <button class="col-sm-4 col-lg-4 btn btn-primary" style="width:200px" type="button" data-toggle="modal"
        data-target="#exampleModal">
        Edit QR
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit QR <span id="optional">(change data's on your
                            likeness)</span></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="color: #000000; font-size: 24px; font-weight: bold; background-color: #ffffff; border: none;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="containerQR">
                        <form action="/update-QR/{{ $uuid }}" method="POST">
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
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="printThis" class="container mt-5" style="text-align: center">
    @if (empty($accountsPayments->titleQR) &&
            empty($accountsPayments->descriptionQR) &&
            empty($accountsPayments->nameQR) &&
            empty($accountsPayments->dateCreated) &&
            empty($accountsPayments->shareQR))
        <div class="titleQR">
            Make Memories
        </div>
        <div class="description">
            <p>to our wedding</p>
            <h3> olivia & richard</h3>
            <p>18.09.2023</p>
        </div>
        <div class="qr-area" data-img="">
            <div class="text-center position-relative">
                @if ($accountsPayments->type == '1')
                    <img style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height: 100px; width: 200px; z-index: 100; border-radius:50%; filter: saturate(145%); background: rgba(255, 255, 255, 0.151);"
                        src="{{ asset('assets/images/icons/LOGO3.png') }}" class="white-logo" alt="logo">
                    {!! QrCode::size(250)->margin(3)->eye('circle')->generate(url('http://makeitmemories.net/public-gallery/events/' . $uuid . '/show')) !!}
                @else
                    {!! QrCode::size(250)->margin(3)->eye('circle')->generate(url('http://makeitmemories.net/public-gallery/events/' . $uuid . '/show')) !!}
                @endif
            </div>
        </div>
        <div class="notice">
            <span style="white-space: pre-line">please scan this qr code
                share your memories with us!</span>
        </div>
    @else
        <div class="titleQR" style="max-width: 100%; word-wrap: break-word;">
            {{ $accountsPayments['titleQR'] }}
        </div>
        <div class="description">
            <p style="max-width: 100%; word-wrap: break-word;">{{ $accountsPayments['descriptionQR'] }}</p>
            <h3 style="max-width: 100%; word-wrap: break-word;"> {{ $accountsPayments['nameQR'] }}</h3>
            @if (empty($accountsPayments->dateCreated))
            @else
                <p>{{ \Carbon\Carbon::parse($accountsPayments['dateCreated'])->format('d.m.Y') }}</p>
            @endif
        </div>
        <div class="qr-area" data-img="">
            <div class="text-center position-relative">
                <img style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height: 100px; width: 200px; z-index: 100; border-radius:50%; filter: saturate(145%); background: rgba(255, 255, 255, 0.151);"
                    src="{{ asset('assets/images/icons/LOGO3.png') }}" class="white-logo" alt="logo">
                {!! QrCode::size(250)->margin(3)->eye('circle')->generate(url('http://makeitmemories.net/public-gallery/events/' . $uuid . '/show')) !!}
            </div>
        </div>
        <div class="notice" style="max-width: 100%; word-wrap: break-word;">
            <span style="white-space: pre-line">{{ $accountsPayments['shareQR'] }}</span>
        </div>
    @endif
</div>

@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    async function generatePDF() {
        const element = document.getElementById("printThis"); // Replace with your HTML element's Form

        // Configuration for html2pdf
        const options = {
            margin: 10,
            filename: "myQR.pdf",
            image: {
                type: 'jpeg',
                quality: 8
            },
            html2canvas: {
                scale: 8
            },
            jsPDF: {
                unit: 'mm',
                format: 'a4',
                orientation: 'portrait',
            },
        };

        // Generate PDF
        html2pdf().from(element).set(options).save();

    }

    // Call the generatePDF function
    document.getElementById('downloadQR').addEventListener('click', function() {
        setTimeout(generatePDF, 1000); // Delay for 1 second (adjust as needed)
    });
</script>

<script>
    let dateInput = document.getElementById("min-date");
    dateInput.min = new Date().toISOString().split("T")[0];
</script>
@endsection

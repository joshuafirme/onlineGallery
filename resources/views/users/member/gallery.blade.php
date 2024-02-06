@extends('layouts.gallerybase')

@section('title')
    Your-Gallery {{ $uuid }}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/gallery/gallery_style.css') }}" />
@section('HeaderTitle')
    <h1>My Gallery</h1>
@endsection

@if ($media->contains('is_Check', 1))
    <div id="carouselContainer">
        <div id="carouselExampleControls" pause="false" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                @php
                    $activeMediaId = null; // Variable to track the active media id
                @endphp
                @foreach ($media as $key => $singleMedia)
                    @if ($singleMedia->is_Check == 1 && $singleMedia->accounts_payments_uuid == $uuid)
                        @php
                            $carouselClass = $activeMediaId === null || $activeMediaId === $singleMedia->id ? 'active' : '';
                            // Check if no active media id is set or if it matches the current media id
                            if ($carouselClass === 'active') {
                                $activeMediaId = $singleMedia->id; // Set the active media id
                            }
                        @endphp

                        <div class="carousel-item {{ $carouselClass }}" id="carousel-item">
                            <div class="carousel-item-content" id="carousel-item-content"
                                style="height: 500px; width: 100%; overflow: hidden; position: relative; display: flex; align-items: center; justify-content: center; margin: 0 auto;">

                                <div class="d-flex align-items-center justify-content-center h-100 w-100"
                                    style="position: absolute; top: 0; left: 0; background-color: black;">

                                    {{-- Image file --}}
                                    <img src="{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}"
                                        class="d-block img-fluid" alt="Slide {{ $activeMediaId + 1 }}"
                                        style="object-fit: cover; max-width: 100%; max-height: 100%;"
                                        id="fullscreenImage">
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach

                <!-- FullScreen Button -->
                <button class="fullscreen-button" onclick="toggleFullScreen()" id="fullscreenButton">
                    <i class="bi bi-arrows-fullscreen"></i>
                </button>

                <!-- Play Button -->
                <div class="play-button">
                    <button id="playButton"><i class="bi bi-play-fill"></i></button>
                </div>

                <!-- Background Music -->
                <audio id="backgroundMusic" loop>
                    <source src="{{ asset('assets/audio/test.mp3') }}" type="audio/mp3">
                </audio>

            </div>
        </div>
    </div>
@endif

@if ($media->isEmpty())
    <div style="display: flex; align-items: center; justify-content: center; height: 70vh;">
        <p style="text-align: center; font-size: 80px; text-transform: uppercase; font-weight: bolder; color: rgb(173, 173, 173);">No Media To Display</p>
    </div>
@else
    <button class="btn btn-primary" type="button" id="toggleCheckboxBtn"><i class="bi bi-pencil-square"> add to
            slideshow</i></button>
@endif

<div class="container mt-5">
    <div class="gallery-container">
        <form method="POST" action="/update-media" enctype="multipart/form-data">
            @csrf
            <div class="gallery-item">
                @forelse ($media as $singleMedia)
                    {{-- onmouseover="showDeleteButton(this)" onmouseout="hideDeleteButton(this)" --}}
                    <div class="wrapper">

                        <!-- Show delete button initially as hidden -->
                        {{-- <form id="deleteForm" method="POST"
                            action="{{ route('delete-media', ['id' => $singleMedia->id]) }}"
                            onsubmit="return confirm('Are you sure you want to delete this media?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" style="z-index: 100;">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form> --}}

                        <a href="{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}"
                            download="{{ $singleMedia->file_path }}" class="download-link " style="z-index: 100;">
                            <i class="bi bi-download"></i>
                        </a>

                        @if (strpos($singleMedia->file_path, '.mp4') !== false || strpos($singleMedia->file_path, '.webm') !== false)
                            {{-- Video file --}}
                            <video controls>
                                <source
                                    src="{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}"
                                    type="video/mp4">
                                Your browser does not support the video tag.
                            </video>

                            <div class="view-link"
                                onclick="openVideoModal('{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}')">
                                view
                            </div>
                        @else
                            <div class="view-link"
                                onclick="openImageModal('{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}')">
                                view
                            </div>
                            {{-- Image file --}}
                            <img src="{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}"
                                alt="" class="image">

                            <input type="checkbox" value="{{ $singleMedia->id }}"
                                id="myCheckbox_{{ $singleMedia->id }}" name="media[]" style="display: none">
                        @endif


                    </div>
                @empty
                @endforelse
            </div>
            <div id="whiteBG">
                <button class="btn btn-primary" type="submit" id="submitBtn">Submit</button>
            </div>
        </form>
    </div>
</div>

<div id="myVideoModal" class="modal">
    <div class="modal-content" id="videoContainer">
        <span class="close" onclick="closeModal('myVideoModal')">&times;</span>
        <video id="modalVideo" alt="Media" controls></video>
    </div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content" id="imageContainer">
        <span class="close" onclick="closeModal('myModal')">&times;</span>
        <img id="modalImage" src="" alt="Media">
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/popup-modal.js') }}"></script>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.js"></script>

<script>
    // Play Button Click Event
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Document is ready.');

        var audio = document.getElementById('backgroundMusic');
        var carouselElement = document.getElementById('carouselExampleControls');
        var carousel = new bootstrap.Carousel(carouselElement, {
            interval: 3000 // Set interval to false for manual control
        });

        audio.volume = 0.1;

        carouselElement.addEventListener('mouseover', function(event) {
            if (!audio.paused && !isMouseOverPlayButton(event)) {
                carousel.cycle();
            }
        });


        document.getElementById('playButton').addEventListener('click', function() {

            if (audio.paused) {
                console.log('Audio & Slides are playing.');
                audio.play();
                carousel.cycle(); // Start the carousel
                this.innerHTML = '<i class="bi bi-pause-fill"></i>';
            } else {
                console.log('Audio & Slides are paused.');
                audio.pause();
                carousel.pause(); // Pause the carousel
                this.innerHTML = '<i class="bi bi-play-fill"></i>';
            }
        });

        carouselElement.addEventListener('mouseleave', function() {
            // Resume the carousel when not hovered
            if (audio.paused) {
                carousel.pause();
            }
        });

        function isMouseOverPlayButton(event) {
            // Check if the mouse is over the play button or any other specific element
            return event.target === playButton || event.target.closest('.play-button') !== null;
        }


        carousel.pause();

        // Fullscreen Button Click Event
        document.getElementById('fullscreenButton').addEventListener('click', function() {
            toggleFullScreen();
        });

        // Add the following event listener to detect window resize
        window.addEventListener('resize', adjustCarouselHeight);

        // Listen for the fullscreenchange event and adjust the carousel height accordingly
        document.addEventListener('fullscreenchange', adjustCarouselHeight);

        // Update your existing toggleFullScreen function
        function toggleFullScreen() {
            var carouselElement = document.getElementById('carouselContainer');

            if (!document.fullscreenElement) {
                if (carouselElement.requestFullscreen) {
                    carouselElement.requestFullscreen();
                } else if (carouselElement.mozRequestFullScreen) {
                    carouselElement.mozRequestFullScreen();
                } else if (carouselElement.webkitRequestFullscreen) {
                    carouselElement.webkitRequestFullscreen();
                } else if (carouselElement.msRequestFullscreen) {
                    carouselElement.msRequestFullscreen();
                }
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                } else if (document.mozCancelFullScreen) {
                    document.mozCancelFullScreen();
                } else if (document.webkitExitFullscreen) {
                    document.webkitExitFullscreen();
                } else if (document.msExitFullscreen) {
                    document.msExitFullscreen();
                }
            }
        }

        // Update your existing adjustCarouselHeight function
        function adjustCarouselHeight() {
            var carouselItems = document.querySelectorAll('.carousel-item-content');
            var carouselElement = document.getElementById('carouselContainer');
            var isFullScreen = document.fullscreenElement || document.mozFullScreenElement || document
                .webkitFullscreenElement || document.msFullscreenElement;

            if (isFullScreen) {
                carouselItems.forEach(function(item) {
                    item.style.height = '100vh';
                });
                carouselElement.style.paddingLeft = '200px';
                carouselElement.style.paddingRight = '200px';
            } else {
                carouselItems.forEach(function(item) {
                    item.style.height = '500px'; // or your original height
                });
                carouselElement.style.paddingLeft = '0px';
                carouselElement.style.paddingRight = '0px';
            }
        }

    });
</script>


<script>
    $(document).ready(function() {
        // Initially hide the submit button
        $('#submitBtn').hide();
        $('#whiteBG').hide();

        // Add a change event listener to checkboxes
        $('input[type="checkbox"]').change(function() {
            // Check if any checkbox is checked
            if ($('input[type="checkbox"]:checked').length > 0) {
                // If checked, show the submit button
                $('#submitBtn').show();
                $('#whiteBG').show();
            } else {
                // If not checked, hide the submit button
                $('#submitBtn').hide();
                $('#whiteBG').hide();
            }
        });
    });
</script>

<script>
    document.getElementById('toggleCheckboxBtn').addEventListener('click', function() {
        var checkboxes = document.getElementsByName('media[]');
        for (var i = 0; i < checkboxes.length; i++) {
            checkboxes[i].style.display = checkboxes[i].style.display === 'none' ? 'inline-block' : 'none';
        }
    });
</script>

<script>
    function showDeleteButton(wrapper) {
        wrapper.querySelector('.delete-button').style.display = 'block';
    }

    function hideDeleteButton(wrapper) {
        wrapper.querySelector('.delete-button').style.display = 'none';
    }
</script>

<script>
    $(document).ready(function() {
        // Array of possible classes
        var widthClasses = ['', 'wide', 'tall', 'big', ''];

        // Iterate over each .gallery-container
        $('.wrapper').each(function() {
            // Get random classes
            var randomWidthClass = widthClasses[Math.floor(Math.random() * widthClasses.length)];

            // Apply classes to the current .gallery-container
            $(this).addClass(randomWidthClass);
        });
    });
</script>
@endsection

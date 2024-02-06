@extends('layouts.gallerybase')

@section('title')
    Your-Gallery-Videos {{ $uuid }}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/gallery/gallery_style.css') }}" />
@section('HeaderTitle')
    <h1>My Videos</h1>
@endsection

<div class="container">
    <div class="gallery-container">
        <div class="gallery-item">

            @forelse ($media as $singleMedia)
                @if (strpos($singleMedia->file_path, '.mp4') !== false || strpos($singleMedia->file_path, '.webm') !== false)
                    <div class="wrapper" onmouseover="showDeleteButton(this)" onmouseout="hideDeleteButton(this)">
                        <!-- Show delete button initially as hidden -->
                        <form method="POST" action="{{ route('delete-media', ['id' => $singleMedia->id]) }}"
                            onsubmit="return confirm('Are you sure you want to delete this media?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button" style="z-index: 100;">
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </form>

                        <a href="{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}"
                            download="{{ $singleMedia->file_path }}" class="download-link" style="z-index: 100;">
                            <i class="bi bi-download"></i>
                        </a>

                        <div class="view-link"
                            onclick="openModal('{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}')">
                            view
                        </div>


                        {{-- Video file --}}
                        <video controls>
                            <source src="{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}"
                                type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    </div>
                @endif
            @empty
                <div style="display: flex; align-items: center; justify-content: center; height: 70vh;">
                    <p
                        style="text-align: center; font-size: 80px; text-transform: uppercase; font-weight: bolder; color: rgb(173, 173, 173);">
                        No Media To Display</p>
                </div>
            @endforelse


        </div>
    </div>
</div>

<div id="myModal" class="modal">
    <div class="modal-content" id="mediaContainer">
        <span class="close" onclick="closeModal()">&times;</span>
        <video id="modalImage" alt="Media" controls>
    </div>
</div>

@endsection

@section('scripts')
<script>
    function openModal(imagePath) {
        var modal = document.getElementById('myModal');
        var modalImage = document.getElementById('modalImage');

        // Set the image source
        modalImage.src = imagePath;

        // Display the modal
        modal.style.display = 'block';
    }

    function closeModal() {
        var modal = document.getElementById('myModal');

        // Hide the modal
        modal.style.display = 'none';
    }

    // Close the modal if the user clicks outside of it
    window.onclick = function(event) {
        var modal = document.getElementById('myModal');
        if (event.target === modal) {
            modal.style.display = 'none';
        }
    };
</script>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.2/dropzone.js"></script>

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

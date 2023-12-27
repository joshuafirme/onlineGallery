@extends('layouts.public-gallerybase')

@section('title')
    Website Title | Public-Gallery-Events-{{ $uuid }}
@endsection

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/css/gallery/gallery_style.css') }}" />
@section('HeaderTitle')
    <h1>Events Gallery</h1>
@endsection

<div class="container">
    <div class="gallery-container">
        <div class="gallery-item">

            @forelse ($media as $singleMedia)
                {{-- onmouseover="showDeleteButton(this)" onmouseout="hideDeleteButton(this)" --}}
                <div class="wrapper">
                    {{-- <!-- Show delete button initially as hidden -->
                        <form method="POST" action="{{ route('delete-media', ['id' => $singleMedia->id]) }}"
                            onsubmit="return confirm('Are you sure you want to delete this media?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button">
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
                            <source src="{{ asset('uploadedFiles/Media/' . $uuid . '/' . $singleMedia->file_path) }}"
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
                    @endif

                </div>
            @empty
            @endforelse

        </div>
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

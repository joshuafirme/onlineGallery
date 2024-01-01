@section('title', $page_title)

@include('admin.components.head')
@include('admin.components.sidenav')
@include('admin.components.topnav')


<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">{{ $page_title }}</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('admin.components.alerts')


                        <form action="{{ url('/website-content') }}" method="POST" class="row"
                            autocomplete="off">
                            @csrf

                            <input type="hidden" name="type" value="{{ request()->type }}">

                            <div class="col-12 mb-3">
                                <textarea id="editor" name="content"> {!! $data !!}  </textarea>
                            </div>

                            <div class="col-6 mt-4">
                                <button class="btn btn-primary px-4" type="submit">Save</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

{{-- @include('admin.warranty-certificate.modals') --}}

@include('admin.components.foot')

<script src="{{ asset('libs/js/shared/script.js') }}"></script>

{{-- @include('admin.warranty-certificate.script') --}}

<script src="https://cdn.ckeditor.com/ckeditor5/35.2.0/classic/ckeditor.js"></script>

<script>
    $(function() {
        if ($('#editor').length > 0) {
            ClassicEditor
                .create(document.querySelector('#editor'), {
                    ckfinder: {
                        uploadUrl: '{{ env('APP_URL') }}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json'
                    }
                })
                .catch(error => {
                    console.error(error);
                });
        }
    });
</script>

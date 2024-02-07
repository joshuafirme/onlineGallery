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


                        <form action="{{ url('/website-content') }}" method="POST" class="row" autocomplete="off">
                            @csrf

                            <input type="hidden" name="type" value="{{ request()->type }}">

                            @if (request()->type == 'affiliate_commission')
                                <div class="col-4 mb-3">
                                    <label class="form-label">Commission Percentage</label>
                                    <div class="input-group mb-3">
                                        <input type="number" step="0.1" class="form-control" name="content"
                                            value="{{ $data }}">
                                        <span class="input-group-text" id="basic-addon2">%</span>
                                    </div>
                                </div>
                            @elseif (request()->type == 'social_links')
                                <div class="col-4 mb-3">
                                    <label class="form-label">Facebook</label>
                                    <input type="text" class="form-control" name="facebook"
                                        value="{{ isset($data['facebook']) ? $data['facebook'] : '' }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <label class="form-label">Instagram</label>
                                    <input type="text" class="form-control" name="instagram"
                                        value="{{ isset($data['instagram']) ? $data['instagram'] : '' }}">
                                </div>
                                <div class="col-4 mb-3">
                                    <label class="form-label">Tiktok</label>
                                    <input type="text" class="form-control" name="tiktok"
                                        value="{{ isset($data['tiktok']) ? $data['tiktok'] : '' }}">
                                </div>
                            @else
                                <div class="col-12 mb-3">
                                    <textarea id="editor" name="content"> {!! $data !!}  </textarea>
                                </div>
                            @endif

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

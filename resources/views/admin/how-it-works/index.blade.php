@php
    $title = 'How It Works';
@endphp
@section('title', $title)

@include('admin.components.head')
@include('admin.components.sidenav')
@include('admin.components.topnav')


<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">{{ $title }}</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @include('admin.components.alerts')

                        <h3>Description</h3>
                        <form action="{{ url('/website-content') }}" method="POST" class="row" autocomplete="off">
                            @csrf

                            <input type="hidden" name="type" value="how_it_works">
                            <div class="col-12">
                                <textarea id="editor" name="content"> {!! $how_it_works !!}  </textarea>
                            </div>

                            <div class="col-6 mt-3">
                                <button class="btn btn-primary px-4" type="submit">Save</button>
                            </div>
                        </form>
                        <hr class="mb-3">
                        
                        <h3>Instructions</h3>

                        <a class="btn btn-sm btn-primary mt-3 mb-3 btn-edit" data-bs-toggle="modal"
                            data-bs-target="#updateModal"><i class="fa fa-plus"></i>
                            Add</a>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Step Name</th>
                                        <th>Title</th>
                                        <th>Icon</th>
                                        <th>Description</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                        @foreach ($data as $item)
                                            <tr id="{{ $item->id }}">
                                                <td>
                                                    <a class="btn btn-primary mb-2 btn-edit btn-sm"
                                                        data-item="{{ $item }}" data-bs-toggle="modal"
                                                        data-bs-target="#updateModal">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger mb-2 btn-delete btn-sm"
                                                        data-id="{{ $item->id }}">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </a>
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td>{{ $item->title }}</td>
                                                <td><i style="font-size: 40px;" class="{{ $item->icon_class }}"></i></td>
                                                <td class="wrap">
                                                    <div>{{ $item->description }}</div>
                                                </td>
                                                <td>{{ $item->created_at }}</td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="22">
                                                <div class="alert alert-primary alert-dismissible" role="alert">
                                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                        aria-label="Close"></button>
                                                    <div class="alert-message">
                                                        No data found.
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        @php
                            echo $data->links('pagination::bootstrap-4');
                        @endphp
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('admin.how-it-works.modals')

@include('admin.components.foot')

<script src="{{ asset('libs/js/shared/script.js') }}"></script>

@include('admin.how-it-works.script')
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
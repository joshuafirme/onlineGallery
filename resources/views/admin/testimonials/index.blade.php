@php
    $title = 'Testimonials';
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

                        <a class="btn btn-sm btn-primary mt-3 mb-3 btn-edit" data-bs-toggle="modal"
                            data-bs-target="#updateModal"><i class="fa fa-plus"></i>
                            Add</a>
                        <div class="row">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Action</th>
                                        <th>Profile</th>
                                        <th>Name</th>
                                        <th>Testimonial</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                        @foreach ($data as $item)
                                            <tr id="{{ $item->id }}">
                                                <td>
                                                    <a class="btn btn-primary mb-2 btn-edit"
                                                        data-item="{{ $item }}" data-bs-toggle="modal"
                                                        data-bs-target="#updateModal">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger mb-2 btn-delete"
                                                        data-id="{{ $item->id }}">
                                                        <i class="fa-regular fa-trash-can"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <a target="_blank" href="{{ url($item->profile_img) }}"><img src="{{ asset($item->profile_img) }}" width="150px" alt=""></a>
                                                </td>
                                                <td>{{ $item->name }}</td>
                                                <td class="wrap">{{ $item->description }}</td>
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

@include('admin.testimonials.modals')

@include('admin.components.foot')

<script src="{{ asset('libs/js/shared/script.js') }}"></script>

@include('admin.testimonials.script')



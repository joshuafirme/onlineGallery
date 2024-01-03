

@php
    $title = "Users"
@endphp
@section('title', $title)

@include('admin.components.head')
@include('admin.components.sidenav')
@include('admin.components.topnav')


<main class="content">
    <div class="container-fluid p-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Administration</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
        <h1 class="h3 mb-3">{{ $title }}</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    @include('admin.components.alerts')

                    <a class="btn btn-sm btn-primary mt-3 mb-3 btn-edit" data-bs-toggle="modal"
                        data-bs-target="#updateModal"><i class="fa fa-plus"></i>
                        Add User</a>
                    <div class="row">
                        <form action="{{ url('/users') }}" method="get" class="mt-2 ml-auto col-md-4"
                            autocomplete="off" style="margin-left: auto">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control input-search" name="key"
                                    style="width: 280px;" placeholder="Search by name, email, or Employee ID"
                                    value="{{ isset($_GET['key']) ? $_GET['key'] : '' }}">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($users) > 0)
                                @foreach ($users as $item)
                                    <tr id="{{ $item->id }}">
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            @if ($item->status == 1) 
                                                <span class="badge rounded-pill bg-success">Active</span>
                                            @elseif ($item->status == 0) 
                                                <span class="badge rounded-pill bg-danger">Inactive</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-primary mb-2 btn-edit" data-item="{{ $item }}"
                                                data-bs-toggle="modal" data-bs-target="#updateModal">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            @if ($item->role_ids != 1)
                                            <a class="btn btn-danger mb-2 btn-delete" data-id="{{ $item->id }}">
                                                <i class="fa-regular fa-trash-can"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="12">
                                        <div class="alert alert-primary">No requests found.</div>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    @php
                        echo $users->links('pagination::bootstrap-4');
                    @endphp
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('admin.users.modals')

@include('admin.components.foot')

<script src="{{ asset('libs/js/shared/script.js') }}"></script>

@include('admin.users.script')

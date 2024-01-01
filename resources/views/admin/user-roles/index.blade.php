@php
    $title = 'User Roles';
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
                        <div>
                            <button type="button" id="btn-create" class="btn btn-sm btn-primary w-auto open-modal mb-3"
                                modal-type="create">
                                Create Role<i class="bi bi-plus"></i>
                            </button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Permissions</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($user_roles) > 0)
                                        @foreach ($user_roles as $item)
                                            <tr id="{{ $item->id }}">
                                                <td>{{ $item->name }}</td>
                                                <td>
                                                    @php
                                                        if ($item->permissions != 'null' && $item->permissions) {
                                                            $permissions = json_decode($item->permissions);
                                                            foreach ($permissions as $value) {
                                                                echo '<span class="badge m-1 rounded-pill bg-success">' . Utils::decodeSlug($value) . '</span><br>';
                                                            }
                                                        }
                                                        
                                                    @endphp
                                                </td>
                                                <td>
                                                    <a class="btn btn-primary btn-edit open-modal" modal-type="update"
                                                        data-info="{{ json_encode($item) }} "><i class="fa fa-edit"></i></a>
    
                                                    @if ($item->id != 1)
                                                        <a class="btn btn-danger btn-delete" data-id="{{ $item->id }}">
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
                        </div>
                        @php
                            echo $user_roles->links('pagination::bootstrap-4');
                        @endphp
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('admin.user-roles.modals')

@include('admin.components.foot')

<script src="{{ asset('libs/js/shared/script.js') }}"></script>

@include('admin.user-roles.script')

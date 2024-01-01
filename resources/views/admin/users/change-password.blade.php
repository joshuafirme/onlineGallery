

@php
    $title = "Change Password"
@endphp
@section('title', $title)

@include('admin.components.head')
@include('admin.components.sidenav')
@include('admin.components.topnav')


<main class="content">
    <div class="container-fluid p-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Account</a></li>
                <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
        </nav>
        <h1 class="h3 mb-3">{{ $title }}</h1>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                    @include('admin.components.alerts')
                    <form action="{{ url('/user/update-password') }}" method="post" class="row mt-3">
                        @csrf
                        <div class="col-md-6 mb-3">
                            <label>New Password</label>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>


@include('admin.components.foot')

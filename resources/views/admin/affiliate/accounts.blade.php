@php
    $title = 'Affiliate Dashboard';
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

                        <div class="row">
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Unique ID</th>
                                        <th>Account Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Social Links</th>
                                        <th>Date Registered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->uuid }}</td>
                                                <td>{{ $item->account_name }}</td>
                                                <td><a target="_blank"
                                                        href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                                                <td>{{ $item->contact_number }}</td>
                                                <td>
                                                    @if ($item->fb_link)
                                                        <div><i class="fa fa-facebook"></i> <a
                                                                href="{{ $item->fb_link }}">{{ $item->fb_link }}</a>
                                                        </div>
                                                    @endif
                                                    @if ($item->ig_link)
                                                        <div><i class="fa fa-instagram"></i> <a
                                                                href="{{ $item->ig_link }}">{{ $item->ig_link }}</a>
                                                        </div>
                                                    @endif
                                                    @if ($item->tiktok_link)
                                                        <div><i class="fa fa-tiktok"></i> <a
                                                                href="{{ $item->tiktok_link }}">{{ $item->tiktok_link }}</a>
                                                        </div>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y') }}
                                                </td>
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

@include('admin.components.foot')

<script src="{{ asset('libs/js/shared/script.js') }}"></script>

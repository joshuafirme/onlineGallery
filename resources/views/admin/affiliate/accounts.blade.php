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
                                        <th>Landing Page Link</th>
                                        <th>Contact Number</th>
                                        <th>Social Media Accounts</th>
                                        <th>Date Registered</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->uuid }}</td>
                                                <td>{{ $item->account_name }}</td>
                                                <td>
                                                    <a target="_blank"
                                                        href="mailto:{{ $item->email }}">{{ $item->email }}</a>
                                                </td>
                                                <td>
                                                    @php
                                                        $landing_page = env('APP_URL') . '/homepage/' . Utils::slugify($item->account_name, '-')
                                                    @endphp
                                                    <a target="_blank"
                                                    href="{{ $landing_page }}">{{ $landing_page }}</a>
                                                </td>
                                                <td>{{ $item->contact_number }}</td>
                                                <td>
                                                    @if ($item->fb_link)
                                                        <div> 
                                                            <a target="_blank" href="{{ $item->fb_link }}"><i class="fa-brands fa-facebook-f"></i> {{ $item->fb_link }}</a>
                                                        </div>
                                                    @endif
                                                    @if ($item->ig_link)
                                                        <div> 
                                                            <a target="_blank" href="{{ $item->ig_link }}"><i class="fa-brands fa-instagram"></i> {{ $item->ig_link }}</a>
                                                        </div>
                                                    @endif
                                                    @if ($item->tiktok_link)
                                                        <div> 
                                                            <a target="_blank" href="{{ $item->tiktok_link }}"><i class="fa-brands fa-tiktok"></i> {{ $item->tiktok_link }}</a>
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

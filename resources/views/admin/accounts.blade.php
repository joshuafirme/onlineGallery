@php
    $title = 'Account Payments';
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
                                        <th>#</th>
                                        <th>Client</th>
                                        <th>Amount</th>
                                        <th>Payer ID</th>
                                        <th>View</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($accounts) > 0)
                                        @foreach ($accounts as $account)
                                            <tr>
                                                <td>{{ $account->id }}.)</td>
                                                <td>{{ $account->client_name }}</td>
                                                <td>{{ $account->amount }} {{ $account->currency }}</td>
                                                <td>{{ $account->payer_id }}</td>
                                                <td><a target="_blank" href="public-gallery/events/{{ $account->uuid }}/show">View
                                                        gallery</a></td>
                                                <td>{{ \Carbon\Carbon::parse($account->created_at)->format('F j, Y') }}
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
                            echo $accounts->links('pagination::bootstrap-4');
                        @endphp
                    </div>
                </div>
            </div>
        </div>

    </div>
</main>

@include('admin.components.foot')

<script src="{{ asset('libs/js/shared/script.js') }}"></script>


@php
    $title = 'Affiliate Commissions';
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
                                        <th>Account Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Commission Amount</th>
                                        <th>Percentage</th>
                                        <th>Created</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($data) > 0)
                                        @foreach ($data as $item)
                                            <tr>
                                                <td>{{ $item->account_name }}</td>
                                                <td><a target="_blank"
                                                        href="mailto:{{ $item->email }}">{{ $item->email }}</a></td>
                                                <td>{{ $item->contact_number }}</td>
                                                <td>{{ $item->commission_amount }} {{ $item->currency }}</td>
                                                <td>{{ $item->percentage }}</th>
                                                <td>{{ $item->created_at }}
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

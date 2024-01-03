@php
    $title = 'Dashboard';
@endphp
@section('title', $title)

@include('admin.components.head')

@if (!str_contains(request()->path(), 'affiliate-dashboard'))
    @include('admin.components.sidenav')
@endif

@include('admin.components.topnav')


<main class="content">
    <div class="container-fluid p-0">
        <h1 class="h3 mb-3">{{ $title }}</h1>

        <div class="row mb-3">


            <div class="col-sm-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Account Name</th>
                                <td>{{ $affiliate->account_name }}</td>
                            </tr>
                            <tr>
                                <th>Date Registered</th>
                                <td>{{ Utils::formatDate($affiliate->created_at) }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col mt-0">
                                <h5 class="card-title">Total Earned</h5>
                            </div>

                            <div class="col-auto">
                                <div class="stat text-primary">
                                    <i class="align-middle" data-feather="dollar-sign"></i>
                                </div>
                            </div>
                        </div>
                        <h1 class="mt-1 mb-3">${{ $total_earned }}</h1>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="head">
                            <h3>Commissions</h3>
                        </div>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Commission Amount</th>
                                    <th>Percentage</th>
                                    <th>Created</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($commissions) > 0)
                                    @foreach ($commissions as $commission)
                                        <tr>
                                            <td>{{ $commission->commission_amount }} {{ env('PAYPAL_CURRENCY') }}</td>
                                            <td>{{ $commission->percentage }}</th>
                                            <td>{{ $commission->created_at }}
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
                </div>
            </div>

        </div>


    </div>
</main>


@include('admin.components.foot')

<script src="{{ asset('libs/js/shared/script.js') }}"></script>

@extends('layouts.adminbase')

@section('title')
    Website Title | Dashboard
@endsection

@section('content')
    <main>
        <div class="head-title">
            <div class="left">
                <h1 style="font-weight: bolder">Dashboard</h1>
            </div>
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="/homepage">Home</a></li>
                </ol>
            </nav>
        </div>
        <ul class="box-info">
            <li>
                <i class="bi bi-person-check-fill"></i>
                <span class="text">
                    <h3>{{ $accountsCount }}</h3>
                    <p>Total Accounts Purchased</p>
                </span>
            </li>
            <li>
                <i class="bi bi-cash-stack"></i>
                <span class="text">
                    <h3>${{ $totalSales }}</h3>
                    <p>Total Sales</p>
                </span>
            </li>
            <li>
                <i class="bi bi-people-fill"></i>
                <span class="text">
                    <h3>526</h3>
                    <p>Total Visits</p>
                </span>
            </li>
        </ul>

        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Recent Purchase</h3>
                </div>
                <table class="table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Payer ID</th>
                            <th>Transaction ID</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $account)
                            <tr>
                                <td>{{ $account->id }}.)</td>
                                <td>{{ $account->client_name }}</td>
                                <td>{{ $account->payer_id }}</td>
                                <td>{{ $account->payment_id }}</td>
                                <td>${{ $account->amount }}</td>
                                <td>{{ \Carbon\Carbon::parse($account->created_at)->format('F j, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- <div class="todo">
                <div class="head">
                    <h3>To-do list</h3>
                    <i class="bi bi-plus"></i>
                    <i class="bi bi-filter"></i>
                </div>
                <ul class="todo-list">
                    <li class="completed">
                        <p>To-do list</p>
                        <i class="bi bi-three-dots-vertical"></i>
                    </li>
                    <li class="not-completed">
                        <p>To-do list</p>
                        <i class="bi bi-three-dots-vertical"></i>
                    </li>
                    <li class="completed">
                        <p>To-do list</p>
                        <i class="bi bi-three-dots-vertical"></i>
                    </li>
                    <li class="not-completed">
                        <p>To-do list</p>
                        <i class="bi bi-three-dots-vertical"></i>
                    </li>
                    <li class="completed">
                        <p>To-do list</p>
                        <i class="bi bi-three-dots-vertical"></i>
                    </li>
                </ul>
            </div> --}}
        </div>
    </main>
@endsection

@section('scripts')
@endsection

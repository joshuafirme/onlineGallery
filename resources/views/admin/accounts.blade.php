@extends('layouts.adminbase')

@section('title')
    Website Title | Accounts
@endsection

@section('content')
    <style>
        .containerRegister {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 68.2vh;
        }

        .containerRegister form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #buttonRegister {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        #buttonRegister:hover {
            background-color: #45a049;
        }
    </style>
    <main>
        <div class="table-data">
            <div class="order">
                <div class="head">
                    <h3>Accounts</h3>
                </div>
                <table class="table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Client</th>
                            <th>Payer ID</th>
                            <th>View</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accounts as $account)
                            <tr>
                                <td>{{ $account->id }}.)</td>
                                <td>{{ $account->client_name }}</td>
                                <td>{{ $account->payer_id }}</td>
                                <td><a href="public-gallery/events/{{ $account->uuid }}/show">View gallery</a></td>
                                <td>{{ \Carbon\Carbon::parse($account->created_at)->format('F j, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="todo">
                <div class="head">
                    <h3>Admins</h3>
                    <!-- Button to trigger the modal -->
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal">
                        <i class="bi bi-plus"></i>
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Register Admin</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="containerRegister">
                                        <form action="/register/process" method="POST">
                                            @csrf
                                            <label for="name">Username</label>
                                            <input type="text" name="name" required>

                                            <label for="email">Email</label>
                                            <input type="email" name="email" required>

                                            <label for="password">Password</label>
                                            <input type="password" name="password" required>

                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" name="password_confirmation" id="password_confirmation"
                                                required>

                                            <button id="buttonRegister" type="submit">Sign up</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userAccounts as $userAccount)
                            <tr>
                                <td>{{ $userAccount->id }}.)</td>
                                <td>{{ $userAccount->name }}</td>
                                <td>{{ $userAccount->email }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection

@section('scripts')
@endsection

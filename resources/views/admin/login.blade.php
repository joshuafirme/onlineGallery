@extends('layouts.base')

@section('title')
    Make It Memories | Login
@endsection

@section('content')
    <style>

        
        .containerLogin {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 69.4vh;
        }

        .containerLogin form {
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

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>

    @include('components.error_success_flash_message')

    <div class="containerLogin">
        <form action="/login/process" method="POST">
            @csrf
            <label for="name">Username</label>
            <input type="text" name="name">
            <label for="name">Password</label>
            <input type="password" name="password">
            <button type="submit"> Sign in</button>
        </form>
    </div>
@endsection

@section('scripts')
@endsection

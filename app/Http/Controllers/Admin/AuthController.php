<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('/dashboard');
        }
        return view('admin.login');
    }

    public function doLogin()
    {
        $email = request()->email;
        $password = request()->password;
        $is_authorize = Auth::attempt(['email' => $email, 'password' => $password]);

        if ($is_authorize) {
            session()->put('_token', request()->user()->createToken('token')->plainTextToken);
            return redirect('/dashboard');
        }
        return redirect('/login?unauth=1')->withInput();
    }

    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/');
    }
}

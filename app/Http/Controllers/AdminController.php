<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\AccountsPayments;
use App\Models\Message;

class AdminController extends Controller
{
    public function register_process(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|min:6|confirmed',
        ]);

        $validator->sometimes('password', 'confirmed', function ($input) {
            return $input->password !== $input->password_confirmation;
        });

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $admin = new User();

        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);

        $admin->save();

        if (Auth::check()) {
            return redirect()
                ->route('admin.dashboard')
                ->with('success', 'User created!');
        } else {
            return redirect()
                ->route('login')
                ->with('success', 'User created!');
        }
    }

    public function login()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = User::find($userId);

            return view('/admin/dashboard', [
                'user' => $user,
            ]);
        } else {
            return view('/admin/login', []);
        }
    }

    public function login_process(Request $request)
    {
        if (auth()->attempt(['name' => $request->name, 'password' => $request->password])) {
            return redirect()
                ->route('admin.dashboard')
                ->with('success', 'Login successful!');
        } else {
            return back()->with('error', 'username or password incorrect! please try again!');
        }
    }

    public function indexDashboard()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = User::find($userId);
        }

        $accounts = AccountsPayments::orderby('id', 'desc')->simplePaginate(10);
        $accountsCount = AccountsPayments::count();
        $totalSales = AccountsPayments::sum('amount');

        return view('/admin/dashboard', [
            'user' => $user,
            'accounts' => $accounts,
            'accountsCount' => $accountsCount,
            'totalSales' => $totalSales,
        ]);
    }

    public function message()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = User::find($userId);
        }

        $message = Message::orderby('id', 'desc')->paginate(20);

        return view('/admin/message', [
            'user' => $user,
            'message' => $message,
        ]);
    }

    public function deleteMessage($id)
    {
        $message = Message::find($id);

        $message->delete();

        return redirect()
            ->route('admin.message')
            ->with('success', 'Message deleted successfully.');
    }

    public function accounts()
    {
        if (Auth::check()) {
            $userId = Auth::user()->id;
            $user = User::find($userId);
        }

        $userAccounts = User::orderby('id', 'desc')->paginate(20);

        $accounts = AccountsPayments::orderby('id', 'desc')->paginate(20);

        return view('/admin/accounts', [
            'user' => $user,
            'accounts' => $accounts,
            'userAccounts' => $userAccounts,
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'Logout Successful');
    }
}

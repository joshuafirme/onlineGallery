<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AccountsPayments;
use App\Models\User;
use App\Models\PMR;
use App\Models\PMSTransaction;

class DashboardController extends Controller
{
    public $page = "dashboard";
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return User::isPermitted($this->page) ? $next($request) : redirect('/login');
        });
    }

    public function index()
    {
        $userId = auth()->user()->id;
        $user = User::find($userId);

        $accounts = AccountsPayments::orderby('id', 'desc')->simplePaginate(10);
        $accountsCount = AccountsPayments::count();
        $totalSales = AccountsPayments::sum('amount');

        return view('admin.dashboard', [
            'user' => $user,
            'accounts' => $accounts,
            'accountsCount' => $accountsCount,
            'totalSales' => $totalSales,
        ]);
    }
}

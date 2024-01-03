<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Affiliate;
use App\Models\AffiliateCommission;
use App\Models\User;
use Illuminate\Http\Request;

class AffiliateDashboardController extends Controller
{    public $page = "affiliate_accounts";
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (str_contains($request->path(), 'affiliate-dashboard')) {
                return $next($request);
            }
            return User::isPermitted($this->page) ? $next($request) : redirect('/login');
        });
    }  
    public function affiliateAccounts()
    {
        $data = Affiliate::orderby('id', 'desc')->paginate(20);

        return view('admin.affiliate.accounts', compact('data'));
    }

    public function affiliateCommissions()
    {
        $data = AffiliateCommission::select('affiliate_commissions.*', 'a.account_name', 'a.email', 'a.contact_number')
        ->leftJoin('affiliates as a', 'a.uuid', 'affiliate_uuid')
        ->orderby('id', 'desc')->paginate(20);

        return view('admin.affiliate.commissions', compact('data'));
    }

    public function affiliateDashboard($uuid)
    {            
        $affiliate = Affiliate::where('uuid', $uuid)->first();

        if (!$affiliate) {
            return view('users.pages.403');
        }

        $commissions = AffiliateCommission::where('affiliate_uuid', $uuid)->orderby('id', 'desc')->get();
        $total_earned = AffiliateCommission::where('affiliate_uuid', $uuid)->sum('commission_amount');

        return view('admin.affiliate.dashboard', compact('affiliate', 'commissions', 'total_earned'));
    }
}

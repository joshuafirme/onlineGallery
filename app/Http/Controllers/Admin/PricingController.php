<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pricing;
use App\Models\User;
use App\Helper\Utils;

class PricingController extends Controller
{
    public $page = "sliders";
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return User::isPermitted($this->page) ? $next($request) : redirect('/login');
        });
    }  
 
    public function index()
    {
        $data = Pricing::first();

        return view('admin.pricing', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        Pricing::create($data);

        return redirect()->back()->with('success', 'Pricing was added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except([ '_token' ]);

        $pricing = Pricing::find($id);

        $pricing->update($data);

        return redirect()->back()->with('success', 'Pricing was updated.');
    }

}

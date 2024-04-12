<?php

namespace App\Http\Controllers\Admin;

use Storage;
use App\Http\Controllers\Controller;
use App\Models\HowItWork;
use App\Models\User;
use Illuminate\Http\Request;

class HowItWorksController extends Controller
{

    public $page = "how_it_works";
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return User::isPermitted($this->page) ? $next($request) : redirect('/login');
        });
    }  
 
    public function index()
    {
        $data = HowItWork::paginate(10);

        $file = "content/web_content.json";

        $how_it_works = '';

        if (Storage::disk('public')->exists($file)) {
            $how_it_works = json_decode(Storage::disk('public')->get($file), true)['how_it_works'];
        }


        return view('admin.how-it-works.index', compact('data', 'how_it_works'));
    }
    

    public function store(Request $request)
    {
        $data = $request->all();

        HowItWork::create($data);

        return redirect()->back()->with('success', 'Data was added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except([ '_token' ]);

        $how_it_works = HowItWork::where('id', $id)->first();

        $how_it_works->update($data);

        return redirect()->back()->with('success', 'Data was updated.');
    }

    
    public function destroy($id)
    {
        $query = HowItWork::where('id', $id);
        if ($query->delete()) {
            return response()->json([
                'success' => true,
                'message' => 'Data was deleted.'
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Deletion failed'
        ]);
    }

}

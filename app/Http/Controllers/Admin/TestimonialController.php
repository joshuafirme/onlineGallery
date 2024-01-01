<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use App\Models\User;
use App\Helper\Utils;

class TestimonialController extends Controller
{
    public $page = "testimonials";
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return User::isPermitted($this->page) ? $next($request) : redirect('/login');
        });
    }  
 
    public function index()
    {
        $data = Testimonial::paginate(10);

        return view('admin.testimonials.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $data['profile_img'] = Utils::uploadFile($request->profile_img, 'img/testimonial/');

        Testimonial::create($data);

        return redirect()->back()->with('success', 'Testimonial was added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except([ '_token' ]);

        $testimonial = Testimonial::where('id', $id)->first();

        if ($request->profile_img) {
            $data['profile_img'] = Utils::uploadFile($request->profile_img, 'img/testimonial/');
        }

        $testimonial->update($data);

        return redirect()->back()->with('success', 'Testimonial was updated.');
    }

    
    public function destroy($id)
    {
        $query = Testimonial::where('id', $id);
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

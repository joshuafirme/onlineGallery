<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\User;
use App\Helper\Utils;

class SliderController extends Controller
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
        $data = Slider::paginate(10);

        return view('admin.sliders.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $data['left_image'] = Utils::uploadFile($request->left_image, 'img/slider/');
        $data['right_image'] = Utils::uploadFile($request->right_image, 'img/slider/');

        Slider::create($data);

        return redirect()->back()->with('success', 'Slider was added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except([ '_token' ]);

        $slider = Slider::where('id', $id)->first();

        if ($request->left_image) {
            $data['left_image'] = Utils::uploadFile($request->left_image, 'img/slider/');
        }
        if ($request->right_image) {
            $data['right_image'] = Utils::uploadFile($request->right_image, 'img/slider/');
        }

        $slider->update($data);

        return redirect()->back()->with('success', 'Slider was updated.');
    }

    
    public function destroy($id)
    {
        $query = Slider::where('id', $id);
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

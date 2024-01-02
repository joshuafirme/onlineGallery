<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UsesSlider;
use Illuminate\Http\Request;
use App\Models\Uses;
use App\Models\User;
use App\Helper\Utils;

class UsesController extends Controller
{
    public $page = "uses";
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return User::isPermitted($this->page) ? $next($request) : redirect('/login');
        });
    }  
 
    public function index()
    {
        $data = Uses::paginate(10);

        return view('admin.uses.index', compact('data'));
    }
    
    public function showSlider($uses_id)
    {
        $uses = Uses::find($uses_id);
        if (!$uses) {
            abort(404, 'Slider not found');
        }
        $data = UsesSlider::where('uses_id', $uses_id)->get();

        return view('admin.uses-sliders.index', compact('data', 'uses'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $data['image'] = Utils::uploadFile($request->image, 'img/uses/');

        Uses::create($data);

        return redirect()->back()->with('success', 'Uses was added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except([ '_token' ]);

        $uses = Uses::where('id', $id)->first();

        if ($request->image) {
            $data['image'] = Utils::uploadFile($request->image, 'img/uses/');
        }

        $uses->update($data);

        return redirect()->back()->with('success', 'Uses was updated.');
    }

    
    public function destroy($id)
    {
        $query = Uses::where('id', $id);
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

    public function storeSlider(Request $request)
    {
        $data = $request->all();
        
        $data['image'] = Utils::uploadFile($request->image, 'img/uses-slider/');

        UsesSlider::create($data);

        return redirect()->back()->with('success', 'Uses was added.');
    }

    public function updateSlider(Request $request, $id)
    {
        $data = $request->except([ '_token' ]);

        $slider = UsesSlider::where('id', $id)->first();

        if ($request->image) {
            $data['image'] = Utils::uploadFile($request->image, 'img/uses-slider/');
        }

        $slider->update($data);

        return redirect()->back()->with('success', 'Slider was updated.');
    }

    
    public function destroySlider($id)
    {
        $query = UsesSlider::where('id', $id);
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

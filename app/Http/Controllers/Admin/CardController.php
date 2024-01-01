<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\User;
use App\Helper\Utils;

class CardController extends Controller
{
    public $page = "cards";
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return User::isPermitted($this->page) ? $next($request) : redirect('/login');
        });
    }  
 
    public function index()
    {
        $data = Card::paginate(10);

        return view('admin.cards.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();
        
        $data['image'] = Utils::uploadFile($request->image, 'img/card/');

        Card::create($data);

        return redirect()->back()->with('success', 'Card was added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except([ '_token' ]);

        $card = Card::where('id', $id)->first();

        if ($request->image) {
            $data['image'] = Utils::uploadFile($request->image, 'img/card/');
        }

        $card->update($data);

        return redirect()->back()->with('success', 'Card was updated.');
    }

    
    public function destroy($id)
    {
        $query = Card::where('id', $id);
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

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Helper\Utils;
use App\Models\User;
use Storage;

class WebsiteContentController extends Controller
{  
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return User::isPermitted($request->type) ? $next($request) : redirect('/login');
        });
    }  
    public function index()
    {
        $data = null;
        $file = "content/web_content.json";
        $type = request()->type;
        $page_title = Utils::decodeSlug($type, '_');

        if (Storage::disk('public')->exists($file)) {
            $data = json_decode(Storage::disk('public')->get($file), true);
            if (isset($data[$type])) {
                $data = $data[$type];
            }
            else {
                $data = null;
            }
        }
        return view('admin.website-content.index', compact('data', 'page_title'));
    }

    public function update()
    {
        $type = request()->type;

        $file = "content/web_content.json";

        $data = [];

        if (Storage::disk('public')->exists($file)) {
            $data = json_decode(Storage::disk('public')->get($file), true);
        }

        if ($type == 'social_links') {
            $data[$type] = [
                'facebook' => request()->facebook,
                'instagram' => request()->instagram,
                'tiktok' => request()->tiktok,
            ];
        }
        else {
            $data[$type] = request()->content;
        }

        Storage::disk('public')->put($file, json_encode($data));

        return redirect()->back()->with('success', 'Data was updated.');
    }
}

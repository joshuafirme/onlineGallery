<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserRole;
use App\Imports\UserImport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use Auth;
use Hash;

class UserController extends Controller
{
    public $page = "users";
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            return User::isPermitted($this->page) ? $next($request) : redirect('/login');
        });
    }  
 
    public function index(UserRole $roles)
    {
        $query = User::select('users.*', 'ur.name as role', 'permissions')
            ->leftJoin('user_roles as ur', 'ur.id', '=', 'users.role_id');

            $query->where('users.user_type', 1);
        
        if (request()->key) {
            $query->orWhere('users.name', 'LIKE', '%' . request()->key . '%');
            $query->orWhere('users.email', 'LIKE', '%' . request()->key . '%');
            $query->orWhere('users.employee_id', 'LIKE', '%' . request()->key . '%');
        }

        $users = $query->paginate(10);

        $roleModel = $roles;
        $roles = UserRole::where('status', 1)->get();

        return view('admin.users.index', compact('users', 'roles', 'roleModel'));
    }

    
    public function store(Request $request)
    {
        $data = $request->all();
        $data['password'] = Hash::make($request->password);
        User::create($data);
        return redirect()->back()->with('success', 'User was added.');
    }

    public function update(Request $request, $id)
    {
        $data = $request->except([ '_token' ]);

        if ($request->password && !empty($request->password)) {
            $data['password'] = Hash::make($request->password);
        }
        else {
            unset($data['password']);
        }

        User::where('id', $id)->update($data);
        return redirect()->back()->with('success', 'User was updated.');
    }

public function changePassword()
    {
        return view('admin.users.change-password');
    }
    
    public function updatePassword(Request $request)
    {
        $password = Hash::make($request->password);

        $user = User::find(Auth::id());
        $user->password = $password;

        if ($user->save()) {
            return redirect()->back()->with('success', 'Password was updated successfully.');
        }
        return redirect()->back()->with('danger', 'Unable to update password, please try again.');

    }
    
    public function destroy($id)
    {

        $query = User::where('id', $id);
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


    public function import(Request $request) 
    {
        try {            
            set_time_limit(0);
            ini_set('max_execution_time', '0');

            Excel::import(new UserImport, $request->file('file')->store('temp'));
            return redirect()->back()->with('success', 'Data was successfully imported.');
        } catch (\Exception $e) {
            
            $error_message = "Message: " . $e->getMessage() . "<br>" .
            "File: " . $e->getFile() . "<br>" .    
            "Line: " . $e->getLine() . "<br>";

            return redirect()->back()->with('danger', $error_message);
        }
    }

    public function export() 
    {       
        $file_name = "customers";
        if (request()->user_type == 2) {
            $file_name = "dealers";
        }
        if (request()->is_template) {
            $file_name .= "_template";
        }
        return Excel::download(
            new UserExport, $file_name . '_' . date('Ymdhis') . '.' . request()->type
        );
    }

    public function changeStatus($id = null) 
    {
        $ids = [];
        if ($id) {
            array_push($ids, $id);
        }
        else {
            $ids = request()->ids;
            $ids = explode(",", $ids);
        }
        
        $status = request()->status;
        
        if ($ids) {
            foreach ($ids as $key => $id) {
                User::where('id', $id)->update(['approval_status' => $status ]);
            }
        }

        return response()->json([
            'success' => true,
            'message' => "All items was updated successfully."
        ]);
    }
}

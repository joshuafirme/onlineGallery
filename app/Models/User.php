<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\UserRole;
use Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status', 
        'role_id', 
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public static function isPermitted($page = null) 
    {
        $is_permitted = false;
        
        if (!$page) {
            $page = request()->module;
        }

        if (Auth::check()) {

            $permissions = UserRole::permissions();

            if (in_array($page, $permissions)) {
                $is_permitted = true;
            }
        }

        $current_path = request()->path();

        $accessible_paths = [];

        foreach ($accessible_paths as $path) {
            if (str_contains($current_path, $path)) {
                $is_permitted = true;
                break;
            }
        }

        return $is_permitted;
    }
}

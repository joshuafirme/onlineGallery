<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'account_name',
        'email',
        'contact_number',
        'fb_link',
        'ig_link',
        'tiktok_link',
        'status',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uses extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'title_1',
        'title_2',
        'description_1',
        'description_2',
        'image',
    ];
}

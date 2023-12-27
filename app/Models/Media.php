<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;

    protected $fillable = ['file_path'];

    protected $keyType = 'string';
    protected $primaryKey = 'id';

    public function account()
    {
        return $this->belongsTo(AccountsPayments::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateCommission extends Model
{
    use HasFactory;

    protected $fillable = [
        'affiliate_uuid',
        'accounts_payments_uuid',
        'commission_amount',
        'percentage',
        'currency'
    ];
}

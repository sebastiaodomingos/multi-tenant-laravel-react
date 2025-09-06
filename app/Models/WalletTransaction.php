<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\BelongsToTenant;

class WalletTransaction extends Model
{
    use  BelongsToTenant;
    
    protected $fillable = [
        'tenant_id',
        'shop_id',
        'user_id',
        'type',             // credit | debit
        'amount',
        'balance_before',
        'balance_after',
        'reference',
        'description',
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

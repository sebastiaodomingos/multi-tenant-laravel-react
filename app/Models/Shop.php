<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\BelongsToTenant;

class Shop extends Model
{
    use HasFactory, BelongsToTenant;

    protected $fillable = [
        'user_id',
        'tenant_id',
        'country_id',
        'wallet_balance',
        'time_zone_id',
        'currency_id',
        'name',
        'slug',
        'email',
        'phone',
        'street',
        'city',
        'state',
        'postal_code',
        'website',
        'is_active',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function timeZone()
    {
        return $this->belongsTo(TimeZone::class);
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function walletTransactions()
    {
        return $this->hasMany(WalletTransaction::class);
    }
}

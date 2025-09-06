<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
     use HasFactory;

     protected $fillable = [
        'user_id',
        'country_id',
        'time_zone_id',
        'street',
        'city',
        'state',
        'postal_code',
        'phone',
        'is_default',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}

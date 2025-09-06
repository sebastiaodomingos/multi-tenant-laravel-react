<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeZone extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'label',
        'date_format',
        'time_format',
    ];
}

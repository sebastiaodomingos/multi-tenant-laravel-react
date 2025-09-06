<?php
// app/Models/Provider.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'name',
        'login',
        'api_token',
        'type',
        'description',
        'image',
        'secret_key',
        'api_url',
        'api_test_url',
        'api_test_token',
        'api_test_secret',
        'test_mode',
        'api_key',
        'api_test_key',
        'api_type',
        'enabled',
    ];

    protected $casts = [
        'test_mode' => 'boolean',
        'enabled' => 'boolean',
    ];
}

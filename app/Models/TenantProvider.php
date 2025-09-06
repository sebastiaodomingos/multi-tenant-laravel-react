<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class TenantProvider extends Pivot
{
    protected $table = 'tenant_providers'; // 👈 make sure this matches your migration
    protected $fillable = [
        'provider_id',
        'tenant_id',
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
        'status'
    ];


}

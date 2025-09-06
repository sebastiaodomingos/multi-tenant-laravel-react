<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class TenantService extends Pivot
{
    protected $table = 'tenant_services'; // 👈 make sure this matches your migration
    protected $fillable = [
        'tenant_id',
        'service_id',
        'enabled', // controlled by tenant
        'status'
    ];
}

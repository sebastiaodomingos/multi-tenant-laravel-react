<?php

namespace App\Models\Traits;
use App\Models\Scopes\TenantScope;

trait BelongsToTenant
{
    public static function bootBelongsToTenant()
    {
        static::addGlobalScope(new TenantScope);

        static::creating(function ($model) {
            if (tenant_id()) {
                $model->tenant_id = tenant_id();
            }
        });
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
        protected $fillable = [
        'name',
        'description',
        'logo',
        'enabled',
        'price'
        ];

    protected static function booted()
    {
        // When a service is enabled/disabled
        static::updated(function ($service) {
            if ($service->wasChanged('enabled')) {
                if ($service->enabled) {
                    // Add to all tenants that don't already have it
                    $tenants = \App\Models\Tenant::all();
                    foreach ($tenants as $tenant) {
                        $tenant->services()->syncWithoutDetaching([
                            $service->id => ['enabled' => false],
                        ]);
                    }
                } else {
                    // Optionally remove from tenant_services
                    \App\Models\TenantService::where('service_id', $service->id)->delete();
                }
            }
        });
    }

    public function tenants(): BelongsToMany
    {
        return $this->belongsToMany(Tenant::class, 'tenant_services')
                    ->using(TenantService::class) // use pivot model
                    ->withPivot(['id','enabled'])
                    ->withTimestamps();
    }
}

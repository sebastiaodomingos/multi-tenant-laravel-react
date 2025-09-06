<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use App\Models\Provider;

class Tenant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'domain',
        'logo',
    ];

    protected static function booted()
    {
        //Sync all services to this new created tenant
        static::created(function ($tenant) {
            $enabledServices = \App\Models\Service::where('enabled', true)->get();
            foreach ($enabledServices as $service) {
                $tenant->services()->syncWithoutDetaching([
                    $service->id => ['enabled' => false],
                ]);
            }
        });

        //Sync all providers to this new created tenant
        static::created(function ($tenant) {
            $enabledProviders = \App\Models\Provider::where('enabled', true)->get();
            foreach ($enabledProviders as $provider) {
                $tenant->providers()->syncWithoutDetaching([
                    $provider->id => ['enabled' => false],
                ]);
            }
        });
    }

    /**
     * Get tenant currency
     *
     *
     */
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function services()
    {
        return $this->belongsToMany(Service::class, 'tenant_services')
                    ->using(TenantService::class) // use pivot model
                    ->withPivot(['id','enabled'])// expose pivot id + enabled
                    ->withTimestamps()
                    ->where('services.enabled', true); // respect super-user global enable
    }
    public function providers()
    {
        return $this->belongsToMany(Provider::class, 'tenant_providers')
                    ->using(TenantProvider::class) // use pivot model
                    ->withPivot(['id',
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
                    ])// expose pivot id + enabled
                    ->withTimestamps()
                    ->where('providers.enabled', true); // respect super-user global enable
    }
    public function tenant_services()
    {

        return $this->belongsToMany(Service::class, 'tenant_services')
                    ->withPivot(['enabled']) // tenant-specific flags
                    ->where('services.enabled', true); // only main enabled services
    }

    public function shops()
    {
       return $this->hasMany(Shop::class);
    }

    public function wallet_transactions()
    {
       return $this->hasMany(WalletTransaction::class);
    }
}

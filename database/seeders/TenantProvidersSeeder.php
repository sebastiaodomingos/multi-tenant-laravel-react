<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\Provider;

class TenantProvidersSeeder extends Seeder
{
    public function run(): void
    {
        $tenants = Tenant::all();
        $providers = Provider::where('enabled', true)->get(); // only globally enabled services

        foreach ($tenants as $tenant) {
            foreach ($providers as $provider) {
                $tenant->providers()->syncWithoutDetaching([
                    $provider->id => [ 'enabled' => false, 
                                       'name' => $provider->name,
                                       'api_url' => $provider->api_url,
                                       'image' => $provider->image,
                                    ], // default disabled for tenant
                ]);
            }
        }
    }
}

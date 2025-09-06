<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;
use App\Models\Service;

class TenantServicesSeeder extends Seeder
{
    public function run(): void
    {
        $tenants = Tenant::all();
        $services = Service::where('enabled', true)->get(); // only globally enabled services

        foreach ($tenants as $tenant) {
            foreach ($services as $service) {
                $tenant->services()->syncWithoutDetaching([
                    $service->id => ['enabled' => false], // default disabled for tenant
                ]);
            }
        }
    }
}

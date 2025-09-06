<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tenant;

class TenantsTableSeeder extends Seeder
{
    public function run(): void
    {
        Tenant::create([
            'name' => 'Tenant One',
            'domain' => 'tenant1.localhost',
        ]);

        Tenant::create([
            'name' => 'Tenant Two',
            'domain' => 'tenant2.localhost',
        ]);
    }
}

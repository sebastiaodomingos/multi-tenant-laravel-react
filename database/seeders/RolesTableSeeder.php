<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        Role::create(['name' => 'super_admin'], ['description' => 'Full access']);
        Role::create(['name' => 'tenant_admin'], ['description' => 'Tenant administrator']);
        Role::create(['name' => 'shop_user'], ['description' => 'Shop user']);

        //Assuming we have the above roles created, lets add sub-roles
        Role::create([
            'name' => 'manager',
            'description' => 'Shop manager',
            'parent_id' => Role::where('name', 'shop_user')->first()->id,
        ]);

        Role::create([
            'name' => 'cashier',
            'description' => 'Handles transactions',
            'parent_id' => Role::where('name', 'shop_user')->first()->id,
        ]);
    }
}
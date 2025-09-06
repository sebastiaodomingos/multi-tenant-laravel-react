<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Tenant;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        $superAdminRole = Role::where('name', 'super_admin')->first();
        $tenantRole = Role::where('name', 'tenant_admin')->first();
        $shopRoleCashier = Role::where('name', 'cashier')->first();
        $shopRole = Role::where('name', 'manager')->first();

        $tenant1 = Tenant::where('name', 'Tenant One')->first();
        $tenant2 = Tenant::where('name', 'Tenant Two')->first();

        // Super admin
        $admin = User::updateOrcreate([
            'name' => 'Admin',
            'email' => 'adminn@example.com',
            'password' => Hash::make('Test1234!'),
        ]);
        $admin->roles()->attach($superAdminRole);

        // Tenant admins
        $t1Admin = User::create([
            'name' => 'Tenant1 Admin',
            'email' => 'tenant1admin@example.com',
            'password' => Hash::make('password'),
            'tenant_id' => $tenant1->id,
        ]);
        $t1Admin->roles()->attach($tenantRole);

        $t2Admin = User::create([
            'name' => 'Tenant2 Admin',
            'email' => 'tenant2admin@example.com',
            'password' => Hash::make('password'),
            'tenant_id' => $tenant2->id,
        ]);
        $t2Admin->roles()->attach($tenantRole);

        // Shop users for Tenant 1
        $shop1 = User::create([
            'name' => 'Shop User 1',
            'email' => 'shop1@tenant1.com',
            'password' => Hash::make('password'),
            'tenant_id' => $tenant1->id,
        ]);
        $shop1->roles()->attach($shopRoleCashier);

        $shop2 = User::create([
            'name' => 'Shop User 2',
            'email' => 'shop2@tenant1.com',
            'password' => Hash::make('password'),
            'tenant_id' => $tenant1->id,
        ]);
        $shop2->roles()->attach($shopRole);

        // Shop users for Tenant 2
        $shop3 = User::create([
            'name' => 'Shop User 3',
            'email' => 'shop3@tenant2.com',
            'password' => Hash::make('password'),
            'tenant_id' => $tenant2->id,
        ]);
        $shop3->roles()->attach($shopRoleCashier);

        $shop4 = User::create([
            'name' => 'Shop User 4',
            'email' => 'shop4@tenant2.com',
            'password' => Hash::make('password'),
            'tenant_id' => $tenant2->id,
        ]);
        $shop4->roles()->attach($shopRole);
    }
}

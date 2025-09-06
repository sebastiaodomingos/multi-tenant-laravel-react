<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call([
            CountriesTableSeeder::class,
            LanguagesTableSeeder::class,
            CurrenciesTableSeeder::class,
            RolesTableSeeder::class,
            TenantsTableSeeder::class,
            UsersTableSeeder::class,
            ProviderSeeder::class,
            ServicesTableSeeder::class,
            TenantServicesSeeder::class,  // links tenants to services
            TenantProvidersSeeder::class,
            TimeZoneTableSeeder::class,
            AddressTableSeeder::class,
            ShopTableSeeder::class,
            WalletTableSeeder::class
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Shop;
use App\Models\User;
use Faker\Factory as Faker;

class ShopTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        foreach ([1, 2] as $tenantId) {
            // Get a random user for each tenant
            $user = User::where('tenant_id', $tenantId)->inRandomOrder()->first();

            if (! $user) {
                continue; // skip if no users for tenant
            }

            for ($i = 1; $i <= 10; $i++) {
                $name = $faker->company;
                Shop::create([
                    'tenant_id'   => $tenantId,
                    'user_id'     => $user->id,
                    'country_id'  => rand(1, 10), // pick a random country
                    'time_zone_id'=> rand(1, 10), // pick a random timezone
                    'currency_id' => rand(1, 5),  // pick a random currency
                    'name'        => $name,
                    'wallet_balance' => (float)rand(100, 10000),
                    'slug'        => Str::slug($name . '-' . $tenantId . '-' . $i),
                    'email'       => $faker->companyEmail,
                    'phone'       => $faker->phoneNumber,
                    'street'      => $faker->streetAddress,
                    'city'        => $faker->city,
                    'state'       => $faker->state,
                    'postal_code' => $faker->postcode,
                    'website'     => $faker->url,
                    'is_active'   => $faker->boolean(80), // 80% active
                ]);
            }
        }
    }
}

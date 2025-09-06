<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('addresses')->insert([
            [
                'user_id' => 1,
                'country_id' => 32, // Belgium, for example
                'street' => 'Rue de la Loi 16',
                'city' => 'Brussels',
                'time_zone_id' => 5,
                'state' => 'Brussels-Capital',
                'postal_code' => '1000',
                'phone' => '+32 2 123 4567',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 2,
                'country_id' => 32, // Belgium, for example
                'street' => 'Rue de la Loi 16',
                'time_zone_id' => 1,
                'city' => 'Brussels',
                'state' => 'Brussels-Capital',
                'postal_code' => '1000',
                'phone' => '+32 2 123 4567',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 3,
                'country_id' => 32, // Belgium, for example
                'time_zone_id' => 3,
                'street' => 'Rue de la Loi 16',
                'city' => 'Brussels',
                'state' => 'Brussels-Capital',
                'postal_code' => '1000',
                'phone' => '+32 2 123 4567',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 4,
                'country_id' => 32, // Belgium, for example
                'time_zone_id' => 2,
                'street' => 'Rue de la Loi 16',
                'city' => 'Brussels',
                'state' => 'Brussels-Capital',
                'postal_code' => '1000',
                'phone' => '+32 2 123 4567',
                'is_default' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

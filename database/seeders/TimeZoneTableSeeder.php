<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TimeZoneTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('time_zones')->insert([
            ['name' => 'UTC', 'label' => 'Coordinated Universal Time', 'date_format' => 'Y-m-d', 'time_format' => 'H:i:s'],
            ['name' => 'Europe/Brussels', 'label' => 'Brussels Time', 'date_format' => 'd/m/Y', 'time_format' => 'H:i'],
            ['name' => 'Europe/London', 'label' => 'London Time', 'date_format' => 'd/m/Y', 'time_format' => 'H:i'],
            ['name' => 'America/New_York', 'label' => 'New York Time', 'date_format' => 'm/d/Y', 'time_format' => 'h:i A'],
            ['name' => 'America/Chicago', 'label' => 'Chicago Time', 'date_format' => 'm/d/Y', 'time_format' => 'h:i A'],
            ['name' => 'America/Los_Angeles', 'label' => 'Los Angeles Time', 'date_format' => 'm/d/Y', 'time_format' => 'h:i A'],
            ['name' => 'Asia/Tokyo', 'label' => 'Tokyo Time', 'date_format' => 'Y/m/d', 'time_format' => 'H:i'],
            ['name' => 'Asia/Shanghai', 'label' => 'Shanghai Time', 'date_format' => 'Y/m/d', 'time_format' => 'H:i'],
            ['name' => 'Asia/Kolkata', 'label' => 'India Time', 'date_format' => 'd-m-Y', 'time_format' => 'H:i'],
            ['name' => 'Australia/Sydney', 'label' => 'Sydney Time', 'date_format' => 'd/m/Y', 'time_format' => 'H:i'],
            ['name' => 'Europe/Paris', 'label' => 'Paris Time', 'date_format' => 'd/m/Y', 'time_format' => 'H:i'],
            ['name' => 'Europe/Berlin', 'label' => 'Berlin Time', 'date_format' => 'd/m/Y', 'time_format' => 'H:i'],
            ['name' => 'America/Sao_Paulo', 'label' => 'Sao Paulo Time', 'date_format' => 'd/m/Y', 'time_format' => 'H:i'],
            ['name' => 'Africa/Johannesburg', 'label' => 'Johannesburg Time', 'date_format' => 'd/m/Y', 'time_format' => 'H:i'],
        ]);
    }
}

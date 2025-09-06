<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguagesTableSeeder extends Seeder
{
    public function run(): void
    {
         DB::table('languages')->insert([
            ['name' => 'English', 'code' => 'en'],
            ['name' => 'French',  'code' => 'fr'],
            ['name' => 'Spanish', 'code' => 'es'],
            ['name' => 'German',  'code' => 'de'],
            ['name' => 'Ukrainian',  'code' => 'ua'],
        ]);
    }
}
<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Provider;

class ProviderSeeder extends Seeder
{
    public function run(): void
    {
        $providers = [
            [
                'name' => 'PayPal',
                'login' => null,
                'api_url' => 'https://api.paypal.com',
                'api_test_url' => 'https://api.sandbox.paypal.com',
                'api_type' => 'rest',
                'enabled' => true,
                'test_mode' => true,
            ],
            [
                'name' => 'Reloadly',
                'login' => null,
                'api_url' => 'https://topups.reloadly.com',
                'api_test_url' => 'https://topups-sandbox.reloadly.com',
                'api_type' => 'rest',
                'enabled' => true,
                'test_mode' => true,
            ],
            [
                'name' => 'PrepayNation',
                'login' => null,
                'api_url' => 'https://api.prepaynation.com',
                'api_test_url' => 'https://sandbox.prepaynation.com',
                'api_type' => 'soap',
                'enabled' => true,
                'test_mode' => true,
            ],
            [
                'name' => 'DingConnect',
                'login' => null,
                'api_url' => 'https://api.dingconnect.com',
                'api_test_url' => 'https://api.dingconnect.com/sandbox',
                'api_type' => 'rest',
                'enabled' => true,
                'test_mode' => true,
            ],
            [
                'name' => 'DTone',
                'login' => null,
                'api_url' => 'https://dvs-api.dtone.com',
                'api_test_url' => 'https://dvs-api-uat.dtone.com',
                'api_type' => 'rest',
                'enabled' => true,
                'test_mode' => true,
            ],
        ];

        foreach ($providers as $provider) {
            Provider::updateOrCreate(
                ['name' => $provider['name']],
                $provider
            );
        }
    }
}

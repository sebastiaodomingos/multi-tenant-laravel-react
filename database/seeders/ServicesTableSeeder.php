<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServicesTableSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Support',
                'logo' => 'heroicon-o-lifebuoy',
                'description' => 'Customer support and helpdesk services.',
                'price' => 19.99,
                'enabled' => true,
            ],
            [
                'name' => 'Mobile Airtime',
                'logo' => 'heroicon-o-device-phone-mobile',
                'description' => 'Recharge and top-up services for mobile users.',
                'price' => 5.00,
                'enabled' => true,
            ],
            [
                'name' => 'Gift Cards',
                'logo' => 'heroicon-o-gift',
                'description' => 'Digital and physical gift card distribution.',
                'price' => 10.00,
                'enabled' => true,
            ],
            [
                'name' => 'Utilities',
                'logo' => 'heroicon-o-bolt',
                'description' => 'Bill payment and utility management services.',
                'price' => 15.00,
                'enabled' => true,
            ],
            [
                'name' => 'POS',
                'logo' => 'heroicon-o-credit-card',
                'description' => 'Point of Sale solutions for merchants.',
                'price' => 49.99,
                'enabled' => true,
            ],
            [
                'name' => 'Inventory',
                'logo' => 'heroicon-o-archive-box',
                'description' => 'Stock and inventory management systems.',
                'price' => 29.99,
                'enabled' => true,
            ],
            [
                'name' => 'VoIP',
                'logo' => 'heroicon-o-phone',
                'description' => 'Voice over IP and telephony solutions.',
                'price' => 9.99,
                'enabled' => true,
            ],
            [
                'name' => 'CRM',
                'logo' => 'heroicon-o-users',
                'description' => 'Customer Relationship Management systems.',
                'price' => 39.99,
                'enabled' => true,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(
                ['name' => $service['name']],
                [
                    'logo' => $service['logo'],
                    'description' => $service['description'],
                    'price' => $service['price'],
                    'enabled' => $service['enabled'],
                ]
            );
        }
    }
}

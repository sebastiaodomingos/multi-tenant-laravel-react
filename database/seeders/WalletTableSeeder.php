<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Shop;
use App\Models\WalletTransaction;
use Faker\Factory as Faker;

class WalletTableSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();

        // Loop through shops
        Shop::with('tenant', 'users')->get()->each(function ($shop) use ($faker) {
            // Get one user per shop
            $user = User::where('shop_id', $shop->id)->inRandomOrder()->first();

            if (! $user) {
                return; // skip if no user for this shop
            }

            $balance = 0;

            // Create 10 random transactions per shop
            for ($i = 0; $i < 10; $i++) {
                $type   = $faker->randomElement(['credit', 'debit']);
                $amount = $faker->randomFloat(2, 5, 500);

                // Prevent overdraft
                if ($type === 'debit' && $balance < $amount) {
                    $type = 'credit';
                }

                $before  = $balance;
                $after   = $type === 'credit' ? $before + $amount : $before - $amount;
                $balance = $after;

                WalletTransaction::create([
                    'tenant_id'      => $shop->tenant_id,
                    'shop_id'        => $shop->id,
                    'user_id'        => $user->id,
                    'type'           => $type,
                    'amount'         => $amount,
                    'balance_before' => $before,
                    'balance_after'  => $after,
                    'reference'      => strtoupper($faker->bothify('REF-####')),
                    'description'    => $type === 'credit' ? 'Wallet funded' : 'Transaction spent',
                ]);

                // Update user balance
                $shop->update(['wallet_balance' => $balance]);
            }
        });
    }
}

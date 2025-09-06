<?php
namespace App\Services;

use App\Models\User;
use App\Models\Shop;
use App\Models\WalletTransaction;
use Illuminate\Support\Facades\DB;
use Filament\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class WalletService
{
    public function credit($shop, float $amount, ?string $reference = null, ?string $description = null): WalletTransaction
    {
        return DB::transaction(function () use ($shop, $amount, $reference, $description) {
            $before = $shop->wallet_balance;
            $after  = $before + $amount;

            $transaction = WalletTransaction::create([
                'tenant_id'      => $shop->tenant_id,
                'user_id'        => auth()->user()->id,
                'shop_id'        => $shop->id,
                'type'           => 'credit',
                'amount'         => $amount,
                'balance_before' => $before,
                'balance_after'  => $after,
                'reference'      => $reference,
                'description'    => $description,
            ]);

            //$shop->update(['wallet_balance' => $after]);

            return $transaction;
        });
    }

    public function debit(Shop $shop, float $amount, ?string $reference = null, ?string $description = null): WalletTransaction
    {
        return DB::transaction(function () use ($shop, $amount, $reference, $description) {
            if ($shop->wallet_balance < $amount) {
                throw new \Exception("Insufficient balance");
            }

            $before = $shop->wallet_balance;
            $after  = $before - $amount;

            $transaction = WalletTransaction::create([
                'tenant_id'      => $shop->tenant_id,
                'user_id'        => auth()->user()->id,
                'shop_id'        => $shop->id,
                'type'           => 'debit',
                'amount'         => $amount,
                'balance_before' => $before,
                'balance_after'  => $after,
                'reference'      => $reference,
                'description'    => $description,
            ]);

            //$shop->update(['wallet_balance' => $after]);

            return $transaction;
        });
    }
}

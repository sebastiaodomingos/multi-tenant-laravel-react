<?php

namespace App\Filament\Tenant\Resources\Shops\Schemas;

use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Schema;

class ShopInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('user_id')
                    ->numeric(),
                TextEntry::make('country_id')
                    ->numeric(),
                TextEntry::make('time_zone_id')
                    ->numeric(),
                TextEntry::make('currency_id')
                    ->numeric(),
                TextEntry::make('name'),
                TextEntry::make('slug'),
                TextEntry::make('email')
                    ->label('Email address'),
                TextEntry::make('phone'),
                TextEntry::make('street'),
                TextEntry::make('city'),
                TextEntry::make('state'),
                TextEntry::make('postal_code'),
                TextEntry::make('website'),
                IconEntry::make('is_active')
                    ->boolean(),
                TextEntry::make('created_at')
                    ->dateTime(),
                TextEntry::make('updated_at')
                    ->dateTime(),
            ]);
    }
}

<?php

namespace App\Filament\Tenant\Resources\Shops\Pages;

use App\Filament\Tenant\Resources\Shops\ShopResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewShop extends ViewRecord
{
    protected static string $resource = ShopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Tenant\Resources\Shops\Pages;

use App\Filament\Tenant\Resources\Shops\ShopResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Models\Tenant;

class ListShops extends ListRecords
{
    protected static string $resource = ShopResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
    //Get tenant shops
    public function getShops()
    {
        $tenant_id = tenant_id();
        $tenant = Tenant::find($tenant_id);

        return $tenant->shops;
    }
}

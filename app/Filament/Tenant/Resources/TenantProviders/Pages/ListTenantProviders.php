<?php

namespace App\Filament\Tenant\Resources\TenantProviders\Pages;

use App\Filament\Tenant\Resources\TenantProviders\TenantProviderResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Models\Tenant;
use Filament\Tables\Table;

class ListTenantProviders extends ListRecords
{
    protected static string $resource = TenantProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // CreateAction::make(),
        ];
    }

    //Get tenant providers
    public function getProviders()
    {
        $tenant_id = tenant_id();
        $tenant = Tenant::find($tenant_id);

        return $tenant->providers;
    }

}

<?php

namespace App\Filament\Tenant\Resources\TenantProviders\Pages;

use App\Filament\Tenant\Resources\TenantProviders\TenantProviderResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditTenantProvider extends EditRecord
{
    protected static string $resource = TenantProviderResource::class;

    protected function getHeaderActions(): array
    {
        return [
           // DeleteAction::make(),
        ];
    }
}

<?php

namespace App\Filament\Tenant\Resources\TenantServices\Pages;

use App\Filament\Tenant\Resources\TenantServices\TenantServiceResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewTenantService extends ViewRecord
{
    protected static string $resource = TenantServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}

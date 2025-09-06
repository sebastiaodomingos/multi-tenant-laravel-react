<?php

namespace App\Filament\Tenant\Resources\TenantServices\Pages;

use App\Filament\Tenant\Resources\TenantServices\TenantServiceResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditTenantService extends EditRecord
{
    protected static string $resource = TenantServiceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            //ViewAction::make(),
            //DeleteAction::make(),
        ];
    }
}

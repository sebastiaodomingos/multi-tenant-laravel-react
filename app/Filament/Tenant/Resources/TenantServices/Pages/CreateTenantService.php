<?php

namespace App\Filament\Tenant\Resources\TenantServices\Pages;

use App\Filament\Tenant\Resources\TenantServices\TenantServiceResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTenantService extends CreateRecord
{
    protected static string $resource = TenantServiceResource::class;
}

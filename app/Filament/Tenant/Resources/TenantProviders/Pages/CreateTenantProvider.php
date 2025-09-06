<?php

namespace App\Filament\Tenant\Resources\TenantProviders\Pages;

use App\Filament\Tenant\Resources\TenantProviders\TenantProviderResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTenantProvider extends CreateRecord
{
    protected static string $resource = TenantProviderResource::class;
}

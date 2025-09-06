<?php

namespace App\Filament\Tenant\Resources\TenantServices\Pages;

use App\Filament\Tenant\Resources\TenantServices\TenantServiceResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;
use App\Models\Tenant;

class ListTenantServices extends ListRecords
{
    protected static string $resource = TenantServiceResource::class;
    protected string $view = 'filament.tenant.resources.tenantservices.pages.services-list';

    protected function getHeaderActions(): array
    {
        return [
           // CreateAction::make(),
        ];
    }
    //Get tenant services
    public function getServices()
    {
        $tenant_id = tenant_id();
        $tenant = Tenant::find($tenant_id);

        return $tenant->services;
    }
}

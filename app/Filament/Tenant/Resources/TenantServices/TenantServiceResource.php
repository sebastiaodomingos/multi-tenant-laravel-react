<?php

namespace App\Filament\Tenant\Resources\TenantServices;

use App\Filament\Tenant\Resources\TenantServices\Pages\CreateTenantService;
use App\Filament\Tenant\Resources\TenantServices\Pages\EditTenantService;
use App\Filament\Tenant\Resources\TenantServices\Pages\ListTenantServices;
use App\Filament\Tenant\Resources\TenantServices\Pages\ViewTenantService;
use App\Filament\Tenant\Resources\TenantServices\Schemas\TenantServiceForm;
use App\Filament\Tenant\Resources\TenantServices\Schemas\TenantServiceInfolist;
use App\Filament\Tenant\Resources\TenantServices\Tables\TenantServicesTable;
use App\Models\TenantService;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TenantServiceResource extends Resource
{
    protected static ?string $model = TenantService::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Service';

    public static function form(Schema $schema): Schema
    {
        return TenantServiceForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TenantServiceInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TenantServicesTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListTenantServices::route('/'),
            //'create' => CreateTenantService::route('/create'),
            'view' => ViewTenantService::route('/{record}'),
            'edit' => EditTenantService::route('/{record}/edit'),
        ];
    }
}

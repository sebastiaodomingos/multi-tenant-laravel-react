<?php

namespace App\Filament\Tenant\Resources\TenantProviders;

use App\Filament\Tenant\Resources\TenantProviders\Pages\CreateTenantProvider;
use App\Filament\Tenant\Resources\TenantProviders\Pages\EditTenantProvider;
use App\Filament\Tenant\Resources\TenantProviders\Pages\ListTenantProviders;
use App\Filament\Tenant\Resources\TenantProviders\Schemas\TenantProviderForm;
use App\Filament\Tenant\Resources\TenantProviders\Tables\TenantProvidersTable;
use App\Models\TenantProvider;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TenantProviderResource extends Resource
{
    protected static ?string $model = TenantProvider::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Provider';

    public static function form(Schema $schema): Schema
    {
        return TenantProviderForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TenantProvidersTable::configure($table);
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
            'index' => ListTenantProviders::route('/'),
            //'create' => CreateTenantProvider::route('/create'),
            'edit' => EditTenantProvider::route('/{record}/edit'),
        ];
    }
}

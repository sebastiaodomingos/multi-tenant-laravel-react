<?php

namespace App\Filament\Resources\Services;

use App\Filament\Resources\Services\Pages\CreateService;
use App\Filament\Resources\Services\Pages\ServiceList;
use App\Filament\Resources\Services\Pages\EditService;
use App\Filament\Resources\Services\Pages\ListServices;
use App\Filament\Resources\Services\Schemas\ServiceForm;
use App\Filament\Resources\Services\Tables\ServicesTable;
use App\Models\Service;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

use Filament\Infolists\Components\Grid;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\IconEntry;
use Filament\Resources\Pages\ListRecords;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Service';

    public static function form(Schema $schema): Schema
    {
        return ServiceForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ServicesTable::configure($table);
    }
    public static function infolist(Schema $schema): Schema
    {
        return $schema
            ->schema([
                RepeatableEntry::make('services')
                    ->label('Services')
                    ->schema([
                        Grid::make(1)->schema([
                            ImageEntry::make('logo')
                                ->disk('public')
                                ->circular()
                                ->size(64)
                                ->alignCenter(),

                            TextEntry::make('name')
                                ->weight('bold')
                                ->size('lg')
                                ->alignCenter(),

                            TextEntry::make('price')
                                ->money('usd')
                                ->alignCenter(),

                            IconEntry::make('enabled')
                                ->boolean()
                                ->trueIcon('heroicon-o-check-circle')
                                ->falseIcon('heroicon-o-x-circle')
                                ->color(fn($state) => $state ? 'success' : 'danger')
                                ->alignCenter(),
                        ])
                    ])
                    ->columns(3) // grid of 3 cards per row
            ]);
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
            'index' => ListServices::route('/'),
            'create' => CreateService::route('/create'),
            'edit' => EditService::route('/{record}/edit'),
        ];
    }
}

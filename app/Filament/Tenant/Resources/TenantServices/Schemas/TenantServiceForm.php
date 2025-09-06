<?php

namespace App\Filament\Tenant\Resources\TenantServices\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Flex;
use Filament\Infolists\Components\IconEntry;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;

class TenantServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        /*return $schema
            ->components([
                Toggle::make('enabled')
                    ->required()
            ])->columns(4);*/
        
            return $schema->components([
                Flex::make([
                    Section::make([
                        IconEntry::make('logo')->icon(fn (string $state): string => "heroicon-o-{$state}")
                        //IconColumn::make('logo')->icon("heroicon-m-user-group")
                    ]),
                    Section::make([
                        Toggle::make('enabled')
                    ])->grow(false),
                ])->from('md')
            ]);
    }
}

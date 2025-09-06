<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Toggle::make('enabled')->label(__('Enabled'))->onColor('success')->offColor('danger'),
                TextInput::make('name')->label(__('Name'))
                    ->required(),
                TextInput::make('logo')->label(__('Logo'))->required(),
                TextInput::make('price')->label(__('Subscription Fee'))->numeric()->inputMode('decimal'),
                TextInput::make('description')->label(__('Description')),
            ]);
    }
}

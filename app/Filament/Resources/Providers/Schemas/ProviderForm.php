<?php

namespace App\Filament\Resources\Providers\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;

class ProviderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')->required()->maxLength(255),
                TextInput::make('login')->maxLength(255),
                TextInput::make('api_token')->password()->maxLength(255),
                TextInput::make('secret_key')->password()->maxLength(255),
                TextInput::make('api_url')->url()->maxLength(255),
                TextInput::make('api_test_url')->url()->maxLength(255),
                TextInput::make('api_key')->maxLength(255),
                TextInput::make('api_test_key')->maxLength(255),
                TextInput::make('api_test_token')->password()->maxLength(255),
                TextInput::make('api_test_secret')->password()->maxLength(255),

                Select::make('api_type')
                    ->options([
                        'rest' => 'REST',
                        'soap' => 'SOAP',
                        'grpc' => 'gRPC',
                    ])
                    ->required(),

                Toggle::make('test_mode')->default(false),

                // Only super-users can enable/disable
                Toggle::make('enabled')
                    ->default(true),
                    //->visible(fn () => Auth::user()?->role === 'super-user'),
            ]);
    }
}

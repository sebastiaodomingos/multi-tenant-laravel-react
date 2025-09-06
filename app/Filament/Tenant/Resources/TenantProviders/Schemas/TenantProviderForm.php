<?php

namespace App\Filament\Tenant\Resources\TenantProviders\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;

class TenantProviderForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Toggle::make('enabled')
                    ->label(__('Enabled'))
                    ->required(),
                Toggle::make('test_mode')
                    ->label(__('Test Mode'))
                    ->required(),
                TextInput::make('status')
                    ->label(__('Status')),
                TextInput::make('name')
                    ->label(__('Provider'))
                    ->required(),
                TextInput::make('login')
                    ->label(__('Login')),
                TextInput::make('description')
                    ->label(__('Description')),
                TextInput::make('type')
                    ->label(__('Type')),
                FileUpload::make('image')
                    ->label(__('Avatar'))
                    ->image(),
                TextInput::make('secret_key')->label(__('API Secret')),
                TextInput::make('api_url')->label(__('API URL')),
                TextInput::make('api_test_url')->label(__('API TEST URL')),
                TextInput::make('api_key')->label(__('API Key')),
                TextInput::make('api_test_key')->label(__('API Test Key')),
                TextInput::make('api_test_secret')->label(__('API Test Secret')),
                Select::make('api_type')->label(__('API Type'))
                    ->required()
                    ->options([
                        'rest' => 'REST API',
                        'soap' => 'SOAP API',
                        'other' => 'Other',
                    ])
                    ->default('rest')
                    ->searchable()
                
            ]);
    }
}

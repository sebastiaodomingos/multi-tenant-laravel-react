<?php

namespace App\Filament\Tenant\Resources\Users;

use App\Filament\Tenant\Resources\Users\Pages\CreateUser;
use App\Filament\Tenant\Resources\Users\Pages\EditUser;
use App\Filament\Tenant\Resources\Users\Pages\ListUsers;
use App\Filament\Tenant\Resources\Users\Pages\ViewUser;
use App\Filament\Tenant\Resources\Users\Schemas\UserForm;
use App\Filament\Tenant\Resources\Users\Schemas\UserInfolist;
use App\Filament\Tenant\Resources\Users\Tables\UsersTable;
use App\Models\User;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Hash;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'Users';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                TextInput::make('email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true),
                TextInput::make('password')
                    ->password()
                    ->required(fn ($record) => !$record)
                    ->minLength(6)
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state)),
                Select::make('role')
                    ->options([
                        'shop_user' => 'Shop User',
                    ])
                    ->required(),
            ]);
    }

    public static function infolist(Schema $schema): Schema
    {
        return UserInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return UsersTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

     // Scope users to the current tenant
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery();
           /* ->whereHas('roles', function (Builder $query) {
                $query->where('name', 'shop_user');
            });
            //->where('tenant_id', auth()->user()->tenant_id);
            */
    }

    public static function getPages(): array
    {
        return [
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'view' => ViewUser::route('/{record}'),
            'edit' => EditUser::route('/{record}/edit'),
        ];
    }
}

<?php
namespace App\Filament\Pages\Auth;

use Filament\Auth\Pages\EditProfile as BaseEditProfile;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Support\Icons\Heroicon;
use App\Models\Country;
use App\Models\TimeZone;

class EditProfile extends BaseEditProfile
{
    public function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make(__('User Settings'))
                    ->description(__('Manage your user preferences'))
                    ->icon(Heroicon::User)
                    ->schema([
                        FileUpload::make('avatar')
                                ->label('Profile Picture')
                                ->avatar()
                                ->disk('public')
                                ->directory('avatars')
                                ->imageEditor()
                                ->circleCropper(),
                        Toggle::make('is_active')->label(__('Active'))->onColor('success')->offColor('danger'),
                        $this->getNameFormComponent(),
                        Select::make('language')
                                ->label(__('Language'))
                                ->options([
                                    'en' => 'English',
                                    'fr' => 'Français',
                                    'de' => 'Deutsch',
                                    'es' => 'Español',
                                ])
                                ->relationship('language', 'name')
                                ->searchable()
                                ->preload()
                                ->default('en'),
                        Select::make('currency_id')
                                ->label('Currency')
                                ->relationship('currency', 'name')
                                ->searchable()
                                ->preload(),
                        $this->getEmailFormComponent(),
                        $this->getPasswordFormComponent(),
                        $this->getPasswordConfirmationFormComponent(),
                    ])
                    ->compact(),
                Section::make(__('Address Settings'))
                    ->description(__('Manage your address preferences'))
                    ->icon(Heroicon::MapPin)
                    ->relationship('address')
                    ->schema([

                            TextInput::make('street')->label(__('Address Line 1')),
                            TextInput::make('state')->label(__('State')),
                            TextInput::make('postal_code')->label(__('Postal Code')),
                            Select::make('country_id')
                                        ->label(__('Country'))
                                        ->options(Country::query()->pluck('name', 'id'))
                                        ->searchable(),
                            Select::make('time_zone_id')
                                        ->label(__('Time Zone'))
                                        ->options(TimeZone::query()->pluck('name', 'id'))
                                        ->searchable(),
                            TextInput::make('phone')->label(__('Telephone'))->tel()
                    ])
                    ->compact(),
            ])->columns(2);
    }
}

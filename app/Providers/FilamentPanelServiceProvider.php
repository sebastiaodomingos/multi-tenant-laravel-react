<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Filament\Facades\Filament;
use App\Filament\Pages\LoginPage;
use BezhanSalleh\LanguageSwitch\LanguageSwitch;
use BezhanSalleh\LanguageSwitch\Enums\Placement;

class FilamentPanelServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
                $switch
                    ->locales(['en','fr'])
                    ->outsidePanelPlacement(Placement::TopRight); // also accepts a closure
        });
            // Add a Livewire topbar component to all panels
        Filament::serving(function () {
/*
            Filament::registerPages([
                LoginPage::class,
            ]);

            // Override the default login route
            Filament::getPages()->forget('filament.pages.auth.login');
            Filament::getPages()->add('login', LoginPage::class);

             Filament::auth(function () {
                return auth()->attempt([
                    'email' => request('email'),
                    'password' => request('password'),
                ], request()->boolean('remember'));
            });*/
        });
        
    }
}

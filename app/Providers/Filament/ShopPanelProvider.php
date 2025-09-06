<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages\Dashboard;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets\AccountWidget;
use Filament\Widgets\FilamentInfoWidget;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Auth\MultiFactor\App\AppAuthentication;
use Filament\Auth\MultiFactor\Email\EmailAuthentication;
use App\Filament\Pages\Auth\EditProfile;

class ShopPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        //Set user language
        //App::setLocale(auth()->user()->language->code ?? 'en');

        return $panel
            ->id('shop')
            ->path('shop')
            ->login()
            ->profile(EditProfile::class, isSimple: false)
            ->multiFactorAuthentication([
                AppAuthentication::make()->recoverable()->brandName('Your Brand'),
                EmailAuthentication::make(),
            ])
            ->colors([
                'primary' => Color::Amber,
            ])
            ->discoverResources(in: app_path('Filament/Shop/Resources'), for: 'App\Filament\Shop\Resources')
            ->discoverPages(in: app_path('Filament/Shop/Pages'), for: 'App\Filament\Shop\Pages')
            ->pages([
                Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Shop/Widgets'), for: 'App\Filament\Shop\Widgets')
            ->widgets([
                AccountWidget::class,
                FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->viteTheme('resources/css/filament/admin/theme.css');
    }
    /*
     * prevents a panel from appearing if the user isn’t allowed.
     * 
     */
    public static function shouldRegister(): bool
    {
        if (! auth()->check()) return false;

        $user = auth()->user();

        // Only shop users
        if (! $user->hasRole('shop_user')) return false;

        // Check domain
        $currentDomain = request()->getHost();
        return $user->tenant?->domain === $currentDomain;
    }
}

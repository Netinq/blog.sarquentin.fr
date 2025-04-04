<?php

namespace App\Providers\Filament;

use App\Filament\Pages\PublicFileManager;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class GestionPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('gestion')
            ->path('gestion')
            ->colors([
                'primary' => Color::Amber,
            ])
            ->default()
            ->login(\Filament\Pages\Auth\Login::class)
            ->discoverResources(in: app_path('Filament/Gestion/Resources'), for: 'App\\Filament\\Gestion\\Resources')
            ->discoverPages(in: app_path('Filament/Gestion/Pages'), for: 'App\\Filament\\Gestion\\Pages')
            ->pages([
                Pages\Dashboard::class,
                PublicFileManager::class
            ])
            ->discoverWidgets(in: app_path('Filament/Gestion/Widgets'), for: 'App\\Filament\\Gestion\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
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
            ->plugins([
                \BezhanSalleh\FilamentGoogleAnalytics\FilamentGoogleAnalyticsPlugin::make()
            ]);
    }
}

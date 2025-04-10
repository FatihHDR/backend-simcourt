<?php

namespace App\Providers\Filament;

use App\Filament\Test\Pages\Auth\LoginCustom;
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

use Filament\Enums\ThemeMode;
use Filament\Navigation\MenuItem;

class TestPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('test')
            ->login()
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->profile()
            ->path('/simcourt/instructor')
            ->colors([
                'danger' => Color::Red,
                'grey' => Color::Slate,
                'info' => Color::Blue,
                'primary' => Color::Red,
                "success" => Color::Emerald,
                "warning" => Color::Amber,
            ])
            ->userMenuItems([
                MenuItem::make()
                    ->label('Admin')
                    ->url('/simcourt/admin')
                    ->icon('heroicon-o-cog-6-tooth')
                    ->visible(fn (): bool => auth()->user()->isAdmin()),
            ])
            ->font("Montserrat")
            ->favicon(asset('images/logo-transparent.png'))
            ->defaultThemeMode(ThemeMode::Light)

            ->discoverResources(in: app_path('Filament/Test/Resources'), for: 'App\\Filament\\Test\\Resources')
            ->discoverPages(in: app_path('Filament/Test/Pages'), for: 'App\\Filament\\Test\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Test/Widgets'), for: 'App\\Filament\\Test\\Widgets')
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
            ->authGuard('instruktur');
    }
}

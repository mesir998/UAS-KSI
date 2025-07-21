<?php

namespace App\Providers\Filament;

use Filament\Panel;
use Filament\PanelProvider;
use App\Filament\User\Pages\Dashboard;
use Filament\Http\Middleware\Authenticate;

class UserPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('user')
    ->path('user')
    ->login()
    ->passwordReset()
    ->pages([
        Dashboard::class, // ⬅️ WAJIB agar route REGISTER
    ])
    ->discoverResources(in: app_path('Filament/User/Resources'), for: 'App\\Filament\\User\\Resources')
    ->discoverPages(in: app_path('Filament/User/Pages'), for: 'App\\Filament\\User\\Pages')
    ->authMiddleware([
        Authenticate::class,
            ]);
    }
}

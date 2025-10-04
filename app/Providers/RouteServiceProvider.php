<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Path default jika user tidak punya role.
     */
    public const HOME = '/dashboard';

    /**
     * Tentukan redirect path berdasarkan role user.
     */
    public static function redirectPath()
    {
        return auth()->check() && auth()->user()->is_admin
            ? '/admin'
            : '/problems';
    }

    /**
     * Define route bindings dan group route web/api.
     */
    public function boot(): void
    {
        $this->routes(function () {
            // Route untuk aplikasi web
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // Route untuk API
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));
        });
    }
}

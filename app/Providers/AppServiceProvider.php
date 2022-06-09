<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Laravel\Cashier\Cashier;

use Filament\Facades\Filament;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Cashier::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //View::share('youVarName', [1, 2, 3]);

        Password::defaults(function () {
            $rule = Password::min(8);

            return $this->app->isProduction()
                        ? $rule->mixedCase()->uncompromised()
                        : $rule;
        });

        Filament::registerStyles([
            asset('css/app.css'),
        ]);

        Filament::serving(function () {
            Filament::registerNavigationGroups([
                'Seller & Sales',
                'Users',
                'Creations & Variations',
                'Data Importation',
                'Site Data',
                'Shops & Partners',
            ]);
            // Filament::registerTheme(mix('css/filament.css'));
        });
    }
}

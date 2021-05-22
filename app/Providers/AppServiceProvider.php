<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        require_once base_path('resources/macros/form.php');
        if (config('payments.default') == 'pagseguro') {
            \PagSeguro\Library::initialize();
            \PagSeguro\Library::cmsVersion()->setName("Marketplace")->setRelease("1.0.0");
            \PagSeguro\Library::moduleVersion()->setName("Marketplace")->setRelease("1.0.0");
        }


    }
}

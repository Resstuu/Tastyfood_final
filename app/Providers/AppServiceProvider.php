<?php

namespace App\Providers;

use App\Models\FooterSetting;
use Throwable;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            static $footerSetting = null;

            if ($footerSetting === null) {
                try {
                    $footerSetting = Schema::hasTable('footer_settings')
                        ? FooterSetting::current()
                        : new FooterSetting(FooterSetting::defaults());
                } catch (Throwable) {
                    $footerSetting = new FooterSetting(FooterSetting::defaults());
                }
            }

            $view->with('footerSetting', $footerSetting);
        });
    }
}

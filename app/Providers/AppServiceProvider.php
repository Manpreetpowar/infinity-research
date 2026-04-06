<?php

namespace App\Providers;

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

    public function boot(): void
    {
        view()->composer(['welcome', 'admin.*'], function ($view) {
            $path = storage_path('app/cms.json');
            $cmsData = file_exists($path) ? (json_decode(file_get_contents($path), true) ?? []) : [];
            $settings = [];
            foreach ($cmsData as $section) {
                if (isset($section['fields'])) {
                    foreach ($section['fields'] as $key => $field) {
                        $settings[$key] = $field['value'];
                    }
                }
            }
            $view->with('settings', $settings);
        });
    }
}

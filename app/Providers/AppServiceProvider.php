<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Log; // se vuoi loggare gli errori

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // QUI niente DB, niente Schema, niente View::share.
        // Solo binding di servizi, se ti serviranno in futuro.
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 1) Forza HTTPS in produzione
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // 2) Non toccare il DB quando gira in console (artisan, deploy, ecc.)
        if (app()->runningInConsole()) {
            return;
        }

        // 3) Condivisione globale di tags e categories, protetta da try/catch
        try {
            if (Schema::hasTable('tags')) {
                $tags = Tag::all();
                View::share('tags', $tags);
            }

            // QUI hai un typo nel tuo codice: "categroies"
            if (Schema::hasTable('categories')) {
                $categories = Category::all();
                View::share('categories', $categories);
            }
        } catch (\Throwable $e) {
            // opzionale: se vuoi loggare
            // Log::error('AppServiceProvider boot error: '.$e->getMessage());
        }
    }
}

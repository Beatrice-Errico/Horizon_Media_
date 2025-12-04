<?php

namespace App\Providers;

use App\Models\Tag;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //// Non toccare il DB quando gira in console (deploy, artisan, ecc.)
    if (app()->runningInConsole()) {
        return;
    }

    // Se ti serve davvero controllare la tabella "tags", falla qui dentro
    try {
        if (Schema::hasTable('tags')) {
            // tuo codice qui (se c’era qualcosa legato a tags)
        }
    } catch (\Throwable $e) {
        // opzionale: loggare, ma NON rompere tutto
        // \Log::error($e->getMessage());
    }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    { 
   
    // ...

    if (Schema::hasTable('tags')) {
        $tags = Tag::all();
        View::share(['tags' => $tags]);
    
    }

        if(Schema::hasTable('categroies')){
            $categories= Category::all();
            View::share(['categories'=> $categories]);
        };
    }
}

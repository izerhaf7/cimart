<?php

namespace App\Providers;

use App\Models\ShoppingCart;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Artisan;
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
            if (auth()->check()) {
                // Fetch the count of cart items for the authenticated user
                $cartItemCount = ShoppingCart::where('user_id', auth()->id())->count();
                $view->with('cartItemCount', $cartItemCount);
            } else {
                // In case the user is not authenticated, set it to 0 or null
                $view->with('cartItemCount', 0);
            }
        });

        // Automatically create the storage symbolic link if not exists (only in local env)
        if (!File::exists(public_path('storage'))) {
            Artisan::call('storage:link');
        }
    }
}

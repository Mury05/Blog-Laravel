<?php

namespace App\Providers;

use App\Policies\ArticlePolicy;
use Illuminate\Support\Facades\Gate;
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
        Gate::define("see-admin-menu", function($user){
            return $user->admin;
        });
        Gate::define("create", [ArticlePolicy::class, 'create']);
        Gate::define("update", [ArticlePolicy::class, 'update']);
        Gate::define("delete", [ArticlePolicy::class, 'delete']);
    }
}

<?php

namespace App\Providers;

// use Illuminate\Contracts\Pagination\Paginator;
use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Paginator::useBootstrap();

        Gate::define('admin', function (User $user) {
            return $user->username === 'bangameck';
        });

        Gate::define('post-access', function (Post $post) {
            return $post->user_id === auth()->user()->id;
        });
    }
}

<?php

namespace BristolSU\Playground\Providers;

use BristolSU\Support\Authentication\Contracts\Authentication;
use Illuminate\Support\ServiceProvider;

/**
 * Authentication Service Provider
 */
class AuthServiceProvider extends ServiceProvider
{

    /**
     * Register any authentication / authorization services.
     *
     * - Bind the overridden authentication contract implementation
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(Authentication::class, \BristolSU\Playground\Support\Authentication\Authentication::class);
    }
}

<?php

namespace BristolSU\Playground\Providers;

use BristolSU\Playground\Support\Permissions\OverridePermissionTester;
use BristolSU\Support\Permissions\Facade\PermissionTester;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

/**
 * App Service Provider
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * - Registers the overridden permission tester
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        PermissionTester::register(app(OverridePermissionTester::class), 0);
    }
}

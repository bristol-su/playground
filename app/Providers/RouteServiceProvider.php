<?php

namespace BristolSU\Playground\Providers;

use BristolSU\Playground\Support\Permissions\ModulePermission;
use BristolSU\Support\Completion\Contracts\CompletionConditionInstance;
use BristolSU\Support\Completion\Contracts\CompletionConditionInstanceRepository;
use BristolSU\Support\Completion\Contracts\CompletionConditionRepository;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

/**
 * Set up routing
 */
class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'BristolSU\Playground\Http\Controllers';

    /**
     * Boot routing
     *
     * - Route model binding for module permissions
     * - Route model binding for module instance (without needing an activity)
     * @return void
     */
    public function boot()
    {
        Route::bind('module_permission_override', function($id) {
            return ModulePermission::findOrFail($id);
        });


        Route::bind('module_instance_override', function($slug) {
            return ModuleInstance::where('slug', $slug)->firstOrFail();
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}

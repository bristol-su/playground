<?php

namespace BristolSU\Playground\Providers;

use Illuminate\Support\ServiceProvider;
use Laracasts\Utilities\JavaScript\JavaScriptFacade;

/**
 * Set up the views
 */
class ViewServiceProvider extends ServiceProvider
{

    /**
     * Boot
     *
     * - Inject the app and api url into js
     */
    public function boot()
    {
        JavaScriptFacade::put([
            'APP_URL' => config('app.url'),
            'API_URL' => config('app.api_url')
        ]);
    }

}

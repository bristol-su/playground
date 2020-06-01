<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Support\Module\Contracts\Module;
use BristolSU\Support\Module\Contracts\ModuleRepository;

/**
 * Endpoints for getting information about registered modules
 */
class ModuleController extends Controller
{

    /**
     * Get all registered modules from the SDK
     *
     * @return \Illuminate\Support\Collection|Module[]
     */
    public function index()
    {
        return collect(app(ModuleRepository::class)->all())->map(function(Module $module) {
            return $module->toArray();
        });
    }

    /**
     * Get information about a specific module
     *
     * @param Module $module Module to return
     * @return Module Module
     */
    public function show(Module $module)
    {
        return $module;
    }

}

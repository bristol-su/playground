<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Playground\Support\Module\ModuleInstanceFactory;
use BristolSU\Support\Module\Contracts\Module;
use BristolSU\Support\ModuleInstance\Contracts\ModuleInstanceRepository;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Illuminate\Http\Request;

/**
 * Handle module instances of a specific module
 */
class ModuleModuleInstanceController extends Controller
{

    /**
     * Create a new module instance.
     *
     * Accepts ['name' => ''] as a string for the name of the module instance. The rest of the module and activity are
     * randomly generated from the logged in user.
     *
     * @param Request $request      Request object
     * @param Module $module The module the instance should belong to
     * @return ModuleInstance New module instance
     */
    public function store(Request $request, Module $module)
    {
        return (new ModuleInstanceFactory())->createModuleInstance(
            $module, $request->input('name'), $request->input('activity_for', 'user')
        )->load('activity');
    }

    /**
     * Get all module instances belonging to a given module
     *
     * @param Module $module Module the module instances should belong to
     * @param ModuleInstanceRepository $repository Module instance repository for retrieving module instances
     * @return \BristolSU\Support\ModuleInstance\Contracts\ModuleInstance[]|\Illuminate\Support\Collection
     */
    public function index(Module $module, ModuleInstanceRepository $repository)
    {
        return $repository->allWithAlias($module->getAlias())->map(function(ModuleInstance $module) {
            return $module->load('activity');
        });
    }

    /**
     * Delete a module instance
     *
     * @param Module $module Module the instance belongs to
     * @param ModuleInstance $moduleInstance The module instance
     *
     * @throws \Exception If the module instance can't be deleted
     */
    public function destroy(Module $module, ModuleInstance $moduleInstance)
    {
        $moduleInstance->delete();
    }

}

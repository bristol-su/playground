<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Support\ModuleInstance\Connection\ModuleInstanceService;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Illuminate\Http\Request;

/**
 * Handles managing module instance services
 */
class ModuleInstanceServiceController extends Controller
{

    /**
     * Get all module instance services for a module instance
     *
     * @param ModuleInstance $moduleInstance Module instance the services should belong to
     * @return mixed
     */
    public function index(ModuleInstance $moduleInstance)
    {
        return $moduleInstance->moduleInstanceServices;
    }

    /**
     * Create a new module instance service
     *
     * Needs
     * [
     *      'service' => 'service_alias',
     *      'connection_id' => 1 // ID of the connection.
     * ]
     *
     * @param ModuleInstance $moduleInstance Module instance the service belongs to
     * @param Request $request Request object
     *
     * @return ModuleInstanceService
     */
    public function store(ModuleInstance $moduleInstance, Request $request)
    {
        return $moduleInstance->moduleInstanceServices()->create([
            'service' => $request->input('service'),
            'connection_id' => $request->input('connection_id'),
        ]);
    }

    /**
     * Update a module instance service
     *
     * Pass the connection_id to change it.
     *
     * @param ModuleInstance $moduleInstance
     * @param ModuleInstanceService $moduleInstanceService
     * @param Request $request
     * @return ModuleInstanceService
     */
    public function update(ModuleInstance $moduleInstance, ModuleInstanceService $moduleInstanceService, Request $request)
    {
        $moduleInstanceService->connection_id = $request->input('connection_id', $moduleInstanceService->connection_id);
        $moduleInstanceService->save();
        return $moduleInstanceService;
    }

    /**
     * Delete a module instance service
     *
     * @param ModuleInstance $moduleInstance Module instance the service belongs to
     * @param ModuleInstanceService $moduleInstanceService Module instance service to delete
     *
     * @throws \Exception If can't be deleted.
     */
    public function destroy(ModuleInstance $moduleInstance, ModuleInstanceService $moduleInstanceService)
    {
        $moduleInstanceService->delete();
    }
}

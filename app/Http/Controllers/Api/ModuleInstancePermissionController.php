<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Playground\Support\Permissions\ModulePermission;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * Endpoints for managing module permissions.
 */
class ModuleInstancePermissionController extends Controller
{

    /**
     * Get all module instance permissions for a specific module instance
     *
     * @param ModuleInstance $moduleInstance Module instance the permissions should belong to
     * @return Collection|ModulePermission[]
     */
    public function index(ModuleInstance $moduleInstance)
    {
        return ModulePermission::where('module_instance_id', $moduleInstance->id())->get();
    }

    /**
     * Create a new module permission
     *
     * [
     *      'ability' => 'module.view',
     *      'result' => true/false
     * ]
     * @param ModuleInstance $moduleInstance Module instance the permission belongs to
     * @param Request $request Request object
     *
     * @return ModulePermission
     */
    public function store(ModuleInstance $moduleInstance, Request $request)
    {
        return ModulePermission::create([
            'ability' => $request->input('ability'),
            'result' => $request->input('result'),
            'module_instance_id' => $moduleInstance->id()
        ]);
    }

    /**
     * Update a module permission result
     *
     * [
     *      'result' => true/false
     * ]
     *
     * @param ModuleInstance $moduleInstance Module instance the module permission belongs to
     * @param ModulePermission $modulePermission The module permission to update
     * @param Request $request The request object
     * @return ModulePermission Updated module permission
     */
    public function update(ModuleInstance $moduleInstance, ModulePermission $modulePermission, Request $request)
    {
        $modulePermission->result = $request->input('result', $modulePermission->result);
        $modulePermission->save();
        return $modulePermission;
    }

}

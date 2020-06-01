<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\ModuleInstance\Settings\ModuleInstanceSetting;
use Illuminate\Http\Request;

/**
 * Handle module instance settings
 */
class ModuleInstanceSettingController extends Controller
{

    /**
     * Get all module instance settings belonging to a module.
     *
     * @param ModuleInstance $moduleInstance Module instance the setting belongs to
     * @return ModuleInstanceSetting
     */
    public function index(ModuleInstance $moduleInstance)
    {
        return $moduleInstance->moduleInstanceSettings;
    }

    /**
     * Create a new module instance setting
     *
     * Needs
     * [
     *      'key' => 'setting-key',
     *      'value' => 'setting-value'
     * ]
     *
     * @param ModuleInstance $moduleInstance Module instance the setting should belong to
     * @param Request $request Request object
     *
     * @return ModuleInstanceSetting
     */
    public function store(ModuleInstance $moduleInstance, Request $request)
    {
        return $moduleInstance->moduleInstanceSettings()->create([
            'key' => $request->input('key'),
            'value' => $request->input('value'),
        ]);
    }

    /**
     * Update a module instance setting value
     *
     * Pass ['value' => 'new-value'] to update a value
     *
     * @param ModuleInstance $moduleInstance Module instance the setting belongs to
     * @param ModuleInstanceSetting $moduleInstanceSetting The setting to update
     * @param Request $request Request object
     * @return ModuleInstanceSetting The update setting
     */
    public function update(ModuleInstance $moduleInstance, ModuleInstanceSetting $moduleInstanceSetting, Request $request)
    {
        $moduleInstanceSetting->value = $request->input('value', $moduleInstanceSetting->value);
        $moduleInstanceSetting->save();
        return $moduleInstanceSetting;
    }

}

<?php

namespace BristolSU\Playground\Support\Module;

use BristolSU\Support\Activity\Activity;
use BristolSU\Support\Logic\Logic;
use BristolSU\Support\Module\Contracts\Module;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Illuminate\Support\Str;

/**
 * Create a module instance class with dummy data.
 */
class ModuleInstanceFactory
{

    /**
     * Create a module instance and associated activity given a name
     *
     * @param Module $module Module to create the module instance with
     * @param string $name Name to use throughout production
     * @return ModuleInstance Created module instance
     */
    public function createModuleInstance(Module $module, string $name): ModuleInstance
    {
        // Create logic
        $logic = Logic::create([
            'name' => $name,
            'description' => 'Logic.'. $module->getAlias()
        ]);

        // Create an activity
        $activitySlug = Str::random(25);
        while(Activity::where('slug', $activitySlug)->count() > 0) {
            $activitySlug = Str::random(25);
        }

        $activity = Activity::create([
            'name' => 'Activity '.$activitySlug,
            'description' => 'Activity '.$activitySlug,
            'slug' => $activitySlug,
            'type' => 'open',
            'activity_for' => 'user',
            'for_logic' => $logic->id,
            'admin_logic' => $logic->id,
        ]);

        // Create a module instance
        $moduleInstanceSlug = Str::random(25);
        while(ModuleInstance::where('slug', $moduleInstanceSlug)->count() > 0) {
            $moduleInstanceSlug = Str::random(25);
        }

        $moduleInstance = ModuleInstance::create([
            'alias' => $module->getAlias(),
            'name' => $name,
            'description' => 'Module instance for the ' . $module->getName() . ' module with an alias ' . $module->getAlias(),
            'active' => $logic->id,
            'visible' => $logic->id,
            'slug' => $moduleInstanceSlug,
            'activity_id' => $activity->id,
        ]);

        return $moduleInstance;
    }

}

<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Playground\Support\Events\Event;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class ModuleInstanceEventController extends Controller
{

    public function index(ModuleInstance $moduleInstance)
    {
        return Event::where('module_instance_id', $moduleInstance->id())->get();
    }

}

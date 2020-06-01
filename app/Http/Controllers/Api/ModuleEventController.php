<?php

namespace BristolSU\Playground\Http\Controllers\Api;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Support\Events\Contracts\EventRepository;
use BristolSU\Support\Module\Module;

class ModuleEventController extends Controller
{

    public function index(Module $module, EventRepository $eventRepository)
    {
        return $eventRepository->allForModule($module->getAlias());
    }

}

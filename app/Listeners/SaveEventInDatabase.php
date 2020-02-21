<?php

namespace BristolSU\Playground\Listeners;

use BristolSU\Playground\Support\Events\Event;
use BristolSU\Support\Action\Contracts\TriggerableEvent;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class SaveEventInDatabase
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        $attributes = [
            'module_instance_id' => app(ModuleInstance::class)->id(),
            'event' => get_class($event)
        ];
        if($event instanceof TriggerableEvent) {
            $attributes['data'] = $event->getFields();
        }
        Event::create($attributes);
    }
}

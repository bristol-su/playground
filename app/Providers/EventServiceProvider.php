<?php

namespace BristolSU\Playground\Providers;

use BristolSU\Playground\Support\Events\SaveEventInDatabase;
use BristolSU\Support\Events\Contracts\EventRepository;
use BristolSU\Support\Module\Contracts\ModuleRepository;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Set up events
 */
class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [

    ];

    public function listens()
    {
        $listens = [];
        foreach(app(ModuleRepository::class)->all() as $module) {
            foreach(app(EventRepository::class)->allForModule($module->getAlias()) as $event) {
                $listens[$event['event']] = [SaveEventInDatabase::class];
            }
        }
        return array_merge($this->listen, $listens);
    }
}

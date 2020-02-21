<?php

namespace BristolSU\Playground\Support\Events;

use BristolSU\Support\Events\Contracts\EventManager;
use BristolSU\Support\Events\Contracts\EventRepository;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    protected $fillable = [
        'module_instance_id', 'event', 'data'
    ];

    protected $casts = [
        'data' => 'array'
    ];

    protected $appends = [
        'name', 'description'
    ];

    public function getNameAttribute()
    {
        $event = $this->getEventInformation();

        if(is_array($event) && isset($event['name'])) {
            return $event['name'];
        }
        return null;
    }

    public function getDescriptionAttribute()
    {
        $event = $this->getEventInformation();

        if(is_array($event) && isset($event['description'])) {
            return $event['description'];
        }
        return null;
    }

    public function getEventInformation()
    {
        return collect(app(EventManager::class)->all())
            ->flatten(1)
            ->filter(function($eventArray) {
                return isset($eventArray['event']) && $eventArray['event'] === $this->event;
            })
            ->first();
    }

}

<?php

namespace BristolSU\Playground\Support\Events;

use BristolSU\Support\Events\Contracts\EventManager;
use Database\Factories\EventFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

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

    /** @test */
    public function getDataAttribute(){
        if($this->attributes['data'] === null) {
            return [];
        }
        return json_decode($this->attributes['data']);
    }

    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return new EventFactory();
    }
}

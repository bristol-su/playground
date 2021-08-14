<?php

namespace Database\Factories;

use BristolSU\Playground\Support\Events\Event;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'module_instance_id' => fn() => ModuleInstance::factory()->create()->id,
            'event' => 'EventNameSpace',
            'data' => []
        ];
    }
}

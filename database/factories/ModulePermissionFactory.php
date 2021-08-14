<?php

namespace Database\Factories;

use BristolSU\Playground\Support\Events\Event;
use BristolSU\Playground\Support\Permissions\ModulePermission;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModulePermissionFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ModulePermission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ability' => $this->faker->word,
            'result' => $this->faker->boolean,
            'module_instance_id' => fn() => ModuleInstance::factory()->create()->id
        ];
    }
}

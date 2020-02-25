<?php

$factory->define(\BristolSU\Playground\Support\Events\Event::class, function(\Faker\Generator $faker) {
    return [
        'module_instance_id' => function() {
            return factory(\BristolSU\Support\ModuleInstance\ModuleInstance::class)->create()->id;
        },
        'event' => 'EventNameSpace',
        'data' => []
    ];
});

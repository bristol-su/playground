<?php

$factory->define(\BristolSU\Playground\Support\Permissions\ModulePermission::class, function(\Faker\Generator $faker) {
    return [
        'ability' => $faker->word,
        'result' => $faker->boolean,
        'module_instance_id' => function() {
            return factory(\BristolSU\Support\ModuleInstance\ModuleInstance::class)->create()->id;
        }
    ];
});

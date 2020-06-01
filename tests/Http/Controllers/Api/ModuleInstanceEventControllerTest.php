<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Support\Events\Event;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\User\User;

class ModuleInstanceEventControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_events_belonging_to_a_module_instance(){
        $this->be(factory(User::class)->create());

        $moduleInstance = factory(ModuleInstance::class)->create(['slug' => 'modinst']);

        factory(Event::class)->create(['event' => 'ModInstEventNamespace', 'module_instance_id' => $moduleInstance->id, 'data' => ['user_id' => 1]]);
        factory(Event::class)->create(['event' => 'ModInstEventNamespace2', 'module_instance_id' => $moduleInstance->id, 'data' => ['user_id' => 2]]);
        factory(Event::class, 5)->create();

        $response = $this->getJson('/api/module-instance/modinst/event');

        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJsonFragment([
            'event' => 'ModInstEventNamespace',
            'data' => ['user_id' => 1]
        ]);
        $response->assertJsonFragment([
            'event' => 'ModInstEventNamespace2',
            'data' => ['user_id' => 2]
        ]);
    }

}

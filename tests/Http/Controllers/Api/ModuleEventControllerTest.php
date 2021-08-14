<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Events\Contracts\EventRepository;
use BristolSU\Support\User\User;

class ModuleEventControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_events_for_a_module(){
        $this->beUser($this->newUser());

        $events = [
            ['name' => 'Name1', 'description' => 'Desc1', 'event' => 'Evt1'],
            ['name' => 'Name2', 'description' => 'Desc2', 'event' => 'Evt2'],
        ];
        $eventRepository = $this->prophesize(EventRepository::class);
        $eventRepository->allForModule('alias1')->shouldBeCalled()->willReturn($events);
        $this->instance(EventRepository::class, $eventRepository->reveal());

        $module = $this->prophesize(\BristolSU\Support\Module\Module::class);
        $module->getAlias()->willReturn('alias1');
        $this->instance(\BristolSU\Support\Module\Module::class, $module->reveal());

        $response = $this->getJson('/api/module/alias1/event');

        $response->assertStatus(200);
        $response->assertJsonCount(2);
        $response->assertJson($events);
    }

}

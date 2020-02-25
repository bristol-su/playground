<?php

namespace BristolSU\Playground\Tests\Support\Events;

use BristolSU\Playground\Support\Events\Event;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Events\Contracts\EventManager;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class EventTest extends TestCase
{

    /** @test */
    public function an_event_row_can_be_created(){
        $moduleInstance = factory(ModuleInstance::class)->create();

        factory(Event::class)->create([
            'module_instance_id' => $moduleInstance->id,
            'event' => 'SomeEventNamespace',
            'data' => [
                'user_id' => 1
            ]
        ]);

        $this->assertDatabaseHas('events', [
            'module_instance_id' => $moduleInstance->id,
            'event' => 'SomeEventNamespace',
            'data' => '{"user_id":1}'
        ]);
    }

    /** @test */
    public function getEventInformation_returns_null_if_event_not_registered(){
        $moduleInstance = factory(ModuleInstance::class)->create();

        $event = factory(Event::class)->create([
            'module_instance_id' => $moduleInstance->id,
            'event' => 'SomeEventNamespace',
            'data' => [
                'user_id' => 1
            ]
        ]);

        $this->assertNull($event->getEventInformation());
    }

    /** @test */
    public function getEventInformation_returns_event_information_if_event_registered(){
        app(EventManager::class)->registerEvent('module_alias', 'EventName', 'SomeEventNamespace', 'EventDescription');

        $moduleInstance = factory(ModuleInstance::class)->create();

        $event = factory(Event::class)->create([
            'module_instance_id' => $moduleInstance->id,
            'event' => 'SomeEventNamespace',
            'data' => [
                'user_id' => 1
            ]
        ]);

        $this->assertEquals([
            'name' => 'EventName',
            'description' => 'EventDescription',
            'event' => 'SomeEventNamespace'
        ], $event->getEventInformation());
    }

    /** @test */
    public function event_has_a_name_attribute(){
        app(EventManager::class)->registerEvent('module_alias', 'EventName', 'SomeEventNamespace', 'EventDescription');

        $moduleInstance = factory(ModuleInstance::class)->create();

        $event = factory(Event::class)->create([
            'module_instance_id' => $moduleInstance->id,
            'event' => 'SomeEventNamespace',
            'data' => [
                'user_id' => 1
            ]
        ]);

        $this->assertEquals('EventName', $event->name);
    }

    /** @test */
    public function event_has_a_description_attribute(){
        app(EventManager::class)->registerEvent('module_alias', 'EventName', 'SomeEventNamespace', 'EventDescription');

        $moduleInstance = factory(ModuleInstance::class)->create();

        $event = factory(Event::class)->create([
            'module_instance_id' => $moduleInstance->id,
            'event' => 'SomeEventNamespace',
            'data' => [
                'user_id' => 1
            ]
        ]);

        $this->assertEquals('EventDescription', $event->description);
    }

    /** @test */
    public function event_name_is_null_if_event_not_registered(){
        $moduleInstance = factory(ModuleInstance::class)->create();

        $event = factory(Event::class)->create([
            'module_instance_id' => $moduleInstance->id,
            'event' => 'SomeEventNamespace',
            'data' => [
                'user_id' => 1
            ]
        ]);

        $this->assertNull($event->name);
    }

    /** @test */
    public function event_description_is_null_if_event_not_registered(){
        $moduleInstance = factory(ModuleInstance::class)->create();

        $event = factory(Event::class)->create([
            'module_instance_id' => $moduleInstance->id,
            'event' => 'SomeEventNamespace',
            'data' => [
                'user_id' => 1
            ]
        ]);

        $this->assertNull($event->description);
    }

    /** @test */
    public function data_is_converted_to_an_empty_array_if_null(){
        $event = factory(Event::class)->create(['data' => null]);

        $this->assertEquals([], $event->data);
    }
}


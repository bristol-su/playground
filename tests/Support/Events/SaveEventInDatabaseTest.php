<?php

namespace BristolSU\Playground\Tests\Support\Events;

use BristolSU\Playground\Support\Events\SaveEventInDatabase;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Action\Contracts\TriggerableEvent;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class SaveEventInDatabaseTest extends TestCase
{

    /** @test */
    public function it_creates_an_event_with_a_module_instance_id_and_event_name(){
        $moduleInstance = factory(ModuleInstance::class)->create();
        $this->instance(ModuleInstance::class, $moduleInstance);

        $listener = new SaveEventInDatabase();
        $listener->handle(new DummyEvent());

        $this->assertDatabaseHas('events', [
            'module_instance_id' => $moduleInstance->id,
            'event' => DummyEvent::class,
            'data' => null
        ]);
    }

    /** @test */
    public function it_creates_an_event_with_a_module_instance_id_and_event_name_and_data(){
        $moduleInstance = factory(ModuleInstance::class)->create();
        $this->instance(ModuleInstance::class, $moduleInstance);

        $listener = new SaveEventInDatabase();
        $listener->handle(new TriggerableDummyEvent());

        $this->assertDatabaseHas('events', [
            'module_instance_id' => $moduleInstance->id,
            'event' => TriggerableDummyEvent::class,
            'data' => '{"user_id":1}'
        ]);
    }

}

class DummyEvent {}

class TriggerableDummyEvent implements TriggerableEvent {
    /**
     * @inheritDoc
     */
    public function getFields(): array
    {
        return ['user_id' => 1];
    }

    /**
     * @inheritDoc
     */
    public static function getFieldMetaData(): array
    {
        return [
            'user_id' => [
                'label' => 'User ID',
                'helptext' => 'User ID desc'
            ]
        ];
    }
}

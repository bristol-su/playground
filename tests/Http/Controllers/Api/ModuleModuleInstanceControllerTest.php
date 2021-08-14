<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Module\Contracts\Module;
use BristolSU\Support\Module\Contracts\ModuleRepository;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\User\User;

class ModuleModuleInstanceControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_module_instances_of_the_given_module(){
        $this->beUser($this->newUser());

        $module = $this->prophesize(Module::class);
        $module->getAlias()->shouldBeCalled()->willReturn('module1');

        $moduleRepository = $this->prophesize(ModuleRepository::class);
        $moduleRepository->findByAlias('module1')->shouldBeCalled()->willReturn($module->reveal());
        $this->instance(ModuleRepository::class, $moduleRepository->reveal());

        $moduleInstances = ModuleInstance::factory()->count(10)->create(['alias' => 'module1']);
        $otherModuleInstances = ModuleInstance::factory()->count(10)->create();

        $response = $this->json('GET', '/api/module/module1/module-instance');

        $response->assertStatus(200);
        $response->assertJson($moduleInstances->toArray());
        $response->assertJsonMissing($otherModuleInstances->toArray());
    }

    /** @test */
    public function store_creates_a_module_instance_of_the_given_module(){
        $this->beUser($this->newUser());

        $module = $this->prophesize(Module::class);
        $module->getAlias()->willReturn('module1');
        $module->getName()->willReturn('Name1');
        $moduleRepository = $this->prophesize(ModuleRepository::class);
        $moduleRepository->findByAlias('module1')->shouldBeCalled()->willReturn($module->reveal());
        $this->instance(ModuleRepository::class, $moduleRepository->reveal());

        $response = $this->json('post', '/api/module/module1/module-instance', [
            'name' => 'SomeName',
            'activity_for' => 'group'
        ]);

        $response->assertStatus(201);
        $response->assertJson([
            'alias' => 'module1',
            'name' => 'SomeName',
            'description' => 'Module instance for the Name1 module with an alias module1'
        ]);
        $this->assertDatabaseHas('module_instances', [
            'alias' => 'module1',
            'name' => 'SomeName',
            'description' => 'Module instance for the Name1 module with an alias module1'
        ]);
        $this->assertDatabaseHas('activities', [
            'activity_for' => 'group'
        ]);
    }

    /** @test */
    public function destroy_deletes_the_given_module_instance_of_the_given_module(){
        $this->beUser($this->newUser());

        $module = $this->prophesize(Module::class);
        $module->getAlias()->willReturn('module1');
        $moduleRepository = $this->prophesize(ModuleRepository::class);
        $moduleRepository->findByAlias('module1')->shouldBeCalled()->willReturn($module->reveal());
        $this->instance(ModuleRepository::class, $moduleRepository->reveal());

        $moduleInstance = ModuleInstance::factory()->create(['alias' => 'module1']);

        $this->assertDatabaseHas('module_instances', ['id' => $moduleInstance->id]);
        $response = $this->json('delete', '/api/module/module1/module-instance/'.$moduleInstance->id);
        $response->assertStatus(200);
        $this->assertDatabaseMissing('module_instances', ['id' => $moduleInstance->id]);
    }

}

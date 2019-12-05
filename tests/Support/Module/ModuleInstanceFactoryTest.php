<?php

namespace BristolSU\Playground\Tests\Support\Module;

use BristolSU\Playground\Support\Module\ModuleInstanceFactory;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Module\Module;

class ModuleInstanceFactoryTest extends TestCase
{

    /** @test */
    public function a_logic_with_the_given_name_is_created(){
        $this->assertDatabaseMissing('logics', []);
        $module = $this->prophesize(Module::class);
        $module->getName()->willReturn('Name1');
        $module->getAlias()->willReturn('alias1');

        (new ModuleInstanceFactory())->createModuleInstance($module->reveal(), 'Name2');

        $this->assertDatabaseHas('logics', [
            'name' => 'Name2',
            'description' => 'Logic.alias1'
        ]);
    }

    /** @test */
    public function an_activity_is_created(){
        $this->assertDatabaseMissing('logics', []);

        $module = $this->prophesize(Module::class);
        $module->getName()->willReturn('Name1');
        $module->getAlias()->willReturn('alias1');

        (new ModuleInstanceFactory())->createModuleInstance($module->reveal(), 'Name2');

        $this->assertDatabaseHas('activities', [
            'type' => 'open',
            'activity_for' => 'user',
        ]);
    }

    /** @test */
    public function a_module_instance_is_created(){
        $this->assertDatabaseMissing('logics', []);

        $module = $this->prophesize(Module::class);
        $module->getName()->willReturn('Name1');
        $module->getAlias()->willReturn('alias1');

        (new ModuleInstanceFactory())->createModuleInstance($module->reveal(), 'Name2');

        $this->assertDatabaseHas('module_instances', [
            'alias' => 'alias1',
            'name' => 'Name2',
            'description' => 'Module instance for the Name1 module with an alias alias1',
        ]);
    }

    /** @test */
    public function a_module_instance_is_returned(){
        $this->assertDatabaseMissing('logics', []);

        $module = $this->prophesize(Module::class);
        $module->getName()->willReturn('Name1');
        $module->getAlias()->willReturn('alias1');

        $moduleInstance = (new ModuleInstanceFactory())->createModuleInstance($module->reveal(), 'Name2');

        $this->assertEquals('alias1', $moduleInstance->alias());
        $this->assertEquals('Name2', $moduleInstance->name);
        $this->assertEquals('Module instance for the Name1 module with an alias alias1', $moduleInstance->description);
    }

}

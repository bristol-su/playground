<?php

namespace BristolSU\Playground\Tests\Support\Permissions;

use BristolSU\Playground\Support\Permissions\ModulePermission;
use BristolSU\Playground\Support\Permissions\OverridePermissionTester;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\Permissions\Models\Permission;

class OverridePermissionTesterTest extends TestCase
{

    /** @test */
    public function it_returns_false_if_module_instance_not_bound(){
        $permission = new Permission('ability1', 'name1', 'description1');
        $user = $this->newUser();

        $tester = new OverridePermissionTester();
        $this->assertDatabaseMissing('module_permissions', [
            'ability' => 'ability1'
        ]);

        $this->assertFalse(
            $tester->can($permission, $user, null, null)
        );
    }

    /** @test */
    public function it_returns_true_if_the_module_permission_was_not_found(){
        $permission = new Permission('ability1', 'name1', 'description1');
        $user = $this->newUser();
        $moduleInstance = factory(ModuleInstance::class)->create();
        $this->instance(ModuleInstance::class, $moduleInstance);

        $tester = new OverridePermissionTester();
        $this->assertDatabaseMissing('module_permissions', [
            'ability' => 'ability1'
        ]);

        $this->assertTrue(
            $tester->can($permission, $user, null, null)
        );
    }

    /** @test */
    public function it_returns_true_if_the_module_permission_result_is_true(){
        $permission = new Permission('ability1', 'name1', 'description1');
        $user = $this->newUser();
        $moduleInstance = factory(ModuleInstance::class)->create();
        $this->instance(ModuleInstance::class, $moduleInstance);
        factory(ModulePermission::class)->create(['ability' => 'ability1', 'module_instance_id' => $moduleInstance->id(), 'result' => true]);

        $tester = new OverridePermissionTester();
        $this->assertDatabaseHas('module_permissions', [
            'ability' => 'ability1', 'module_instance_id' => $moduleInstance->id(), 'result' => 1
        ]);

        $this->assertTrue(
            $tester->can($permission, $user, null, null)
        );
    }

    /** @test */
    public function it_returns_false_if_the_module_permission_result_is_false(){
        $permission = new Permission('ability1', 'name1', 'description1');
        $user = $this->newUser();
        $moduleInstance = factory(ModuleInstance::class)->create();
        $this->instance(ModuleInstance::class, $moduleInstance);
        factory(ModulePermission::class)->create(['ability' => 'ability1', 'module_instance_id' => $moduleInstance->id(), 'result' => false]);

        $tester = new OverridePermissionTester();
        $this->assertDatabaseHas('module_permissions', [
            'ability' => 'ability1', 'module_instance_id' => $moduleInstance->id(), 'result' => 0
        ]);

        $this->assertFalse(
            $tester->can($permission, $user, null, null)
        );
    }

}

<?php

namespace BristolSU\Playground\Tests\Support\Permissions;

use BristolSU\Playground\Support\Permissions\ModulePermission;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\ModuleInstance\ModuleInstance;

class ModulePermissionTest extends TestCase
{

    /** @test */
    public function it_can_be_created(){
        $moduleInstance = ModuleInstance::factory()->create();

        $modulePermission = ModulePermission::factory()->create([
            'ability' => 'ability1',
            'result' => true,
            'module_instance_id' => $moduleInstance->id
        ]);
        $this->assertInstanceOf(ModulePermission::class, $modulePermission);

        $this->assertDatabaseHas('module_permissions', [
            'id' => $modulePermission->id,
            'ability' => 'ability1',
            'result' => 1,
            'module_instance_id' => $moduleInstance->id
        ]);
    }

}

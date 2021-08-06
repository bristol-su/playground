<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Support\Permissions\ModulePermission;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\Permissions\Facade\Permission;
use BristolSU\Support\Permissions\Models\ModuleInstancePermission;
use BristolSU\Support\User\User;
use Illuminate\Support\Str;

class ModuleInstancePermissionControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_permissions(){
        $this->beUser($this->newUser());
        $moduleInstance = ModuleInstance::factory()->create();
        $permissions = ModulePermission::factory()->count(10)->create(['module_instance_id' => $moduleInstance->id, 'ability' => Str::random(5)]);
        $otherPermissions = ModulePermission::factory()->count(10)->create(['ability' => Str::random(5)]);

        foreach($permissions as $permission) {
            Permission::register($permission->ability, 'Name1', 'Dsc1', 'alias', false);
        }
        foreach($otherPermissions as $permission) {
            Permission::register($permission->ability, 'Name1', 'Dsc1', 'alias', false);
        }

        $response = $this->json('get', '/api/module-instance/' . $moduleInstance->slug . '/permission');

        $response->assertStatus(200);
        $response->assertJson($permissions->toArray());
        $response->assertJsonMissing($otherPermissions->toArray());

    }

    /** @test */
    public function store_creates_a_permission(){
        $this->beUser($this->newUser());
        $moduleInstance = ModuleInstance::factory()->create();

        Permission::register('ability1', 'Name1', 'Dsc1', 'alias', false);

        $response = $this->json('post', '/api/module-instance/' . $moduleInstance->slug . '/permission', [
            'ability' => 'ability1', 'result' => false
        ]);

        $response->assertStatus(201);
        $response->assertJson(['ability' => 'ability1', 'result' => false]);

        $this->assertDatabaseHas('module_permissions', [
            'module_instance_id' => $moduleInstance->id,
            'ability' => 'ability1',
            'result' => 0
        ]);
    }

    /** @test */
    public function update_updates_a_permission(){
        $this->beUser($this->newUser());
        $moduleInstance = ModuleInstance::factory()->create();
        $permission = ModulePermission::factory()->create(['result' => true, 'module_instance_id' => $moduleInstance->id, 'ability' => Str::random(5)]);

        Permission::register('ability1', 'Name1', 'Dsc1', 'alias', false);

        $this->assertDatabaseHas('module_permissions', [
            'id' => $permission->id,
            'result' => 1
        ]);

        $response = $this->json('patch', '/api/module-instance/' . $moduleInstance->slug . '/permission/' . $permission->id, [
            'result' => false
        ]);

        $response->assertStatus(200);
        $response->assertJson(['result' => false]);

        $this->assertDatabaseHas('module_permissions', [
            'id' => $permission->id,
            'result' => 0
        ]);
    }

}

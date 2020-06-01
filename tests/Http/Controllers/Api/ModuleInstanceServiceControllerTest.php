<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Connection\Connection;
use BristolSU\Support\ModuleInstance\Connection\ModuleInstanceService;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\User\User;

class ModuleInstanceServiceControllerTest extends TestCase
{
    /** @test */
    public function index_returns_all_services(){
        $this->be(factory(User::class)->create());

        $moduleInstance = factory(ModuleInstance::class)->create();

        $services = factory(ModuleInstanceService::class, 10)->create(['module_instance_id' => $moduleInstance->id]);
        $otherServices = factory(ModuleInstanceService::class, 10)->create();

        $response = $this->json('get', '/api/module-instance/' . $moduleInstance->slug . '/service');

        $response->assertStatus(200);
        $response->assertJson($services->toArray());
        $response->assertJsonMissing($otherServices->toArray());
    }

    /** @test */
    public function store_creates_a_service(){
        $this->be($user = factory(User::class)->create());
        $moduleInstance = factory(ModuleInstance::class)->create();
        $connection = factory(Connection::class)->create(['user_id' => $user->id]);

        $response = $this->json('post', '/api/module-instance/' . $moduleInstance->slug . '/service', [
            'service' => 'service1', 'connection_id' => $connection->id
        ]);

        $response->assertStatus(201);
        $response->assertJson(['service' => 'service1', 'connection_id' => $connection->id]);

        $this->assertDatabaseHas('module_instance_services', [
            'module_instance_id' => $moduleInstance->id,
            'service' => 'service1',
            'connection_id' => $connection->id
        ]);
    }

    /** @test */
    public function update_updates_a_service(){
        $this->be($user = factory(User::class)->create());
        $moduleInstance = factory(ModuleInstance::class)->create();
        $connection1 = factory(Connection::class)->create(['user_id' => $user->id]);
        $connection2 = factory(Connection::class)->create(['user_id' => $user->id]);

        $moduleInstanceService = factory(ModuleInstanceService::class)->create([
            'module_instance_id' => $moduleInstance->id, 'service' => 'service1', 'connection_id' => $connection1->id
        ]);
        $this->assertDatabaseHas('module_instance_services', [
            'module_instance_id' => $moduleInstance->id,
            'service' => 'service1',
            'connection_id' => $connection1->id
        ]);


        $response = $this->json('patch', '/api/module-instance/' . $moduleInstance->slug . '/service/' . $moduleInstanceService->id, [
            'connection_id' => $connection2->id
        ]);

        $response->assertStatus(200);
        $response->assertJson(['id' => $moduleInstanceService->id, 'service' => 'service1', 'connection_id' => $connection2->id]);

        $this->assertDatabaseHas('module_instance_services', [
            'module_instance_id' => $moduleInstance->id,
            'service' => 'service1',
            'connection_id' => $connection2->id
        ]);
    }

    /** @test */
    public function destroy_deletes_a_service(){
        $this->be($user = factory(User::class)->create());
        $moduleInstanceService = factory(ModuleInstanceService::class)->create();

        $this->assertDatabaseHas('module_instance_services', ['id' => $moduleInstanceService->id]);


        $response = $this->json('delete', '/api/module-instance/' . $moduleInstanceService->moduleInstance->slug . '/service/' . $moduleInstanceService->id);

        $response->assertStatus(200);

        $this->assertDatabaseMissing('module_instance_services', ['id' => $moduleInstanceService->id]);

    }
}

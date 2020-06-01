<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Api;

use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Connection\Connection;
use BristolSU\Support\ModuleInstance\Settings\ModuleInstanceSetting;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\User\User;

class ModuleInstanceSettingControllerTest extends TestCase
{

    /** @test */
    public function index_returns_all_settings(){
        $this->be(factory(User::class)->create());

        $moduleInstance = factory(ModuleInstance::class)->create();

        $settings = factory(ModuleInstanceSetting::class, 10)->create(['module_instance_id' => $moduleInstance->id]);
        $otherSettings = factory(ModuleInstanceSetting::class, 10)->create();

        $response = $this->json('get', '/api/module-instance/' . $moduleInstance->slug . '/setting');

        $response->assertStatus(200);
        $response->assertJson($settings->toArray());
        $response->assertJsonMissing($otherSettings->toArray());
    }

    /** @test */
    public function store_creates_a_setting(){
        $this->be($user = factory(User::class)->create());
        $moduleInstance = factory(ModuleInstance::class)->create();

        $response = $this->json('post', '/api/module-instance/' . $moduleInstance->slug . '/setting', [
            'key' => 'setting1', 'value' => 'val1'
        ]);

        $response->assertStatus(201);
        $response->assertJson(['key' => 'setting1', 'value' => 'val1']);

        $this->assertDatabaseHas('module_instance_settings', [
            'module_instance_id' => $moduleInstance->id,
            'key' => 'setting1',
            'value' => 'val1'
        ]);
    }

    /** @test */
    public function update_updates_a_setting(){
        $this->be($user = factory(User::class)->create());
        $moduleInstance = factory(ModuleInstance::class)->create();

        $moduleInstanceSetting = factory(ModuleInstanceSetting::class)->create([
            'module_instance_id' => $moduleInstance->id, 'key' => 'setting1', 'value' => 'val1'
        ]);
        $this->assertDatabaseHas('module_instance_settings', [
            'module_instance_id' => $moduleInstance->id,
            'key' => 'setting1',
            'value' => 'val1'
        ]);


        $response = $this->json('patch', '/api/module-instance/' . $moduleInstance->slug . '/setting/' . $moduleInstanceSetting->id, [
            'value' => 'val2'
        ]);

        $response->assertStatus(200);
        $response->assertJson(['id' => $moduleInstanceSetting->id, 'key' => 'setting1', 'value' => 'val2']);

        $this->assertDatabaseHas('module_instance_settings', [
            'module_instance_id' => $moduleInstance->id,
            'key' => 'setting1',
            'value' => 'val2'
        ]);
    }


}

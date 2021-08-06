<?php

namespace BristolSU\Playground\Tests\Console\Commands;

use BristolSU\Playground\Console\Commands\ClearDatabase;
use BristolSU\Playground\Support\Permissions\ModulePermission;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Action\ActionInstance;
use BristolSU\Support\Action\ActionInstanceField;
use BristolSU\Support\Activity\Activity;
use BristolSU\Support\ActivityInstance\ActivityInstance;
use BristolSU\Support\Completion\CompletionConditionInstance;
use BristolSU\Support\Connection\Connection;
use BristolSU\Support\Filters\FilterInstance;
use BristolSU\Support\Logic\Logic;
use BristolSU\Support\ModuleInstance\Connection\ModuleInstanceService;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\ModuleInstance\Settings\ModuleInstanceSetting;
use BristolSU\Support\Permissions\Models\ModelPermission;
use BristolSU\Support\Permissions\Models\ModuleInstancePermission;

class ClearDatabaseTest extends TestCase
{

    /** @test */
    public function it_truncates_all_relevant_tables(){
        ActionInstanceField::factory()->count(5)->create();
        ActionInstance::factory()->count(5)->create();
        Activity::factory()->count(5)->create();
        ActivityInstance::factory()->count(5)->create();
        CompletionConditionInstance::factory()->count(5)->create();
        Connection::factory()->count(5)->create();
        FilterInstance::factory()->count(5)->create();
        ModelPermission::factory()->count(5)->create();
        ModuleInstance::factory()->count(5)->create();
        ModuleInstanceSetting::factory()->count(5)->create();
        ModuleInstancePermission::factory()->count(5)->create();
        Logic::factory()->count(5)->create();
        ModuleInstanceService::factory()->count(5)->create();
        ModulePermission::factory()->count(5)->create();

        $command = new ClearDatabase();
        $tables = $command->tables;

        foreach($tables as $table) {
            $this->assertDatabaseHas($table, []);
        }

        $command->handle();

        foreach($tables as $table) {
            $this->assertDatabaseMissing($table, []);
        }
    }

}

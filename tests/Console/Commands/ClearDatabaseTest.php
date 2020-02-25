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
        factory(ActionInstanceField::class, 5)->create();
        factory(ActionInstance::class, 5)->create();
        factory(Activity::class, 5)->create();
        factory(ActivityInstance::class, 5)->create();
        factory(CompletionConditionInstance::class, 5)->create();
        factory(Connection::class, 5)->create();
        factory(FilterInstance::class, 5)->create();
        factory(ModelPermission::class, 5)->create();
        factory(ModuleInstance::class, 5)->create();
        factory(ModuleInstanceSetting::class, 5)->create();
        factory(ModuleInstancePermission::class, 5)->create();
        factory(Logic::class, 5)->create();
        factory(ModuleInstanceService::class, 5)->create();
        factory(ModulePermission::class, 5)->create();

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

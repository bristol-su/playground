<?php

namespace BristolSU\Playground\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

/**
 * Command to reset the playground to an initial state, not including user information.
 */
class ClearDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear:database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear the database of all non-authentication related tables';

    /**
     * The tables to clear when run
     *
     * @var array
     */
    public $tables = [
        'action_instance_fields',
        'action_instances',
        'activities',
        'activity_instances',
        'completion_condition_instances',
        'connection_instances',
        'filter_instances',
        'model_permissions',
        'module_instance_services',
        'module_permissions',
        'module_instances',
        'module_instance_settings',
        'module_instance_permissions',
        'logics',
    ];

    /**
     * Truncate all tables in the tables array
     *
     * @return void
     */
    public function handle()
    {
        foreach($this->tables as $table) {
            DB::table($table)->truncate();
        }
    }
}

<?php

namespace BristolSU\Playground\Support\Permissions;

use Illuminate\Database\Eloquent\Model;

/**
 * Holds information about assigned permissions
 */
class ModulePermission extends Model
{

    /**
     * Fillable attributes
     *
     * - ability: The string that represents the permission
     * - result: A boolean representing the result of the permission check
     * - moduleInstanceId: ID of the module instance the permission belongs to
     *
     * @var array
     */
    protected $fillable = [
        'ability',
        'result',
        'module_instance_id'
    ];

    /**
     * Attributes to cast
     *
     * @var array
     */
    protected $casts = [
        'result' => 'boolean'
    ];

}

<?php

namespace BristolSU\Playground\Support\Permissions;

use Database\Factories\ModulePermissionFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Holds information about assigned permissions
 */
class ModulePermission extends Model
{
    use HasFactory;

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


    /**
     * Prepare a date for array / JSON serialization.
     *
     * @param  \DateTimeInterface  $date
     * @return string
     */
    protected function serializeDate(\DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return new ModulePermissionFactory();
    }

}

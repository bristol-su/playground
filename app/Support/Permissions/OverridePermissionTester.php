<?php

namespace BristolSU\Playground\Support\Permissions;

use BristolSU\ControlDB\Contracts\Models\Group;
use BristolSU\ControlDB\Contracts\Models\Role;
use BristolSU\ControlDB\Contracts\Models\User;
use BristolSU\Support\ActivityInstance\Exceptions\NotInActivityInstanceException;
use BristolSU\Support\ModuleInstance\ModuleInstance;
use BristolSU\Support\Permissions\Contracts\Models\Permission;
use BristolSU\Support\Permissions\Contracts\Tester;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\ModelNotFoundException;

/**
 * Playground permission tester
 */
class OverridePermissionTester extends Tester
{

    /**
     * Do the given credentials have the permission?
     *
     * @param Permission $permission Permission to test
     * @param User|null $user User to test the permission against
     * @param Group|null $group Group to test the permission against
     * @param Role|null $role Role to test the permission against
     *
     * @return bool Result in the permissions table, or true if not found.
     */
    public function can(Permission $permission, ?User $user, ?Group $group, ?Role $role): ?bool
    {
        try {
            if(!app(ModuleInstance::class)->exists) {
                return false;
            }
            $modulePermission = ModulePermission::where('module_instance_id', app(ModuleInstance::class)->id())
                ->where('ability', $permission->getAbility())
                ->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return true;
        }

        return $modulePermission->result;
    }
}

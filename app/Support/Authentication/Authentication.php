<?php

namespace BristolSU\Playground\Support\Authentication;

use BristolSU\ControlDB\Contracts\Repositories\DataGroup;
use BristolSU\ControlDB\Contracts\Repositories\DataPosition;
use BristolSU\ControlDB\Contracts\Repositories\DataRole;
use BristolSU\ControlDB\Contracts\Repositories\Pivots\UserGroup;
use BristolSU\ControlDB\Contracts\Repositories\Pivots\UserRole;
use BristolSU\Support\Activity\Activity;
use BristolSU\Support\Authentication\Contracts\Authentication as AuthenticationContract;
use BristolSU\Support\User\Contracts\UserAuthentication;
use BristolSU\ControlDB\Contracts\Models\Group;
use BristolSU\ControlDB\Contracts\Models\Role;
use BristolSU\ControlDB\Contracts\Models\User;
use BristolSU\ControlDB\Contracts\Repositories\User as UserRepository;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Str;

/**
 * Authentication contract that uses the database user
 */
class Authentication implements AuthenticationContract
{

    /**
     * Holds the database user authentication to get and set users from
     *
     * @var UserAuthentication
     */
    private $auth;

    /**
     * Resolves users
     *
     * @var UserRepository
     */
    private $userRepository;

    /**
     * @param UserAuthentication $auth UserAuthentication to get the logged in database user
     * @param UserRepository $userRepository UserRepository to resolve users
     */
    public function __construct(UserAuthentication $auth, UserRepository $userRepository)
    {
        $this->auth = $auth;
        $this->userRepository = $userRepository;
    }

    /**
     * Get the current user
     *
     * @return null|User User related to the databsae user
     */
    public function getUser(): ?User
    {
        $user = $this->auth->getUser();
        if($user instanceof \BristolSU\Support\User\User && $user->exists) {
            return $this->userRepository->getById($user->controlId());
        }
        return null;
    }

    /**
     * Set a user
     *
     * This function does not provide a way to set users
     *
     * @param User $user New user
     * @throws \Exception
     */
    public function setUser(User $user)
    {
        throw new \Exception('No implementation');
    }

    /**
     * Get a group
     *
     * This function does not provide a way to get groups
     *
     * @return Group|null
     */
    public function getGroup()
    {
        if($this->activity()->exists) {
            if($this->activity()->activity_for === 'group') {
                return $this->getGroupForUser();
            } elseif($this->activity()->activity_for === 'role') {
                return $this->getRole()->group();
            }
        }
        return null;
    }

    /**
     * Get a role
     *
     * This function does not provide a way to get roles
     *
     * @return Role|null
     */
    public function getRole()
    {
        if($this->activity()->exists && $this->activity()->activity_for === 'role') {
            return $this->getRoleForUser();
        }
        return null;
    }

    /**
     * Set a group
     *
     * This function does not provide a way to set groups
     *
     * @param Group $group New group
     * @throws \Exception
     */
    public function setGroup(Group $group)
    {
        throw new \Exception('No implementation');
    }

    /**
     * Set a role
     *
     * This function does not provide a way to set roles
     *
     * @param Role $role New role
     * @throws \Exception
     */
    public function setRole(Role $role)
    {
        throw new \Exception('No implementation');
    }

    /**
     * Reset
     *
     * This function does not provide a way to reset. To reset, reset the user authentication contract
     *
     * @throws \Exception
     */
    public function reset(): void
    {
    }

    protected function activity(): Activity
    {
        if(Request::route() && Request::route()->hasParameter('activity_slug')) {
            return Request::route()->parameter('activity_slug');
        }
        return app(Activity::class);
    }

    /**
     * Find or create a group the user is a member of
     *
     * @return Group
     */
    protected function getGroupForUser(): Group {
        $userGroupRepository = app(UserGroup::class);
        $dataGroupRepository = app(DataGroup::class);
        $groupRepository = app(\BristolSU\ControlDB\Contracts\Repositories\Group::class);

        $groups = $userGroupRepository->getGroupsThroughUser($this->getUser());
        if($groups->count() > 0) {
            return $groups->first();
        }

        $dataGroup = $dataGroupRepository->create('Group ' . Str::random(), ($this->getUser()->data()->email() ?? 'example-group@example.com'));
        $group = $groupRepository->create($dataGroup->id());

        $userGroupRepository->addUserToGroup($this->getUser(), $group);
        return $group;
    }

    /**
     * Find or create a role the user is in
     *
     * @return Role
     */
    protected function getRoleForUser(): Role {
        $userRoleRepository = app(UserRole::class);
        $dataRoleRepository = app(DataRole::class);
        $roleRepository = app(\BristolSU\ControlDB\Contracts\Repositories\Role::class);
        $dataGroupRepository = app(DataGroup::class);
        $groupRepository = app(\BristolSU\ControlDB\Contracts\Repositories\Group::class);
        $dataPositionRepository = app(DataPosition::class);
        $positionRepository = app(\BristolSU\ControlDB\Contracts\Repositories\Position::class);

        $roles = $userRoleRepository->getRolesThroughUser($this->getUser());
        if($roles->count() > 0) {
            return $roles->first();
        }

        $dataRole = $dataRoleRepository->create('Role ' . Str::random(), ($this->getUser()->data()->email() ?? 'example-role@example.com'));

        $dataGroup = $dataGroupRepository->create('Group ' . Str::random(), ($this->getUser()->data()->email() ?? 'example-group@example.com'));
        $group = $groupRepository->create($dataGroup->id());

        $dataPosition = $dataPositionRepository->create('Position ' . Str::random(), 'Position ' . Str::random());
        $position = $positionRepository->create($dataPosition->id());

        $role = $roleRepository->create($position->id(), $group->id(), $dataRole->id());

        $userRoleRepository->addUserToRole($this->getUser(), $role);

        return $role;
    }
}

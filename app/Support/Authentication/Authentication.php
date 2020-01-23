<?php

namespace BristolSU\Playground\Support\Authentication;

use BristolSU\Support\Authentication\Contracts\Authentication as AuthenticationContract;
use BristolSU\Support\User\Contracts\UserAuthentication;
use BristolSU\ControlDB\Contracts\Models\Group;
use BristolSU\ControlDB\Contracts\Models\Role;
use BristolSU\ControlDB\Contracts\Models\User;
use BristolSU\ControlDB\Contracts\Repositories\User as UserRepository;
use Illuminate\Contracts\Auth\Factory as AuthFactory;

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
            return $this->userRepository->getById($user->id);
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
     * @return null
     */
    public function getGroup()
    {
        return null;
    }

    /**
     * Get a role
     *
     * This function does not provide a way to get roles
     *
     * @return null
     */
    public function getRole()
    {
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
}

<?php

namespace BristolSU\Playground\Http\Middleware;

use BristolSU\Support\User\Contracts\UserAuthentication;
use BristolSU\Support\User\User;
use Illuminate\Http\Request;

/**
 * Redirect to the homepage if authenticated in a guest route
 */
class RedirectIfAuthenticated
{

    /**
     * Holds the user authentication resolver
     *
     * @var UserAuthentication
     */
    private $userAuthentication;

    /**
     * @param UserAuthentication $userAuthentication Authentication to get the user from
     */
    public function __construct(UserAuthentication $userAuthentication)
    {
        $this->userAuthentication = $userAuthentication;
    }

    /**
     * Test if the user is authenticated
     *
     * @param Request $request Request object
     * @param \Closure $next Next middleware callback
     * @return mixed
     */
    public function handle(Request $request, \Closure $next)
    {
        if($this->userAuthentication->getUser() instanceof User) {
            return redirect('/');
        }

        return $next($request);
    }

}

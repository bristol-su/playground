<?php

namespace BristolSU\Playground\Http\Middleware;

use BristolSU\Support\User\Contracts\UserAuthentication;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

/**
 * Check a user is authenticated.
 *
 * Return an unauthenticated response if they are not
 */
class Authenticate
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
     *
     * @throws AuthenticationException If not authenticated
     */
    public function handle(Request $request, \Closure $next)
    {
        if($this->userAuthentication->getUser() === null) {
            $this->unauthenticated($request);
        }

        return $next($request);
    }

    /**
     * Handle an unauthenticated user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  array  $guards
     * @return void
     *
     * @throws \Illuminate\Auth\AuthenticationException
     */
    protected function unauthenticated($request)
    {
        throw new AuthenticationException(
            'Unauthenticated.', [], $this->redirectTo($request)
        );
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if(!$request->expectsJson()) {
            return route('login');
        }
    }
}

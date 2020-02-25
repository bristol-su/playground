<?php

namespace BristolSU\Playground\Tests\Http\Middleware;

use BristolSU\Playground\Http\Middleware\Authenticate;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\User\Contracts\UserAuthentication;
use BristolSU\Support\User\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class AuthenticateTest extends TestCase
{

    /** @test */
    public function handle_throws_an_exception_if_database_user_not_logged_in(){
        $this->withoutExceptionHandling();
        $this->expectException(AuthenticationException::class);
        $this->expectExceptionMessage('Unauthenticated.');

        $userAuthentication = $this->prophesize(UserAuthentication::class);
        $userAuthentication->getUser()->willReturn(null);

        $request = $this->prophesize(Request::class);
        $request->has('called')->shouldNotBeCalled();
        $request->expectsJson()->shouldBeCalled()->willReturn(false);

        $middleware = new Authenticate($userAuthentication->reveal());
        $middleware->handle($request->reveal(), function($request) {
            $request->has('called');
        });

    }

    /** @test */
    public function handle_calls_the_callback_if_database_user_logged_in(){
        $userAuthentication = $this->prophesize(UserAuthentication::class);
        $userAuthentication->getUser()->willReturn(factory(User::class)->create());

        $request = $this->prophesize(Request::class);
        $request->has('called')->shouldBeCalled();

        $middleware = new Authenticate($userAuthentication->reveal());
        $middleware->handle($request->reveal(), function($request) {
            $request->has('called');
        });
    }



}

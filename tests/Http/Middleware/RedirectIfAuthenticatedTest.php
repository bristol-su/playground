<?php

namespace BristolSU\Playground\Tests\Http\Middleware;

use BristolSU\Playground\Http\Middleware\RedirectIfAuthenticated;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\User\Contracts\UserAuthentication;
use BristolSU\Support\User\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RedirectIfAuthenticatedTest extends TestCase
{

    /** @test */
    public function handle_redirects_to_the_homepage_if_authenticated(){
        $userAuthentication = $this->prophesize(UserAuthentication::class);
        $userAuthentication->getUser()->willReturn(factory(User::class)->create());

        $request = $this->prophesize(Request::class);
        $request->has('called')->shouldNotBeCalled();

        $middleware = new RedirectIfAuthenticated($userAuthentication->reveal());
        $result = $middleware->handle($request->reveal(), function($request) {
            $request->has('called');
        });

        $this->assertInstanceOf(RedirectResponse::class, $result);
        $this->assertEquals(config('app.url'), $result->getTargetUrl());

    }

    /** @test */
    public function handle_calls_the_callback_if_not_authenticated(){
        $userAuthentication = $this->prophesize(UserAuthentication::class);
        $userAuthentication->getUser()->willReturn(null);

        $request = $this->prophesize(Request::class);
        $request->has('called')->shouldBeCalled();

        $middleware = new RedirectIfAuthenticated($userAuthentication->reveal());
        $middleware->handle($request->reveal(), function($request) {
            $request->has('called');
        });
    }

}

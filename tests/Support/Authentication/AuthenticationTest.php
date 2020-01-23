<?php

namespace BristolSU\Playground\Tests\Support\Authentication;

use BristolSU\Playground\Support\Authentication\Authentication;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\User\Contracts\UserAuthentication;
use BristolSU\Support\User\User;

class AuthenticationTest extends TestCase
{

    /** @test */
    public function get_user_gets_the_user_from_the_database_user(){
        $user = $this->newUser();
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);

        $databaseAuth = $this->prophesize(UserAuthentication::class);
        $databaseAuth->getUser()->shouldBeCalled()->willReturn($databaseUser);

        $userRepository = $this->prophesize(\BristolSU\ControlDB\Contracts\Repositories\User::class);
        $userRepository->getById($user->id())->shouldBeCalled()->willReturn($user);

        $authentication = new Authentication($databaseAuth->reveal(), $userRepository->reveal());
        $resolvedUser = $authentication->getUser();

        $this->assertInstanceOf(\BristolSU\ControlDB\Contracts\Models\User::class, $resolvedUser);
        $this->assertModelEquals($user, $resolvedUser);
    }

    /** @test */
    public function get_user_returns_null_if_no_database_user_logged_in(){

        $databaseAuth = $this->prophesize(UserAuthentication::class);
        $databaseAuth->getUser()->shouldBeCalled()->willReturn(null);

        $userRepository = $this->prophesize(\BristolSU\ControlDB\Contracts\Repositories\User::class);

        $authentication = new Authentication($databaseAuth->reveal(), $userRepository->reveal());
        $this->assertNull($authentication->getUser());
    }

    /** @test */
    public function set_user_throws_an_exception(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('No implementation');
        $authentication = resolve(Authentication::class);
        $authentication->setUser($this->newUser());
    }

    /** @test */
    public function get_group_returns_null(){
        $authentication = resolve(Authentication::class);
        $this->assertNull($authentication->getGroup());
    }

    /** @test */
    public function set_group_throws_an_exception(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('No implementation');
        $authentication = resolve(Authentication::class);
        $authentication->setGroup($this->newGroup());
    }

    /** @test */
    public function get_role_returns_null(){
        $authentication = resolve(Authentication::class);
        $this->assertNull($authentication->getRole());
    }

    /** @test */
    public function set_role_throws_an_exception(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('No implementation');
        $authentication = resolve(Authentication::class);
        $authentication->setRole($this->newRole());
    }

    /** @test */
    public function reset_throws_an_exception(){
        $authentication = resolve(Authentication::class);
        $this->assertNull($authentication->reset());

    }

}

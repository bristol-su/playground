<?php

namespace BristolSU\Playground\Tests\Support\Authentication;

use BristolSU\ControlDB\Contracts\Models\Group;
use BristolSU\Playground\Support\Authentication\Authentication;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\Activity\Activity;
use BristolSU\Support\User\Contracts\UserAuthentication;
use BristolSU\Support\User\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;

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

        $activity = Activity::factory()->create();
        $this->instance(Activity::class, $activity);
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

        $activity = Activity::factory()->create();
        $this->instance(Activity::class, $activity);
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
    public function set_group_throws_an_exception(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('No implementation');
        $authentication = resolve(Authentication::class);
        $authentication->setGroup($this->newGroup());
    }

    /** @test */
    public function set_role_throws_an_exception(){
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('No implementation');
        $authentication = resolve(Authentication::class);
        $authentication->setRole($this->newRole());
    }

    /** @test */
    public function reset_returns_null(){
        $authentication = resolve(Authentication::class);
        $this->assertNull($authentication->reset());
    }

    /** @test */
    public function getGroup_returns_a_group_the_user_is_a_member_of_if_the_activity_is_a_group_activity(){
        $user = $this->newUser();
        $group = $this->newGroup();
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);
        $this->be($databaseUser);

        DB::table('control_group_user')->insert([
            'user_id' => $user->id(),
            'group_id' => $group->id()
        ]);

        $activity = Activity::factory()->create(['activity_for' => 'group']);
        $this->instance(Activity::class, $activity);
        $authentication = resolve(Authentication::class);
        $resolvedGroup = $authentication->getGroup();
        $this->assertInstanceOf(\BristolSU\ControlDB\Models\Group::class, $resolvedGroup);
        $this->assertModelEquals($group, $resolvedGroup);
    }

    /** @test */
    public function getGroup_returns_null_if_the_activity_is_a_user_activity(){
        $user = $this->newUser();
        $group = $this->newGroup();
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);
        $this->be($databaseUser);

        DB::table('control_group_user')->insert([
            'user_id' => $user->id(),
            'group_id' => $group->id()
        ]);

        $activity = Activity::factory()->create(['activity_for' => 'user']);
        $this->instance(Activity::class, $activity);
        $authentication = resolve(Authentication::class);
        $resolvedGroup = $authentication->getGroup();
        $this->assertNull($resolvedGroup);
    }

    /** @test */
    public function getGroup_returns_the_group_belonging_to_a_role_if_the_activity_is_a_role_activity(){
        $user = $this->newUser();
        $group = $this->newGroup();
        $role = $this->newRole(['group_id' => $group->id()]);
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);
        $this->be($databaseUser);

        DB::table('control_role_user')->insert([
            'user_id' => $user->id(),
            'role_id' => $role->id()
        ]);

        $activity = Activity::factory()->create(['activity_for' => 'role']);
        $this->instance(Activity::class, $activity);
        $authentication = resolve(Authentication::class);
        $resolvedRole = $authentication->getRole();
        $this->assertInstanceOf(\BristolSU\ControlDB\Models\Role::class, $resolvedRole);
        $this->assertModelEquals($role, $resolvedRole);

        $resolvedGroup = $authentication->getGroup();
        $this->assertInstanceOf(\BristolSU\ControlDB\Models\Group::class, $resolvedGroup);
        $this->assertModelEquals($group, $resolvedGroup);

        $this->assertModelEquals($resolvedGroup, $resolvedRole->group());
    }

    /** @test */
    public function getGroup_creates_a_group_if_the_user_has_no_memberships(){
        $user = $this->newUser();
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);
        $this->be($databaseUser);

        $activity = Activity::factory()->create(['activity_for' => 'group']);
        $this->instance(Activity::class, $activity);
        $authentication = resolve(Authentication::class);
        $resolvedGroup = $authentication->getGroup();
        $this->assertInstanceOf(\BristolSU\ControlDB\Models\Group::class, $resolvedGroup);

        $this->assertDatabaseHas('control_group_user', [
            'group_id' => $resolvedGroup->id(),
            'user_id' => $user->id()
        ]);
    }

    /** @test */
    public function getRole_returns_a_role_the_user_is_part_of_if_the_activity_is_a_role_activity(){
        $user = $this->newUser();
        $role = $this->newRole();
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);
        $this->be($databaseUser);

        DB::table('control_role_user')->insert([
            'user_id' => $user->id(),
            'role_id' => $role->id()
        ]);

        $activity = Activity::factory()->create(['activity_for' => 'role']);
        $this->instance(Activity::class, $activity);
        $authentication = resolve(Authentication::class);
        $resolvedRole = $authentication->getRole();
        $this->assertInstanceOf(\BristolSU\ControlDB\Models\Role::class, $resolvedRole);
        $this->assertModelEquals($role, $resolvedRole);
    }

    /** @test */
    public function getRole_returns_null_if_the_activity_is_a_user_activity(){
        $user = $this->newUser();
        $role = $this->newRole();
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);
        $this->be($databaseUser);

        DB::table('control_role_user')->insert([
            'user_id' => $user->id(),
            'role_id' => $role->id()
        ]);

        $activity = Activity::factory()->create(['activity_for' => 'user']);
        $this->instance(Activity::class, $activity);
        $authentication = resolve(Authentication::class);
        $resolvedRole = $authentication->getRole();
        $this->assertNull($resolvedRole);
    }

    /** @test */
    public function getRole_returns_null_if_the_activity_is_a_group_activity(){
        $user = $this->newUser();
        $role = $this->newRole();
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);
        $this->be($databaseUser);

        DB::table('control_role_user')->insert([
            'user_id' => $user->id(),
            'role_id' => $role->id()
        ]);

        $activity = Activity::factory()->create(['activity_for' => 'group']);
        $this->instance(Activity::class, $activity);
        $authentication = resolve(Authentication::class);
        $resolvedRole = $authentication->getRole();
        $this->assertNull($resolvedRole);
    }


    /** @test */
    public function getRole_creates_a_role_if_the_user_has_no_roles(){
        $user = $this->newUser();
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);
        $this->be($databaseUser);

        $activity = Activity::factory()->create(['activity_for' => 'role']);
        $this->instance(Activity::class, $activity);
        $authentication = resolve(Authentication::class);
        $resolvedRole = $authentication->getRole();
        $this->assertInstanceOf(\BristolSU\ControlDB\Models\Role::class, $resolvedRole);

        $this->assertDatabaseHas('control_role_user', [
            'role_id' => $resolvedRole->id(),
            'user_id' => $user->id()
        ]);
    }

    /** @test */
    public function getRole_creates_a_role_if_the_user_has_no_roles_and_no_activity_given(){
        $user = $this->newUser();
        $databaseUser = factory(User::class)->create(['control_id' => $user->id()]);
        $this->be($databaseUser);

        $activity = Activity::factory()->create(['activity_for' => 'role']);

        $route = $this->prophesize(Route::class);
        $route->hasParameter('activity_slug')->willReturn(true);
        $route->parameter('activity_slug')->willReturn($activity);

        $request = Request::create('/', 'GET');
        $request->setRouteResolver(function() use ($route) {
            return $route->reveal();
        });

        \Illuminate\Support\Facades\Request::swap($request);

        $authentication = resolve(Authentication::class);
        $resolvedRole = $authentication->getRole();
        $this->assertInstanceOf(\BristolSU\ControlDB\Models\Role::class, $resolvedRole);

        $this->assertDatabaseHas('control_role_user', [
            'role_id' => $resolvedRole->id(),
            'user_id' => $user->id()
        ]);
    }


}

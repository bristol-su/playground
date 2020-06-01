<?php

namespace BristolSU\Playground\Tests\Support\Authentication;

use BristolSU\ControlDB\Models\DataUser;
use BristolSU\Playground\Support\Authentication\UserProvider;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\User\Contracts\UserRepository;
use BristolSU\Support\User\User;
use Illuminate\Support\Facades\Hash;

class UserProviderTest extends TestCase
{

    /** @test */
    public function retrieveById_returns_the_correct_user_if_no_user_found(){
        $user = factory(User::class)->create();

        $provider = new UserProvider(app(UserRepository::class));

        $userFromRepo = $provider->retrieveById($user->id);
        $this->assertInstanceOf(User::class, $userFromRepo);
        $this->assertModelEquals($user, $userFromRepo);
    }

    /** @test */
    public function retrieveById_returns_null_if_no_user_found(){
        $provider = new UserProvider(app(UserRepository::class));

        $this->assertNull($provider->retrieveById(1));
    }

    /** @test */
    public function retrieveByToken_returns_a_user_if_their_id_and_token_matches(){
        $user = factory(User::class)->create(['remember_token' => 'abc123']);

        $provider = new UserProvider(app(UserRepository::class));

        $userFromRepo = $provider->retrieveByToken($user->id, 'abc123');
        $this->assertInstanceOf(User::class, $userFromRepo);
        $this->assertModelEquals($user, $userFromRepo);
    }

    /** @test */
    public function retrieveByToken_returns_null_if_their_remember_token_is_wrong(){
        $user = factory(User::class)->create(['remember_token' => 'abc123']);

        $provider = new UserProvider(app(UserRepository::class));

        $this->assertNull($provider->retrieveByToken($user->id, 'abc1234'));
    }

    /** @test */
    public function retrieveByToken_returns_null_if_their_id_is_wrong(){
        $user = factory(User::class)->create(['remember_token' => 'abc123']);

        $provider = new UserProvider(app(UserRepository::class));

        $wrongId = ((int) $user->id) + 1;
        $this->assertNull($provider->retrieveByToken($wrongId, 'abc123'));
    }

    /** @test */
    public function retrieveByToken_returns_null_if_their_id_and_remember_token_is_wrong(){
        $user = factory(User::class)->create(['remember_token' => 'abc123']);

        $provider = new UserProvider(app(UserRepository::class));

        $wrongId = ((int) $user->id) + 1;
        $this->assertNull($provider->retrieveByToken($wrongId, 'abc1234'));
    }

    /** @test */
    public function updateRememberToken_updates_the_remember_token_of_a_user(){
        $user = factory(User::class)->create(['remember_token' => 'abc123']);

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'remember_token' => 'abc123'
        ]);

        $provider = new UserProvider(app(UserRepository::class));
        $provider->updateRememberToken($user, '123abc');

        $this->assertDatabaseHas('users', [
            'id' => $user->id,
            'remember_token' => '123abc'
        ]);
    }

    /** @test */
    public function retrieveByCredentials_returns_null_if_no_data_user_found_with_the_given_email(){
        $provider = new UserProvider(app(UserRepository::class));
        $this->assertNull($provider->retrieveByCredentials(['email' => 'email@email.com']));
    }

    /** @test */
    public function retrieveByCredentials_returns_null_if_no_control_user_found_with_the_given_data_user(){
        $dataUser = factory(DataUser::class)->create(['email' => 'email@email.com']);

        $provider = new UserProvider(app(UserRepository::class));
        $this->assertNull($provider->retrieveByCredentials(['email' => 'email@email.com']));
    }

    /** @test */
    public function retrieveByCredentials_returns_null_if_no_database_user_found_with_the_given_control_user(){
        $dataUser = factory(DataUser::class)->create(['email' => 'email@email.com']);
        $controlUser = factory(\BristolSU\ControlDB\Models\User::class)->create(['data_provider_id' => $dataUser->id()]);

        $provider = new UserProvider(app(UserRepository::class));
        $this->assertNull($provider->retrieveByCredentials(['email' => 'email@email.com']));
    }

    /** @test */
    public function retrieveByCredentials_returns_a_user_with_the_correct_email(){
        $dataUser = factory(DataUser::class)->create(['email' => 'email@email.com']);
        $controlUser = factory(\BristolSU\ControlDB\Models\User::class)->create(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['control_id' => $controlUser->id()]);

        $provider = new UserProvider(app(UserRepository::class));
        $userFromProvider = $provider->retrieveByCredentials(['email' => 'email@email.com']);

        $this->assertInstanceOf(User::class, $userFromProvider);
        $this->assertModelEquals($databaseUser, $userFromProvider);
    }

    /** @test */
    public function validateCredentials_returns_true_if_the_password_is_correct(){
        $user = factory(User::class)->create(['remember_token' => 'abc123', 'password' => Hash::make('secret1')]);

        $provider = new UserProvider(app(UserRepository::class));

        $this->assertTrue($provider->validateCredentials($user, ['password' => 'secret1']));
    }

    /** @test */
    public function validateCredentials_returns_false_if_the_password_is_incorrect(){
        $user = factory(User::class)->create(['remember_token' => 'abc123', 'password' => Hash::make('secret1')]);

        $provider = new UserProvider(app(UserRepository::class));

        $this->assertFalse($provider->validateCredentials($user, ['password' => 'secret12']));
    }
}

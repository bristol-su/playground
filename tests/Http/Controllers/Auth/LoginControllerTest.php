<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Auth;

use BristolSU\ControlDB\Models\DataUser;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\User\Contracts\UserAuthentication;
use BristolSU\Support\User\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginControllerTest extends TestCase
{

    /** @test */
    public function a_user_is_logged_in_given_the_correct_credentials(){
        $dataUser = factory(DataUser::class)->create(['email' => 'myemail@email.com']);
        $controlUser = $this->newUser(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['password' => Hash::make('secretpw'), 'control_id' => $controlUser->id()]);

        $response = $this->post('/login', [
            'email' => 'myemail@email.com',
            'password' => 'secretpw'
        ]);

        $response->assertRedirect('/');
        $this->assertAuthenticatedAs($databaseUser);
        $this->assertModelEquals($databaseUser, app(UserAuthentication::class)->getUser());
    }

    /** @test */
    public function a_user_is_not_logged_in_if_their_password_is_wrong(){
        $dataUser = factory(DataUser::class)->create(['email' => 'myemail@email.com']);
        $controlUser = $this->newUser(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['password' => Hash::make('secretpw'), 'control_id' => $controlUser->id()]);

        $response = $this->post('/login', [
            'email' => 'myemail@email.com',
            'password' => 'secretpw1'
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertNull(app(UserAuthentication::class)->getUser());
    }

    /** @test */
    public function a_user_is_not_logged_in_if_their_email_is_not_found(){
        $response = $this->post('/login', [
            'email' => 'myemail@email.com',
            'password' => 'secretpw'
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertNull(app(UserAuthentication::class)->getUser());
    }

}

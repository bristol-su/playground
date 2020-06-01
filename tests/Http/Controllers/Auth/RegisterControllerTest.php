<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Auth;

use BristolSU\ControlDB\Models\DataUser;
use BristolSU\ControlDB\Models\User;
use BristolSU\Playground\Tests\TestCase;

class RegisterControllerTest extends TestCase
{

    /** @test */
    public function a_user_can_register(){
        $response = $this->post('/register', [
            'first_name' => 'TestName1',
            'last_name' => 'TestName2',
            'email' => 'email@email.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);

        $response->assertRedirect('/');
        $this->assertDatabaseHas('control_data_user', [
            'first_name' => 'TestName1',
            'last_name' => 'TestName2',
            'preferred_name' => 'TestName1 TestName2',
            'email' => 'email@email.com'
        ]);

        $this->assertDatabaseHas('control_users', [
            'data_provider_id' => DataUser::where('first_name', 'TestName1')->firstOrFail()->id()
        ]);

        $this->assertDatabaseHas('users', [
            'control_id' => User::where('data_provider_id',
                DataUser::where('first_name', 'TestName1')->firstOrFail()->id()
            )->firstOrFail()->id()
        ]);
    }

    /** @test */
    public function an_email_is_required(){
        $response = $this->post('/register', [
            'first_name' => 'TestName1',
            'last_name' => 'TestName2',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);
        $response->assertSessionHasErrors(['email']);
    }

    /** @test */
    public function a_first_name_is_required(){
        $response = $this->post('/register', [
            'email' => 'test@test.com',
            'last_name' => 'TestName2',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);
        $response->assertSessionHasErrors(['first_name']);
    }

    /** @test */
    public function a_last_name_is_required(){
        $response = $this->post('/register', [
            'email' => 'test@test.com',
            'first_name' => 'TestName2',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);
        $response->assertSessionHasErrors(['last_name']);
    }

    /** @test */
    public function a_password_is_required(){
        $response = $this->post('/register', [
            'first_name' => 'TestName1',
            'last_name' => 'TestName2',
            'email' => 'test@test.com',
        ]);
        $response->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function password_must_be_confirmed(){
        $response = $this->post('/register', [
            'first_name' => 'TestName1',
            'last_name' => 'TestName2',
            'email' => 'test@test.com',
            'password' => 'abc123',
            'password_confirmation' => '123abc'
        ]);
        $response->assertSessionHasErrors(['password']);
    }

    /** @test */
    public function the_email_must_be_unique(){
        $dataUser = factory(DataUser::class)->create(['email' => 'email@email.com']);

        $response = $this->post('/register', [
            'first_name' => 'TestName1',
            'last_name' => 'TestName2',
            'email' => 'email@email.com',
            'password' => 'secret',
            'password_confirmation' => 'secret',
        ]);
        $response->assertSessionHasErrors('email');
        $this->assertEquals(1, DataUser::all()->count());
    }



}

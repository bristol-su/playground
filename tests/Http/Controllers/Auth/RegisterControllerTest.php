<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Auth;

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
            'email' => 'email@email.com'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'email@email.com'
        ]);

    }

}

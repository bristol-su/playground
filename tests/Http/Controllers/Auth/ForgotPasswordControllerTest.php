<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Auth;

use BristolSU\ControlDB\Models\DataUser;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\User\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;

class ForgotPasswordControllerTest extends TestCase
{

    /** @test */
    public function an_email_is_sent_when_a_password_reset_is_requested(){
        Notification::fake();

        $dataUser = factory(DataUser::class)->create(['email' => 'myemail@email.com']);
        $controlUser = $this->newUser(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['password' => Hash::make('secretpw'), 'control_id' => $controlUser->id()]);

        $response = $this->post('/password/email', [
            'email' => 'myemail@email.com'
        ]);

        Notification::assertSentTo($databaseUser, ResetPassword::class);
    }

    /** @test */
    public function an_error_is_returned_if_no_email_found(){
        $response = $this->post('/password/email', [
            'email' => 'tt@tt.com'
        ]);

        $response->assertSessionHasErrors('email');
    }

}

<?php

namespace BristolSU\Playground\Tests\Http\Controllers\Auth;

use BristolSU\ControlDB\Models\DataUser;
use BristolSU\Playground\Tests\TestCase;
use BristolSU\Support\User\User;
use Carbon\Carbon;
use Illuminate\Contracts\Hashing\Hasher;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ResetPasswordControllerTest extends TestCase
{

    /** @test */
    public function a_password_can_be_reset(){
        $dataUser = DataUser::factory()->create(['email' => 'myemail@email.com']);
        $controlUser = $this->newUser(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['password' => Hash::make('secretpw'), 'control_id' => $controlUser->id()]);

        $this->assertTrue(Hash::check('secretpw', $databaseUser->password));

        DB::table('password_resets')->insert([
            'email' => 'myemail@email.com',
            'token' => Hash::make('abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz'),
            'created_at' => Carbon::now()
        ]);

        $response = $this->post('/password/reset', [
            'token' => 'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz',
            'email' => 'myemail@email.com',
            'password' => 'secret1',
            'password_confirmation' => 'secret1'
        ]);

        $response->assertSessionHasNoErrors();
        $this->assertAuthenticatedAs($databaseUser);

        $this->assertTrue(Hash::check('secret1', User::findOrFail($databaseUser->id)->password));
    }

    /** @test */
    public function password_is_not_reset_if_the_token_is_wrong(){
        $dataUser = DataUser::factory()->create(['email' => 'myemail@email.com']);
        $controlUser = $this->newUser(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['password' => Hash::make('secretpw'), 'control_id' => $controlUser->id()]);

        $this->assertTrue(Hash::check('secretpw', $databaseUser->password));

        DB::table('password_resets')->insert([
            'email' => 'myemail@email.com',
            'token' => Hash::make('abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz'),
            'created_at' => Carbon::now()
        ]);

        $response = $this->post('/password/reset', [
            'token' => 'NOTTHECORRECTTOKEN',
            'email' => 'myemail@email.com',
            'password' => 'secret1',
            'password_confirmation' => 'secret1'
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();

        $this->assertTrue(Hash::check('secretpw', User::findOrFail($databaseUser->id)->password));
    }

    /** @test */
    public function password_is_not_reset_if_the_token_is_not_given(){
        $dataUser = DataUser::factory()->create(['email' => 'myemail@email.com']);
        $controlUser = $this->newUser(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['password' => Hash::make('secretpw'), 'control_id' => $controlUser->id()]);

        $this->assertTrue(Hash::check('secretpw', $databaseUser->password));

        DB::table('password_resets')->insert([
            'email' => 'myemail@email.com',
            'token' => Hash::make('abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz'),
            'created_at' => Carbon::now()
        ]);

        $response = $this->post('/password/reset', [
            'email' => 'myemail@email.com',
            'password' => 'secret1',
            'password_confirmation' => 'secret1'
        ]);

        $response->assertSessionHasErrors('token');
        $this->assertGuest();
        $this->assertTrue(Hash::check('secretpw', User::findOrFail($databaseUser->id)->password));
    }

    /** @test */
    public function password_is_not_reset_if_email_is_not_given(){
        $dataUser = DataUser::factory()->create(['email' => 'myemail@email.com']);
        $controlUser = $this->newUser(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['password' => Hash::make('secretpw'), 'control_id' => $controlUser->id()]);

        $this->assertTrue(Hash::check('secretpw', $databaseUser->password));

        DB::table('password_resets')->insert([
            'email' => 'myemail@email.com',
            'token' => Hash::make('abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz'),
            'created_at' => Carbon::now()
        ]);

        $response = $this->post('/password/reset', [
            'token' => 'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz',
            'password' => 'secret1',
            'password_confirmation' => 'secret1'
        ]);

        $response->assertSessionHasErrors('email');
        $this->assertGuest();
        $this->assertTrue(Hash::check('secretpw', User::findOrFail($databaseUser->id)->password));
    }

    /** @test */
    public function password_is_not_reset_if_password_is_not_given(){
        $dataUser = DataUser::factory()->create(['email' => 'myemail@email.com']);
        $controlUser = $this->newUser(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['password' => Hash::make('secretpw'), 'control_id' => $controlUser->id()]);

        $this->assertTrue(Hash::check('secretpw', $databaseUser->password));

        DB::table('password_resets')->insert([
            'email' => 'myemail@email.com',
            'token' => Hash::make('abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz'),
            'created_at' => Carbon::now()
        ]);

        $response = $this->post('/password/reset', [
            'token' => 'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz',
            'email' => 'myemail@email.com',
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
        $this->assertTrue(Hash::check('secretpw', User::findOrFail($databaseUser->id)->password));
    }

    /** @test */
    public function password_is_not_reset_if_password_is_not_confirmed() {
        $dataUser = DataUser::factory()->create(['email' => 'myemail@email.com']);
        $controlUser = $this->newUser(['data_provider_id' => $dataUser->id()]);
        $databaseUser = factory(User::class)->create(['password' => Hash::make('secretpw'), 'control_id' => $controlUser->id()]);

        $this->assertTrue(Hash::check('secretpw', $databaseUser->password));

        DB::table('password_resets')->insert([
            'email' => 'myemail@email.com',
            'token' => Hash::make('abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz'),
            'created_at' => Carbon::now()
        ]);

        $response = $this->post('/password/reset', [
            'token' => 'abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz',
            'email' => 'myemail@email.com',
            'password' => 'secret1',
            'password_confirmation' => 'secret12'
        ]);

        $response->assertSessionHasErrors('password');
        $this->assertGuest();
        $this->assertTrue(Hash::check('secretpw', User::findOrFail($databaseUser->id)->password));
    }

}

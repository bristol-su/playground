<?php

namespace BristolSU\Playground\Http\Controllers\Auth;

use BristolSU\Playground\Http\Controllers\Controller;
use BristolSU\Playground\User;
use BristolSU\ControlDB\Contracts\Repositories\DataUser;
use BristolSU\Support\User\Contracts\UserRepository;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \BristolSU\Support\User\User
     */
    protected function create(array $data)
    {
        $dataUser = app(DataUser::class)->create($data['first_name'], $data['last_name'], $data['email']);
        $controlUser = app(\BristolSU\ControlDB\Contracts\Repositories\User::class)->create($dataUser->id());

        $databaseUser = app(UserRepository::class)->create([
            'control_id' => $controlUser->id()
        ]);
        $databaseUser->email_verified_at = Carbon::now();
        $databaseUser->password = Hash::make($data['password']);
        $databaseUser->save();
        return $databaseUser;

    }
}

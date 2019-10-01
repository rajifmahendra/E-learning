<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/home';

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
        //     'name' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password' => ['required', 'string', 'min:8', 'confirmed'],
        // ]);
        'nama' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'max:255'],
        'nohandphone' => ['required', 'string', 'max:25'],
        'noinduk' => ['required', 'string',  'max:11', 'unique:master_data'],
        'password' => ['required', 'string', 'min:8', 'confirmed'],
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            // 'name' => $data['name'],
            // 'email' => $data['email'],
            // 'password' => Hash::make($data['password']),
            'nama' => $data['nama'],
            'noinduk' => $data['noinduk'],
            'email' => $data['email'],
            'master_jabatan_id' => $data['master_jabatan_id'],
            'master_gender_id' => $data['master_gender_id'],
            'master_agama_id' => $data['master_agama_id'],
            'master_status_id' => 1,
            'nohandphone' => $data['nohandphone'],
            'lahir' => $data['lahir'],
            'alamat' => $data['alamat'],
            'password' => Hash::make($data['password']),
        ]);
        // ]);
    }
}

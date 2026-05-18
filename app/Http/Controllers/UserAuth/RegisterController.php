<?php

namespace App\Http\Controllers\UserAuth;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Traits\UserAuth\RegisterUsers;


class RegisterController extends Controller
{
    use RegisterUsers;

    protected $redirectTo = "/";

    public static function middlewares(): array
    {
        return ['guest:user'];
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email'=> ['required', 'string','email', 'max:255', 'unique:users'],
            'password' => ['required', 'string','min:1', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }


}

<?php

namespace App\Routing;

use App\Http\Controllers\UserAuth\LoginController;
use App\Http\Controllers\UserAuth\RegisterController;
use Illuminate\Support\Facades\Route;

class UserAuthMethods
{
    public function user_auth()
    {
        return function () {
            // ログイン
            Route::get('/login', [LoginController::class, 'showLoginForm'])  ->name('user-auth.login');
            Route::post('/login', [LoginController::class, 'login'])         ->name('user-auth.login');

            // ユーザ登録
            Route::get('/user-auth/register', [RegisterController::class, 'showForm'])   ->name('user-auth.register');
            Route::post('/user-auth/register', [RegisterController::class, 'register'])  ->name('user-auth.register');
        };
    }
}
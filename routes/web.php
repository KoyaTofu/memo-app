<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserAuth\RegisterController;
use App\Http\Controllers\UserAuth\LoginController;

Route::get('/', function () {
    return view('home');
})->name('home');

#region 認証用ユーザ登録
Route::get('/user-auth/register', [RegisterController::class, 'showForm'])
    ->name('user-auth.register');

Route::post('/user-auth/register', [RegisterController::class, 'register'])
    ->name('user-auth.register');
#endregion

#region ログイン
Route::get('/user-auth/login', [LoginController::class, 'showLoginForm'])
    ->name('user-auth.login');

Route::post('/user-auth/login', [LoginController::class, 'login'])
    ->name('user-auth.login');
#endregion


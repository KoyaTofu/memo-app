<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserAuth\RegisterController;

Route::get('/', function () {
    return view('home');
}) ->name('home');

// 認証用ユーザ登録
Route::get('/user-auth/register', [RegisterController::class, 'showForm'])
    ->name('user-auth.register');

Route::post('/user-auth/register', [RegisterController::class, 'register'])
    ->name('user-auth.register');

// ------------------------------



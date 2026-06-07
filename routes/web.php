<?php

use Illuminate\Support\Facades\Route;

Route::user_auth();

Route::get('/', function () {
    return view('home');
})->name('home');


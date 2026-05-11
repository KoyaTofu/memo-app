<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
}) ->name('home');

Route::get('/login', function () {
    return view('home');
}) ->name('login');

Route::get('/memos/create', function () {
    return view('home');
})->name('memos.create');

Route::get('/memos/{id}/edit', function ($id) {
    return view('home');
})->name('memos.edit');

Route::get('/memos/{id}/delete', function ($id) {
    return view('home');
})->name('memos.delete');
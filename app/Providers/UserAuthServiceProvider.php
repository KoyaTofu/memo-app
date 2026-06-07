<?php

namespace App\Providers;

use App\Routing\UserAuthMethods;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class UserAuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::mixin( new UserAuthMethods );
    }
}


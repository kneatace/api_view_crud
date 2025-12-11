<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserWebController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('users', UserWebController::class);

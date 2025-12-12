<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserApiController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/users', [UserApiController::class, 'index']);
Route::post('/users/create', [UserApiController::class, 'store']);
Route::put('/users/{id}', [UserApiController::class, 'update']);
Route::delete('users/{id}', [UserApiController::class, 'destroy']);
Route::get('/users/{id}', [UserApiController::class, 'show']);

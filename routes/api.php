<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\Test;
use Illuminate\Support\Facades\Route;

Route::post('signup', [AuthController::class, 'signup']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/send-email', [Test::class, 'sendEmail']);

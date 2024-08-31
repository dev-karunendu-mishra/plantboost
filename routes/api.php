<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Test;

Route::get('/send-email', [Test::class, 'sendEmail']);


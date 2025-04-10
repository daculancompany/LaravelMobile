<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return response()->json([
        'error' => 'Login required to continue'
    ], 401); // 401 Unauthorized
})->name('login');
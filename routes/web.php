<?php

use Illuminate\Support\Facades\Route;
// Homepage

// Halaman Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Halaman Register
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::get('/', function () {
    return view('Admin.Product.Index');
});
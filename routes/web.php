<?php

use Illuminate\Support\Facades\Route;

// Halaman Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

// Halaman Registrasi
Route::get('/register', function () {
    return view('auth.register');
})->name('register');

// Halaman Beranda
Route::get('/', function () {
    return redirect()->route('login');
});

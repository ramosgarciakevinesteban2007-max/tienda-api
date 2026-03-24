<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/consultar', function () {
    $user = new \App\Models\User();
    return dd($user->all());
});

Route::get('/insertar', function () {
    $user = new \App\Models\User();
    $user->name = 'Otro EJ';
    $user->email = 'otro@mail.com';
    $user->password = 'mypassword';
    $user->save();
    return dd($user);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/products', [App\Http\Controllers\ProductController::class, 'index'])->name('products.list');

Route::get('/checkout', function () {
    return view('checkout');
});
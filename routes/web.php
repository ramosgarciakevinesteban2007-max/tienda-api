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
    $user->name = 'Kevin';
    $user->email = 'kevin2098@example.com';
    $user->password = '75571452g.';
    $user->save();
    return dd($user);
});
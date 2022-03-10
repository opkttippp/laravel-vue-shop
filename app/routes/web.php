<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo('Hello working Boris !!');
});

Route::get('/greeting', function () {
    return view('green');
});

Route::get('/user/{id}/{name}', function ($id, $name) {
    return view('user', ['id' => $id, 'name' => $name]);
});

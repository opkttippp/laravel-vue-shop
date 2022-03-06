<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    echo('Hello work !!');
});

Route::get('/user', function () {
    echo 'Привет Анатолий';
});

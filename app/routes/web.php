<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'home']);

Route::get('/greeting', [MainController::class, 'green']);

Route::get('/review', [MainController::class, 'review'])->name('review');

Route::post('/review/check', [MainController::class, 'check']);


Route::get('/user/{id}/{name}', function ($id, $name) {
    return view('user', ['id' => $id, 'name' => $name]);
});

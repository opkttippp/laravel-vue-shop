<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/greeting', [MainController::class, 'green'])->name('green');

Route::get('/review', [MainController::class, 'review'])->name('review');

Route::post('/review/check', [MainController::class, 'check'])->name('check');

Route::get('/message', [MainController::class, 'message'])->name('message');

Route::get('/message/{id}', [MainController::class, 'messageOne'])->name('messageOne');

Route::get('/message/{id}/update', [MainController::class, 'messageOneUpdate'])
    ->name('messageOneUpdate');

Route::post('/message/{id}/update', [MainController::class, 'messOneUpSub'])
    ->name('messOneUpSub');

Route::get('/message/{id}/delete', [MainController::class, 'messageOneDelete'])
    ->name('messageOneDelete');

//--------------------------------------------------------------
Route::get('/users', function () {
    return view('users', ['user' => 'hello!!']);
});
Route::get('/users', function () {
    return redirect()->route('message');
});
Route::get('/users/{id}/{data}', function ($id, $data) {
    return view('users', ['id' => $id, 'data' => $data]);
});




//--------------------------------------------------------------

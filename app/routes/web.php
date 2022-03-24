<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'home'])->name('home');

Route::get('/greeting', [MainController::class, 'green'])->name('green');

Route::get('/review/add', [MainController::class, 'reviewAdd'])->name('reviewAdd');

Route::post('/review/check', [MainController::class, 'check'])->name('check');

Route::get('/review', [MainController::class, 'review'])->name('review');

Route::get('/review/{id}', [MainController::class, 'reviewOne'])->name(
    'reviewOne'
);

Route::get('/review/{id}/update', [MainController::class, 'reviewOneUpdate'])
    ->name('reviewOneUpdate');

Route::post('/review/{id}/update', [MainController::class, 'reviewUpdate'])
    ->name('reviewUpdate');

Route::get('/review/{id}/delete', [MainController::class, 'reviewOneDelete'])
    ->name('reviewOneDelete');

//-------------------------Route------------------------------------------------
/*Route::get('/users', function () {
    return view('users', ['user' => 'hello!!']);
});

Route::get('/users', function () {
    return redirect()->route('message');
});

Route::get('/users/{id}/{data}', function ($id, $data) {
    return view('users', ['id' => $id, 'data' => $data]);
});

Route::match('get', '/city/{name?}', function ($name = 'Minsk') {
    echo $name . '!!';
})->where('name', '[a-z]+');*/
//----------------Ограничение параметров----------------------------------------
/*Route::match('get', '/city/{name?}', function ($name = 'Minsk') {
    echo $name . '!!';
})->whereAlpha('name');

Route::match('get', '/city/{name?}', function ($name = 'Minsk') {
    echo $name . '!!';
})->whereNumber('name');

Route::match('get', '/city/{name?}', function ($name = 'Minsk') {
    echo $name . '!!';
})->whereAlphaNumeric('name');*/
//--------------------Группировка Router----------------------------------------
/*Route::prefix('post')->group(function () {
    Route::get('/{name?}', function ($name = 'sanya') {
        return $name;
    })->whereAlpha('name');
    Route::get('/{id}', function ($id) {
        return $id;
    })->whereNumber('id');
});*/
//------------Удаление и переименование полей миграции--------------------------
/*Schema::table('posts', function (Blueprint $table) {
    $table->dropColumn(['name', 'desc']);
});*/
/*Schema::table('posts', function (Blueprint $table) {
    $table->renameColumn('name', 'title');
});*/
//--------------------------Foreign key-----------------------------------------
/*Schema::table('posts', function (Blueprint $table) {
    $table->unsignedBigInteger('user_id');

    $table->foreign('user_id')->references('id')->on('users');
});*/
//----------------------Коментарий----------------------------------------------
/*@unless ($isAuth)
  вы еще не авторизованы
@endunless*/
//{{--Coment--}}

Route::get('/posts', [PostController::class, 'show']);

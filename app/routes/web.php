<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;




//--------------------------------Roles--------------------------------------
Route::get('/admin/index', [RoleController::class, 'index']);
//----------------------------------------------------------------------
Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/greeting', [MainController::class, 'green'])->name('green');

Route::prefix('review')->group(function () {
//    Route::get('/', [MainController::class, 'review'])->name('review')->middleware('auth');
    Route::get('/', [MainController::class, 'review'])->name('review');
    ;
    Route::get('/add', [MainController::class, 'reviewAdd'])->name('reviewAdd');
    Route::post('/check', [MainController::class, 'check'])->name('check');
    Route::get('/{id}', [MainController::class, 'reviewOne'])->name('reviewOne');
    Route::get('/{id}/update', [MainController::class, 'reviewOneUpdate'])->name('reviewOneUpdate');
    Route::post('/{id}/update', [MainController::class, 'reviewUpdate'])->name('reviewUpdate');
    Route::get('/{id}/delete', [MainController::class, 'reviewOneDelete'])->name('reviewOneDelete');
});

Route::fallback(function () {
    echo "<img src='images/404-desktop-not-found.jpg'>";
});

//-------------------------email confirm-------------------------------------
Route::get('/verify/{token}', [RegisterController::class, 'verify'])->name('register.verify');
//-------------------------авторизация через соцсети-------------------------
Route::group(['middleware' => ['web']], function ($api) {
    Route::get('api/redirect/{service}', [SocialAuthController::class, 'redirectToProvider']);
    Route::get('api/callback/{service}', [SocialAuthController::class, 'handleProviderCallback']);
});
//Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
//Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);
//---------------------------------Route-------------------------------------



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

//Route::get('/posts', [PostController::class, 'show']);

Route::match(['post', 'get'], '/posts', [PostController::class, 'show'])->name(
    'posts'
);
Route::get('/post/show1', [PostController::class, 'show1'])->name('show1');
Route::get('/post/show2', [PostController::class, 'show2'])->name('show2');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

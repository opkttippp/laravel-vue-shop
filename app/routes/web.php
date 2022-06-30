<?php

use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;

//--------------------------------Roles-----------------------------------------
Route::group(
    ['prefix' => '/admin/roles', 'middleware' => ['role:manager|admin'], 'controller'  => RoleController::class],
    function () {
    //Route::prefix('/admin/roles')->controller(RoleController::class)->group(function () {
    Route::get('/', 'index')->middleware('can:show post');
    Route::get('/create', 'create')->name('rolesCreate')->middleware('can:add post');
    Route::post('/create', 'store')->name('rolesStore')->middleware('can:add post');
    Route::get('/update/{id}', 'edit')->name('rolesEdit')->middleware('can:edit post');
    Route::post('/update/{id}', 'update')->name('rolesUpdate')->middleware('can:edit post');
    Route::get('/delete/{id}', 'destroy')->middleware('can:delete post');
}
);

//--------------------------------Users----------------------------------------

Route::group(
    ['prefix' => '/admin/users', 'middleware' => ['role:admin'], 'controller' => UserController::class],
    function () {
    Route::get('/', 'index')->middleware('can:show post');
    Route::get('/update/{id}', 'edit')->name('usersEdit')->middleware('can:edit post');
    Route::post('/update/{id}', 'update')->name('usersUpdate')->middleware('can:edit post');
    Route::get('/delete/{id}', 'destroy')->middleware('can:delete post');
}
);

//---------------------------------Admin-LTE-----------------------------

Route::middleware(['role:admin'])->prefix('/admin')->group(function () {
    Route::get('/', [IndexController::class, 'index']);
});
//------------------------------------------------------------------------

Auth::routes();
Route::get('/logout', [LoginController::class, 'logout']);


Route::get('/', [MainController::class, 'home'])->name('home');
Route::get('/greeting', [MainController::class, 'green'])->name('green');

Route::group(
    ['prefix' => 'review', 'controller' => MainController::class],
    function () {
        Route::get('/', 'review')->name('review')->middleware('auth');
        Route::get('/add', 'reviewAdd')->name('reviewAdd')->middleware('auth');
        Route::post('/check', 'check')->name('check');
        Route::get('/{id}', 'reviewOne')->name('reviewOne');
        Route::get('/{id}/update', 'reviewOneUpdate')->name('reviewOneUpdate')->middleware('can:edit post');
        Route::post('/{id}/update', 'reviewUpdate')->name('reviewUpdate')->middleware('can:edit post');
        Route::get('/{id}/delete', 'reviewOneDelete')->name('reviewOneDelete');
    }
);

Route::fallback(function () {
    echo "<img src='images/404-desktop-not-found.jpg'>";
});

//-------------------------email confirm-------------------------------------
Route::get('/verify/{token}', [RegisterController::class, 'verify'])->name(
    'register.verify'
);
//-------------------------авторизация через соцсети-------------------------
Route::group(['middleware' => ['web']], function ($api) {
    Route::get('api/redirect/{service}', [SocialAuthController::class, 'redirectToProvider']);
    Route::get('api/callback/{service}', [SocialAuthController::class, 'handleProviderCallback']);
});
//Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
//Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);

//---------------------------------Route-------------------------------------
Route::resource('/product', ProductController::class)->parameters(['product' => 'id']);
Route::resource('/category', CategoryController::class);
//Route::get('/cart', [CategoryController::class, 'addToCart'])->name('cart.add');
Route::get('/catalog/show', [CategoryController::class, 'catalog'])->name('catalog.show');
Route::get('/catalog', [CategoryController::class, 'catalog'])->name('catalog.index');


//---------------------------------Cart--------------------------------------

Route::group(['prefix' => '/cart', 'controller' => CartController::class], function () {
    Route::get('/', 'index')->name('cart.index');
    Route::get('/add/{product_id}', 'add')->name('cart.add');

    Route::get('/update', 'update')->name('cart.update');
    Route::get('/drop', 'drop')->name('cart.drop');
    Route::get('/destroy', 'destroy')->name('cart.destroy');
    Route::get('/checkout', 'checkout')->name('cart.checkout');
//    Route::get('/cart/add/{product_id?}', [CartController::class,'add'])->name('cart.add');
});

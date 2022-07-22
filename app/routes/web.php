<?php

use App\Http\Controllers\Admin\ProdController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
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
        Route::get('/', 'index')->name('admin.roles.index')->middleware('can:show post');
        Route::get('/create', 'create')->name('admin.roles.create')->middleware('can:add post');
        Route::post('/create', 'store')->name('admin.roles.store')->middleware('can:add post');
        Route::get('/update/{id}', 'edit')->name('admin.roles.edit')->middleware('can:edit post');
        Route::put('/update/{id}', 'update')->name('admin.roles.update')->middleware('can:edit post');
        Route::get('/delete/{id}', 'destroy')->middleware('can:delete post');
    }
);

//--------------------------------Users----------------------------------------

Route::group(
    ['prefix' => '/admin/users', 'middleware' => ['role:admin|manager'], 'controller' => UserController::class],
    function () {
        Route::get('/', 'index')->name('admin.users.index')->middleware('can:show post');
        Route::get('/update/{user}', 'edit')->name('admin.users.edit')->middleware('can:edit post');
        Route::put('/update/{user}', 'update')->name('admin.users.update')->middleware('can:edit post');
        Route::get('/delete/{user}', 'destroy')->name('admin.users.delete')->middleware('can:delete post');
    }
);

//---------------------------------Admin-LTE-----------------------------

Route::middleware(['role:admin|manager'])->prefix('/admin')->group(function () {
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
Route::group(['middleware' => ['web']], function () {
    Route::get('api/redirect/{service}', [SocialAuthController::class, 'redirectToProvider']);
    Route::get('api/callback/{service}', [SocialAuthController::class, 'handleProviderCallback']);
});
//Route::get('auth/github', [GitHubController::class, 'gitRedirect']);
//Route::get('auth/github/callback', [GitHubController::class, 'gitCallback']);

//---------------------------------Route-------------------------------------
Route::resource('/product', ProductController::class)->parameters(['product' => 'id']);
Route::resource('/category', CategoryController::class);
Route::get('/catalog/show', [CategoryController::class, 'catalog'])->name('catalog.show');
Route::get('/catalog', [CategoryController::class, 'catalog'])->name('catalog.index');

//---------------------------------Cart----------------------------------------
Route::group(['prefix' => '/cart', 'controller' => CartController::class], function () {
    Route::get('/', 'index')->name('cart.index');
    Route::get('/add/{productId}', 'add')->name('cart.add');
    Route::patch('/update', 'update')->name('cart.update');
    Route::get('/drop{productId}', 'drop')->name('cart.drop');

    Route::get('/destroy', 'destroy')->name('cart.destroy');
    Route::get('/checkout', 'checkout')->name('cart.checkout');
    Route::get('/success/{orderId}', 'success')->name('cart.success');
});

//--------------------------------- Order --------------------------------------
route::resource('/order', OrderController::class, ['only' => ['store', 'update', 'destroy', 'show']]);

//--------------------------------Admin Products-------------------------------
Route::group(['prefix' => 'admin/product', 'controller' => ProdController::class], function () {
    Route::get('/', 'index')->name('admin.products.index');
    Route::get('create', 'create')->name('admin.products.create');
    Route::post('create', 'store')->name('admin.products.store');
    Route::get('edit/{product}', 'edit')->name('admin.products.edit');
    Route::put('edit/{product}', 'update')->name('admin.products.update');
    Route::get('delete/{product}', 'delete')->name('admin.products.delete');
    Route::get('drop/{id}', 'destroy')->name('admin.products.destroy');
    Route::get('restore/{id}', 'restore')->name('admin.products.restore');
});

//-------------------------------------Orders---------------------------------
Route::prefix('orders')->group(function () {
    Route::get('/', 'OrderController@index')->name('admin.orders.index');
    Route::get('show/{id}', 'OrdersController@show')->name('admin.orders.show');
    Route::get('delete/{id}', 'OrderController@delete')->name('admin.orders.delete');
});

<?php

use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ReviewApiController;
use App\Http\Controllers\Api\SearchApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\UserAuthApiController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/auth', function (Request $request) {
    return $request->user();
});


Route::apiResources([
    'user' => UserApiController::class,
]);

Route::apiResources([
    'products' => ProductApiController::class,
]);
Route::apiResources([
    'order' => OrderApiController::class,
]);

//Route::apiResources([
//    'auth' => UserAuthApiController::class,
//]);

//Route::middleware('auth')->get('/auth', function ()
Route::get('/auth', function () {
    return Auth::user() ?? User::findOrFail(4);
});

Route::apiResources([
    'review' => ReviewApiController::class,
]);
Route::post('/search', [SearchApiController::class, 'show']);

//Route::get('/{product}/review', [ReviewApiController::class, 'index']);

<?php

use App\Http\Controllers\Api\OrderApiController;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ReviewApiController;
use App\Http\Controllers\Api\SearchApiController;
use App\Http\Controllers\Api\UserApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/auth', function (Request $request) {
    return $request->user();
});


Route::apiResources([
    'products' => ProductApiController::class,
    'category' => CategoryApiController::class,
    'user' => UserApiController::class,
    'order' => OrderApiController::class,
    'review' => ReviewApiController::class,

]);

Route::get('/auth', function () {
    return Auth::user() ?? User::findOrFail(4);
});

Route::post('/search', [SearchApiController::class, 'show']);

//Route::get('/{product}/review', [ReviewApiController::class, 'index']);

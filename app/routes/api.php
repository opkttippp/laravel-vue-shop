<?php

use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\ReviewApiController;
use App\Http\Controllers\Api\SearchApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::apiResources([
    'user' => UserApiController::class,
]);
Route::apiResources([
    'products' => ProductApiController::class,
]);

Route::apiResources([
    'review' => ReviewApiController::class,
]);
Route::post('/search', [SearchApiController::class, 'show']);

Route::get('/{product}/review', [ReviewApiController::class, 'index']);

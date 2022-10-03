<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
    Route::get('user_profile', 'profile');
});

Route::middleware(['jwt.verify'])->group(function () {
    Route::controller(PostController::class)->group(function () {
        Route::get('posts', 'index');
        Route::get('post/{id}', 'show');
        Route::post('add_post', 'store');
        Route::post('edit_post/{id}', 'update');
        Route::post('delete_post/{id}', 'destroy');
    });
});

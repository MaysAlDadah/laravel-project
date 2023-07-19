<?php

use App\Http\Controllers\API\APIPostController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});
//
//Route::middleware(['auth:sanctum'])->group(function () {
//    Route::get('/posts', [APIPostController::class, 'index']);


Route::prefix('posts')->group(function () {
    Route::get('/api', [PostController::class, 'apiIndex'])->name('api.posts.index');
    Route::post('/', [PostController::class, 'apiStore'])->name('api.posts.store');
    Route::get('/{post}', [PostController::class, 'apiShow'])->name('api.posts.show');
    Route::put('/{post}', [PostController::class, 'apiUpdate'])->name('api.posts.update');
    Route::delete('/{post}', [PostController::class, 'apiDestroy'])->name('api.posts.destroy');
});

Route::group(['prefix' => 'users'], function () {
    Route::get('/', [UserController::class, 'apiIndex'])->name('api.users.index');
    Route::post('/', [UserController::class, 'apiStore'])->name('api.users.store');
    Route::get('/{user}', [UserController::class, 'apiShow'])->name('api.users.show');
    Route::put('/{user}', [UserController::class, 'apiUpdate'])->name('api.users.update');
    Route::delete('/{user}', [UserController::class, 'apiDestroy'])->name('api.users.destroy');
});

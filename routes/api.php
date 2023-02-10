<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\PostController;
use App\Http\Controllers\API\LoginController;
use App\Http\Controllers\API\registerController;

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


Route::group(['middleware' => 'guest'], function () {
    Route::post('/loginPost', LoginController::class);
    Route::post('/registerPost', registerController::class);
});
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('post.select');
Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::post('/addPost', [PostController::class, 'store']);
});

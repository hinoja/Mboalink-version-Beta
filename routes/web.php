<?php

use App\Http\Controllers\GetemailResetController;
use App\Http\Controllers\HistoriqueController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\updatePasswordController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// welcome
Route::view('/', 'welcome')->name('home');
Route::get('/post/show/{id}', [PostController::class, 'show'])->name('post.select');
// login
Route::group(['middleware' => 'guest'], function () {
    //ResetPassword
    Route::view('/loginr', 'loginPage')->name('login');
    Route::post('/loginPost', loginController::class)->name('loginPost');
    // Register
    Route::get('/register', [RegisterController::class, 'page'])->name('register');
    Route::post('/registerPost', [RegisterController::class, 'store'])->name('registerPost');
});
//Post
Route::group(['middleware' => 'auth'], function () {
    Route::view('/post', 'post.addPost')->name('post.view');
    Route::post('/addPost', [PostController::class, 'store'])->name('post.add');
});
//Map
Route::get('/localisation', [MapController::class, 'location'])->name('mapRoute');
ROute::patch('/updatePasswordPost', [updatePasswordController::class, 'updating'])->name('updatePasswordPost');
Route::post('/getEmail', [GetemailResetController::class, 'recovery'])->name('email.recovery.post');

    Route::get('/restPassword/{token}', [updatePasswordController::class,'showFormUpdate'])->name('email.update.view');
    Route::view('/getEmail', 'GetEmailForResetPassword')->name('get.email');
Route::get('/Historique',[HistoriqueController::class,'index']);

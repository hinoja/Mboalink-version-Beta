<?php


use App\Http\Livewire\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\MapController;
use App\Http\Controllers\RegisterController;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');
// Route::post('/postRegister', [Register::class,'signUp']);
// Route::get('/register', 'registerPage')->name('register');
Route::view('/loginr', 'loginPage')->name('login');
// Route::get('/register', Login::class);
// Route::get('/register', Register::class);
Route::post('/registerPost',[RegisterController::class,'store'])->name('registerPost');
Route::get('/register',[RegisterController::class,'page'])->name('register');
Route::post('/loginPost',loginController::class)->name('loginPost');
Route::view('/login','loginPage')->name('login');
Route::get('/localisation',[MapController::class,'location'])->name('mapRoute');

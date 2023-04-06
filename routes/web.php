<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LikesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/all-images', [ImagesController::class, 'index'])->name('images');
Route::get('register', [UserController::class, 'registerView'])->name('register');
Route::post('register', [UserController::class, 'register']);
Route::get('login', [UserController::class, 'loginView'])->name('login');
Route::post('login', [UserController::class, 'login']);
Route::get('logout', [UserController::class, 'logout'])->name('logout');
Route::get('instellingen', [UserController::class, 'settingsView'])->name('settings');
Route::post('instellingen', [UserController::class, 'settings']);

Route::resource('images', ImagesController::class);
Route::resource('likes', LikesController::class);

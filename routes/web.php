<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [UserController::class, 'index'])->name('homePage');

Route::get('login', function () {
    return view('login');
})->name('login');

Route::get('register', function () {
    return view('register');
})->name('register');



Route::post('login', [UserController::class, 'login'])->name('login');

Route::post('register', [UserController::class, 'register'])->name('register');

Route::post('submitForm', [UserController::class, 'ajaxSubmit'])->name('submitForm');

Route::get('getUserInfo', [UserController::class, 'getUserInfo'])->name('getUserInfo');

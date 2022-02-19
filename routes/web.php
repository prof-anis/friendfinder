<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\User\DashboardController;
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

Route::view('/', 'welcome')->name('index');

Route::group(['prefix' => 'auth'], function () {
   Route::post('register', RegisterController::class)->name('register');
   Route::post('login', LoginController::class)->name('login');
});

Route::get('dashboard', DashboardController::class)->name('dashboard');




<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Authentication\ForgetpasswordController;
use App\Http\Controllers\Authentication\ResetPasswordController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\UserFollowerController;
use App\Http\Controllers\LogoutController;
use App\Mail\ForgetPassMail;
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
   Route::get('forgotpassword', [ForgetPasswordController::class, 'index'])->name('forgetpassword');
   Route::Post('forgotpassword', [ForgetPasswordController::class, 'check'])->name('forgetpasswordCheck');
   route::get('/resetpassword', [ResetPasswordController::class, 'index'])->name('ResetPassword');
   route::PUT('/resetpassword', [ResetPasswordController::class, 'reset'])->name('Reset');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', DashboardController::class)
        ->name('dashboard');
    Route::get('people', [UserFollowerController::class, 'index'])
        ->name('people');
    Route::post('{user}/follow', [UserFollowerController::class, 'follow'])
        ->name('follow');
    Route::delete('{user}/unfollow', [UserFollowerController::class, 'unfollow'])
        ->name('unfollow');
    Route::post('logout', LogoutController::class)->name('logout');
});

Route::get('/mail', function () {
    return new ForgetPassMail;
})->name('mail');


<?php

use App\Http\Controllers\Authentication\LoginController;
use App\Http\Controllers\Authentication\RegisterController;
use App\Http\Controllers\Authentication\ForgetpasswordController;
use App\Http\Controllers\Authentication\ResetPasswordController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\UserFollowerController;
use App\Http\Controllers\Post\CommentController;
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
   Route::post('forgotpassword', [ForgetPasswordController::class, 'check'])->name('forgetpasswordcheck');
   Route::get('/resetpassword/ {data}', [ResetPasswordController::class, 'index'])->name('resetpassword');
   route::put('/resetpassword/{data}', [ResetPasswordController::class, 'reset'])->name('reset');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('dashboard', DashboardController::class)
        ->name('dashboard');
        Route::get('data', [DataController::class, 'data'])
        ->name('data');
    Route::get('people', [UserFollowerController::class, 'index'])
        ->name('people');
    Route::post('{user}/follow', [UserFollowerController::class, 'follow'])
        ->name('follow');
    Route::delete('{user}/unfollow', [UserFollowerController::class, 'unfollow'])
        ->name('unfollow');
    Route::post('logout', LogoutController::class)->name('logout');
    Route::post('{id}/comments', [CommentController::class, 'store'])->name('comment.store');
    Route::post('{id}/delete', [CommentController::class, 'destroy'])->name('comment.delete');
});




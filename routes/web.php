<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PasswordForgotController,
    PasswordResetController
};

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
});

Route::get('/password/forgot', [PasswordForgotController::class, 'index'])->name('password-forgot.index');
Route::post('password/forgot', [PasswordForgotController::class, 'store'])->name('password-forgot.store');
Route::get('/password/reset/{token}', [PasswordResetController::class, 'index'])->name('password-reset.index');
Route::post('password/reset', [PasswordResetController::class, 'store'])->name('password-reset.store');


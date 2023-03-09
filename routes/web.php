<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
    return view('pages.login');
});
Route::get('/sign-up', function () {
    return view('pages.signup');
});
Route::get('/forgot-password', function () {
    return view('pages.forgot-password');
});
Route::get('/verify-otp', function () {
    return view('pages.otp-code');
});
Route::get('/reset-password', function () {
    return view('pages.reset-password');
});
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/sign-in', [AuthController::class, 'signin'])->name('signin');

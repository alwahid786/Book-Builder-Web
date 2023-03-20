<?php

use App\Http\Controllers\SpeechToTextController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\PDFController;

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
Route::get('/speech_to_text', [SpeechToTextController::class, 'speechToText']);
Route::get('/verify-otp', function () {
    return view('pages.otp-code');
});
Route::get('/reset-password', function () {
    return view('pages.reset-password');
});
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/sign-in', [AuthController::class, 'signin'])->name('signin');
Route::post('/forget', [AuthController::class, 'forget']);
Route::post('/otp', [AuthController::class, 'verifyOTP']);
Route::post('/reset', [AuthController::class, 'updatePassword']);
Route::middleware('auth')->group(function () {
    Route::get('/welcome', function () {
        return view('pages.welcome');
    });
    Route::get('/outline', function () {
        return view('pages.book.outline');
    });
    Route::get('/cover-art', function () {
        return view('pages.book.cover-art');
    });
    Route::get('/logout', [AuthController::class, 'logout']);

    // Book Routes Controller 
    Route::get('/avatar', [BookController::class, 'avatar']);
    Route::post('/avatarForm', [BookController::class, 'avatarForm'])->name('avatarDetail');
    Route::get('/book-title', [BookController::class, 'bookTitle']);
    Route::post('/bookTitleForm', [BookController::class, 'bookTitleForm'])->name('bookTitleDetail');
    Route::get('/outline', [BookController::class, 'outline']);
    Route::get('/create-book', [PDFController::class, 'createPDF'])->name('createPDF');
});

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
    Route::get('/congratulations', function () {
        return view('pages.book.congrats');
    });
    Route::get('/logout', [AuthController::class, 'logout']);
    Route::get('/welcome', [AuthController::class, 'welcome']);
    Route::get('/release', [AuthController::class, 'release']);

    // Book Routes Controller 
    Route::get('/avatar', [BookController::class, 'avatar']);
    Route::post('/avatarForm', [BookController::class, 'avatarForm'])->name('avatarDetail');
    Route::get('/book-title', [BookController::class, 'bookTitle']);
    Route::post('/bookTitleForm', [BookController::class, 'bookTitleForm'])->name('bookTitleDetail');
    Route::get('/outline', [BookController::class, 'outline']);
    Route::post('/outlineForm', [BookController::class, 'outlineForm'])->name('outlineDetail');
    Route::post('/deleteOutline', [BookController::class, 'deleteOutline'])->name('deleteOutline');

    Route::get('/cover-art', [BookController::class, 'coverArt']);
    Route::post('/coverArtForm', [BookController::class, 'coverArtForm'])->name('coverArtDetail');
    Route::get('/inside-cover', [BookController::class, 'insideCover']);
    Route::post('/frontCoverForm', [BookController::class, 'frontCoverForm'])->name('frontCoverDetail');
    Route::get('/copyright', [BookController::class, 'copyright']);
    Route::post('/copyrightForm', [BookController::class, 'copyrightForm'])->name('copyrightDetail');
    Route::get('/praise', [BookController::class, 'praise']);
    Route::post('/praiseForm', [BookController::class, 'praiseForm'])->name('praiseDetail');
    Route::get('/dedication', [BookController::class, 'dedication']);
    Route::post('/dedicationForm', [BookController::class, 'dedicationForm'])->name('dedicationDetail');
    Route::get('/how-to-use', [BookController::class, 'howToUse']);
    Route::post('/howToUseForm', [BookController::class, 'howToUseForm'])->name('howToUseDetail');
    Route::get('/forward', [BookController::class, 'forward']);
    Route::post('/forwardForm', [BookController::class, 'forwardForm'])->name('forwardDetail');
    Route::get('/content/${id}', [BookController::class, 'content'])->name('content');
    Route::post('/contentForm', [BookController::class, 'contentForm'])->name('contentDetail');
    Route::get('/conclusion', [BookController::class, 'conclusion']);
    Route::post('/conclusionForm', [BookController::class, 'conclusionForm'])->name('conclusionDetail');
    Route::get('/work-with-us', [BookController::class, 'workWithUs']);
    Route::post('/workWithUsForm', [BookController::class, 'workWithUsForm'])->name('workWithUsDetail');
    Route::get('/about', [BookController::class, 'about']);
    Route::post('/aboutForm', [BookController::class, 'aboutForm'])->name('aboutDetail');
    Route::post('/gratitude', [BookController::class, 'updateGratitude'])->name('updateGratitude');
    Route::post('/romance', [BookController::class, 'updateRomance'])->name('updateRomance');
    Route::post('/release-submission', [AuthController::class, 'releaseForm'])->name('releaseForm');

    // PDF Creation Routes 
    Route::get('/create-book', [PDFController::class, 'createPDF'])->name('createPDF');
    Route::get('/pdf', [PDFController::class, 'pdf'])->name('pdf');
});

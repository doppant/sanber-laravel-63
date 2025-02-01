<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;

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


Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');
Route::post('/welcome', [AuthController::class, 'showWelcome'])->name('home');
Route::get('/welcome', [AuthController::class, 'showWelcome'])->name('welcome');

Route::get('/master', function() {
    return view('layout.master');
});

Route::get('/table', function(){
    return view('/partial.table');
})->name('table');

Route::get('/data-tables', function(){
    return view('/partial.data-tables');
})->name('data-tables');

Route::resource('cast', CastController::class);
Auth::routes();

Route::resource('films', FilmController::class);
Route::resource('genres', GenreController::class);

Route::middleware(['auth'])->post('/films/{film}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

Route::middleware(['auth'])->group(function () {
    Route::resource('films', FilmController::class)->except(['index', 'show']); 
    Route::resource('genres', GenreController::class)->except(['index', 'show']); 
});
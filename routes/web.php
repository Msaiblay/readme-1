<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\GenreController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\AuthController;


// Genre
Route::resource('/genre',GenreController::class);

Route::resource('/book',BookController::class);


// localhost:8000/genre => GenreController@index

Route::get('/',[FrontendController::class, 'index'])->name('frontend.index');

//
Route::get('login',[AuthController::class, 'loginForm'])->name('login');

// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');










































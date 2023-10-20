<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CobaController;
use Illuminate\Support\Facades\Route;

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

Route::get('/coba', [CobaController::class, 'coba']);

Route::view('/contoh', 'contoh');

Route::get('/test', function () {
    return view('sample.welcome');
});

Route::view('/welcome', 'auth.login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// route('admin.profile.edit');

require __DIR__.'/auth.php';

Route::get('/coba/{name?}', function($name = null) {
    if ($name == null) {
        return "Hello there...";
    } else {
        return "Hello, ".$name;
    }
});

// <form method="post" action="{{ route('profile', ['finsa', 'kelas-nr', '2021']) }}">
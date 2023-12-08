<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\LecturerController;
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

Route::group(['middleware' => ['role:admin|user']], function () {
    Route::get('/data', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('data');
});

Route::middleware('auth')->group(function () {
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

Route::prefix('lecturer')
        ->name('lecturer.')
        ->group(function () {
            Route::get('/', [LecturerController::class, 'index'])->name('index'); 
            Route::get('/create', [LecturerController::class, 'create'])->name('create'); 
            Route::post('/store', [LecturerController::class, 'store'])->name('store'); 
            Route::get('/{nidn}/edit', [LecturerController::class, 'edit'])->name('edit');
            Route::patch('/{nidn}/update', [LecturerController::class, 'update'])->name('update');
            Route::delete('/{nidn}', [LecturerController::class, 'destroy'])->name('destroy');

            // soft deletes
            Route::get('/recycle-bin', [LecturerController::class, 'recycle_bin'])->name('recycle.bin');
            Route::post('/{nidn}/restore', [LecturerController::class, 'restore'])->name('restore');
            Route::delete('/{nidn}/delete', [LecturerController::class, 'delete'])->name('force.delete');
            Route::post('/restore/all', [LecturerController::class, 'restore_all'])->name('restore.all');
            Route::delete('/delete/all', [LecturerController::class, 'delete_all'])->name('force.delete.all');

            // relationship
            Route::get('/{nidn}/students', [LecturerController::class, 'students'])->name('students');
        });

// <form method="post" action="{{ route('profile', ['finsa', 'kelas-nr', '2021']) }}">
<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Api\ClimapiController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\IrrigationController;
use App\Http\Controllers\TimelineController;
use Illuminate\Support\Facades\Route;

Route::get('/climapi', [ClimapiController::class, 'healthCheck']);
Route::get('/temperaturahoje', [ClimapiController::class, 'getTempData']);
Route::get('/', function () {
    return inertia('Home');
})->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return inertia('Dashboard/Home');
    })->name('dashboard');

    Route::get('/history', [HistoryController::class, 'index'])->name('history_index');
    Route::get('/irrigation', [IrrigationController::class, 'index'])->name('irrigation_index');
    Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline_index');

    Route::post('/logout', [LogoutController::class, 'store'])->name('logout');
});

Route::middleware(['guest'])->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register_store');

    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login_store');
});

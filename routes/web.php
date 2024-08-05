<?php
use App\Http\Controllers\CarController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\CarController as AdminCarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
return view('welcome');
});

// Rute pentru autentificare
Auth::routes();

Route::middleware(['auth'])->group(function () {
// Rute pentru dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/home', [DashboardController::class, 'index'])->name('home');

// Rute pentru mașini
Route::resource('cars', CarController::class)->except(['reserve']);
Route::get('/cars/{car}/reserve', [CarController::class, 'reserve'])->name('cars.reserve');

// Rute pentru rezervări
Route::resource('reservations', ReservationController::class);
});

// Rute pentru admin


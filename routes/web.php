<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlantController;
use App\Http\Controllers\PlantReportController;
use Illuminate\Support\Facades\Route;

// Redirect homepage to login.
Route::get('/', function () {
    return redirect()->route('login');
});

// Guest routes: login and registration.
Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');
});

// Authenticated user routes.
Route::middleware(['auth'])->group(function () {

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::get('/dashboard', function () {
        return redirect()->route('plants.index');
    })->name('dashboard');

    // Plant CRUD.
    Route::resource('plants', PlantController::class);

    // Plant reports and exports.
    Route::get('/reports', [PlantReportController::class, 'index'])
        ->name('reports.index');

    Route::get('/reports/pdf', [PlantReportController::class, 'pdf'])
        ->name('reports.pdf');

    Route::get('/reports/excel', [PlantReportController::class, 'excel'])
        ->name('reports.excel');
});

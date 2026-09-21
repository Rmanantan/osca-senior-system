<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SeniorCitizenController;
use App\Http\Controllers\BenefitController;
use App\Http\Controllers\QrVerificationController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => redirect()->route('login'));

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('auth')->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::resource('senior-citizens', SeniorCitizenController::class);

    Route::get('/qr-verification', [QrVerificationController::class, 'index'])
        ->name('qr.index');
    Route::get('/qr-verification/{oscaId}', [QrVerificationController::class, 'verify'])
        ->name('qr.verify');

    Route::get('/benefits', [BenefitController::class, 'index'])
        ->name('benefits.index');
    Route::post('/benefits', [BenefitController::class, 'store'])
        ->name('benefits.store');

    Route::get('/reports/senior-citizens', [SeniorCitizenController::class, 'report'])
        ->name('reports.seniors');
});

<?php

use App\Http\Controllers\{AuthController, CustomerController, DashboardController, ProductController, SaleController, StaffController};
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => auth()->check() ? redirect()->route('dashboard') : view('auth.login'));
Route::middleware('guest')->group(function () { Route::get('/login', [AuthController::class, 'create'])->name('login'); Route::post('/login', [AuthController::class, 'store'])->name('login.store'); });
Route::post('/logout', [AuthController::class, 'destroy'])->middleware('auth')->name('logout');
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    Route::resource('products', ProductController::class)->except('show');
    Route::resource('customers', CustomerController::class)->except('show');
    Route::resource('staff', StaffController::class)->parameters(['staff' => 'member'])->except('show');
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
    Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
});

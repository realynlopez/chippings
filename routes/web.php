<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CashierController;
use App\Http\Controllers\RiderController;
use App\Http\Controllers\CustomerController;

// Default route for all users
Route::get('/', function () {
    return redirect()->route('dashboard');
})->name('home');

// Common dashboard route for all users
Route::get('/dashboard', function () {
    // Customize this route for your common dashboard view
    return view('dashboard');
})->name('dashboard');

// Authentication routes
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationpost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'admindashboard'])->name('admin.admin-dashboard');
Route::post('/admin', [AdminController::class, 'adminpost'])->name('admin.post');

// Admin routes (temporarily without authentication)
/*Route::middleware([])->group(function () {
    Route::get('/admin', [AdminController::class, 'admindashboard'])->name('admin.dashboard');
});*/


// Authenticated routes
Route::middleware(['auth'])->group(function () {
    // Other authenticated routes go here

    // Cashier routes
    Route::middleware(['cashier'])->group(function () {
        Route::get('/cashier', [CashierController::class, 'dashboard'])->name('cashier.dashboard');
    });

    // Rider routes
    Route::middleware(['rider'])->group(function () {
        Route::get('/rider', [RiderController::class, 'dashboard'])->name('rider.dashboard');
    });

    // Customer routes
    Route::middleware(['customer'])->group(function () {
        Route::get('/customer', [CustomerController::class, 'dashboard'])->name('customer.dashboard');
    });
});


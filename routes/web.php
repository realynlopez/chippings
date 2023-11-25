<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\QueueController;


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

//branches
Route::get('/laludBranch', [AdminController::class, 'laludBranch'])->name('laludBranch');
Route::get('/laludBranchWithData', [AdminController::class, 'laludBranchWithData'])->name('laludBranchWithData');

Route::get('/NacocoBranch', [AdminController::class, 'NacocoBranch'])->name('NacocoBranch');
Route::get('/nacocoBranchWithData', [AdminController::class, 'nacocoBranchWithData'])->name('NacocoBranchWithData');

Route::prefix('admin')->group(function () {

    Route::get('/menu', [AdminController::class, 'manageMenu'])->name('admin.menu');
    Route::get('/menu/{id}', [AdminController::class, 'showProduct'])->name('admin.menu.show');
    Route::post('/menu/store', [AdminController::class, 'storeProduct'])->name('admin.menu.store');
    //Route::get('/queue', [AdminController::class, 'queue'])->name('admin.queue');

});

//Queue
Route::get('/queue', [QueueController::class, 'index'])->name('queue.index');
Route::post('/queue/add', [QueueController::class, 'addToQueue'])->name('queue.addToQueue');
Route::post('/queue/serve-next', [QueueController::class, 'serveNextCustomer'])->name('queue.serveNextCustomer');

// Menu
Route::get('/admin/menu', [MenuController::class, 'index'])->name('admin.menu.index');
Route::get('/admin/menu/create', [MenuController::class, 'create'])->name('admin.menu.create');
Route::post('/admin/menu', [MenuController::class, 'store'])->name('admin.menu.store');
Route::get('/admin/menu/{id}/edit', [MenuController::class, 'edit'])->name('admin.menu.edit');
Route::put('/admin/menu/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
Route::get('/admin/menu/{id}', [AdminController::class, 'showProduct'])->name('admin.menu.show');





// Admin routes (temporarily without authentication)
/*Route::middleware([])->group(function () {
    Route::get('/admin', [AdminController::class, 'admindashboard'])->name('admin.dashboard');
});*/


// Authenticated routes
/*Route::middleware(['auth'])->group(function () {
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
});*/


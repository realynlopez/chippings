<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\QueueController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\AdminTableController;
use App\Http\Controllers\SalesController;

// Default route for all users
Route::get('/', function () {
    return view('homepage');
})->name('homepage');

// Authentication routes
Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post');
Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationpost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

// Admin 
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'admindashboard'])->name('admin.admin-dashboard');

    // Branches
    Route::get('/laludBranch', [AdminController::class, 'laludBranch'])->name('laludBranch');
    Route::post('/add-transaction', [AdminController::class, 'addTransaction'])->name('admin.addTransaction');

    Route::get('/nacoco-branch', [AdminController::class, 'NacocoBranch'])->name('NacocoBranch');
    Route::get('/nacoco-branch-with-data', [AdminController::class, 'nacocoBranchWithData'])->name('NacocoBranchWithData');
    Route::get('/admin/new_users', [AdminController::class, 'adminNewUsers'])->name('admin.new_users');

});


//sales admin
Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');


// Queue Admin
Route::get('/queue', [QueueController::class, 'showQueue'])->name('queue');
Route::post('/add-to-queue', [QueueController::class, 'addToQueue'])->name('add.to.queue');
Route::post('/queue/serve-next', [QueueController::class, 'serveNextCustomer'])->name('queue.serveNextCustomer');

// Menu Admin
Route::group(['prefix' => 'admin/menu', 'as' => 'admin.menu.'], function () {
    Route::get('/', [MenuController::class, 'index'])->name('index');
    Route::get('/create', [MenuController::class, 'create'])->name('create');
    Route::post('/create', [MenuController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [MenuController::class, 'edit'])->name('edit');
    Route::put('/{id}', [MenuController::class, 'update'])->name('update');
    Route::delete('/{id}', [MenuController::class, 'destroy'])->name('destroy');
    Route::post('/admin/menu/create', [MenuController::class, 'store'])->name('admin.menu.store');
});


//menu_user 
Route::group(['prefix' => 'user/menu', 'as' => 'user.menu.'], function () {
    Route::get('/', [MenuController::class, 'userIndex'])->name('index');
    Route::get('/{id}', [MenuController::class, 'userShow'])->name('show');
    // Add more user-specific routes as needed
});

//Table
Route::get('/admin/table-management', [AdminTableController::class, 'showTableManagementForm'])
->name('admin.table.management');
// Handle the form submission to add a new table
Route::post('/admin/add-table', [AdminTableController::class, 'addTable'])
->name('admin.add.table');
//occupied table
Route::post('/admin/mark-occupied/{id}', [AdminTableController::class, 'markTableOccupied'])
->name('admin.mark.occupied');




// Show available tables
Route::get('/available-tables', [ReservationController::class, 'showAvailableTables'])->name('available.tables');
// Reserve a table
Route::post('/reserve-table', [ReservationController::class, 'reserveTable'])->name('reserve.table');
// book a table
Route::get('/book-table', [ReservationController::class, 'showBookingForm'])->name('book.table');
Route::get('/queue-status', [UserDashboardController::class, 'showQueueStatus'])->name('queue.status');
// User Dashboard
Route::get('/userdashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');

// User feedback routes
Route::get('/user/feedback', [FeedbackController::class, 'showFeedbackForm'])->name('user.feedback.form');
Route::post('/submit-feedback', [FeedbackController::class, 'submitFeedback'])->name('submit.feedback');

// Admin feedback route
Route::get('/admin/feedback', [FeedbackController::class, 'showAdminFeedback'])->name('admin.feedback.index');







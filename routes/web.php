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
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Bagna_blueController;
use App\Http\Controllers\AdminReservationController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminOrderController;



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

});

//admin newly registered users
Route::get('/admin/newly-registered-users', [AdminUserController::class, 'newlyRegisteredUsers'])->name('newlyRegisteredUsers');;

//admin orderlist
Route::get('/admin/orders', [AdminOrderController::class, 'index'])->name('admin.orders.index');

//sales admin
Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');
Route::get('/chart/data', [SalesController::class, 'getSalesChartData'])->name('chart.data');

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
// routes/web.php

Route::group(['prefix' => 'user/menu', 'as' => 'user.menu.'], function () {
    Route::get('/', [MenuController::class, 'userIndex'])->name('index');
    Route::get('/{id}', [CheckoutController::class, 'userShow'])->name('show');
    Route::post('/addToCart', [MenuController::class, 'addToCart'])->name('addToCart');
    //Route::post('/checkout', [MenuController::class, 'checkout'])->name('checkout');
    Route::delete('/menu/{id}', [MenuController::class, 'userDestroy'])->name('userDestroy');
    // Add more user-specific routes as needed
});

Route::get('user/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::post('user/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
// routes/web.php or routes/api.php
Route::post('/checkout/place-order', [CheckoutController::class, 'placeOrder'])->name('checkout.placeOrder');
Route::get('/thank-you', [CheckoutController::class, 'thankYou'])->name('thank-you');


//Table admin
Route::get('/admin/table-management', [AdminTableController::class, 'showTableManagementForm'])
->name('admin.table.management');
// Handle the form submission to add a new table
Route::post('/admin/add-table', [AdminTableController::class, 'addTable'])
->name('admin.add.table');
//occupied table
Route::post('/admin/mark-occupied/{id}', [AdminTableController::class, 'markTableOccupied'])
->name('admin.mark.occupied');
Route::delete('/admin/delete/table/{id}', [AdminTableController::class, 'deleteTable'])->name('admin.delete.table');
//admin reservation
Route::get('/admin/reservations', [AdminReservationController::class, 'index'])->name('admin.reservations');




// Admin reservation management
// Admin reservation management
Route::get('/admin/reservation-management', [AdminReservationController::class, 'showReservationManagement'])->name('admin.admin_reservation');
Route::post('/admin/accept-reservation/{id}', [AdminReservationController::class, 'acceptReservation'])->name('admin.accept.reservation');
Route::post('/admin/decline-reservation/{id}', [AdminReservationController::class, 'declineReservation'])->name('admin.decline.reservation');


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

Route::get('/admin/bagna_blue', [Bagna_blueController::class, 'index'])->name('admin.bagna_blue');




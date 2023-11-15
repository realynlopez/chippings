<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;

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

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginpost'])->name('login.post');
Route::get('/registration', [AuthManager::class,'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationpost'])->name('registration.post');
Route::get('/logout', [AuthManager::class,'logout'])->name('logout');
Route::group(['middleware'=> 'auth'],function() {
    Route::get('/profile', function(){
        return "Hi";
    });
});
Route::get('/menu', [AuthManager::class, 'showMenu'])->name('menu');
Route::post('/menu', [AuthManager::class, 'menupost'])->name('menu.post');
Route::get('/about', [AuthManager::class, 'showAbout'])->name('about');
Route::post('/about', [AuthManager::class, 'aboutpost'])->name('about.post');
Route::get('/book-a-table', [AuthManager::class, 'showBookATable'])->name('book-a-table');
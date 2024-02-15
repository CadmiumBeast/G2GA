<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ComputerController;
use App\Http\Controllers\AdminController;

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
/*    ------------ADMIN --------------*/
Route::prefix('admin')->group(function(){
    Route::get('/login', [AdminController::class, 'index'])->name('admin.login');
    Route::post('/login/owner', [AdminController::class, 'login'])->name('admin.login.owner');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/register', [AdminController::class, 'register'])->name('admin.register');
    Route::post('/register', [AdminController::class, 'store'])->name('admin.store');

});
Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/admin/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/admin/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');
    Route::get('/admin/computers', [ComputerController::class, 'index'])->name('admin.computers.index');
    Route::get('/admin/computers/create', [ComputerController::class, 'create'])->name('admin.computers.create');
    Route::post('/admin/computers', [ComputerController::class, 'store'])->name('admin.computers.store');
    Route::get('/admin/computers/{computer}/edit', [ComputerController::class, 'edit'])->name('admin.computers.edit');
    Route::put('/admin/computers/{computer}/update', [ComputerController::class, 'update'])->name('admin.computers.update');
    Route::delete('/admin/computers/{computer}/destroy', [ComputerController::class, 'destroy'])->name('admin.computers.destroy');
});
// Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/booking', [UserController::class, 'booking'])->name('booking');
    Route::POST('/booking', [BookingController::class, 'store'])->name('booking.store');

});

require __DIR__.'/auth.php';

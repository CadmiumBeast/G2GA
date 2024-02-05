<?php

use App\Http\Controllers\ProfileController;
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
    Route::get('/login/owner', [AdminController::class, 'login'])->name('admin.welcome');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('admin');


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

    Route::get('/computers', [ComputerController::class, 'index'])->name('computers.index');
    Route::get('/computers/create', [ComputerController::class, 'create'])->name('computers.create');
    Route::post('/computers', [ComputerController::class, 'store'])->name('computers.store');
    Route::get('/computers/{computer}/edit', [ComputerController::class, 'edit'])->name('computers.edit');
    Route::put('/computers/{computer}/update', [ComputerController::class, 'update'])->name('computers.update');
    Route::delete('/computers/{computer}/destroy', [ComputerController::class, 'destroy'])->name('computers.destroy');

});

require __DIR__.'/auth.php';

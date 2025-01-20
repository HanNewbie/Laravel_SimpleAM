<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KontrakController;




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
});

Route::get('/login', function () {
    return view('admin.login');
});

Route::prefix('/admin')->middleware('auth')->group(function() { // Mengatur rute untuk admin dengan middleware auth
    Route::get('/', function () { // Mengatur rute untuk halaman dashboard admin
        return redirect('admin/dashboard'); // Menampilkan view admin.dashboard
    });
}); 


Route::get('/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
Route::post('/customer', [CustomerController::class, 'store'])->name('admin.customer.store');
Route::get('/customer/{NoBilling}/edit', [CustomerController::class, 'edit'])->name('admin.customer.edit');
Route::put('/manager/{NoBilling}', [CustomerController::class, 'update'])->name('admin.customer.update');
Route::delete('/customer/{NoBilling}', [CustomerController::class, 'destroy'])->name('admin.customer.destroy');


Route::get('/manager', [ManagerController::class, 'index'])->name('admin.manager.index');
Route::get('/manager/create', [ManagerController::class, 'create'])->name('admin.manager.create');
Route::post('/manager', [ManagerController::class, 'store'])->name('admin.manager.store');
Route::get('/manager/{NIKAM}/edit', [ManagerController::class, 'edit'])->name('admin.manager.edit');
Route::put('/manager/{NIKAM}', [ManagerController::class, 'update'])->name('admin.manager.update');
Route::delete('/manager/{NIKAM}', [ManagerController::class, 'destroy'])->name('admin.manager.destroy');


Route::get('/layanan', [LayananController::class, 'index']);
Route::get('/kontrak', [KontrakController::class, 'index']);


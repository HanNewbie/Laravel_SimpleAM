<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ManagerController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\KontrakController;
use App\Http\Controllers\DashboardController;





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

//DASHBOARD
Route::get('/', [DashboardController::class, 'index']);

//ROUTE CUSTOMER
Route::get('/customer', [CustomerController::class, 'index'])->name('admin.customer.index');
Route::get('/customer/create', [CustomerController::class, 'create'])->name('admin.customer.create');
Route::post('/customer', [CustomerController::class, 'store'])->name('admin.customer.store');
Route::get('/customer/{NoBilling}/edit', [CustomerController::class, 'edit'])->name('admin.customer.edit');
Route::put('/customer/{NoBilling}', [CustomerController::class, 'update'])->name('admin.customer.update');
Route::delete('/customer/{NoBilling}', [CustomerController::class, 'destroy'])->name('admin.customer.destroy');

//ROUTE MANAGER
Route::get('/manager', [ManagerController::class, 'index'])->name('admin.manager.index');
Route::get('/manager/create', [ManagerController::class, 'create'])->name('admin.manager.create');
Route::post('/manager', [ManagerController::class, 'store'])->name('admin.manager.store');
Route::get('/manager/{NIKAM}/edit', [ManagerController::class, 'edit'])->name('admin.manager.edit');
Route::put('/manager/{NIKAM}', [ManagerController::class, 'update'])->name('admin.manager.update');
Route::delete('/manager/{NIKAM}', [ManagerController::class, 'destroy'])->name('admin.manager.destroy');

//ROUTE LAYANAN
Route::get('/layanan', [LayananController::class, 'index'])->name('admin.layanan.index');
Route::get('/layanan/create', [LayananController::class, 'create'])->name('admin.layanan.create');
Route::post('/layanan', [LayananController::class, 'store'])->name('admin.layanan.store');
Route::get('/layanan/{SID}/edit', [LayananController::class, 'edit'])->name('admin.layanan.edit');
Route::put('/layanan/{SID}', [LayananController::class, 'update'])->name('admin.layanan.update');
Route::delete('/layanan/{SID}', [LayananController::class, 'destroy'])->name('admin.layanan.destroy');

//ROUTE KONTRAK
Route::get('/kontrak', [KontrakController::class, 'index'])->name('admin.kontrak.index');
Route::get('/kontrak/create', [KontrakController::class, 'create'])->name('admin.kontrak.create');
Route::post('/kontrak', [KontrakController::class, 'store'])->name('admin.kontrak.store');
Route::get('/kontrak/{Id}/edit', [KontrakController::class, 'edit'])->name('admin.kontrak.edit');
Route::put('/kontrak/{Id}', [KontrakController::class, 'update'])->name('admin.kontrak.update');
Route::delete('/kontrak/{Id}', [KontrakController::class, 'destroy'])->name('admin.kontrak.destroy');

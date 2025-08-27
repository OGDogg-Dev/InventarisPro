<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\StockInController;
use App\Http\Controllers\StockOutController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BarcodeController;


Route::get('/', function () {
    return view('welcome');
});

// Semua rute yang hanya bisa diakses setelah login (`auth`)
Route::middleware('auth')->group(function () {

    // Dashboard (bisa diakses semua user yang login)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile (bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // === INI BAGIAN PENTING YANG PERLU DIPASTIKAN ADA ===
    // Rute untuk Manajemen Data Inti
   // Menjadi seperti ini:
Route::resource('products', ProductController::class)->middleware('role:Admin');
Route::resource('suppliers', SupplierController::class)->middleware('role:Admin');
Route::resource('categories', CategoryController::class)->middleware('role:Admin');

    // Rute untuk Manajemen Stok
    Route::middleware(['permission:manage stock'])->group(function () {
        Route::get('/stock-in/create', [StockInController::class, 'create'])->name('stock.in.create');
        Route::post('/stock-in', [StockInController::class, 'store'])->name('stock.in.store');
        Route::get('/stock-out/create', [StockOutController::class, 'create'])->name('stock.out.create');
        Route::post('/stock-out', [StockOutController::class, 'store'])->name('stock.out.store');
    });

    // Rute untuk Barcode
    Route::get('/products/{product}/barcode', [BarcodeController::class, 'show'])->name('products.barcode')->middleware('permission:manage products');

    // Rute untuk Laporan
    Route::middleware(['permission:view reports'])->group(function () {
        Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
        Route::get('/reports/stock-opname', [ReportController::class, 'stockOpname'])->name('reports.stock_opname');
        Route::get('/reports/product-history', [ReportController::class, 'productHistory'])->name('reports.product_history');
    });

});


require __DIR__.'/auth.php';

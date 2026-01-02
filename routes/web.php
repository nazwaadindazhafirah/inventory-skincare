<?php
/**
 * Routing utama aplikasi Inventory Skincare
 * Dibuat oleh : Nazwa Adinda Zhafirah | 202312047
 */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ReportController;

Route::get('/', fn() => redirect('/login'));

// ================================
// ROUTE YANG WAJIB LOGIN
// ================================
Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // CRUD PRODUK (Admin & Staf)
    Route::resource('products', ProductController::class);

    // CRUD KATEGORI (Admin & Staf)
    Route::resource('categories', CategoryController::class);

    // ================================
    // ROUTE KHUSUS ADMIN SAJA
    // ================================
    Route::middleware('role:admin')->group(function () {

        // Laporan Stok
        Route::get('/reports/stock', [ReportController::class, 'stock'])
            ->name('reports.stock');

        // Export PDF
        Route::get('/reports/stock/pdf', [ReportController::class, 'exportPDF'])
            ->name('report.stock.pdf');
    });

    // Profil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

require __DIR__.'/auth.php';

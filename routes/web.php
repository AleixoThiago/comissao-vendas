<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Route;

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

// HOME
Route::get('/', function () {
    return view('pages.home');
})->name('home');

// -------------------------------- LOGIN --------------------------------
Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AdminLoginController::class, 'login'])->name('login');
// -----------------------------------------------------------------------

// -------------------------------- ADMIN --------------------------------
Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');

/**
 * Rotas de vendedores
 */
Route::get('/admin/sellers', [AdminController::class, 'showSellers'])->name('admin.sellers');
Route::get('/admin/sellers/{id}', [AdminController::class, 'showSeller'])->name('admin.seller.detail');
Route::get('/admin/create/seller', [AdminController::class, 'showCreateSellerForm'])->name('admin.create.seller');
Route::post('/admin/create/seller', [AdminController::class, 'createSeller'])->name('admin.create.seller');
Route::get('/admin/delete/seller/{id}', [AdminController::class, 'deleteSeller'])->name('admin.delete.seller');
Route::get('/admin/mail/sellers/{id}', [AdminController::class, 'sendSellerSalesReportMail'])->name('admin.mail.seller');

/**
 * Rotas de vendas
 */
Route::get('/admin/sales', [AdminController::class, 'showSales'])->name('admin.sales');
Route::get('/admin/sales/create/{id}', [AdminController::class, 'showCreateSaleForm'])->name('admin.create.sale');
Route::post('/admin/sales/create/{id}', [AdminController::class, 'createSale'])->name('admin.create.sale');
// ----------------------------------------------------------------------

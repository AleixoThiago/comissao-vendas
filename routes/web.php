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
});

// -------------------------------- LOGIN --------------------------------
Route::get('/login', [AdminLoginController::class, 'showLoginForm']);
Route::post('/login', [AdminLoginController::class, 'login']);
// -----------------------------------------------------------------------

// -------------------------------- ADMIN --------------------------------
Route::get('/admin/home', [AdminController::class, 'index']);

/**
 * Rotas de vendedores
 */
Route::get('/admin/sellers', [AdminController::class, 'showSellers']);
Route::get('/admin/sellers/{id}', [AdminController::class, 'showSeller']);
Route::get('/admin/create/seller', [AdminController::class, 'showCreateSellerForm']);
Route::post('/admin/create/seller', [AdminController::class, 'createSeller']);

/**
 * Rotas de vendas
 */
Route::get('/admin/sales', [AdminController::class, 'showSales']);
Route::get('/admin/sales/create/{id}', [AdminController::class, 'showCreateSaleForm']);
Route::post('/admin/sales/create/{id}', [AdminController::class, 'createSale']);
// ----------------------------------------------------------------------

<?php

use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\SellerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

/**
 * Rotas de sellers
 */
Route::get('/sellers', [SellerController::class, 'index']);
Route::get('/sellers/{id}', [SellerController::class, 'getSeller']);
Route::post('/sellers', [SellerController::class, 'store']);

/**
 * Rotas de sales
 */
Route::get('/sales', [SaleController::class, 'index']);
Route::post('/sales', [SaleController::class, 'store']);

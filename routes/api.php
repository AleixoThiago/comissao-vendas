<?php

use App\Http\Controllers\API\SellerController;
use Illuminate\Http\Request;
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
Route::post('/sellers', [SellerController::class, 'store']);

<?php

use App\Http\Controllers\API\AdminAuthController;
use App\Http\Controllers\API\SaleController;
use App\Http\Controllers\API\SellerController;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

/**
 * Rotas de autenticação para administradores
 */
Route::get('/', fn () => response()->json(null, Response::HTTP_NOT_IMPLEMENTED));
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->middleware('auth:admins');

Route::middleware(['auth:sanctum'])->group(function () {
    /**
     * Rota de confirmação de autenticação
     */
    Route::get('/auth', fn () => response()->json(null, Response::HTTP_OK));

    /**
     * Rotas de sellers
     */
    Route::get('/sellers', [SellerController::class, 'index']);
    Route::get('/sellers/{id}', [SellerController::class, 'getSeller']);
    Route::post('/sellers', [SellerController::class, 'store']);
    Route::get('/mail/sellers/{id}', [SellerController::class, 'sendSalesReportMail']);

    /**
     * Rotas de sales
     */
    Route::get('/sales', [SaleController::class, 'index']);
    Route::get('/sales/{sellerId}', [SaleController::class, 'getSellerSales']);
    Route::post('/sales', [SaleController::class, 'store']);
});

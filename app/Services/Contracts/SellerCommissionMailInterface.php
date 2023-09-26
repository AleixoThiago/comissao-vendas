<?php

namespace App\Services\Contracts;

use App\Models\Seller;

interface SellerCommissionMailInterface
{
    public function getSellerSalesData(int $sellerId);
    public function calculateTotalSales(Seller $seller);
    public function calculateTotalAmount(Seller $seller);
    public function calculateCommission(float $totalAmount, float $commissionPercentage);
}

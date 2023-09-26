<?php

namespace App\Services;

use App\Models\Seller;
use App\Services\Contracts\SellerCommissionMailInterface;

class SellerCommissionMailService implements SellerCommissionMailInterface
{
    public function getSellerSalesData(int $sellerId)
    {
        $seller = Seller::with([
            'sales' => fn ($query) => $query->whereDate('created_at', today()),
        ])->findOrFail($sellerId);

        $seller->totalSales  = $this->calculateTotalSales($seller);
        $seller->totalAmount = $this->calculateTotalAmount($seller);
        $seller->commission  = $this->calculateCommission($seller->totalAmount, $seller->commission_percentage);

        return $seller->toArray();
    }

    public function calculateTotalSales(Seller $seller)
    {
        return $seller->sales->count();
    }

    public function calculateTotalAmount(Seller $seller)
    {
        return $seller->sales->sum('amount');
    }

    public function calculateCommission(float $totalAmount, float $commissionPercentage)
    {
        return $totalAmount * ($commissionPercentage / 100);
    }
}

<?php

namespace App\Services;

use App\Models\Sale;
use App\Services\Contracts\AdminSalesMailInterface;

class AdminSalesMailService implements AdminSalesMailInterface
{
    public function getSalesData()
    {
        $salesData = [];
        $sales = Sale::whereDate('created_at', today())
                    ->get();

        $salesData['totalSales']  = $this->calculateTotalSales($sales);
        $salesData['totalAmount'] = $this->calculateTotalAmount($sales);

        return $salesData;
    }

    public function calculateTotalSales($sales)
    {
        return $sales->count();
    }

    public function calculateTotalAmount($sales)
    {
        return $sales->sum('amount');
    }
}

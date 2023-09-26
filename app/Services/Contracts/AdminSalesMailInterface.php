<?php

namespace App\Services\Contracts;

use App\Models\Sale;

interface AdminSalesMailInterface
{
    public function getSalesData();
    public function calculateTotalSales(Sale $sales);
    public function calculateTotalAmount(Sale $sales);
}

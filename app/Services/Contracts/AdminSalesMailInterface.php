<?php

namespace App\Services\Contracts;

use App\Models\Sale;

interface AdminSalesMailInterface
{
    public function getSalesData();
    public function getAdmins();
    public function calculateTotalSales(Sale $sales);
    public function calculateTotalAmount(Sale $sales);
}

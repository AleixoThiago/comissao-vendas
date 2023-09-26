<?php

namespace App\Services\Contracts;

interface SaleServiceInterface
{
    public function getAllSales(int $limit = 10);
    public function createSale(array $data);
}

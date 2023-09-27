<?php

namespace App\Services\Contracts;

interface SaleServiceInterface
{
    public function getAllSales();
    public function getSellerSales(int $sellerId);
    public function createSale(array $data);
}

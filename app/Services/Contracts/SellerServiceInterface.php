<?php

namespace App\Services\Contracts;

interface SellerServiceInterface
{
    public function getAllSellers();

    public function createSeller(array $data);

    public function getSellerById(int $sellerId);

    public function dispatchSalesReportMail(int $sellerId);
}

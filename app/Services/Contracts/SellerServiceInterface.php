<?php

namespace App\Services\Contracts;

interface SellerServiceInterface
{
    public function getAllSellers();
    public function createSeller(array $data);
}

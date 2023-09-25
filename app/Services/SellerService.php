<?php

namespace App\Services;

use App\Models\Seller as SellerModel;
use App\Services\Contracts\SellerServiceInterface;

class SellerService implements SellerServiceInterface
{
    /**
     * Método construtor da classe
     * @param SellerModel $sellerModel Instância de SellerModel
     */
    public function __construct(
        private readonly SellerModel $sellerModel
    )
    {}

    /**
     * Método responsável por retornar todos os sellers do BD
     */
    public function getAllSellers()
    {
        return $this->sellerModel->all();
    }

    /**
     * Método responsável por registrar um seller no BD
     * @param array $data Dados do registro
     */
    public function createSeller(array $data)
    {
        return $this->sellerModel->create($data);
    }
}

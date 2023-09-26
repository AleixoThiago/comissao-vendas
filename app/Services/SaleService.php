<?php

namespace App\Services;

use App\Models\Sale as SaleModel;
use App\Services\Contracts\SaleServiceInterface;

class SaleService implements SaleServiceInterface
{
    /**
     * Método construtor da classe
     *
     * @param  SaleModel  $saleModel Instância de SaleModel
     */
    public function __construct(
        private readonly SaleModel $saleModel
    ) {
    }

    /**
     * Método responsável por retornar todos os sellers do BD
     */
    public function getAllSales(int $limit = 10)
    {
        return $this->saleModel->paginate($limit);
    }

    /**
     * Método responsável por registrar um seller no BD
     *
     * @param  array  $data Dados do registro
     */
    public function createSale(array $data)
    {
        return $this->saleModel->create($data);
    }
}

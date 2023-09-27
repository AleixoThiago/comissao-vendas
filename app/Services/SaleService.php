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
    public function getAllSales()
    {
        return $this->saleModel->with('seller')->get();
    }

    /**
     * Método responsável por retornar todos as vendas de um seller
     */
    public function getSellerSales($sellerId)
    {
        return $this->saleModel->with('seller')->where('seller_id', '=', $sellerId)->get();
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

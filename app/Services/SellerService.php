<?php

namespace App\Services;

use App\Jobs\SendSellerCommissionEmailJob;
use App\Models\Seller as SellerModel;
use App\Services\Contracts\SellerServiceInterface;

class SellerService implements SellerServiceInterface
{
    /**
     * Método construtor da classe
     *
     * @param  SellerModel  $sellerModel Instância de SellerModel
     */
    public function __construct(
        private readonly SellerModel $sellerModel
    ) {
    }

    /**
     * Método responsável por retornar todos os sellers do BD
     */
    public function getAllSellers()
    {
        return $this->sellerModel->all()->makeHidden('updated_at');
    }

    /**
     * Método responsável por registrar um seller no BD
     *
     * @param  array  $data Dados do registro
     */
    public function createSeller(array $data)
    {
        return $this->sellerModel->create($data);
    }

    /**
     * Método responsável por excluir um seller
     *
     * @param  int  $id Identificador do seller
     */
    public function deleteSeller(int $id)
    {
        return $this->sellerModel->destroy($id);
    }

    /**
     * Método responsável por retornar todos os sellers do BD
     *
     * @param  int  $sellerId Identificador do seller
     */
    public function getSellerById(int $sellerId)
    {
        $seller = $this->sellerModel
            ->with('sales')
            ->findOrFail($sellerId)
            ->makeHidden('created_at');

        $seller->sales->transform(function ($sale) {
            return [
                'id' => $sale->id,
                'amount' => $sale->amount,
                'sale_date' => $sale->created_at,
            ];
        });

        $this->setSalesCommissionInfo($seller);

        return $seller;
    }

    /**
     * Método responsável por setar dados de vendas e comissão à instância de seller
     *
     * @param  SellerModel  $seller Instância de Seller
     */
    private function setSalesCommissionInfo(SellerModel &$seller)
    {
        $seller->totalSales = $seller->sales->count();
        $seller->totalAmount = $seller->sales->sum('amount');
        $seller->totalCommission = (float) number_format(($seller->totalAmount * ($seller->commission_percentage / 100)), 2, '.', '');
    }

    /**
     * Método responsável por enviar o email com o relatório de vendas do dia de um vendedor
     *
     * @param  int  $sellerId Identificador do seller
     */
    public function dispatchSalesReportMail(int $sellerId)
    {
        SendSellerCommissionEmailJob::dispatch($sellerId);
    }
}

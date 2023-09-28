<?php

namespace App\Services;

use App\Models\Admin;
use App\Models\Sale;
use App\Services\Contracts\AdminSalesMailInterface;

class AdminSalesMailService implements AdminSalesMailInterface
{
    /**
     * Método responsável por retornar os dados de vendas
     */
    public function getSalesData()
    {
        $salesData = [];
        $sales = Sale::whereDate('created_at', today())
            ->get();

        $salesData['totalSales'] = $this->calculateTotalSales($sales);
        $salesData['totalAmount'] = $this->calculateTotalAmount($sales);

        return $salesData;
    }

    /**
     * Método responsável por retornar os emails dos administradores
     */
    public function getAdmins()
    {
        $admins = Admin::all('email');

        return $admins;
    }

    /**
     * Método responsável por calcular o total de vendas
     */
    public function calculateTotalSales($sales)
    {
        return $sales->count();
    }

    /**
     * Método responsável por calcular o valor total das vendas
     */
    public function calculateTotalAmount($sales)
    {
        return $sales->sum('amount');
    }
}

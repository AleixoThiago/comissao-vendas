<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleStoreRequest;
use App\Services\Contracts\SaleServiceInterface;
use Symfony\Component\HttpFoundation\Response;

class SaleController extends Controller
{
    /**
     * Método contrutor da classe
     *
     * @param  SaleService  $saleService Instância de SaleService
     * @return void
     */
    public function __construct(
        private readonly SaleServiceInterface $saleService
    ) {
    }

    /**
     * Método responsável por retornar todas as vendas
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sales = $this->saleService->getAllSales();

        return response()->json($sales);
    }

    /**
     * Método responsável por cadastrar vendas
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SaleStoreRequest $request)
    {
        $data = $request->validated();
        $seller = $this->saleService->createSale($data);

        return response()->json($seller, Response::HTTP_CREATED);
    }

    /**
     * Método responsável por buscar as vendas de um seller
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSellerSales(int $sellerId)
    {
        $sales = $this->saleService->getSellerSales($sellerId);

        return response()->json($sales);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaleStoreRequest;
use App\Services\Contracts\SaleServiceInterface;
use Illuminate\Http\Request;
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
     * Método responsável por retornar todos os sellers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request)
    {
        $limit = $request->get('limit', 10);
        $sellers = $this->saleService->getAllSales($limit);

        return response()->json($sellers);
    }

    /**
     * Método responsável por cadastrar sellers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SaleStoreRequest $request)
    {
        $data = $request->validated(); // Valida e obtém os dados do request
        $seller = $this->saleService->createSale($data);

        return response()->json($seller, Response::HTTP_CREATED); // Retorna o vendedor criado com código de status 201 (Created)
    }
}

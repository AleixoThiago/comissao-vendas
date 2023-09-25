<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Services\Contracts\SellerServiceInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\SellerStoreRequest;
use Symfony\Component\HttpFoundation\Response;

class SellerController extends Controller
{
    /**
     * Método contrutor da classe
     * @param  SellerService $sellerService Instância de SellerService
     * @return void
     */
    public function __construct(
        private readonly SellerServiceInterface $sellerService
    )
    {}

    /**
     * Método responsável por retornar todos os sellers
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sellers = $this->sellerService->getAllSellers();
        return response()->json($sellers);
    }

    /**
     * Método responsável por cadastrar sellers
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SellerStoreRequest $request)
    {
        $data = $request->validated(); // Valida e obtém os dados do request
        $seller = $this->sellerService->createSeller($data);

        return response()->json($seller, Response::HTTP_CREATED); // Retorna o vendedor criado com código de status 201 (Created)
    }
}

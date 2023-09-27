<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellerStoreRequest;
use App\Services\Contracts\SellerServiceInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpFoundation\Response;

class SellerController extends Controller
{
    /**
     * Método construtor da classe
     *
     * @param  SellerService  $sellerService Instância de SellerService
     * @return void
     */
    public function __construct(
        private readonly SellerServiceInterface $sellerService
    ) {
    }

    /**
     * Método responsável por retornar todos os sellers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $sellers = $this->sellerService->getAllSellers();

        return response()->json($sellers);
    }

    /**
     * Método responsável por cadastrar sellers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(SellerStoreRequest $request)
    {
        $data = $request->validated(); // Valida e obtém os dados do request
        $seller = $this->sellerService->createSeller($data);

        return response()->json($seller, Response::HTTP_CREATED); // Retorna o vendedor criado com código de status 201 (Created)
    }

    /**
     * Método responsável por retornar as informações de um seller
     *
     * @return \Illuminate\Http\JsonResponse
     * @throws ModelNotFoundException
     */
    public function getSeller(int $id)
    {
        try {
            $seller = $this->sellerService->getSellerById($id);

            return response()->json($seller);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Vendedor não encontrado!', 'data' => []], 404);
        }
    }

    /**
     * Método responsável por dispachar um job de envio de email
     */
    public function sendSalesReportMail(int $id)
    {
        $this->sellerService->dispatchSalesReportMail($id);
        return response()->json(null, Response::HTTP_OK);
    }
}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminAuthLoginRequest;
use App\Services\AdminAuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;

class AdminAuthController extends Controller
{
    /**
     * Método contrutor da classe
     *
     * @param  AdminAuthService  $adminAuthService Instância de AdminAuthService
     * @return void
     */
    public function __construct(
        private readonly AdminAuthService $adminAuthService
    ) {
    }

    /**
     * Método responsável por realizar o login e criar a chave de autenticação
     *
     * @param  AdminAuthLoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(AdminAuthLoginRequest $request)
    {
        $token = $this->adminAuthService->login($request->validated());

        if(is_null($token)) {
            return response()->json(['message' => "Credenciais inválidas!"], Response::HTTP_UNAUTHORIZED);
        }

        return response()->json(['token' => $token], Response::HTTP_OK);
    }


    /**
     * Método responsável por realizar o logout
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->adminAuthService->logout();

        return response()->json(['message' => 'Logout bem-sucedido!']);
    }
}

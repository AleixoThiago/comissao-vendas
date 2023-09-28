<?php

namespace App\Services\Web;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AuthTestService
{
    /**
     * Método responsável por realizar um teste de autenticação
     */
    public function testAuth()
    {
        // TESTE DE AUTENTICAÇÃO
        $response = $this->getResponseAuth();
        if ($response->status() != Response::HTTP_OK) {
            return false;
        }

        return true;
    }

    /**
     * Método responsável por consultar a rota de teste de autenticação da API
     */
    private function getResponseAuth()
    {
        return Http::acceptJson()->withToken(Session::get('admin_token'))
            ->get(env('APP_API_URL').'/auth');
    }
}

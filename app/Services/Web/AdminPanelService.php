<?php

namespace App\Services\Web;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class AdminPanelService
{
    /**
     * Método responsável por consultar todos os sellers
     */
    public function getAllSellers()
    {
        $response = Http::acceptJson()->withToken(Session::get('admin_token'))
            ->get(env('APP_API_URL') . '/sellers');

        if ($response->status() != Response::HTTP_OK) {
            return [];
        }

        return $response->json();
    }

    /**
     * Método responsável por consultar todas as vendas
     */
    public function getAllSales()
    {
        $response = Http::acceptJson()->withToken(Session::get('admin_token'))
            ->get(env('APP_API_URL') . '/sales');

        if ($response->status() != Response::HTTP_OK) {
            return [];
        }

        return $response->json();
    }

    /**
     * Método responsável por consultar todas as vendasde um seller
     *
     * @param int $sellerId Identificador do seller
     */
    public function getSellerSales($sellerId)
    {
        $response = Http::acceptJson()->withToken(Session::get('admin_token'))
            ->get(env('APP_API_URL') . "/sales/{$sellerId}");

        if ($response->status() != Response::HTTP_OK) {
            return [];
        }

        return $response->json();
    }

    /**
     * Método responsável por consultar um seller
     *
     * @param int $id Identificador do seller
     */
    public function getSeller($id)
    {
        $response = Http::acceptJson()->withToken(Session::get('admin_token'))
            ->get(env('APP_API_URL') . "/sellers/{$id}");

        if ($response->status() != Response::HTTP_OK) {
            return [];
        }

        return $response->json();
    }

    /**
     * Método responsável por registrar um seller
     *
     * @param Request $request
     */
    public function createSeller(Request $request)
    {
        $response = Http::acceptJson()->withToken(Session::get('admin_token'))->post(env('APP_API_URL') . '/sellers', [
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        if ($response->status() != Response::HTTP_CREATED) {
            return false;
        }

        return true;
    }

    /**
     * Método responsável por excluir um seller
     *
     * @param int $id
     */
    public function deleteSeller($id)
    {
        $response = Http::acceptJson()->withToken(Session::get('admin_token'))
            ->delete(env('APP_API_URL') . "/sellers/{$id}");

        if ($response->status() != Response::HTTP_ACCEPTED) {
            return false;
        }

        return true;
    }

    /**
     * Método responsável por registrar uma venda de um seller
     *
     * @param Request $request
     * @param int     $id      Identificador do seller
     */
    public function createSale(Request $request, $id)
    {
        $response = Http::acceptJson()->withToken(Session::get('admin_token'))->post(env('APP_API_URL') . '/sales', [
            'amount' => $request->input('amount'),
            'seller_id' => $id
        ]);

        if ($response->status() != Response::HTTP_CREATED) {
            return false;
        }

        return true;
    }

    public function sendSellerSalesReportMail($id)
    {
        $response = Http::acceptJson()->withToken(Session::get('admin_token'))
            ->get(env('APP_API_URL') . "/mail/sellers/{$id}");

        if ($response->status() != Response::HTTP_OK) {
            return false;
        }

        return true;
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\Web\AuthTestService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    /**
     * Método contrutor da classe
     *
     * @param  AuthTestService   $authTestService   Instância de AuthTestService
     * @return void
     */
    public function __construct(
        private readonly AuthTestService $authTestService
    ) {
    }

    /**
     * Método responsável por renderizar a página de login
     */
    public function showLoginForm()
    {
        if($this->authTestService->testAuth()) {
            return redirect('/admin/home');
        }
        return view('pages.login');
    }

    /**
     * Método responsável por realizar o login e guardar a chave de autenticação na sessão
     */
    public function login(Request $request)
    {
        $response = Http::acceptJson()->post(env('APP_API_URL') . '/admin/login', [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        if ($response->status() === 200) {
            $token = $response->json('token');
            Session::put('admin_token', $token);

            return redirect('/admin/home');
        }

        return back()->withErrors(['error' => 'Credenciais inválidas']);
    }
}

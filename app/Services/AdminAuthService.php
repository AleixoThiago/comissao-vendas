<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AdminAuthService
{
    /**
     * Método responsável por realizar o login
     *
     * @param  array  $credentials Credenciais verificadas para login
     */
    public function login(array $credentials): string
    {
        if (! Auth::guard('admin')->attempt($credentials)) {
            return null;
        }

        $admin = Auth::guard('admin')->user();
        $admin->tokens()->delete();
        $token = $admin->createToken('admin_token', ['*'], now()->addMinutes(30))->plainTextToken;

        return $token;
    }

    /**
     * Método responsável por realizar o logout
     */
    public function logout()
    {
        $admin = Auth::guard('admins')->user();
        $admin->tokens()->first()->update(['expires_at' => now()]);

        Auth::guard('admin')->logout();
    }
}
